<?php /* Smarty version 2.6.20, created on 2014-09-09 18:01:27
         compiled from administration/articles/view/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'administration/articles/view/default.tpl', 47, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | View Articles</title>
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
			<li><a href="/administration/articles/" title="Jobs">Articles</a></li>
			<li><a href="/administration/articles/view/" title="Jobs">View</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Articles</h2>
	<a href="/administration/articles/view/details.php" title="Click to Add a new Article" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Article</span></a> <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">			
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>
					<th>Added</th>
					<th>Participant</th>
					<th>Category</th>
					<th>Title</th>
					<th>Description</th>
					<th>Status</th>
					<th></th>
					<th></th>					
				</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['articleData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['article_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
				<td><?php echo $this->_tpl_vars['item']['participant_name']; ?>
 <?php echo $this->_tpl_vars['item']['participant_surname']; ?>
</td>				
				<td align="left"><?php echo $this->_tpl_vars['item']['category_name']; ?>
</td>
				<td align="left"><a href="/administration/articles/view/details.php?code=<?php echo $this->_tpl_vars['item']['article_code']; ?>
"><?php echo $this->_tpl_vars['item']['article_title']; ?>
</a></td>
				<td align="left"><?php echo $this->_tpl_vars['item']['article_description']; ?>
</td>
				<td align="left"><?php if ($this->_tpl_vars['item']['article_active'] == '1'): ?><span style="color: green;">Active</span><?php else: ?><span style="color: red;">Not Active</span><?php endif; ?></td>
				<td align="right"><?php if ($this->_tpl_vars['item']['article_active'] == '1'): ?><button onclick="activate('<?php echo $this->_tpl_vars['item']['article_code']; ?>
', '0')">Deactivate</button><?php else: ?><button onclick="activate('<?php echo $this->_tpl_vars['item']['article_code']; ?>
', '1')">Activate</button><?php endif; ?></td>
				<td align="right"><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['article_code']; ?>
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