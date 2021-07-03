<?php

require_once '_comm.php';
require_once 'mailinglist.php';
require_once 'participantlogin.php';
require_once 'File.php';

//custom account item class as account table abstraction
class class_participant extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'participant';
	protected $_primary			= 'participant_code';
	public $_comm						= null;
	public $_mailinglist				= null;
	public $_participantlogin		= null;
	public $_File							= null;
	
	function init()	{

		$this->_comm					= new class_comm();
		$this->_mailinglist 				= new class_mailinglist();
		$this->_participantlogin		= new class_participantlogin();
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
        $data['participant_added']		= date('Y-m-d H:i:s');
        $data['participant_code']		= $this->createCode();
		$data['participant_reference']	= $this->createReference();
		
		$success = parent::insert($data);	
		
		if($success) {
		
			$participantData = $this->getCode($success);			

			if($participantData) {
				/* Create a new mailerlist record. */
				$this->_mailinglist->insertMailinglist('participant', $participantData);						
			}
		}
		
		return $success;
    }
	
	public function insertParticipant(array $data, $type) {
		
		$insert										= array();
		$insert['participant_name']			= isset($data['participant_name']) && trim($data['participant_name']) != '' ? $data['participant_name'] : null;
		$insert['participant_surname']		= isset($data['participant_surname']) && trim($data['participant_surname']) != '' ? $data['participant_surname'] : null;
		$insert['participant_email']			= isset($data['participant_email']) && trim($data['participant_email']) != '' ? $data['participant_email'] : null;
		$insert['participant_idnumber']	= isset($data['participant_idnumber']) && trim($data['participant_idnumber']) != '' ? $data['participant_idnumber'] : null;
		$insert['areapost_code']				= isset($data['areapost_code']) && trim($data['areapost_code']) != '' ? $data['areapost_code'] : null;
		$insert['participant_active']			= isset($data['participant_active']) && trim($data['participant_active']) != '' ? $data['participant_active'] : 0;
		$insert['participant_passport']		= isset($data['participant_passport']) && trim($data['participant_passport']) != '' ? $data['participant_passport'] : null;
		$insert['participant_cellphone']	= isset($data['participant_cellphone']) && trim($data['participant_cellphone']) != '' ? $data['participant_cellphone'] : null;

		$code = $this->insert($insert);

		if($code) {
			/* Insert login data. */
			$participantData = $this->getCode($code);			
			
			if($participantData) {
				switch($type) {
					case 'EMAIL' : 
						/* Create a new login record. */
						$success = $this->_participantlogin->insertLogin($participantData, $type, $code);
						
						if($participantData['participant_active'] == 0) {
							
							$mailinglistData = $this->_participantlogin->getByParticipant($participantData['participant_code'], 'EMAIL');
							
							$this->_comm->sendMail(realpath(__DIR__.'/../../../../public_html/').'/templates/register/register_email.html', 'REGISTER_EMAIL', $mailinglistData, 'RentOut Registration - Email Verification');
						}
					break;
					/*
					case 'FACEBOOK' : 
						$success = $this->_participantlogin->insertLogin(array_merge($participantData, $data), $type, $code);						
						$this->_comm->sendMail($success, 'REGISTER_FACEBOOK', 'RentOut Successful Registration', 'templates/mail/registration_success.html');	
					break;
					case 'LINKEDIN' : 
						$success = $this->_participantlogin->insertLogin(array_merge($participantData, $data), $type, $code);						
						$this->_comm->sendMail($success, 'REGISTER_LINKEDIN', 'RentOut Successful Registration', 'templates/mail/registration_success.html');		
					break;
					case 'GOOGLE' : 
						$success = $this->_participantlogin->insertLogin(array_merge($participantData, $data), $type, $code);						
						$this->_comm->sendMail($success, 'REGISTER_GOOGLE', 'RentOut Successful Registration', 'templates/mail/registration_success.html');		
					break;
					*/
				}
				return $code;
			}		
		}
		
		return $code;
	}
	
	public function updateParticipant(array $data, $type) {

		if(isset($data['participant_code'])) {
			
			/* Update participant. */
			$partwhere = $this->getAdapter()->quoteInto('participant_code = ?', $data['participant_code']);
			parent::update($data, $partwhere);
			
			/* Update mailinglist. */
			$tempData = $this->getByCode($data['participant_code']);

			if($tempData) {
				$this->_mailinglist->updateMailinglist('participant', $tempData);
				
				/* Update participantlogin. */
				$loginwhere = array();
				$loginwhere[] = $this->_participantlogin->getAdapter()->quoteInto('participant_code = ?', $tempData['participant_code']);
				$loginwhere[] = $this->_participantlogin->getAdapter()->quoteInto('participantlogin_type = ?', $type);
				
				$this->_participantlogin->updateLogin($tempData, $loginwhere, $type);	
				
				return $tempData['participant_code'];
			}
			
			return false;
		} else {
			return false;
		}
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
         $data['participant_updated'] = date('Y-m-d H:i:s');
        
        $success = parent::update($data, $where);
		
		$tempData = $this->getByCode($data['participant_code']);

		$this->_mailinglist->updateMailinglist('participant', $tempData);
		
		return $data['participant_code'];
    }
	
	/**
	 * get job by job participant Id
 	 * @param string job id
     * @return object
	 */
	public function checkEmail($email) {	
		$select = $this->_db->select()	
							->from(array('participant' => 'participant'))	
							->where('participant_email = ?', $email)
							->where('participant_deleted = 0');

	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}
	
	public function getAll($where = 'participant_deleted = 0', $order = 'participant_deleted desc')	{
	
		$select = $this->_db->select()	
						->from(array('participant' => 'participant'))
						->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
						->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))
						->where($where)
						->where('participant_deleted = 0')
						->group('participant.participant_code')
						->order($order);

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	public function search($query, $limit = 20) {
		
			$select = $this->_db->select()
							->from(array('participant' => 'participant'), array('participant.participant_code', 'participant.participant_name', 'participant.participant_surname', 'participant.participant_email', 'participant.participant_cellphone'))		
						   ->where("concat(participant.participant_name, participant_surname, participant_email, participant_cellphone) like lower(?)", "%$query%")
						   ->limit($limit)
						   ->order("LOCATE('$query', participant.participant_name)");
		
	   $result = $this->_db->fetchAll($select);	
        return ($result == false) ? false : $result = $result;					

	}
	
	public function communication() {
	
		$select = $this->_db->select()	
						->from(array('participant' => 'participant'))
						->joinLeft('_comm', '_comm.participant_code = participant.participant_code')
						->where('participant_deleted = 0')
						->order('_comm._comm_added desc');

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
						->from(array('participant' => 'participant'))	
						->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
						->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))
						->joinLeft(array('mailinglist' => 'mailinglist'), "participant.participant_code = mailinglist.mailinglist_reference and mailinglist_category = 'participant'")
					   ->where('participant.participant_code = ?', $code)					   
					   ->where('participant_deleted = 0')
					   ->group('participant.participant_code')
					   ->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByHash($hashcode, $active)
	{
		$select = $this->_db->select()	
						->from(array('participant' => 'participant'))	
						->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
						->joinLeft('participantlogin', 'participantlogin.participant_code = participant.participant_code and participantlogin_deleted = 0', array('participantlogin_type' =>new Zend_Db_Expr('GROUP_CONCAT(DISTINCT participantlogin.participantlogin_type)')))
						->joinLeft(array('mailinglist' => 'mailinglist'), "participant.participant_code = mailinglist.mailinglist_reference and mailinglist_category = 'participant'")
					   ->where('participant.participant_code = ?', $code)					   
					   ->where('participant_deleted = 0')
					   ->group('participant.participant_code')
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
						->from(array('participant' => 'participant'))	
					   ->where('participant_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getReference($code)
	{
		$select = $this->_db->select()	
						->from(array('participant' => 'participant'))	
					   ->where('participant_reference = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<7;$i++){
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		$reference = $reference.time();
		
		/* First check if it exists or not. */
		$itemCheck = $this->getCode($reference);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createCode();
		} else {
			return $reference;
		}
	}

	function createReference() {
		/* New reference. */
		$reference = "";
		$codeNumbers = '123456789';
		$codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<2;$i++){
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		$count = strlen($codeNumbers) - 1;
		
		for($i=0;$i<3;$i++){
			$reference .= $codeNumbers[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$itemCheck = $this->getReference($reference);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createReference();
		} else {
			return $reference;
		}
	}

	/**
	 * get job by job participant Id
 	 * @param string job id
     * @return object
	 */
	public function getByCell($cell, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('participant' => 'participant'))	
						->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
						->where('participant_cellphone = ?', $cell)
						->where('participant_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('participant' => 'participant'))	
						->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
						->where('participant_cellphone = ?', $cell)
						->where('participant_code != ?', $code)
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
	public function getByEmail($email, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('participant' => 'participant'))	
						->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
						->where('participant_email = ?', $email)
						->where('participant_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('participant' => 'participant'))	
						->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
						->where('participant_email = ?', $email)
						->where('participant_code != ?', $code)
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
	public function getByIDnumber($idnumber, $code = null)
	{
		if($code == null) {
		$select = $this->_db->select()	
					->from(array('participant' => 'participant'))	
					->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
					->where('participant_idnumber = ?', $idnumber)
					->where('participant_deleted = 0')
					->limit(1);
       } else {
		$select = $this->_db->select()	
					->from(array('participant' => 'participant'))	
					->joinLeft('areapost', 'areapost.areapost_code = participant.areapost_code')
					->where('participant_idnumber = ?', $idnumber)
					->where('participant_code != ?', $code)
					->where('participant_deleted = 0')
					->limit(1);		
	   }
	   
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}	
	
	public function validateIDnumber($idnr) {	
		if(strlen(trim($idnr)) == 13) {
			if(preg_match('/([0-9][0-9])(([0][1-9])|([1][0-2]))(([0-2][0-9])|([3][0-1]))([0-9])([0-9]{3})([0-9])([0-9])([0-9])/', trim($idnr))) {
				return trim($idnr);
			} else {
				return '';
			}
		} else {
			return '';
		}
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
	
	public function download($code, $imagesize = 'thumb') {
		
		$random = md5(date('Y-m-d H:i:s'));
		
		$profileData = $this->getByCode($code);

		if($profileData && isset($profileData) && trim($profileData['participant_image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$profileData['participant_image_path'].$this->_File->logo[$imagesize]['code'].$profileData['participant_image_name'].$profileData['participant_image_ext'];
				$MIME	= $this->_File->file_content_type($profileData['participant_image_path'].$this->_File->logo[$imagesize]['code'].$profileData['participant_image_name'].$profileData['participant_image_ext']);

				header("Pragma: public");
				header('Cache-Control: max-age=86400');
				header("Expires: on, 01 Jan 1970 00:00:00 GMT");
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