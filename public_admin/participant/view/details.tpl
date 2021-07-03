<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentOut</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
    {include_php file='includes/header.php'}
  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/participant/" title="Participants">Participants</a></li>
			<li><a href="/participant/view/" title="View">View</a></li>
			<li>{if isset($participantData)}{$participantData.participant_name} {$participantData.participant_surname}{else}Details{/if}</li>
        </ul>
	</div><!--breadcrumb-->
	<div class="inner"> 
      <h2>{if isset($participantData)}Edit Participant{else}Add a Participant{/if}</h2>
    <div id="sidetabs">
        <ul > 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($participantData)}/participant/view/login.php?code={$participantData.participant_code}{else}#{/if}" title="Login">Login</a></li>	
        </ul>
    </div><!--tabs-->

	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/participant/view/details.php{if isset($participantData)}?code={$participantData.participant_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br /><input type="text" name="participant_name" id="participant_name" value="{$participantData.participant_name}" size="30" />
				<br />{if isset($errorArray.participant_name)}<span class="error">{$errorArray.participant_name}</span>{else}<em>Participant name(s)</em>{/if}
			</td>	
			<td><h4 class="error">Surname:</h4><br />
				<input type="text" name="participant_surname" id="participant_surname" value="{$participantData.participant_surname}" size="30" />
				<br />{if isset($errorArray.participant_surname)}<span class="error">{$errorArray.participant_surname}</span>{else}<em>Participant surname</em>{/if}
			</td>
				<td>
					<h4 class="error">Email:</h4><br />
					<input type="text" name="participant_email" id="participant_email" value="{$participantData.participant_email}" size="30" {if isset($participantData.participant_email)}readonly{/if} />
					<br />{if isset($errorArray.participant_email)}<span class="error">{$errorArray.participant_email}</span>{else}<em>Participant email address</em>{/if}
				</td>				
          </tr>
			<tr>		
				<td>
					<h4 class="error">Cellphone:</h4><br />
					<input type="text" name="participant_cellphone" id="participant_cellphone" value="{$participantData.participant_cellphone}" size="30" />
					<br />{if isset($errorArray.participant_cellphone)}<span class="error">{$errorArray.participant_cellphone}</span>{else}<em>Participant cellphone, e.g. 0735841258</em>{/if}
				</td>
				<td colspan="2">
					<h4 class="error">Area:</h4><br />
					<input type="text" name="areapost_name" id="areapost_name" value="{$participantData.areapost_name}" size="83" />
					<input type="hidden" name="areapost_code" id="areapost_code" value="{$participantData.areapost_code}" />
					<br />{if isset($errorArray.areapost_code)}<span class="error">{$errorArray.areapost_code}</span>{else}<em>Select from drop down, participant's location</em>{/if}
				</td>			
			</tr>
			<tr>
				<td>
					<h4 class="error">ID number:</h4><br />
					<input type="text" name="participant_idnumber" id="participant_idnumber" value="{$participantData.participant_idnumber}" size="30" {if isset($participantData.participant_idnumber)}readonly{/if} />
					<br />{if isset($errorArray.participant_idnumber)}<span class="error">{$errorArray.participant_idnumber}</span>{else}<em>Participant South African ID number - if South African</em>{/if}
				</td>			
				<td colspan="2">
					<h4>Passport:</h4><br />
					<input type="text" name="participant_passport" id="participant_cellphone" value="{$participantData.participant_passport}" size="30" />
					<br />{if isset($errorArray.participant_passport)}<span class="error">{$errorArray.participant_passport}</span>{else}<em>Participant passport number of foreign</em>{/if}
				</td>			
			</tr>
          <tr>            
			<td>
				<h4 {if isset($errorArray.profilelogo)}class="error"{/if}>Upload Image:</h4><br />
				<input type="file" id="profilelogo" name="profilelogo" />
			</td>
			<td colspan="2">
				<h4 {if isset($errorArray.profilelogo)}class="error"{/if}>Upload Image:</h4><br />
					<br />
				{if $participantData.participant_image_path neq ''}<img src="http://www.rentout.co.za{$participantData.participant_image_path}tny_{$participantData.participant_image_name}{$participantData.participant_image_ext}" />{else}<img src="http://www.rentout.co.za/images/no-image.jpg" />{/if}
				<br /><br />{if isset($errorArray.profilelogo)}<span class="error">{$errorArray.profilelogo}<span>{else}<br /><em>jpg, jpeg, png images only</em>{/if}		
			</td>			
          </tr>			
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/participant/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content -->
{include_php file='includes/footer.php'}
 </div><!-- End Content -->

</div>
{literal}
<script type="text/javascript" language="javascript">

function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	
	$( "#areapost_name" ).autocomplete({
		source: "/feeds/area.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#areapost_name').html('');
				$('#areapost_code').val('');					
			} else {
				$('#areapost_name').html('<b>' + ui.item.value + '</b>');
				$('#areapost_code').val(ui.item.id);	
			}
			$('#areapost_name').val('');										
		}
	});
	
});

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
