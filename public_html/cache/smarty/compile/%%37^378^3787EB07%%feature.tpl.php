<?php /* Smarty version 2.6.20, created on 2015-01-30 06:43:08
         compiled from car/view/feature.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'car/view/feature.tpl', 48, false),array('function', 'html_options', 'car/view/feature.tpl', 63, false),)), $this); ?>
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

	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/car/view/" title="">Car</a></li>
			<li><a href="/car/view/details.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title=""><?php echo $this->_tpl_vars['carData']['brand_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['make_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['model_name']; ?>
</a></li>
			<li>Images</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2><?php echo $this->_tpl_vars['carData']['brand_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['make_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['model_name']; ?>
</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
			<li><a href="/car/view/details.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title="Details">Details</a></li>
			<li><a href="/car/view/image.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title="Images">Images</a></li>
			<li><a href="/car/view/mileage.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title="Mileage">Mileage</a></li>
			<li class="active"><a href="#" title="Feature">Feature</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<form id="addForm" name="addForm" action="/car/view/feature.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" method="post" enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<thead>
		  <tr>
			<th>Feature</th>				
			<th>Icon</th>
			<th></th>
		   </tr>
	   </thead>
	   <tbody>	   
	  <?php $_from = $this->_tpl_vars['carfeatureData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	  <tr>
		<td><?php echo $this->_tpl_vars['item']['feature_name']; ?>
</td>		
		<td><img src="http://www.rentout.co.za/download/feature/<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['feature_code'])) ? $this->_run_mod_handler('default', true, $_tmp, 'none') : smarty_modifier_default($_tmp, 'none')); ?>
?<?php echo $this->_tpl_vars['nc']; ?>
" width="35" /></td>		
		<td><button onclick="javascript:deleteForm('<?php echo $this->_tpl_vars['item']['carfeature_code']; ?>
'); return false;">Delete</button></td>		
	  </tr>
	  <?php endforeach; else: ?>
		<tr>
			<td colspan="3" class="error">There are no current items in the system.</td>
		</tr>
	  <?php endif; unset($_from); ?>  
		  <tr>
			<th colspan="3">Feature</th>
		   </tr>
		<tr>
			<td colspan="2">
				<select id="feature_code" name="feature_code">
					<option value=""> ----- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['featurepairs']), $this);?>

				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['feature_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['feature_code']; ?>
</span><?php endif; ?>
			</td>
			<td><button onclick="addForm(); return false;">Add Item</button></td>
		</tr>								
		</tbody>						
	</table>
	</form>
	</div>
	<div class="clearer"><!-- --></div>	

    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript">
function addForm() {
	document.forms.addForm.submit();				 
}			
	
function updateForm(id) {
	if(confirm(\'Are you sure you want to update this file ?\')) {
		var primary = \'\';
		if($(\'#feature_primary_\'+id).is(\':checked\')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "feature.php",
				data: "code='; ?>
<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php echo '&feature_code_update="+id+"&feature_primary="+primary + "&feature_description="+$(\'#feature_description_\'+id).val(),
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Updated\');
							window.location.href = window.location.href;
						} else {
							alert(data.error);
						}
				}
		});							
	}
	
	return false;
}	
	
function deleteForm(id) {	
	if(confirm(\'Are you sure you want to delete this file?\')) {
			$.ajax({ 
					type: "GET",
					url: "feature.php",
					data: "code='; ?>
<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php echo '&feature_code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert(\'Deleted\');
								window.location.href = window.location.href;
							} else {
								alert(data.error);
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