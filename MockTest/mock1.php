<?php
    include "../connectiondb.inc.php"; 
    session_start();

    if(!isset($_SESSION['user_email']))
    {
        header('Location: ../login/signin.php');
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
 

    <!-- CONTENT START-->

    <!-- Page header -->
    <div class="bg-primary">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="py-4 py-lg-6">
                <h1 class="mb-0 text-white display-4">Mock Test</h1>
                <p class="text-white mb-0 lead">
                    Get started by selecting topics from below
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>


    <!-- TOPICS START -->
        <div class="py-6">
            <div class="container">
                <div class="row mb-6">
                    <div class="col-md-12">
                        <!-- Nav -->
                        <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
                            <li class="nav-item ms-0" role="presentation">
                            <a class="nav-link active" id="most-popular-tab" data-bs-toggle="pill" href="#most-popular" role="tab"
                                aria-controls="most-popular" aria-selected="true">Topics</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="trending-tab" data-bs-toggle="pill" href="#trending" role="tab"
                                aria-controls="trending" aria-selected="false">Departments</a>
                            </li>
                        </ul>

                        <!-- Quantitative -->
                        <div class="tab-content" id="tabContent">
                            <!-- Tab Pane -->
                            <div class="tab-pane fade show active" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">
                                <li class="list-group-item">
                                    <!-- Toggle -->
                                    <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                                        href="#courseTwo" role="button" aria-expanded="false" aria-controls="courseTwo">
                                        <div class="me-auto fs-3 text-primary">
                                            Quantitative
                                        </div>
                                        <!-- Chevron -->
                                        <span class="chevron-arrow  ms-4">
                                        <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>
                                    
                                    <div class="collapse show" id="courseTwo" data-bs-parent="#courseAccordion">
                                        <div class="py-4 nav" id="course-tabOne" role="tablist" aria-orientation="vertical" style="display: inherit;">
                                            <div class="container">
                                                <div class="row">

                                                    <?php
                                                    
                                                        $query="SELECT DISTINCT TOPICNAME FROM quantitative ORDER BY TOPICNAME ASC;";
                                                        $result = mysqli_query($conn,$query);
                                                        $count = 0;

                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            
                                                            $sql_count="SELECT QUES_ID FROM quantitative WHERE TOPICNAME='".$row["TOPICNAME"]."';";
                                                            $result_count_1 = mysqli_query($conn,$sql_count);
                                                            $result_count_2 = mysqli_num_rows($result_count_1);
                                                            
                                                            if($result_count_2>20)
                                                            {
                                                                $count = $count+1;
                                                    ?>

                                                    <!-- INDIVIDUAL CARD -->
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                                        <!-- Card -->
                                                        <div class="card mb-3 card-hover">
                                                            <div class="d-flex justify-content-between align-items-center p-3">
                                                                <div class="d-flex">
                                                                    <?php echo '<b>'.$count.'.</b>'; ?>
                                                                    <div class="ms-3">
                                                                        <h4 class="mb-1">
                                                                            <a href="mock2.php?topicname=<?php echo $row["TOPICNAME"]; ?>&pagename=quantitative" class="text-inherit">
                                                                                <?php echo $row["TOPICNAME"]; ?>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- INDIVIDUAL CARD END -->
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <br>

                                <!-- Reasoning -->
                                <li class="list-group-item">
                                    <!-- Toggle -->
                                    <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                                        href="#courseThree" role="button" aria-expanded="false" aria-controls="courseThree">
                                        <div class="me-auto fs-3 text-primary">
                                        <!-- Title -->
                                            Reasoning
                                        </div>
                                        <!-- Chevron -->
                                        <span class="chevron-arrow  ms-4">
                                        <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>
                                    <!-- Row -->
                                    <!-- Collapse -->
                                    <div class="collapse show" id="courseThree" data-bs-parent="#courseAccordion">
                                        <div class="py-4 nav" id="course-tabTwo" role="tablist" aria-orientation="vertical" style="display: inherit;">         
                                            <div class="container">
                                                <div class="row">

                                                    <?php
                                                    
                                                    $query="SELECT DISTINCT TOPICNAME FROM reasoning ORDER BY TOPICNAME ASC;";
                                                    $result = mysqli_query($conn,$query);

                                                    $count = 0;
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $sql_count="SELECT QUES_ID FROM reasoning WHERE TOPICNAME='".$row["TOPICNAME"]."';";
                                                        $result_count_1 = mysqli_query($conn,$sql_count);
                                                        $result_count_2 = mysqli_num_rows($result_count_1);
                                                        
                                                        if($result_count_2>20)
                                                        {
                                                            $count = $count+1;
                                                    ?>
                                                    
                                                    <!-- INDIVIDUAL CARD -->
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                                        <!-- Card -->
                                                        <div class="card mb-3 card-hover">
                                                            <div class="d-flex justify-content-between align-items-center p-3">
                                                                <div class="d-flex">
                                                                    <?php echo '<b>'.$count.'.</b>'; ?>
                                                                    <div class="ms-3">
                                                                        <h4 class="mb-1">
                                                                            <a href="mock2.php?topicname=<?php echo $row["TOPICNAME"]; ?>&pagename=reasoning" class="text-inherit">
                                                                                <?php echo $row["TOPICNAME"]?>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- INDIVIDUAL CARD END -->
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <br>

                                <!-- Technical -->
                                <li class="list-group-item">
                                    <!-- Toggle -->
                                    <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                                        href="#courseFour" role="button" aria-expanded="false" aria-controls="courseFour">
                                        <div class="me-auto fs-3 text-primary">
                                        <!-- Title -->
                                            Technical
                                        </div>
                                        <!-- Chevron -->
                                        <span class="chevron-arrow  ms-4">
                                            <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>
                                    <!-- Row -->
                                    <!-- Collapse -->
                                    <div class="collapse show" id="courseFour" data-bs-parent="#courseAccordion">
                                        <div class="py-4 nav" id="course-tabThree" role="tablist" aria-orientation="vertical" style="display: inherit;">
                                            <div class="container">
                                                <div class="row">

                                                    <?php
                                                    
                                                    $query="SELECT DISTINCT TOPICNAME FROM technical ORDER BY TOPICNAME ASC;";
                                                    $result = mysqli_query($conn,$query);

                                                    $count = 0;
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $sql_count="SELECT QUES_ID FROM technical WHERE TOPICNAME='".$row["TOPICNAME"]."';";
                                                        $result_count_1 = mysqli_query($conn,$sql_count);
                                                        $result_count_2 = mysqli_num_rows($result_count_1);
                                                    
                                                        if($result_count_2>20)
                                                        {
                                                            $count = $count+1;
                                                    ?>
                                                        
                                                    <!-- INDIVIDUAL CARD -->
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                                        <!-- Card -->
                                                        <div class="card mb-3 card-hover">
                                                        <div class="d-flex justify-content-between align-items-center p-3">
                                                            <div class="d-flex">
                                                                <?php echo '<b>'.$count.'.</b>'; ?>
                                                            <div class="ms-3">
                                                                <h4 class="mb-1">
                                                                    <a href="mock2.php?topicname=<?php echo $row["TOPICNAME"]; ?>&pagename=technical" class="text-inherit">
                                                                        <?php echo $row["TOPICNAME"]?>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!-- INDIVIDUAL CARD END -->
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>


                            <!-- Department wise topics -->
                            <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                            <div class="py-2">
                                    
                                <?php
                                    $dept_query = "SELECT DISTINCT NAME FROM departments";
                                    $dept_result = mysqli_query($conn, $dept_query);

                                    while($dept_row = mysqli_fetch_assoc($dept_result))
                                    {
                                        $tablename = $dept_row['NAME'];
                                ?>
                                <li class="list-group-item mb-4">
                                    <!-- Toggle -->
                                    <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                                        href="#courseTwo_<?php echo $tablename; ?>" role="button" aria-expanded="false" aria-controls="courseTwo">
                                        <div class="me-auto fs-3 text-primary">
                                            <?php echo $dept_row['NAME']; ?>
                                        </div>
                                        <!-- Chevron -->
                                        <span class="chevron-arrow  ms-4">
                                        <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>
                                    
                                    <div class="collapse show" id="courseTwo_<?php echo $tablename; ?>" data-bs-parent="#courseAccordion">
                                        <div class="py-4 nav" id="course-tabOne" role="tablist" aria-orientation="vertical" style="display: inherit;">
                                            <div class="container">
                                                <div class="row">

                                                    <?php
                                                    
                                                        $query = "SELECT DISTINCT TOPICNAME FROM $tablename ORDER BY TOPICNAME ASC";
                                                        $result = mysqli_query($conn, $query);
                                                        $count = 0;

                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            
                                                            $sql_count="SELECT QUES_ID FROM $tablename WHERE TOPICNAME='".$row["TOPICNAME"]."'";
                                                            $result_count_1 = mysqli_query($conn,$sql_count);
                                                            $result_count_2 = mysqli_num_rows($result_count_1);
                                                            
                                                            if($result_count_2>=20)
                                                            {
                                                                $count = $count+1;
                                                    ?>

                                                    <!-- INDIVIDUAL CARD -->
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                                        <!-- Card -->
                                                        <div class="card mb-3 card-hover">
                                                            <div class="d-flex justify-content-between align-items-center p-3">
                                                                <div class="d-flex">
                                                                    <?php echo '<b>'.$count.'.</b>'; ?>
                                                                    <div class="ms-3">
                                                                        <h4 class="mb-1">
                                                                            <a href="mock2.php?topicname=<?php echo $row["TOPICNAME"]; ?>&pagename=chemistry" class="text-inherit">
                                                                                <?php echo $row["TOPICNAME"]; ?>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- INDIVIDUAL CARD END -->
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                }
                                ?>
                            </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- TOPICS END -->
            
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