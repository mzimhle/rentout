<?php /* Smarty version 2.6.20, created on 2015-01-15 23:01:24
         compiled from group/view/details.tpl */ ?>
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
			<li><a href="/group/" title="Groups">Groups</a></li>
			<li><a href="/group/view/" title="Members">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['groupData'] )): ?>Edit Group<?php else: ?>Add a Group<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['groupData'] )): ?>Edit Group<?php else: ?>Add a Group<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/group/view/details.php<?php if (isset ( $this->_tpl_vars['groupData'] )): ?>?code=<?php echo $this->_tpl_vars['groupData']['group_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="2">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="group_name" id="group_name" value="<?php echo $this->_tpl_vars['groupData']['group_name']; ?>
" size="80" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['group_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['group_name']; ?>
</span><?php else: ?><br />Name of the group as it will be seen on the website<?php endif; ?>
			</td>				
          </tr>
          <tr>
			<td valign="top">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['grouplogo'] )): ?>class="error"<?php endif; ?> >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="grouplogo" name="grouplogo" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['grouplogo'] )): ?><br /><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['grouplogo']; ?>
</span><?php endif; ?>
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				<?php if ($this->_tpl_vars['groupData']['group_image_path'] != ''): ?><img src="http://www.rentout.co.za<?php echo $this->_tpl_vars['groupData']['group_image_path']; ?>
tny_<?php echo $this->_tpl_vars['groupData']['group_image_name']; ?>
<?php echo $this->_tpl_vars['groupData']['group_image_ext']; ?>
" /><?php else: ?><img src="http://www.rentout.co.za/images/no-image.jpg" /><?php endif; ?>
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/group/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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