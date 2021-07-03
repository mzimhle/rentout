<?php /* Smarty version 2.6.20, created on 2015-01-19 14:50:30
         compiled from car/feature/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'car/feature/details.tpl', 50, false),)), $this); ?>
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

  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/feature/" title="Features">Features</a></li>
			<li><a href="/car/feature/" title="Members">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['featureData'] )): ?>Edit Feature<?php else: ?>Add a Feature<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['featureData'] )): ?>Edit Feature<?php else: ?>Add a Feature<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/car/feature/details.php<?php if (isset ( $this->_tpl_vars['featureData'] )): ?>?code=<?php echo $this->_tpl_vars['featureData']['feature_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="2">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="feature_name" id="feature_name" value="<?php echo $this->_tpl_vars['featureData']['feature_name']; ?>
" size="80" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['feature_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['feature_name']; ?>
</span><?php else: ?><br />Name of the feature as it will be seen on the website<?php endif; ?>
			</td>				
          </tr>
          <tr>
			<td valign="top">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['featureimage'] )): ?>class="error"<?php endif; ?> >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="featureimage" name="featureimage" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['featureimage'] )): ?><br /><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['featureimage']; ?>
</span><?php endif; ?>
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				<img src="http://www.rentout.co.za/download/feature/<?php echo ((is_array($_tmp=@$this->_tpl_vars['featureData']['feature_code'])) ? $this->_run_mod_handler('default', true, $_tmp, 'none') : smarty_modifier_default($_tmp, 'none')); ?>
?<?php echo $this->_tpl_vars['nc']; ?>
" />
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/car/feature/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

 </div><!-- End Content recruiter -->
<?php echo '
<script type="text/javascript" language="javascript">
function submitForm() {
	document.forms.detailsForm.submit();					 
}
</script>
'; ?>

<!-- End Main Container -->
</body>
</html>