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
			<li><a href="/group/view/" title="View">View</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Groups</h2>
	<a href="/group/view/details.php" title="Click to Add a new Group" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Group</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>				
				<th>Added</th>
				<th>Image</th>
				<th>Name</th>
				<th></th>
				</tr>
			   </thead>
			   <tbody> 
			  {foreach from=$groupData item=item}
			  <tr>
				<td>{$item.group_added|date_format}</td>
				<td>{if $item.group_image_path neq ''}<img src="http://www.rentout.co.za{$item.group_image_path}tny_{$item.group_image_name}{$item.group_image_ext}" />{else}<img src="http://www.rentout.co.za/images/no-image.jpg" width="50px"/>{/if}</td>
				<td align="left"><a href="/group/view/details.php?code={$item.group_code}">{$item.group_name}</a></td>
				<td align="right"><button onclick="deleteitem('{$item.group_code}')">Delete</button></td>
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
