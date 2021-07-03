<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'class/car.php';

$carObject	= new class_car();

$results 				= array();
$list						= array();	

if(isset($_REQUEST['term'])) {
	
	$q		= trim($_REQUEST['term']); 
	
	$carData	= $carObject->search($q,20);
	
	if(count($carData) > 0) { 
		for($i = 0; $i < count($carData); $i++) {
			$list[] = array(
				"id" 		=> $carData[$i]["car_code"],
				"label" 	=> $carData[$i]['car_owner'].' - ( '.$carData[$i]['group_name'].' - '.$carData[$i]['price_cost'].' ) '.$carData[$i]['brand_name'].', '.$carData[$i]['make_name'].', '.$carData[$i]['model_name'].' in '.$carData[$i]['areapost_name'].' with colour '.$carData[$i]['colour_name'],
				"value" 	=> $carData[$i]['car_owner'].' - ( '.$carData[$i]['group_name'].' - '.$carData[$i]['price_cost'].' ) '.$carData[$i]['brand_name'].', '.$carData[$i]['make_name'].', '.$carData[$i]['model_name'].' in '.$carData[$i]['areapost_name'].' with colour '.$carData[$i]['colour_name']
			);			
		}

		foreach ($list as $details) {
			if (strpos(strtolower($details["value"]), $q) !== false) {
				$results[] = $details;
			}
		}		
	}
}

if(count($results) > 0) {
	echo json_encode($results); 
	exit;
} else {
	echo json_encode(array('id' => '', 'label' => 'no results')); 
	exit;
}
exit;

?>