<?php /* Smarty version 2.6.20, created on 2014-09-24 09:38:31
         compiled from administration/company/view/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'administration/company/view/default.tpl', 44, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maverick</title>
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
			<li><a href="/administration/company/" title="Jobs">Company</a></li>
			<li><a href="/administration/company/view/" title="Jobs">View Company</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage company</h2>
	<a href="/administration/company/view/details.php" title="Click to Add a new Company" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Company</span></a> <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">			
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Added</th>
						<th>Logo</th>						
						<th>Member</th>
						<th>Name</th>
						<th>Area</th>
						<th>Website</th>
					</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['companyData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				  <tr>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['company_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
					<td><?php if ($this->_tpl_vars['item']['company_logo_name'] != ''): ?><img src="<?php echo $this->_tpl_vars['item']['company_logo_path']; ?>
tny_<?php echo $this->_tpl_vars['item']['company_logo_name']; ?>
<?php echo $this->_tpl_vars['item']['company_logo_ext']; ?>
" width="50" height="50" /><?php else: ?><img src="/images/no-logo.jpg" width="50px"/><?php endif; ?></td>					
					<td align="left"><?php echo $this->_tpl_vars['item']['participant_name']; ?>
 <?php echo $this->_tpl_vars['item']['participant_surname']; ?>
</td>
					<td align="left"><a href="/administration/company/view/details.php?code=<?php echo $this->_tpl_vars['item']['company_code']; ?>
"><?php echo $this->_tpl_vars['item']['company_name']; ?>
</a></td>					
					<td align="left"><?php echo $this->_tpl_vars['item']['areapost_name']; ?>
</td>
					<td align="left"><?php echo $this->_tpl_vars['item']['company_website']; ?>
</td>
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
</body>
</html>