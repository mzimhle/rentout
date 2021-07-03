<?php /* Smarty version 2.6.20, created on 2014-09-21 19:11:41
         compiled from administration/participants/cv/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CV</title>
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
			<li><a href="/administration/participants/cv/" title="CV">CV</a></li>
			<li><?php if (isset ( $this->_tpl_vars['cvData'] )): ?>Edit CV<?php else: ?>Add a CV<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['cvData'] )): ?>Edit CV<?php else: ?>Add a CV<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['cvData'] )): ?>/administration/participants/cv/education.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Education">Education</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['cvData'] )): ?>/administration/participants/cv/skill.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Skills">Skills</a></li>	
			<li><a href="<?php if (isset ( $this->_tpl_vars['cvData'] )): ?>/administration/participants/cv/work.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Work">Work</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['cvData'] )): ?>/administration/participants/cv/reference.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Reference">Reference</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/participants/cv/details.php<?php if (isset ( $this->_tpl_vars['cvData'] )): ?>?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>	
			<td colspan="3">
				<h4 class="error">CV Name / Description:</h4><br />
				<input type="text" name="cv_cvname" id="cv_cvname" value="<?php echo $this->_tpl_vars['cvData']['cv_cvname']; ?>
" size="60" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
</span><?php endif; ?>
			</td>				
          </tr>			
          <tr>	
			<td colspan="3">
				<h4 class="error">Participant:</h4><br />
				<input type="text" name="participant_name" id="participant_name" value="<?php if ($this->_tpl_vars['cvData']['participant_code'] != ''): ?><?php echo $this->_tpl_vars['cvData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['cvData']['participant_surname']; ?>
<?php endif; ?>" size="60" <?php if (isset ( $this->_tpl_vars['cvData'] )): ?>readonly disabled<?php endif; ?> />
				<input type="hidden" name="participant_code" id="participant_code" value="<?php echo $this->_tpl_vars['cvData']['participant_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
</span><?php endif; ?>
			</td>				
          </tr>		
          <tr>
			<td>
				<h4 class="error">Name:</h4><br /><input type="text" name="cv_name" id="cv_name" value="<?php echo $this->_tpl_vars['cvData']['cv_name']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_name']; ?>
</span><?php endif; ?>
			</td>	
			<td><h4 class="error">Surname:</h4><br />
				<input type="text" name="cv_surname" id="cv_surname" value="<?php echo $this->_tpl_vars['cvData']['cv_surname']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_surname'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_surname']; ?>
</span><?php endif; ?>
			</td>	
			<td>
				<h4 class="error">Area:</h4>
				<input type="text" name="areapost_name" id="areapost_name" value="<?php echo $this->_tpl_vars['cvData']['areapost_name']; ?>
" size="30" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['cvData']['areapost_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['areapost_code']; ?>
</span><?php endif; ?>
			</td>				
          </tr>
          <tr>
			<td>
				<h4>Email:</h4><br />
				<input type="text" name="cv_email" id="cv_email" value="<?php echo $this->_tpl_vars['cvData']['cv_email']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_email'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_email']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<h4>Cellphone:</h4><br />
				<input type="text" name="cv_cellphone" id="cv_cellphone" value="<?php echo $this->_tpl_vars['cvData']['cv_cellphone']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_cellphone'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_cellphone']; ?>
</span><?php endif; ?>
			</td>			
			<td><h4>Gender:</h4><br />
				<select id="cv_gender" name="cv_gender">
					<option value=""> --- </option>
					<option <?php if ($this->_tpl_vars['cvData']['cv_gender'] == 'female'): ?>selected<?php endif; ?> value="female">Female</option>
					<option <?php if ($this->_tpl_vars['cvData']['cv_gender'] == 'male'): ?>selected<?php endif; ?> value="male">Male</option>
				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_gender'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_gender']; ?>
</span><?php endif; ?>
			</td>
			</tr>
          <tr>
			<td>
				<h4>Address:</h4><br />
				<input type="text" name="cv_address" id="cv_address" value="<?php echo $this->_tpl_vars['cvData']['cv_address']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_address'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_address']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<h4>Willing to relocate:</h4><br />
				<input type="checkbox" <?php if (isset ( $this->_tpl_vars['cvData']['cv_relocate'] ) && $this->_tpl_vars['cvData']['cv_relocate'] == '1'): ?>checked<?php endif; ?> value="1" id="cv_relocate" name="cv_relocate" />
			</td>			
			<td><h4 class="error">Available:</h4><br />
				<select id="cv_available" name="cv_available">
					<option value=""> --- </option>
					<option <?php if ($this->_tpl_vars['cvData']['cv_available'] == 'immediately'): ?>selected<?php endif; ?> value="immediately">Immediately</option>
					<option <?php if ($this->_tpl_vars['cvData']['cv_available'] == '1week'): ?>selected<?php endif; ?> value="1week">1 Week</option>
					<option <?php if ($this->_tpl_vars['cvData']['cv_available'] == '1month'): ?>selected<?php endif; ?> value="1month">1 Month</option>
				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_available'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_available']; ?>
</span><?php endif; ?>
			</td>
			</tr>
			<tr>
				<td colspan="3">
					<h4 class="error">Objectives:</h4><br />
					<textarea name="cv_objective" id="cv_objective" rows="2" cols="60"><?php echo $this->_tpl_vars['cvData']['cv_objective']; ?>
</textarea>
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_objective'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_objective']; ?>
</span><?php endif; ?>
				</td>			
			</tr>
			<tr>
				<td>
					<h4>Transport Licence:</h4><br />
					<select id="cv_drivers" name="cv_drivers">
						<option value=""> Public Transport </option>
						<option <?php if ($this->_tpl_vars['cvData']['cv_drivers'] == '1'): ?>selected<?php endif; ?> value="1">Code 1 : Motocycles</option>
						<option <?php if ($this->_tpl_vars['cvData']['cv_drivers'] == '2'): ?>selected<?php endif; ?> value="2">Code 2 : Vehicles / cars</option>
						<option <?php if ($this->_tpl_vars['cvData']['cv_drivers'] == '3'): ?>selected<?php endif; ?> value="3">Code 3 : All Vehicles including trucks</option>
					</select>
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_drivers'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_drivers']; ?>
</span><?php endif; ?>
				</td>		
				<td><h4>Do you have transport:</h4><br />
					<select id="cv_transport" name="cv_transport">
						<option <?php if ($this->_tpl_vars['cvData']['cv_transport'] == '0'): ?>selected<?php endif; ?> value="0">No</option>
						<option <?php if ($this->_tpl_vars['cvData']['cv_transport'] == '1'): ?>selected<?php endif; ?> value="1">Yes</option>
					</select>
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_transport'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_transport']; ?>
</span><?php endif; ?>
				</td>
			<td>
				<h4>Health:</h4><br />
				<input type="text" name="cv_health" id="cv_health" value="<?php echo $this->_tpl_vars['cvData']['cv_health']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cv_health'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_health']; ?>
</span><?php endif; ?>
			</td>				
			</tr>	
			<tr>
				<td>
					<h4>Languages:</h4><br />
					<input type="text" name="cv_language" id="cv_language" value="<?php echo $this->_tpl_vars['cvData']['cv_language']; ?>
" size="30" />
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_language'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_language']; ?>
</span><?php endif; ?>
				</td>
				<td>
					<h4>Interests:</h4><br />
					<input type="text" name="cv_interests" id="cv_interests" value="<?php echo $this->_tpl_vars['cvData']['cv_interests']; ?>
" size="30" />
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_interests'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_interests']; ?>
</span><?php endif; ?>
				</td>		
				<td><h4>Have passport:</h4><br />
					<select id="cv_havepassport" name="cv_havepassport">
						<option <?php if ($this->_tpl_vars['cvData']['cv_havepassport'] == '0'): ?>selected<?php endif; ?> value="0">No</option>
						<option <?php if ($this->_tpl_vars['cvData']['cv_havepassport'] == '1'): ?>selected<?php endif; ?> value="1">Yes</option>
					</select>
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_havepassport'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_havepassport']; ?>
</span><?php endif; ?>
				</td>				
			</tr>
			<tr>
				<td>
					<h4>Date of Birth:</h4><br />
					<input type="text" name="cv_dateofbirth" id="cv_dateofbirth" value="<?php echo $this->_tpl_vars['cvData']['cv_dateofbirth']; ?>
" size="30" />
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_dateofbirth'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_dateofbirth']; ?>
</span><?php endif; ?>
				</td>
				<td>
					<h4>ID Number:</h4><br />
					<input type="text" name="cv_idnumber" id="cv_idnumber" value="<?php echo $this->_tpl_vars['cvData']['cv_idnumber']; ?>
" size="30" />
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_idnumber'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_idnumber']; ?>
</span><?php endif; ?>
				</td>	
				<td>
					<h4>Passport:</h4><br />
					<input type="text" name="cv_passport" id="cv_passport" value="<?php echo $this->_tpl_vars['cvData']['cv_passport']; ?>
" size="30" />
					<?php if (isset ( $this->_tpl_vars['errorArray']['cv_passport'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cv_passport']; ?>
</span><?php endif; ?>
				</td>				
			</tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/participants/cv/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
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

function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$( "#cv_dateofbirth" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true, changeMonth: true});
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php?more=1",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#participant_name\').html(\'\');
				$(\'#participant_code\').val(\'\');					
			} else {
				$(\'#participant_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#participant_code\').val(ui.item.id);	
				$(\'#cv_name\').val(ui.item.name);	
				$(\'#cv_surname\').val(ui.item.surname);	
				$(\'#areapost_name\').val(ui.item.areapost_name);	
				$(\'#areapost_code\').val(ui.item.areapost_code);			
				$(\'#cv_gender\').val(ui.item.gender);		
				$(\'#cv_email\').val(ui.item.email);	
			}
			$(\'#participant_name\').val(\'\');										
		}
	});
	
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