<?php

//custom account item class as account table abstraction
class class_mailinglist extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 		= 'mailinglist';
	protected $_primary	= 'mailinglist_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 
	
	public function insertMailinglist($type, array $data) {
		
		$data['mailinglist_category'] = $type;
		return $this->insert($data);
	}
	
	public function insert(array $data) {
		
        // add a timestamp
        $idata	= array();			
		$idata['mailinglist_code']		= $this->createReference();
		$idata['mailinglist_added']		= date('Y-m-d H:i:s');
		$idata['mailinglist_hashcode']	= md5($idata['mailinglist_added']);	
		
		switch($data['mailinglist_category']) {			
			case 'participant' :
				$idata['mailinglist_reference']	= $data['participant_code'];		
				$idata['mailinglist_category']	= $data['mailinglist_category'];		
				$idata['mailinglist_name']		= $data['participant_name'];
				$idata['mailinglist_surname']	= $data['participant_surname'];	
				$idata['mailinglist_email']		= $data['participant_email'];
				$idata['mailinglist_cellphone']	= $data['participant_cellphone'];	
				$idata['areapost_code']			= $data['areapost_code'];
				$idata['mailinglist_active']		= $data['participant_active'];				
			break;
			case 'enquiry' :
				$idata['mailinglist_reference']	= $data['enquiry_code'];		
				$idata['mailinglist_category']	= $data['mailinglist_category'];		
				$idata['mailinglist_name']		= $data['enquiry_name'];	
				$idata['mailinglist_email']		= $data['enquiry_email'];	
				$idata['mailinglist_cellphone']	= $data['enquiry_cellphone'];	
				$idata['areapost_code']			= $data['areapost_code'];	
				$idata['mailinglist_active']		= $data['enquiry_active'];	
			break;				
		}

		return parent::insert($idata);	
    }
	
	public function updateMailinglist($type, array $data) {
		
		$data['mailinglist_category'] = $type;
		
		$where		= array();
		$where[]	= $this->getAdapter()->quoteInto('mailinglist_category = ?', $type);
		
		switch($type) {
			case 'participant' :
				$where[]	= $this->getAdapter()->quoteInto('mailinglist_reference = ?', $data['participant_code']);				
				break;
			case 'enquiry' :
				$where[]	= $this->getAdapter()->quoteInto('mailinglist_reference = ?', $data['enquiry_code']);				
				break;				
		}

		return $this->update($data, $where);
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
        $idata							= array();
		$idata['mailinglist_category']	= $data['mailinglist_category'];
		$data['mailinglist_updated'] 	= date('Y-m-d H:i:s');
		
		switch($data['mailinglist_category']) {
			case 'participant' :
				$idata['mailinglist_reference']	= $data['participant_code'];		
				$idata['mailinglist_category']	= $data['mailinglist_category'];		
				$idata['mailinglist_name']		= $data['participant_name'];
				$idata['mailinglist_surname']	= $data['participant_surname'];	
				$idata['mailinglist_email']		= $data['participant_email'];
				$idata['mailinglist_cellphone']	= $data['participant_cellphone'];	
				$idata['areapost_code']			= $data['areapost_code'];
				$idata['mailinglist_active']		= $data['participant_active'];				
			break;
			case 'enquiry' :
				$idata['mailinglist_reference']	= $data['enquiry_code'];		
				$idata['mailinglist_category']	= $data['mailinglist_category'];		
				$idata['mailinglist_name']		= $data['enquiry_name'];	
				$idata['mailinglist_email']		= $data['enquiry_email'];	
				$idata['mailinglist_cellphone']	= $data['enquiry_cellphone'];	
				$idata['areapost_code']			= $data['areapost_code'];	
				$idata['mailinglist_active']		= $data['enquiry_active'];	
			break;					
		}

        return parent::update($idata, $where);
    }
	
	/**
	 * get job by job mailinglist Id
 	 * @param string job id
     * @return object
	 */
	public function getByCode($code, $category = null) {
	
		switch($category) {
			case 'participant' :
				$select = $this->_db->select()	
							->from(array('mailinglist' => 'mailinglist'))
							->joinLeft(array('participant' => 'participant'), 'participant.participant_code = mailinglist.mailinglist_reference')
							->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))									
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = mailinglist.areapost_code')
							->where('mailinglist.mailinglist_code = ? and participant_deleted = 0', $code)
							->group('mailinglist.mailinglist_code')
							->limit(1);			
			break;
			case 'enquiry' :
				$select = $this->_db->select()	
							->from(array('mailinglist' => 'mailinglist'))
							->joinLeft(array('enquiry' => 'enquiry'), 'enquiry.enquiry_code = mailinglist.mailinglist_reference')
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = mailinglist.areapost_code')
							->where('mailinglist.mailinglist_code = ? and enquiry_deleted = 0', $code)
							->limit(1);
			break;				
		}
		
		$result = $this->_db->fetchRow($select);
		return ($result == false) ? false : $result = $result;	      
	}
	
	/**
	 * get job by job mailinglist Id
 	 * @param string job id
     * @return object
	 */
	public function getByHash($code, $active) {	
		$select = $this->_db->select()	
					->from(array('mailinglist' => 'mailinglist'))
					->joinLeft(array('participant' => 'participant'), 'participant.participant_code = mailinglist.mailinglist_reference and participant_deleted = 0')
					->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))		
					->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = mailinglist.areapost_code')
					->where('mailinglist.mailinglist_hashcode = ?', $code)
					->where('mailinglist.mailinglist_active = ?', $active)
					->group('mailinglist.mailinglist_code')
					->limit(1);
		
		$result = $this->_db->fetchRow($select);
		return ($result == false) ? false : $result = $result;	      
	}
	
	/**
	 * get job by job mailinglist Id
 	 * @param string job id
     * @return object
	 */
	public function getByReference($code, $category) {
		
		switch($category) {
			case 'participant' :
				$select = $this->_db->select()	
							->from(array('mailinglist' => 'mailinglist'))
							->joinLeft(array('participant' => 'participant'), 'participant.participant_code = mailinglist.mailinglist_reference')
							->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))							
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = mailinglist.areapost_code')
							->where('mailinglist.mailinglist_reference = ? and participant_deleted = 0', $code)
							->group('mailinglist.mailinglist_code')
							->limit(1);			
			break;
			case 'enquiry' :
				$select = $this->_db->select()	
							->from(array('mailinglist' => 'mailinglist'))
							->joinLeft(array('enquiry' => 'enquiry'), 'enquiry.enquiry_code = mailinglist.mailinglist_reference')
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = mailinglist.areapost_code')
							->where('mailinglist.mailinglist_reference = ? and enquiry_deleted = 0', $code)
							->limit(1);
			break;				
		}
		
		$result = $this->_db->fetchRow($select);
		return ($result == false) ? false : $result = $result;	      
	}
	
	/**
	 * get job by job mailinglist Id
 	 * @param string job id
     * @return object
	 */
	public function getAll($category) {
		
		switch($category) {
			case 'participant' :
				$select = $this->_db->select()	
							->from(array('mailinglist' => 'mailinglist'))
							->joinLeft(array('participant' => 'participant'), 'participant.participant_code = mailinglist.mailinglist_reference')
							->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))							
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = mailinglist.areapost_code')
							->where('mailinglist.mailinglist_deleted = 0 and participant_deleted = 0')
							->group('mailinglist.mailinglist_code');			
			break;
			case 'enquiry' :
				$select = $this->_db->select()	
							->from(array('mailinglist' => 'mailinglist'))
							->joinLeft(array('enquiry' => 'enquiry'), 'enquiry.enquiry_code = mailinglist.mailinglist_reference')
							->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = mailinglist.areapost_code')
							->where('mailinglist.mailinglist_deleted = 0 and enquiry_deleted = 0');
			break;				
		}
		
		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;	      
	}
	
	/**
	 * get job by job participant Id
 	 * @param string job id
     * @return object
	 */
	public function getByEmail($email, $type, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('mailinglist' => 'mailinglist'))	
						->joinLeft('areapost', 'areapost.areapost_code = mailinglist.areapost_code')
						->joinLeft('participant', "participant.participant_code = mailinglist.mailinglist_reference")
						->where('mailinglist.mailinglist_category = ?', $type)
						->where('mailinglist_email = ?', $email)
						->where('participant_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('mailinglist' => 'mailinglist'))	
						->joinLeft('areapost', 'areapost.areapost_code = mailinglist.areapost_code')
						->joinLeft('participant', "participant.participant_code = mailinglist.mailinglist_reference")
						->where('mailinglist.mailinglist_category = ?', $type)
						->where('mailinglist_email = ?', $email)
						->where('mailinglist_code = ?', $code)
						->where('participant_deleted = 0')
						->limit(1);	
	   }
	   
	   $result = $this->_db->fetchRow($select);
       return ($result == false) ? false : $result = $result;
	}
	
	/**
	 * get job by job participant Id
 	 * @param string job id
     * @return object
	 */
	public function getByCell($cell, $type, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('mailinglist' => 'mailinglist'))	
						->joinLeft('areapost', 'areapost.areapost_code = mailinglist.areapost_code')
						->joinLeft('participant', "participant.participant_code = mailinglist.mailinglist_reference")
						->where('mailinglist.mailinglist_category = ?', $type)
						->where('mailinglist_cellphone = ?', $cell)
						->where('participant_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('mailinglist' => 'mailinglist'))	
						->joinLeft('areapost', 'areapost.areapost_code = mailinglist.areapost_code')
						->joinLeft('participant', "participant.participant_code = mailinglist.mailinglist_reference")
						->where('mailinglist.mailinglist_category = ?', $type)
						->where('mailinglist_cellphone = ?', $cell)
						->where('mailinglist_code = ?', $code)
						->where('participant_deleted = 0')
						->limit(1);	
	   }
	   
	   $result = $this->_db->fetchRow($select);
       return ($result == false) ? false : $result = $result;
	}
	
	public function validateEmail($string) {
		if(preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', trim($string))) {
			return trim($string);
		} else {
			return '';
		}
	}
	
	public function validateCell($string) {
		if(preg_match('/^0[0-9]{9}$/', $this->onlyCellNumber(trim($string)))) {
			return $this->onlyCellNumber(trim($string));
		} else {
			return '';
		}
	}
	
	public function onlyCellNumber($string) {

		/* Remove some weird charactors that windows dont like. */
		$string = strtolower($string);
		$string = str_replace(' ' , '' , $string);
		$string = str_replace('__' , '' , $string);
		$string = str_replace(' ' , '' , $string);
		$string = str_replace("é", "", $string);
		$string = str_replace("è", "", $string);
		$string = str_replace("`", "", $string);
		$string = str_replace("/", "", $string);
		$string = str_replace("\\", "", $string);
		$string = str_replace("'", "", $string);
		$string = str_replace("(", "", $string);
		$string = str_replace(")", "", $string);
		$string = str_replace("-", "", $string);
		$string = str_replace(".", "", $string);
		$string = str_replace("ë", "", $string);	
		$string = str_replace('___' , '' , $string);
		$string = str_replace('__' , '' , $string);	
		$string = str_replace(' ' , '' , $string);
		$string = str_replace('__' , '' , $string);
		$string = str_replace(' ' , '' , $string);
		$string = str_replace("é", "", $string);
		$string = str_replace("è", "", $string);
		$string = str_replace("`", "", $string);
		$string = str_replace("/", "", $string);
		$string = str_replace("\\", "", $string);
		$string = str_replace("'", "", $string);
		$string = str_replace("(", "", $string);
		$string = str_replace(")", "", $string);
		$string = str_replace("-", "", $string);
		$string = str_replace(".", "", $string);
		$string = str_replace("ë", "", $string);	
		$string = str_replace("â€“", "", $string);	
		$string = str_replace("â", "", $string);	
		$string = str_replace("€", "", $string);	
		$string = str_replace("“", "", $string);	
		$string = str_replace("#", "", $string);	
		$string = str_replace("$", "", $string);	
		$string = str_replace("@", "", $string);	
		$string = str_replace("!", "", $string);	
		$string = str_replace("&", "", $string);	
		$string = str_replace(';' , '' , $string);		
		$string = str_replace(':' , '' , $string);		
		$string = str_replace('[' , '' , $string);		
		$string = str_replace(']' , '' , $string);		
		$string = str_replace('|' , '' , $string);		
		$string = str_replace('\\' , '' , $string);		
		$string = str_replace('%' , '' , $string);	
		$string = str_replace(';' , '' , $string);		
		$string = str_replace(' ' , '' , $string);
		$string = str_replace('__' , '' , $string);
		$string = str_replace(' ' , '' , $string);	
		$string = str_replace('-' , '' , $string);	
		$string = str_replace('+27' , '0' , $string);	
		$string = str_replace('(0)' , '' , $string);	
		
		$string = preg_replace('/^00/', '0', $string);
		$string = preg_replace('/^27/', '0', $string);
		
		$string = preg_replace('!\s+!',"", strip_tags($string));
		
		return $string;				
	}	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($reference)
	{
		$select = $this->_db->select()	
						->from(array('mailinglist' => 'mailinglist'))	
					   ->where('mailinglist_code = ?', $reference)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createReference() {
		/* New reference. */
		$reference = "";
		// $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet = '0123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<10;$i++){
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$itemCheck = $this->getCode($reference);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createReference();
		} else {
			return $reference;
		}
	}
}
?>