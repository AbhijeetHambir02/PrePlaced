<?php
    if(isset($_POST['resetpassword_btn']))
    {
        include "../connectiondb.inc.php";

        $email =  $_POST['user_email'];
        
        $query = "SELECT * FROM users WHERE user_email='$email'";
        $result = mysqli_query($conn, $query);
        $row_count = mysqli_num_rows($result);

        if($row_count>0)
        {
            $data = mysqli_fetch_assoc($result);
            $token = $data['signup_token'];

            $subject = "Password Reset";
            $message = "Hi, $email\n 
            Click Here to Reset your password.\n
            http://localhost/PrePlaced/login/reset_password.php?token=$token";

            $headers = "From: preplaced2022@gmail.com";

            if (mail($email, $subject, $message, $headers)) 
            {
                header("Location: forgotpassword.php?error=sent");
                exit();    
            } 
            else
            {
                header("Location: forgotpassword.php?error=notsent");
                exit();
            }                    
        }
        else
        {
            // user not found
            echo "User Not Found";
        }

    }
?>