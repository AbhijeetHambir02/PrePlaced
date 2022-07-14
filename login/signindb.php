<?php

    if(isset($_POST['signin_btn']))
    {
        include "../connectiondb.inc.php";
        
        $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

        // Remember me
        if(!empty($_POST["rememberme"]))   
        {  
            setcookie ("user_email",$user_email,time()+ (10 * 365 * 24 * 60 * 60));  
            setcookie ("user_password",$user_password,time()+ (10 * 365 * 24 * 60 * 60));
        }
        else
        {
            if(isset($_COOKIE["user_email"]))   
            {  
                setcookie ("user_email","");  
            }  
            if(isset($_COOKIE["user_password"]))   
            {  
                setcookie ("user_password","");  
            }
        }

        $query = "SELECT user_password FROM users WHERE user_email='$user_email' AND login_type='Email' AND signup_verification='Verified';";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        // Hashing password
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';
        // Store the encryption key
        $encryption_key = "PrePlaced2022";

        $decrypted_password=openssl_decrypt ($row['user_password'], $ciphering,$encryption_key, $options, $encryption_iv);

        if($user_password==$decrypted_password)
        {   
            $query = "SELECT * FROM users WHERE user_email='$user_email' AND login_type='Email' AND signup_verification='Verified';";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);

            if($count>0)
            {
                session_start();
                $_SESSION["user_email"]=$user_email;
                header('Location: ../index.php');
                exit();
            }
            else
            {
                header("Location: login.php?error=InvalidDetails");
                exit();
            }
        }
        else
        {
            header("Location: signin.php?error=InvalidDetails");
            exit();
        }
    }
    else
    {
        header("Location: signin.php");
        exit();
    }
?>