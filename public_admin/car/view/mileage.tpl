<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
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
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/car/" title="Car">Car</a></li>
			<li><a href="/car/view/" title="View">View</a></li>
			<li><a href="/car/view/details.php?code={$carData.car_code}" title="">{$carData.brand_name} / {$carData.make_name} / {$carData.model_name}</a></li>
			<li>Mileage</li>
        </ul>
	</div><!--breadcrumb--> 
	<br />  
	<div class="inner"> 
      <h2>{$carData.brand_name} / {$carData.make_name} / {$carData.model_name}</h2>
	<br />
    <div id="sidetabs">
        <ul>             
			<li><a href="/car/view/details.php?code={$carData.car_code}" title="Details">Details</a></li>
			<li><a href="/car/view/image.php?code={$carData.car_code}" title="Images">Images</a></li>
			<li class="active"><a href="#" title="Mileage">Mileage</a></li>
			<li><a href="/car/view/feature.php?code={$carData.car_code}" title="Feature">Feature</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<h4>Record all recorded mileage of the car on receival, booking, etc..</h4><br />
	{if isset($errorArray.image_description)}<br /><span class="error">{$errorArray.image_description}</span>{/if}
	{if isset($errorArray.imagefile)}<br /><span class="error">{$errorArray.imagefile}</span>{/if}
	<form id="submitForm" name="submitForm" action="/car/view/mileage.php?code={$carData.car_code}" method="post" enctype="multipart/form-data">
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
		{if $mileageData|count eq 0}
		<tr>
			<td></td>
			<td>
				{$smarty.now|date_format:"%A, %B %e, %Y"}
			</td>
			<td>
				<p>INITIAL MILEAGE</p>
				{if isset($errorArray.mileagetype_code)}<br /><span class="error">{$errorArray.mileagetype_code}</span>{/if}
			</td>			
			<td>
				<input type="text" id="mileage_number" name="mileage_number" value="" size="15" />
				{if isset($errorArray.mileage_number)}<br /><span class="error">{$errorArray.mileage_number}</span>{/if}
			</td>
			<td colspan="2"><button onclick="additem();">Add Item</button></td>
		</tr>	
		{/if}
		{foreach from=$mileageData item=item name=mileage}
		<tr>	
			<td>{$smarty.foreach.mileage.iteration}.</td>
			<td>{$item.mileage_added|date_format:"%A, %B %e, %Y"}</td>
			<td>{$item.mileagetype_description}</td>
			<td>{$item.mileage_number|string_format:"%.2f"} km</td>
			<td><button onclick="deleteitem('{$item.mileage_code}'); return false;">Delete</button></td>
			<td><button onclick="showimages('{$item.mileage_code}'); return false;">Show Images</button></td>
		</tr>
		<tr class="mileageimage image_{$item.mileage_code}">
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
				  {foreach from=$item.images item=image}
				  <tr>
					<td>
						<a target="_blank" href="http://www.rentout.co.za/image/{$image.image_code}/tiny">
							<img src="http://www.rentout.co.za/image/{$image.image_code}/tiny" />
						</a>
					</td>											
					<td>
						<input type="text" name="image_description_{$image.image_code}" id="image_description_{$image.image_code}" value="{$image.image_description}" size="30" />
					</td>									
					<td>
						<input type="radio" name="image_primary_{$item.mileage_code}" id="image_primary_{$image.image_code}" value="{$image.image_code}" {if $image.image_primary eq 1} checked{/if} />
					</td>			
					<td>	
						<button onclick="javascript:updateForm('{$image.image_code}', '{$item.mileage_code}'); return false;" >Update</button>
					</td>	
					<td>
						{if $image.image_primary eq '0'}
						<button onclick="javascript:deleteForm('{$image.image_code}'); return false;" >Delete</button>
						{else}
						N/A
						{/if}		
					</td>		
				  </tr>
				  {foreachelse}
					<tr>
						<td colspan="5" class="error">There are no current items in the system.</td>
					</tr>
				  {/foreach}  
					  <tr>
						<th colspan="3">Description</th>
						<th>Upload</th>
						<th></th>
					   </tr>
					<tr class="imageadd">
						<td colspan="3">
							<input type="text" id="image_description_{$item.mileage_code}" name="image_description_{$item.mileage_code}" value="" size="30" />
						</td>
						<td>
							<input type="file" id="imagefile_{$item.mileage_code}" name="imagefile_{$item.mileage_code}" />
						</td>
						<td><button onclick="addimage({$item.mileage_code}); return false;">Add Image</button></td>
					</tr>								
					</tbody>						
				</table>			
				<!-- END ADDING IMAGES. -->
			</td>
		</tr>
		{/foreach}							
		</tbody>						
	</table>
	<input type="hidden" name="mileage_code_selected" id="mileage_code_selected" value="" />
	</form>
	</div>
	<div class="clearer"><!-- --></div>	

    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 {include_php file='includes/footer.php'}
</div>
{literal}
<script type="text/javascript">
$( document ).ready(function() {
	
	$('.mileageimage').hide();
	
	return false;
	
});

function showimages(mileage) {
	$('.mileageimage').hide();
	$('.image_'+mileage).show();
	return false;
}

function addimage(code) {
	$('#mileage_code_selected').val(code);
	document.forms.submitForm.submit();		
}

function additem() {
	$('#mileage_code_selected').val('');
	document.forms.submitForm.submit();					 
}

function deleteitem(code) {
	if(confirm('Are you sure you want to delete this item?')) {
		$.ajax({
			type: "GET",
			url: "mileage.php?code={/literal}{$carData.car_code}{literal}",
			data: "deleteitem="+code,
			dataType: "json",
			success: function(data){
				if(data.result == 1) {
					alert('Deleted');
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
	if(confirm('Are you sure you want to update this file ?')) {
		var primary = '';
		if($('#image_primary_'+id).is(':checked')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "mileage.php",
				data: "code={/literal}{$carData.car_code}{literal}&image_code_update="+id+"&mileage_code="+cost+"&image_primary="+primary + "&image_description="+$('#image_description_'+id).val(),
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert('Updated');
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
	if(confirm('Are you sure you want to delete this file?')) {
			$.ajax({ 
					type: "GET",
					url: "mileage.php",
					data: "code={/literal}{$carData.car_code}{literal}&image_code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert('Deleted');
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
{/literal}
<!-- End Main Container -->
</body>
</html>
