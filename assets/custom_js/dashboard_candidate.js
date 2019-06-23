$(document).ready(function () {
    hide_company_info();
    //initiating select2 dropdown(Searchable drop down)
    $('.select2').select2();
     //Date picker
     $('#datepicker').datepicker({
        autoclose: true
      })  
      //Date picker
     $('#datepicker1').datepicker({
        autoclose: true
      })  
      //fechting few internships to display when page loads
      fetch_inital_posts();
    var search_response = "";
    $("#searchbar_link").click(function (e) {
        e.preventDefault();
        if ($("#navbar_search").val() != "") {
            $.ajax({
                method: "POST",
                url: "generate_json.php",
                data: { "json_id": 5, "user_input": $("#navbar_search").val() },
                success: function (response) {
                    if (response != "") {
                        $("#company_list").html("");
                        search_response = response;
                        show_all_data();
                    }
                }
            });
        } else {
            $("#company_list").html("");
            $("#company_list").append("<div class='callout callout-success'>" +
                "<h4><center>Please enter valid keywords</center></h4>" + "</div>");
            hide_company_info();
        }
    });
    var internship_id = 0;
    $(document).on('click', 'a.company_info_link', function (event) {
        event.stopPropagation();
        event.stopImmediatePropagation();
        internship_id = $(this).attr('id');
        $('#tab_1-1').html('');
        $('#tab_2-2').html('');
        $('#tab_3-3').html('');
        $('#tab_4-4').html('');
        $.each(JSON.parse(search_response), function (index, value) {
            if (value.internship_id == internship_id) {
                $('.header').html("<i class='fa fa-bank'></i>" + value.organisation_name);
                $('#tab_1-1').html('<p>Posted on:'+value.posting_date+'<br>' + value.about + "</p><a href='#' class='btn btn-success btn-flat apply_btn'>Apply</a>");
                split_data('#tab_2-2', value.responsibility, '•');
                split_data('#tab_3-3', value.skills, '•');
                $('#tab_4-4').html('');
                split_data('#tab_4-4', '•' + value.salary, '•');
            }
        });
        show_company_info();
    });
    function show_all_data() {
        $("#company_list").html("");
        $.each(JSON.parse(search_response), function (index, value) {
            $("#company_list").append("<div class='callout callout-success'>" +
                "<h4 style='text-align:center;'>" + value.job_title + "</h4>" +
                "<h5 style='text-align:center;'>" + value.organisation_name + "-" + value.location + "<br><br>" +
                "<a href='#' class='company_info_link'  id='" + value.internship_id + "'>View Details</a></h5></div>");
        });
    }
    $(document).on('click', 'a.apply_btn', function (event) {
        event.stopPropagation();
        event.stopImmediatePropagation();
        show_modal($("#confirm_modal"));
    });
    $("#btn_modal_apply").click(function () {
        submit_application(internship_id);
    });
    $("#btn_modal_close").click(hide_modal(this));
    $("#location").change(function () { job_filter("location") });
    $("#educational_qualifications").change(function () { job_filter("educational_qualifications") });
    $("#skills").on('keyup', function () { job_filter("skills") });
    $("#job_type").change(function () { job_filter("job_type") });

    function show_company_info() {
        $("#box_company_info").show();
    }
    function hide_company_info() {
        $("#box_company_info").hide();
    }
    function split_data(fill_to, data, split_char) {
        var arr = data.split(split_char);
        for (var index = 0; index < arr.length; index++) {
            if (index == 0) {
                $(fill_to).append(arr[index] + "<br />");
            } else {
                $(fill_to).append("• " + arr[index] + "<br />");
            }
        }
    }
    function show_modal(modal_obj) {
        $(modal_obj).modal('show');
    }
    function hide_modal(modal_obj) {
        $(modal_obj).modal('hide');
    }
    function submit_application(internship_id) {
        $.ajax({
            url: "generate_json.php",
            method: "POST",
            data: {
                "json_id": 6,
                "internship_id": internship_id
            },
            success: function (response) {
                if (response == 1) {
                    hide_modal($("#confirm_modal"));
                    show_modal($("#success_modal"));
                } else if (response == 0) {
                    hide_modal($("#confirm_modal"));
                    $("#already_applied_modal").modal("show");
                }
            }
        });
    }
    function job_filter(var_caller) {
        show_all_data();
        var div_callout = $(".callout");
        if ($("#location").val() == "" && $("#educational_qualifications").val() == "" && $("#job_type").val() == "") {
            show_all_data();
        }
        if ($("#location").val() != "" && $("#educational_qualifications").val() != "" && $("#job_type").val() != "") {
            for (var index = 0; index < div_callout.length; index++) {
                $.each(JSON.parse(search_response), function (index, value) {
                    if (value.location == $("#location").val() && value.minimum_qualification == $("#educational_qualifications").val() && value.category == $("#job_type").val()) {
                        $(div_callout[index]).show();
                    } else {
                        $(div_callout[index]).hide();
                        invalid_filter();
                    }
                });
            }
        } else if ($("#location").val() != "" && $("#educational_qualifications").val() != "") {
            for (var index = 0; index < div_callout.length; index++) {
                $.each(JSON.parse(search_response), function (index, value) {
                    if (value.location == $("#location").val() && value.minimum_qualification == $("#educational_qualifications").val()) {
                        $(div_callout[index]).show();
                    } else {
                        $(div_callout[index]).hide();
                        invalid_filter();
                    }
                });
            }
        } else if ($("#location").val() != "" && $("#job_type").val() != "") {
            for (var index = 0; index < div_callout.length; index++) {
                $.each(JSON.parse(search_response), function (index, value) {
                    if (value.location == $("#location").val() && value.category == $("#job_type").val()) {
                        $(div_callout[index]).show();
                    } else {
                        $(div_callout[index]).hide();
                        invalid_filter();
                    }
                });
            }
        } else if ($("#educational_qualifications").val() != "" && $("#job_type").val() != "") {
            for (var index = 0; index < div_callout.length; index++) {
                $.each(JSON.parse(search_response), function (index, value) {
                    if (value.minimum_qualification == $("#educational_qualifications").val() && value.category == $("#job_type").val()) {
                        $(div_callout[index]).show();
                    } else {
                        $(div_callout[index]).hide();
                        invalid_filter();
                    }
                });
            }
        }else if ($("#location").val() != "") {
            for (var index = 0; index < div_callout.length; index++) {
                $.each(JSON.parse(search_response), function (index, value) {
                    if (value.location == $("#location").val()) {
                        $(div_callout[index]).show();
                    } else {
                        $(div_callout[index]).hide();
                        invalid_filter();
                    }
                });
            }
        }else if ($("#educational_qualifications").val() != "") {
            for (var index = 0; index < div_callout.length; index++) {
                $.each(JSON.parse(search_response), function (index, value) {
                    if (value.minimum_qualification == $("#educational_qualifications").val()) {
                        $(div_callout[index]).show();
                    } else {
                        $(div_callout[index]).hide();
                        invalid_filter();
                    }
                });
            }
        }else if ($("#job_type").val() != "") {
            for (var index = 0; index < div_callout.length; index++) {
                $.each(JSON.parse(search_response), function (index, value) {
                    if (value.category == $("#job_type").val()) {
                        $(div_callout[index]).show();
                    } else {
                        $(div_callout[index]).hide();
                        invalid_filter();
                    }
                });
            }
        } 
    }
    function invalid_filter(){
        var div_callout = $(".callout");
        var count = 0;
        for (var index = 0; index < div_callout.length; index++) {
            if($(div_callout[index]).is(":hidden")){
                count++;
            }
        }
        if(count == div_callout.length){
            $("#company_list").append("<div class='callout callout-success'>" +
                "<h4><center>No Data Matches with given criteria.</center></h4>" + "</div>");
            hide_company_info();
        }
    }
    function fetch_inital_posts(){
        $.ajax({
            url: "generate_json.php",
            method: "POST",
            data: {
                "json_id": 7
            },
            success: function (response) {
                search_response = response;
                $("#company_list").html("");
                $.each(JSON.parse(response), function (index, value) {
                    $("#company_list").append("<div class='callout callout-success'>" +
                        "<h4 style='text-align:center;'>" + value.job_title + "</h4>" +
                        "<h5 style='text-align:center;'>" + value.organisation_name + "-" + value.location + "<br><br>" +
                        "<a href='#' class='company_info_link'  id='" + value.internship_id + "'>View Details</a></h5></div>");
                });
            }
        });

    }
});
