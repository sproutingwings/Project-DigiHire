<?php
  include 'functions.php';
  $login_error = "";
  $username = isset($_POST['username'])?$_POST['username']:'';
  $password = isset($_POST['password'])?$_POST['password']:'';
  $category = isset($_POST['category'])?$_POST['category']:'';
  $logout = isset($_GET['user_logout'])?$_GET['user_logout']:'';
  if($logout=='1')
  {
    $login_error="Logout Successfull";
  }  
  if($username!='' && $password!='')
  {
    if($category == 0){
      $sqlVerify = "select id,email from user_master where username='$username' and password='$password' and account_status=1";
      $user_verify = $db_con->query($sqlVerify);
      $row_count = $user_verify->num_rows;
      if($row_count == 1)
      {
        $row = $user_verify->fetch_assoc();
        $_SESSION['login_email'] = $row['email'];
        $_SESSION['category'] = 0;
        $_SESSION['user_id'] = $row['id'];
        header("location:dashboard_student.php");
      }else{
        $login_error = "Invalid username or password";
      }
    }else if($category == 1){
      $sqlVerify = "select company_id,email from company_master where email='$username' and password='$password' and account_status=1";
      $company_verify = $db_con->query($sqlVerify);
      $row_count = $company_verify->num_rows;
      if($row_count == 1)
      {
        $row = $company_verify->fetch_assoc();
        $_SESSION['login_email'] = $row['email'];
        $_SESSION['category'] = 1;
        $_SESSION['company_id'] = $row['company_id'];
        header("location:dashboard_organisation.php");
      }
    }
  }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login-Digihire </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
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


</head>


<body class="skin-green layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="http://digihire.ml" class="navbar-brand"><b>DigiHire</b></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="http://digihire.ml">Home</a></li>
                            <li><a href="#">For Company</a></li>
                            <li><a href="#">Opportunities</a></li>
                            <li><a href="index.php">Login</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->

                <!-- /.container-fluid -->
            </nav>
        </header>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-3 col-md-5">
                        <!-- Default box -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Login
                                </h3>
                            </div>
                            <div class="box-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>
                                            <input type="radio" name="category" class="flat-red" checked value="0">
                                            Student
                                        </label>
                                        <label>
                                            <input type="radio" name="category" class="flat-red" value="1">
                                            Company
                                        </label>
                                    </div>
                                    <?php
                              if($login_error!=""){
                                echo "<span style='color:red'>$login_error</span>";
                              }
                            ?>
                                    <div class="form-group">
                                        <input type="text" id="login" class="form-control" name="username"
                                            placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Password">
                                    </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="#" class='col-xs-offset-2 col-sm-offset-4'>Forgot Password?</a>
                                <br /><br />
                                <a href="user_signup.php"
                                    class="col-xs-offset-2 col-sm-offset-3 btn btn-primary">Register
                                    Now!</a>
                                <input type="submit" class="btn btn-success" value="Log In">
                                </form>
                            </div>
                            <!-- /.box-footer-->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>

        <!-- Jquery -->
        <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="assets/dist/js/demo.js"></script>

        <!--Js Created by developer-->
        <script src="assets/navbar_js/custom_page.js"></script>

</body>

</html>