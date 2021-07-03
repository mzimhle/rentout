<?php /* Smarty version 2.6.20, created on 2014-09-21 11:23:21
         compiled from administration/jobs/view/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'administration/jobs/view/details.tpl', 14, false),array('function', 'html_options', 'administration/jobs/view/details.tpl', 124, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Business Lounge</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php echo '
<script type="text/javascript">
var map;
function mapa()
{
	var opts = {\'center\': new google.maps.LatLng('; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['jobData']['job_latitude'])) ? $this->_run_mod_handler('default', true, $_tmp, "-33.9285481685662") : smarty_modifier_default($_tmp, "-33.9285481685662")); ?>
, <?php echo ((is_array($_tmp=@$this->_tpl_vars['jobData']['job_longitude'])) ? $this->_run_mod_handler('default', true, $_tmp, "18.42681884765625") : smarty_modifier_default($_tmp, "18.42681884765625")); ?>
<?php echo '), \'zoom\':13, \'mapTypeId\': google.maps.MapTypeId.ROADMAP }
	map = new google.maps.Map(document.getElementById(\'mapdiv\'),opts);
	
	google.maps.event.addListener(map,\'click\',function(event) {
		document.getElementById(\'job_latitude\').value = event.latLng.lat()
		document.getElementById(\'job_longitude\').value = event.latLng.lng()	
	})
	/*
	google.maps.event.addListener(map,\'mousemove\',function(event) {
		document.getElementById(\'latspan\').innerHTML = event.latLng.lat()
		document.getElementById(\'lngspan\').innerHTML = event.latLng.lng()
	});
	*/
}
'; ?>

