<?php
    session_start();
    $db_con = new mysqli("localhost","root","","db_digihire");
    if($db_con->errno){
		die('Error In database Connnectivity');
	}
?>