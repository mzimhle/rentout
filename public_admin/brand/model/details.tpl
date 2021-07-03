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
			<li><a href="/participant/" title="Members">Members</a></li>
			<li><a href="/model/" title="Models">Models</a></li>
			<li><a href="/brand/model/" title="Members">View</a></li>
			<li>{if isset($modelData)}Edit Model{else}Add a Model{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($modelData)}Edit Model{else}Add a Model{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/brand/model/details.php{if isset($modelData)}?code={$modelData.model_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="model_name" id="model_name" value="{$modelData.model_name}" size="80" />
				{if isset($errorArray.model_name)}<br /><span class="error">{$errorArray.model_name}</span>{else}<br />Name of the model as it will be seen on the website{/if}
			</td>				
          </tr>
         <tr>
			<td>
				<h4 class="error">Brand:</h4><br />
				<select name="brand_code" id="brand_code" onchange="getMake();">
					<option value=""> ---- </option>
					{html_options options=$brandpairs selected=$modelData.brand_code}
				</select>
				<br />{if isset($errorArray.brand_code)}<span class="error">{$errorArray.brand_code}</span>{else}<em>Select brand that this make falls under</em>{/if}
			</td>				
          </tr>
         <tr>
			<td>
				<h4 class="error">Make:</h4><br />
				<div id="makelist">
					<span class="error">Please select a brand first to list it's makes</span>
					<input type="hidden" id="make_code" name="make_code" />
				</div>
				<br />{if isset($errorArray.brand_code)}<span class="error">{$errorArray.brand_code}</span>{else}<em>Select brand that this make falls under</em>{/if}				
			</td>				
          </tr>		  
          <tr>
			<td valign="top">
				<h4 {if isset($errorArray.modellogo)}class="error"{/if} >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="modellogo" name="modellogo" />
				{if isset($errorArray.modellogo)}<br /><br /><span class="error">{$errorArray.modellogo}</span>{/if}
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				{if $modelData.model_image_path neq ''}<img src="http://www.rentout.co.za{$modelData.model_image_path}tny_{$modelData.model_image_name}{$modelData.model_image_ext}" />{else}<img src="http://www.rentout.co.za/images/no-image.jpg" width="150px" />{/if}
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/brand/model/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
				data: "{/literal}{if isset($modelData)}code={$modelData.model_code}&{/if}{literal}get_make_code="+brandcode,
				dataType: "html",
				success: function(data){
					$('#makelist').html(data);
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
