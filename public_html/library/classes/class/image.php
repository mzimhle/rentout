<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_image extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'image';
	protected $_primary			= 'image_code';
	public $_File							= null;
	 
	function init()	{
		$this->_File						= new File(array('png', 'jpg', 'jpeg', 'gif'));
	}
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['image_added']		= date('Y-m-d H:i:s');
        $data['image_code']		= isset($data['image_code']) && trim($data['image_code']) != '' ? $data['image_code'] : $this->createCode();
		
		/* Check for other images. */
		$primary = $this->getPrimaryByItem($data['item_code'], $data['image_type']);		
		
		if($primary) {
			$data['image_primary']	= 0;
		} else {
			$data['image_primary']	= 1;
		}
		
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
         $data['image_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('image' => 'image'))
						->where('image_deleted = 0')
						->order('image_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByItem($code, $type)
	{
		
		switch($type) {		
			case 'CAR' :
				$select = $this->_db->select()	
						->from(array('image' => 'image'))
						->joinLeft(array('car' => 'car'), 'car.car_code = image.item_code')
						->where('image_deleted = 0 and car_deleted = 0')
					   ->where('image.item_code = ?', $code);		
			break;		
			case 'MILEAGE' :
				$select = $this->_db->select()	
						->from(array('image' => 'image'))
						->joinLeft(array('mileage' => 'mileage'), 'mileage.mileage_code = image.item_code')
						->where('image_deleted = 0 and mileage_deleted = 0')
					   ->where('image.item_code = ?', $code);		
			break;			
		}
		
	   $result = $this->_db->fetchAll($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	public function getPrimaryByItem($code, $type) {
		
		switch($type) {		
			case 'CAR' :
				$select = $this->_db->select()	
							->from(array('image' => 'image'))
							->joinLeft(array('car' => 'car'), 'car.car_code = image.item_code')	
							->where('image.item_code = ?', $code)
							->where('image_deleted = 0 and image_primary = 1 and car.car_deleted = 0')
							->order('image_added DESC')
							->limit(1);	
			break;
			case 'MILEAGE' :
				$select = $this->_db->select()	
							->from(array('image' => 'image'))
							->joinLeft(array('mileage' => 'mileage'), 'mileage.mileage_code = image.item_code')	
							->where('image.item_code = ?', $code)
							->where('image_deleted = 0 and image_primary = 1 and mileage.mileage_deleted = 0')
							->order('image_added DESC')
							->limit(1);			
			break;				
		}
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;	
	}
	
	public function updatePrimaryByItem($code, $item, $type) {
		
		$item = $this->getPrimaryByItem($item, $type);
		
		if($item) {
			$data = array();
			$where = null;
			$data['image_primary'] = 0;
			
			$where		= $this->getAdapter()->quoteInto('image_code = ?', $item['image_code']);
			$success	= $this->update($data, $where);				
		}

		$data = array();
		$data['image_primary'] = 1;
			
		$where		= $this->getAdapter()->quoteInto('image_code = ?', $code);
		$success	= $this->update($data, $where);
		
		return $code;
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByCode($code) {
		$select = $this->_db->select()	
						->from(array('image' => 'image'))
						->where('image_deleted = 0')
					   ->where('image.image_code = ?', $code)
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
						->from(array('image' => 'image'))	
					   ->where('image_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<15;$i++){
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
		
		$imageData = $this->getByCode($code);

		if($imageData && isset($imageData) && trim($imageData['image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$imageData['image_path'].$this->_File->logo[$imagesize]['code'].$imageData['image_name'].$imageData['image_ext'];

				$MIME	= $this->_File->file_content_type($imageData['image_path'].$this->_File->logo[$imagesize]['code'].$imageData['image_name'].$imageData['image_ext']);

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
		header('Content-Disposition: attachment; filename="'.$random.'"');
		header("Content-Transfer-Encoding: binary\n");

		readfile($PATH); // outputs the content of the file;	
		exit;
	}	
}
?>