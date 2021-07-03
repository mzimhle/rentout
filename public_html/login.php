<?php
/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';
require_once 'class/participant.php';
//include the Zend class for Authentification

require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Adapter/DbTable.php';
require_once 'Zend/Session.php';

$zfsession = new Zend_Session_Namespace('WebsiteLogin');
$zfsession->setExpirationSeconds(3600);

// Get a reference to the singleton instance of Zend_Auth
$auth = Zend_Auth::getInstance();

// Set up the authentication adapter
$authAdapter = new Zend_Auth_Adapter_DbTable($conn);

if ( !empty($_POST) && !is_null($_POST)) {

	$username 	= (isset($_POST['email'])) ? $_POST['email'] : "-";
	$password		= (isset($_POST['password'])) ? $_POST['password'] : "-";
	
	$participantObject = new class_participant();
	$participantData = $participantObject->_participantlogin->checkLogin($username, $password);	
	
	if ($participantData) {
	
			// Identity exists; store in session
			$zfsession->identity	= $participantData['participant_code'];
			
			//record last login for user
			$data = array('participantlogin_lastlogin' => date('Y-m-d H:i:s'));
			$where = $participantObject->_participantlogin->getAdapter()->quoteInto('participantlogin_code = ?', $participantData['participantlogin_code']);
			$participantObject->_participantlogin->update($data, $where);
			//session_write_close();
			header("Location: /");
			exit;
			
	}else{
	
		$message = 'You are not a valid system user.';
		$smarty->assign( 'message', $message);
		
	}//end check for user
}

header('Location: /');
exit;

?>