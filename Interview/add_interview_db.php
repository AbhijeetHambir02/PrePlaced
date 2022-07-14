<?php

    if(isset($_POST['submit_btn'])){

        include"../connectiondb.inc.php";

        $username=mysqli_real_escape_string($conn,$_POST["username"]);
        $username_email=mysqli_real_escape_string($conn,$_POST["username_email"]);
        $college_name=mysqli_real_escape_string($conn,$_POST["college_name"]);
        $company_name=mysqli_real_escape_string($conn,$_POST["company_name"]);
        $interview_location=mysqli_real_escape_string($conn,$_POST["interview_location"]);
        $interview_date=mysqli_real_escape_string($conn,$_POST["interview_date"]);
        $interview_title=mysqli_real_escape_string($conn,$_POST["interview_title"]);
        $job_role=mysqli_real_escape_string($conn,$_POST["job_role"]);
        $interview_details=$_POST["interview_details"];
        $interview_result=mysqli_real_escape_string($conn,$_POST["interview_result"]);
        $tags=mysqli_real_escape_string($conn,$_POST["tags"]);

        $date=date("Y-m-d h:i:sa");
        $status="Unverified";
        
        

        $sql="INSERT INTO interview_experiences(interview_id,user_email,student_name,college_name,company_name,interview_title,job_role,interview_location,interview_details,date_of_interview,result,status,tags,date_added) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt=mysqli_stmt_init($conn);
        
        echo $sql;
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: add_interview.php?result=SQLERROR");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"sssssssssssss",$username_email,$username,$college_name,$company_name,$interview_title,$job_role,$interview_location,$interview_details,$interview_date,$interview_result,$status,$tags,$date);
            mysqli_stmt_execute($stmt);

            header("Location: add_interview.php?result=Added");
            exit();
        }
    }
    else{
        header("Location: add_interview.php");
        exit();
    }

?>