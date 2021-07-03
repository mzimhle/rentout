<?php /* Smarty version 2.6.20, created on 2014-11-16 10:11:30
         compiled from administration/participants/artists/songs.tpl */ ?>
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
			<li><a href="/administration/participants/artists/details.php?code=<?php echo $this->_tpl_vars['artistData']['artist_code']; ?>
" title="Jobs"><?php echo $this->_tpl_vars['artistData']['artist_name']; ?>
</a></li>
			<li>Songs</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner">
		  <div class="clearer"><!-- --></div>
		  <br /><h2>Manage Songs</h2><br />
    <div id="sidetabs">
        <ul > 
            <li><a href="/administration/participants/artists/details.php?code=<?php echo $this->_tpl_vars['artistData']['artist_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Songs">Songs</a></li>			
        </ul>
    </div><!--tabs-->		  
		  <div class="detail_box">  
		  <form name="songForm" id="songForm" action="/administration/participants/artists/songs.php?code=<?php echo $this->_tpl_vars['artistData']['artist_code']; ?>
" method="post">
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="innertable"> 				  
			  <thead>
			  <tr>				
				<th valign="top">Artist</th>
				<th valign="top">Name</th>
				<th valign="top">Link</th>			
				<th valign="top"></th>	
			  </tr>
			  </thead>
			  <?php $_from = $this->_tpl_vars['songData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td valign="top"><?php echo $this->_tpl_vars['item']['artist_name']; ?>
</td>		
				<td valign="top"><?php echo $this->_tpl_vars['item']['song_name']; ?>
</td>	
				<td valign="top"><?php echo $this->_tpl_vars['item']['song_url']; ?>
</td>			
				<td valign="top"><button type="button" onclick="deleteitem('<?php echo $this->_tpl_vars['item']['song_code']; ?>
'); return false;">Delete</button></td>	
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>	
			  <tr>
				<td valign="top"><?php echo $this->_tpl_vars['artistData']['artist_name']; ?>
</td>		
				<td valign="top"><input type="text" id="song_name" name="song_name" size="30" /></td>	
				<td valign="top"><input type="text" id="song_url" name="song_url" size="60" /></td>			
				<td valign="top"><button type="button" onclick="submitForm(); return false;">Add</button></td>			
			  </tr>			  
			</table>
			<br />
			<?php if (isset ( $this->_tpl_vars['errorArray']['error'] )): ?><span style="color: red; font-weight: bold;"><?php echo $this->_tpl_vars['errorArray']['error']; ?>
</span><?php endif; ?>
			</form>
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
<script type="text/javascript">
function submitForm() {
	document.forms.songForm.submit();					 
}


function deleteitem(code) {
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({
				type: "GET",
				url: "songs.php?code='; ?>
<?php echo $this->_tpl_vars['artistData']['artist_code']; ?>
<?php echo '",
				data: "deletecode="+code,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Deleted\');
							window.location.href = \'/administration/participants/artists/songs.php?code='; ?>
<?php echo $this->_tpl_vars['artistData']['artist_code']; ?>
<?php echo '\';
						} else {
							alert(data.message);
						}
				}
		});		
	}
	return false;	
}			
</script>
'; ?>
	
<!-- End Main Container -->
</body>
</html>