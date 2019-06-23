<?php
  require 'functions.php';
  $submit_verify=isset($_POST['submit_verify'])?$_POST['submit_verify']:'';
  $submit_error="";
  if($submit_verify==1)
  {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $adhaar_no = isset($_POST['adhaar_no'])?$_POST['adhaar_no']:'';
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $referrer = $_POST['referrer'];
    $category = $_POST['category'];
    if($category==0)
    {
      $user_check = $db_con->query("select * from user_master where username='$username' or email='$email'");
      $row_count = $user_check->num_rows;
      if($row_count>0){
        $submit_error="Username or Email already Exists!";
      }
      else
      {
        $db_con->query("INSERT INTO `user_master`(`first_name`, `last_name`, `adhaar_no`, `username`, `phone_number`, `email`, `password`, `referrer`, `account_status`) VALUES ('$first_name','$last_name',$adhaar_no,'$username',$phone_number,'$email','$password','$referrer',1)");
        header("location:index.php?reg_check=1");
      }
    }else if($category==1)
    {
      $user_check = $db_con->query("select * from company_master where username='$username' or email='$email'");
      $row_count = $user_check->num_rows;
      if($row_count>0){
        $submit_error="Username or Email already Exists!";
      }
      else
      {
        $db_con->query("INSERT INTO `company_master`(`first_name`, `last_name`, `username`, `phone_number`, `email`, `password`, `referral`, `account_status`) VALUES ('$first_name','$last_name','$username',$phone_number,'$email','$password','$referrer',1)");
        header("location:index.php?reg_check=1");
      }
    }

  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up-Digihire</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- Custom style by developer-->
    <link rel="stylesheet" href="assets/custom_css/signup-style.css">
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

<body>
    <!-- Main content -->
    <section class="content">


        <div class="row" id="form-content">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sign Up!</h3>
                    </div>
                    <p style="color:red;"><?php echo $submit_error; ?></p>
                    <!-- general form elements -->
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post">
                        <input type="hidden" value="1" name="submit_verify">
                        <div class="box-body">
                        <div class="row">
                        
                          <div class="form-group">
                            <label class="control-label col-xs-offset-1">Register As:</label>
                                <label>
                                    <input type="radio" name="category" id="radio_student" class="flat-green" checked value="0">
                                    Student
                                </label>
                                <label>
                                    <input type="radio" name="category" id="radio_company" class="flat-green" value="1">
                                    Company
                                </label>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First name"
                                        id="first_name">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" placeholder="Last name" name="last_name"
                                        id="last_name">
                                </div>
                            </div>
                            <div class="row form-group">        
                              <div class="col-xs-6">
                                    <input type="email" class="form-control" name="email" autocomplete="email"
                                        placeholder="Email" id="email">
                                </div>
                                <div class="col-xs-6">
                                <input type="text" class="form-control" placeholder="Username"
                                        autocomplete="username" name="username" id="username">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="phone_number"
                                        placeholder="Phone Number" id="phone_number">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="adhaar_no"
                                        placeholder="Addhaar Number" id="adhaar_no">
                                </div>
                                <!--<div class="col-xs-6">
                                    <input type="text" class="form-control" placeholder="OTP" name="otp" id="otp">
                                </div>-->
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-6">
                                    <input type="password" class="form-control" name="password"
                                        autocomplete="new-password" placeholder="Password" id="password">
                                </div>
                                <div class="col-xs-6">
                                    <input type="password" class="form-control" name="confpassword"
                                        autocomplete="new-password" id="confpassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row form-group">
                                
                                <div class="col-xs-6">
                                    <select class="form-control" name="referrer" id="referrer">
                                        <option value="">Where did you find About Us?</option>
                                        <option value="option 2">option 2</option>
                                        <option value="option 3">option 3</option>
                                        <option value="option 4">option 4</option>
                                        <option value="option 5">option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="terms"> By signing up you agree to our <a href="#">terms
                                        and conditions</a>.
                                    <br />
                                    <a href="index.html">Already have an account? Login Now!</a>
                                </label>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="index.php" class="btn btn-danger pull-left">Back to login</a>
                            <input type="submit" class="btn btn-success" id="submit" value="Sign Up">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/custom_js/jquery.validate.min.js"></script>
    <script src="assets/custom_js/additional-methods.min.js"></script>
    <script src="assets/custom_js/user_signup.js"></script>
</body>

</html>