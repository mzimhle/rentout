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
require_once 'class/car.php';
require_once 'class/price.php';

$bookingObject 			= new class_booking();
$carObject 			= new class_car();
$priceObject	= new class_price();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$bookingData = $bookingObject->getByCode($code);

	if(!$bookingData) {
		header('Location: /booking/');
		exit;
	}
	
	$smarty->assign('bookingData', $bookingData);
	
} else if((isset($_GET['startdate']) && trim($_GET['startdate']) != '') && (isset($_GET['enddate']) && trim($_GET['enddate']) != '')){
	/* We are adding a new booking. */
	
	$startdate = trim($_REQUEST['startdate']); 
	$enddate = trim($_REQUEST['enddate']); 

	if((date('Y-m-d', strtotime($startdate)) == $startdate) && (date('Y-m-d', strtotime($enddate)) == $enddate)) {		
		
		$smarty->assign('startdate', $startdate);
		$smarty->assign('enddate', $enddate);
		
	} else {
		header('Location: /booking/');
		exit;		
	}
}

/* Ajax */
if(isset($_GET['car_code_search'])) {

	$carcode		= (isset($_GET['car_code_search']) && $_GET['car_code_search'] != '') ? $_GET['car_code_search'] : '';
	$pricecode = isset($bookingData['price_code']) ? $bookingData['price_code'] : '';
	
	if ($carcode != '') {
		
		$html = '';
		
		$priceData = $priceObject->getByProduct($carcode);
		
		$html .= '<select name="price_code" id="price_code">';
		$html .= '<option value=""> ---- </option>';
		if($priceData) {
			foreach($priceData as $item) {
				$SELECTED = '';
				if($item['car_code'] == $pricecode) $SELECTED = 'SELECTED';
				
				$html .= '<option '.$SELECTED.' value="'.$item['price_code'].'" label="'.$item['price_name'].' - R '.$item['price_price'].'">'.$item['price_name'].' - R '.$item['price_price'].'</option>';	
			}
		}
		$html .= '</select>'; 
		echo $html;		
	}
	
	exit;
}

/* Ajax */
if(isset($_REQUEST['addpayment'])) {

	$errorArray					= array();
	$errorArray['message']	= '';
	$errorArray['result']		= 1;
	$error							= array();
	
	if(trim($_REQUEST['payment_amount']) == '') {
		$error[] = 'Amount required. ';
		$errorArray['result'] = 0;		
	}

	if(trim($_REQUEST['payment_paid']) == '') {
		$error[] = 'Payment date. ';
		$errorArray['result'] = 0;		
	}
	
	if(count($error) == 0 && $errorArray['result'] == 1) {
		
		$data = array();
		$data['booking_code'] 			= $bookingData['booking_code'];
		$data['payment_amount'] 		= trim($_REQUEST['payment_amount']);
		$data['payment_description'] 	= trim($_REQUEST['payment_description']);
		$data['payment_paid'] 			= trim($_REQUEST['payment_paid']);
		
		$success = $bookingObject->_payment->insert($data);
	}
	
	if($errorArray['result']) {		
		$errorArray['message']	= '';		
	} else {
		$errorArray['message']	= 'Could not update, please try again: '.implode(", ", $error);		
	}	
	
	echo json_encode($errorArray);
	exit;
}

/* Check posted data. */
if(isset($_REQUEST['removepayment'])) {

	$errorArray					= array();
	$errorArray['message']	= '';
	$errorArray['result']		= true;
	
	if(isset($_REQUEST['code_delete']) && trim($_REQUEST['code_delete']) == '') {
		$error[] = 'Please select item to delete';
		$formValid = false;		
	}	
	
	if($formValid && count($error)  == 0 ) {
	
		$data = array();
		$data['payment_deleted'] = 1;
		
		$where		= $bookingObject->_payment->getAdapter()->quoteInto('payment_code = ?',  trim($_REQUEST['payment_code']));
		$success	= $bookingObject->_payment->update($data, $where);	
	}
	
	if($success) {		
		$errorArray['message']	= '';
		$errorArray['result']	= 1;				
	} else {
		$errorArray['message']	= 'Could not update, please try again: '.implode(", ", $error);
		$errorArray['result']	= 0;				
	}	
	
	echo json_encode($errorArray);
	exit;
	
}

/* Check posted data. */
if(count($_POST) > 0) {
	
	$errorArray		= array();
	$data 				= array();
	$formValid		= true;
	$success			= NULL;
	
	if(isset($_POST['car_code']) && trim($_POST['car_code']) == '') {
		$errorArray['car_code'] = 'Car to be rented is required';
		$formValid = false;		
	}
	
	
	if(isset($_POST['booking_startdate']) && date('Y-m-d', strtotime(trim($_POST['booking_startdate']))) != trim($_POST['booking_startdate'])) {
		$errorArray['booking_startdate'] = 'Start date of booking is required';
		$formValid = false;		
	}
	
	if(isset($_POST['booking_enddate']) && date('Y-m-d', strtotime(trim($_POST['booking_enddate']))) != trim($_POST['booking_enddate'])) {
		$errorArray['booking_enddate'] = 'End date of booking is required';
		$formValid = false;		
	}
	
	if(isset($_POST['participant_code']) && trim($_POST['participant_code']) == '') {
		$errorArray['participant_code'] = 'Person making the booking is required';
		$formValid = false;		
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		$bookedcode = isset($bookingData) ? $bookingData['booking_code'] : null;
		
		$checkBooking = $bookingObject->checkBookingByCar(trim($_POST['car_code']), trim($_POST['booking_startdate']), trim($_POST['booking_enddate']), $bookedcode);

		if($checkBooking) {
			$errorArray['car_code'] = 'Car already has been booked on this date.';
			$formValid = false;				
		}
		
		$carData = $carObject->getByCode(trim($_POST['car_code']));
		
		if($carData) {
			if($carData['participant_code'] == trim($_POST['participant_code'])) {
				$errorArray['car_code'] = 'Car owner cannot book his/her own car';
				$formValid = false;					
			}
		} else {	
			$errorArray['car_code'] = 'Car selected is not valid or does not exist';
			$formValid = false;	
		}		
	}
		
	if(count($errorArray) == 0 && $formValid == true) {
		
		$data 	= array();				
		$data['participant_code']	= trim($_POST['participant_code']);		
		$data['car_code']				= trim($_POST['car_code']);										
		$data['booking_startdate']	= trim($_POST['booking_startdate']);		
		$data['booking_enddate']	= trim($_POST['booking_enddate']);				

		if(isset($bookingData)) {
			/*Update. */
			$where		= $bookingObject->getAdapter()->quoteInto('booking_code = ?', $bookingData['booking_code']);
			$success	= $bookingObject->updateBooking($data, $where, $bookingData['booking_code']);
			$success = $bookingData['booking_code'];
		} else {
			$success = $bookingObject->insert($data);		
		}
		
		header('Location: /booking/confirmation.php?code='.$success);
		exit;	
	}

	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);	

}

$smarty->display('booking/details.tpl');

?>