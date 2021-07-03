<?php /* Smarty version 2.6.20, created on 2014-09-11 20:15:51
         compiled from administration/registry/products/default.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | Products</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" language="javascript" src="default.js"></script>
</head>

<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

	<div id="breadcrumb">
        <ul>
            <li><a href="/administration/" title="Home">Home</a></li>
			<li><a href="/administration/registry/" title="Registry">Registry</a></li>
			<li><a href="/administration/registry/products/" title="View">Products</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Products</h2>
	<a href="/administration/registry/products/details.php" title="Click to Add a new Product" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Product</span></a> <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">			
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>
					<th>Registry</th>
					<th>Reference</th>
					<th>Name</th>
					<th>Price</th>
					<th>Duration</th>
					<th>Description</th>
					<th>Status</th>
					<th></th>
					<th></th>
				</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['productData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td align="left"><?php echo $this->_tpl_vars['item']['_registry_code']; ?>
</td>
				<td align="left"><?php echo $this->_tpl_vars['item']['_product_reference']; ?>
</td>
				<td align="left"><a href="/administration/registry/products/details.php?code=<?php echo $this->_tpl_vars['item']['_product_code']; ?>
"><?php echo $this->_tpl_vars['item']['_registry_name']; ?>
</a></td>
				<td align="left">R <?php echo $this->_tpl_vars['item']['_product_price']; ?>
</td>
				<td align="left"><?php if ($this->_tpl_vars['item']['_product_duration'] == ''): ?>Once off / Free<?php else: ?><?php echo $this->_tpl_vars['item']['_product_duration']; ?>
 Months<?php endif; ?></td>
				<td align="left"><?php echo $this->_tpl_vars['item']['_product_description']; ?>
</td>
				<td align="left"><?php if ($this->_tpl_vars['item']['_product_active'] == '0'): ?><span class="error">Not Active</span><?php else: ?><span class="success">Active</span><?php endif; ?></td>
				<td align="right"><?php if ($this->_tpl_vars['item']['_product_active'] == '1'): ?><button onclick="activate('<?php echo $this->_tpl_vars['item']['_product_code']; ?>
', '0')">Deactivate</button><?php else: ?><button onclick="activate('<?php echo $this->_tpl_vars['item']['_product_code']; ?>
', '1')">Activate</button><?php endif; ?></td>
				<td align="right"><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['_product_code']; ?>
')">Delete</button></td>					
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>     
			  </tbody>
			</table>
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
  </div><!-- End Content Section -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
<?php echo '
<script type="text/javascript" language="javascript">
function deleteitem(id) {
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({ 
				type: "GET",
				url: "default.php",
				data: "delete_code="+id,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Item deleted!\');
							window.location.href = window.location.href;
						} else {
							alert(data.error);
						}
				}
		});							
	}
	return false;
}

function activate(id, status) {					
	if(confirm(\'Are you sure you want to change this item status?\')) {
		$.ajax({ 
				type: "GET",
				url: "default.php",
				data: "activate_code="+id+"&status="+status,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Status changed\');
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

</body>
</html>