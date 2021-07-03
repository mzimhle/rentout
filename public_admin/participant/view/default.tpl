<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Cache-Control" content="max-age=0" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:45:40 GMT" />
<meta http-equiv="Pragma" content="no-cache" />
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
			<li><a href="/participant/" title="Participants">Participants</a></li>
			<li><a href="/participant/view/" title="View">View</a></li>
        </ul>
	</div>
	<div class="inner">     
    <h2>Manage Participants</h2>
	<a href="/participant/view/details.php" title="Click to Add a new Participant" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Participant</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>
				<th>Added</th>
				<th>Profile Pic</th>
				<th>Fullname</th>
				<th>Email</th>
				<th>Cellphone</th>
				<th>Status</th>
				<th></th>
				</tr>
			   </thead>
			   <tbody> 
			  {foreach from=$participantData item=item}
			  <tr>
				<td>{$item.participant_added|date_format}</td>
				<td>{if $item.participant_image_path neq ''}<img src="http://www.rentout.co.za{$item.participant_image_path}tny_{$item.participant_image_name}{$item.participant_image_ext}" />{else}<img src="http://www.rentout.co.za/images/no-image.jpg" width="110px"/>{/if}</td>
				<td align="left"><a href="/participant/view/details.php?code={$item.participant_code}">{$item.participant_name} {$item.participant_surname}</a></td>
				<td align="left">{$item.participant_email}</td>	
				<td align="left">{$item.participant_cellphone}</td>	
				<td align="left">{if $item.participant_active eq '1'}<span class="success">Activated</span>{else}<span class="error">Not Activated</span>{/if}</td>
				<td align="left"><button onclick="deleteitem('{$item.participant_code}')">Delete</button></td>
			  </tr>
			  {/foreach}     
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
