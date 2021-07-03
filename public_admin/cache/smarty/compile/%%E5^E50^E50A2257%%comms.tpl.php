<?php /* Smarty version 2.6.20, created on 2014-09-24 20:35:34
         compiled from administration/campaign/newsletter/comms.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'administration/campaign/newsletter/comms.tpl', 54, false),)), $this); ?>
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
			<li><a href="/administration/campaign/" title="Campaign">Campaign</a></li>
			<li><a href="/administration/campaign/newsletter/" title="Jobs">Newsletter</a></li>
			<li><?php echo $this->_tpl_vars['campaignData']['_campaign_name']; ?>
</li>
			<li>Sent Mails</li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php echo $this->_tpl_vars['campaignData']['_campaign_name']; ?>
</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/administration/campaign/newsletter/details.php?code=<?php echo $this->_tpl_vars['campaignData']['_campaign_code']; ?>
" title="Details">Details</a></li>
			<li><a href="/administration/campaign/newsletter/mail.php?code=<?php echo $this->_tpl_vars['campaignData']['_campaign_code']; ?>
" title="Mail">Mail</a></li>
			<li class="active"><a href="#" title="Details">Comms</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<h4>Mailer Results</h4><br />
	<form id="detailsForm" name="detailsForm" action="#" method="post">
		<table id="dataTable" border="0" cellspacing="0" cellpadding="5" width="100%">
			<thead>
			<tr>
			<th>Sent</th>
			<th>Name</th>
			<th>Email</th>
			<th>Cellphone</th>
			<th>Result</th>
			<th>Mailer</th>
			</tr>
		   </thead>
		   <tbody> 
		  <?php $_from = $this->_tpl_vars['commData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		  <tr class="<?php if ($this->_tpl_vars['item']['_comm_sent'] == '1'): ?>success<?php else: ?>error<?php endif; ?>">
			<td align="left"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['_comm_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participant_name']; ?>
 <?php echo $this->_tpl_vars['item']['participant_surname']; ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participant_email']; ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participant_cellphone']; ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['_comm_output']; ?>
</td>
			<td align="left"><a href="/mailers/view/<?php echo $this->_tpl_vars['item']['_comm_code']; ?>
" target="_blank">View Mailer</a></td>
		  </tr>
		  <?php endforeach; endif; unset($_from); ?>     
		  </tbody>
		</table>
	</form>
	</div>
	<div class="clearer"><!-- --></div>	
    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
</body>
</html>