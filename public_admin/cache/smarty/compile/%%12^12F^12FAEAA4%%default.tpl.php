<?php /* Smarty version 2.6.20, created on 2014-09-14 13:46:30
         compiled from administration/resources/mailers/comms/default.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | View Comms</title>
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
			<li><a href="/administration/resources/" title="Resources">Resources</a></li>
			<li><a href="/administration/resources/mailers/" title="Jobs">Mailers</a></li>
			<li><a href="/administration/resources/mailers/comms/" title="Jobs">Comms</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Comms</h2><br /><br />
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">			
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Sent</th>
						<th>Mail</th>						
						<th>Person</th>
						<th>Email</th>
						<th>Reference</th>						
						<th>Output</th>		
						<th>View</th>						
					</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['commsData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td><?php echo $this->_tpl_vars['item']['_comm_added']; ?>
</td>
				<td align="left">
					<?php if ($this->_tpl_vars['item']['_comm_sent'] == '1'): ?>
						<a style="color: green !important;"href="/administration/resources/mailers/comms/details.php?code=<?php echo $this->_tpl_vars['item']['_comm_code']; ?>
"><?php echo $this->_tpl_vars['item']['_comm_code']; ?>
</a>
					<?php else: ?><a style="color: red !important;"href="/administration/resources/mailers/comms/details.php?code=<?php echo $this->_tpl_vars['item']['_comm_code']; ?>
"><?php echo $this->_tpl_vars['item']['_comm_code']; ?>
</a>
					<?php endif; ?>
					</td>					
				<td align="left">
				<a href="/administration/participants/details.php?code=<?php echo $this->_tpl_vars['item']['mailinglist_reference']; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['mailinglist_name']; ?>
 <?php echo $this->_tpl_vars['item']['mailinglist_surname']; ?>
</a>
				</td>
				<td align="left"><?php echo $this->_tpl_vars['item']['_comm_email']; ?>
</td>
				<td align="left"><?php echo $this->_tpl_vars['item']['_comm_reference']; ?>
</td>	
				<td align="left"><?php echo $this->_tpl_vars['item']['_comm_output']; ?>
</td>		
				<td align="left"><?php if ($this->_tpl_vars['item']['_comm_type'] == 'EMAIL' || $this->_tpl_vars['item']['_comm_type'] == 'email'): ?><a href="/mailers/view/<?php echo $this->_tpl_vars['item']['_comm_code']; ?>
" target="_blank">View</a><?php else: ?>N/A<?php endif; ?></td>					
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