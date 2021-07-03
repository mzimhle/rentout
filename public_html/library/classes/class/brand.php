<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_brand extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'brand';
	protected $_primary			= 'brand_code';
	public $_File							= null;
	
	function init()	{
		$this->_File						= new File(array('png', 'jpg', 'jpeg'));
	}
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['brand_added']		= date('Y-m-d H:i:s');
        $data['brand_code']		= $this->createCode();
		
		return parent::insert($data);	
    }
	
	/**
	 * Update the database record
	 * example: $table->update($data, $where);
	 * @param query string $where
	 * @param array $data
     * @return boolean
	 */
    public function update(array $data, $where)
    {
        // add a timestamp
         $data['brand_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('brand' => 'brand'))
						->joinLeft(array('make' => 'make'), 'make.brand_code = brand.brand_code', array('make_count' =>new Zend_Db_Expr('COUNT(make.make_code)')))		
						->where('brand_deleted = 0')
						->group('brand.brand_code')
						->order('brand_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function pairs()
	{
		$select = $this->_db->select()	
						->from(array('brand' => 'brand'), array('brand_code', 'brand_name'))
						->where('brand_deleted = 0 and brand_active = 1');
		
	   $result = $this->_db->fetchPairs($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByCode($code)
	{
		$select = $this->_db->select()	
						->from(array('brand' => 'brand'))
						->joinLeft(array('make' => 'make'), 'make.brand_code = brand.brand_code', array('make_count' =>new Zend_Db_Expr('COUNT(make.make_code)')))
						->where('brand_deleted = 0')
						->where('brand.brand_code = ?', $code)
						->group('brand.brand_code')
						->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByMakeCount($code = null) {
		
		if($code != null) {
			$select = $this->_db->select()	
							->from(array('brand' => 'brand'))
							->joinLeft(array('make' => 'make'), 'make.brand_code = brand.brand_code and make_deleted = 0', array('make_count' =>new Zend_Db_Expr('COUNT(make.make_code)')))
							->where('brand_deleted = 0')
							->where('brand.brand_code = ?', $code)
							->group('brand.brand_code')
							->having('COUNT(make.make_code) = 0')
							->limit(1);
		} else {
			$select = $this->_db->select()
							->from(array('brand' => 'brand'))
							->joinLeft(array('make' => 'make'), 'make.brand_code = brand.brand_code and make_deleted = 0', array('make_count' =>new Zend_Db_Expr('COUNT(make.make_code)')))
							->where('brand_deleted = 0')
							->group('brand.brand_code')
							->having('COUNT(make.make_code) = 0')
							->limit(1);		
		}

	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByIdCountry($id, $country) {
		$select = $this->_db->select()	
						->from(array('brand' => 'brand'))
						->joinLeft(array('make' => 'make'), 'make.brand_code = brand.brand_code', array('make_count' =>new Zend_Db_Expr('COUNT(make.make_code)')))
						->where('brand_deleted = 0')
						->where('brand.brand_id = ?', $id)
					   ->where('brand.brand_country = ?', $country)
					   ->group('brand.brand_code')
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code)
	{
		$select = $this->_db->select()	
						->from(array('brand' => 'brand'))	
					   ->where('brand_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<5;$i++){
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$itemCheck = $this->getCode($reference);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createCode();
		} else {
			return $reference;
		}
	}
	
	public function download($code, $imagesize = 'thumb') {
		
		$random = md5(date('Y-m-d H:i:s'));
		
		$brandData = $this->getByCode($code);

		if($brandData && isset($brandData) && trim($brandData['brand_image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$brandData['brand_image_path'].$this->_File->logo[$imagesize]['code'].$brandData['brand_image_name'].$brandData['brand_image_ext'];
				$MIME	= $this->_File->file_content_type($brandData['brand_image_path'].$this->_File->logo[$imagesize]['code'].$brandData['brand_image_name'].$brandData['brand_image_ext']);

				header("Pragma: public");
				header('Cache-Control: max-age=86400');
				header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
				header("Content-Type: " . $MIME);
				header('Content-Disposition: attachment; filename="'.$random.'"');
	 
				readfile($PATH); // outputs the content of the file;
			
				exit;
			}
		}
		
		$PATH 	= $_SERVER['DOCUMENT_ROOT'].'/images/no-image.jpg';

		$MIME	= $this->_File->file_content_type('/images/no-image.jpg');
		
		header("Expires: on, 01 Jan 1970 00:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Description: File Transfer");
		header("Content-Type: " . $MIME);
		header("Content-Length: " .(string)(filesize($PATH)) );
		header('Content-Disposition: attachment; filename="Avatar"');
		header("Content-Transfer-Encoding: binary\n");

		readfile($PATH); // outputs the content of the file;	
		exit;			
	}	
}
?>