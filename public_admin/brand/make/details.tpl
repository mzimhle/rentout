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
			<li><a href="/make/" title="Makes">Makes</a></li>
			<li><a href="/brand/make/" title="Members">View</a></li>
			<li>{if isset($makeData)}Edit Brand{else}Add a Brand{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($makeData)}Edit Brand{else}Add a Brand{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/brand/make/details.php{if isset($makeData)}?code={$makeData.make_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="make_name" id="make_name" value="{$makeData.make_name}" size="80" />
				<br />{if isset($errorArray.make_name)}<span class="error">{$errorArray.make_name}</span>{else}<em>Name of the make as it will be seen on the website</em>{/if}
			</td>				
          </tr>
         <tr>
			<td>
				<h4 class="error">Brand:</h4><br />
				<select name="brand_code" id="brand_code">
					<option value=""> ---- </option>
					{html_options options=$brandpairs selected=$makeData.brand_code}
				</select>
				<br />{if isset($errorArray.brand_code)}<span class="error">{$errorArray.brand_code}</span>{else}<em>Select brand that this make falls under</em>{/if}
			</td>				
          </tr>		  
          <tr>
			<td valign="top">
				<h4 {if isset($errorArray.makelogo)}class="error"{/if} >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="makelogo" name="makelogo" />
				{if isset($errorArray.makelogo)}<br /><br /><span class="error">{$errorArray.makelogo}</span>{/if}
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				{if $makeData.make_image_path neq ''}<img src="http://www.rentout.co.za{$makeData.make_image_path}tny_{$makeData.make_image_name}{$makeData.make_image_ext}" />{else}<img src="http://www.rentout.co.za/images/no-image.jpg" />{/if}
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/brand/make/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
