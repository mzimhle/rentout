<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_group extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'group';
	protected $_primary			= 'group_code';
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
        $data['group_added']		= date('Y-m-d H:i:s');
        $data['group_code']		= $this->createCode();
		
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
         $data['group_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('group' => 'group'))
						->where('group_deleted = 0')
						->order('group_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function pairs($price = false)
	{
		if(!$price) {
			$select = $this->_db->select()	
							->from(array('group' => 'group'), array('group_code', 'group_name'))
							->where('group_deleted = 0')
							->where('group_active = 1');
		} else {
			$select = $this->_db->select()	
							->from(array('group' => 'group'), array('group_code', 'group_name' => "concat(group_name, ' ( R ', price_cost, ' per day )')"))
							->joinLeft(array('price' => 'price'), 'price.group_code = group.group_code')
							->where('group_deleted = 0 and price_deleted = 0')
							->where('group_active = 1 and price_active = 1')
							->where('price_enddate is null')
							->group('group.group_code');
			
		}

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
						->from(array('group' => 'group'))
						->where('group_deleted = 0')
					   ->where('group.group_code = ?', $code)
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
						->from(array('group' => 'group'))	
					   ->where('group_code = ?', $code)
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
		
		$groupData = $this->getByCode($code);

		if($groupData && isset($groupData) && trim($groupData['group_image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$groupData['group_image_path'].$this->_File->logo[$imagesize]['code'].$groupData['group_image_name'].$groupData['group_image_ext'];
				$MIME	= $this->_File->file_content_type($groupData['group_image_path'].$this->_File->logo[$imagesize]['code'].$groupData['group_image_name'].$groupData['group_image_ext']);

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
		
		header("Pragma: public");
		header('Cache-Control: max-age=86400');
		header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
		header("Content-Type: " . $MIME);
		header('Content-Disposition: attachment; filename="'.$random.'"');


		readfile($PATH); // outputs the content of the file;	
		
		exit;
	}	
}
?>