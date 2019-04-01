<?php
  session_start();
  include 'functions.php';
  $login_error = "";
  $username = isset($_POST['username'])?$_POST['username']:'';
  $password = isset($_POST['password'])?$_POST['password']:'';
  $category = isset($_POST['category'])?$_POST['category']:'';
  
  if($username!='' && $password!='')
  {
    if($category == 0){
      $sqlVerify = "select email from user_master where username='$username' and password='$password' and account_status=1";
      $user_verify = $db_con->query($sqlVerify);
      $row_count = $user_verify->num_rows;
      if($row_count == 1)
      {
        $row = $user_verify->fetch_assoc();
        $_SESSION['login_email'] = $row['email'];
        $_SESSION['category'] = 0;
        header("location:dashboard.php");
      }else{
        $login_error = "Invalid username or password";
      }
    }else if($category == 1){
      $sqlVerify = "select email from company_master where email='$username' and password='$password' and account_status=1";
      $company_verify = $db_con->query($sqlVerify);
      $row_count = $company_verify->num_rows;
      if($row_count == 1)
      {
        $row = $company_verify->fetch_assoc();
        $_SESSION['login_email'] = $row['email'];
        $_SESSION['category'] = 1;
        header("location:dashboard.php");
      }
    }
    
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login-Digihire</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/custom_css/login-style.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="assets/plugins/iCheck/all.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <div class="wrapper">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div>
          <img src="https://codebinary.in/img/codebinary.png" style="height:60px;width:60px;margin-top: 15px;" />
        </div>
        <?php
          $reg_check = isset($_GET['reg_check'])?$_GET['reg_check']:'';
          if($reg_check==1){
            echo "<p style='color:green;'>Congratulations! Your registration is successfull!</p>";
          }
        ?>

        <!-- Login Form -->
        <form action="" method="post" style="margin-bottom:20px;">
        <br />
          <div class="form-group">
            <label>
              <input type="radio" name="category" class="flat-green" checked value="0">
              Student
            </label>
            <label>
              <input type="radio" name="category" class="flat-green" value="1">
              Company
            </label>  
          </div>
          <?php
            if($login_error!=""){
              echo "<span style='color:red'>$login_error</span>";
            }
          ?>
          <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
          <br />
          <a href="#">Forgot Password?</a>
          <br /><br />
          <a href="user_signup.php" class="btn btn-success">Register Now!</a>
          <input type="submit" class="btn btn-primary" value="Log In">
        </form> 
      </div>
    </div>
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
</body>
</html>
