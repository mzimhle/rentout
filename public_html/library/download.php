<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

require_once 'config/database.php';
//require_once 'includes/auth.php';

$formValid		= true;
	
if(!isset($_GET['type'])) {
	$formValid = false;		
} else if(trim($_GET['type']) == '') {
	$formValid = false;	
}

if(!isset($_GET['code'])) {
	$formValid = false;		
} else if(trim($_GET['code']) == '') {
	$formValid = false;	
}

if($formValid) {
	
	$type 	= trim($_GET['type']);
	$code 	= trim($_GET['code']);
	$data	= array();
	
	switch($type) {
		case 'document' : 
		
			require_once 'class/document.php';
			
			$participantcvObject = new class_participantcv();
			
			$participantcvObject->download($code);
			
			exit;
		case 'profile' : 
			
			if(isset($_GET['imagesize'])) {
				require_once 'class/participant.php';
				
				$participantObject = new class_participant();
				
				$participantObject->download($code, trim($_GET['imagesize']));
				
				exit;
			}
		case 'brand' : 
			
			if(isset($_GET['imagesize'])) {
				require_once 'class/brand.php';
				
				$brandObject = new class_brand();

				$brandObject->download($code, trim($_GET['imagesize']));
				
				exit;
			}
		case 'make' : 
			
			if(isset($_GET['imagesize'])) {
				require_once 'class/make.php';
				
				$makeObject = new class_make();

				$makeObject->download($code, trim($_GET['imagesize']));
				
				exit;
			}
		case 'model' : 
			
			if(isset($_GET['imagesize'])) {
				require_once 'class/model.php';
				
				$modelObject = new class_model();

				$modelObject->download($code, trim($_GET['imagesize']));
				
				exit;
			}
		case 'group' : 
			
			if(isset($_GET['imagesize'])) {
				require_once 'class/group.php';
				
				$groupObject = new class_group();

				$groupObject->download($code, trim($_GET['imagesize']));
				
				exit;
			}
		case 'colour' : 
			
			if(isset($_GET['imagesize'])) {
				require_once 'class/colour.php';
				
				$colourObject = new class_colour();

				$colourObject->download($code, trim($_GET['imagesize']));
				
				exit;
			}
		case 'car' : 
			
			if(isset($_GET['imagesize'])) {
				require_once 'class/car.php';
				
				$carObject = new class_car();

				$carObject->download($code, trim($_GET['imagesize']));
				
				exit;
			}
		case 'feature' : 

				require_once 'class/feature.php';
				
				$featureObject = new class_feature();

				$featureObject->download($code);
				
				exit;
				
	}
}

header('Location: /404/');
exit;

?>