$(document).ready(function(){
    var options=
    {
        width: 690,//width of slider
        height: 614,//height of slider
        next_prev: true,//will show next and prev links
        next_class: 'btn btn-default',//class for next link
        prev_class: 'btn btn-default',//class for prev link
        error_class: 'alert form-alert',//class for validation errors
        submit_class: 'btn btn-primary',
        submit_button: true,
        error_position: 'onelement',
        texts:{
            next: 'Next',
            prev: 'Previous',
            submit: 'Submit'
        },
        speed: 600,
        submit_handler:function(){
			$('#owner-form').submit();
		},
    };
 
    $('#slider').jFormslider(options);
    
    var loptions=
    {
        width: 690,//width of slider
        height: 160,//height of slider
        next_prev: false,//will show next and prev links
        error_class: 'alert form-alert',//class for validation errors
        submit_class: 'btn btn-primary',
        submit_button: true,
        error_position: 'onelement',
        texts:{
            submit: 'Login'
        },
        speed: 600,
        submit_handler:function(){
			$('#login-form').submit();
		},
    };
 
    $('#slider2').jFormslider(loptions);
});