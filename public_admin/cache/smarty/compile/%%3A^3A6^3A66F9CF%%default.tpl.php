<?php /* Smarty version 2.6.20, created on 2015-01-04 22:36:13
         compiled from default.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>
 
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  <div class="inner">  
		<h2>The Maverick Content Management System</h2>
		<div class="section">
			<a href="/participant/" title="Manage Participants"><img src="/images/projects.gif" alt="Manage Participants" height="50" width="50" /></a>
			<a href="/participant/" title="Manage Participants" class="title">Manage Participants</a>
		</div>
		<div class="section mrg_left_50">
		<a href="/car/" title="Manage Cars"><img src="/images/projects.gif" alt="Manage Cars" height="50" width="50" /></a>
		<a href="/car/" title="Manage Cars" class="title">Manage Cars</a>
		</div>		
		<div class="section mrg_left_50">
		<a href="/brand/" title="Manage Car Brands"><img src="/images/projects.gif" alt="Manage Car Brands" height="50" width="50" /></a>
		<a href="/brand/" title="Manage Car Brands" class="title">Manage Car Brands</a>
		</div>
		<div class="clearer"><!-- --></div>
		<div class="section">
			<a href="/group/" title="Manage Rental Groups"><img src="/images/projects.gif" alt="Manage Rental Groups" height="50" width="50" /></a>
			<a href="/group/" title="Manage Rental Groups" class="title">Manage Rental Groups</a>
		</div> 
		<div class="section mrg_left_50">
		<a href="/booking/" title="Manage Bookings"><img src="/images/projects.gif" alt="Manage Bookings" height="50" width="50" /></a>
		<a href="/booking/" title="Manage Bookings" class="title">Manage Bookings</a>
		</div>		
		<div class="section mrg_left_50">
		<a href="/communication/" title="Manage Communication"><img src="/images/projects.gif" alt="Manage Communication" height="50" width="50" /></a>
		<a href="/communication/" title="Manage Communication" class="title">Manage Communication</a>
		</div>
		<div class="clearer"><!-- --></div>		
    </div><!--inner-->
  </div><!-- End Content Section -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
</body>
</html>