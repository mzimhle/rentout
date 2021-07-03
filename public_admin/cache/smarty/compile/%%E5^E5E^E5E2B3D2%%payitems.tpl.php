<?php /* Smarty version 2.6.20, created on 2014-09-07 08:26:34
         compiled from administration/participants/view/payitems.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'administration/participants/view/payitems.tpl', 54, false),array('function', 'html_options', 'administration/participants/view/payitems.tpl', 73, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['participantData'] )): ?>Edit Participant<?php else: ?>Add a Participant<?php endif; ?></title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

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
			<li><a href="/administration/participants/" title="Participants">Participants</a></li>
			<li><a href="/administration/participants/view/" title="Profiles">View</a></li>
			<li><a href="/administration/participants/view/details.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
"><?php echo $this->_tpl_vars['participantData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['participantData']['participant_surname']; ?>
</a></li>
			<li><a href="#" title="Pay Items">Pay Items</a></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2>Manage Pay Items</h2>
    <div id="sidetabs">
        <ul > 
            <li><a href="/administration/participants/view/notify.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Details">Details</a></li>
			<li><a href="/administration/participants/view/payitems.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Notifications">Notifications</a></li>
			<li><a href="/administration/participants/view/login.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Login">Login</a></li>
			<li class="active"><a href="#" title="Notifications">Pay Items</a></li>
        </ul>
    </div><!--tabs-->
<div class="detail_box">
	<h4>Payment Items:</h4><br>
	<form method="post" action="/administration/participants/view/payments.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" name="itemaddForm" id="itemaddForm">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="innertable">
		<thead>
		<tr>
			<th>Added</th>
			<th>Name</th>
			<th>Amount</th>
			<th>Type</th>
			<th>From</th>
			<th>To</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
			  <?php $_from = $this->_tpl_vars['participantPayData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				  <tr>
					<td align="left"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['participantpayitem_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
					<td align="left"><?php echo $this->_tpl_vars['item']['participantpayitem_name']; ?>
</td>
					<td align="left">R <?php echo $this->_tpl_vars['item']['participantpayitem_amount']; ?>
</td>
					<td align="left"><?php echo $this->_tpl_vars['item']['participantpayitem_type']; ?>
</td>
					<td align="left"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['participantpay_startdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
					<td align="left"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['participantpay_enddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
					<td align="left"><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['participantpay_code']; ?>
'); return false;">Delete</button></td>
				  </tr>
			  <?php endforeach; endif; unset($_from); ?>
		<tr>
			<th colspan="6">Item</th>
			<th></th>
		</tr>
		</form>
		<form method="post" action="/administration/participants/view/payitems.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" name="itemaddForm" id="itemaddForm">		
		<tr>
			<td>
				<select id="participantpayitem_code" name="participantpayitem_code">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['partifcipantpayitemPairs']), $this);?>

				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['participantpayitem_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participantpayitem_code']; ?>
</span><?php endif; ?>
			</td>							
			<td><button onclick="additem();">Add Item</button></td>
			<td colspan="5"></td>
		</tr>	
		<input type="hidden" name="additem" id="additem" value="1" />
		</form>		
		</tbody>						
	</table>
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript" language="javascript">

function deleteitem(code) {
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({
			type: "GET",
			url: "payments.php?code='; ?>
<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php echo '",
			data: "deleteitem="+code,
			dataType: "json",
			success: function(data){
				if(data.result == 1) {
					alert(\'Deleted\');
					window.location.href = \'/administration/internal/audits/details.php?code='; ?>
<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php echo '\';
				} else {
					alert(data.message);
				}
			}
		});		
	}
	return false;			
}

function paiditem(code) {
	if(confirm(\'Are you sure you want to pay this item?\')) {
		$.ajax({
			type: "GET",
			url: "payments.php?code='; ?>
<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php echo '",
			data: "paiditem="+code,
			dataType: "json",
			success: function(data){
				if(data.result == 1) {
					alert(\'Paid\');
					window.location.href = \'/administration/internal/audits/details.php?code='; ?>
<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php echo '\';
				} else {
					alert(data.message);
				}
			}
		});		
	}
	return false;			
}

function additem() {
	document.forms.itemaddForm.submit();					 
}

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>
