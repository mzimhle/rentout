<?php /* Smarty version 2.6.20, created on 2014-09-11 20:15:09
         compiled from administration/tradeleads/view/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'administration/tradeleads/view/details.tpl', 61, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['tradeleadData'] )): ?>Edit Trade Lead<?php else: ?>Add a Trade Lead<?php endif; ?></title>
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
			<li><a href="/administration/tradeleads/" title="Trade Leads">Trade Leads</a></li>
			<li><a href="/administration/tradeleads/view/" title="Trade Leads">View Trade Leads</a></li>
			<li><?php if (isset ( $this->_tpl_vars['tradeleadData'] )): ?>Edit Trade Lead<?php else: ?>Add a Trade Lead<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['tradeleadData'] )): ?>Edit Trade Lead<?php else: ?>Add a Trade Lead<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['tradeleadData'] )): ?>/administration/tradeleads/view/images.php?code=<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Images">Images</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/tradeleads/view/details.php<?php if (isset ( $this->_tpl_vars['tradeleadData'] )): ?>?code=<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
           <tr>
            <td class="left_col"><h4>Active</h4></td>
            <td><input type="checkbox" name="tradelead_active" id="tradelead_active" value="1" <?php if ($this->_tpl_vars['tradeleadData']['tradelead_active'] == 1): ?> checked="checked" <?php endif; ?> /></td>
          </tr>	
		  <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_created'] )): ?> error<?php endif; ?>" ><h4>Created Date:</h4></td>
			<td><input type="text" name="tradelead_created" id="tradelead_created" value="<?php echo $this->_tpl_vars['tradeleadData']['tradelead_created']; ?>
" size="10"/></td>	
          </tr>
		  <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_closing'] )): ?> error<?php endif; ?>"><h4>Closing Date:</h4></td>
			<td><input type="text" name="tradelead_closing" id="tradelead_closing" value="<?php echo $this->_tpl_vars['tradeleadData']['tradelead_closing']; ?>
" size="10"/></td>	
          </tr>			  
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_name'] )): ?> error<?php endif; ?>"><h4>Name:</h4></td>
			<td>
			<input type="text" name="tradelead_name" id="tradelead_name" value="<?php echo $this->_tpl_vars['tradeleadData']['tradelead_name']; ?>
" size="60" />
			<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_name'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['tradelead_name']; ?>
</span><?php endif; ?>
			</td>	
          </tr>
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['category_code'] )): ?> error<?php endif; ?>"><h4>Category:</h4></td>
			<td>
				<select id="category_code" name="category_code">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categorypairs'],'selected' => $this->_tpl_vars['tradeleadData']['category_code']), $this);?>

				</select>
			</td>	
          </tr>		  
          <tr>            
			<td colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_description'] )): ?>class="error"<?php endif; ?>>Short Description: - Must be less than 255 characters. </h4> <br />				
				<textarea name="tradelead_description" id="tradelead_description" rows="3" cols="80" ><?php echo $this->_tpl_vars['tradeleadData']['tradelead_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_description'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['tradelead_description']; ?>
</span><?php endif; ?>
			</td>	
          </tr>		  
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?> error<?php endif; ?>"><h4>Partcipant:</h4></td>
			<td>
				<input type="text" name="participant_name" id="participant_name" value="<?php echo $this->_tpl_vars['tradeleadData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['tradeleadData']['participant_surname']; ?>
" size="60" />
				<input type="hidden" name="participant_code" id="participant_code" value="<?php echo $this->_tpl_vars['tradeleadData']['participant_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
</span><?php endif; ?>
			</td>	
          </tr>
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_contact'] )): ?> error<?php endif; ?>"><h4>Contact Name:</h4></td>
			<td><input type="text" name="tradelead_contact" id="tradelead_contact" value="<?php echo $this->_tpl_vars['tradeleadData']['tradelead_contact']; ?>
" size="60" /></td>	
          </tr>
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_email'] )): ?> error<?php endif; ?>"><h4>Contact Email:</h4></td>
			<td>
			<input type="text" name="tradelead_email" id="tradelead_email" value="<?php echo $this->_tpl_vars['tradeleadData']['tradelead_email']; ?>
" size="60" />
			<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_email'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['tradelead_email']; ?>
</span><?php endif; ?>
			</td>	
          </tr>	
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_number'] )): ?> error<?php endif; ?>"><h4>Contact Number:</h4></td>
			<td>
				<input type="text" name="tradelead_number" id="tradelead_email" value="<?php echo $this->_tpl_vars['tradeleadData']['tradelead_number']; ?>
" size="60" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_number'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['tradelead_number']; ?>
</span><?php endif; ?>
			</td>	
          </tr>		  
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?> error<?php endif; ?>"><h4>Area:</h4></td>
			<td>
				<input type="text" name="areapost_name" id="areapost_name" value="<?php echo $this->_tpl_vars['tradeleadData']['areapost_city']; ?>
" size="60" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['tradeleadData']['areapost_code']; ?>
" />
			</td>	
          </tr>	
          <tr>            
			<td colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['tradelead_page'] )): ?>class="error"<?php endif; ?>>Full Description:</h4> <br />
				<textarea name="tradelead_page" id="tradelead_page" rows="15" cols="80" ><?php echo $this->_tpl_vars['tradeleadData']['tradelead_page']; ?>
</textarea>
			</td>	
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/tradeleads/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'tradelead_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	new nicEditor({
		iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
		buttonList 	: [\'bold\',\'italic\',\'underline\',\'left\',\'center\', \'ol\', \'ul\', \'xhtml\', \'fontFormat\', \'fontFamily\', \'fontSize\', \'unlink\', \'link\', \'strikethrough\', \'superscript\', \'subscript\'],
		maxHeight 	: \'1000\',
		uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
	}).panelInstance(\'tradelead_page\');	
	
	$( "#tradelead_created" ).datepicker({
		changeMonth: true,
		numberOfMonths: 1,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#tradelead_closing" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#tradelead_closing" ).datepicker({
		changeMonth: true,
		numberOfMonths: 1,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#tradelead_created" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	$( "#areapost_name" ).autocomplete({
		source: "/feeds/area.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#areapost_name\').html(\'\');
				$(\'#areapost_code\').val(\'\');					
			} else {
				$(\'#areapost_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#areapost_code\').val(ui.item.id);									
			}
			
			$(\'#areapost_name\').val(\'\');										
		}
	});
	
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				//$(\'#tradeleadinstitute_name\').html(\'\');
				$(\'#participant_code\').val(\'\');					
			} else {
				//$(\'#tradeleadinstitute_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#participant_code\').val(ui.item.id);									
			}
			
			$(\'#participant_name\').val(\'\');										
		}
	});
	
			
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>