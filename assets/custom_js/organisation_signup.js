$(document).ready(function(){
    $('.select2').select2();
    $('form').validate({
        rules:{
            username:{
                required:true
            },
            first_name:{
                required:true
            },
            last_name:{
                required:true
            },
            city:{
                required:true
            },
            organisation_type:{
                required:true
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
            referral_type:{
                required:true
            }
            
        },errorPlacement: function (error, element) {
            if(element.hasClass('select2')) {
                error.insertAfter(element.insertAfter('.select2-container'));
            }else{
                element.after(error);
            }
        }
    });
    $.validator.addMethod('regexp', function(value, element, param) {
        return this.optional(element) || value.match(param);
    },
    'One Upper case, One Digit and One special character is mandatory.');
    $("input[type=submit]").attr('disabled','disabled');
    $("#terms").click(function() {
        if (this.checked) {
            $("input[type=submit]").prop('disabled',false);
        }
        else {
            $("input[type=submit]").attr('disabled','disabled');
        }
    });

});