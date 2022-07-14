<?php
    include "../connectiondb.inc.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <!-- JQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>Courses | PrePlaced</title>
</head>

<body>
    <!-- Header -->
    <?php include "../header/header.php"; ?>

    <!-- Page header -->
    <div class="bg-primary mb-6">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="py-4 py-lg-6">
                <h1 class="mb-0 text-white display-4">Courses</h1>
                <p class="text-white mb-0 lead">
                    Select one in which you want to be perfect !
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>


    <?php
        $query = "SELECT * FROM course";
        $run = mysqli_query($conn, $query);
    ?>


    <div class="container">
        <div class="row">
            <?php 
                while($data = mysqli_fetch_assoc($run))
                {
                    $coursename = $data['COURSE_NAME'];
                    $query1 = "SELECT COURSE_ID FROM courses WHERE COURSE_NAME='$coursename'";
                    $run2 = mysqli_query($conn, $query1);
                    $videos = mysqli_num_rows($run2);
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <!-- card -->
                <div class="card mb-4 card-hover">
                    <!-- img -->
                    <div class="card-img-top">
                    <img src="<?php echo substr($data['FILE_PATH'],3); ?>" alt="" class="rounded-top-md img-fluid">
                    </div>
                    <!-- card body -->
                    <div class="card-body">
                    <h3 class="mb-0 fw-semi-bold"> <a href="playlist.php?var=<?php echo $data['COURSE_NAME']; ?>" class="text-inherit"><?php if($coursename == 'Cpp Programming'){ echo "C++ programming"; }else{ echo $coursename; } ?></a></h3>
                    <p class="mb-3"> By-<?php echo $data['TEACHER']; ?></p>
                    <div class="lh-1  d-flex justify-content-between">
                        <div>
                        <span class="fs-4">
                            <!-- <i class="mdi mdi-star text-warning"></i> -->
                            <span class="badge bg-warning ms-2">Free Course</span>
                            <!-- <span class="badge bg-warning ms-2">Free</span> -->
                        </span>
                        </div>
                        <!-- <div>
                            <span class="fs-6 text-muted"><span class="text-dark">9,692</span> Students</span>
                        </div> -->
                        <div>
                            <span class="fs-6 text-muted"><i class="fe fe-video text-warning me-1 fs-4"></i><span class="text-dark"><?php echo $videos; ?></span> Videos</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>


    <!-- Footer -->
    <?php include "../header/footer.php"; ?>

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
    <script src="../assets/js/theme.min.js"></script>
</body>
</html>