<?php /* Smarty version 2.6.20, created on 2015-02-12 00:47:15
         compiled from booking/confirmation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'booking/confirmation.tpl', 98, false),)), $this); ?>
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
			<li>Confimration</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['bookingData'] )): ?>Edit booking<?php else: ?>Add a new booking<?php endif; ?></h2>
    <div id="sidetabs">
        <ul >
            <li><a href="/booking/details.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Confirmation">Confirmation</a></li>
			<li><a href="/booking/payment.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
" title="Payment">Payment</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/booking/confirmation.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
" method="post">
	  <?php if ($this->_tpl_vars['bookingData']['booking_active'] == '0'): ?>
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
		  <tr>
				<td>
					<h4 class="error">Booking not confirmed, would you like to confirm it?</h4>
					<input type="checkbox" name="booking_active" id="booking_active" value="1" <?php if ($this->_tpl_vars['bookingData']['booking_active'] == '1'): ?>checked<?php endif; ?> />
					<br /><em>Check the above box to confirm the booking and email lessee and car owner with confirmation.</em>
				</td>		  
		  </tr>
		  <tr>
				<td>
					<h4>Download the invoice for the booking</h4>
					<br /><em><a href="http://www.rentout.co.za<?php echo $this->_tpl_vars['bookingData']['booking_pdf']; ?>
" target="_blank">Click to download</a></em>
				</td>		  
		  </tr>		  
			<tr>
				<td valign="top">
					<h4>Confirmation for pickup of the car if confirmed or message of cancelation if owner/lessee does not confirm booking.</h4><br />
					<textarea cols="90" rows="3" id="booking_message" name="booking_message"><?php echo $this->_tpl_vars['bookingData']['booking_message']; ?>
</textarea>
					<?php if (isset ( $this->_tpl_vars['errorArray']['booking_message'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['booking_message']; ?>
</em><?php endif; ?>
				</td>
			</tr>		  
        </table>
		<?php else: ?>
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
		  <tr>
				<td>
					<h4 class="success">Booking been confirmed, would you like to cancel it?</h4>
					<input type="checkbox" name="booking_active" id="booking_active" value="1" <?php if ($this->_tpl_vars['bookingData']['booking_active'] == '1'): ?>checked<?php endif; ?> />
					<br /><em>UNCHECK the above box to cancel the booking and email lessee and car owner with cancellation mail.</em>
				</td>		  
		  </tr>
		  <tr>
				<td>
					<h4>Download the invoice for the booking</h4>
					<br /><em><a href="http://www.rentout.co.za<?php echo $this->_tpl_vars['bookingData']['booking_pdf']; ?>
" target="_blank">Click to download</a></em>
				</td>		  
		  </tr>		  
			<tr>
				<td valign="top">
					<h4>Please state reason for cancellation of the booking.</h4><br />
					<textarea cols="90" rows="3" id="booking_message" name="booking_message"><?php echo $this->_tpl_vars['bookingData']['booking_message']; ?>
</textarea>
					<?php if (isset ( $this->_tpl_vars['errorArray']['booking_message'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['booking_message']; ?>
</em><?php endif; ?>
				</td>
			</tr>		  
        </table>		
		<?php endif; ?>		
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
			<?php $_from = $this->_tpl_vars['noticeData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['notice_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
				<td><?php echo $this->_tpl_vars['item']['notice_type']; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']['notice_message']; ?>
</td>			
				<td><a href="http://www.rentout.co.za/mailer/view/<?php echo $this->_tpl_vars['item']['_comm_code']; ?>
" target="_blank">View Mailer</a></td>
			</tr>
			<?php endforeach; else: ?>
			<tr><td colspan="4">There has currently been no communication with the booker and and car owner</td></tr>
			<?php endif; unset($_from); ?> 					
		</tbody>  
	</table>		
	</div>
    <div class="clearer"><!-- --></div>

    </div><!--inner-->
 </div> 	
  <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
<?php echo '
<script type="text/javascript">
function submitForm() {
	document.forms.detailsForm.submit();					 
}
</script>
'; ?>

<!-- End Main Container -->
</body>
</html>