<?php /* Smarty version 2.6.20, created on 2014-09-09 17:48:51
         compiled from administration/tenders/view/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'administration/tenders/view/details.tpl', 65, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['tenderData'] )): ?>Edit Tender<?php else: ?>Add a Tender<?php endif; ?></title>
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
			<li><a href="/administration/tenders/" title="Tenders">Tenders</a></li>
			<li><a href="/administration/tenders/view/" title="Tenders">View Tenders</a></li>
			<li><?php if (isset ( $this->_tpl_vars['tenderData'] )): ?>Edit Tender<?php else: ?>Add a Tender<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['tenderData'] )): ?>Edit Tender<?php else: ?>Add a Tender<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['tenderData'] )): ?>/administration/tenders/view/document.php?code=<?php echo $this->_tpl_vars['tenderData']['tender_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Details">Documents</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/tenders/view/details.php<?php if (isset ( $this->_tpl_vars['tenderData'] )): ?>?code=<?php echo $this->_tpl_vars['tenderData']['tender_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
           <tr>
            <td class="left_col"><h4>Active</h4></td>
            <td><input type="checkbox" name="tender_active" id="tender_active" value="1" <?php if ($this->_tpl_vars['tenderData']['tender_active'] == 1): ?> checked="checked" <?php endif; ?> /></td>
          </tr>	
		  <tr>
            <td class="left_col" <?php if (isset ( $this->_tpl_vars['errorArray']['tender_created'] )): ?>style="color: red"<?php endif; ?>><h4>Created Date:</h4></td>
			<td><input type="text" name="tender_created" id="tender_created" value="<?php echo $this->_tpl_vars['tenderData']['tender_created']; ?>
" size="10"/></td>	
          </tr>
		  <tr>
            <td class="left_col" <?php if (isset ( $this->_tpl_vars['errorArray']['tender_closing'] )): ?>style="color: red"<?php endif; ?>><h4>Closing Date:</h4></td>
			<td><input type="text" name="tender_closing" id="tender_closing" value="<?php echo $this->_tpl_vars['tenderData']['tender_closing']; ?>
" size="10"/></td>	
          </tr>			  
          <tr>
            <td class="left_col" <?php if (isset ( $this->_tpl_vars['errorArray']['tender_name'] )): ?>style="color: red"<?php endif; ?>><h4>Name:</h4></td>
			<td><input type="text" name="tender_name" id="tender_name" value="<?php echo $this->_tpl_vars['tenderData']['tender_name']; ?>
" size="60" /></td>	
          </tr>
          <tr>
            <td class="left_col" <?php if (isset ( $this->_tpl_vars['errorArray']['tenderinstitute_code'] )): ?>style="color: red"<?php endif; ?>><h4>Institute:</h4></td>
			<td>
				<input type="text" name="tenderinstitute_name" id="tenderinstitute_name" value="<?php echo $this->_tpl_vars['tenderData']['tenderinstitute_name']; ?>
" size="60" />
				<input type="hidden" name="tenderinstitute_code" id="tenderinstitute_code" value="<?php echo $this->_tpl_vars['tenderData']['tenderinstitute_code']; ?>
" />
			</td>	
          </tr>			  	  
          <tr>
            <td class="left_col" <?php if (isset ( $this->_tpl_vars['errorArray']['category_code'] )): ?>style="color: red"<?php endif; ?>><h4>Category:</h4></td>
			<td>
				<select id="category_code" name="category_code">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categorypairs'],'selected' => $this->_tpl_vars['tenderData']['category_code']), $this);?>

				</select>
			</td>	
          </tr>		  
          <tr>            
			<td colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['tender_short_description'] )): ?>style="color: red"<?php endif; ?>>Short Description:</h4><br />
				<textarea name="tender_short_description" id="tender_short_description" rows="5" cols="80" ><?php echo $this->_tpl_vars['tenderData']['tender_short_description']; ?>
</textarea>
			</td>	
          </tr>
          <tr>            
			<td colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['tender_description'] )): ?>class="error"<?php endif; ?>>Description:</h4><br />
				<textarea name="tender_description" id="tender_description" rows="50" cols="130" ><?php echo $this->_tpl_vars['tenderData']['tender_description']; ?>
</textarea>
			</td>	
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/tenders/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'tender_description\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$( "#tender_created" ).datepicker({
		changeMonth: true,
		numberOfMonths: 1,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#tender_closing" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#tender_closing" ).datepicker({
		changeMonth: true,
		numberOfMonths: 1,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#tender_created" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
		$(document).ready(function() {			
			new nicEditor({
				iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
				buttonList 	: [\'bold\',\'italic\',\'underline\',\'left\',\'center\', \'ol\', \'ul\', \'xhtml\', \'fontFormat\', \'fontFamily\', \'fontSize\', \'unlink\', \'link\', \'strikethrough\', \'superscript\', \'subscript\', \'upload\'],
				maxHeight 	: \'1000\',
				uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
			}).panelInstance(\'tender_description\');				
		});
		
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
	
	
	$( "#tenderinstitute_name" ).autocomplete({
		source: "/feeds/institute.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#tenderinstitute_name\').html(\'\');
				$(\'#tenderinstitute_code\').val(\'\');					
			} else {
				$(\'#tenderinstitute_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#tenderinstitute_code\').val(ui.item.id);									
			}
			
			$(\'#tenderinstitute_name\').val(\'\');										
		}
	});
	
			
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>