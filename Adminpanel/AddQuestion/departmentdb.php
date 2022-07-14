<?php
    include "../../connectiondb.inc.php";

    if(isset($_POST['dept_submit']))
    {
        $department_name = mysqli_real_escape_string($conn, $_POST['dept_name']);
        
        $query = "INSERT INTO departments VALUES(DEFAULT, '$department_name')";
        $result = mysqli_query($conn, $query);


        
        $query1 = "CREATE TABLE $department_name (
            QUES_ID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            TOPICNAME VARCHAR(100) NOT NULL,
            QUESTION VARCHAR(1000) NOT NULL,
            OPTION_1 VARCHAR(100) NOT NULL,
            OPTION_2 VARCHAR(100) NOT NULL,
            OPTION_3 VARCHAR(100) NOT NULL,
            OPTION_4 VARCHAR(100) NOT NULL,
            CORRECT_OPTION INT(8) NOT NULL,
            EXPLANATION VARCHAR(2000) NOT NULL,
            DATE VARCHAR(100) NOT NULL)";

        $result1 = mysqli_query($conn, $query1);

        if($result && $result1)
        {
            header("Location: department.php?var=success");
            exit();
        }
        else
        {
            header("Location: department.php?var=InternalError");
            exit();
        }

    }


    if(isset($_POST['submit']))
    {
        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $topicname = mysqli_real_escape_string($conn, $_POST['topicname']);
        $question = mysqli_real_escape_string($conn, $_POST['question']);
        $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
        $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
        $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
        $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
        $ans = mysqli_real_escape_string($conn, $_POST['ans']);
        $explanation = mysqli_real_escape_string($conn, $_POST['explanation']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        if(!is_numeric($ans))
        {
            header("Location: department.php?error=InvalidAnswerFormat");
            exit();
        }


        $query = "INSERT INTO $dept VALUES (DEFAULT,'$topicname','$question','$option1','$option2','$option3','$option4','$ans','$explanation','$date')";
        $run = mysqli_query($conn, $query);

        if($run)
        {
            header("Location: department.php?error=success");
            exit();
        }
        else
        {
            header("Location: department.php?error=InternalError");
            exit();
        }
    }
?>