<?php
    require 'functions.php';
    if( ($_SESSION==NULL) || (!isset($_SESSION['login_email']))){
        header('location:index.php?user_logout=1');        
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Organisation | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Digi</b>Hire</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" id="sign_out" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                        <a href="#">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i>
                            <span>Internship</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#" id="post_internship"><i class="fa fa-circle-o"></i> Post Internship</a></li>
                            <li><a href="#" id="received_app"><i class="fa fa-circle-o"></i> Received Applications</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/mailbox/mailbox.html">
                            <i class="fa fa-envelope"></i> <span>Send Mail</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 id='internship_count'></h3>

                                <p>Internships's Posted</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3 id='candidate_count'></sup></h3>
                                <p>Received Applications</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>44</h3>

                                <p>Selected Interns</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
            </section>
            <!-- /.content -->
            <!-- POST INTERNSHIP -->
            <section class="content" id="box_post_internship">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">POST INTERNSHIP</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                <form role="form" id="frm_post_internship">
                                    <input type="hidden" name="submit_verify" value="1">
                                    <div class="form-group">
                                        <label for="job_title">JOB TITLE</label>
                                        <select class="form-control select2" style="border-radius:0px;!important"
                                            id="job_title" name="job_title" placeholder="Enter email">
                                            <option value="">Select Job Title</option>
                                            <option value="Backend Developer">Backend Developer</option>
                                            <option value="Front-End Developer">Front-End Developer</option>
                                            <option value="Content Developer">Content Developer</option>
                                            <option value="HR Executive">HR Executive</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <p id="template_para"> To help you in posting, we have designed a template.
                                            <a href="#" id="link_template"><b> View Template</b></a></p>
                                    </div>
                                    <div class="form-group" id="div_job_input">
                                        <input type="text" id="job_title_input" class="form-control"
                                            name="job_title_input" placeholder="Type Job Title" />
                                    </div>
                                    <div class="form-group">
                                        <label for="location" class="control-label">Location</label>
                                        <select class="form-control select2" style="width: 100%;" name="location"
                                            id="location">
                                            <option value="">Select Location</option>
                                            <?php 
                                                $city_data=$db_con->query("select city_name from cities");
                                                while($assoc_city=$city_data->fetch_assoc()){
                                                    echo "<option value='".$assoc_city['city_name']."'>".$assoc_city['city_name']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="educational_qualifications" class="control-label">Minimum
                                            Qualifications</label>
                                        <select class="form-control select2" style="width: 100%;"
                                            name="minimum_qualification" id="minimum_qualification">
                                            <option value="">Select Qualifications</option>
                                            <option value="B.TECH">B.TECH</option>
                                            <option value="M.TECH">M.TECH</option>
                                            <option value="BA">BA</option>
                                            <option value="MA">MA</option>
                                            <option value="MBA">MBA</option>
                                            <option value="B.SC">B.SC</option>
                                            <option value="M.SC">M.SC</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="job_responsibility">Responsibilities</label>
                                        <textarea name="responsibility" id="responsibility"
                                            class="form-control responsibility" row="12"></textarea>
                                        <a style="font-weight:bold;" id="cpBtnResponsibilities">Copy Responsibilites</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="skills">Skills</label>
                                        <textarea name="skills" id="skills" class="form-control skills"
                                            row="12"></textarea>
                                        <a style="font-weight:bold;" id="cpBtnSkills">Copy Skills</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="job_category">Category</label>
                                        <select class="form-control" id="job_category" name="job_category">
                                            <option value="">Select Category</option>
                                            <option value="Full Time(in office)">Full Time(in office)</option>
                                            <option value="Part time(in office)">Part time(in office)</option>
                                            <option value="Work from home">Work from home</option>
                                            <option value="Internship">Internship</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <input type="number" name="salary" id="salary" class="form-control" />
                                            </div>
                                            <div class="col-xs-4">
                                                <select class="form-control" name='salary_schedule'
                                                    id='salary_schedule'>
                                                    <option value="/Month">Per Month</option>
                                                    <option value="L.P.A">L.P.A</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="frm_submit">POST</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Verify Information</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <h4 id="modal_job_title"></h4>
                                        </div>
                                        <div class="row">
                                            <h4 id="modal_qualification"></h4>
                                        </div>
                                        <div class="row">
                                            <h4 id="modal_location"></h4>
                                        </div>
                                        <div class="row">
                                            <h4 id="modal_category"></h4>
                                        </div>
                                        <div class="row">
                                            <h4 id="modal_salary"></h4>
                                        </div>
                                        <div class="row" style="width:500px;">
                                            <h5>
                                                <div id="modal_responsibilities"></div>
                                            </h5>
                                        </div>
                                        <div class="row" style="width:500px;">
                                            <h5>
                                                <div id="modal_skills"></div>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="modal_submit">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="demo_template">
                        <div class="col-md-6">
                            <!-- Default box -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title" id="box_job_title"></h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                            <i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="container">
                                        <div class="row">
                                            <h4>Responsibilities</h4>
                                            <h6>
                                                <ul id="demo_responsibilities"></ul>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <h4>Skills</h4>
                                            <h6>
                                                <ul id="demo_skills"></ul>
                                            </h6>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>

            </section>
            <!-- POST INTERNSHIP ENDS-->
            <!-- TABLE TO SHOW ALL THE INTERNSHIPS-->
            <section class="content" id="tbl_posted_positions">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Posted Positions</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Position</th>
                                            <th>Candidates Applied</th>
                                            <th>Posting Date</th>
                                            <th>Days to expire</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>

            </section>
            <!-- TABLE TO SHOW LIST OF CANDIDATES -->
            <section class="content" id="tbl_candidates_applied">
                <div class="row" id="box_show_applications">
                    <div class="col-md-6">
                        <!-- Default box -->
                        <div class="box box-primary">
                            <div class="box-body">
                                <select class="form-control" id="slt_internship">
                                    <option value="">Select Intership</option>
                                </select>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">List of Candidates</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="candidates_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Name</th>
                                            <th>Application Date</th>
                                            <th>Resume</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Krunal Astik</td>
                                            <td>15-05-2019</td>
                                            <td><a href="#">View Resume</a></td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">Select Action</option>
                                                    <option value="">Accept</option>
                                                    <option value="">Reject</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.row (main row) -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2019 <a href="https://adminlte.io">DigiHire</a>.</strong> All
            rights
            reserved.
        </footer>
        <!--Div tag to display spining progress bar-->
        <div class="progress" id="progress"></div>
        <!-- jQuery 3 -->
        <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Sparkline -->
        <script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="assets/bower_components/moment/min/moment.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <!-- Select2 -->
        <script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- Jquery UI for dialog -->
        <script src="assets/bower_components/jquery-ui/ui/minified/dialog.min.js"></script>
        <!-- DataTables -->
        <script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/custom_js/jquery.validate.min.js"></script>
        <script src="assets/custom_js/additional-methods.min.js"></script>
        <script src="assets/custom_js/dashboard_organisation.js"></script>
</body>

</html>
<?php
    $submit_verify = isset($_POST['submit_verify'])?$_POST['submit_verify']:'';
    if($submit_verify==1)
    {
        $job_title = $_POST['job_title'];
        if($job_title=='Other')
        {
            $job_title=$_POST['job_title_input'];
        }
        $location = $_POST['location'];
        $minimum_qualification = $_POST['minimum_qualification'];
        $salary = $_POST['salary'].$_POST['salary_schedule'];
        $responsibility = $_POST['responsibility'];
        $skills = $_POST['skills'];
        $category = $_POST['job_category'];
        $company_id = $_SESSION['company_id'];
        $db_con->query("insert into posted_intership(company_id,job_title,responsibility,skills,minimum_qualification,category,salary,location,status) values($company_id,'$job_title','$responsibility','$skills','$minimum_qualification','$category','$salary','$location',1)");        
        $db_con->query("update company_profile set posted_internship_count=posted_internship_count+1 where company_id=$company_id");
    }
?>