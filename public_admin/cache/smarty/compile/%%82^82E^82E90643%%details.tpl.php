<?php /* Smarty version 2.6.20, created on 2014-09-24 09:26:55
         compiled from administration/company/view/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'administration/company/view/details.tpl', 16, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maverick</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlSIShjTgWG1oLSbRv3XIN-E5Zlkr1iQo"></script>
<?php echo '
<script type="text/javascript">
var map;
var marker;

function mapa()
{
	var opts = {\'center\': new google.maps.LatLng('; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['companyData']['company_latitude'])) ? $this->_run_mod_handler('default', true, $_tmp, "-33.9285481685662") : smarty_modifier_default($_tmp, "-33.9285481685662")); ?>
, <?php echo ((is_array($_tmp=@$this->_tpl_vars['companyData']['company_longitude'])) ? $this->_run_mod_handler('default', true, $_tmp, "18.42681884765625") : smarty_modifier_default($_tmp, "18.42681884765625")); ?>
<?php echo '), \'zoom\':14, \'mapTypeId\': google.maps.MapTypeId.SATELLITE }
	map = new google.maps.Map(document.getElementById(\'mapdiv\'),opts);
	
	'; ?>
<?php if ($this->_tpl_vars['companyData']['company_latitude'] != '' && $this->_tpl_vars['companyData']['company_longitude'] != ''): ?><?php echo '
	marker = new google.maps.Marker({
		position: new google.maps.LatLng('; ?>
<?php echo $this->_tpl_vars['companyData']['company_latitude']; ?>
, <?php echo $this->_tpl_vars['companyData']['company_longitude']; ?>
<?php echo '),
		map: map
	});
	'; ?>
<?php endif; ?><?php echo '
	google.maps.event.addListener(map,\'click\',function(event) {
		
		//call function to create marker
		if (marker) {
			marker.setMap(null);
			marker = null;
		}
		
		document.getElementById(\'company_latitude\').value = event.latLng.lat();
		document.getElementById(\'company_longitude\').value = event.latLng.lng();
		marker = new google.maps.Marker({
			position: event.latLng,
			map: map
		});
	})
}
</script>
'; ?>

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
			<li><a href="/administration/company/" title="Company">Company</a></li>
			<li><a href="/administration/company/view/" title="View">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['companyData'] )): ?>Edit Company<?php else: ?>Add a Company<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
      <h2>Details</h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['companyData'] )): ?>/administration/company/view/category.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Category">Category</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['companyData'] )): ?>/administration/company/view/service.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Services">Services</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/company/view/details.php<?php if (isset ( $this->_tpl_vars['companyData'] )): ?>?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php endif; ?>" method="post"   enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">		
			<tr>
			<td colspan="3">
				<h4 class="error">Name:</h4>
				<br /><input type="text" name="company_name" id="company_name" value="<?php echo $this->_tpl_vars['companyData']['company_name']; ?>
" size="80" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_name'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_name']; ?>
<em><?php else: ?><br /><em>Registered company name</em><?php endif; ?>
			</td>			
			</tr>
           <tr>
			<td>
				<h4 class="error">Participant:</h4><br />
				<input type="text" name="participant_name" id="participant_name" value="" size="35" />
				<input type="hidden" name="participant_code" id="participant_code" value="<?php echo $this->_tpl_vars['companyData']['participant_code']; ?>
" /><br />
				<em class="success" id="selectedparticipant"><?php echo $this->_tpl_vars['companyData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['companyData']['participant_surname']; ?>
</em>
				<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
<em><?php else: ?><br /><em>Who this company belongs to</em><?php endif; ?>
			</td>
			<td colspan="2">
				<h4 class="error">Area:</h4><br />
				<input type="text" name="areapost_name" id="areapost_name" value="" size="35" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['companyData']['areapost_code']; ?>
" /><br />
				<em class="success" id="selectedarea"><?php echo $this->_tpl_vars['companyData']['areapost_name']; ?>
</em>
				<?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['areapost_code']; ?>
<em><?php else: ?><br /><em>Where is the business located</em><?php endif; ?>
			</td>			
          </tr>	
          <tr>
			<td>
				<h4 class="error">Email:</h4><br />
				<input type="text" name="company_email" id="company_email" value="<?php echo $this->_tpl_vars['companyData']['company_email']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_email'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_email']; ?>
<em><?php else: ?><br /><em>e.g. name.surname@domain.com</em><?php endif; ?>
			</td>		  
			<td>
				<h4>Telephone:</h4><br />
				<input type="text" name="company_telephone" id="company_telephone" value="<?php echo $this->_tpl_vars['companyData']['company_telephone']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_telephone'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_telephone']; ?>
<em><?php else: ?><br /><em>e.g. 0215874569</em><?php endif; ?>
			</td>	
			<td>
				<h4>Cellphone:</h4><br />
				<input type="text" name="company_cellphone" id="company_cellphone" value="<?php echo $this->_tpl_vars['companyData']['company_cellphone']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_cellphone'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_cellphone']; ?>
<em><?php else: ?><br /><em>e.g. 0735698741</em><?php endif; ?>
			</td>				
          </tr>	
          <tr>
			<td>
				<h4>Fax:</h4><br />
				<input type="text" name="company_fax" id="company_fax" value="<?php echo $this->_tpl_vars['companyData']['company_fax']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_fax'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_fax']; ?>
<em><?php else: ?><br /><em>e.g. 0215698745</em><?php endif; ?>
			</td>		  
			<td>
				<h4>Registration Number:</h4><br />
				<input type="text" name="company_registration" id="company_registration" value="<?php echo $this->_tpl_vars['companyData']['company_registration']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_registration'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_registration']; ?>
<em><?php else: ?><br /><em>e.g. 07 / 256589 / 20</em><?php endif; ?>
			</td>	
			<td>
				<h4>Tax Number:</h4><br />
				<input type="text" name="company_tax" id="company_tax" value="<?php echo $this->_tpl_vars['companyData']['company_tax']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_tax'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_tax']; ?>
<em><?php else: ?><br /><em>e.g. 56987412231</em><?php endif; ?>
			</td>				
          </tr>			  
          <tr>            
			<td>
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['imagelogo'] )): ?>class="error"<?php endif; ?>>Upload Logo:</h4><br />
				<input type="file" id="imagelogo" name="imagelogo" /><br />
				<?php if (isset ( $this->_tpl_vars['companyData']['company_logo_name'] ) && trim ( $this->_tpl_vars['companyData']['company_logo_name'] ) != ''): ?>
					<br /><img src="<?php echo $this->_tpl_vars['companyData']['company_logo_path']; ?>
tny_<?php echo $this->_tpl_vars['companyData']['company_logo_name']; ?>
<?php echo $this->_tpl_vars['companyData']['company_logo_ext']; ?>
" />
				<?php else: ?>
					<img src="/images/no-logo.jpg" />
				<?php endif; ?>				
				<br /><br /><?php if (isset ( $this->_tpl_vars['errorArray']['imagelogo'] )): ?><em class="error"><?php echo $this->_tpl_vars['errorArray']['imagelogo']; ?>
<em><?php else: ?><br /><em>jpg, jpeg, png images only</em><?php endif; ?>		
			</td>
			<td valign="top" colspan="2">
				<h4 class="error">Description (200 charachters):</h4><br />
				<textarea name="company_description" id="company_description" rows="6" cols="90" maxlength="500"><?php echo $this->_tpl_vars['companyData']['company_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_description'] )): ?><br /><em id="charcount" class="error"><?php echo $this->_tpl_vars['errorArray']['company_description']; ?>
<em><?php else: ?><br /><em id="charcount" class="error">0 characters entered.</em><?php endif; ?>
			</td>			
          </tr>
          <tr>
			<td colspan="3">
				<h4 class="error">Physical Address:</h4><br />
				<input type="text" name="company_address" id="company_address" value="<?php echo $this->_tpl_vars['companyData']['company_address']; ?>
" size="120" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_address'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_address']; ?>
<em><?php else: ?><br /><em>Physical address of company</em><?php endif; ?>
			</td>		
          </tr>
          <tr>
			<td colspan="3">
				<h4>Postal Address:</h4><br />
				<input type="text" name="company_postal" id="company_postal" value="<?php echo $this->_tpl_vars['companyData']['company_postal']; ?>
" size="120" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_postal'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_postal']; ?>
<em><?php else: ?><br /><em>Postal address of company</em><?php endif; ?>
			</td>		
          </tr>	  
			<tr>
			<td valign="top">
				<h4>Website:</h4><br />
				<input type="text" name="company_website" id="company_website" value="<?php echo $this->_tpl_vars['companyData']['company_website']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_website'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_website']; ?>
<em><?php else: ?><br /><em>e.g. www.mywebsite.co.za</em><?php endif; ?><br /><br /><br />
				<h4 class="error">Longitude:</h4><br />
				<input type="text" name="company_longitude" id="company_longitude" value="<?php echo $this->_tpl_vars['companyData']['company_longitude']; ?>
" size="30" readonly /><br />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_longitude'] )): ?><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_longitude']; ?>
<em><br /><?php else: ?><em>Select company location from map</em><br /><?php endif; ?><br />
				<h4 class="error">Latitude:</h4><br />
				<input type="text" name="company_latitude" id="company_latitude" value="<?php echo $this->_tpl_vars['companyData']['company_latitude']; ?>
" size="30" readonly />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_latitude'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['company_latitude']; ?>
<em><?php else: ?><br /><em>Select company location from map</em><?php endif; ?>				
			</td>
            <td valign="top" colspan="2">
				<div id="mapdiv" style="width: 546px; height:350px;"></div>					
			</td>			
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/company/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content -->
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

 </div><!-- End Content -->
</div>
<?php echo '
<script type="text/javascript" language="javascript">

function submitForm() {
	document.forms.detailsForm.submit();					 
}
$( document ).ready(function() {

	$("#company_description").keyup(function () {
		var i = $("#company_description").val().length;
		$("#charcount").html(i+\' characters entered.\');
		if (i > 200) {
			$(\'#charcount\').removeClass(\'success\');
			$(\'#charcount\').addClass(\'error\');
		} else if(i == 0) {
			$(\'#charcount\').removeClass(\'success\');
			$(\'#charcount\').addClass(\'error\');
		} else {
			$(\'#charcount\').removeClass(\'error\');
			$(\'#charcount\').addClass(\'success\');
		} 
	});
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#participant_name\').html(\'\');
				$(\'#participant_code\').val(\'\');	
				$(\'#company_telephone\').val(\'\');	
				$(\'#company_contact_surname\').val(\'\');	
				$(\'#company_email\').val(\'\');					
			} else {
				$(\'#participant_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#participant_code\').val(ui.item.id);		
				$(\'#company_cellphone\').val(ui.item.cellphone);	
				$(\'#company_email\').val(ui.item.email);							
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