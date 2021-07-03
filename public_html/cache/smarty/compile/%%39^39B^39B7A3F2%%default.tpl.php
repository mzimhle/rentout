<?php /* Smarty version 2.6.20, created on 2015-04-07 17:54:52
         compiled from booking/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'booking/default.tpl', 49, false),array('modifier', 'number_format', 'booking/default.tpl', 61, false),array('function', 'date_diff', 'booking/default.tpl', 55, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" language="javascript" src="default.js"></script>
</head>

<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

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
			  <?php $_from = $this->_tpl_vars['bookingData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['booking_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
				<td align="left"><?php echo $this->_tpl_vars['item']['participant_name']; ?>
 <?php echo $this->_tpl_vars['item']['participant_surname']; ?>
 <br />( <?php echo $this->_tpl_vars['item']['participant_cellphone']; ?>
)</td>				
				<td align="left">
					<a href="/booking/details.php?code=<?php echo $this->_tpl_vars['item']['booking_code']; ?>
" class="<?php if ($this->_tpl_vars['item']['booking_active'] == '0'): ?>error<?php else: ?>success<?php endif; ?>">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['booking_startdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
 <br />till <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['booking_enddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>

					<br />
					for <?php echo smarty_function_date_diff(array('date1' => $this->_tpl_vars['item']['booking_startdate'],'date2' => $this->_tpl_vars['item']['booking_enddate']), $this);?>
 Days						
					</a>
				</td>
				<td align="left">
					<?php echo $this->_tpl_vars['item']['car_owner']; ?>
 (<?php echo $this->_tpl_vars['item']['owner_cellphone']; ?>
) <br />with car <?php echo $this->_tpl_vars['item']['brand_name']; ?>
, <?php echo $this->_tpl_vars['item']['make_name']; ?>
, <?php echo $this->_tpl_vars['item']['model_name']; ?>
 <br />year <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['car_year'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>

				</td>
				<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price_cost'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
				<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price_vat'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
				<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price_vat_total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
				<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['payment_amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>
				<td>R <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['payment_final'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
</td>				
				<td><a href="http://www.rentout.co.za<?php echo $this->_tpl_vars['item']['booking_pdf']; ?>
" target="_blank">Download</a></td>
				<?php if (((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d") : smarty_modifier_date_format($_tmp, "%Y%m%d")) <= ((is_array($_tmp=$this->_tpl_vars['item']['booking_startdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y%m%d") : smarty_modifier_date_format($_tmp, "%Y%m%d"))): ?>
					<td align="left"><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['booking_code']; ?>
'); return false;">Delete</button></td>
				<?php else: ?>
					<td class="error" align="center">Booking has passed</td>
				<?php endif; ?>
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>     
			  </tbody>
			</table>
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
  </div><!-- End Content Section -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
</body>
</html>