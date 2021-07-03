<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

/**
 * Check for login
 */
require_once 'includes/auth.php';

/* objects. */
require_once 'class/booking.php';
require_once 'class/_comm.php';
require_once 'class/notice.php';

$bookingObject 	= new class_booking();
$commObject 	= new class_comm();
$noticeObject 	= new class_notice();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$bookingData = $bookingObject->getByCode($code);

	if(!$bookingData) {
		header('Location: /booking/');
		exit;
	}
	
	$noticeData = $noticeObject->getByBooking($code);
	
	if($noticeData) {
		$smarty->assign('noticeData', $noticeData);
	}
	
	$smarty->assign('bookingData', $bookingData);
	
} else {
	header('Location: /booking/');
	exit;
}

/* Check posted data. */
if(count($_POST) > 0) {
	
	$errorArray		= array();
	$data 				= array();
	$formValid		= true;
	$success			= NULL;
	
	if(isset($_POST['booking_message']) && trim($_POST['booking_message']) == '') {
		$errorArray['booking_message'] = 'Field is required, meeting location or cancellation details needed.';
		$formValid = false;		
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		$data 	= array();				
		$data['booking_active']		= isset($_POST['booking_active']) && (int)trim($_POST['booking_active']) == 1 ? 1 : 0;				
		$data['booking_message']	= trim($_POST['booking_message']);	

		/*Update. */
		$where		= $bookingObject->getAdapter()->quoteInto('booking_code = ?', $bookingData['booking_code']);
		$success	= $bookingObject->update($data, $where);
		
		$tempData = $bookingObject->getByCode($code);
		$comm = null;
		
		if($tempData) {
			if($tempData['booking_active'] == 1) {
				/* Emails. */
				$email = array();
				$email[] = $tempData['owner_email'];
				$email[] = 'booking@rentout.co.za';

				/* Attachment. */
				$attachment = array();
				$attachment[] = array('path' => realpath(__DIR__.'/../../public_html/').$tempData['booking_pdf'], 'name' => $tempData['booking_reference'].'.pdf');

				$comm = $commObject->sendMail(realpath(__DIR__.'/../../public_html/').'/templates/booking/invoice/confirmation.html', 'BOOKING_CONFIRMED', $tempData, 'Car booking confirmation #'.$tempData['booking_reference'], $email, $attachment);
			} else {
				/* Emails. */
				$email = array();
				$email[] = $tempData['owner_email'];
				$email[] = 'booking@rentout.co.za';

				$comm = $commObject->sendMail(realpath(__DIR__.'/../../public_html/').'/templates/booking/invoice/cancellation.html', 'BOOKING_CANCELLATION', $tempData, 'Car booking cancellation #'.$tempData['booking_reference'], $email);
			}
		}
		
		/* Save record. */
		$record = array();
		$record['_comm_code']		= $comm;
		$record['booking_code']		= $tempData['booking_code'];
		$record['notice_type']		= $data['booking_active'] == 1 ? 'CONFIRM' : 'CANCEL';
		$record['notice_message']	= $data['booking_message'];
		
		$noticeObject->insert($record);
		
		header('Location: /booking/payment.php?code='.$bookingData['booking_code']);
		exit;	
	}

	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);	

}

$smarty->display('booking/confirmation.tpl');

?>