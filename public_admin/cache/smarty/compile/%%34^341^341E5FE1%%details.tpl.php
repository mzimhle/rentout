<?php /* Smarty version 2.6.20, created on 2014-09-11 18:34:31
         compiled from administration/tenders/institutes/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['tenderinstituteData'] )): ?>Edit Institute<?php else: ?>Add a Institute<?php endif; ?></title>
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
			<li><a href="/administration/tenders/institutes/" title="Institute">Institute</a></li>
			<li><?php if (isset ( $this->_tpl_vars['tenderinstituteData'] )): ?>Edit Institute<?php else: ?>Add a Institute<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['tenderinstituteData'] )): ?>Edit Institute<?php else: ?>Add a Institute<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/tenders/institutes/details.php<?php if (isset ( $this->_tpl_vars['tenderinstituteData'] )): ?>?code=<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
           <tr>
            <td class="left_col">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="tenderinstitute_name" id="tenderinstitute_name" value="<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_name']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['tenderinstitute_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['tenderinstitute_name']; ?>
</span><?php endif; ?>
			</td>
            <td class="left_col">
				<h4>Website:</h4><br />
				<input type="text" name="tenderinstitute_website" id="tenderinstitute_website" value="<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_website']; ?>
" size="30" />
			</td>
            <td class="left_col" >
				<h4 class="error">Area:</h4><br />
				<input type="text" name="area_name" id="area_name" value="<?php echo $this->_tpl_vars['tenderinstituteData']['area_shortPath']; ?>
" size="60" />
				<input type="hidden" name="area_code" id="area_code" value="<?php echo $this->_tpl_vars['tenderinstituteData']['area_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['area_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['area_code']; ?>
</span><?php endif; ?>
			</td>			
          </tr>
		  <tr>
            <td class="left_col">
				<h4>Address:</h4><br />
				<input type="text" name="tenderinstitute_address" id="tenderinstitute_address" value="<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_address']; ?>
" size="40" />
			</td>	
            <td class="left_col">
				<h4>Postal Address:</h4><br />
				<input type="text" name="tenderinstitute_postal" id="tenderinstitute_postal" value="<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_postal']; ?>
" size="40" />
			</td>
            <td class="left_col">
				<h4>Fax:</h4><br />
				<input type="text" name="tenderinstitute_fax" id="tenderinstitute_fax" value="<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_fax']; ?>
" size="20" />
			</td>				
		  </tr>
		  <tr>
            <td class="left_col" colspan="3">
				<h4>Telephone:</h4><br />
				<input type="text" name="tenderinstitute_telephone" id="tenderinstitute_telephone" value="<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_telephone']; ?>
" size="20" />
			</td>			
		  </tr>
		  <tr>
            <td class="left_col" colspan="3">
				<h4>Tender Link:</h4><br />
				<input type="text" name="tenderinstitute_tenderlink" id="tenderinstitute_tenderlink" value="<?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_tenderlink']; ?>
" size="100" />
			</td>		  
		  </tr>
		  <tr>
            <td class="left_col" colspan="3">
				<h4>Contacts:</h4><br />
				<textarea name="tenderinstitute_contacts" id="tenderinstitute_contacts" rows="4" cols="90"><?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_contacts']; ?>
</textarea>
			</td>		  
		  </tr>
		  <tr>
            <td class="left_col" colspan="3">
				<h4>Description:</h4><br />
				<textarea name="tenderinstitute_description" id="tenderinstitute_description" rows="20" cols="90"><?php echo $this->_tpl_vars['tenderinstituteData']['tenderinstitute_description']; ?>
</textarea>
			</td>			  
		  </tr>
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/tenders/institutes/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'tenderinstitute_description\').saveContent();
	document.forms.detailsForm.submit();					 
}

$(document).ready(function() {
	new nicEditor({
		iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
		buttonList 	: [\'bold\',\'italic\',\'underline\',\'left\',\'center\', \'ol\', \'ul\', \'xhtml\', \'fontFormat\', \'fontFamily\', \'fontSize\', \'unlink\', \'link\', \'strikethrough\', \'superscript\', \'subscript\', \'upload\'],
		maxHeight 	: \'1000\',
		uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
	}).panelInstance(\'tenderinstitute_description\');			

		
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
	
});
</script>
'; ?>

<!-- End Main Container -->
</body>
</html>