$(document).ready(function(){
    $("#formmessage").hide();
    $('#contact_form').submit(function(e){
        e.preventDefault();
        var form_data = $(this).serialize(); // serializes the form's elements.
        $.ajax({
            type: "POST",
            url: "index.php",
            data: form_data, 
            success: function()
            {
                $("#formmessage").show();
                $("#contact_form")[0].reset();
            }
          });
 

    });
});