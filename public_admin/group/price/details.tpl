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
			<li><a href="/price/" title="Prices">Prices</a></li>
			<li><a href="/group/price/" title="Members">View</a></li>
			<li>{if isset($priceData)}Edit Price{else}Add a Price{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($priceData)}Edit Price{else}Add a Price{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/group/price/details.php{if isset($priceData)}?code={$priceData.price_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Group:</h4><br />
				<select id="group_code" name="group_code">
					<option value=""> ----- </option>
					{html_options options=$grouppairs selected=$priceData.group_code}
				</select>
				{if isset($errorArray.group_code)}<br /><span class="error">{$errorArray.group_code}</span>{else}<br />Select group to set its price.{/if}
			</td>				
          </tr>
			<td>
				<h4 class="error">Price per day:</h4><br />
				<input type="text" name="price_cost" id="price_name" value="{$priceData.price_cost}" size="50" />
				{if isset($errorArray.price_cost)}<br /><span class="error">{$errorArray.price_cost}</span>{else}<br />Add price to the group, only in Rands and no Cents{/if}
			</td>		
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/group/price/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
