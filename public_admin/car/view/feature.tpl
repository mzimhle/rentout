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
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/car/view/" title="">Car</a></li>
			<li><a href="/car/view/details.php?code={$carData.car_code}" title="">{$carData.brand_name} / {$carData.make_name} / {$carData.model_name}</a></li>
			<li>Images</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2>{$carData.brand_name} / {$carData.make_name} / {$carData.model_name}</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
			<li><a href="/car/view/details.php?code={$carData.car_code}" title="Details">Details</a></li>
			<li><a href="/car/view/image.php?code={$carData.car_code}" title="Images">Images</a></li>
			<li><a href="/car/view/mileage.php?code={$carData.car_code}" title="Mileage">Mileage</a></li>
			<li class="active"><a href="#" title="Feature">Feature</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<form id="addForm" name="addForm" action="/car/view/feature.php?code={$carData.car_code}" method="post" enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		<thead>
		  <tr>
			<th>Feature</th>				
			<th>Icon</th>
			<th></th>
		   </tr>
	   </thead>
	   <tbody>	   
	  {foreach from=$carfeatureData item=item}
	  <tr>
		<td>{$item.feature_name}</td>		
		<td><img src="http://www.rentout.co.za/download/feature/{$item.feature_code|default:'none'}?{$nc}" width="35" /></td>		
		<td><button onclick="javascript:deleteForm('{$item.carfeature_code}'); return false;">Delete</button></td>		
	  </tr>
	  {foreachelse}
		<tr>
			<td colspan="3" class="error">There are no current items in the system.</td>
		</tr>
	  {/foreach}  
		  <tr>
			<th colspan="3">Feature</th>
		   </tr>
		<tr>
			<td colspan="2">
				<select id="feature_code" name="feature_code">
					<option value=""> ----- </option>
					{html_options options=$featurepairs}
				</select>
				{if isset($errorArray.feature_code)}<br /><span class="error">{$errorArray.feature_code}</span>{/if}
			</td>
			<td><button onclick="addForm(); return false;">Add Item</button></td>
		</tr>								
		</tbody>						
	</table>
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
function addForm() {
	document.forms.addForm.submit();				 
}			
	
function updateForm(id) {
	if(confirm('Are you sure you want to update this file ?')) {
		var primary = '';
		if($('#feature_primary_'+id).is(':checked')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "feature.php",
				data: "code={/literal}{$carData.car_code}{literal}&feature_code_update="+id+"&feature_primary="+primary + "&feature_description="+$('#feature_description_'+id).val(),
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
					url: "feature.php",
					data: "code={/literal}{$carData.car_code}{literal}&feature_code_delete="+id,
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
