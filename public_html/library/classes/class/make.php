<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_make extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'make';
	protected $_primary			= 'make_code';
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
        $data['make_added']		= date('Y-m-d H:i:s');
        $data['make_code']		= $this->createCode();
		
		return parent::insert($data);	
    }
	

	
	/**
	 * Update the database record
	 * example: $table->update($data, $where);
	 * @param query string $where
	 * @param array $data
     * @return boolean
	 */
    public function update(array $data, $where) {
        // add a timestamp
         $data['make_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('make' => 'make'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('make_deleted = 0')
						->order('make_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByBrand($code)
	{
		$select = $this->_db->select()	
						->from(array('make' => 'make'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('make_deleted = 0')
					   ->where('make.brand_code = ?', $code);
		
	   $result = $this->_db->fetchAll($select);	
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
						->from(array('make' => 'make'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('make_deleted = 0')
					   ->where('make.make_code = ?', $code)
					   ->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getWithOutModels($code = null) {
		
		if($code != null) {
			$select = $this->_db->select()	
							->from(array('make' => 'make'))
							->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code and brand_deleted = 0')
							->joinLeft(array('model' => 'model'), 'model.make_code = make.make_code and model_deleted = 0', array('model_count' =>new Zend_Db_Expr('COUNT(model.model_code)')))
							->where('make_deleted = 0')
							->where('make.make_code = ?', $code)
							->group('make.make_code')
							->having('COUNT(model.model_code) = 0')
							->order('RAND()')
							->limit(1);
		} else {
			$select = $this->_db->select()	
							->from(array('make' => 'make'))
							->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code and brand_deleted = 0')
							->joinLeft(array('model' => 'model'), 'model.make_code = make.make_code and model_deleted = 0', array('model_count' =>new Zend_Db_Expr('COUNT(model.model_code)')))
							->where('make_deleted = 0')
							->group('make.make_code')
							->having('COUNT(model.model_code) = 0')
							->order('RAND()')
							->limit(1);
		}

	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	public function getSearch($search, $start, $length)
	{	
		if($search == '') {
		$select = $this->_db->select()	
						->from(array('make' => 'make'), array('make_added', 'make_code', 'make_name', 'make_active', 'make_deleted'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code and brand_deleted = 0', array('brand_name'))
						->joinLeft(array('model' => 'model'), 'model.make_code = make.make_code and model_deleted = 0', array('model_count' =>new Zend_Db_Expr('COUNT(model.model_code)')))
						->where('make_deleted = 0 and brand_deleted = 0')
						->order('make_added desc')
						->group('make.make_code');			 
		} else {
		$select = $this->_db->select()	
						->from(array('make' => 'make'), array('make_added', 'make_code', 'make_name', 'make_active', 'make_deleted'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code and brand_deleted = 0', array('brand_name'))
						->joinLeft(array('model' => 'model'), 'model.make_code = make.make_code and model_deleted = 0', array('model_count' =>new Zend_Db_Expr('COUNT(model.model_code)')))
						->where('make_deleted = 0 and brand_deleted = 0')
						->where("lower(concat(make_name, brand_name)) like lower(?)", "%$search%")
						->order('make_added desc')
						->group('make.make_code');			
		}

		$result_count = $this->_db->fetchRow("select count(*) as query_count from ($select) as query");

		if ($start == '' || $length == '') { 
			$result = $this->_db->fetchAll($select);
		} else { 
			$result = $this->_db->fetchAll($select . " limit $start, $length");
		}

		return ($result === false) ? false : $result = array('count'=>$result_count['query_count'],'displayrecords'=>count($result),'records'=>$result);	
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code)
	{
		$select = $this->_db->select()	
						->from(array('make' => 'make'))	
					   ->where('make_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<10;$i++){
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
		
		$makeData = $this->getByCode($code);

		if($makeData && isset($makeData) && trim($makeData['make_image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$makeData['make_image_path'].$this->_File->logo[$imagesize]['code'].$makeData['make_image_name'].$makeData['make_image_ext'];
				$MIME	= $this->_File->file_content_type($makeData['make_image_path'].$this->_File->logo[$imagesize]['code'].$makeData['make_image_name'].$makeData['make_image_ext']);

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
	}	
}
?>