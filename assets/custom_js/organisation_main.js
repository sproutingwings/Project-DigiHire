$(document).ready(function(){
    $('.select2').select2();    
    var city_error=0;
    disable_button1();
    disable_button2();
    disable_button3();
    $('form').validate({
        rules:{
            organisation_name:{
                required:true,
                minlength:5
            },
            about:{
                required:true,
                minlength:100
            },
            established_in:{
                required:true
            },
            organisation_type:{
                required:true
            },
            field_work:{
                required:true
            },
            employees:{
                required:true
            },
            country_code:{
                required:true,
            },
            phone_number:{
                required:true,
                number:true,
                minlength:10,
                maxlength:10
            },
            address_line1:{
                required:true,
                minlength:15

            },
            address_line2:{
                required:true,
                minlength:15
            },
            city:{
                required:true
            }
        },errorPlacement: function (error, element) {
            if(element.hasClass('select2')) {
                error.insertBefore(element);
            }else{
                if(element.attr('name')=='country_code' || element.attr('name')=='phone_number'){
                    error.insertBefore(element.parent().parent());
                }else{
                    element.before(error);
                }
            }
        }
    });
    var validator = $('form').validate();
    $('input,select,textarea').change(function(){
        check_value($(this));
    });
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();
  
    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);
  
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    
    
    allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;
  
            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }
    
            if (isValid){
                nextStepWizard.removeAttr('disabled').trigger('click');

            }
        });
        $('div.setup-panel div a.btn-primary').trigger('click');   
        
        function enable_button1(){
            if(validator.element("#organisation_name")  && validator.element("#established_in") && validator.element("#organisation_type") && validator.element("#field_work") && validator.element("#employees") && validator.element("#about")){
                $("#s1").prop('disabled',false);
            }else{
                disable_button1();
            }
        }
        function enable_button2(){
            if(validator.element("#country_code") && validator.element("#phone_number") && validator.element("#address_line1") && validator.element("#address_line2") && validator.element("#city")){
                if(!$("#s1").is(':disabled')){
                    $("#s2").prop('disabled',false);
                    enable_button3();
                }else{
                    disable_button2();
                }
            }
        }
        function enable_button3(){
            $("#s3").prop('disabled',false);
        }
        function check_value(element){
            if(validator.element("#"+element.attr('name'))){
                enable_button1();
                enable_button2();
            }else{
                disable_button1();
                disable_button2();
            }
        }
        function disable_button1(){
            $("#s1").attr('disabled','disabled');
        }

        function disable_button2(){
            $("#s2").prop('disabled',true);
        }
        function disable_button3(){
            $("#s3").prop('disabled',true);
        }
});