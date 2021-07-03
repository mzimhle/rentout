<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

require_once 'config/database.php';

require_once 'class/image.php';

$image 		= new class_image();
$formValid	= true;

if(!isset($_GET['imagesize'])) {
	$formValid = false;		
} else if(trim($_GET['imagesize']) == '') {
	$formValid = false;	
}

if(!isset($_GET['code'])) {
	$formValid = false;		
} else if(trim($_GET['code']) == '') {
	$formValid = false;	
}

if($formValid) {
	
	$imagesize 	= trim($_GET['imagesize']);
	$code 			= trim($_GET['code']);
	$type 			= isset($_GET['type']) && trim($_GET['type']) != '' ? trim($_GET['type']) : null;

	switch($type) {
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
		default: 	
			$imageObject = new class_image();

			$imageObject->download($code, $imagesize);
		exit;
	}

}

$imageObject->download(null);
exit;

?>