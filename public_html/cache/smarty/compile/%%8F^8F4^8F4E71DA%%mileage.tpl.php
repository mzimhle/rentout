<?php /* Smarty version 2.6.20, created on 2015-02-01 10:36:21
         compiled from car/view/mileage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'car/view/mileage.tpl', 53, false),array('modifier', 'date_format', 'car/view/mileage.tpl', 57, false),array('modifier', 'string_format', 'car/view/mileage.tpl', 75, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
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

	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/car/" title="Car">Car</a></li>
			<li><a href="/car/view/" title="View">View</a></li>
			<li><a href="/car/view/details.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title=""><?php echo $this->_tpl_vars['carData']['brand_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['make_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['model_name']; ?>
</a></li>
			<li>Mileage</li>
        </ul>
	</div><!--breadcrumb--> 
	<br />  
	<div class="inner"> 
      <h2><?php echo $this->_tpl_vars['carData']['brand_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['make_name']; ?>
 / <?php echo $this->_tpl_vars['carData']['model_name']; ?>
</h2>
	<br />
    <div id="sidetabs">
        <ul>             
			<li><a href="/car/view/details.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title="Details">Details</a></li>
			<li><a href="/car/view/image.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title="Images">Images</a></li>
			<li class="active"><a href="#" title="Mileage">Mileage</a></li>
			<li><a href="/car/view/feature.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" title="Feature">Feature</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<h4>Record all recorded mileage of the car on receival, booking, etc..</h4><br />
	<?php if (isset ( $this->_tpl_vars['errorArray']['image_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['image_description']; ?>
</span><?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['errorArray']['imagefile'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['imagefile']; ?>
</span><?php endif; ?>
	<form id="submitForm" name="submitForm" action="/car/view/mileage.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
" method="post" enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<thead>
		<tr>		
			<th></th>
			<th>Added</th>
			<th>Type</th>
			<th>Mileage (in kilometers)</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php if (((is_array($_tmp=$this->_tpl_vars['mileageData'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) == 0): ?>
		<tr>
			<td></td>
			<td>
				<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>

			</td>
			<td>
				<p>INITIAL MILEAGE</p>
				<?php if (isset ( $this->_tpl_vars['errorArray']['mileagetype_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['mileagetype_code']; ?>
</span><?php endif; ?>
			</td>			
			<td>
				<input type="text" id="mileage_number" name="mileage_number" value="" size="15" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['mileage_number'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['mileage_number']; ?>
</span><?php endif; ?>
			</td>
			<td colspan="2"><button onclick="additem();">Add Item</button></td>
		</tr>	
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['mileageData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mileage'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mileage']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['mileage']['iteration']++;
?>
		<tr>	
			<td><?php echo $this->_foreach['mileage']['iteration']; ?>
.</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['mileage_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</td>
			<td><?php echo $this->_tpl_vars['item']['mileagetype_description']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['mileage_number'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 km</td>
			<td><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
'); return false;">Delete</button></td>
			<td><button onclick="showimages('<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
'); return false;">Show Images</button></td>
		</tr>
		<tr class="mileageimage image_<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
">
			<td></td>
			<td colspan="8">
				<!-- ADD IMAGES FOR EACH COSTING -->
				<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
					<thead>
					  <tr>
						<th>Image</th>
						<th>Name</th>					
						<th>Primary</th>
						<th></th>
						<th></th>
					   </tr>
				   </thead>
				   <tbody>
				  <?php $_from = $this->_tpl_vars['item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image']):
?>
				  <tr>
					<td>
						<a target="_blank" href="http://www.rentout.co.za/image/<?php echo $this->_tpl_vars['image']['image_code']; ?>
/tiny">
							<img src="http://www.rentout.co.za/image/<?php echo $this->_tpl_vars['image']['image_code']; ?>
/tiny" />
						</a>
					</td>											
					<td>
						<input type="text" name="image_description_<?php echo $this->_tpl_vars['image']['image_code']; ?>
" id="image_description_<?php echo $this->_tpl_vars['image']['image_code']; ?>
" value="<?php echo $this->_tpl_vars['image']['image_description']; ?>
" size="30" />
					</td>									
					<td>
						<input type="radio" name="image_primary_<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
" id="image_primary_<?php echo $this->_tpl_vars['image']['image_code']; ?>
" value="<?php echo $this->_tpl_vars['image']['image_code']; ?>
" <?php if ($this->_tpl_vars['image']['image_primary'] == 1): ?> checked<?php endif; ?> />
					</td>			
					<td>	
						<button onclick="javascript:updateForm('<?php echo $this->_tpl_vars['image']['image_code']; ?>
', '<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
'); return false;" >Update</button>
					</td>	
					<td>
						<?php if ($this->_tpl_vars['image']['image_primary'] == '0'): ?>
						<button onclick="javascript:deleteForm('<?php echo $this->_tpl_vars['image']['image_code']; ?>
'); return false;" >Delete</button>
						<?php else: ?>
						N/A
						<?php endif; ?>		
					</td>		
				  </tr>
				  <?php endforeach; else: ?>
					<tr>
						<td colspan="5" class="error">There are no current items in the system.</td>
					</tr>
				  <?php endif; unset($_from); ?>  
					  <tr>
						<th colspan="3">Description</th>
						<th>Upload</th>
						<th></th>
					   </tr>
					<tr class="imageadd">
						<td colspan="3">
							<input type="text" id="image_description_<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
" name="image_description_<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
" value="" size="30" />
						</td>
						<td>
							<input type="file" id="imagefile_<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
" name="imagefile_<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
" />
						</td>
						<td><button onclick="addimage(<?php echo $this->_tpl_vars['item']['mileage_code']; ?>
); return false;">Add Image</button></td>
					</tr>								
					</tbody>						
				</table>			
				<!-- END ADDING IMAGES. -->
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>							
		</tbody>						
	</table>
	<input type="hidden" name="mileage_code_selected" id="mileage_code_selected" value="" />
	</form>
	</div>
	<div class="clearer"><!-- --></div>	

    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript">
$( document ).ready(function() {
	
	$(\'.mileageimage\').hide();
	
	return false;
	
});

function showimages(mileage) {
	$(\'.mileageimage\').hide();
	$(\'.image_\'+mileage).show();
	return false;
}

function addimage(code) {
	$(\'#mileage_code_selected\').val(code);
	document.forms.submitForm.submit();		
}

function additem() {
	$(\'#mileage_code_selected\').val(\'\');
	document.forms.submitForm.submit();					 
}

function deleteitem(code) {
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({
			type: "GET",
			url: "mileage.php?code='; ?>
<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php echo '",
			data: "deleteitem="+code,
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

function updateForm(id, cost) {
	if(confirm(\'Are you sure you want to update this file ?\')) {
		var primary = \'\';
		if($(\'#image_primary_\'+id).is(\':checked\')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "mileage.php",
				data: "code='; ?>
<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php echo '&image_code_update="+id+"&mileage_code="+cost+"&image_primary="+primary + "&image_description="+$(\'#image_description_\'+id).val(),
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Updated\');
							window.location.href = window.location.href;
						} else {
							alert(data.error);
						}
				}
		});							
	}
	
	return false;
}	
	
function deleteForm(id) {	
	if(confirm(\'Are you sure you want to delete this file?\')) {
			$.ajax({ 
					type: "GET",
					url: "mileage.php",
					data: "code='; ?>
<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php echo '&image_code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert(\'Deleted\');
								window.location.href = window.location.href;
							} else {
								alert(data.error);
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