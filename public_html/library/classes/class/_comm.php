<?php

//custom account item class as account table abstraction
class class_comm extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 		= '_comm';
	protected $_primary	= '_comm_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['_comm_added'] 	= date('Y-m-d H:i:s');
        $data['_comm_code'] 	= isset($data['_comm_code']) ? $data['_comm_code'] : $this->createReference();        		
		
		return parent::insert($data);		
    }
	
	/**
	 * get job by job _comm Id
 	 * @param string job id
     * @return object
	 */
	public function viewComm($code) {
		$select = $this->_db->select()	
					->from(array('_comm' => '_comm'))				
					->joinLeft('mailinglist', 'mailinglist.mailinglist_code = _comm.mailinglist_code and mailinglist_deleted = 0')		
					->where('_comm_code = ?', $code)					
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
       return ($result == false) ? false : $result = $result;
	}	
	
	/**
	 * get job by job _comm Id
 	 * @param string job id
     * @return object
	 */
	public function getByCode($code)
	{		
		$select = $this->_db->select()	
					->from(array('_comm' => '_comm'))				
					->joinLeft('mailinglist', 'mailinglist.mailinglist_code = _comm.mailinglist_code and mailinglist_deleted = 0')				
					->where('_comm_code = ?', $code)					
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}

	/**
	 * get job by job _comm Id
 	 * @param string job id
     * @return object
	 */
	public function getByReference($reference)
	{		
		$select = $this->_db->select()
					->from(array('_comm' => '_comm'))				
					->joinLeft('mailinglist', 'mailinglist.mailinglist_code = _comm.mailinglist_code and mailinglist_deleted = 0')
					->where('_comm._comm_reference = ?', $reference);
       
		$result = $this->_db->fetchAll($select);
        return ($result == false) ? false : $result = $result;

	}
	
	public function sendMail($template, $reference, $mailinglist, $subject, $to = array(), $attachment = array()) {
		
		require_once 'config/smarty.php';
		
		global $smarty;
		
		require_once('Zend/Mail.php');
		
		$mail = new Zend_Mail();
		$data				= array();
		$data['_comm_code']	= $this->createReference();
		
		$smarty->assign('mailinglist', $mailinglist);	
		$smarty->assign('tracking', $data['_comm_code']);
		$smarty->assign('domain', $_SERVER['HTTP_HOST']);
		
		$message = $smarty->fetch($template);

		/* Check for attachements. */
		for($i=0; $i < count($attachment); $i++) {
			$at = new Zend_Mime_Part(file_get_contents($attachment[$i]['path']));
			$at->disposition = Zend_Mime::DISPOSITION_INLINE;
			$at->encoding 	= Zend_Mime::ENCODING_BASE64;
			$at->filename 	= $attachment[$i]['name'];
			$mail->addAttachment($at);
		}

		$mail->setFrom('info@rentout.co.za', 'RentOut'); //EDIT!!		
		$mail->addTo($mailinglist['mailinglist_email']);
		
		/* Check for attachements. */
		for($z=0; $z < count($to); $z++) {
			$mail->addTo($to[$z]);
		}
		$mail->setSubject($subject);
		$mail->setBodyHtml($message);			

		/* Save data to the comms table. */
		$data['mailinglist_code']		= $mailinglist['mailinglist_code'];
		$data['_comm_type']			= 'EMAIL';
		$data['_comm_name']		= $subject;
		$data['_comm_sent']			= 0;
		$data['_comm_email']		= $mailinglist['mailinglist_email'];
		$data['_comm_html']			= $message;
		$data['_comm_reference']	= $reference;
		
		$this->insert($data);

		try {
			$mail->send();
			$data['_comm_sent']	= 1;	
			$data['_comm_output']	= 'Email Sent!';
			
		} catch (Exception $e) {
			$data['_comm_sent']		= 0;	
			$data['_comm_output']	= $e->getMessage();
		}
		
		$where = $this->getAdapter()->quoteInto('_comm_code = ?', $data['_comm_code']);
		$success = $this->update($data, $where);
		
		$mail = null; unset($mail);
		$return = $data['_comm_sent'] == 1 ? $data['_comm_code'] : false;
		
		return $return;
	}
	
	public function sendSMS($message, $mailinglist, $reference) {		
		
		$user 			= "willowvine"; 
		$password 	= "DUJbgGdNRXROaA"; 
		$api_id 			= "3420082"; 
		$baseurl 		="http://api.clickatell.com"; 
		$text 			= urlencode($message); 
		$to 				= $mailinglist['mailinglist_cellphone']; 
		
		$data		= array();
		$data['_comm_code']			= $this->createReference();
		$data['_comm_type']			= 'SMS';
		$data['_comm_cell']			= $mailinglist['mailinglist_cellphone'];
		$data['mailinglist_code']		= $mailinglist['mailinglist_code'];
		$data['_comm_reference']	= $reference;
		$data['_comm_output']		= '';
		$data['_comm_fullname']	= $mailinglist['mailinglist_name'].' '.$mailinglist['mailinglist_surname'];
		$data['_comm_sent']			= null;
		$data['_comm_message']	= $message;
		$data['_comm_name']		= $reference;
					
		if( preg_match( "/^0[0-9]{9}$/", trim($mailinglist['mailinglist_cellphone']))) {
			
			$url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id"; 

			// do auth call 
			$ret = file($url); 

			// split our response. return string is on first line of the data returned 

			$sess = explode(":",$ret[0]); 
			
			if ($sess[0] == "OK") {
			
				$sess_id = trim($sess[1]); // remove any whitespace 
				
				$url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text"; 
				
				// do sendmsg call 
				$ret = file($url); 
				
				$send = explode(":",$ret[0]); 
				
				if ($send[0] == "ID") { 																						
					$data['_comm_output']	= 'Success! : '.$send[0].' : '.$send[1];
					$data['_comm_sent']		= 1;					
				} else  {
					$data['_comm_output']	= 'Send message failed : '.$send[0].' : '.$send[1];
					$data['_comm_sent']		= 0;	  
				}
			} else { 
				$data['_comm_output']	= "Authentication failure: ". $ret[0]; 
				$data['_comm_sent']		= 0;	  
			} 
		} else {
			$data['_comm_output']	=  "Invalid number ".$mailinglist['mailinglist_cellphone'];	
			$data['_comm_sent']		= 0;		  
		}
		
		$this->insert($data);
		
		return $data['_comm_sent'];
		
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($reference)
	{
		$select = $this->_db->select()	
						->from(array('_comm' => '_comm'))		
					   ->where('_comm_code = ?', $reference)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;				   		
	}
	
	function createReference() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = "123456789";

		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<15;$i++) {
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

	function reference() {
		return date('Y-m-d-H:i:s');
	}	
}
?>