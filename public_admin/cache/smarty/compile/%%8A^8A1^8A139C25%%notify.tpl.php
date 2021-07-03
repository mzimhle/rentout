<?php /* Smarty version 2.6.20, created on 2014-09-21 11:29:53
         compiled from administration/participants/view/notify.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | Edit Participant</title>
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
			<li><a href="/administration/participants/" title="Jobs">Participants</a></li>
			<li><a href="/administration/participants/view/" title="Jobs">View</a></li>
			<li><a href="/administration/participants/view/details.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Jobs"><?php echo $this->_tpl_vars['participantData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['participantData']['participant_surname']; ?>
</a></li>
			<li>Notifications</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner">
		  <div class="clearer"><!-- --></div>
		  <br /><h2>Manage Notifications</h2><br />
    <div id="sidetabs">
        <ul > 
            <li><a href="/administration/participants/view/details.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Notifications">Notifications</a></li>
			<li><a href="/administration/participants/view/login.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Login">Login</a></li>
			<li><a href="/administration/participants/view/payitems.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Pay Items">Pay Items</a></li>
        </ul>
    </div><!--tabs-->		  
		  <div class="detail_box">  
		  <form name="notifyForm" id="notifyForm" action="/administration/participants/view/notify.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" method="post">
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="innertable"> 				  
			  <thead>
			  <tr>				
				<th valign="top" <?php if (isset ( $this->_tpl_vars['errorArray']['participantnotify_type'] )): ?>style="color: red; font-weight: bold;"<?php endif; ?>>Type</th>
				<th valign="top" <?php if (isset ( $this->_tpl_vars['errorArray']['category_code'] )): ?>style="color: red; font-weight: bold;"<?php endif; ?>>Category</th>
				<th valign="top" <?php if (isset ( $this->_tpl_vars['errorArray']['participantnotify_schedule'] )): ?>style="color: red; font-weight: bold;"<?php endif; ?>>Schedule</th>
				<th valign="top"></th>				
			  </tr>
			  </thead>
			  <?php $_from = $this->_tpl_vars['participantnotifyData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['notifyitem']):
?>
			  <tr>
				<td valign="top"><?php echo $this->_tpl_vars['notifyitem']['participantnotify_type']; ?>
</td>		
				<td valign="top"><?php echo $this->_tpl_vars['notifyitem']['category_name']; ?>
</td>	
				<td valign="top"><?php echo $this->_tpl_vars['notifyitem']['participantnotify_schedule']; ?>
</td>			
				<td valign="top"><button type="button" onclick="deleteitem('<?php echo $this->_tpl_vars['notifyitem']['participantnotify_code']; ?>
'); return false;">Delete</button></td>	
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>			
			  <tr>
				<td valign="top">
					<select id="participantnotify_type" name="participantnotify_type">
						<option value="JOB"> Jobs </option>
						<option value="TENDER"> Tenders </option>
						<option value="ARTICLE"> Articles </option>
						<option value="TRADE-LEAD"> Trade Leads </option>
					</select>
				</td>	
				<td valign="top" id="tdcategory"></td>
				<td valign="top">
					<select id="participantnotify_schedule" name="participantnotify_schedule">						
						<option value="MONTHLY"> Monthly </option>
						<option value="WEEKLY"> Weekly </option>
					</select>
				</td>			
				<td valign="top">
					<button type="submit" onclick="submitForm();">Add Item</button>	
				</td>			
			  </tr>
			</table>
			<input type="hidden" value="" id="category_name" name="category_name" />
			<?php if (isset ( $this->_tpl_vars['errorArray']['error'] )): ?><span style="color: red; font-weight: bold;"><?php echo $this->_tpl_vars['errorArray']['error']; ?>
</span><?php endif; ?>
			</form>
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
<script type="text/javascript">
		
$( document ).ready(function() {
	changeitem();
	$( "#participantnotify_type" ).change(function() {
		changeitem();
	});
	

});	

function submitForm() {
	document.forms.notifyForm.submit();					 
}

function changecategory() {
	$(\'#category_name\').val($(\'#category_code :selected\').text());
}

function changeitem() {
	
	var notifytype = $(\'#participantnotify_type :selected\').val();
	
	$.ajax({
			type: "GET",
			url: "notify.php?code='; ?>
<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php echo '",
			data: "notifytype="+notifytype,
			dataType: "html",
			success: function(data){
				$(\'#tdcategory\').html(data);
			}
	});	
}

function deleteitem(code) {
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({
				type: "GET",
				url: "notify.php?code='; ?>
<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php echo '",
				data: "deletecode="+code,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Deleted\');
							window.location.href = \'/administration/participants/view/notify.php?code='; ?>
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
				
</script>
'; ?>
	
<!-- End Main Container -->
</body>
</html>