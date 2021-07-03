<?php /* Smarty version 2.6.20, created on 2014-09-14 13:46:23
         compiled from jobs/details.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Business Lounge - Company Name Here</title>
<meta name="keywords" content="business, tenders, business listings, entrepreneurs, jobs">
<meta name="description" content="Business Lounge offers business opportunities to corporates, entrepreneurs and SME’s from South Africa. Covering tenders, trade leads, business listings, jobs and more prospects to grow your business...">          
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="21 days">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="og:title" content="Business Lounge"> 
<meta property="og:image" content="http://www.bizlounge.co.za/images/logo.png"> 
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

<section class="container">
	<div class="row">
    	<div class="col-xs-12 col-md-8 db-gutter-right">
        	<!-- /// LISTINGS BOX /// -->
			<div class="tenderboxe eachbox">
				<div class="titles htitle">
					<h1>Web Developer</h1>
				</div>
                <!-- //// FOR FREE BUSINESS LISTINGS ONLY START /// -->
                <!--<div class="fbislogo">
                        <img src="http://placehold.it/250x250/ccc" alt="Company Name Here" />
                </div>-->
                <!-- //// FOR FREE BUSINESS LISTINGS ONLY END /// -->
                <div class="biscopy">
        			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus egestas eleifend turpis, id ultricies diam sollicitudin eget. Ut molestie quis lectus et aliquam. Phasellus luctus feugiat porta. Morbi ac risus ante. Sed non augue sed justo lobortis pretium. Nullam tempor ultricies nisi, sed porta augue rhoncus in. Vestibulum mattis augue vitae quam varius commodo. Nulla et sagittis leo. Aliquam tincidunt id metus in cursus. Vestibulum id fringilla erat, eget rutrum eros. Nullam eget vehicula sem. Maecenas non augue id quam lacinia accumsan. Sed dapibus tempor ante ut fringilla. Proin nibh mauris, vulputate non pharetra vitae, ornare eget est. Donec pellentesque diam non tortor ullamcorper semper.</p>
        			<p>Vestibulum auctor ac libero eu cursus. Aliquam hendrerit leo ac dui gravida, sed aliquam nunc venenatis. Etiam eleifend convallis nisi, ac adipiscing est laoreet vel. Integer luctus pretium tempor. Etiam id porta mauris. Maecenas diam magna, volutpat quis tincidunt at, ullamcorper in nisi. Pellentesque a erat pretium, tristique leo et, varius ligula. Quisque semper urna a augue mollis, quis ultrices nulla dictum. Curabitur bibendum arcu ac pharetra egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				    <p class="bissubhead">Company Misson</p><!-- //// FOR FEATURED BUSINESS LISTINGS ONLY /// -->
				    <p>Vestibulum auctor ac libero eu cursus. Aliquam hendrerit leo ac dui gravida, sed aliquam nunc venenatis. Etiam eleifend convallis nisi, ac adipiscing est laoreet vel. Integer luctus pretium tempor.</p>
                    <p class="bissubhead">Company Services</p><!-- //// FOR FEATURED BUSINESS LISTINGS ONLY /// -->
                    <ul class="bisservlist">
                        <li><span class="fa fa-tag"></span>Vestibulum auctor ac libero eu cursus.</li>
                        <li><span class="fa fa-tag"></span>Aliquam hendrerit leo ac dui gravida, sed aliquam nunc venenatis.</li>
                        <li><span class="fa fa-tag"></span>Etiam eleifend convallis nisi, ac adipiscing est laoreet vel.</li>
                        <li><span class="fa fa-tag"></span>sed aliquam nunc venenatis</li>
                        <li><span class="fa fa-tag"></span>sed aliquam nunc venenatis</li>
                    </ul>
                    <p class="bissubhead">Company Map</p><!-- //// FOR FEATURED BUSINESS LISTINGS ONLY /// -->
                    <!-- //// GOOGLE MAPS FOR COMPANY /// -->
                    <div class="bismap eachbox">
                        <img src="http://placehold.it/745x250/17628c" alt="Google Map" />
                    </div><br />
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 no-gutter-left">
            <!-- /// ENQUIRY BOX /// -->
            <div class="newsbox eachbox no-gutter-left">
                <div class="titles stitle">
                    <h2>Send Application</h2>
                </div>
                <div class="bigform bisform">
					<?php if (isset ( $this->_tpl_vars['success'] )): ?>
						<p><b>Your enquiry has been successfully sent</b></p>
						<p>You will receive an email confirmation for it as well as your reference code for this enquiry</p>
					<?php else: ?>				
                    <form id="bismsg" name="bismsg" role="form" method="POST" action="/jobs/details.php" enctype="multipart/form-data">
                       <label>Full Name:</label>
                       <input type="text" name="enquiry_name" id="enquiry_name" class="form-control" value="Full Name" />
                       <label>Your Email:</label>
                       <input type="text" name="enquiry_email" id="enquiry_email" class="form-control" value="Email Address" />			   
                       <label>Your Enquiry:</label>
                       <textarea cols="5" name="enquiry_message" id="enquiry_message" class="form-control"></textarea>
                       <label>Your CV:</label>
                       <input type="file" name="cvdocument" id="cvdocument" /><br />		   
                       <button class="btn" onclick="submitApplicationForm();">Send Application</button>
					   <?php if (isset ( $this->_tpl_vars['errorArray'] )): ?><br /><?php echo $this->_tpl_vars['errorArray']; ?>
<?php endif; ?>
                    </form>
					<?php endif; ?>
                </div>
            </div>          
            <!-- /// ADVERT BOX /// -->
			<div class="adbox eachbox visible-md visible-lg">
            	<a href="#"><img src="/images/listing_ad.gif" alt="Advert" /></a>
			</div>
        </div>	
    </div>
</section>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" src="/library/javascript/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/library/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="/library/javascript/jquery.validate.js"></script>
<script type="text/javascript" src="default.js"></script>
<script type="text/javascript" src="/library/javascript/equal.js"></script>
<script type="text/javascript" src="/library/javascript/responsive-nav.min.js"></script>
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

<?php echo '
<script type="text/javascript">
function submitApplicationForm() {
	document.forms.bismsg.submit();
}
</script>
'; ?>

</body>
</html>