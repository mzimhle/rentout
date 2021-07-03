<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
<script type="text/javascript" language="javascript" src="default.js"></script>
</head>

<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    {include_php file='includes/header.php'}
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/group/" title="Group">Group</a></li>
			<li><a href="/group/price/" title="Price">Price</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Prices</h2>
	<a href="/group/price/details.php" title="Click to Add a new Price" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Price</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>	
				<th>Added</th>
				<th>Group</th>
				<th>Price</th>
				</tr>
			   </thead>
			   <tbody> 
			  {foreach from=$priceData item=item}
			  <tr>
				<td>{$item.price_startdate|date_format}</td>
				<td align="left">{$item.group_name}</td>
				<td align="left">R {$item.price_cost|number_format:2:".":","}</td>
			  </tr>
			  {/foreach}     
			  </tbody>
			</table>
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
	 {include_php file='includes/footer.php'}
  </div><!-- End Content Section -->
</div>
<!-- End Main Container -->
</body>
</html>
