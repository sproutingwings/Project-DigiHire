$(document).ready(function () {
    //Initially hiding Template andHiding copy buttons
    hide_demo_template();
    //Initially hiding Link to display template
    $("#template_para").hide();
    //Initially hiding input field which is displayed if user selects other in dropdown
    $("#div_job_input").hide();
    //Initially hiding box which contains select tag which contains list of internships posted by organisation
    $("#tbl_candidates_applied").hide();
    //initiating select2 dropdown(Searchable drop down)
    $('.select2').select2();
    //For DataTables
    $('#example1').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'bInfo': true,
        'autoWidth': true
    });
    //calling function to fetch the posted internships by the company
    show_internship();
    //Code for automatically adding bullet points in description,responsibility and skills textarea
    $(".responsibility").focus(function () {
        bullet_points_focus('responsibility');
    });
    $(".responsibility").blur(function () {
        bullet_points_blur('responsibility');
    });

    $(".responsibility").keyup(function (event) {
        bullet_points_keyup('responsibility');
    });

    $(".skills").focus(function () {
        bullet_points_focus('skills');
    });
    $(".skills").blur(function () {
        bullet_points_blur('skills');
    });

    $(".skills").keyup(function (event) {
        bullet_points_focus('skills');
    });
    //Code for generating template
    //This code will get executed when user changes its selection in dropdown
    $("#job_title").change(function () {
        if ($("#job_title").val() != "Other" && $("#job_title").val() != "") {
            $.ajax({
                url: "generate_json.php",
                method: "post",
                data: {
                    "json_id": 1,
                    "job_title": $("#job_title").val()
                },
                success: function (response) {
                    if (response.trim() != '') {
                        $.each(JSON.parse(response), function (i, item) {
                            //The data coming from database will have * as first character
                            //So * is used as delimeter and it is splited when * character arrives
                            //Making UL tags empty to add li inside them
                            $("#box_job_title").html($("#job_title").val());

                            $("#demo_responsibilities").html("");
                            $("#demo_skills").html("");
                            //After spliting the JSON data is obtained in form of array
                            split_data($("#demo_responsibilities"), item.responsibilities, "*");
                            split_data($("#demo_skills"), item.skills, "*");
                        });
                    }
                }
            });
            //When the dropdown value is not 'Other' the link to template is displayed
            $("#template_para").show();
            //Hiding input tag if user has not selected other in drop down
            $("#job_title_input").prop('required', false);
            $("#div_job_input").hide();
        }
        if ($("#job_title").val() == "Other") {
            //if user selects other then showing input tag and add required attribute
            $("#job_title_input").attr('required', 'required');
            $("#div_job_input").show();
            //hiding link as user is selecting 'Other' so no readymade template will be available
            $("#template_para").hide();
            //Hiding Copy links from dashboard
            hide_demo_template();
        }
    });
    $("#link_template").click(function (e) {
        //when user clicks the link to template
        //The property of link is disabled
        e.preventDefault();
        //template is displayed
        show_demo_template();
    });
    $("#radio_unpaid").change(function () {
        if (this.value == "Unpaid") {
            //when user selects unpaid the div for stipend is made hidden
            $("#div_stipend").hide();
        }
    });
    $("#radio_paid").change(function () {
        if (this.value == "Paid") {
            //when user selects paid the div for stipend is displayed
            $("#div_stipend").show();
        }
    });
    $("#cpBtnResponsibilities").click(function (e) {
        e.preventDefault();
        $("#responsibility").val("");
        fill_input_fields($("#responsibility"), $("#demo_responsibilities").html(), "<br>");
    });
    $("#cpBtnSkills").click(function (e) {
        e.preventDefault();
        $("#skills").val("");
        fill_input_fields($("#skills"), $("#demo_skills").html(), "<br>");
    });

    //Validation code for validating internship form
    $("#frm_post_internship").validate({
        rules: {
            job_title: {
                required: true
            },
            responsibility: {
                required: true
            },
            location:{
                required:true
            },
            minimum_qualification:{
                required:true
            },
            salary:{
                required:true
            },
            skills: {
                required: true
            },
            job_duration: {
                required: true
            },
            job_category: {
                required: true
            },
            paid_radio: {
                required: true
            },
            job_offer: {
                required: true
            }
        }
    });

    //Submiting form using ajax
    $("#frm_post_internship").submit(function (element) {
        element.preventDefault();
        if ($("#frm_post_internship").valid()) {
            $("#modal_job_title").html("Position: " + $("#job_title").val());
            $("#modal_category").html("Category: " + $("#job_category").val());
            $("#modal_location").html("Location: " + $("#location").val());
            $("#modal_salary").html("Salary: " + ($("#salary").val()+$("#salary_schedule").val()));
            $("#modal_qualification").html("Minimum Qualification: " + ($("#minimum_qualification").val()));
            $("#modal_responsibilities").html('Responsibilities: ' + "<br />");
            $("#modal_skills").html('Skills: ' + "<br />")
            split_modal_data($("#modal_responsibilities"), $("#responsibility").val(), "•");
            split_modal_data($("#modal_skills"), $("#skills").val(), "•");
            $("#myModal").modal('show');
        } else {
            $("#myModal").modal('hide');
        }
    });
    $("#modal_submit").click(function() {
        $.ajax({
            url: "dashboard_organisation.php",
            method: "POST",
            data: $("#frm_post_internship").serialize(),
            success: function () {
                $("#myModal").modal('hide');
                show_internship();
            }
        });
    });
    $("#received_app").click(function (e) {
        e.preventDefault();
        $("#box_post_internship").hide();
        $("#demo_template").hide();
        $("#tbl_posted_positions").hide();
        $.ajax({
            "url": "generate_json.php",
            "method": "post",
            "json_id": 3,
            success: function (response) {
                if (response.trim() != '') {
                    var candidates_table = $("#candidates_list").DataTable();
                    //$("#candidates_list").find('tbody').empty();
                    $.each(JSON.parse(response), function (index, value) {
                        candidates_table.row.add([]);
                    });
                    candidates_table.draw();
                }
            }
        });
        $("#tbl_candidates_applied").show();
    });
    $("#post_internship").click(function (e) {
        e.preventDefault();
        $("#tbl_candidates_applied").hide();
        $("#box_post_internship").show();
        $("#demo_template").hide();
        $("#tbl_posted_positions").show();
    });
    $("#sign_out").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "generate_json.php",
            method: "post",
            data: {
                "json_id": 4
            },
            success: function (response) {
                if (response == 1) {
                    window.location.replace('dashboard.php');
                }
            }
        });
    });

    function show_internship() {
        
        $.ajax({
            url: "generate_json.php",
            method: "post",
            data: {
                "json_id": 2
            },
            success: function (response) {
                console.log(response);
                if (response.trim() != '') {
                    var sr_no = 1;
                    var internship_table = $("#example1").DataTable();
                    internship_table.clear().draw();
                    $parse_data =JSON.parse(response); 
                    $.each($parse_data, function (index, value) {
                        internship_table.row.add([sr_no++, value.job_title, value.candidate_applied, value.posting_date, value.expire_days, value.status]);
                        $("#slt_internship").append("<option value='" + value.internship_id + "'>" + value.job_title + "</option>");
                        
                    });
                    $('#internship_count').html($parse_data.posted_internship);
                    $('#candidate_count').html(value.candidate_count);
                    internship_table.draw();
                }
            }
        });
    }
    function bullet_points_keyup(var_class) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            document.getElementById(var_class).value += '• ';
        }
        if ($('.' + var_class).val() == '') {
            document.getElementById(var_class).value += '• ';
        }
        var txtval = document.getElementById(var_class).value;
        if (txtval.substr(txtval.length - 1) == '\n') {
            document.getElementById(var_class).value = txtval.substring(0, txtval.length - 1);
        }
    }
    function bullet_points_blur(var_class) {
        if ($('.' + var_class).val() == '• ' || $('.' + var_class).val() == '•') {
            document.getElementById(var_class).value = '';
        }
    }
    function bullet_points_focus(var_class) {
        if (document.getElementById(var_class).value === '') {
            document.getElementById(var_class).value += '• ';
        }
    }

    function split_data(fill_to, data, split_char) {
        var arr;
        if(data.length>1){
             arr= data.split(split_char);
        }else{
            arr = data;
        }
        for (var index = 0; index < arr.length; index++) {
            $(fill_to).append("• " + arr[index] + "<br />");
        }
    }
    function split_modal_data(fill_to, data, split_char) {
        var arr = data.split(split_char);
        for (var index = 0; index < arr.length; index++) {
            if (index == 0) {
                $(fill_to).append(arr[index] + "<br />");
            } else {
                $(fill_to).append("• " + arr[index] + "<br />");
            }
        }
    }
    function fill_input_fields(fill_to, data, split_char) {
        var arr = data.split(split_char);
        for (var index = 0; index < arr.length; index++) {
            $(fill_to).val($(fill_to).val() + arr[index]);
        }
    }
    function show_demo_template() {
        $("#demo_template").show();
        $("#cpBtnResponsibilities").show();
        $("#cpBtnSkills").show();
    }
    function hide_demo_template() {
        $("#demo_template").hide();
        $("#cpBtnResponsibilities").hide();
        $("#cpBtnSkills").hide();
    }
});