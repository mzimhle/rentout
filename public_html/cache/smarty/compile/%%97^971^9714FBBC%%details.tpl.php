<?php /* Smarty version 2.6.20, created on 2015-01-17 14:58:08
         compiled from brand/model/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'brand/model/details.tpl', 47, false),)), $this); ?>
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
			<li><a href="/model/" title="Models">Models</a></li>
			<li><a href="/brand/model/" title="Members">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['modelData'] )): ?>Edit Model<?php else: ?>Add a Model<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['modelData'] )): ?>Edit Model<?php else: ?>Add a Model<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/brand/model/details.php<?php if (isset ( $this->_tpl_vars['modelData'] )): ?>?code=<?php echo $this->_tpl_vars['modelData']['model_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="model_name" id="model_name" value="<?php echo $this->_tpl_vars['modelData']['model_name']; ?>
" size="80" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['model_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['model_name']; ?>
</span><?php else: ?><br />Name of the model as it will be seen on the website<?php endif; ?>
			</td>				
          </tr>
         <tr>
			<td>
				<h4 class="error">Brand:</h4><br />
				<select name="brand_code" id="brand_code" onchange="getMake();">
					<option value=""> ---- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['brandpairs'],'selected' => $this->_tpl_vars['modelData']['brand_code']), $this);?>

				</select>
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['brand_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['brand_code']; ?>
</span><?php else: ?><em>Select brand that this make falls under</em><?php endif; ?>
			</td>				
          </tr>
         <tr>
			<td>
				<h4 class="error">Make:</h4><br />
				<div id="makelist">
					<span class="error">Please select a brand first to list it's makes</span>
					<input type="hidden" id="make_code" name="make_code" />
				</div>
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['brand_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['brand_code']; ?>
</span><?php else: ?><em>Select brand that this make falls under</em><?php endif; ?>				
			</td>				
          </tr>		  
          <tr>
			<td valign="top">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['modellogo'] )): ?>class="error"<?php endif; ?> >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="modellogo" name="modellogo" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['modellogo'] )): ?><br /><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['modellogo']; ?>
</span><?php endif; ?>
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				<?php if ($this->_tpl_vars['modelData']['model_image_path'] != ''): ?><img src="http://www.rentout.co.za<?php echo $this->_tpl_vars['modelData']['model_image_path']; ?>
tny_<?php echo $this->_tpl_vars['modelData']['model_image_name']; ?>
<?php echo $this->_tpl_vars['modelData']['model_image_ext']; ?>
" /><?php else: ?><img src="http://www.rentout.co.za/images/no-image.jpg" width="150px" /><?php endif; ?>
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/brand/model/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
$(document).ready(function(){
	getMake();
});
function submitForm() {
	document.forms.detailsForm.submit();					 
}
function getMake() {
	
	var brandcode = $(\'#brand_code :selected\').val();
	
	if(brandcode != \'\') {
		$.ajax({
				type: "GET",
				url: "details.php",
				data: "'; ?>
<?php if (isset ( $this->_tpl_vars['modelData'] )): ?>code=<?php echo $this->_tpl_vars['modelData']['model_code']; ?>
&<?php endif; ?><?php echo 'get_make_code="+brandcode,
				dataType: "html",
				success: function(data){
					$(\'#makelist\').html(data);
				}
		});							
	}
	return false;
	
}
</script>
'; ?>

<!-- End Main Container -->
</body>
</html>