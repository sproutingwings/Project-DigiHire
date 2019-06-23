<?php
    require 'functions.php';

    $json_id = isset($_POST['json_id'])?$_POST['json_id']:'';
    if($json_id==1){
        $job_title = isset($_POST['job_title'])?$_POST['job_title']:'';
        $return_arr = array();
        $result = $db_con->query("select * from job_description where job_title='$job_title'");
        $row = $result->fetch_assoc();
        $row_array['responsibilities'] = $row['responsibilities'];
        $row_array['skills'] = $row['skills'];
        array_push($return_arr,$row_array);
        echo json_encode($return_arr);
    }
    if($json_id==2)
    {
        $company_id = isset($_SESSION['company_id'])?$_SESSION['company_id']:'';
        $return_arr = array();
        $result = $db_con->query("select * from posted_intership where company_id=".$company_id);
        $sum=0;
        while($row = $result->fetch_assoc())
        {
            $row_array['job_title'] = $row['job_title'];
            $row_array['internship_id'] = $row['internship_id'];
            $row_array['posting_date'] = date('d-m-Y',strtotime($row['posting_date']));
            $date1 = date_create(date('d-m-Y'));
            $date2 = date_create($row['posting_date']);
            $difference = $date1->diff($date2);
            $row_array['data'] = 21 - $difference->d; 
            if((21-$difference->d)<0)
            {
                $row_array['status']='Inactive';
                $row_array['expire_days'] = 'Expired';
            }
            else
            {
                $row_array['status']='Active';
                $row_array['expire_days'] = 21 - $difference->d;
            }
            $row_array['candidate_applied']=$row['candidate_applied'];
            $result2 = $db_con->query("select sum(user_id) as candidate_count from candidate_application where internship_id =".$row['internship_id']);
            $row2 = $result2->fetch_assoc();
            $sum = $row2['candidate_count']+$sum; 
            array_push($return_arr,$row_array);            
        }
        $result1 = $db_con->query("select posted_internship_count from company_profile where company_id = $company_id");
        $row1 = $result1->fetch_assoc();
        $return_arr['posted_internship'] = $row1['posted_internship_count'];
        $return_arr['candidate_count'] = $sum;        
        echo json_encode($return_arr);
    }
    if($json_id==4)
    {
        session_destroy();
        echo "1";
    }
    if($json_id==5)
    {
        $return_arr = array();
        $data = $_POST['user_input'];
        $result = $db_con->query("select DISTINCT job_title,organisation_name,about,internship_id,responsibility,skills,salary,location,minimum_qualification,category from (posted_intership INNER join company_profile on posted_intership.company_id = company_profile.company_id) WHERE (company_profile.organisation_name LIKE '%".$data."%') and status=1");
        if($result!=NULL)
        {
            while($row = $result->fetch_assoc())
            {
                array_push($return_arr,$row);
            }
        }    
        echo json_encode($return_arr);
    }
    if($json_id==6){
        $internship_id = $_POST['internship_id'];
        $user_id = 1;//$_SESSION['user_id'];
        $result = $db_con->query("select * from candidate_application where job_id=$internship_id and user_id=$user_id");
        $count = mysqli_num_rows($result);
        if($count!=0){
            echo "0";
        }else{
            $db_con->query("insert into candidate_application(user_id,job_id,status) values($user_id,$internship_id,'Submitted')");
            $db_con->query("update posted_intership set candidate_applied=candidate_applied + 1 where internship_id=$internship_id");
            echo "1";        
        }
    }
    if($json_id==7){
        $return_arr = array();
        $result = $db_con->query("select DISTINCT job_title,posting_date,organisation_name,about,internship_id,responsibility,skills,salary,location,minimum_qualification,category from (posted_intership INNER join company_profile on posted_intership.company_id = company_profile.company_id) WHERE status=1 LIMIT 15");
        if($result!=NULL)
        {
            while($row = $result->fetch_assoc())
            {
                $row['posting_date'] = date('d-m-Y',strtotime($row['posting_date']));
                array_push($return_arr,$row);
            }
        }    
        echo json_encode($return_arr);
    }

?>