<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'class/model.php'; 

$modelObject	= new class_model();

$results 				= array();	

if(isset($_REQUEST['term'])) {
	
	$q		= trim($_REQUEST['term']); 
	
	$modelData	= $modelObject->search($q,20);

	if($modelData) { 
		for($i = 0; $i < count($modelData); $i++) {
			$results[] = array(
				"id" 		=> $modelData[$i]["model_code"],
				"label" 	=> $modelData[$i]['brand_name'].', '.$modelData[$i]['make_name'].', '.$modelData[$i]['model_trim'].', '.$modelData[$i]['model_year'],
				"value" 	=> $modelData[$i]['brand_name'].', '.$modelData[$i]['make_name'].', '.$modelData[$i]['model_trim'].', '.$modelData[$i]['model_year']
			);			
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