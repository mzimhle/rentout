<?php /* Smarty version 2.6.20, created on 2014-11-16 11:17:09
         compiled from administration/event/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Maverick</title>
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
			<li><a href="/administration/event/" title="Events">Events</a></li>
			<li><?php if (isset ( $this->_tpl_vars['eventData'] )): ?>Edit Event<?php else: ?>Add a Event<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['eventData'] )): ?>Edit Event<?php else: ?>Add a Event<?php endif; ?></h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['eventData'] )): ?>/administration/event/artists.php?code=<?php echo $this->_tpl_vars['eventData']['event_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Artists">Artists</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['eventData'] )): ?>/administration/event/comm.php?code=<?php echo $this->_tpl_vars['eventData']['event_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Invite">Invite</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/event/details.php<?php if (isset ( $this->_tpl_vars['eventData'] )): ?>?code=<?php echo $this->_tpl_vars['eventData']['event_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">	
			<tr>
				<td colspan="2">
					<h4 class="error">Name</h4><br />
					<input type="text" name="event_name" id="event_name" value="<?php echo $this->_tpl_vars['eventData']['event_name']; ?>
" size="80"/>
					<?php if (isset ( $this->_tpl_vars['errorArray']['event_name'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['event_name']; ?>
<em><?php else: ?><br /><em>Event name</em><?php endif; ?>
			</td>	
          </tr>
			<tr>
				<td valign="top">
					<h4 class="error">Start Date and Time</h4><br />
					<input type="text" name="event_startdate" id="event_startdate" value="<?php echo $this->_tpl_vars['eventData']['event_startdate']; ?>
" size="30" readonly />
					<?php if (isset ( $this->_tpl_vars['errorArray']['event_startdate'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['event_startdate']; ?>
<em><?php else: ?><br /><em>Start date and time of event</em><?php endif; ?>
				</td>	
				<td valign="top">
					<h4 class="error">Address</h4><br />
					<textarea name="event_address" id="event_address" rows="3" cols="40" ><?php echo $this->_tpl_vars['eventData']['event_address']; ?>
</textarea>
					<?php if (isset ( $this->_tpl_vars['errorArray']['event_address'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['event_address']; ?>
<em><?php else: ?><br /><em>Physical address of the event</em><?php endif; ?>
				</td>				
          </tr>		  
          <tr>            
			<td colspan="2">
				<h4 class="error">Description:</h4><br />
				<textarea name="event_description" id="event_description" rows="3" cols="80" ><?php echo $this->_tpl_vars['eventData']['event_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['company_description'] )): ?><br /><em id="charcount" class="error"><?php echo $this->_tpl_vars['errorArray']['company_description']; ?>
<em><?php else: ?><br /><em id="charcount" class="error">0 characters entered.</em><?php endif; ?>				
			</td>	
          </tr>
          <tr>            
			<td colspan="2">
				<h4 class="error">Event Page:</h4><br />
				<textarea name="event_page" id="event_page" rows="40" cols="130" ><?php echo $this->_tpl_vars['eventData']['event_page']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['event_page'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['event_page']; ?>
<em><?php else: ?><br /><em>Page details of the event</em><?php endif; ?>
			</td>	
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/event/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'event_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$("#event_description").keyup(function () {
		var i = $("#event_description").val().length;
		$("#charcount").html(i+\' characters entered.\');
		if (i > 255) {
			$(\'#charcount\').removeClass(\'success\');
			$(\'#charcount\').addClass(\'error\');
		} else if(i == 0) {
			$(\'#charcount\').removeClass(\'success\');
			$(\'#charcount\').addClass(\'error\');
		} else {
			$(\'#charcount\').removeClass(\'error\');
			$(\'#charcount\').addClass(\'success\');
		} 
	});
	
	$( "#event_startdate" ).datetimepicker({
		changeMonth: true,
		changeYeah: true,
		numberOfMonths: 1,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#event_enddate" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#event_enddate" ).datetimepicker({
		changeMonth: true,
		changeYeah: true,
		numberOfMonths: 1,
		dateFormat: \'yy-mm-dd\',
		onClose: function( selectedDate ) {
			$( "#event_startdate" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	$(document).ready(function() {			
		new nicEditor({
			iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
			buttonList 	: [\'bold\',\'italic\',\'underline\',\'left\',\'center\', \'ol\', \'ul\', \'xhtml\', \'fontFormat\', \'fontFamily\', \'fontSize\', \'unlink\', \'link\', \'strikethrough\', \'superscript\', \'subscript\', \'upload\'],
			maxHeight 	: \'1000\',
			uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
		}).panelInstance(\'event_page\');				
	});
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>