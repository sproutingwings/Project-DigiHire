<?php
    session_start();
    require 'session.php';
    if($_SESSION['category']==0){
        //include 'student_dashboard.php';
        echo "Student";
    }else if($_SESSION['category']==1){
        //include 'company_dashboard.php';
        echo "Admin";
    }    

?>