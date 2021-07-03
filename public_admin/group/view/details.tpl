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
			<li><a href="/group/" title="Groups">Groups</a></li>
			<li><a href="/group/view/" title="Members">View</a></li>
			<li>{if isset($groupData)}Edit Group{else}Add a Group{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($groupData)}Edit Group{else}Add a Group{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/group/view/details.php{if isset($groupData)}?code={$groupData.group_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="2">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="group_name" id="group_name" value="{$groupData.group_name}" size="80" />
				{if isset($errorArray.group_name)}<br /><span class="error">{$errorArray.group_name}</span>{else}<br />Name of the group as it will be seen on the website{/if}
			</td>				
          </tr>
          <tr>
			<td valign="top">
				<h4 {if isset($errorArray.grouplogo)}class="error"{/if} >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="grouplogo" name="grouplogo" />
				{if isset($errorArray.grouplogo)}<br /><br /><span class="error">{$errorArray.grouplogo}</span>{/if}
			</td>
          </tr>	
		  <tr>
			<td valign="top">
				{if $groupData.group_image_path neq ''}<img src="http://www.rentout.co.za{$groupData.group_image_path}tny_{$groupData.group_image_name}{$groupData.group_image_ext}" />{else}<img src="http://www.rentout.co.za/images/no-image.jpg" />{/if}
			</td>
		 </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/group/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
