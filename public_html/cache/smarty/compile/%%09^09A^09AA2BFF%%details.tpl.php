<?php /* Smarty version 2.6.20, created on 2015-01-15 00:40:06
         compiled from brand/make/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'brand/make/details.tpl', 47, false),)), $this); ?>
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
			<li><a href="/participant/" title="Members">Members</a></li>
			<li><a href="/make/" title="Makes">Makes</a></li>
			<li><a href="/brand/make/" title="Members">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['makeData'] )): ?>Edit Brand<?php else: ?>Add a Brand<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['makeData'] )): ?>Edit Brand<?php else: ?>Add a Brand<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/brand/make/details.php<?php if (isset ( $this->_tpl_vars['makeData'] )): ?>?code=<?php echo $this->_tpl_vars['makeData']['make_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="make_name" id="make_name" value="<?php echo $this->_tpl_vars['makeData']['make_name']; ?>
" size="80" />
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['make_name'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['make_name']; ?>
</span><?php else: ?><em>Name of the make as it will be seen on the website</em><?php endif; ?>
			</td>				
          </tr>
         <tr>
			<td>
				<h4 class="error">Brand:</h4><br />
				<select name="brand_code" id="brand_code">
					<option value=""> ---- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['brandpairs'],'selected' => $this->_tpl_vars['makeData']['brand_code']), $this);?>

				</select>
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['brand_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['brand_code']; ?>
</span><?php else: ?><em>Select brand that this make falls under</em><?php endif; ?>
			</td>				
          </tr>		  
          <tr>
			<td valign="top">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['makelogo'] )): ?>class="error"<?php endif; ?> >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="makelogo" name="makelogo" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['makelogo'] )): ?><br /><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['makelogo']; ?>
</span><?php endif; ?>
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				<?php if ($this->_tpl_vars['makeData']['make_image_path'] != ''): ?><img src="http://www.rentout.co.za<?php echo $this->_tpl_vars['makeData']['make_image_path']; ?>
tny_<?php echo $this->_tpl_vars['makeData']['make_image_name']; ?>
<?php echo $this->_tpl_vars['makeData']['make_image_ext']; ?>
" /><?php else: ?><img src="http://www.rentout.co.za/images/no-image.jpg" /><?php endif; ?>
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/brand/make/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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