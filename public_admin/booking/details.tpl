<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
    {include_php file='includes/header.php'}
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/booking/" title="Booking">Booking</a></li>
			<li><a href="#">{if isset($bookingData)}{$bookingData.brand_name} / {$bookingData.make_name} / {$bookingData.model_name}{else}Add Booking{/if}</a></li>
			<li>Details</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner"> 
      <h2>{if isset($bookingData)}Edit booking{else}Add a new booking{/if}</h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($bookingData)}/booking/confirmation.php?code={$bookingData.booking_code}{else}#{/if}" title="Confirmation">Confirmation</a></li>
			<li><a href="{if isset($bookingData)}/booking/payment.php?code={$bookingData.booking_code}{else}#{/if}" title="Payment">Payment</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/booking/details.php{if isset($bookingData)}?code={$bookingData.booking_code}{/if}" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
			<tr>
				<td>
					<h4 class="error">Person making the booking:</h4><br />					
					<input type="text" id="participant_name" name="participant_name" size="80" value="" /> &nbsp;
					<input type="hidden" id="participant_code" name="participant_code" value="{$bookingData.participant_code}" />
					<br><span class="success" name="participantcodename" id="participantcodename">
						{if isset($bookingData)}{$bookingData.participant_name} {$bookingData.participant_surname} ( {$bookingData.participant_email} / {$bookingData.participant_cellphone} ){/if}
					</span>
					{if isset($errorArray.participant_code)}<br /><em class="error">{$errorArray.participant_code}</em>{/if}
				</td>						
          </tr>
		  <tr>
				<td>
					<h4 class="error">Start date of the booking:</h4><br />
					<input type="text" name="booking_startdate" id="booking_startdate" value="{$bookingData.booking_startdate|default:$startdate}" size="30"/>
					{if isset($errorArray.booking_startdate)}<br /><em class="error">{$errorArray.booking_startdate}</em>{/if}
				</td>		  
		  </tr>
		  <tr>
				<td>
					<h4 class="error">End Date of the booking:</h4><br />
					<input type="text" name="booking_enddate" id="booking_enddate" value="{$bookingData.booking_enddate|default:$enddate}" size="30"/>
					{if isset($errorArray.booking_enddate)}<br /><em class="error">{$errorArray.booking_enddate}</em>{/if}
				</td>			  
		  </tr>
			<tr>
				<td>
					<h4 class="error">Car being booked:</h4><br />					
					<input type="text" id="car_name" name="car_name" size="80" value="" /> &nbsp;
					<input type="hidden" id="car_code" name="car_code" value="{$bookingData.car_code}" />
					<br><span class="success" name="carcodename" id="carcodename">{if isset($bookingData)}
						{$bookingData.car_owner} - ( {$bookingData.group_name} - R {$bookingData.price_cost|number_format:2:".":","})  {$bookingData.car_year|date_format:"%Y"} {$bookingData.brand_name}, {$bookingData.make_name}, {$bookingData.model_name}
						{/if}</span>
					{if isset($errorArray.car_code)}<br /><em class="error">{$errorArray.car_code}</em>{/if}
				</td>			
			</tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/booking/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
  {include_php file='includes/footer.php'}
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->

{literal}
<script type="text/javascript">
function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {

	$( "#car_name" ).autocomplete({
		source: "/feeds/car.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#carcodename').html('');
				$('#car_code').val('');					
			} else { 
				$('#carcodename').html('<b>' + ui.item.value + '</b>');
				$('#car_code').val(ui.item.id);									
			}
			
			$('#car_name').val('');										
		}
	});
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php?type=LESSEE",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#participantcodename').html('');
				$('#participant_code').val('');					
			} else { 
				$('#participantcodename').html('<b>' + ui.item.value + '</b>');
				$('#participant_code').val(ui.item.id);									
			}
			
			$('#participant_name').val('');										
		}
	});
	
	$( "#booking_startdate" ).datepicker({
	  defaultDate: "+1w",
	  dateFormat: 'yy-mm-dd',
	  minDate : new Date(),
	  changeMonth: false,
	  numberOfMonths: 3,
	  onClose: function( selectedDate ) {
		$( "#booking_enddate" ).datepicker( "option", "minDate", selectedDate );
	  }
	});
	
	$( "#booking_enddate" ).datepicker({
	  defaultDate: "+1w",
	  dateFormat: 'yy-mm-dd',
	  changeMonth: false,
	  numberOfMonths: 3,
	  onClose: function( selectedDate ) {
		$( "#booking_startdate" ).datepicker( "option", "maxDate", selectedDate );
	  }
	});
	
});		
</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
