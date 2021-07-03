<?php /* Smarty version 2.6.20, created on 2015-02-12 00:47:11
         compiled from booking/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'booking/details.tpl', 50, false),array('modifier', 'number_format', 'booking/details.tpl', 67, false),array('modifier', 'date_format', 'booking/details.tpl', 67, false),)), $this); ?>
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
			<li><a href="#"><?php if (isset ( $this->_tpl_vars['bookingData'] )): ?><?php echo $this->_tpl_vars['bookingData']['brand_name']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['make_name']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['model_name']; ?>
<?php else: ?>Add Booking<?php endif; ?></a></li>
			<li>Details</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['bookingData'] )): ?>Edit booking<?php else: ?>Add a new booking<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['bookingData'] )): ?>/booking/confirmation.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Confirmation">Confirmation</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['bookingData'] )): ?>/booking/payment.php?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Payment">Payment</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/booking/details.php<?php if (isset ( $this->_tpl_vars['bookingData'] )): ?>?code=<?php echo $this->_tpl_vars['bookingData']['booking_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
			<tr>
				<td>
					<h4 class="error">Person making the booking:</h4><br />					
					<input type="text" id="participant_name" name="participant_name" size="80" value="" /> &nbsp;
					<input type="hidden" id="participant_code" name="participant_code" value="<?php echo $this->_tpl_vars['bookingData']['participant_code']; ?>
" />
					<br><span class="success" name="participantcodename" id="participantcodename">
						<?php if (isset ( $this->_tpl_vars['bookingData'] )): ?><?php echo $this->_tpl_vars['bookingData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['bookingData']['participant_surname']; ?>
 ( <?php echo $this->_tpl_vars['bookingData']['participant_email']; ?>
 / <?php echo $this->_tpl_vars['bookingData']['participant_cellphone']; ?>
 )<?php endif; ?>
					</span>
					<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
</em><?php endif; ?>
				</td>						
          </tr>
		  <tr>
				<td>
					<h4 class="error">Start date of the booking:</h4><br />
					<input type="text" name="booking_startdate" id="booking_startdate" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['bookingData']['booking_startdate'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['startdate']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['startdate'])); ?>
" size="30"/>
					<?php if (isset ( $this->_tpl_vars['errorArray']['booking_startdate'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['booking_startdate']; ?>
</em><?php endif; ?>
				</td>		  
		  </tr>
		  <tr>
				<td>
					<h4 class="error">End Date of the booking:</h4><br />
					<input type="text" name="booking_enddate" id="booking_enddate" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['bookingData']['booking_enddate'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['enddate']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['enddate'])); ?>
" size="30"/>
					<?php if (isset ( $this->_tpl_vars['errorArray']['booking_enddate'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['booking_enddate']; ?>
</em><?php endif; ?>
				</td>			  
		  </tr>
			<tr>
				<td>
					<h4 class="error">Car being booked:</h4><br />					
					<input type="text" id="car_name" name="car_name" size="80" value="" /> &nbsp;
					<input type="hidden" id="car_code" name="car_code" value="<?php echo $this->_tpl_vars['bookingData']['car_code']; ?>
" />
					<br><span class="success" name="carcodename" id="carcodename"><?php if (isset ( $this->_tpl_vars['bookingData'] )): ?>
						<?php echo $this->_tpl_vars['bookingData']['car_owner']; ?>
 - ( <?php echo $this->_tpl_vars['bookingData']['group_name']; ?>
 - R <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['price_cost'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
)  <?php echo ((is_array($_tmp=$this->_tpl_vars['bookingData']['car_year'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 <?php echo $this->_tpl_vars['bookingData']['brand_name']; ?>
, <?php echo $this->_tpl_vars['bookingData']['make_name']; ?>
, <?php echo $this->_tpl_vars['bookingData']['model_name']; ?>

						<?php endif; ?></span>
					<?php if (isset ( $this->_tpl_vars['errorArray']['car_code'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['car_code']; ?>
</em><?php endif; ?>
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
  <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->

<?php echo '
<script type="text/javascript">
function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {

	$( "#car_name" ).autocomplete({
		source: "/feeds/car.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#carcodename\').html(\'\');
				$(\'#car_code\').val(\'\');					
			} else { 
				$(\'#carcodename\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#car_code\').val(ui.item.id);									
			}
			
			$(\'#car_name\').val(\'\');										
		}
	});
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php?type=LESSEE",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#participantcodename\').html(\'\');
				$(\'#participant_code\').val(\'\');					
			} else { 
				$(\'#participantcodename\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#participant_code\').val(ui.item.id);									
			}
			
			$(\'#participant_name\').val(\'\');										
		}
	});
	
	$( "#booking_startdate" ).datepicker({
	  defaultDate: "+1w",
	  dateFormat: \'yy-mm-dd\',
	  minDate : new Date(),
	  changeMonth: false,
	  numberOfMonths: 3,
	  onClose: function( selectedDate ) {
		$( "#booking_enddate" ).datepicker( "option", "minDate", selectedDate );
	  }
	});
	
	$( "#booking_enddate" ).datepicker({
	  defaultDate: "+1w",
	  dateFormat: \'yy-mm-dd\',
	  changeMonth: false,
	  numberOfMonths: 3,
	  onClose: function( selectedDate ) {
		$( "#booking_startdate" ).datepicker( "option", "maxDate", selectedDate );
	  }
	});
	
});		
</script>
'; ?>

<!-- End Main Container -->
</body>
</html>