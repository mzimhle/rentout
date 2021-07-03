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
			<li><a href="/feature/" title="Features">Features</a></li>
			<li><a href="/car/feature/" title="Members">View</a></li>
			<li>{if isset($featureData)}Edit Feature{else}Add a Feature{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($featureData)}Edit Feature{else}Add a Feature{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/car/feature/details.php{if isset($featureData)}?code={$featureData.feature_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="2">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="feature_name" id="feature_name" value="{$featureData.feature_name}" size="80" />
				{if isset($errorArray.feature_name)}<br /><span class="error">{$errorArray.feature_name}</span>{else}<br />Name of the feature as it will be seen on the website{/if}
			</td>				
          </tr>
          <tr>
			<td valign="top">
				<h4 {if isset($errorArray.featureimage)}class="error"{/if} >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="featureimage" name="featureimage" />
				{if isset($errorArray.featureimage)}<br /><br /><span class="error">{$errorArray.featureimage}</span>{/if}
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				<img src="http://www.rentout.co.za/download/feature/{$featureData.feature_code|default:'none'}?{$nc}" />
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/car/feature/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
function submitForm() {
	document.forms.detailsForm.submit();					 
}
</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
