<?php
    session_start();
    require 'functions.php';
    /*if(!isset($_SESSION['login_email'])){
        header("location:index.php");
        die();
    }*/
    //$user_check = $_SESSION['login_email'];
    //$category = $_SESSION['category'];
    /*if($category == 0){
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
        $sqlSelectCompany = $db_con->query("select * from company_profile where email='$user_check'");
        $row = $sqlSelectCompany->fetch_assoc();
        $company_id = $row['company_id'];
        $organisation_name = $row['organisation_name'];
        $established_in = $row['established_in'];
        $organisation_type = $row['organisation_type'];
        $field_work = $row['field_work'];
        $employees = $row['employees'];
        $about = $row['about'];
        $phone_number = $row['phone_number'];
        $address_line1 = $row['address_line1'];
        $address_line2 = $row['address_line2'];
        $city = $row['city'];
        $post_code = $row['post_code'];
        $video = $row['video'];
        $fb_url = $row['fb_url'];
        $linkedin_url = $row['linkedin_url'];
        $insta_url = $row['insta_url'];
        $twitter_url = $row['twitter_url'];
    }*/
   

?>