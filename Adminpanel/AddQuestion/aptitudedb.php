<?php
    if(isset($_POST['submit']))
    {
        include "../../connectiondb.inc.php";


        $qtype = mysqli_real_escape_string($conn, $_POST['qtype']);
        $topicname = mysqli_real_escape_string($conn, $_POST['topicname']);
        $question = mysqli_real_escape_string($conn, $_POST['question']);
        $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
        $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
        $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
        $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
        $ans = mysqli_real_escape_string($conn, $_POST['ans']);
        $explanation = mysqli_real_escape_string($conn, $_POST['explanation']);
        $comapny = mysqli_real_escape_string($conn, $_POST['company']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        if(!is_numeric($ans))
        {
            header("Location: aptitude.php?error=InvalidAnswerFormat");
            exit();
        }


        if($qtype == "quantitative")
        {
            $query = "INSERT INTO quantitative VALUES (DEFAULT,'$topicname','$question','$option1','$option2','$option3','$option4','$ans','$explanation','$comapny','$date')";
            $run = mysqli_query($conn, $query);

            header("Location: aptitude.php?error=success");
            exit();
        }
        else if($qtype == "reasoning")
        {
            $query = "INSERT INTO reasoning VALUES (DEFAULT,'$topicname','$question','$option1','$option2','$option3','$option4','$ans','$explanation','$comapny','$date')";
            $run = mysqli_query($conn, $query);
            
            header("Location: aptitude.php?error=success");
            exit();
        }
        else if($qtype == "technical")
        {
            $query = "INSERT INTO technical VALUES (DEFAULT,'$topicname','$question','$option1','$option2','$option3','$option4','$ans','$explanation','$comapny','$date')";
            $run = mysqli_query($conn, $query);

            header("Location: aptitude.php?error=success");
            exit();
        }
        else
        {
            header("Location: aptitude.php?error=InternalError");
            exit();
        }
        

    }
    else
    {
        header("Location: aptitude.php?error=InternalError");
        exit();
    }
?>