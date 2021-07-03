<?php /* Smarty version 2.6.20, created on 2015-02-25 00:11:55
         compiled from car/view/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'car/view/details.tpl', 42, false),array('modifier', 'number_format', 'car/view/details.tpl', 87, false),)), $this); ?>
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
			<li><a href="/car/" title="Cars">Cars</a></li>
			<li><a href="/car/view/" title="View">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['carData'] )): ?>Edit Car<?php else: ?>Add a Car<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['carData'] )): ?>Edit Car<?php else: ?>Add a Car<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['carData'] )): ?>/car/view/image.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Images">Images</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['carData'] )): ?>/car/view/mileage.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Mileage">Mileage</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['carData'] )): ?>/car/view/feature.php?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Feature">Feature</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/car/view/details.php<?php if (isset ( $this->_tpl_vars['carData'] )): ?>?code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="form">
		<tr>
			<td>
				<h4 class="error">Brand:</h4><br />
				<select id="brand_code" name="brand_code" onchange="getMake();">
					<option value=""> ----- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['brandpairs'],'selected' => $this->_tpl_vars['carData']['brand_code']), $this);?>

				</select>
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['brand_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['brand_code']; ?>
</span><?php else: ?><em>Brand of the car</em><?php endif; ?>
			</td>
			<td>
				<h4 class="error">Make:</h4><br />
				<div id="makelist">
					<span class="error">Select a brand first</span>
					<input type="hidden" id="make_code" name="make_code" />
				</div>
				<?php if (isset ( $this->_tpl_vars['errorArray']['make_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['make_code']; ?>
</span><?php else: ?><em>Select car make</em><?php endif; ?>				
			</td>
			<td>
				<h4 class="error">Model:</h4><br />
				<div id="modellist">
					<span class="error">Select a make first</span>
					<input type="hidden" id="model_code" name="model_code" />
				</div>
				<?php if (isset ( $this->_tpl_vars['errorArray']['model_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['model_code']; ?>
</span><?php else: ?><em>Select car model</em><?php endif; ?>				
			</td>			
		</tr>
		<tr>
			<td>
				<h4 class="error">Year:</h4><br />
				<input type="text" id="car_year" name="car_year" value="<?php echo $this->_tpl_vars['carData']['car_year']; ?>
" size="8" />
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['colour_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['colour_code']; ?>
</span><?php else: ?><em>Colour of the car</em><?php endif; ?>
			</td>
			<td colspan="2">
				<h4 class="error">Description:</h4><br />
				<textarea id="car_description" name="car_description" cols="80" rows="3"><?php echo $this->_tpl_vars['carData']['car_description']; ?>
</textarea>
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['car_seats'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['car_seats']; ?>
</span><?php else: ?><em>Car seats</em><?php endif; ?>
			</td>			
		</tr>
		<tr>
			<td>
				<h4 class="error">Pricing group:</h4><br />
				<select id="group_code" name="group_code">
					<option value=""> ----- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['grouppairs'],'selected' => $this->_tpl_vars['carData']['group_code']), $this);?>

				</select>
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['group_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['group_code']; ?>
</span><?php else: ?><em>Group for pricing</em><?php endif; ?>
			</td>
			<td colspan="2">
				<h4>Booking price:</h4><br />
				<?php if (isset ( $this->_tpl_vars['carData'] )): ?>
				<p class="success">Price for rental is R <?php echo ((is_array($_tmp=$this->_tpl_vars['carData']['price_cost'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ",") : number_format($_tmp, 2, ".", ",")); ?>
 per day.</p>
				<?php else: ?>
				<p class="error">A car has not been added yet.</p>
				<?php endif; ?>
			</td>			
		</tr>
		<tr>
			<td colspan="3">
				<h4 class="error">Car Owner:</h4><br />
				<input type="text" id="participant_name" name="participant_name" value="<?php if (isset ( $this->_tpl_vars['carData'] )): ?><?php echo $this->_tpl_vars['carData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['carData']['participant_surname']; ?>
 ( <?php echo $this->_tpl_vars['carData']['participant_email']; ?>
 )<?php endif; ?>" size="80" />
				<input type="hidden" id="participant_code" name="participant_code" value="<?php echo $this->_tpl_vars['carData']['participant_code']; ?>
" />
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['participant_code'] )): ?><span class="error"><?php echo $this->_tpl_vars['errorArray']['participant_code']; ?>
</span><?php else: ?><em>Please select a car owner</em><?php endif; ?>
			</td>			
		</tr>		
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/car/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

 </div><!-- End Content recruiter -->
<?php echo '
<script type="text/javascript" language="javascript">

$(document).ready(function(){

	getMake();
	
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
	
});

function submitForm() {
	document.forms.detailsForm.submit();					 
}

function getMake() {
	
	var brandcode = $(\'#brand_code :selected\').val();
	
	if(brandcode != \'\') {
		$.ajax({
				type: "GET",
				url: "details.php",
				data: "'; ?>
<?php if (isset ( $this->_tpl_vars['carData'] )): ?>code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
&<?php endif; ?><?php echo 'get_make_code="+brandcode,
				dataType: "html",
				success: function(data){
					$(\'#makelist\').html(data);
					
					getModel();
				}
		});							
	}
	return false;
}

function getModel() {
	
	var makecode = $(\'#make_code :selected\').val();

	if(makecode != \'\') {
		$.ajax({
				type: "GET",
				url: "details.php",
				data: "'; ?>
<?php if (isset ( $this->_tpl_vars['carData'] )): ?>code=<?php echo $this->_tpl_vars['carData']['car_code']; ?>
&<?php endif; ?><?php echo 'get_model_code="+makecode,
				dataType: "html",
				success: function(data){
					$(\'#modellist\').html(data);
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