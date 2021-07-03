<?php /* Smarty version 2.6.20, created on 2014-09-21 15:42:59
         compiled from administration/participants/cv/education.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bizlounge | CV</title>
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
	<div class="inner"> 
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/administration/" title="Home">Home</a></li>
			<li><a href="/administration/participants/" title="Participants">Participants</a></li>
			<li><a href="/administration/participants/cv/" title="CV">CV</a></li>
			<li><?php echo $this->_tpl_vars['cvData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['cvData']['participant_surname']; ?>
</li>
			<li><?php echo $this->_tpl_vars['cvData']['cv_cvname']; ?>
</li>
        </ul>
	</div><!--breadcrumb--> 
	<br />
      <h2><?php echo $this->_tpl_vars['cvData']['cv_cvname']; ?>
</h2>
	<br />
    <div id="sidetabs">
        <ul>             
            <li><a href="/administration/participants/cv/details.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Education">Education</a></li>
			<li><a href="/administration/participants/cv/skill.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
" title="Skills">Skills</a></li>	
			<li><a href="/administration/participants/cv/qualification.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
" title="Qualification">Qualification</a></li>
			<li><a href="/administration/participants/cv/reference.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
" title="Reference">Reference</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<h4>Education Details</h4><br />
	<form id="submitForm" name="submitForm" action="/administration/participants/cv/education.php?code=<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
" method="post" enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<thead>
		<tr>		
			<th></th>
			<th>Institution</th>
			<th>Qualification</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Description</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php $_from = $this->_tpl_vars['cvsectionData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['food'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['food']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['food']['iteration']++;
?>
		<tr>	
			<td><?php echo $this->_foreach['food']['iteration']; ?>
.</td>
			<td><?php echo $this->_tpl_vars['item']['cvsection_type']; ?>
</td>
			<td><?php echo $this->_tpl_vars['item']['cvsection_name']; ?>
</td>
			<td><?php echo $this->_tpl_vars['item']['cvsection_startdate']; ?>
</td>
			<td><?php echo $this->_tpl_vars['item']['cvsection_enddate']; ?>
</td>
			<td><?php echo $this->_tpl_vars['item']['cvsection_description']; ?>
</td>
			<td><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['cvsection_code']; ?>
'); return false;">Delete</button></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>		
		<tr>
			<td></td>
			<td>
				<input type="text" id="cvsection_type" name="cvsection_type" value="" size="15" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cvsection_type'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cvsection_type']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<input type="text" id="cvsection_name" name="cvsection_name" value="" size="15" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cvsection_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cvsection_name']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<input type="text" id="cvsection_startdate" name="cvsection_startdate" value="" size="10" readonly />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cvsection_startdate'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cvsection_startdate']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<input type="text" id="cvsection_enddate" name="cvsection_enddate" value="" size="10" readonly />
				<?php if (isset ( $this->_tpl_vars['errorArray']['cvsection_enddate'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cvsection_enddate']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<textarea id="cvsection_description" name="cvsection_description" cols="20" rows="2"></textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['cvsection_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['cvsection_description']; ?>
</span><?php endif; ?>
			</td>
			<td colspan="2"><button onclick="additem();">Add Item</button></td>
		</tr>								
		</tbody>						
	</table>
	<input type="hidden" name="cvsection_code_selected" id="cvsection_code_selected" value="" />
	</form>
	</div>
	<div class="clearer"><!-- --></div>	
    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript">
$( document ).ready(function() {

	$( "#cvsection_startdate" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#cvsection_enddate" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#cvsection_enddate" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#cvsection_startdate" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
});

function additem() {
	document.forms.submitForm.submit();					 
}

function deleteitem(code) {
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({
			type: "GET",
			url: "education.php?code='; ?>
<?php echo $this->_tpl_vars['cvData']['cv_code']; ?>
<?php echo '",
			data: "deletecode="+code,
			dataType: "json",
			success: function(data){
				if(data.result == 1) {
					alert(\'Deleted\');
					window.location.href = window.location.href;
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