$(document).ready(function(){
    $("input[type=submit]").attr('disabled','disabled');
    $('form').validate({
        rules:{
            first_name:{
                required:true
            },
            last_name:{
                required:true
            },
            adhaar_no:{
                required:true,
                minlength:12,
                maxlength:12,
                number:true
            },
            username:{
                required:true,
                minlength:6
            },
            phone_number:{
                required:true,
                minlength:10,
                maxlength:10,
                number:true
            },
            otp:{
                required:true,
                minlength:4,
                maxlength:4,
                number:true
            },
            email:{
                required:true,
                email:true
            },
            password:{
                required:true,
                minlength:8,
                maxlength:16,
                regexp: /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/
            },
            confpassword:{
                required:true,
                equalTo:"#password"
            },
            referrer:{
                required:true
            }
        }
    });
    $.validator.addMethod('regexp', function(value, element, param) {
        return this.optional(element) || value.match(param);
    },
    'One Upper case, One Digit and One special character is mandatory.');
    $("#terms").click(function() {
        if (this.checked) {
            $("input[type=submit]").prop('disabled',false);
        }
        else {
            $("input[type=submit]").attr('disabled','disabled');
        }
    });
});