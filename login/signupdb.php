<?php

    if(isset($_POST['signup_btn']))
    {
        // database connection
        include "../connectiondb.inc.php";

        $user_email= mysqli_real_escape_string($conn,$_POST['user_email']);
        $user_name= mysqli_real_escape_string($conn,$_POST['user_name']);
        $user_password= mysqli_real_escape_string($conn,$_POST['user_password']);
        $user_cpassword= mysqli_real_escape_string($conn,$_POST['user_cpassword']);

        // check conditions
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user_name)){
            header("Location: signup.php?error=InvalidName");
            exit();
        }
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: signup.php?error=Invalid_Email_Error");
            exit();
        }            
        else
        {
            $sql="SELECT * from users WHERE user_email='$user_email'";
            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);
            
            if($count>0)
            {
                header("Location: signup.php?error=Existing_User_Error");
                exit();
            }
            // --------------------------------
    
            else
            {
                    if($user_password!=$user_cpassword)
                    {
                        header("Location: signup.php?error=PasswordNotSame");
                        exit();
                    }
                    else
                    {
                        // Hashing password
                        $ciphering = "AES-128-CTR";
                        $iv_length = openssl_cipher_iv_length($ciphering);
                        $options = 0;
                        // Non-NULL Initialization Vector for encryption
                        $encryption_iv = '1234567891011121';
                        // Store the encryption key
                        $encryption_key = "PrePlaced2022";
                        // Use openssl_encrypt() function to encrypt the data
                        $hashed_password = openssl_encrypt($user_cpassword, $ciphering,$encryption_key, $options, $encryption_iv);

                        if(strlen($user_password)<6)
                        {
                            header("Location: signup.php?error=Password_Length_Error");
                            exit();
                        }
                        else
                        {
                            
                            $signup_type="Email";
                            $signup_date=date("Y-m-d");
                            $signup_verification = "Not Verified";
                            $token = bin2hex(random_bytes(15));


                            $sql="INSERT INTO users(user_id,user_name,user_email,user_password,login_type,signup_date,signup_verification,signup_token) VALUES (DEFAULT,'$user_name','$user_email','$hashed_password','$signup_type','$signup_date','$signup_verification','$token');";
                            $result = mysqli_query($conn, $sql);  

                            // header("Location: ../sendemail/send_signup_verificaion.php?email=$email&token=$token");
                            // exit();
                            

                            if($result)
                            {
                                // $template_file = "Templates/signup_verification.php";
                                $subject = "Verify your PrePlaced email address";
                                $message = "Hi, $user_email\n 
                                YOU ARE ONE STEP AWAY! \n 
                                To complete your profile ans start participating tests, you need to activate your account.\n 
                                Click Here to Activate Account.\n
                                http://localhost/PrePlaced/login/activate_account.php?token=$token";

                                $headers = "From: preplaced2022@gmail.com";
                                // $headers .= "MIME-Version: PrePlaced\r\n";
                                // $headers .= "Content-type: text/html; charset=IOS-8859-1\r\n";

                                // if(file_exists($template_file))
                                // {
                                //     $message = file_get_contents($template_file);
                                // }
                                // else
                                // {
                                //     die("Enable to find template");
                                // }

                                if (mail($user_email, $subject, $message, $headers)) 
                                {
                                    header("Location: signin.php?error=verification");
                                    exit();    
                                } 
                                else
                                {
                                    echo "Email sending failed...";
                                }
                            }
                            else
                            {
                                echo "<script> alert('Something went wrong !'); </script>";
                            }
    
                            
                        }
    
                    }
                }

            }
    }
    else
    {
        header("Location: signup.php?error=InternalError");
        exit();
    }

?>

