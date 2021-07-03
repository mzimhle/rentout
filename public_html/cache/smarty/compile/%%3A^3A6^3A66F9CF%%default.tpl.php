<?php /* Smarty version 2.6.20, created on 2015-07-19 17:24:46
         compiled from default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'default.tpl', 121, false),)), $this); ?>
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
    <div class="main-back">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo-box">
                        <img src="/images/main-logo.png" width="180" height="110" alt="Rent Out" />
                        <div class="hr">&nbsp;</div>
                    </div>
                    <div class="count-box">
                        <div class="row">
                            <h6 class="cont-head text-center">Launch in</h6>
                            <div class="col-sm-12">
                                <div class="count-box clearfix" id="edate"></div>
                            </div>
                        </div>
                    </div>
                    <div class="hr">&nbsp;</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-2"></div>
                <div class="col-sm-8 col-md-8">
                    <div class="">
                        <div role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <!-- <li role="presentation" class="active"><a href="#reg" aria-controls="reg" role="tab" data-toggle="tab">Register</a></li> -->
                                <!-- <li role="presentation"><a href="#log" aria-controls="log" role="tab" data-toggle="tab">Login</a></li> -->
                            </ul>
                            <div class="tab-content main-box">
                                <div role="tabpanel" class="tab-pane active" id="reg">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1><span>Register</span> &amp; signup your car for rental</h1>
                                            <p>Register with us and list your car to rent it out. When the website is up and running, you will be able to make money on people who rent your car. Register below. You will be sent an email to confirm after registration, the log in details are for when the website is up and running.</p>
											<?php if (isset ( $this->_tpl_vars['errorArray'] )): ?>
											<h4 class="error">Form errors:</h4>
											<p class="error"><?php echo $this->_tpl_vars['errorArray']; ?>
</p>
											<?php endif; ?>
                                            <hr />
                                            <form id="owner-form" action="/" method="post" enctype="multipart/form-data">
                                                <div id="slider" class="form">
                                                    <ul>
				                                        <li data-id="slider_start">
                                                            <h2 class="sub-head">User/owner details</h2>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-hightlight"></i>
                                                                        <label>Name(s) <i class="red-txt">*</i></label>
                                                                        <input class="form-control" type="text" name="participant_name" id="participant_name" required data-msg="Please enter your name" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-hightlight"></i>
                                                                        <label>Surname <i class="red-txt">*</i></label>
                                                                        <input class="form-control" type="text" name="participant_surname" id="participant_surname" required data-msg="Please enter your surname" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-hightlight"></i>
                                                                        <label>Email <i class="red-txt">*</i></label>
                                                                        <input class="form-control" type="text" name="participant_email" id="participant_email" email required data-msg="Please enter your email" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-mobile-phone input-icon input-icon-hightlight"></i>
                                                                        <label>Cellphone <i class="red-txt">*</i></label>
                                                                        <input class="form-control" type="text" name="participant_cellphone" id="participant_cellphone" number required data-maxlength="9" data-minlength="10" data-lmsg="Must be ten digits" data-msg="Please enter your cell number" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                                                        <label>Your location<i class="red-txt">*</i></label>
                                                                        <input class="form-control" type="text" name="areapost_name" id="areapost_name" required data-msg="Please enter your location or area, search by suburb, town and postal code" />
																		<input type="hidden" name="areapost_code" id="areapost_code" value="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h2 class="sub-head">Vehicle details</h2>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-automobile input-icon input-icon-hightlight"></i>
                                                                        <label>Vehicle Model <i class="red-txt">*</i></label>
                                                                        <input class="form-control" type="text" id="model_name" name="model_name" required data-msg="Please enter your vehicle model" />
																		<input type="hidden" id="model_code" name="model_code" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-th-list input-icon input-icon-hightlight"></i>
                                                                        <label>Vehicle Category <i class="red-txt">*</i></label>
																		<select class="form-control" id="group_code" name="group_code" required data-msg="Please enter your vehicle category">
																			<option value=""> ----- </option>
																			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['grouppairs']), $this);?>

																		</select>																		
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                                        <label>Year the You Bought <i class="red-txt">*</i></label>
                                                                        <input class="form-control" type="text" id="car_year" name="car_year" number required data-maxlength="3" data-minlength="4" data-lmsg="Must be four digits" data-msg="Please enter the year you bought your vehicle" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-tag input-icon input-icon-hightlight"></i>
                                                                        <label>Short Vehicle Description <i class="red-txt">*</i></label>
                                                                        <textarea class="form-control" rows="5" id="car_description" name="car_description" required data-minlength="5" data-lmsg="Minimum length should be 5 characters"></textarea>
                                                                    </div>
                                                                </div>														
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-image input-icon input-icon-hightlight"></i>
                                                                        <label>Vehicle Image(s) <i class="red-txt">*</i> <small>You may select multiple images by pressing control and selecting them</small></label>
                                                                        <div class="fileUpload form-control file">
                                                                            <span>ClICK TO BROWSE</span>
																			<input type="file" required data-msg="Please upload at least one image" id="imagefile[]" name="imagefile[]" class="form-control upload" multiple >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                            <div class="car-box pull-right"><img src="/images/car.png" width="296" height="153" alt="Rentout" /></div>
                                        </div>
                                    </div>
                                </div>
								<!--
                                <div role="tabpanel" class="tab-pane" id="log">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1><span>Login</span> &amp; to add more vehicles</h1>
                                            <p>Please make sure you have activated your account via email confirmation before you try to login.</p>
                                            <hr />
                                            <h2 class="sub-head">Login details</h2>
                                            <form id="login-form" action="/login.php" method="post">
                                                <div id="slider2" class="form">
                                                    <ul>
				                                        <li data-id="slider_start">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-hightlight"></i>
                                                                        <label>Email</label>
                                                                        <input class="form-control" type="text" id="email" name="email" email required data-msg="Please enter your email" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                                                    <div class="form-group form-group-icon-left"><i class="fa fa-check input-icon input-icon-hightlight"></i>
                                                                        <label>Password</label>
                                                                        <input class="form-control" type="password" id="password" name="password" required data-msg="Please enter your password" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                            <div class="car-box pull-right"><img src="/images/car.png" width="296" height="153" alt="Rentout" /></div>
                                        </div>
                                    </div>
                                </div>
								-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
			<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

        </div>
    </div>
</body>
<script src="/library/javascript/jquery-1.11.2.min.js"></script>
<script src="/library/javascript/jquery-ui.js"></script>
<script src="/library/javascript/bootstrap.min.js"></script>
<script src="/library/javascript/countdown.min.js"></script>
<script src="/library/javascript/jFormslider.js"></script>
<script src="/library/javascript/forms.js"></script>
<?php echo '
<script>
    $(window).load(function() {
        $(\'#edate\').countdown(\'2015/06/10\', function(event) {
            $(this).html(event.strftime(\'\'
            + \'<div class="count-item"><div class="count-num">%w</div><div class="count-txt up-txt">Weeks</div></div>\'
            + \'<div class="count-item"><div class="count-num">%d</div><div class="count-txt up-txt">Days</div></div>\'
            + \'<div class="count-item"><div class="count-num">%H</div><div class="count-txt up-txt">Hours</div></div>\'
            + \'<div class="count-item"><div class="count-num">%M</div><div class="count-txt up-txt">Minutes</div></div>\'
            /*+ \'<div class="count-item"><div class="count-num">%S</div><div class="count-txt up-txt">Seconds</div></div>\'*/));
			
	});
    	
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
	
	$( "#model_name" ).autocomplete({
		source: "/feeds/model.php",
		minLength: 3,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#model_name\').html(\'\');
				$(\'#model_code\').val(\'\');					
			} else {
				$(\'#model_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#model_code\').val(ui.item.id);	
			}
			$(\'#model_name\').val(\'\');										
		}
	});
	
});
</script>
'; ?>

</body>
<html>