<?php /* Smarty version 2.6.20, created on 2014-09-09 17:05:53
         compiled from administration/tenders/view/document.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'administration/tenders/view/document.tpl', 61, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | Edit Tender Documents</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" language="javascript" src="default.js"></script>
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
			<li><a href="/administration/tenders/" title="Tenders">Tenders</a></li>
			<li><a href="/administration/tenders/view/" title="Tenders">View Tenders</a></li>
			<li><?php echo $this->_tpl_vars['tenderData']['tender_name']; ?>
 Documents</li>
        </ul>
	</div><!--breadcrumb--> 
  
	<div class="inner"> 
      <h2>Add/Edit Documents</h2>
    <div id="sidetabs">
        <ul > 
            <li><a href="/administration/tenders/view/details.php?code=<?php echo $this->_tpl_vars['tenderData']['tender_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Details">Documents</a></li>
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/administration/tenders/view/document.php?code=<?php echo $this->_tpl_vars['tenderData']['tender_code']; ?>
" method="post"  enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form"> 
          <tr>
            <td class="left_col" <?php if (isset ( $this->_tpl_vars['errorArray']['tenderdocument_name'] )): ?>style="color: red"<?php endif; ?>><h4>Name:</h4></td>
			<td><input type="text" name="tenderdocument_name" id="tenderdocument_name" value="" size="60" /></td>	
          </tr>	
          <tr>
            <td class="left_col" <?php if (isset ( $this->_tpl_vars['errorArray']['documentfile'] )): ?>style="color: red"<?php endif; ?>><h4>Upload:</h4></td>
			<td><input type="file" id="documentfile" name="documentfile" /></td>	
          </tr>
			<tr>
			<td colspan="2">
				<table id="dataTable" border="0" cellspacing="0" cellpadding="0" width="100%">
					<thead>
				  <tr>
					<th>Added</th>
					<th>Name</th>		
					<th></th>	
					<th></th>	
					<th></th>	
				   </tr>
				   </thead>
				   <tbody>
					  <?php $_from = $this->_tpl_vars['documentData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
					  <tr>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['tenderdocument_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
						<td align="left">
						<input type="text" name="name_<?php echo $this->_tpl_vars['item']['tenderdocument_code']; ?>
" id="name_<?php echo $this->_tpl_vars['item']['tenderdocument_code']; ?>
" size="40" value="<?php echo $this->_tpl_vars['item']['tenderdocument_name']; ?>
" />	
						</td>						
						<td>
							<a href="<?php echo $this->_tpl_vars['item']['tenderdocument_path']; ?>
" target="_blank">Download</a>
						</td>
						<td align="left" class="alt">
							<button onclick="updateForm('<?php echo $this->_tpl_vars['item']['tenderdocument_code']; ?>
');  return false;">Update</button>
						</td>						
						<td align="left" class="alt">
							<button onclick="deleteForm('<?php echo $this->_tpl_vars['item']['tenderdocument_code']; ?>
'); return false;">Delete</button>	
						</td>
					  </tr>
					  <?php endforeach; endif; unset($_from); ?>     
				  </tbody>
				</table>
			</td>				
			</tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/administration/tenders/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'administration/includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript" language="javascript">
function submitForm() {
	document.forms.detailsForm.submit();					 
}
function updateForm(id) {					
	if(confirm(\'Are you sure you want to update this item ?\')) {
		$.ajax({ 
				type: "GET",
				url: "document.php",
				data: "code='; ?>
<?php echo $this->_tpl_vars['tenderData']['tender_code']; ?>
<?php echo '&code_update="+id+"&name="+$(\'#name_\'+id).val(),
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Updated\');
							window.location.href = window.location.href;
						} else {
							alert(data.error);
						}
				}
		});							
	}
	return false;
}	

function deleteForm(id) {	
	if(confirm(\'Are you sure you want to delete this item?\')) {

			$.ajax({ 
					type: "GET",
					url: "document.php",
					data: "code='; ?>
<?php echo $this->_tpl_vars['tenderData']['tender_code']; ?>
<?php echo '&code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert(\'Deleted\');
								window.location.href = window.location.href;
							} else {
								alert(data.error);
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