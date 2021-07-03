<?php /* Smarty version 2.6.20, created on 2015-02-13 13:31:45
         compiled from brand/view/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'brand/view/default.tpl', 43, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" language="javascript" src="default.js"></script>
</head>

<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/brand/" title="Brand">Brand</a></li>
			<li><a href="/brand/view/" title="Brand">View</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Brands</h2>
	<a href="/brand/view/details.php" title="Click to Add a new Brand" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Brand</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>				
				<th>Added</th>
				<th>Logo</th>
				<th>Name</th>
				<th></th>
				</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['brandData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				<tr>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['brand_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
					<td><?php if ($this->_tpl_vars['item']['brand_image_path'] != ''): ?><img src="http://www.rentout.co.za<?php echo $this->_tpl_vars['item']['brand_image_path']; ?>
tny_<?php echo $this->_tpl_vars['item']['brand_image_name']; ?>
<?php echo $this->_tpl_vars['item']['brand_image_ext']; ?>
" /><?php else: ?><img src="http://www.rentout.co.za/images/no-image.jpg" width="50px"/><?php endif; ?></td>
					<td align="left"><a href="/brand/view/details.php?code=<?php echo $this->_tpl_vars['item']['brand_code']; ?>
"><?php echo $this->_tpl_vars['item']['brand_name']; ?>
</a></td>
					<td align="right"><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['brand_code']; ?>
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
	 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  </div><!-- End Content Section -->
</div>
<!-- End Main Container -->
</body>
</html>