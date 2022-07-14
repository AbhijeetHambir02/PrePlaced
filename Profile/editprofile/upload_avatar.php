<?php

  session_start();
  include "../../connectiondb.inc.php";

  if(isset($_SESSION['user_email']))
  {
      $email=$_SESSION['user_email'];
  }
  else
  {
      header("Location: ../../login/signin.php");
      exit();
  }

  $target_dir = "../../assets/images/profile-pictures/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // // Check if image file is a actual image or fake image
  if(isset($_POST["submitpp"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      // echo "File is not an image.";
      header("Location: ../profile.php?result=invalidfile");
      exit();
    }
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  //   echo "Sorry, only JPG, JPEG, PNG are allowed.";
      header("Location: ../profile.php?result=invalidfile");
      exit();
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 1)
  {
      
      $temp = explode(".", $_FILES["fileToUpload"]["name"]);
      $newfilename = $email.'.' .end($temp);
      $target_file = $target_dir.$newfilename;
      
      
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          
          $sql="UPDATE users SET profile_pic_path='$target_file' WHERE user_email='$email' AND signup_verification='Verified';";
          $result = mysqli_query($conn, $sql);
          
          header("Location: ../profile.php?result=uploadsuccess");
          exit();
      } 
      else{
          header("Location: ../profile.php?result=dberror");
          exit();
      }
  }


?>