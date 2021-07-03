<?php /* Smarty version 2.6.20, created on 2014-09-08 21:41:42
         compiled from administration/jobs/jobapplication/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'administration/jobs/jobapplication/default.tpl', 45, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | Job Applications</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" language="javascript" src="default.js"></script>
</head>

<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Application -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

	<div id="breadcrumb">
        <ul>
            <li><a href="/administration/" title="Home">Home</a></li>
			<li><a href="/administration/jobs/" title="Jobs">Jobs</a></li>
			<li><a href="/administration/jobs/jobapplication/" title="Jobs">Applications</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Jobs Applications</h2>
	<!-- <a href="/administration/jobs/jobapplication/details.php" title="Click to Add a new Application" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Application</span></a> <br /> -->
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">			
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>
					<th>Added</th>
					<th>Code</th>
					<th>Participant</th>
					<th>Job Title</th>
					<th>Download CV</th>
					<th>Status</th>
				</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['jobapplicationData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['jobapplication_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
				<td align="left"><a href="/administration/jobs/jobapplication/details.php?code=<?php echo $this->_tpl_vars['item']['jobapplication_code']; ?>
"><?php echo $this->_tpl_vars['item']['jobapplication_code']; ?>
</a></td>
				<td align="left"><?php echo $this->_tpl_vars['item']['jobapplication_name']; ?>
 / <?php echo $this->_tpl_vars['item']['jobapplication_email']; ?>
 </td>
				<td align="left"><a href="/administration/jobs/view/details.php?code=<?php echo $this->_tpl_vars['item']['job_code']; ?>
"><?php echo $this->_tpl_vars['item']['job_title']; ?>
</a></td>
				<td align="left"><a href="<?php echo $this->_tpl_vars['item']['jobapplication_pathToCV']; ?>
"><?php echo $this->_tpl_vars['item']['jobapplication_userFilename']; ?>
</a></td>
				<td align="left"><?php if ($this->_tpl_vars['item']['jobapplication_active'] == '1'): ?><span style="color: green;">Active</span><?php else: ?><span style="color: red;">Not Active</span><?php endif; ?></td>
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>     
			  </tbody>
			</table>
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
  </div><!-- End Content Application -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
</body>
</html>