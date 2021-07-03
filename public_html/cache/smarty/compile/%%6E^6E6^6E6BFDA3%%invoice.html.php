<?php /* Smarty version 2.6.20, created on 2015-02-05 20:17:33
         compiled from /home/rentoutco/public_html/templates/booking/invoice/invoice.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', '/home/rentoutco/public_html/templates/booking/invoice/invoice.html', 30, false),array('modifier', 'date_format', '/home/rentoutco/public_html/templates/booking/invoice/invoice.html', 47, false),array('function', 'date_diff', '/home/rentoutco/public_html/templates/booking/invoice/invoice.html', 47, false),)), $this); ?>
<!DOCTYPE html>
<!-- saved from url=(0047)http://css-tricks.com/examples/EditableInvoice/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://www.rentout.co.za/templates/booking/invoice/css/style.css">
	<link rel="stylesheet" href="http://www.rentout.co.za/templates/booking/invoice/css/print.css" media="print">
	<link rel='stylesheet'  href="http://www.rentout.co.za/templates/booking/invoice/css/fonts.css" type='text/css' />
</head>
<body>
	<div id="page-wrap">
		<p id="header">INVOICE</p>
		<div id="identity">
            <p id="address">No. 234, Inkatha Business Place, Midrand, Johannesburg</p>
		</div>
		<div style="clear:both"></div>
		<div id="identity">
            <p id="address" style="width: 400px !important;">
				<span id="customer-title"><?php echo $this->_tpl_vars['bookingData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['bookingData']['participant_surname']; ?>
</span><br /><br />
				<?php echo $this->_tpl_vars['bookingData']['participant_email']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['participant_cellphone']; ?>

			</p>
            <div class="logo">
				<table width="320px">
						<tr>
							<td class="meta-head">Invoice #</td>
							<td><?php echo $this->_tpl_vars['bookingData']['booking_reference']; ?>
</td>
						</tr>
						<?php if ($this->_tpl_vars['bookingData']['payment_final'] < 0 || $this->_tpl_vars['bookingData']['payment_final'] == 0): ?>
						<tr>
							<td class="meta-head">Amount Due</td>
							<td><div class="due">R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['payment_final'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</div></td>
						</tr>					
						<?php else: ?>
						<tr>
							<td class="meta-head">Amount Owed to you</td>
							<td><div class="due">R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['payment_final'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</div></td>
						</tr>							
						<?php endif; ?>
				</table>              
            </div>
		</div>
		<table id="items">
			<tr>
				<th align="left" width="75%">Item</th>
				<th width="left">Price</th>
			</tr>
			<tr class="item-row">
				<td class="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['car_year'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 <?php echo $this->_tpl_vars['bookingData']['brand_name']; ?>
, <?php echo $this->_tpl_vars['bookingData']['make_name']; ?>
,  <?php echo $this->_tpl_vars['bookingData']['model_name']; ?>
 with colour <?php echo $this->_tpl_vars['bookingData']['colour_name']; ?>
 from <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['booking_startdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
 till <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['booking_enddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
 for <?php echo smarty_function_date_diff(array('date1' => $this->_tpl_vars['bookingData']['booking_startdate'],'date2' => $this->_tpl_vars['bookingData']['booking_enddate']), $this);?>
 days</td>
				<td align="right">R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['price_cost'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
			</tr>
			<tr class="item-row">
				<td class="item-name">Vat (14%)</td>
				<td align="right">R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['price_vat'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
			</tr>
			<tr class="item-row">
				<td class="item-name">Sub Total</td>
				<td align="right">R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['price_vat_total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
			</tr>			
			<tr>
				<th colspan="2" align="left">Payments</th>
			</tr>				
			<?php if (isset ( $this->_tpl_vars['paymentData'] )): ?>
			<?php $_from = $this->_tpl_vars['paymentData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<tr class="item-row">
				<td align="left"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['payment_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</td>
				<td align="right">R <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['payment_amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>			
			<?php else: ?>
			<tr class="item-row">
				<td align="left" colspan="2">No payments made yet.</td>
			</tr>			
			<?php endif; ?>		
			<tr>
				<th colspan="2" align="left">Final Total</th>
			</tr>	
			<tr class="item-row">
				<td colspan="2" align="right">R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['payment_final'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
			</tr>			
		</table>
		<div id="terms">
		  <p id="header">Payments Made To: </p>
		  Account Holder: RentOut (PTY) LTD<br />
		  Bank: Standard Bank<br />
		  Account Number: 0705985614<br />
		  Branch Code: 954125<br />
		  <b>Reference: <?php echo $this->_tpl_vars['bookingData']['booking_reference']; ?>
</b>
		  <br /><br />
				No. 234, Inkatha Business Place, Midrand, Johannesburg			
				<br />
				tel: 0215896478 / fax: 0215745987 / email: info@rentout.co.za
		</div>
	</div>
</body>
</html>