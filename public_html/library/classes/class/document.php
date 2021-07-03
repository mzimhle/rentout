<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_document extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 		= 'document';
	protected $_primary	= 'document_code';
	public $_File					= null;
	
	function init()	{
		$this->_File				= new File(array('png', 'jpg', 'jpeg', 'pdf', 'docx', 'doc', 'txt', 'gif'));
	}
	
	public function insert(array $data) {		
        // add a timestamp
		$data['document_code']		= isset($data['document_code']) && trim($data['document_code']) != '' ? $data['document_code'] : $this->createCode();
		$data['document_added']	= date('Y-m-d H:i:s');

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
        $data									= array();
		$data['document_updated']		= date('Y-m-d H:i:s');

        return parent::update($data, $where);
    }
	
	/**
	 * get job by job document Id
 	 * @param string job id
     * @return object
	 */
	public function getByCode($code, $item = null) {
	
		switch($item) {
			case 'participant' :
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->joinLeft(array('participant' => 'participant'), 'participant.participant_code = document.document_item')
							->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))									
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = document.areapost_code')
							->where('document.document_code = ? and participant_deleted = 0', $code)
							->where('document.document_type = ?', $item)
							->group('participant.participant_code')
							->limit(1);			
			break;
			case 'payment' :
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->joinLeft(array('booking' => 'booking'), 'booking.booking_code = document.document_item')								
							->where('document.document_code = ? and participant_deleted = 0', $code)
							->where('document.document_type = ?', $item)
							->limit(1);			
			break;			
			default: 
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->where('document.document_code = ?', $code)
							->limit(1);
			break;
		}
		
		$result = $this->_db->fetchRow($select);
		return ($result == false) ? false : $result = $result;	      
	}
	
	/**
	 * get job by job document Id
 	 * @param string job id
     * @return object
	 */
	public function getByReference($code, $item) {
		
		switch($item) {
			case 'participant' :
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->joinLeft(array('participant' => 'participant'), 'participant.participant_code = document.document_item')
							->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))									
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = document.areapost_code')
							->where('document.document_item = ? and participant_deleted = 0', $code)
							->where('document.document_type = ?', $item)
							->group('participant.participant_code');	
			break;
			case 'payment' :
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->joinLeft(array('booking' => 'booking'), 'booking.booking_code = document.document_item')								
							->where('document.document_item = ? and participant_deleted = 0', $code)
							->where('document.document_type = ?', $item)
							->limit(1);			
			break;
			default: 
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->where('document.document_code = ?', $code)
							->limit(1);
			break;			
		}
		
		$result = $this->_db->fetchRow($select);
		return ($result == false) ? false : $result = $result;	      
	}
	
	/**
	 * get job by job document Id
 	 * @param string job id
     * @return object
	 */
	public function getAll($item) {
		
		switch($item) {
			case 'participant' :
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->joinLeft(array('participant' => 'participant'), 'participant.participant_code = document.document_item')
							->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))									
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = document.areapost_code')
							->where('document.document_type = ? and participant_deleted = 0', $item)
							->group('participant.participant_code');
			break;
			case 'payment' :
				$select = $this->_db->select()
							->from(array('document' => 'document'))
							->joinLeft(array('booking' => 'booking'), 'booking.booking_code = document.document_item')
							->where('document.document_type = ? and participant_deleted = 0', $item);			
			break;
			default: 
				$select = $this->_db->select()	
							->from(array('document' => 'document'))
							->where('document.document_code = ?', $code);
			break;				
		}
		
		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;	      
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($reference)
	{
		$select = $this->_db->select()	
						->from(array('document' => 'document'))	
					   ->where('document_code = ?', $reference)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		// $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet = '0123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<15;$i++){
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$documentCheck = $this->getCode($reference);
		
		if($documentCheck) {
			/* It exists. check again. */
			$this->createCode();
		} else {
			return $reference;
		}
	}
	
	public function download($code) {
		
		$documentData = $this->getByCode($code);
		
		if($documentData) {
		
			$PATH 	= $_SERVER['DOCUMENT_ROOT'].$documentData['document_path'];
			$MIME	= $this->_File->file_content_type($documentData['document_path']);

			header("Expires: on, 01 Jan 1970 00:00:00 GMT");
			header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");
			header("Content-Description: File Transfer");
			header("Content-Type: " . $MIME);
			header("Content-Length: " .(string)(filesize($PATH)) );
			header('Content-Disposition: attachment; filename="'.$documentData['document_name'].'"');
			header("Content-Transfer-Encoding: binary\n");

			readfile($PATH); // outputs the content of the file;
		
			exit;
			
		}
		
		header('Location: /404/');
		exit;
		
	}
	
}
?>