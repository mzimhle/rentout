<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
<script type="text/javascript" language="javascript" src="default.js"></script>
</head>

<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    {include_php file='includes/header.php'}
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/booking/" title="">Booking</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Booking</h2>		
	<a href="/booking/details.php" title="Click to Add a new booking" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new booking</span></a> <br />
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">			
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
			  <tr>
				<th>Added</th>
				<th>Person booking</th>
				<th>Start Date - End Date</th>			
				<th>Car / Owner</th>			
				<th>Price</th>
				<th>Vat</th>
				<th>Total</th>
				<th>Payments Made</th>
				<th>Amount due</th>								
				<th></th>
				<th></th>
			   </tr>
			   </thead>
			   <tbody>
			  {foreach from=$bookingData item=item}
			  <tr>
				<td>{$item.booking_added|date_format}</td>
				<td align="left">{$item.participant_name} {$item.participant_surname} <br />( {$item.participant_cellphone})</td>				
				<td align="left">
					<a href="/booking/details.php?code={$item.booking_code}" class="{if $item.booking_active eq '0'}error{else}success{/if}">
						{$item.booking_startdate|date_format:"%A, %B %e, %Y"} <br />till {$item.booking_enddate|date_format:"%A, %B %e, %Y"}
					<br />
					for {date_diff date1=$item.booking_startdate date2=$item.booking_enddate} Days						
					</a>
				</td>
				<td align="left">
					{$item.car_owner} ({$item.owner_cellphone}) <br />with car {$item.brand_name}, {$item.make_name}, {$item.model_name} <br />year {$item.car_year|date_format:"%Y"}
				</td>
				<td>R {$item.price_cost|number_format:2:".":","}</td>
				<td>R {$item.price_vat|number_format:2:".":","}</td>
				<td>R {$item.price_vat_total|number_format:2:".":","}</td>
				<td>R {$item.payment_amount|number_format:2:".":","}</td>
				<td>R {$item.payment_final|number_format:2:".":","}</td>				
				<td><a href="http://www.rentout.co.za{$item.booking_pdf}" target="_blank">Download</a></td>
				{if $smarty.now|date_format:"%Y%m%d" <= $item.booking_startdate|date_format:"%Y%m%d"}
					<td align="left"><button onclick="deleteitem('{$item.booking_code}'); return false;">Delete</button></td>
				{else}
					<td class="error" align="center">Booking has passed</td>
				{/if}
			  </tr>
			  {/foreach}     
			  </tbody>
			</table>
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
  </div><!-- End Content Section -->
 {include_php file='includes/footer.php'}
</div>
<!-- End Main Container -->
</body>
</html>
