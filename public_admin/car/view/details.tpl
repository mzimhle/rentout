<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
    {include_php file='includes/header.php'}
  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/car/" title="Cars">Cars</a></li>
			<li><a href="/car/view/" title="View">View</a></li>
			<li>{if isset($carData)}Edit Car{else}Add a Car{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($carData)}Edit Car{else}Add a Car{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($carData)}/car/view/image.php?code={$carData.car_code}{else}#{/if}" title="Images">Images</a></li>
			<li><a href="{if isset($carData)}/car/view/mileage.php?code={$carData.car_code}{else}#{/if}" title="Mileage">Mileage</a></li>
			<li><a href="{if isset($carData)}/car/view/feature.php?code={$carData.car_code}{else}#{/if}" title="Feature">Feature</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/car/view/details.php{if isset($carData)}?code={$carData.car_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="form">
		<tr>
			<td>
				<h4 class="error">Brand:</h4><br />
				<select id="brand_code" name="brand_code" onchange="getMake();">
					<option value=""> ----- </option>
					{html_options options=$brandpairs selected=$carData.brand_code}
				</select>
				<br />{if isset($errorArray.brand_code)}<span class="error">{$errorArray.brand_code}</span>{else}<em>Brand of the car</em>{/if}
			</td>
			<td>
				<h4 class="error">Make:</h4><br />
				<div id="makelist">
					<span class="error">Select a brand first</span>
					<input type="hidden" id="make_code" name="make_code" />
				</div>
				{if isset($errorArray.make_code)}<span class="error">{$errorArray.make_code}</span>{else}<em>Select car make</em>{/if}				
			</td>
			<td>
				<h4 class="error">Model:</h4><br />
				<div id="modellist">
					<span class="error">Select a make first</span>
					<input type="hidden" id="model_code" name="model_code" />
				</div>
				{if isset($errorArray.model_code)}<span class="error">{$errorArray.model_code}</span>{else}<em>Select car model</em>{/if}				
			</td>			
		</tr>
		<tr>
			<td>
				<h4 class="error">Year:</h4><br />
				<input type="text" id="car_year" name="car_year" value="{$carData.car_year}" size="8" />
				<br />{if isset($errorArray.colour_code)}<span class="error">{$errorArray.colour_code}</span>{else}<em>Colour of the car</em>{/if}
			</td>
			<td colspan="2">
				<h4 class="error">Description:</h4><br />
				<textarea id="car_description" name="car_description" cols="80" rows="3">{$carData.car_description}</textarea>
				<br />{if isset($errorArray.car_seats)}<span class="error">{$errorArray.car_seats}</span>{else}<em>Car seats</em>{/if}
			</td>			
		</tr>
		<tr>
			<td>
				<h4 class="error">Pricing group:</h4><br />
				<select id="group_code" name="group_code">
					<option value=""> ----- </option>
					{html_options options=$grouppairs selected=$carData.group_code}
				</select>
				<br />{if isset($errorArray.group_code)}<span class="error">{$errorArray.group_code}</span>{else}<em>Group for pricing</em>{/if}
			</td>
			<td colspan="2">
				<h4>Booking price:</h4><br />
				{if isset($carData)}
				<p class="success">Price for rental is R {$carData.price_cost|number_format:2:".":","} per day.</p>
				{else}
				<p class="error">A car has not been added yet.</p>
				{/if}
			</td>			
		</tr>
		<tr>
			<td colspan="3">
				<h4 class="error">Car Owner:</h4><br />
				<input type="text" id="participant_name" name="participant_name" value="{if isset($carData)}{$carData.participant_name} {$carData.participant_surname} ( {$carData.participant_email} ){/if}" size="80" />
				<input type="hidden" id="participant_code" name="participant_code" value="{$carData.participant_code}" />
				<br />{if isset($errorArray.participant_code)}<span class="error">{$errorArray.participant_code}</span>{else}<em>Please select a car owner</em>{/if}
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
 {include_php file='includes/footer.php'}
 </div><!-- End Content recruiter -->
{literal}
<script type="text/javascript" language="javascript">

$(document).ready(function(){

	getMake();
	
	$( "#participant_name" ).autocomplete({
		source: "/feeds/participant.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#participant_name').html('');
				$('#participant_code').val('');					
			} else {
				$('#participant_name').html('<b>' + ui.item.value + '</b>');
				$('#participant_code').val(ui.item.id);	
			}
			$('#participant_name').val('');										
		}
	});
	
});

function submitForm() {
	document.forms.detailsForm.submit();					 
}

function getMake() {
	
	var brandcode = $('#brand_code :selected').val();
	
	if(brandcode != '') {
		$.ajax({
				type: "GET",
				url: "details.php",
				data: "{/literal}{if isset($carData)}code={$carData.car_code}&{/if}{literal}get_make_code="+brandcode,
				dataType: "html",
				success: function(data){
					$('#makelist').html(data);
					
					getModel();
				}
		});							
	}
	return false;
}

function getModel() {
	
	var makecode = $('#make_code :selected').val();

	if(makecode != '') {
		$.ajax({
				type: "GET",
				url: "details.php",
				data: "{/literal}{if isset($carData)}code={$carData.car_code}&{/if}{literal}get_model_code="+makecode,
				dataType: "html",
				success: function(data){
					$('#modellist').html(data);
				}
		});							
	}
	return false;
}

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
