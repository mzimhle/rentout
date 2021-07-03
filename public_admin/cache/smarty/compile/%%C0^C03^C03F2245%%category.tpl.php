<?php /* Smarty version 2.6.20, created on 2014-09-24 09:37:00
         compiled from administration/company/view/category.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'administration/company/view/category.tpl', 75, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Maverick</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" language="javascript" src="default.js"></script>
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
			<li><a href="/administration/company/" title="company">company</a></li>
			<li><a href="/administration/company/view/" title="View">View</a></li>
			<li><a href="/administration/company/view/details.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
/" title="<?php echo $this->_tpl_vars['companyData']['company_name']; ?>
"><?php echo $this->_tpl_vars['companyData']['company_name']; ?>
</a></li>
			<li>Categories</li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2>Categories</h2>
    <div id="sidetabs">
        <ul > 
            <li><a href="/administration/company/view/details.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Category">Category</a></li>
			<li><a href="/administration/company/view/service.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
" title="Services">Services</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/company/view/category.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
" method="post"  enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<thead>
		  <tr>
			<th>Name</th>
			<th>Primary</th>
			<th></th>
			<th></th>
		   </tr>
	   </thead>
	   <tbody>
	  <?php $_from = $this->_tpl_vars['companyserviceData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	  <tr>
		<td><?php echo $this->_tpl_vars['item']['companyservice_name']; ?>
</a></td>																		
		<td>
			<input type="radio" name="companyservice_primary" id="companyservice_primary_<?php echo $this->_tpl_vars['item']['companyservice_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['companyservice_code']; ?>
" <?php if ($this->_tpl_vars['item']['companyservice_primary'] == 1): ?> checked="checked"<?php endif; ?> />
		</td>
		<td>	
			<button onclick="javascript:updateForm('<?php echo $this->_tpl_vars['item']['companyservice_code']; ?>
'); return false;" >Update</button>
		</td>			
		<td>
			<?php if ($this->_tpl_vars['item']['companyservice_primary'] == 1): ?>		
			N/A
			<?php else: ?>
			<button onclick="javascript:deleteForm('<?php echo $this->_tpl_vars['item']['companyservice_code']; ?>
'); return false;" >Delete</button>	
			<?php endif; ?>
		</td>		
	  </tr>
	  <?php endforeach; endif; unset($_from); ?>
		  <tr>
			<th colspan="3">Category</th>
			<th></th>
		   </tr>
		<tr>
			<td colspan="3">
				<select name="category_code" id="category_code">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categoryData']), $this);?>

				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['category_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['category_code']; ?>
</span><?php endif; ?>
			</td>
			<td><button onclick="addItemForm(); return false;">Add Item</button></td>
		</tr>			
		</tbody>						
	</table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content -->
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

 </div><!-- End Content --> 
</div>
<?php echo '
<script type="text/javascript" language="javascript">
function addItemForm() {
	document.forms.detailsForm.submit();					 
}
	
function updateForm(id) {
	if(confirm(\'Are you sure you want to update this file ?\')) {
		var primary = \'\';
		if($(\'#companyservice_primary_\'+id).is(\':checked\')) {
			primary = id;
		} else {
			alert(\'No category selected\');
			return false;
		}	
		
		$.ajax({ 
				type: "GET",
				url: "category.php",
				data: "code='; ?>
<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php echo '&update_code="+id+"&companyservice_primary="+primary,
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
					url: "category.php",
					data: "code='; ?>
<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php echo '&delete_code="+id,
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