<?php
    include "../../connectiondb.inc.php";

    if(isset($_GET['var']) && strlen($_GET['var']))
    {
        $int_id = $_GET['var'];
    }
    else
    {
        header("Location: experiences.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="PrePlaced helps students to improve their aptitude skills" />


<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon-1.png">


<!-- Libs CSS -->
<link href="../../assets/fonts/feather/feather.css" rel="stylesheet">
<link href="../../assets/libs/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="../../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="../../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="../../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="../../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="../../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="../../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="../../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="../../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="../../assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">



<!-- Theme CSS -->
<link rel="stylesheet" href="../../assets/css/theme.min.css">
    <title>PrePlaced || Interview Experience</title>

</head>
<body>

    <div id="db-wrapper">
        <?php
            include "../sidebar/sidebar.php";
        ?>
    <div id="page-content">
        <?php
            include "../sidebar/header.php";
        ?>


    <div class="container-fluid p-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-0 h2 fw-bold">Interview Experience</h1>
                    </div>
                </div>
            </div>
        </div>


        <?php

            $query = "SELECT * FROM interview_experiences WHERE interview_id='$int_id'";
            $result = mysqli_query($conn, $query);
        ?>
        <div class="row">
            <?php
                while($data = mysqli_fetch_assoc($result))
                {
            ?>
            <div class="card smooth-shadow-md">
                <!-- card body  -->
                <div class="card-body">
                    <div class="my-60">
                        <h1 class="mb-6 fw-bold "><?php echo $data['interview_title']; ?></h1>
                        <div class="mb-4">
                            <p class="mt-2 text-info text-inherit h3">Job Role : <span class="text-inherit h3 px-2"><?php echo ucwords(strtolower($data['job_role'])); ?></span></p>
                        </div>
                        <p class="m-0 text-success text-inherit h3">Details:</p>
                        <p class="text-inherit" style="font-size:1.2rem;">
                            <?php
                            $find='contenteditable="true"';
                            $replace='contenteditable="false"';
                            $show_interview=str_replace($find,$replace,$data['interview_details']);
                            
                            $find='<input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">';
                            $replace='';
                            $show_interview=str_replace($find,$replace,$data['interview_details']);
        
                            echo $show_interview;
                            ?>
                        </p>
                    </div>
                    <div>
                        <p class="mt-6 text-primary text-inherit h3">Company : <span class="text-inherit h3 px-2"><?php echo ucwords(strtolower($data['company_name'])); ?></span></p>
                    </div>
                    <div>
                        <p class="mt-2 text-primary text-inherit h3">Location : <span class="text-inherit h3 px-2"><?php echo ucfirst($data['interview_location']); ?></span></p>
                    </div>
                    <div>
                        <p class="mt-2 text-primary text-inherit h3">Date of Interview : <span class="text-inherit h3 px-2"><?php echo $data['date_of_interview']; ?></span></p>
                    </div>
                    <div>
                        <p class="mt-2 text-primary text-inherit h3">Result : <span class="text-success h3 px-2"><?php echo $data['result']; ?></span></p>
                    </div>
                    <div class="mt-6">
                        <p class="mt-2 text-primary text-inherit h3">Student : <span class="text-inherit h3 px-2"><?php echo ucwords(strtolower($data['student_name'])); ?></span></p>
                    </div>
                    <div>
                        <p class="mt-2 text-primary text-inherit h3">College : <span class="text-inherit h3 px-2"><?php echo ucwords($data['college_name']); ?></span></p>
                    </div>
                </div>
            </div>
            <h4 class="mb-2 text-end"><a href="experiences.php"><button type="button" class="btn btn-primary mt-4 p-2 px-4 mx-4">Back</button></a></h4>
            <?php
                }
            ?>
        </div>
    </div>          


    </div>
    </div>

 
    <!-- Libs JS -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/odometer/odometer.min.js"></script>
    <script src="../../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="../../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
    <script src="../../assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="../../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="../../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="../../assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="../../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="../../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="../../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="../../assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="../../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="../../assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="../../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../../assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="../../assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="../../assets/js/theme.min.js"></script>
</body>
</html>