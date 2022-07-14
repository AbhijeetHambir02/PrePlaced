<?php
    include "../../connectiondb.inc.php";

    if(isset($_POST['add_submit']))
    {
        $coursename = mysqli_real_escape_string($conn, $_POST['name']);
        $teacher = mysqli_real_escape_string($conn, $_POST['teacher']);
        $file = $_FILES["filename"];

        $filename = $file['name'];
        $file_tmp = $file['tmp_name'];
        $error = $file['error'];

        $file_ext = explode('.', $filename);
        $filecheck = strtolower(end($file_ext));

        $file_ext_array = array('png', 'jpg', 'jpeg');

        if(in_array($filecheck, $file_ext_array))
        {
            $destination_file = '../../assets/images/course/'.$filename;
            move_uploaded_file($file_tmp, $destination_file);
        }
        else
        {
            header("Location: course.php?var=FileTypeError");
            exit();
        }


        $query = "INSERT INTO course VALUES (DEFAULT,'$coursename','$teacher','$destination_file')";
        $run = mysqli_query($conn, $query);

        if($run)
        {
            header("Location: course.php?var=success");
            exit();
        }
        else
        {
            header("Location: course.php?var=InternalError");
            exit();
        }

    }

    if(isset($_POST['submit']))
    {
        $coursename = mysqli_real_escape_string($conn, $_POST['coursename']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $details = $_POST['details'];
        $embedcocde = mysqli_real_escape_string($conn, $_POST['embedcode']);


        $query = "INSERT INTO courses VALUES (DEFAULT,'$coursename','$title','$details','$embedcocde')";
        $run = mysqli_query($conn, $query);

        if($run)
        {
            header("Location: course.php?error=success");
            exit();
        }
        else
        {
            header("Location: course.php?error=InternalError");
            exit();
        }

        
    }
?>