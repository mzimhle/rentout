<?php /* Smarty version 2.6.20, created on 2014-09-11 18:30:25
         compiled from administration/registry/products/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'administration/registry/products/details.tpl', 44, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | Products</title>
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
			<li><a href="/administration/registry/products/" title="Payment Items">Products</a></li>
			<li><?php if (isset ( $this->_tpl_vars['productData'] )): ?><?php echo $this->_tpl_vars['productData']['product_name']; ?>
<?php else: ?>Add a product<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['productData'] )): ?>Edit <?php echo $this->_tpl_vars['productData']['product_name']; ?>
<?php else: ?>Add a Product<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/registry/products/details.php<?php if (isset ( $this->_tpl_vars['productData'] )): ?>?code=<?php echo $this->_tpl_vars['productData']['_product_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
           <tr>
            <td class="left_col">
				<h4>Active</h4><br />
				<input type="checkbox" name="_product_active" id="_product_active" value="1" <?php if ($this->_tpl_vars['productData']['_product_active'] == 1): ?> checked="checked" <?php endif; ?> />
			</td>
			<td>
				<h4>Registry</h4><br />
				<select id="_registry_code" name="_registry_code">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['registryData'],'selected' => $this->_tpl_vars['productData']['_registry_code']), $this);?>

				</select>			
			</td>
            <td class="left_col error" ><h4>Reference:</h4><br />
				<input type="text" name="_product_reference" id="_product_reference" value="<?php echo $this->_tpl_vars['productData']['_product_reference']; ?>
" size="30"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['_product_reference'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['_product_reference']; ?>
</span><?php endif; ?>
			</td>			
          </tr>
		  <tr>
            <td class="left_col error"><h4>Name:</h4><br />
				<input type="text" name="_product_name" id="_product_name" value="<?php echo $this->_tpl_vars['productData']['_product_name']; ?>
" size="30"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['_product_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['_product_name']; ?>
</span><?php endif; ?>
			</td>	
            <td class="left_col"><h4>Price :</h4><br />
				<input type="text" name="_product_price" id="_product_price" value="<?php echo $this->_tpl_vars['productData']['_product_price']; ?>
" size="30"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['_product_price'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['_product_price']; ?>
</span><?php else: ?><br /><em>e.g. 7825,00</em><?php endif; ?>
			</td>	
			<td>
				<h4>Duration :</h4><br />
				<select id="_product_duration" name="_product_duration">
					<option value="0" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '0'): ?>selected<?php endif; ?>> Once Off /  Free </option>
					<option value="1" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '1'): ?>selected<?php endif; ?>> 1 Month </option>					
					<option value="2" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '2'): ?>selected<?php endif; ?>> 2 Month </option>					
					<option value="3" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '3'): ?>selected<?php endif; ?>> 3 Month </option>					
					<option value="4" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '4'): ?>selected<?php endif; ?>> 4 Month </option>					
					<option value="5" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '5'): ?>selected<?php endif; ?>> 5 Month </option>					
					<option value="6" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '6'): ?>selected<?php endif; ?>> 6 Month </option>					
					<option value="7" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '7'): ?>selected<?php endif; ?>> 7 Month </option>					
					<option value="8" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '8'): ?>selected<?php endif; ?>> 8 Month </option>					
					<option value="9" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '9'): ?>selected<?php endif; ?>> 9 Month </option>					
					<option value="10" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '10'): ?>selected<?php endif; ?>> 10 Month </option>					
					<option value="11" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '11'): ?>selected<?php endif; ?>> 11 Month </option>					
					<option value="12" <?php if ($this->_tpl_vars['productData']['_product_duration'] == '12'): ?>selected<?php endif; ?>> 12 Month </option>				
				</select>			
			</td>			
          </tr>	
          <tr>
			<td colspan="3">
				<h4 class="error">Description:</h4><br />
				<textarea name="_product_description" id="_product_description" rows="6" cols="90" maxlength="255"><?php echo $this->_tpl_vars['companyData']['_product_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['_product_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['_product_description']; ?>
<span><?php endif; ?>
			</td>
			</tr>
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/_registry/products/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	
	$( "#_product_created" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true });
	
	$( "#_product_closing" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true, minDate: new Date().getDate() });
	
	
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
	
	
	$( "#_productinstitute_name" ).autocomplete({
		source: "/feeds/institute.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#_productinstitute_name\').html(\'\');
				$(\'#_productinstitute_code\').val(\'\');					
			} else {
				$(\'#_productinstitute_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#_productinstitute_code\').val(ui.item.id);									
			}
			
			$(\'#_productinstitute_name\').val(\'\');										
		}
	});
	
			
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>