<?php
    if(isset($_POST['submit']))
    {
        include "../../connectiondb.inc.php";
        
        $qtype = mysqli_real_escape_string($conn, $_POST['qtype']);
        $question = mysqli_real_escape_string($conn, $_POST['question']);
        $ans = mysqli_real_escape_string($conn, $_POST['ans']);
        $company = mysqli_real_escape_string($conn, $_POST['company']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);


        $query = "INSERT INTO interview_question VALUES (DEFAULT, '$qtype', '$question', '$ans', '$company', '$date')";
        $run = mysqli_query($conn, $query);
        

        header("Location: interview_question.php?error=success");
        exit();
    }
    else
    {
        header("Location: interview_question.php?error=InternalError");
        exit();
    }
?>