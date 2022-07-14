<?php
    include "../../connectiondb.inc.php";
    $id = $_POST['id'];
    
    if(isset($_POST['delete_exp']))
    {

        $delete_query = "DELETE FROM interview_experiences WHERE interview_id='$id'";
        $delete_result = mysqli_query($conn, $delete_query);

        header("Location: unverified_interview_experiences.php?success=deleted");
        exit();
    }
    else if(isset($_POST['submit_exp']))
    {
        $update_query = "UPDATE interview_experiences SET status='Verified' WHERE interview_id='$id'";
        $update_result = mysqli_query($conn, $update_query);

        header("Location: unverified_interview_experiences.php?success=verified");
        exit();
    }
    
?>