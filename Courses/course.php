<?php
    include "../connectiondb.inc.php";
    session_start();

    if(isset($_GET['var']) && strlen($_GET['var'])>0)
    {
        $id = $_GET['var'];
    }
    else
    {
        header('location: courses.php');
        exit();
    }
?>

    <?php
        $query = "SELECT * FROM courses WHERE COURSE_ID='$id'";
        $result = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($result);
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
    <title>PrePlaced ||  <?php echo $data['COURSE_NAME']; ?></title>

    
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
    

    

    <div class="container">
        <!-- Page header -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div class="py-4 py-lg-6">
                    <h1 class="mt-4 text-center display-3"> <?php echo $data['TITLE']; ?></h1>
                    <p class="text-white mb-0 lead">
                    </p>
                </div>
                </div>
            </div>
        </div>

        <?php
            $convertedurl = str_replace("watch?v=","embed/",$data['EMBED']);
        ?>
        <div class="iframe-container">
            <iframe width="1150" height="548" src="<?php echo $convertedurl; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <?php
            $find='contenteditable="true"';
            $replace='contenteditable="false"';
            $show_interview=str_replace($find,$replace,$data['DETAIL']);
            
            $find='<input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">';
            $replace='';
            $show_details=str_replace($find,$replace,$data['DETAIL']);

        ?>
        
        <div class="mt-8">
            <p class="text-inherit" style="font-size:1.2rem;">
                <?php echo $show_details; ?>
            </p>
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