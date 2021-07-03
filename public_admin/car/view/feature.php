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
require_once 'class/car.php';
require_once 'class/feature.php';
require_once 'class/carfeature.php';

$carObject			= new class_car();
$featureObject 		= new class_feature();
$carfeatureObject 	= new class_carfeature();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$carData = $carObject->getByCode($code);

	if($carData) {
		$smarty->assign('carData', $carData);
		
		$carfeatureData = $carfeatureObject->getByCar($carData['car_code']);

		if($carfeatureData) {
			$smarty->assign('carfeatureData', $carfeatureData);
		}	
	} else {
		header('Location: /car/view/');
		exit;	
	}
	
} else {
	header('Location: /car/view/');
	exit;	
}

$featurepairs = $featureObject->pairs();
if($featurepairs) $smarty->assign('featurepairs', $featurepairs);

/* Check posted data. */
if(isset($_GET['feature_code_delete'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;	
	$formValid				= true;
	$success					= NULL;
	$itemcode					= trim($_GET['feature_code_delete']);
		
	if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {	
		$data	= array();
		$data['carfeature_deleted'] = 1;
		
		$where		= array();
		$where[]	= $carfeatureObject->getAdapter()->quoteInto('carfeature_code = ?', $itemcode);
		$where[]	= $carfeatureObject->getAdapter()->quoteInto('car_code = ?', $carData['car_code']);
		
		$success	= $carfeatureObject->update($data, $where);	
		
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

	if(isset($_POST['feature_code']) && trim($_POST['feature_code']) == '') {
		$errorArray['feature_code'] = 'Please select a feature for the car';
		$formValid = false;		
	} else {
		$carfeatureData = $carfeatureObject->getByCar($carData['car_code'], trim($_POST['feature_code']));
		
		if($carfeatureData) {
			$errorArray['feature_code'] = 'The selected feature has already been added';
			$formValid = false;				
		}
	}

	if(count($errorArray) == 0 && $formValid == true) {
		
		$data = array();
		$data['car_code']		= $carData['car_code'];
		$data['feature_code']	= trim($_POST['feature_code']);
			
		$success	= $carfeatureObject->insert($data);	

		if(is_numeric($success)) {
			header('Location: /car/view/feature.php?code='.$carData['car_code']);
			exit;
		}
	}

	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);
}

/* Display the template */	
$smarty->display('car/view/feature.tpl');

?>