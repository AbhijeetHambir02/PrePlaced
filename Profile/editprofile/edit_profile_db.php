<?php

    session_start();

    if(isset($_SESSION['user_email'])){

        include "../../connectiondb.inc.php";
        $user_email=$_SESSION['user_email'];

        if(isset($_POST["editprofile_sbtn"])){
            $user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
            $user_birthdate=mysqli_real_escape_string($conn,$_POST['user_birthdate']);

            $sql="UPDATE users SET user_name='$user_name',user_birthdate='$user_birthdate' WHERE user_email='$user_email' AND signup_verification='Verified';";
            $result = mysqli_query($conn,$sql);

            header("Location: ../profile.php?result=profileupdated");
		    exit();

        }
        else{
            header("Location: ../profile.php?result=dberror");
		    exit();
        }
        
    }
    else
	{
		header("Location: ../../login/signin.php");
		exit();
	}
?>