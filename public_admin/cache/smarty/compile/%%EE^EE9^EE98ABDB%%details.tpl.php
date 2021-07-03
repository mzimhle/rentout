<?php /* Smarty version 2.6.20, created on 2014-09-09 17:22:39
         compiled from administration/articles/view/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'administration/articles/view/details.tpl', 52, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['articleData'] )): ?>Edit Article<?php else: ?>Add a Article<?php endif; ?></title>
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
			<li><a href="/administration/articles/" title="Articles">Articles</a></li>
			<li><a href="/administration/articles/view/" title="Articles">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['articleData'] )): ?>Edit Article<?php else: ?>Add a Article<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['articleData'] )): ?>Edit Article<?php else: ?>Add a Article<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/articles/view/details.php<?php if (isset ( $this->_tpl_vars['articleData'] )): ?>?code=<?php echo $this->_tpl_vars['articleData']['article_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
           <tr>
            <td class="left_col"><h4>Active</h4></td>
            <td><input type="checkbox" name="article_active" id="article_active" value="1" <?php if ($this->_tpl_vars['articleData']['article_active'] == 1): ?> checked="checked" <?php endif; ?> /></td>
          </tr>				  
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['article_title'] )): ?> error<?php endif; ?>"><h4>Title:</h4></td>
			<td>
			<input type="text" name="article_title" id="article_title" value="<?php echo $this->_tpl_vars['articleData']['article_title']; ?>
" size="60" />
			<?php if (isset ( $this->_tpl_vars['errorArray']['article_title'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['article_title']; ?>
</span><?php endif; ?>
			</td>	
          </tr>
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['area_code'] )): ?> error<?php endif; ?>"><h4>Category:</h4></td>
			<td>
				<select id="category_code" name="category_code">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categorypairs'],'selected' => $this->_tpl_vars['articleData']['category_code']), $this);?>

				</select>
			</td>	
          </tr>		  
          <tr>            
			<td colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['article_description'] )): ?>class="error"<?php endif; ?>>Short Description: - Must be less than 255 characters. </h4> <br />				
				<textarea name="article_description" id="article_description" rows="3" cols="80" maxlength="255"><?php echo $this->_tpl_vars['articleData']['article_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['article_description'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['article_description']; ?>
</span><?php endif; ?>
			</td>	
          </tr>		  
          <tr>
            <td class="left_col<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?> error<?php endif; ?>"><h4>Partcipant:</h4></td>
			<td>
				<input type="text" name="participant_name" id="participant_name" value="<?php echo $this->_tpl_vars['articleData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['articleData']['participant_surname']; ?>
" size="60" />
				<input type="hidden" name="participant_code" id="participant_code" value="<?php echo $this->_tpl_vars['articleData']['participant_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><br /><span class="error"> - <?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
</span><?php endif; ?>
			</td>	
          </tr>	  
          <tr>            
			<td colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['article_page'] )): ?>class="error"<?php endif; ?>>Full Description:</h4> <br />
				<textarea name="article_page" id="article_page" rows="45" cols="90" ><?php echo $this->_tpl_vars['articleData']['article_page']; ?>
</textarea>
			</td>	
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/articles/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'article_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	new nicEditor({
		iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
		buttonList 	: [\'bold\',\'italic\',\'underline\',\'left\',\'center\', \'ol\', \'ul\', \'xhtml\', \'fontFormat\', \'fontFamily\', \'fontSize\', \'unlink\', \'link\', \'strikethrough\', \'superscript\', \'subscript\'],
		maxHeight 	: \'1000\',
		uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
	}).panelInstance(\'article_page\');
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				//$(\'#articleinstitute_name\').html(\'\');
				$(\'#participant_code\').val(\'\');					
			} else {
				//$(\'#articleinstitute_name\').html(\'<b>\' + ui.item.value + \'</b>\');
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