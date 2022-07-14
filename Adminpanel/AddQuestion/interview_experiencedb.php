<?php

    if(isset($_POST['submit'])){

        include"../../connectiondb.inc.php";

        $username=mysqli_real_escape_string($conn,$_POST["username"]);
        $username_email=mysqli_real_escape_string($conn,$_POST["email"]);
        $college_name=mysqli_real_escape_string($conn,$_POST["college"]);
        $company_name=mysqli_real_escape_string($conn,$_POST["company"]);
        $interview_location=mysqli_real_escape_string($conn,$_POST["location"]);
        $interview_date=mysqli_real_escape_string($conn,$_POST["date"]);
        $interview_title=mysqli_real_escape_string($conn,$_POST["title"]);
        $job_role=mysqli_real_escape_string($conn,$_POST["jobrole"]);
        $interview_details=$_POST["interview_details"];
        $interview_result=mysqli_real_escape_string($conn,$_POST["result"]);
        $tags=mysqli_real_escape_string($conn,$_POST["tags"]);

        echo $interview_details;
    //     $date=date("d-M-Y");
    //     $status="Unverified";
        

    //     $sql="INSERT INTO interview_experiences(interview_id,user_email,student_name,college_name,company_name,interview_title,job_role,interview_location,interview_details,date_of_interview,result,status,tags,date_added) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    //     $stmt=mysqli_stmt_init($conn);
        
    //     if(!mysqli_stmt_prepare($stmt,$sql))
    //     {
    //         header("Location: interview_experience?error=InternalError");
    //         exit();
    //     }
    //     else
    //     {
    //         mysqli_stmt_bind_param($stmt,"sssssssssssss",$username_email,$username,$college_name,$company_name,$interview_title,$job_role,$interview_location,$interview_details,$interview_date,$interview_result,$status,$tags,$date);
    //         mysqli_stmt_execute($stmt);

    //         header("Location: interview_experience.php?error=success");
    //         exit();
    //     }
    // }
    // else
    // {
    //     header("Location: interview_experience.php?error=InternalError");
    //     exit();
    }

?>