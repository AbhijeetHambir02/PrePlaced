<?php
    include "../connectiondb.inc.php";
    session_start();
?>

<?php
    if(isset($_GET['var']) && strlen($_GET['var'])>0)
    {
        $pagename = $_GET['var'];
    }
    else
    {
        header("Location: ../index.php");
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
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon-1.png">


<!-- Libs CSS -->
<link href="../assets/fonts/feather/feather.css" rel="stylesheet">
<link href="../assets/libs/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="../assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">







<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>PrePlaced || Topics</title>
</head>

<body>

    <!-- HEADER START -->
        <?php include "../header/header.php"; ?>
    <!-- HEADER END -->
 

    <!-- CONTENT START-->

    <!-- Page header -->
    <div class="bg-primary">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="py-4 py-lg-6">
                <h1 class="mb-0 text-white display-4">Topics</h1>
                <p class="text-white mb-0 lead">
                    Get started by selecting topics from below
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>

    <?php
        $query = "SELECT DISTINCT TOPICNAME FROM $pagename ORDER BY TOPICNAME ASC";
        $result = mysqli_query($conn, $query);
        

        $topic_count = mysqli_num_rows($result);
    ?>

    <div class="container">
        <div class="row py-6">
        <div class="mb-6">
            <h4 class="mb-3 mb-md-0">Total <?php echo $topic_count; ?> Topics</h4>
        </div>
            <?php
                $qno_count = 0;
                while($row = mysqli_fetch_assoc($result))
                {
                    $qno_count++;
                    $qcount_query = "SELECT QUES_ID FROM $pagename WHERE TOPICNAME='".$row["TOPICNAME"]."';";
                    $qcount_result = mysqli_query($conn,$qcount_query);
                    $ques_count = mysqli_num_rows($qcount_result);
            ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <!-- Card -->
                <div class="card mb-3 card-hover">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <div class="d-flex">
                    <div class="ms-3">
                        <h4 class="mb-1">
                        <a href="questions.php?topic=<?php echo $row["TOPICNAME"]; ?>&pagename=<?php echo $pagename; ?>&page=1" class="text-inherit">
                            <?php echo $ques_count.". ".$row["TOPICNAME"]; ?>
                        </a>
                        </h4>
                        <p class="mb-0 fs-6">
                        <span class="me-2"><span class="text-dark fw-medium"><?php echo $ques_count;?></span>
                            Questions</span>
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
            
    <!-- FOOTER START -->
        <?php include "../header/footer.php";?>
    <!-- FOOTER END -->

    <!-- Scripts -->
    <!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/odometer/odometer.min.js"></script>
<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/quill/dist/quill.min.js"></script>
<script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="../assets/libs/dragula/dist/dragula.min.js"></script>
<script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/typed.js/lib/typed.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>
<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="../assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="../assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>








<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>

</body>
</html>