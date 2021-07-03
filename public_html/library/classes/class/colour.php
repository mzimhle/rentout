<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_colour extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'colour';
	protected $_primary			= 'colour_code';
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
        $data['colour_added']		= date('Y-m-d H:i:s');
        $data['colour_code']		= $this->createCode();
		
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
         $data['colour_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('colour' => 'colour'))
						->where('colour_deleted = 0')
						->order('colour_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function pairs() {
		$select = $this->_db->select()	
				->from(array('colour' => 'colour'), array('colour_code', 'colour_name'))
				->where('colour_deleted = 0 and colour_active = 1');
		
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
						->from(array('colour' => 'colour'))
						->where('colour_deleted = 0')
					   ->where('colour.colour_code = ?', $code)
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
						->from(array('colour' => 'colour'))	
					   ->where('colour_code = ?', $code)
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
		
		$colourData = $this->getByCode($code);

		if($colourData && isset($colourData) && trim($colourData['colour_image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$colourData['colour_image_path'].$this->_File->logo[$imagesize]['code'].$colourData['colour_image_name'].$colourData['colour_image_ext'];
				$MIME	= $this->_File->file_content_type($colourData['colour_image_path'].$this->_File->logo[$imagesize]['code'].$colourData['colour_image_name'].$colourData['colour_image_ext']);

				header("Expires: on, 01 Jan 1970 00:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header("Content-Description: File Transfer");
				header("Content-Type: " . $MIME);
				header("Content-Length: " .(string)(filesize($PATH)) );
				header('Content-Disposition: attachment; filename="ProfilePicture"');
				header("Content-Transfer-Encoding: binary\n");
	 
				readfile($PATH); // outputs the content of the file;
			
				exit;
			}
		} else {
			
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
}
?>