</script>
</head>
<body onload="mapa()">
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
			<li><a href="/administration/jobs/" title="Jobs">Jobs</a></li>
			<li><a href="/administration/jobs/view/" title="Jobs">View Jobs</a></li>
			<li><?php if (isset ( $this->_tpl_vars['jobData'] )): ?>Edit Job<?php else: ?>Add a Job<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['jobData'] )): ?>Edit Job<?php else: ?>Add a Job<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/jobs/view/details.php<?php if (isset ( $this->_tpl_vars['jobData'] )): ?>?code=<?php echo $this->_tpl_vars['jobData']['job_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">		  
		  <tr>
			<td>
				<h4 class="error">Title:</h4><br />
				<input type="text" name="job_title" id="job_title" value="<?php echo $this->_tpl_vars['jobData']['job_title']; ?>
" size="50"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['job_title'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['job_title']; ?>
</span><?php endif; ?>
			</td>	
            <td>
				<h4 class="error">Expiry Date:</h4><br />
				<input type="text" name="job_expiry" id="job_expiry" value="<?php echo $this->_tpl_vars['jobData']['job_expiry']; ?>
" size="10"/>
				<?php if (isset ( $this->_tpl_vars['errorArray']['job_expiry'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['job_expiry']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<h4>Reference:</h4><br />
				<input type="text" name="job_reference" id="job_reference" value="<?php echo $this->_tpl_vars['jobData']['job_reference']; ?>
" size="30"/>
			</td>				
          </tr>			  
          <tr>
            <td>
				<h4 class="error">Contact Name:</h4><br />
				<input type="text" name="job_contact_name" id="job_contact_name" value="<?php echo $this->_tpl_vars['jobData']['job_contact_name']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['job_contact_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['job_contact_name']; ?>
</span><?php endif; ?>
			</td>	
            <td>
				<h4 class="error">Contact Email:</h4><br />
				<input type="text" name="job_contact_email" id="job_contact_email" value="<?php echo $this->_tpl_vars['jobData']['job_contact_email']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['job_contact_email'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['job_contact_email']; ?>
</span><?php endif; ?>
			</td>	
            <td>
				<h4>Contact Number:</h4><br />
				<input type="text" name="job_contact_number" id="job_contact_number" value="<?php echo $this->_tpl_vars['jobData']['job_contact_number']; ?>
" size="30" />
			</td>	
          </tr>		  
          <tr>
            <td>
				<h4>Participant:</h4><br />
				<input type="text" name="participant_name" id="participant_name" value="<?php echo $this->_tpl_vars['jobData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['jobData']['participant_surname']; ?>
" size="30" />
				<input type="hidden" name="participant_code" id="participant_code" value="<?php echo $this->_tpl_vars['jobData']['participant_code']; ?>
" />
			</td>	
            <td>
				<h4>Company:</h4><br />
				<input type="text" name="company_name" id="company_name" value="<?php echo $this->_tpl_vars['jobData']['company_name']; ?>
" size="30" />
				<input type="hidden" name="company_code" id="company_code" value="<?php echo $this->_tpl_vars['jobData']['company_code']; ?>
" />
			</td>	
            <td>
				<h4 class="error">Area:</h4><br />
				<input type="text" name="areapost_name" id="areapost_name" value="<?php echo $this->_tpl_vars['jobData']['areapost_city']; ?>
" size="30" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['jobData']['areapost_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['areapost_code']; ?>
</span><?php endif; ?>
			</td>	
          </tr>	
          <tr>            
			<td colspan="2">
				<h4>Map:</h4><br />
				<div id="mapdiv" style="width: 646px; height:400px;"></div>	
			</td>	
            <td valign="top">
				<h4>Longitude:</h4><br />
				<input type="text" name="job_longitude" id="job_longitude" value="<?php echo $this->_tpl_vars['jobData']['job_longitude']; ?>
" size="30" /><br /><br />
				<h4>Latitude:</h4><br />
				<input type="text" name="job_latitude" id="job_latitude" value="<?php echo $this->_tpl_vars['jobData']['job_latitude']; ?>
" size="30" />
			</td>	
          </tr>		  
          <tr>
            <td>
				<h4 class="error">Category:</h4><br />
				<select id="category_code" name="category_code">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categorypairs'],'selected' => $this->_tpl_vars['jobData']['category_code']), $this);?>

				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['category_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['category_code']; ?>
</span><?php endif; ?>
			</td>	
            <td>
				<h4 class="error">Type:</h4><br />
				<select id="job_type" name="job_type">
					<option value=""> --- </option>
					<option value="permanent" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'permanent'): ?>selected<?php endif; ?>> Permanent </option>
					<option value="contract" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'contract'): ?>selected<?php endif; ?>> Contract </option>
					<option value="temporary" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'temporary'): ?>selected<?php endif; ?>> Temporary </option>
					<option value="graduate" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'graduate'): ?>selected<?php endif; ?>> Graduate </option>
					<option value="casual" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'casual'): ?>selected<?php endif; ?>>Casual</option>
					<option value="parttime" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'parttime'): ?>selected<?php endif; ?>>Part-Time</option>
					<option value="internship" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'internship'): ?>selected<?php endif; ?>>Internship</option>
					<option value="volunteer" <?php if ($this->_tpl_vars['jobData']['job_type'] == 'volunteer'): ?>selected<?php endif; ?>>Volunteer</option>
				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['job_type'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['job_type']; ?>
</span><?php endif; ?>
			</td>	
            <td>
				<h4>Level:</h4><br />
				<select id="job_level" name="job_level">
					<option value=""> --- </option>
					<option value="unskilled" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'unskilled'): ?>selected<?php endif; ?>> Unskilled </option>
					<option value="skilled" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'skilled'): ?>selected<?php endif; ?>> Skilled </option>
					<option value="qualified" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'qualified'): ?>selected<?php endif; ?>> Qualified </option>
					<option value="junior" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'junior'): ?>selected<?php endif; ?>> Junior </option>
					<option value="junior-medium" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'junior-medium'): ?>selected<?php endif; ?>> Junior to Medium </option>
					<option value="medium" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'medium'): ?>selected<?php endif; ?>> Medium </option>
					<option value="medium-senior" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'medium-senior'): ?>selected<?php endif; ?>> Medium to Senior </option>
					<option value="senior" <?php if ($this->_tpl_vars['jobData']['job_level'] == 'senior'): ?>selected<?php endif; ?>> Senior </option>
				</select>
			</td>	
          </tr>			  	
          <tr>            
			<td colspan="3">
				<h4 class="error">Page:</h4><br />
				<textarea name="job_page" id="job_page" rows="20" cols="130" ><?php echo $this->_tpl_vars['jobData']['job_page']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['job_page'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['job_page']; ?>
</span><?php endif; ?>
			</td>	
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
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
	nicEditors.findEditor(\'job_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$( "#job_expiry" ).datepicker({ dateFormat: \'yy-mm-dd\', changeYear: true});
	
	$(document).ready(function() {
		new nicEditor({
			iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
			buttonList 	: [\'bold\',\'italic\',\'underline\',\'left\',\'center\', \'ol\', \'ul\', \'xhtml\', \'fontFormat\', \'fontFamily\', \'fontSize\', \'unlink\', \'link\', \'strikethrough\', \'superscript\', \'subscript\', \'upload\'],
			maxHeight 	: \'1000\',
			uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
		}).panelInstance(\'job_page\');				
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
			
			$(\'#area_name\').val(\'\');										
		}
	});
	
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#participant_name\').html(\'\');
				$(\'#participant_code\').val(\'\');					
			} else {
				$(\'#participant_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#participant_code\').val(ui.item.id);									
			}
			
			$(\'#participant_name\').val(\'\');										
		}
	});
	
	$( "#company_name" ).autocomplete({
		source: "/feeds/company.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#company_name\').html(\'\');
				$(\'#company_code\').val(\'\');					
			} else {
				$(\'#company_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#company_code\').val(ui.item.id);									
			}
			
			$(\'#company_name\').val(\'\');										
		}
	});
	
			
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>