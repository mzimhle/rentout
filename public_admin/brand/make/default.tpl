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
			<li><a href="/brand/" title="Brand">Brand</a></li>
			<li><a href="/brand/make/" title="Make">Make</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Makes</h2>
	<a href="/brand/make/details.php" title="Click to Add a new Make" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Make</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
     <!-- Start Search Form -->
    <div class="filter_double">
		<div id="searchBar" class="left">    				  
			<strong class="line fl">Search:</strong>
			<input type="text" class="small_field"  id="search" name="search" size="60" value="" />		
			<a  href="javascript:void(0);" onClick="getSearch();" class="button next fr"><span>Search</span></a>					
		 </div>
		<div class="clearer"><!-- --></div>	
    </div>	 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center"></div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
	 {include_php file='includes/footer.php'}
  </div><!-- End Content Section -->
<!-- End Main Container -->
</body>
</html>
