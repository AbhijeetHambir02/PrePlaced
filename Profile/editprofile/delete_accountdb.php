<?php
    if(isset($_POST['delete_account_btn']))
    {
        include "../../connectiondb.inc.php";
        session_start();
        
        // echo '<script>alert("Are you sure?\nYou want to delete account?")</script>';
        
        $query = "DELETE FROM users WHERE user_email='".$_SESSION['user_email']."'";
        $result = mysqli_query($conn, $query);
        
        session_unset();
        session_destroy();

        header('Location: ../../index.php');
        exit();

    }
?>