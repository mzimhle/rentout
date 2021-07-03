<?php /* Smarty version 2.6.20, created on 2014-09-14 12:16:03
         compiled from administration/companies/view/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'administration/companies/view/details.tpl', 16, false),array('function', 'html_options', 'administration/companies/view/details.tpl', 76, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | <?php if (isset ( $this->_tpl_vars['companyData'] )): ?>Edit Company<?php else: ?>Add a Company<?php endif; ?></title>
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
			<li><a href="/administration/companies/" title="Companies">Companies</a></li>
			<li><a href="/administration/companies/view/" title="Companies">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['companyData'] )): ?>Edit Company<?php else: ?>Add a Company<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['companyData'] )): ?>Edit Company<?php else: ?>Add a Company<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['companyData'] )): ?>/administration/companies/view/category.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Category">Category</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['companyData'] )): ?>/administration/companies/view/service.php?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Service">Service</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/companies/view/details.php<?php if (isset ( $this->_tpl_vars['companyData'] )): ?>?code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
<?php endif; ?>" method="post"   enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="3">
				<h4 class="heading">Type</h4><br />
					<select id="_product_reference" name="_product_reference" onchange="changeType();">
					<option value=""> --- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['productPairs'],'selected' => $this->_tpl_vars['companyData']['_product_reference']), $this);?>

					</select>
					<?php if (isset ( $this->_tpl_vars['errorArray']['_product_reference'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['_product_reference']; ?>
<span><?php else: ?><br /><em>What type of company viewing will this be on the web</em><?php endif; ?>
			</td>		
          </tr>	          
		  <tr>
			<td colspan="3">
				<h4 class="heading">BASIC</h4><br />
			</td>		
          </tr>			
           <tr>
			<td>
				<h4 class="error">Name:</h4>
				<br /><input type="text" name="company_name" id="company_name" value="<?php echo $this->_tpl_vars['companyData']['company_name']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_name']; ?>
<span><?php else: ?><br /><em>Registered company name</em><?php endif; ?>
			</td>
			<td>
				<h4 class="error">Participant:</h4><br />
				<input type="text" name="participant_name" id="participant_name" value="" size="35" />
				<input type="hidden" name="participant_code" id="participant_code" value="<?php echo $this->_tpl_vars['companyData']['participant_code']; ?>
" /><br />
				<span class="success" id="selectedparticipant"><?php echo $this->_tpl_vars['companyData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['companyData']['participant_surname']; ?>
</span>
				<?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
<span><?php else: ?><br /><em>Who added this company</em><?php endif; ?>
			</td>
			<td>
				<h4 class="error">Area:</h4><br />
				<input type="text" name="areapost_name" id="areapost_name" value="" size="35" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['companyData']['areapost_code']; ?>
" /><br />
				<span class="success" id="selectedarea"><?php echo $this->_tpl_vars['companyData']['areapost_city']; ?>
</span>
				<?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['areapost_code']; ?>
<span><?php else: ?><br /><em>Where is the business located</em><?php endif; ?>
			</td>			
          </tr>	
          <tr>
			<td>
				<h4 class="error">Contact Name:</h4><br />
				<input type="text" name="company_contact_name" id="company_contact_name" value="<?php echo $this->_tpl_vars['companyData']['company_contact_name']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_contact_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_contact_name']; ?>
<span><?php else: ?><br /><em>Contact person name</em><?php endif; ?>
			</td>	
			<td>
				<h4 class="error">Contact Surname:</h4><br />
				<input type="text" name="company_contact_surname" id="company_contact_surname" value="<?php echo $this->_tpl_vars['companyData']['company_contact_surname']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_contact_surname'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_contact_surname']; ?>
<span><?php else: ?><br /><em>Contact person surname</em><?php endif; ?>
			</td>
			<td>
				<h4 class="error">Contact Email:</h4><br />
				<input type="text" name="company_contact_email" id="company_contact_email" value="<?php echo $this->_tpl_vars['companyData']['company_contact_email']; ?>
" size="35" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_contact_email'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_contact_email']; ?>
<span><?php else: ?><br /><em>e.g. name.surname@domain.com</em><?php endif; ?>
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
					<img src="/media/no-logo.jpg" />
				<?php endif; ?>				
				<br /><br /><?php if (isset ( $this->_tpl_vars['errorArray']['imagelogo'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['imagelogo']; ?>
<span><?php else: ?><br /><em>jpg, jpeg, png images only</em><?php endif; ?>		
			</td>
			<td valign="top" colspan="2">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['company_description'] )): ?>class="error"<?php endif; ?>>Description (200 charachters):</h4><br />
				<textarea name="company_description" id="company_description" rows="6" cols="90" maxlength="500"><?php echo $this->_tpl_vars['companyData']['company_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_description']; ?>
<span><?php else: ?><br /><em id="charcount" class="error">0 characters entered.</em><?php endif; ?>
			</td>			
          </tr>
          <tr>
			<td colspan="3">
				<h4>Address:</h4><br />
				<input type="text" name="company_address" id="company_address" value="<?php echo $this->_tpl_vars['companyData']['company_address']; ?>
" size="120" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_address'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_address']; ?>
<span><?php else: ?><br /><em>Physical address of company</em><?php endif; ?>
			</td>		
          </tr>
          <tr>
			<td colspan="3">
				<h4 class="heading">PREMIUM</h4><br />
			</td>		
          </tr>
          <tr>
			<td>
				<h4>Telephone:</h4><br />
				<input type="text" name="company_telephone" id="company_telephone" value="<?php echo $this->_tpl_vars['companyData']['company_telephone']; ?>
" size="35"  class="PREMIUM" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_telephone'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_telephone']; ?>
<span><?php else: ?><br /><em>e.g. 0215640764</em><?php endif; ?>
			</td>	
			<td>
				<h4>Fax:</h4><br />
				<input type="text" name="company_fax" id="company_fax" value="<?php echo $this->_tpl_vars['companyData']['company_fax']; ?>
" size="35"  class="PREMIUM" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_fax'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_fax']; ?>
<span><?php else: ?><br /><em>e.g. 0815640764</em><?php endif; ?>
			</td>
			<td>
				<h4>Cellphone:</h4><br />
				<input type="text" name="company_cellphone" id="company_cellphone" value="<?php echo $this->_tpl_vars['companyData']['company_cellphone']; ?>
" size="35"  class="PREMIUM" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_cellphone'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_cellphone']; ?>
<span><?php else: ?><br /><em>e.g. 0735640764</em><?php endif; ?>
			</td>				
          </tr>
          <tr>
			<td>
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['imagebanner'] )): ?>class="error"<?php endif; ?>>Upload Banner:</h4><br />
				<input type="file" id="imagebanner" name="imagebanner"  class="PREMIUM" /><br />
				<?php if (isset ( $this->_tpl_vars['errorArray']['imagebanner'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['imagebanner']; ?>
<span><?php else: ?><br /><em>jpg, jpeg, png images only</em><?php endif; ?>	
			</td>
			<td colspan="2">
				<?php if (isset ( $this->_tpl_vars['companyData']['company_banner_name'] ) && trim ( $this->_tpl_vars['companyData']['company_banner_name'] ) != ''): ?>
					<img src="<?php echo $this->_tpl_vars['companyData']['company_banner_path']; ?>
tny_<?php echo $this->_tpl_vars['companyData']['company_banner_name']; ?>
<?php echo $this->_tpl_vars['companyData']['company_banner_ext']; ?>
" />
				<?php else: ?>
					<img src="/media/no-logo.jpg" />
				<?php endif; ?>		
			</td>
		  </tr>		  
			<tr>
			<td valign="top">
				<h4>Website:</h4><br />
				<input type="text" name="company_website" id="company_website" value="<?php echo $this->_tpl_vars['companyData']['company_website']; ?>
" size="35"  class="PREMIUM" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_website'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['company_website']; ?>
<span><?php else: ?><br /><em>e.g. www.google.com</em><?php endif; ?><br /><br /><br />
				<h4>Longitude:</h4><br />
				<input type="text" name="company_longitude" id="company_longitude" value="<?php echo $this->_tpl_vars['companyData']['company_longitude']; ?>
" size="30" readonly /><br /><br />
				<h4>Latitude:</h4><br />
				<input type="text" name="company_latitude" id="company_latitude" value="<?php echo $this->_tpl_vars['companyData']['company_latitude']; ?>
" size="30" readonly /><br />				
			</td>
            <td valign="top" colspan="2">
				<div id="mapdiv" style="width: 546px; height:350px;"></div>					
			</td>			
          </tr>		
          <tr>            
			<td colspan="3">
				<h4 class="error">Page:</h4><br />
				<textarea  class="PREMIUM" name="company_page" id="company_page" rows="20" cols="130" ><?php echo $this->_tpl_vars['companyData']['company_page']; ?>
</textarea>
			</td>	
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/companies/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'company_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

function changeType() {
	
	var changetype = $(\'#_product_reference :selected\').val();
	
	$(".PREMIUM").attr("readonly", true);
	$(".PREMIUM").attr("disabled", true);
	
	if(changetype == \'PREMIUM\') {		
	$(".PREMIUM").attr("readonly", false);
	$(".PREMIUM").attr("disabled", false);
	}
}

$( document ).ready(function() {
	
	changeType();
	
	$(document).ready(function() {
		new nicEditor({
			iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
			buttonList 	: [\'bold\',\'italic\',\'underline\',\'left\',\'center\', \'ol\', \'ul\', \'xhtml\', \'fontFormat\', \'fontFamily\', \'fontSize\', \'unlink\', \'link\', \'strikethrough\', \'superscript\', \'subscript\', \'upload\'],
			maxHeight 	: \'1000\',
			uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
		}).panelInstance(\'company_page\');				
	});
	
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
				$(\'#company_contact_name\').val(\'\');	
				$(\'#company_contact_surname\').val(\'\');	
				$(\'#company_contact_email\').val(\'\');					
			} else {
				$(\'#participant_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#participant_code\').val(ui.item.id);		
				$(\'#company_contact_name\').val(ui.item.name);	
				$(\'#company_contact_surname\').val(ui.item.surname);	
				$(\'#company_contact_email\').val(ui.item.email);							
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
	
	$(\'#companycategory_code\').change(function() {
	
		var category	= $(\'#companycategory_code :selected\').val();
	
		$.ajax({
			type: "GET",
			url: "details.php",
			data: "'; ?>
<?php if (isset ( $this->_tpl_vars['companyData'] )): ?>code=<?php echo $this->_tpl_vars['companyData']['company_code']; ?>
&<?php endif; ?><?php echo 'category_code_search="+category,
			dataType: "html",
			success: function(items){
				//show table
				$(\'#companysectiontd\').html(items);
			}
		});	
	});	
		
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>