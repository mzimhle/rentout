<?php /* Smarty version 2.6.20, created on 2015-01-04 22:36:32
         compiled from participant/view/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'participant/view/default.tpl', 46, false),)), $this); ?>
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
			<li><a href="/participant/" title="Participants">Participants</a></li>
			<li><a href="/participant/view/" title="View">View</a></li>
        </ul>
	</div>
	<div class="inner">     
    <h2>Manage Participants</h2>
	<a href="/participant/view/details.php" title="Click to Add a new Participant" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Participant</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>
				<th>Added</th>
				<th>Category</th>
				<th>Fullname</th>
				<th>Email</th>
				<th>Cellphone</th>
				<th>Login Type</th>
				<th>Status</th>
				<th></th>
				</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['participantData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['participant_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
				<td align="left"><?php if ($this->_tpl_vars['item']['participant_type'] == 'OWNER'): ?>Car Owner<?php else: ?><span class="error">Car Lessor</span><?php endif; ?></td>	
				<td align="left"><?php echo $this->_tpl_vars['item']['participant_name']; ?>
 <?php echo $this->_tpl_vars['item']['participant_surname']; ?>
</td>
				<td align="left"><a href="/participant/view/details.php?code=<?php echo $this->_tpl_vars['item']['participant_code']; ?>
"><?php echo $this->_tpl_vars['item']['participant_email']; ?>
</a></td>	
				<td align="left"><?php echo $this->_tpl_vars['item']['participantlogin_type']; ?>
</td>
				<td align="left"><?php if ($this->_tpl_vars['item']['participant_active'] == '1'): ?><span class="success">Activated</span><?php else: ?><span class="error">Not Activated</span><?php endif; ?></td>			
				<td align="left"><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['participant_code']; ?>
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
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
</body>
</html>