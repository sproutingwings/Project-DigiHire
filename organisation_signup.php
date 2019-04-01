<?php
    require 'functions.php';
    $submit_error="";
    $submit_verify = isset($_POST['submit_verify'])?$_POST['submit_verify']:'';
    if($submit_verify==1){
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $city = $_POST['city'];
        $organisation_type = $_POST['organisation_type'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $referral_type = $_POST['referral_type'];
        $user_check = $db_con->query("select * from company_master where username='$username' or email='$email'");
        $row_count = $user_check->num_rows;
        if($row_count>0){
        $submit_error="Username or Email already Exists!";
        echo "hellp";
        }
        else{
        $db_con->query("INSERT INTO `company_master`(`email`, `password`, `username`, `first_name`, `last_name`, `city`, `organisation_type`, `referral`, `account_status`) VALUES ('$email','$password','$username','$first_name','$last_name','$city','$organisation_type','$referral_type',1)");
        header("location:index.php?reg_check=1");
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
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
</head>

<body>
    <section class="content">
        <div class="row" id="form-content">
            <!-- left column -->
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sign Up for Partners</h3>
                    </div>
                    <p style="color:red;text-align:center;font-weight:bold;"><?php echo $submit_error; ?></p>
                    <!-- general form elements -->
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <input type="hidden" name="submit_verify" value="1">
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">USERNAME<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-3 control-label">FIRST NAME<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-3 control-label">LAST NAME<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-sm-3 control-label">CITY<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="city" id="city">
                                        <option value="">Select City</option>
                                        <?php 
                                            $city_data=$db_con->query("select city_name from cities");
                                            while($assoc_city=$city_data->fetch_assoc()){
                                                echo "<option value='".$assoc_city['city_name']."'>".$assoc_city['city_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="organisation" class="col-sm-3 control-label">ORGANISATION
                                    TYPE<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="organisation_type"
                                        id="organisation_type">
                                        <option value="" selected="selected:true">Select Organisation type</option>
                                        <option value="MNC">MNC</option>
                                        <option value="NGO">NGO</option>
                                        <option value="Small Business">Small Business</option>
                                        <option value="Startup">Startup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">WORK EMAIL<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">PASSWORD<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="referral" class="col-sm-3 control-label">REFERRAL TYPE<sup>*</sup></label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="referral_type"
                                        id="referral_type">
                                        <option value="">Select Referral</option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2</option>
                                        <option value="Option 3">Option 3</option>
                                        <option value="Option 4">Option 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="terms"> By signing up you agree to our <a href="#">terms
                                        and conditions</a>.
                                </label>
                            </div>
                            <br />
                            <input type="submit" class="btn btn-success" value="Sign in" />
                            <br />
                            <a href="index.html">Already have an account? Login Now!</a>
                        </div>
                </div>
                <!-- /.box-footer -->
                </form>
            </div>
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
    <!-- Select2 -->
    <script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/custom_js/jquery.validate.min.js"></script>
    <script src="assets/custom_js/additional-methods.min.js"></script>
    <script src="assets/custom_js/organisation_signup.js"></script>
</body>

</html>