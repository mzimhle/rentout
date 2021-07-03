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
                            <div class="tab-content main-box">
                                <div role="tabpanel" class="tab-pane active" id="reg">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1><span>Activation</span> Successful</h1>
                                            <p>Good day {$participantData.participant_name} {$participantData.participant_surname}, your email address has been activated you can now log into the system. <a href="/">Please click here to go to the home page</a>.</p>
                                            <hr />
                                            <div class="car-box pull-right"><img src="/images/car.png" width="296" height="153" alt="Rentout" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2"></div>
            </div>
			{include_php file='includes/footer.php'}
        </div>
    </div>
</body>
<script src="/library/javascript/jquery-1.11.2.min.js"></script>
<script src="/library/javascript/jquery-ui.js"></script>
<script src="/library/javascript/bootstrap.min.js"></script>
<script src="/library/javascript/countdown.min.js"></script>
<script src="/library/javascript/jFormslider.js"></script>
<script src="/library/javascript/forms.js"></script>
{literal}
<script>
    $(window).load(function() {
        $('#edate').countdown('2015/02/14', function(event) {
            $(this).html(event.strftime(''
            + '<div class="count-item"><div class="count-num">%w</div><div class="count-txt up-txt">Weeks</div></div>'
            + '<div class="count-item"><div class="count-num">%d</div><div class="count-txt up-txt">Days</div></div>'
            + '<div class="count-item"><div class="count-num">%H</div><div class="count-txt up-txt">Hours</div></div>'
            + '<div class="count-item"><div class="count-num">%M</div><div class="count-txt up-txt">Minutes</div></div>'
            /*+ '<div class="count-item"><div class="count-num">%S</div><div class="count-txt up-txt">Seconds</div></div>'*/));
			
	});
});
</script>
{/literal}
</body>
<html>