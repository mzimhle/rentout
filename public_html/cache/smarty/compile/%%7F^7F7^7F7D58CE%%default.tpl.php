<?php /* Smarty version 2.6.20, created on 2015-02-13 13:32:07
         compiled from brand/default.tpl */ ?>
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
		<h2>Manage Brands</h2>
		<div class="section">
			<a href="/brand/view/" title="Manage Brand"><img src="/images/users.gif" alt="Manage Brand" height="50" width="50" /></a>
			<a href="/brand/view/" title="Manage Brand" class="title">Manage Brand</a>
		</div>
		<div class="section mrg_left_50">
		<a href="/brand/make/" title="Manage Make"><img src="/images/projects.gif" alt="Manage Make" height="50" width="50" /></a>
		<a href="/brand/make/" title="Manage Make" class="title">Manage Make</a>
		</div>
		<div class="section mrg_left_50">
		<a href="/brand/model/" title="Manage Model"><img src="/images/projects.gif" alt="Manage Model" height="50" width="50" /></a>
		<a href="/brand/model/" title="Manage Model" class="title">Manage Model</a>
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