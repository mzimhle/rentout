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
			<li><a href="/booking/details.php?code={$bookingData.booking_code}" title="">{$bookingData.brand_name} / {$bookingData.make_name} / {$bookingData.model_name}</a></li>
			<li>Confimration</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner"> 
      <h2>{if isset($bookingData)}Edit booking{else}Add a new booking{/if}</h2>
    <div id="sidetabs">
        <ul >
            <li><a href="/booking/details.php?code={$bookingData.booking_code}" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Confirmation">Confirmation</a></li>
			<li><a href="/booking/payment.php?code={$bookingData.booking_code}" title="Payment">Payment</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/booking/confirmation.php?code={$bookingData.booking_code}" method="post">
	  {if $bookingData.booking_active eq '0'}
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
		  <tr>
				<td>
					<h4 class="error">Booking not confirmed, would you like to confirm it?</h4>
					<input type="checkbox" name="booking_active" id="booking_active" value="1" {if $bookingData.booking_active eq '1'}checked{/if} />
					<br /><em>Check the above box to confirm the booking and email lessee and car owner with confirmation.</em>
				</td>		  
		  </tr>
		  <tr>
				<td>
					<h4>Download the invoice for the booking</h4>
					<br /><em><a href="http://www.rentout.co.za{$bookingData.booking_pdf}" target="_blank">Click to download</a></em>
				</td>		  
		  </tr>		  
			<tr>
				<td valign="top">
					<h4>Confirmation for pickup of the car if confirmed or message of cancelation if owner/lessee does not confirm booking.</h4><br />
					<textarea cols="90" rows="3" id="booking_message" name="booking_message">{$bookingData.booking_message}</textarea>
					{if isset($errorArray.booking_message)}<br /><em class="error">{$errorArray.booking_message}</em>{/if}
				</td>
			</tr>		  
        </table>
		{else}
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
		  <tr>
				<td>
					<h4 class="success">Booking been confirmed, would you like to cancel it?</h4>
					<input type="checkbox" name="booking_active" id="booking_active" value="1" {if $bookingData.booking_active eq '1'}checked{/if} />
					<br /><em>UNCHECK the above box to cancel the booking and email lessee and car owner with cancellation mail.</em>
				</td>		  
		  </tr>
		  <tr>
				<td>
					<h4>Download the invoice for the booking</h4>
					<br /><em><a href="http://www.rentout.co.za{$bookingData.booking_pdf}" target="_blank">Click to download</a></em>
				</td>		  
		  </tr>		  
			<tr>
				<td valign="top">
					<h4>Please state reason for cancellation of the booking.</h4><br />
					<textarea cols="90" rows="3" id="booking_message" name="booking_message">{$bookingData.booking_message}</textarea>
					{if isset($errorArray.booking_message)}<br /><em class="error">{$errorArray.booking_message}</em>{/if}
				</td>
			</tr>		  
        </table>		
		{/if}		
      </form>
        <div class="mrg_top_10">
		<a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Sent Email</span></a>   
        </div>
    <div class="clearer"><!-- --></div><br /><br />
	<h4>Record of notifications sent out</h4><br />		
	<table class="innertable" cellspacing="0" cellpadding="0" border="0" width="100%">
		<thead>
			<th>Date</th>
			<th>Type</th>
			<th>Message</th>
			<th>View</th>
		</thead>
		<tbody>
			{foreach from=$noticeData item=item}
			<tr>
				<td>{$item.notice_added|date_format}</td>
				<td>{$item.notice_type}</td>
				<td>{$item.notice_message}</td>			
				<td><a href="http://www.rentout.co.za/mailer/view/{$item._comm_code}" target="_blank">View Mailer</a></td>
			</tr>
			{foreachelse}
			<tr><td colspan="4">There has currently been no communication with the booker and and car owner</td></tr>
			{/foreach} 					
		</tbody>  
	</table>		
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
</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
