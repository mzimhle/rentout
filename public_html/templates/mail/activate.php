<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/** Standard includes */
require_once 'config/database.php';

/* Get parameter. */
$code = isset($_GET['code']) && trim($_GET['code']) != '' ? trim($_GET['code']) : '';

if($code == '') {

	/* Get the hell out of here. */
	header('Location: /404/');
	exit;
	
} else {
	
	require_once 'class/participant.php';
	
	/* Object. */
	$participantObject 			= new class_participant();

	/* Fetch the use. */
	$participantData = $participantObject->_mailinglist->getByHash($code, 0);

	if($participantData) {

		/* Activate account and stay on this page. */
		$data = array('participant_active' => 1, 'participant_code' => $participantData['participant_code']);
		$success	= $participantObject->updateParticipant($data, 'EMAIL');	

	} else {

		/* Get the hell out of here. */
		header('Location: /');
		exit;

	}
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://www.rentout.co.za/templates/booking/invoice/css/style.css">
	<link rel="stylesheet" href="http://www.rentout.co.za/templates/booking/invoice/css/print.css" media="print">
	<link rel='stylesheet'  href="http://www.rentout.co.za/templates/booking/invoice/css/fonts.css" type='text/css' />
</head>
<body>
	<div id="page-wrap">
		<p id="header">Booking Confirmation</p>
			<p>Good day <?php echo $participantData['participant_name'].' '.$participantData['participant_surname']; ?>,</p><br />
			<p>Your registration in our system has been activated, you have confirmed your email address. Thank you for joining our community.</p><br />
			<p>Kind Regards,</p>
			<p>RentOut Team</p>
		  <p id="header"></p>
	</div>
</body>
</html>