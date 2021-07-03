<?php /* Smarty version 2.6.20, created on 2015-02-12 00:41:09
         compiled from booking/payment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'booking/payment.tpl', 44, false),array('modifier', 'date_format', 'booking/payment.tpl', 86, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/booking/" title="Booking">Booking</a></li>
			<li><a href="/booking/details.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
" title=""><?php echo $this->_tpl_vars['bookingData']['brand_name']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['make_name']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['model_name']; ?>
</a></li>
			<li>Payment</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2><?php echo $this->_tpl_vars['bookingData']['brand_name']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['make_name']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['model_name']; ?>
</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/booking/details.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
" title="Details">Details</a></li>
			<li><a href="/booking/confirmation.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
" title="Confirmation">Confirmation</a></li>
			<li class="active"><a href="#" title="Payment">Payment</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<b>Download booking invoice</b><br /><br />
	<?php if ($this->_tpl_vars['bookingData']['booking_html'] != ''): ?>
	<a href="http://www.rentout.co.za<?php echo $this->_tpl_vars['bookingData']['booking_pdf']; ?>
" target="_blank">Download PDF</a>
	<?php else: ?>
	<span class="error">No pdf has been generated for this booking.</span>
	<?php endif; ?>
	<br /><br />
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>Sub Total Amount</td>
			<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['price_cost'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
		</tr>
		<tr>
			<td>14% Vat</td>
			<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['price_vat'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
		</tr>
		<tr>
			<td>Total with vat</td>
			<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['price_vat_total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
		</tr>
		<tr>
			<td>Total payments made</td>
			<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['payment_amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
		</tr>
		<tr>
			<?php if ($this->_tpl_vars['bookingData']['payment_final'] < 0 || $this->_tpl_vars['bookingData']['payment_final'] == 0): ?>
			<td class="error">Amount due</td>
			<?php else: ?>
			<td class="error">Amount Owed to you</td>
			<?php endif; ?>
			<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['payment_final'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
		</tr>		
	</table>
	<br /><br />
	<h4>Please add payments below along with their proof of payment if the document is available</h4><br />
	<form id="addForm" name="addForm" action="/booking/payment.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
" method="post" enctype="multipart/form-data">
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
	  <?php $_from = $this->_tpl_vars['paymentData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	  <tr>
		<td>
			R <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['payment_amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>

		</td>
		<td>
			 <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['payment_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>

		</td>		
		<td>
			<?php if ($this->_tpl_vars['item']['document_path'] != ''): ?>
			<a target="_blank" href="http://www.rentout.co.za<?php echo $this->_tpl_vars['item']['document_path']; ?>
" target="_blank">		
					<?php echo $this->_tpl_vars['item']['document_name']; ?>

			</a>
			<?php else: ?>
				No proof of payment uploaded
			<?php endif; ?>
		</td>
		<td>
			<button onclick="javascript:deleteForm('<?php echo $this->_tpl_vars['item']['payment_code']; ?>
'); return false;" >Delete</button>		
		</td>		
	  </tr>
	  <?php endforeach; else: ?>
		<tr>
			<td colspan="4" class="error">There are no current items in the system.</td>
		</tr>
	  <?php endif; unset($_from); ?>  
		  <tr>
			<th>Amount</th>
			<th>Payment Date</th>
			<th>Proof of payment file</th>
			<th></th>
		   </tr>
		<tr>
			<td>
				<input type="text" id="payment_amount" name="payment_amount" size="15"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['payment_amount'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['payment_amount']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<input type="text" id="payment_date" name="payment_date" size="10"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['payment_date'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['payment_date']; ?>
</span><?php endif; ?>
			</td>			
			<td>
				<input type="file" id="paymentfile" name="paymentfile" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['paymentfile'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['paymentfile']; ?>
</span><?php endif; ?>
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
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	$( "#payment_date" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true, changeMonth: true});

});

function addForm() {
	document.forms.addForm.submit();				 
}			
	
function deleteForm(id) {	
	if(confirm(\'Are you sure you want to delete this file?\')) {
			$.ajax({ 
					type: "GET",
					url: "payment.php",
					data: "code='; ?>
<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
<?php echo '&payment_code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert(\'Deleted\');
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
'; ?>

<!-- End Main Container -->
</body>
</html>