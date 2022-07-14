<?php

    session_start();

    if(isset($_SESSION['user_email'])){

        include "../../connectiondb.inc.php";
        $user_email=$_SESSION['user_email'];

        if(isset($_POST["change_password_sbtn"])){

            $currentpassword=mysqli_real_escape_string($conn,$_POST['currentpassword']);
            $newpassword=mysqli_real_escape_string($conn,$_POST['newpassword']);
            $confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);

            $sql="SELECT user_password FROM users WHERE user_email='$user_email' AND signup_verification='Verified';";
            $result = mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

            // Hashing password
            $ciphering = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
            // Non-NULL Initialization Vector for encryption
            $encryption_iv = '1234567891011121';
            // Store the encryption key
            $encryption_key = "PrePlaced2022";
            $decrypted_password=openssl_decrypt ($row['user_password'], $ciphering,$encryption_key, $options, $encryption_iv);

            if($decrypted_password==$currentpassword){
                if($newpassword==$confirmpassword){

                    // HASH UPDATED PASSWORD
                    $hashed_password = openssl_encrypt($confirmpassword, $ciphering,$encryption_key, $options, $encryption_iv);
                    $sql="UPDATE users SET user_password='$hashed_password' WHERE user_email='$user_email' AND signup_verification='Verified';";
                    $result = mysqli_query($conn,$sql);

                    session_destroy();
                    header("Location: ../../login/signin.php?error=passwordchanged");
                    exit();
                }
                else{
                    header("Location: ../security.php?result=invalidconfirmpassword");
		            exit();    
                }
            }
            else{
                header("Location: ../security.php?result=invalidoldpassword");
		        exit();
            }
            
        }
        else{
            header("Location: ../security.php?result=dberror");
		    exit();
        }
        
    }
    else
	{
		header("Location: ../../login/signin.php");
		exit();
	}
?>