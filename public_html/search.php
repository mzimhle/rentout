<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Rent Out</title>
<meta name="description" content="">
<meta name="msapplication-tap-highlight" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/css/bootstrap.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/mainstyles.css">
<link rel="stylesheet" href="/css/responsive.css">
<link rel="stylesheet" href="/css/jquery-ui.css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<div class="col-sm-12 col-md-12">
		<div class="form-group form-group-icon-left"><i class="fa fa-automobile input-icon input-icon-hightlight"></i>
			<label>Vehicle Model <i class="red-txt">*</i></label>
			<input class="form-control" type="text" id="model_name" name="model_name" required data-msg="Please enter your vehicle model" />
			<input type="hidden" id="model_code" name="model_code" />
		</div>
	</div>
</body>
<script src="/library/javascript/jquery-1.11.2.min.js"></script>
<script src="/library/javascript/jquery-ui.js"></script>
<script src="/library/javascript/bootstrap.min.js"></script>
<script src="/library/javascript/countdown.min.js"></script>
<script src="/library/javascript/jFormslider.js"></script>
<script src="/library/javascript/forms.js"></script>

<script>
	$(window).load(function() {
	$( "#model_name" ).autocomplete({
		source: "/feeds/model.php",
		minLength: 3,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#model_name').html('');
				$('#model_code').val('');					
			} else {
				$('#model_name').html('<b>' + ui.item.value + '</b>');
				$('#model_code').val(ui.item.id);	
			}
			$('#model_name').val('');										
		}
	});
});
</script>

</body>
<html>