<?php
    if(isset($_POST['submit_btn']))
    {
        $token = $_POST['token'];
        $npassword = $_POST['npassword'];
        $cpassword = $_POST['cpassword'];


        if($npassword === $cpassword)
        {
            if(strlen($npassword)<6)
            {
                header("Location: reset_password.php?error=passwordlen");
                exit(); 
            }
            else
            {
                include "../connectiondb.inc.php";

                $ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                // Non-NULL Initialization Vector for encryption
                $encryption_iv = '1234567891011121';
                // Store the encryption key
                $encryption_key = "PrePlaced2022";
                // Use openssl_encrypt() function to encrypt the data
                $hashed_password = openssl_encrypt($npassword, $ciphering,$encryption_key, $options, $encryption_iv);

                $query = "UPDATE users SET user_password='$hashed_password' WHERE signup_token='$token'";
                $result = mysqli_query($conn, $query);

                if($query)
                {
                    header("Location: signin.php?error=passwordrest");
                    exit();        
                }
            }
        }
        else
        {
            header("Location: reset_password.php?error=passwordnotmatch");
            exit(); 
        }
    }  
?>