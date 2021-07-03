<?php /* Smarty version 2.6.20, created on 2014-09-06 17:37:05
         compiled from company/default.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Business Lounge - Business Listings</title>
<meta name="keywords" content="business, tenders, business listings, entrepreneurs, jobs">
<meta name="description" content="Business Lounge offers business opportunities to corporates, entrepreneurs and SME’s from South Africa. Covering tenders, trade leads, business listings, jobs and more prospects to grow your business...">          
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="21 days">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="og:title" content="Business Lounge"> 
<meta property="og:image" content="http://www.bizlounge.co.za/imgages/logo.png"> 
<meta property="og:url" content="http://www.bizlounge.co.za">
<meta property="og:site_name" content="Business Lounge">
<meta property="og:type" content="website">
<meta property="og:description" content="Business Lounge offers business opportunities to corporates, entrepreneurs and SME’s from South Africa. Covering tenders, trade leads, business listings, jobs and more prospects to grow your business.">
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/mainstyle.css">
<link rel="stylesheet" type="text/css" href="/css/fontawesome/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/responsive-nav.css">
<!--[if lt IE 9]>
<script src="/library/javascript/html5shiv.js"></script>
<script src="/library/javascript/respond.min.js"></script>
<![endif]-->
</head>
<body>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/menu.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<section class="container topbox">
    <div class="row no-gutter">
        <div class="col-xs-12 col-md-8">
            <div class="promobox equal">
                <div id="intabs">
                	<ul class="promotab">
                    	<li><a href="#tender" data-toggle="tab" class="active"><img src="/images/tender_btn.gif" alt="Tenders" /></a></li>
                    	<li><a href="#listings" data-toggle="tab"><img src="/images/list_btn.gif" alt="Business Listings" /></a></li>
                    	<li><a href="#jobs" data-toggle="tab"><img src="/images/jobs_btn.gif" alt="Jobs" /></a></li>
                    </ul>
                </div>
                <div class="promoads tab-content">
                	<div class="promoad1 pad tab-pane fade active" id="tender"><a href="#" class="btn btn-default btn-lg btn-place right">Signup Now</a></div>
                    <div class="promoad2 pad tab-pane fade" id="listings"><a href="#" class="btn btn-default btn-lg btn-place right">Signup Now</a></div>
                    <div class="promoad3 pad tab-pane fade" id="jobs"><a href="#" class="btn btn-default btn-lg btn-place right">Signup Now</a></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 hidden-xs">
            <div class="newssub equal">
                <h6>Newsletter Signup!</h6>
                <p class="hidden-md">Get the latest content first.</p>
                <form id="subform" class="bigform" role="form">
                    <input type="text" name="subname" class="form-control subname" value="Name" />
                    <input type="text" name="subemail" class="form-control subemail" value="Email" />
                    <input type="checkbox" name="subtender" id="subtender" class="css-checkbox" /><label for="subtender" class="checklabel">Tenders/Leads</label>&nbsp;
                    <input type="checkbox" name="sublist" id="sublist" class="css-checkbox" /><label for="sublist" class="checklabel">Business Listings</label>&nbsp;
                    <input type="checkbox" name="subjobs" id="subjobs" class="css-checkbox" /><label for="subjobs" class="checklabel">Jobs</label><br />
                    <input type="submit" name="subscribe" value="Subscribe Now" id="subscribe" class="btn subbtn" />
                </form>
            </div>
        </div>
    </div>
</section>
<section class="container">
	<div class="row">
    	<div class="col-xs-12 col-md-8 db-gutter-right">
        	<!-- /// TENDER BOX /// -->
			<div class="tenderboxe eachbox">
				<div class="titles htitle">
					<div class="mainsearch minisearch">
						<form action="" id="tensearch">
							<input type="text" name"tesearch" class="tesearch" value="Search" /><input type="submit" value="search" />
							<a href="#" class="rssicon">Tenders RSS Feed</a>
						</form>
					</div>
					<h1>Business Listings</h1>
				</div>
				<div class="catlist buslist cf">
                    <ul>
                        <li><span class="fa fa-folder-o"></span><a href="#">Advertising</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Agriculture</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Airconditioning, Refrigeration &amp; Cold Storage</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Beverages</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Building and construction</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Business services &amp; consultants</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Chemical petroleum &amp; coal products</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Communication &amp; communication equipment</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Courier services</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Development &amp; Research</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Education &amp; training</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Electrical or Gas Services &amp; Products</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Entertainment</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Export or Import</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Financial services</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Fishing</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Food</a></li>
                        <li><span class="fa fa-folder-o"></span><a href="#">Footwear &amp; Leather products</a></li>
                    </ul>
                </div>
			</div>
        </div>
        <div class="col-xs-12 col-md-4 no-gutter-left">
        	<!-- /// FEATURED LISTING BOX /// -->
			<div class="newsbox eachbox no-gutter-left">
				<div class="titles stitle">
					<h2>Featured Listings</h2>
				</div>
                <div class="blistcont">
					<a href="#">
                    	<div class="bfeatbox">
							<img src="/images/feat_bus_logo.gif" alt="Company Logo" />
							<p>Willow-Neticca</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at neque ac mauris volutpat dignissim eu id mi. Aenean semper at neque ac mauris volutpat...</p>
						</div>
                    </a>
				</div><br />
                <div class="titles stitle">
					<h2>Latest Listings</h2>
				</div>
                <div class="blistcont">
					<dl class="blist cf">
						<img src="/images/bus_img.png" alt="Company name" />
						<dt><a href="#">Company Name Pty(Ltd)</a></dt>
						<dd class="introtxt">Proin ac placerat turpis. Nullam sodales orci eget nisl lobortis, nec at neque ac mauris volutpat...</dd>
					</dl>
					<dl class="blist cf">
						<img src="/images/bus_img.png" alt="Company name" />
						<dt><a href="#">Company Name Pty(Ltd)</a></dt>
						<dd class="introtxt">Proin ac placerat turpis. Nullam sodales orci eget nisl lobortis, nec at neque ac mauris volutpat...</dd>
					</dl>
					<dl class="blist cf">
						<img src="/images/bus_img.png" alt="Company name" />
						<dt><a href="#">Company Name Pty(Ltd)</a></dt>
						<dd class="introtxt">Proin ac placerat turpis. Nullam sodales orci eget nisl lobortis, nec at neque ac mauris volutpat...</dd>
					</dl>
					<dl class="blist cf">
						<img src="/images/bus_img.png" alt="Company name" />
						<dt><a href="#">Company Name Pty(Ltd)</a></dt>
						<dd class="introtxt">Proin ac placerat turpis. Nullam sodales orci eget nisl lobortis, nec at neque ac mauris volutpat...</dd>
					</dl>
				</div>
			</div>
            <!-- /// ADVERT BOX /// -->
			<div class="adbox eachbox visible-md visible-lg">
            	<a href="#"><img src="/images/listing_ad.gif" alt="Advert" /></a><br /><br />
                <a href="#"><img src="/images/willow_ad.jpg" alt="Willow-Nettica" /></a>
			</div>
        </div>	
    </div>
</section>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php echo '
<script>
	var navigation = responsiveNav(".mainnav");
	
  	$(function () {
    	$(\'#intabs a:first\').tab(\'show\')
  })
// Tab-Pane change function
var tabChange = function(){
    var tabs = $(\'#intabs ul > li\');
    var active = tabs.filter(\'.active\');
    var next = active.next(\'li\').length? active.next(\'li\').find(\'a\') : tabs.filter(\':first-child\').find(\'a\');
    // Use the Bootsrap tab show method
    next.tab(\'show\')
}
// Tab Cycle function
var tabCycle = setInterval(tabChange, 5000)
// Tab click event handler
$(this).find(\'#intabs a\').click(function(e) {
    e.preventDefault();
    // Stop the cycle
    clearInterval(tabCycle);
    // Show the clicked tabs associated tab-pane
    $(this).tab(\'show\')
    // Start the cycle again in a predefined amount of time
    setTimeout(function(){
        tabCycle = setInterval(tabChange, 25000);
    }, 25000);
});
$(\'.iconbox span\').tooltip();
</script>
'; ?>

</body>
</html>