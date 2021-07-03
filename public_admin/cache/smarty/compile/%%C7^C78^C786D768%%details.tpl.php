<?php /* Smarty version 2.6.20, created on 2014-09-11 20:15:32
         compiled from administration/registry/view/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['_registryData'] )): ?>Edit Payment Item<?php else: ?>Add a Tender<?php endif; ?></title>
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
			<li><a href="/administration/registry/" title="Registry">Registry</a></li>
			<li><a href="/administration/registry/view/" title="Payment Items">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['registryData'] )): ?><?php echo $this->_tpl_vars['registryData'][$this->_tpl_vars['_registry_name']]; ?>
<?php else: ?>Add a registry<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['registryData'] )): ?>Edit <?php echo $this->_tpl_vars['registryData'][$this->_tpl_vars['_registry_name']]; ?>
<?php else: ?>Add a Payment Item<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/registry/view/details.php<?php if (isset ( $this->_tpl_vars['registryData'] )): ?>?code=<?php echo $this->_tpl_vars['registryData']['_registry_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
           <tr>
            <td class="left_col"><h4>Payments Made</h4></td>
            <td><input type="checkbox" name="_registry_pay" id="_registry_pay" value="1" <?php if ($this->_tpl_vars['registryData']['_registry_pay'] == 1): ?> checked="checked" <?php endif; ?> /></td>
          </tr>	
           <tr>
            <td class="left_col"><h4>Newsletter Subscription</h4></td>
            <td><input type="checkbox" name="_registry_newsletter" id="_registry_newsletter" value="1" <?php if ($this->_tpl_vars['registryData']['_registry_newsletter'] == 1): ?> checked="checked" <?php endif; ?> /></td>
          </tr>		  
		  <tr>
            <td class="left_col error" ><h4>Code:</h4></td>
			<td>
				<input type="text" name="_registry_code" id="_registry_code" value="<?php echo $this->_tpl_vars['registryData']['_registry_code']; ?>
" size="60"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['_registry_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['_registry_code']; ?>
</span><?php endif; ?>
			</td>	
          </tr>
		  <tr>
            <td class="left_col error" ><h4>Name:</h4></td>
			<td>
				<input type="text" name="_registry_name" id="_registry_name" value="<?php echo $this->_tpl_vars['registryData']['_registry_name']; ?>
" size="60"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['_registry_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['_registry_name']; ?>
</span><?php endif; ?>
			</td>	
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/_registrys/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	
	$( "#_registry_created" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true });
	
	$( "#_registry_closing" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true, minDate: new Date().getDate() });
	
	
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
	
	
	$( "#_registryinstitute_name" ).autocomplete({
		source: "/feeds/institute.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#_registryinstitute_name\').html(\'\');
				$(\'#_registryinstitute_code\').val(\'\');					
			} else {
				$(\'#_registryinstitute_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#_registryinstitute_code\').val(ui.item.id);									
			}
			
			$(\'#_registryinstitute_name\').val(\'\');										
		}
	});
	
			
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>