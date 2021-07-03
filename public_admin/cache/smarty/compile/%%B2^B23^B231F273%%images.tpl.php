<?php /* Smarty version 2.6.20, created on 2014-09-09 17:06:30
         compiled from administration/tradeleads/view/images.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | Edit Trade Lead</title>
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
			<li><a href="/administration/tradeleads/view/" title="View">View</a></li>
			<li><a href="/administration/tradeleads/view/details.php?code=<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
" title="<?php echo $this->_tpl_vars['tradeleadData']['tradelead_name']; ?>
"><?php echo $this->_tpl_vars['tradeleadData']['tradelead_name']; ?>
</a></li>
			<li>Images</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner">
		<div class="clearer"><!-- --></div>
		<br /><h2>Manage Images</h2><br />
		<div id="sidetabs">
		<ul> 
            <li><a href="/administration/tradeleads/view/details.php?code=<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Images">Images</a></li>
		</ul>
		</div><!--tabs-->	
		  <div class="detail_box">  
		  <form name="imageForm" id="imageForm" action="/administration/tradeleads/view/images.php?code=<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
" method="post"  enctype="multipart/form-data">
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="innertable"> 
			  <thead>
			  <tr>				
				<th valign="top" colspan="2" <?php if (isset ( $this->_tpl_vars['errorArray']['category_code'] )): ?>class="error"<?php endif; ?>>Updaload</th>
				<th valign="top">Delete Image</th>
				<th valign="top">Make Primary</th>
			  </tr>
			  </thead>
			  <?php $_from = $this->_tpl_vars['tradeleadimageData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>	
				<td valign="top"<?php if ($this->_tpl_vars['item']['tradeleadimage_primary'] == '1'): ?>class="success"<?php endif; ?>><?php echo $this->_tpl_vars['item']['tradeleadimage_filename']; ?>
</td>	
				<td valign="top"><a href="/<?php echo $this->_tpl_vars['item']['tradeleadimage_path']; ?>
/big_<?php echo $this->_tpl_vars['item']['tradeleadimage_code']; ?>
<?php echo $this->_tpl_vars['item']['tradeleadimage_extension']; ?>
" target="_blank"><img src="/<?php echo $this->_tpl_vars['item']['tradeleadimage_path']; ?>
/tny_<?php echo $this->_tpl_vars['item']['tradeleadimage_code']; ?>
<?php echo $this->_tpl_vars['item']['tradeleadimage_extension']; ?>
" /></a></td>			
				<td valign="top"><?php if ($this->_tpl_vars['item']['tradeleadimage_primary'] == '0'): ?><button type="button" onclick="deleteitem('<?php echo $this->_tpl_vars['item']['tradeleadimage_code']; ?>
'); return false;">Delete</button><?php else: ?><b>Primary</b><?php endif; ?></td>	
				<td valign="top"><?php if ($this->_tpl_vars['item']['tradeleadimage_primary'] == '0'): ?><button type="button" onclick="makeprimary('<?php echo $this->_tpl_vars['item']['tradeleadimage_code']; ?>
'); return false;">Primary</button><?php else: ?><b>Primary</b><?php endif; ?></td>	
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>			
			  <tr>
				<td valign="top" colspan="3">
					<input type="file" id="imagefile" name="imagefile" />
				</td>		
				<td valign="top">
					<button type="submit" onclick="submitForm();">Upload Image</button>	
				</td>			
			  </tr>
			</table>
			<?php if (isset ( $this->_tpl_vars['errorArray']['error'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['error']; ?>
</span><?php endif; ?>
			</form>
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
<script type="text/javascript">

function submitForm() {
	document.forms.imageForm.submit();					 
}

function makeprimary(code) {
	if(confirm(\'Are you sure you want to make this item primary?\')) {
		$.ajax({
				type: "GET",
				url: "images.php?code='; ?>
<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
<?php echo '",
				data: "primarycode="+code,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Changed\');
							window.location.href = \'/administration/tradeleads/view/images.php?code='; ?>
<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
<?php echo '\';
						} else {
							alert(data.message);
						}
				}
		});		
	}
	return false;			
}

function deleteitem(code) {
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({
				type: "GET",
				url: "images.php?code='; ?>
<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
<?php echo '",
				data: "deletecode="+code,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Deleted\');
							window.location.href = \'/administration/tradeleads/view/images.php?code='; ?>
<?php echo $this->_tpl_vars['tradeleadData']['tradelead_code']; ?>
<?php echo '\';
						} else {
							alert(data.message);
						}
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