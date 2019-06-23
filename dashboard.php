<?php
    require 'functions.php';
    
    if($_SESSION['category']==0){
        include 'dashboard_student.php';
        echo "Student";
    }else if($_SESSION['category']==1){
        include 'dashboard_organisation.php';
    }    

?>