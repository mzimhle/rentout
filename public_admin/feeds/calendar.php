<?php
/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'class/booking.php';

$bookingObject	= new class_booking();

$booking		= array();
$i				= 0;
$bookingData	= $bookingObject->getAll('booking_deleted = 0', 'booking_added desc');

if($bookingData) {
	foreach($bookingData as $item) {
		
		$booking[$i]['id']				= $i;
		$booking[$i]['start'] 			= $item['booking_startdate'];
		$booking[$i]['end'] 			= $item['booking_enddate'];
		$booking[$i]['title']				= ' ('.$item['participant_cellphone'].'): '.$item['participant_name'].' '.$item['participant_surname'];
		$booking[$i]['url']				= '/booking/details.php?code='.$item['booking_code'];
		$booking[$i]['allDay']			= false;
		$booking[$i]['className']	= $item['booking_active'] == 1 ? 'Aqua' : 'DarkOrange';
		$i++;
	}
}

$json = json_encode($booking);

echo "var bookings = $json;";

?>