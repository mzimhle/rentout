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

$participantData = $participantObject->_mailinglist->getByHash($hashcode, 0);

if(!$participantData) {
	header('Location: /');
	exit;
}

$smarty->assign('participantData', $participantData);

/* Display the template */	
$smarty->display('register/success.tpl');

?>