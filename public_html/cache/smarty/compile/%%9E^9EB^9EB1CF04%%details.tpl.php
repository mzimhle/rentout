<?php /* Smarty version 2.6.20, created on 2015-02-11 22:08:28
         compiled from group/price/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'group/price/details.tpl', 39, false),)), $this); ?>
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
    <!-- Start Content recruiter -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/price/" title="Prices">Prices</a></li>
			<li><a href="/group/price/" title="Members">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['priceData'] )): ?>Edit Price<?php else: ?>Add a Price<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['priceData'] )): ?>Edit Price<?php else: ?>Add a Price<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/group/price/details.php<?php if (isset ( $this->_tpl_vars['priceData'] )): ?>?code=<?php echo $this->_tpl_vars['priceData']['price_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Group:</h4><br />
				<select id="group_code" name="group_code">
					<option value=""> ----- </option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['grouppairs'],'selected' => $this->_tpl_vars['priceData']['group_code']), $this);?>

				</select>
				<?php if (isset ( $this->_tpl_vars['errorArray']['group_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['group_code']; ?>
</span><?php else: ?><br />Select group to set its price.<?php endif; ?>
			</td>				
          </tr>
			<td>
				<h4 class="error">Price per day:</h4><br />
				<input type="text" name="price_cost" id="price_name" value="<?php echo $this->_tpl_vars['priceData']['price_cost']; ?>
" size="50" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['price_cost'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['price_cost']; ?>
</span><?php else: ?><br />Add price to the group, only in Rands and no Cents<?php endif; ?>
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
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

 </div><!-- End Content recruiter -->
<?php echo '
<script type="text/javascript" language="javascript">
function submitForm() {
	document.forms.detailsForm.submit();					 
}
</script>
'; ?>

<!-- End Main Container -->
</body>
</html>