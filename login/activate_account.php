<?php
    if(isset($_GET['token']) && strlen($_GET['token'])>0 )
    {
        include "../connectiondb.inc.php";

        $token = $_GET['token'];

        $query = "UPDATE users SET signup_verification='Verified' WHERE signup_token='$token'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("Location: signin.php?error=AccountVerified");
            exit();
        }
        else
        {
            echo "Something went wrong !";
        }
    }
?>