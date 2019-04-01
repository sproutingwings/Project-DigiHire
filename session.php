<?php
    require 'functions.php';
    if(!isset($_SESSION['login_email'])){
        header("location:index.php");
        die();
    }
    $user_check = $_SESSION['login_email'];
    $category = $_SESSION['category'];
    if($category == 0){
        $sqlSelectUser = $db_con->query("select * from user_master where username='$user_check'");
        $row = $sqlSelectUser->fetch_assoc();
        $user_id = $row['id'];
        $user_first_name =  $row['first_name'];
        $user_last_name = $row['last_name'];
        $user_adhaar_no = $row['adhaar_no'];
        $user_username = $row['username'];
        $user_phone_number = $row['phone_number'];
        $user_email = $row['email'];
    }else if($category == 1){
        $sqlSelectUser = $db_con->query("select * from company_master where email='$user_check'");
        $row = $sqlSelectUser->fetch_assoc();
        //$company_id =
    }
   

?>