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
			<li><a href="/car/" title="Car">Car</a></li>
			<li><a href="/car/view/" title="View">View</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Cars</h2>
	<a href="/car/view/details.php" title="Click to Add a new Car" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Car</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>				
				<th>Added</th>
				<th>Car Owner</th>
				<th>Image</th>
				<th>Brand / Make / Model</th>
				<th>Year</th>
				<th></th>
				</tr>
			   </thead>
			   <tbody> 
			   {if $carData|@count gt 0}
			  {foreach from=$carData item=item}
			  <tr>
				<td>{$item.car_added|date_format}</td>
				<td align="left">{$item.participant_name} {$item.participant_surname} <br />( {$item.participant_email} )</td>
				<td>{if $item.image_path neq ''}<img src="http://www.rentout.co.za{$item.image_path}tny_{$item.image_name}{$item.image_ext}" />{else}<img src="http://www.rentout.co.za'/images/no-image.jpg" width="50px"/>{/if}</td>
				<td align="left"><a href="/car/view/details.php?code={$item.car_code}">{$item.brand_name} / {$item.make_name} / {$item.model_name}</a></td>
				<td align="left">{$item.car_year}</td>
				<td align="right"><button onclick="deleteitem('{$item.car_code}')">Delete</button></td>
			  </tr>
			  {/foreach}
			  {/if}
			  </tbody>
			</table>
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
  </div><!-- End Content Section -->
  	 {include_php file='includes/footer.php'}
</div>
<!-- End Main Container -->
</body>
</html>
