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
			<li>Payment</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2>{$bookingData.brand_name} / {$bookingData.make_name} / {$bookingData.model_name}</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/booking/details.php?code={$bookingData.booking_code}" title="Details">Details</a></li>
			<li><a href="/booking/confirmation.php?code={$bookingData.booking_code}" title="Confirmation">Confirmation</a></li>
			<li class="active"><a href="#" title="Payment">Payment</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<b>Download booking invoice</b><br /><br />
	{if $bookingData.booking_html neq ''}
	<a href="http://www.rentout.co.za{$bookingData.booking_pdf}" target="_blank">Download PDF</a>
	{else}
	<span class="error">No pdf has been generated for this booking.</span>
	{/if}
	<br /><br />
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>Sub Total Amount</td>
			<td>R {$bookingData.price_cost|number_format:2:".":","}</td>
		</tr>
		<tr>
			<td>14% Vat</td>
			<td>R {$bookingData.price_vat|number_format:2:".":","}</td>
		</tr>
		<tr>
			<td>Total with vat</td>
			<td>R {$bookingData.price_vat_total|number_format:2:".":","}</td>
		</tr>
		<tr>
			<td>Total payments made</td>
			<td>R {$bookingData.payment_amount|number_format:2:".":","}</td>
		</tr>
		<tr>
			{if $bookingData.payment_final lt 0 or $bookingData.payment_final eq 0}
			<td class="error">Amount due</td>
			{else}
			<td class="error">Amount Owed to you</td>
			{/if}
			<td>R {$bookingData.payment_final|number_format:2:".":","}</td>
		</tr>		
	</table>
	<br /><br />
	<h4>Please add payments below along with their proof of payment if the document is available</h4><br />
	<form id="addForm" name="addForm" action="/booking/payment.php?code={$bookingData.booking_code}" method="post" enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<thead>
		  <tr>
			<th>Amount</th>				
			<th>Date of payment</th>
			<th>Proof of payment</th>
			<th></th>
		   </tr>
	   </thead>
	   <tbody>
	  {foreach from=$paymentData item=item}
	  <tr>
		<td>
			R {$item.payment_amount|number_format:2:".":","}
		</td>
		<td>
			 {$item.payment_date|date_format:"%A, %B %e, %Y"}
		</td>		
		<td>
			{if $item.document_path neq ''}
			<a target="_blank" href="http://www.rentout.co.za{$item.document_path}" target="_blank">		
					{$item.document_name}
			</a>
			{else}
				No proof of payment uploaded
			{/if}
		</td>
		<td>
			<button onclick="javascript:deleteForm('{$item.payment_code}'); return false;" >Delete</button>		
		</td>		
	  </tr>
	  {foreachelse}
		<tr>
			<td colspan="4" class="error">There are no current items in the system.</td>
		</tr>
	  {/foreach}  
		  <tr>
			<th>Amount</th>
			<th>Payment Date</th>
			<th>Proof of payment file</th>
			<th></th>
		   </tr>
		<tr>
			<td>
				<input type="text" id="payment_amount" name="payment_amount" size="15"/>
				{if isset($errorArray.payment_amount)}<br /><span class="error">{$errorArray.payment_amount}</span>{/if}
			</td>
			<td>
				<input type="text" id="payment_date" name="payment_date" size="10"/>
				{if isset($errorArray.payment_date)}<br /><span class="error">{$errorArray.payment_date}</span>{/if}
			</td>			
			<td>
				<input type="file" id="paymentfile" name="paymentfile" />
				{if isset($errorArray.paymentfile)}<br /><span class="error">{$errorArray.paymentfile}</span>{/if}
			</td>
			<td><button onclick="addForm(); return false;">Add Item</button></td>
		</tr>								
		</tbody>						
	</table>
	</form>
	</div>
	<div class="clearer"><!-- --></div>	

    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 {include_php file='includes/footer.php'}
</div>
{literal}
<script type="text/javascript">
$(document).ready(function(){

	$( "#payment_date" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true, changeMonth: true});

});

function addForm() {
	document.forms.addForm.submit();				 
}			
	
function deleteForm(id) {	
	if(confirm('Are you sure you want to delete this file?')) {
			$.ajax({ 
					type: "GET",
					url: "payment.php",
					data: "code={/literal}{$bookingData.booking_code}{literal}&payment_code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert('Deleted');
								window.location.href = window.location.href;
							} else {
								alert(data.error);
							}
					}
			});								
		}
	return false;
}
</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
