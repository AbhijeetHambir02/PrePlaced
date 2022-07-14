<?php
     session_start();
    
    if(isset($_GET['topicname']) && isset($_GET['pagename']))
    {
        if(strlen($_GET['topicname'])>0 && strlen($_GET['pagename'])>0){
            include "../connectiondb.inc.php";

            $topicname = $_GET['topicname'];
            $tablename = $_GET['pagename'];

            $query = "SELECT * FROM $tablename WHERE TOPICNAME='$topicname'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            $tests = floor($count/20);

        }
        else
        {
            header('Location: mock1.php');
            exit();
        }
    }
    else
    {
        header('Location: mock1.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Preplaced is help students to improve their aptitude skills." />




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
    <title>Mock Test || PrePlaced</title>
</head>

<body>

    <!-- HEADER START -->
        <?php include "../header/header.php";?>
    <!-- HEADER END -->
 

    <!-- Page header -->
    <div class="bg-primary">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="py-4 py-lg-6">
                <h1 class="mb-0 text-white display-4"><?php echo $topicname;?></h1>
                <p class="text-white mb-0 lead">
                    Just one step ahead !
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="mb-10">
    <!-- SHOW TEST START -->

    <?php
    
    for($i=1; $i<=$tests;$i++)
    {
        $query = "SELECT * FROM $tablename WHERE TOPICNAME='$topicname';";
        $result = mysqli_query($conn, $query);
    ?>
    <!-- INDIVIDUAL TEST START -->
    
    <div class="pb-1 mt-3">
        <div class="container">
            <div class="col-lg-12 col-12 mb-1">
                <!-- Card -->
                <div class="card rounded-3">
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Toggle -->
                        <div class="h3 mb-0 d-flex align-items-center">
                            <div class="me-auto">
                                Test <?php echo $i;?>
                            </div>
                            <!-- Chevron -->
                            <span class="badge bg-primary"><i class="far fa-clock"></i> 20 mins</span>
                            <span class="badge bg-secondary mx-2"> 20 Questions</span>
                        </div>
                        <hr>
                        <div class="collapse show">
                            <div class="pt-1 pb-0">
                                <div class="h4 mb-2 d-flex justify-content-between align-items-center">
                                    <div class="text-truncate">
                                        <span class="text-primary me-2"><i class="fas fa-th-list"></i></span>
                                        <span><text style="font-weight: 500;">Category</text> : <?php echo ucfirst($tablename); ?></span>
                                    </div>
                            </div>
                                <div class="h4 mb-0 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                    <div class="text-truncate">
                                        <span class="text-primary me-2"><i class="fas fa-bookmark"></i></span>
                                        <span><text style="font-weight: 500;">Topic</text> : <?php echo ucfirst($topicname); ?></span>
                                    </div>
                                    <div class="mb-0">
                                        <span><a href="mock3.php?topicname=<?php echo $topicname; ?>&pagename=<?php echo $tablename; ?>&testno=<?php echo $i; ?>" class="btn btn-outline-success">Start Test</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- INDIVIDUAL TEST END-->
    
    <?php
    }?>
    </div>    
    
    <!-- SHOW TEST END -->
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