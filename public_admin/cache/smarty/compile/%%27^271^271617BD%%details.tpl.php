<?php /* Smarty version 2.6.20, created on 2014-11-16 11:15:39
         compiled from administration/participants/artists/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maverick</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/administration/" title="Home">Home</a></li>
			<li><a href="/administration/participants/" title="Participants">Participants</a></li>
			<li><a href="/administration/participants/artists/" title="Artists">Artists</a></li>
			<li><?php if (isset ( $this->_tpl_vars['artistData'] )): ?>Edit an artist<?php else: ?>Add an artist<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['artistData'] )): ?>Edit an artist<?php else: ?>Add an artist<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['artistData'] )): ?>/administration/participants/artists/songs.php?code=<?php echo $this->_tpl_vars['artistData']['artist_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Login">Songs</a></li>	
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/participants/artists/details.php<?php if (isset ( $this->_tpl_vars['artistData'] )): ?>?code=<?php echo $this->_tpl_vars['artistData']['artist_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br /><input type="text" name="artist_name" id="artist_name" value="<?php echo $this->_tpl_vars['artistData']['artist_name']; ?>
" size="64" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['artist_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['artist_name']; ?>
</span><?php endif; ?>
			</td>	
			<td>
				<h4 class="error">Email:</h4><br />
				<input type="text" name="artist_email" id="artist_email" value="<?php echo $this->_tpl_vars['artistData']['artist_email']; ?>
" size="30" <?php if (isset ( $this->_tpl_vars['artistData']['artist_email'] )): ?>readonly<?php endif; ?> />
				<?php if (isset ( $this->_tpl_vars['errorArray']['artist_email'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['artist_email']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<h4>Cellphone:</h4><br /><input type="text" name="artist_cellphone" id="artist_cellphone" value="<?php echo $this->_tpl_vars['artistData']['artist_cellphone']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['artist_cellphone'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['artist_cellphone']; ?>
</span><?php endif; ?>
			</td>				
          </tr>
          <tr>
			<td >
				<h4 class="error">Description:</h4><br />
				<textarea cols="60" rows="3" id="artist_description" name="artist_description"><?php echo $this->_tpl_vars['artistData']['artist_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['artist_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['artist_description']; ?>
</span><?php endif; ?>
			</td>		  
			<td colspan="2" valign="top">
				<h4>Area - Where the artist is from (In South Africa):</h4><br />
				<input type="text" name="areapost_name" id="areapost_name" value="<?php if ($this->_tpl_vars['artistData']['areapost_code'] != ''): ?><?php echo $this->_tpl_vars['artistData']['areapost_suburb']; ?>
, <?php echo $this->_tpl_vars['artistData']['areapost_city']; ?>
, <?php echo $this->_tpl_vars['artistData']['areapost_box']; ?>
<?php endif; ?>" size="70" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['artistData']['areapost_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['areapost_code']; ?>
</span><?php endif; ?>
			</td>		
		  </tr>	
		  <tr>
			<td>
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['imagelogo'] )): ?>class="error"<?php endif; ?>>Upload Profile Pic:</h4><br />
				<input type="file" id="imagelogo" name="imagelogo" /><br />			
				<br /><?php if (isset ( $this->_tpl_vars['errorArray']['imagelogo'] )): ?><em class="error"><?php echo $this->_tpl_vars['errorArray']['imagelogo']; ?>
<em><?php else: ?><em>jpg, jpeg, png images only</em><?php endif; ?>		
			</td>
			<td colspan="2">
				<?php if (isset ( $this->_tpl_vars['artistData']['artist_image_name'] ) && trim ( $this->_tpl_vars['artistData']['artist_image_name'] ) != ''): ?>
					<br /><img src="<?php echo $this->_tpl_vars['artistData']['artist_image_path']; ?>
tmb_<?php echo $this->_tpl_vars['artistData']['artist_image_name']; ?>
<?php echo $this->_tpl_vars['artistData']['artist_image_ext']; ?>
" />
				<?php else: ?>
					<img src="/images/no-logo.jpg" />
				<?php endif; ?>				
			</td>
		  </tr>
          <tr>		
			</tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/participants/artists/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content -->
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

 </div><!-- End Content -->

</div>
<?php echo '
<script type="text/javascript" language="javascript">

function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$( "#areapost_name" ).autocomplete({
		source: "/feeds/area.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#areapost_name\').html(\'\');
				$(\'#areapost_code\').val(\'\');					
			} else {
				$(\'#areapost_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#areapost_code\').val(ui.item.id);	
			}
			$(\'#areapost_name\').val(\'\');										
		}
	});
	
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>