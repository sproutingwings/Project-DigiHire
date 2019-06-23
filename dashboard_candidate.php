<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Candidate Dashboard-Digihire</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Autocomplete style -->
    <link rel="stylesheet" href="assets/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
    <!-- Autocomplete style -->
    <link rel="stylesheet" href="assets/bower_components/jquery-ui/themes/base/autocomplete.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="skin-green layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="input-group">
                                <input type="text" style="background-color:#ffffff;" class="form-control"
                                    id="navbar_search" placeholder="Job Title/Company name">
                                <span class="input-group-addon"><a href="#" id="searchbar_link"><i class="fa fa-search"
                                            style="background-color:#fff"></a></i></span>
                            </div>
                        </form>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Get Ratings <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Take Quiz</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Schedule Interview</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Name <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Start Applying</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Edit Resume</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Payment Status</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- /.container-fluid -->
            </nav>
        </header>
        <div class="content-wrapper">
            <section class="content" id="section_apply">
                <div class="row hidden-xs hidden-sm" style="border-bottom:1px solid gray;padding:2px;">
                    <div class="col-md-3">
                        <b>Location</b><br />
                        <select class="form-control select2" style="width: 100%;" name="city" id="location">
                            <option value="">Filter City</option>
                            <?php 
                                  $city_data=$db_con->query("select city_name from cities");
                                  while($assoc_city=$city_data->fetch_assoc()){
                                    echo "<option value='".$assoc_city['city_name']."'>".$assoc_city['city_name']."</option>";
                                  }
                                ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <b>Qualifications</b><br />
                        <select class="form-control" id="educational_qualifications">
                            <option value="">Filter Qualification</option>
                            <option value="B.TECH">B.TECH</option>
                            <option value="M.TECH">M.TECH</option>
                            <option value="B.A.">BA</option>
                            <option value="M.A.">MA</option>
                            <option value="M.B.A">MBA</option>
                            <option value="B.SC">B.SC</option>
                            <option value="M.SC">M.SC</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <b>Job Type</b><br />
                        <select class="form-control" id="job_type">
                            <option value="">Filter Job Type</option>
                            <option>Full Time</option>
                            <option>Part Time</option>
                            <option>Internship</option>
                            <option>Work From Home</option>
                        </select>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="height:400px;overflow-y:auto;"
                        id="company_list">
                        <div class="callout callout-success">
                            <h4>Start searching your dream company now</h4>
                        </div>
                    </div>
                    <!--Bootstrap modal for confirmation-->
                    <!-- Starts -->
                    <div id="confirm_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <Strong>Please Make sure your Resume is updated before applying.</strong>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="btn_modal_apply">Apply!</button>
                                    <button type="button" class="btn btn-warning" id="btn_modal_close">Not Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Bootstrap modal for confirmation-->
                    <!-- Ends -->
                    <!--Bootstrap modal for successfull application-->
                    <!-- Starts -->
                    <div id="success_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Congratulations</h4>
                                </div>
                                <div class="modal-body">
                                    <Strong>Congratulations your application has been submitted
                                        successfully.</strong><br>
                                    You can the check the status of your application on <a href='#'>dashboard</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Bootstrap modal for successfull application-->
                    <!-- Ends -->
                    <!--Bootstrap modal for already applied application-->
                    <!-- Starts -->
                    <div id="already_applied_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Information</h4>
                                </div>
                                <div class="modal-body">
                                    <Strong>You have already applied for this job.</strong><br>
                                    You can the check the status of your application on <a href='#'>dashboard</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Bootstrap modal for already applied application-->
                    <!-- Ends -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <!-- Custom Tabs (Pulled to the right) -->
                        <div class="nav-tabs-custom" id="box_company_info" style="display:none;">
                            <ul class="nav nav-tabs pull-right">
                                <li><a href="#tab_4-4" class="btn btn-info" data-toggle="tab">Salary</a></li>
                                <li><a href="#tab_3-3" data-toggle="tab">Required Skills</a></li>
                                <li><a href="#tab_2-2" data-toggle="tab">Responsibilities</a></li>
                                <li class="active"><a href="#tab_1-1" data-toggle="tab">About</a></li>
                                <li class="pull-left header"></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1-1">

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2-2">

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3-3">

                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_4-4">

                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                        <!-- /.col -->
                    </div>
                </div>

            </section>
            <section class="content" id="candidate_resume">
                <!--Bootstrap modal for Resume Educational Details-->
                <!-- Starts -->
                <div id="modal_education" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Educational Details</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="" class="control-label">Institution Name:</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Passing Year:</label>
                                        <select name="" id="" class="form-control">
                                            <?php 
                                                for($i=2000;$i<2025;$i++){
                                                    echo "<option value='$i'>".$i."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Obtained Score:</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <input type="text" name="" id="" class='form-control'>
                                            </div>
                                            <div class="col-xs-6">
                                                <select name="" id="" class="form-control">
                                                    <option value="">Percentage</option>
                                                    <option value="">SGPA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Submit!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Bootstrap modal for Resume Educational Details-->
                <!-- Ends -->
                <!--Bootstrap modal for Resume Skills-->
                <!-- Starts -->
                <div id="modal_skills" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Skills</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="" class="control-label">Skill:</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Submit!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Bootstrap modal for Resume Skills-->
                <!-- Ends -->
                <!--Bootstrap modal for Resume Project-->
                <!-- Starts -->
                <div id="modal_project" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Project/ Training Experience</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="" class="control-label">Title</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>From:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker"
                                                placeholder='dd/mm/yyyy'>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>To:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker1"
                                                placeholder='dd/mm/yyyy'>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <div class="form-group">
                                        <label for="" class="control-label">Description:</label>
                                        <textarea class="form-control" placeholder='Describe Experience'></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Submit!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Bootstrap modal for Resume Project-->
                <!-- Ends -->
                <!--Bootstrap modal for Resume Other Activities-->
                <!-- Starts -->
                <div id="modal_other" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Other Activities</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="" class="control-label">Title:</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Description:</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Submit!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Bootstrap modal for Resume Other Activities-->
                <!-- Ends -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                        <!-- Default box -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Krunal Astik Resume</h3>
                                <h3 class="box-title pull-right">DigiHire</h3>
                            </div>
                            <div class="box-body">
                                <div id="resume_education">
                                    <h4><i class="fa fa-book"></i>Educational Qualification<a href="#"
                                            id="link_education"><span class='pull-right'><i class='fa fa-plus'
                                                    data-toggle="modal" data-target="#modal_education"></i></span></a>
                                    </h4>
                                    <ul>
                                        <li>ABC School<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Class:
                                            10th, Passing Year: 2015, Grade:75%</li>
                                        <li>GHI School<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Class:
                                            12th, Passing Year: 2017, Grade:90%</li>
                                        <li>LMN College<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Passing
                                            Year: 2021, Grade:5.5 SGPA</li>
                                    </ul>
                                </div>
                                <div id="resume_technical_skills">
                                    <h4><i class="fa fa-laptop"></i>Technical Skills(5 Skills you are best in)<a
                                            href="#" id="link_education"><span class='pull-right'><i class='fa fa-plus'
                                                    data-toggle="modal" data-target="#modal_skills"></i></span></a></h4>
                                    <div class="row">
                                        <div class='col-xs-offset-1 col-xs-3'>C <span><i class='fa fa-trash'></i></span>
                                        </div>
                                        <div class='col-xs-3'>C++ <span><i class='fa fa-trash'></i></span></div>
                                        <div class='col-xs-3'>HTML <span><i class='fa fa-trash'></i></span></div>
                                    </div>
                                    <div class="row">
                                        <div class='col-xs-offset-1 col-xs-3'>C <span><i class='fa fa-trash'></i></span>
                                        </div>
                                        <div class='col-xs-3'>C++ <span><i class='fa fa-trash'></i></span></div>
                                    </div>
                                </div>
                                <div id="resume_project">
                                    <h4><i class="fa fa-user"></i>Project/Internship Experience<a href="#"
                                            id="link_education"><span class='pull-right'><i class='fa fa-plus'
                                                    data-toggle="modal" data-target="#modal_project"></i></span></a>
                                    </h4>
                                    <ul>
                                        <li>Project Name<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Description</li>
                                        <li>Project Name<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Description</li>
                                        <li>Project Name<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Description</li>
                                    </ul>
                                </div>
                                <div id="resume_other_activities">
                                    <h4>Other Activities<a href="#" id="link_education"><span class='pull-right'><i
                                                    class='fa fa-plus' data-toggle="modal"
                                                    data-target="#modal_other"></i></span></a></h4>
                                    <ul>
                                        <li>Certification 1<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Description</li>
                                        <li>Certification 2<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Description</li>
                                        <li>Achieved Awards<span class='pull-right'><i
                                                    class='fa fa-trash'></i></span><br>Description</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2019-2020 <a href="http://digihire.ml">Digihire</a>.</strong> All rights
                reserved.
            </div>
            <!-- /.container -->
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- bootstrap datepicker -->
    <script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- Js by developer -->
    <script src="assets/custom_js/dashboard_candidate.js"></script>
</body>

</html>