<?php

session_start();

if(isset($_SESSION['user_email'])){
    $user_email=$_SESSION['user_email'];

    include "../../connectiondb.inc.php";
    $sql="SELECT profile_pic_path FROM users WHERE user_email='$user_email' and signup_verification='Verified';";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    // DELETE FILE

    $filename = $row['profile_pic_path'];

    if (file_exists($filename)) {
        unlink($filename);

        $updated_avatar='../../assets/images/profile-pictures/preplaced_profile_pic.jpg';
        $sql="UPDATE users SET profile_pic_path='$updated_avatar' WHERE user_email='$user_email' AND signup_verification='Verified';";
        $result = mysqli_query($conn, $sql);

        header("Location: ../profile.php?result=avatardeleted");
        exit();
    } 
    else
    {
        $updated_avatar='../../assets/images/profile-pictures/preplaced_profile_pic.jpg';
        $sql="UPDATE users SET profile_pic_path='$updated_avatar' WHERE user_email='$user_email' AND signup_verification='Verified';";
        $result = mysqli_query($conn, $sql);
        
        header("Location: ../profile.php?result=dberror");
        exit();
    }
}
else{
    header("Location: ../../login/signin.php");
    exit();
}


?>