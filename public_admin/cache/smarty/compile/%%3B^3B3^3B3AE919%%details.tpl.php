<?php /* Smarty version 2.6.20, created on 2014-09-08 17:51:07
         compiled from administration/resources/paymentitem/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['participantpayitemData'] )): ?>Edit Payment Item<?php else: ?>Add a Tender<?php endif; ?></title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/administration/" title="Home">Home</a></li>
			<li><a href="/administration/resources/" title="Resources">Resources</a></li>
			<li><a href="/administration/resources/paymentitem/" title="Payment Items">Payment Items</a></li>
			<li><?php if (isset ( $this->_tpl_vars['participantpayitemData'] )): ?><?php echo $this->_tpl_vars['participantpayitemData'][$this->_tpl_vars['participantpayitem_name']]; ?>
<?php else: ?>Add a Payment Item<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['participantpayitemData'] )): ?>Edit <?php echo $this->_tpl_vars['participantpayitemData'][$this->_tpl_vars['participantpayitem_name']]; ?>
<?php else: ?>Add a Payment Item<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/resources/paymentitem/details.php<?php if (isset ( $this->_tpl_vars['participantpayitemData'] )): ?>?code=<?php echo $this->_tpl_vars['participantpayitemData']['participantpayitem_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
           <tr>
            <td class="left_col"><h4>Active</h4></td>
            <td><input type="checkbox" name="participantpayitem_active" id="participantpayitem_active" value="1" <?php if ($this->_tpl_vars['participantpayitemData']['participantpayitem_active'] == 1): ?> checked="checked" <?php endif; ?> /></td>
          </tr>	
		  <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_name'] )): ?> error<?php endif; ?>" ><h4>Name:</h4></td>
			<td>
				<input type="text" name="participantpayitem_name" id="participantpayitem_name" value="<?php echo $this->_tpl_vars['participantpayitemData']['participantpayitem_name']; ?>
" size="60"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participantpayitem_name']; ?>
</span><?php endif; ?>
			</td>	
          </tr>
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_type'] )): ?> error<?php endif; ?>"><h4>Category:</h4></td>
			<td>
				<select id="participantpayitem_type" name="participantpayitem_type">
					<option value=""> --- </option>
					<option <?php if ($this->_tpl_vars['participantpayitemData']['participantpayitem_type'] == 'tender'): ?>selected<?php endif; ?> value="tender">Tenders</option>
					<option <?php if ($this->_tpl_vars['participantpayitemData']['participantpayitem_type'] == 'trade-lead'): ?>selected<?php endif; ?> value="trade-lead">Trade Leads</option>
					<option <?php if ($this->_tpl_vars['participantpayitemData']['participantpayitem_type'] == 'job'): ?>selected<?php endif; ?> value="job">Post Jobs</option>
				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_type'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participantpayitem_type']; ?>
</span><?php endif; ?>
			</td>	
          </tr>
		  <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_amount'] )): ?> error<?php endif; ?>" ><h4>Amount:</h4></td>
			<td>
				<input type="text" name="participantpayitem_amount" id="participantpayitem_amount" value="<?php echo $this->_tpl_vars['participantpayitemData']['participantpayitem_amount']; ?>
" size="10"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_amount'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participantpayitem_amount']; ?>
</span><?php endif; ?>
			</td>	
          </tr>
		  <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_period'] )): ?> error<?php endif; ?>" ><h4>Period (Number of months):</h4></td>
			<td>
				<input type="text" name="participantpayitem_period" id="participantpayitem_period" value="<?php echo $this->_tpl_vars['participantpayitemData']['participantpayitem_period']; ?>
" size="10"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_period'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participantpayitem_period']; ?>
</span><?php endif; ?>
			</td>	
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/participantpayitems/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript" language="javascript">

function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$( "#participantpayitem_created" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true });
	
	$( "#participantpayitem_closing" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true, minDate: new Date().getDate() });
	
	
	$( "#area_name" ).autocomplete({
		source: "/feeds/area.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#area_name\').html(\'\');
				$(\'#area_code\').val(\'\');					
			} else {
				$(\'#area_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#area_code\').val(ui.item.id);									
			}
			
			$(\'#area_name\').val(\'\');										
		}
	});
	
	
	$( "#participantpayiteminstitute_name" ).autocomplete({
		source: "/feeds/institute.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#participantpayiteminstitute_name\').html(\'\');
				$(\'#participantpayiteminstitute_code\').val(\'\');					
			} else {
				$(\'#participantpayiteminstitute_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#participantpayiteminstitute_code\').val(ui.item.id);									
			}
			
			$(\'#participantpayiteminstitute_name\').val(\'\');										
		}
	});
	
			
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>