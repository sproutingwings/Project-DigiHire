<?php
    session_start();
    require 'settings/db.php';
    class User
    {
        public bool validate_user($username,$password)
        {
            $check = false;
            $user_data = $db_con->query("select * from user_master where username='"+$username+"' and password='"+$password+"'");
            if($user_data->num_rows>0)
            {
                $_SESSION['user_data'] = $user_data;
                $check = true;
            }
            return $check;
        }
    }
?>