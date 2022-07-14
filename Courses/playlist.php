<?php
    include "../connectiondb.inc.php";
    session_start();

    if(isset($_GET['var']) && strlen($_GET['var'])>0)
    {
        $coursename = $_GET['var'];
    }
    else
    {
        header('location: courses.php');
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
    <!-- JQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>PrePlaced || <?php echo $coursename; ?></title>

    <style>
        .iframe-container{
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; 
        height: 0;
        }
        .iframe-container iframe{
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
        }
    </style>
</head>

<body>
    <!-- HEADER START -->
        <?php include "../header/header.php"; ?>
    <!-- HEADER END -->
    

    <!-- Page header -->
    <div class="bg-dark mb-6">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="py-4 py-lg-6">
                <h1 class="mb-0 text-white display-4"> Learn <?php if($coursename == 'Cpp Programming'){ echo "C++ programming"; }else{ echo $coursename; } ?></h1>
                <p class="text-white mb-0 lead">
                    Become Zero to Hero !
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <?php
        $query = "SELECT * FROM courses WHERE COURSE_NAME='$coursename'";
        $result = mysqli_query($conn, $query);
    ?>

    <!-- Playlist starts -->
    <div class="container">
        <div class="row">

            <?php
                $count = 0;
                while($row = mysqli_fetch_assoc($result))
                {
                    $count++;
                    $convertedurl = str_replace("watch?v=","embed/",$row['EMBED']);

            ?>
                <div class="col-12 col-md-6">
                    <div class="iframe-container py-4 col">
                        <iframe width="500" height="281" src="<?php echo $convertedurl; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-12 col-md-6 py-4">
                    <h3 class="mb-0 display-6"><?php echo '#'.$count.'. '.$row['TITLE']; ?></h3>
                    <?php $str=strip_tags($row['DETAIL']);?>
                    <p><?php echo substr($str,0,400); echo "<a href='course.php?var=".$row['COURSE_ID']."'>... Read More</a>";?></p>
                    
                    <div class="d-grid mt-8">
                        <a href="course.php?var=<?php echo $row['COURSE_ID']; ?>" class="btn btn-primary">View</a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>


    
    
        <!-- FOOTER START -->
        <?php include "../header/footer.php"; ?>
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
<script src="../assets/js/theme.min.js"></script>

</body>
</html>