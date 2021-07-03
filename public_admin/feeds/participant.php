<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'class/participant.php';

$participantObject	= new class_participant();

$results 				= array();
$list						= array();	

if(isset($_REQUEST['term'])) {

	$q		= trim($_REQUEST['term']); 
	
	$participantData	= $participantObject->search($q,20);
	
	if(count($participantData) > 0) { 
		for($i = 0; $i < count($participantData); $i++) {
			$list[] = array(
				"id" 		=> $participantData[$i]["participant_code"],
				"label" 	=> $participantData[$i]['participant_name'].' '.$participantData[$i]['participant_surname'].' ( '.$participantData[$i]['participant_email'].' ) ',
				"value" 	=> $participantData[$i]['participant_name'].' '.$participantData[$i]['participant_surname'].' ( '.$participantData[$i]['participant_email'].' ) '
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