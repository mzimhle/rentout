<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
<link rel="stylesheet" type="text/css" href="/library/javascript/fullcalendar-1.6.2/fullcalendar.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/library/javascript/fullcalendar-1.6.2/fullcalendar.print.css" media="screen" />
<script type="text/javascript" language="javascript" src="/library/javascript/fullcalendar-1.6.2/fullcalendar.min.js"></script>
<link href="/administration/css/colour.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="/feeds/calendar.php"></script>
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    {include_php file='includes/header.php'}
  <div class="inner">  
	<h2>Booking Calendar</h2>
	<div class="clearer"><!-- --></div>
	<div id='calendar'></div>	 
	<div class="clearer"><!-- --></div>	
    </div><!--inner-->
  </div><!-- End Content Section -->
 {include_php file='includes/footer.php'}
</div>
<!-- End Main Container -->
{literal}
<script type="text/javascript" language="javascript">		
$(document).ready(function() {
	
	var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			
			var startdate	= $.fullCalendar.formatDate(start,'yyyy-MM-dd');
			var enddate	= $.fullCalendar.formatDate(end,'yyyy-MM-dd');
			var today 	= $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd');	
			
			if(startdate  < today) {
				alert('You cannot schedule past dates.');
			} else {
				if(!confirm('Are you sure you want to book this day?')) {			
					return false;				
				} else {
					window.location.href = '/booking/details.php?startdate='+startdate+'&enddate='+enddate;	
				}				
			}
		},
		editable: true,
		events: bookings
	});
});
</script>
{/literal}
</body>
</html>
