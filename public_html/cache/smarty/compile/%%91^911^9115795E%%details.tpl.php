<?php /* Smarty version 2.6.20, created on 2015-02-24 13:06:34
         compiled from participant/view/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/participant/" title="Participants">Participants</a></li>
			<li><a href="/participant/view/" title="View">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['participantData'] )): ?><?php echo $this->_tpl_vars['participantData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['participantData']['participant_surname']; ?>
<?php else: ?>Details<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['participantData'] )): ?>Edit Participant<?php else: ?>Add a Participant<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['participantData'] )): ?>/participant/view/login.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Login">Login</a></li>	
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/participant/view/details.php<?php if (isset ( $this->_tpl_vars['participantData'] )): ?>?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br /><input type="text" name="participant_name" id="participant_name" value="<?php echo $this->_tpl_vars['participantData']['participant_name']; ?>
" size="30" />
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['participant_name'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_name']; ?>
</span><?php else: ?><em>Participant name(s)</em><?php endif; ?>
			</td>	
			<td><h4 class="error">Surname:</h4><br />
				<input type="text" name="participant_surname" id="participant_surname" value="<?php echo $this->_tpl_vars['participantData']['participant_surname']; ?>
" size="30" />
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['participant_surname'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_surname']; ?>
</span><?php else: ?><em>Participant surname</em><?php endif; ?>
			</td>
				<td>
					<h4 class="error">Email:</h4><br />
					<input type="text" name="participant_email" id="participant_email" value="<?php echo $this->_tpl_vars['participantData']['participant_email']; ?>
" size="30" <?php if (isset ( $this->_tpl_vars['participantData']['participant_email'] )): ?>readonly<?php endif; ?> />
					<br /><?php if (isset ( $this->_tpl_vars['errorArray']['participant_email'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_email']; ?>
</span><?php else: ?><em>Participant email address</em><?php endif; ?>
				</td>				
          </tr>
			<tr>		
				<td>
					<h4 class="error">Cellphone:</h4><br />
					<input type="text" name="participant_cellphone" id="participant_cellphone" value="<?php echo $this->_tpl_vars['participantData']['participant_cellphone']; ?>
" size="30" />
					<br /><?php if (isset ( $this->_tpl_vars['errorArray']['participant_cellphone'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_cellphone']; ?>
</span><?php else: ?><em>Participant cellphone, e.g. 0735841258</em><?php endif; ?>
				</td>
				<td colspan="2">
					<h4 class="error">Area:</h4><br />
					<input type="text" name="areapost_name" id="areapost_name" value="<?php echo $this->_tpl_vars['participantData']['areapost_name']; ?>
" size="83" />
					<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['participantData']['areapost_code']; ?>
" />
					<br /><?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['areapost_code']; ?>
</span><?php else: ?><em>Select from drop down, participant's location</em><?php endif; ?>
				</td>			
			</tr>
			<tr>
				<td>
					<h4 class="error">ID number:</h4><br />
					<input type="text" name="participant_idnumber" id="participant_idnumber" value="<?php echo $this->_tpl_vars['participantData']['participant_idnumber']; ?>
" size="30" <?php if (isset ( $this->_tpl_vars['participantData']['participant_idnumber'] )): ?>readonly<?php endif; ?> />
					<br /><?php if (isset ( $this->_tpl_vars['errorArray']['participant_idnumber'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_idnumber']; ?>
</span><?php else: ?><em>Participant South African ID number - if South African</em><?php endif; ?>
				</td>			
				<td colspan="2">
					<h4>Passport:</h4><br />
					<input type="text" name="participant_passport" id="participant_cellphone" value="<?php echo $this->_tpl_vars['participantData']['participant_passport']; ?>
" size="30" />
					<br /><?php if (isset ( $this->_tpl_vars['errorArray']['participant_passport'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_passport']; ?>
</span><?php else: ?><em>Participant passport number of foreign</em><?php endif; ?>
				</td>			
			</tr>
          <tr>            
			<td>
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['profilelogo'] )): ?>class="error"<?php endif; ?>>Upload Image:</h4><br />
				<input type="file" id="profilelogo" name="profilelogo" />
			</td>
			<td colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['profilelogo'] )): ?>class="error"<?php endif; ?>>Upload Image:</h4><br />
					<br />
				<?php if ($this->_tpl_vars['participantData']['participant_image_path'] != ''): ?><img src="http://www.rentout.co.za<?php echo $this->_tpl_vars['participantData']['participant_image_path']; ?>
tny_<?php echo $this->_tpl_vars['participantData']['participant_image_name']; ?>
<?php echo $this->_tpl_vars['participantData']['participant_image_ext']; ?>
" /><?php else: ?><img src="http://www.rentout.co.za/images/no-image.jpg" /><?php endif; ?>
				<br /><br /><?php if (isset ( $this->_tpl_vars['errorArray']['profilelogo'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['profilelogo']; ?>
<span><?php else: ?><br /><em>jpg, jpeg, png images only</em><?php endif; ?>		
			</td>			
          </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/participant/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content -->
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

 </div><!-- End Content -->

</div>
<?php echo '
<script type="text/javascript" language="javascript">

function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$( "#areapost_name" ).autocomplete({
		source: "/feeds/area.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#areapost_name\').html(\'\');
				$(\'#areapost_code\').val(\'\');					
			} else {
				$(\'#areapost_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#areapost_code\').val(ui.item.id);	
			}
			$(\'#areapost_name\').val(\'\');										
		}
	});
	
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>