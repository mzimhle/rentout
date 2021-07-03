<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';

/* objects. */
require_once 'class/participant.php';

$participantObject	= new class_participant();

$hashcode = isset($_GET['code']) && trim($_GET['code']) != '' ? trim($_GET['code']) : -1;

$participantData = $participantObject->_participantlogin->getByHash($hashcode, 0);

if(!$participantData) {
	header('Location: /');
	exit;
}

$data = array();
$data['participant_active'] = 1;
$data['participant_code'] = $participantData['participant_code'];

$participantObject->updateParticipant($data, 'EMAIL');

/* Send email to participant. */
$participantObject->_comm->sendMail('templates/register/activate.html', 'REGISTER_EMAIL_LOGIN', $participantData, 'RentOut Registration Complete - Log In Details');

$smarty->assign('participantData', $participantData);

/* Display the template */	
$smarty->display('register/activate.tpl');

?>