<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'includes/auth.php';

/* objects. */
require_once 'class/booking.php';
require_once 'class/payment.php';
require_once 'class/document.php';

$bookingObject		= new class_booking();
$paymentObject 	= new class_payment();
$documentObject 	= new class_document();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$bookingData = $bookingObject->getByCode($code);

	if($bookingData) {
		$smarty->assign('bookingData', $bookingData);
		
		$paymentData = $paymentObject->getByBooking($bookingData['booking_code']);

		if($paymentData) {
			$smarty->assign('paymentData', $paymentData);
		}	
	} else {
		header('Location: /booking/');
		exit;	
	}
	
} else {
	header('Location: /booking/');
	exit;	
}

/* Check posted data. */
if(isset($_GET['payment_code_delete'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;	
	$formValid				= true;
	$success					= NULL;
	$itemcode					= trim($_GET['payment_code_delete']);
		
	if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {	
		$data	= array();
		$data['payment_deleted'] = 1;
		
		$where		= array();
		$where[]	= $paymentObject->getAdapter()->quoteInto('payment_code = ?', $itemcode);
		$where[]	= $paymentObject->getAdapter()->quoteInto('booking_code = ?', $bookingData['booking_code']);
		
		$success	= $paymentObject->update($data, $where);	
		
		if(is_numeric($success) && $success > 0) {		
			$errorArray['error']	= '';
			$errorArray['result']	= 1;			
		} else {
			$errorArray['error']	= 'Could not delete, please try again.';
			$errorArray['result']	= 0;				
		}
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

	if(isset($_POST['payment_amount']) && ((int)trim($_POST['payment_amount']) == '' || !is_numeric(trim($_POST['payment_amount'])))) {
		$errorArray['payment_amount'] = 'Please add the amount paid';
		$formValid = false;		
	}
	
	if(isset($_POST['payment_date']) && date('Y-m-d', strtotime(trim($_POST['payment_date']))) != trim($_POST['payment_date'])) {
		$errorArray['payment_date'] = 'Please add the date of payment';
		$formValid = false;		
	} 
	
	if(isset($_FILES['paymentfile'])) {
		/* Check validity of the CV. */
		if((int)$_FILES['paymentfile']['size'] != 0 && trim($_FILES['paymentfile']['name']) != '') {
			/* Check if its the right file. */
			$ext = $documentObject->_File->file_extention($_FILES['paymentfile']['name']); 

			if($ext != '') {				
				$checkExt = $documentObject->_File->getValidateExtention('paymentfile', $ext);				
				if(!$checkExt) {
					$errorArray['paymentfile'] = 'Invalid file type something funny with the file format';
					$formValid = false;						
				}
			} else {
				$errorArray['paymentfile'] = 'Invalid file type';
				$formValid = false;									
			}
		} else {			
			switch((int)$_FILES['paymentfile']['error']) {
				case 1 : $errorArray['paymentfile'] = 'The uploaded file exceeds the maximum upload file size, should be less than 1M'; $formValid = false; break;
				case 2 : $errorArray['paymentfile'] = 'File size exceeds the maximum file size'; $formValid = false; break;
				case 3 : $errorArray['paymentfile'] = 'File was only partically uploaded, please try again'; $formValid = false; break;
				//case 4 : $errorArray['paymentfile'] = 'No file was uploaded'; $formValid = false; break;
				case 6 : $errorArray['paymentfile'] = 'Missing a temporary folder'; $formValid = false; break;
				case 7 : $errorArray['paymentfile'] = 'Faild to write file to disk'; $formValid = false; break;
			}
		}
	}

	if(count($errorArray) == 0 && $formValid == true) {
		
		$data 	= array();				
		$data['payment_amount']		= trim($_POST['payment_amount']);		
		$data['booking_code']			= $bookingData['booking_code'];
		$data['payment_description']	= trim($_POST['payment_description']);			
		$data['payment_date']			= trim($_POST['payment_date']);		
	
		$success = $paymentObject->insert($data);				
		
		if(isset($_FILES['paymentfile']) && (int)$_FILES['paymentfile']['size'] != 0 && trim($_FILES['paymentfile']['name']) != '') {
			
			$data = null; $data = array();
			$data['document_item']		= $success;
			$data['document_name']	= trim($_FILES['paymentfile']['name']);
			$data['document_type']		= 'PAYMENT';
			
			$ext 			= strtolower($documentObject->_File->file_extention($_FILES['paymentfile']['name']));					
			$filename	= $documentObject->_File->getRandomFileName().'.'.$ext;
			$directory	= realpath(__DIR__.'/../../public_html/').'/media/document/payment/'.$success.'/';
			$file			= $directory.$filename;	

			if(!is_dir($directory)) mkdir($directory, 0777, true);

			if(file_put_contents($file, file_get_contents($_FILES['paymentfile']['tmp_name']))) {

				$data['document_path']			= '/media/document/payment/'.$success.'/'.$filename;
				$data['document_filename']	= $filename;
 
				$success	= $documentObject->insert($data);	
				
				header('Location: /booking/payment.php?code='.$code);
				exit;
			} else {
				$errorArray['paymentfile'] = 'We could not upload the document, please try again.';
				$formValid = false;			
			}
		}
		
		if(is_numeric($success)) {
			header('Location: /booking/payment.php?code='.$bookingData['booking_code']);
			exit;
		}		
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);
}

/* Display the template */	
$smarty->display('booking/payment.tpl');

?>