<?php
    include "../connectiondb.inc.php";
    session_start();
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
    <title>PrePlaced || Interview Questions</title>
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
                        <h1 class="mb-0 text-white display-4">Interview Questions</h1>
                        <p class="text-white mb-0 lead">
                            Don't be nervous, you have great potential. All the best!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Content -->
    <div class="py-2">
        <div class="container">
            <div class="row mb-6">
                <div class="col-md-12">
                    <!-- Nav -->
                    <ul class="nav nav-lb-tab mb-2" id="tab" role="tablist">
                        <li class="nav-item ms-0" role="presentation">
                        <a class="nav-link active" id="most-popular-tab" data-bs-toggle="pill" href="#most-popular" role="tab"
                            aria-controls="most-popular" aria-selected="true">Basic Questions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link" id="trending-tab" data-bs-toggle="pill" href="#trending" role="tab"
                            aria-controls="trending" aria-selected="false">HR Questions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link" id="trending1-tab" data-bs-toggle="pill" href="#trending1" role="tab"
                            aria-controls="trending1" aria-selected="false">Technical Questions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link" id="trending2-tab" data-bs-toggle="pill" href="#trending2" role="tab"
                            aria-controls="trending2" aria-selected="false">Companies</a>
                        </li>
                    </ul>

                    <!-- Basic Questions start -->

                    <?php

                        // include "../connectiondb.inc.php";

                        $sql="SELECT * FROM interview_question WHERE Q_TYPE='Basic'";
                        $result = mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($result);

                    ?>
                    <div class="tab-content" id="tabContent">
                        <div class="tab-pane fade show active" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">
                            <div class="py-6">
                                <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-xl-8 col-md-6 col-12">
                                            <h4 class="mb-3 mb-md-0">Total <?php echo $count; ?> Questions</h4>
                                        </div>
                                        <!-- <div class="col-xl-2 col-md-3 col-6 pe-0"> -->
                                        <!-- Custom select -->
                                        <!-- <select class="selectpicker" data-width="100%" >
                                            <option value="">Category</option>
                                            <option value="2">Design</option>
                                            <option value="3">Development</option>
                                            <option value="3">Program</option>
                                        </select>
                                        </div> -->
                                        <!-- Custom select -->
                                        <!-- <div class="col-xl-2 col-md-3 col-6">
                                        <select class="selectpicker" data-width="100%">
                                            <option value="">Sort by</option>
                                            <option value="1">Newest</option>
                                            <option value="2">Popularity</option>
                                            <option value="3">Rated</option>
                                        </select>
                                        </div> -->
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- Content -->

                            <div class="container">
                                <div class="row">

                                    <div class="col-xl-12 col-lg-9 col-md-8 col-12">
                                        <div class="tab-pane fade show active pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                        <?php
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                        ?>
                                            <div class="card mb-4 card-hover">
                                                <div class="row g-0">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <!-- Card body -->
                                                        <div class="card-body">
                                                            <h3 class="mb-2 text-truncate-line-2 "><a href="interview_question.php?int_id=<?php echo $row['QUES_ID'];?>" class="text-inherit"><?php echo $row['QUESTION'];?></a></h3>
                                                                <!-- List inline -->
                                                                <?php $str=strip_tags($row['ANSWER']);?>
                                                            <p> <?php echo substr($str,0,200);echo "<a href='interview_question.php?int_id=".$row['QUES_ID']."'>... Read More</a>";?></p>
                                                            <ul class="mb-5 list-inline">
                                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>
                                                                    <?php echo $row['DATE'];?>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <i class="fa fa-building" aria-hidden="true"></i>
                                                                    <?php echo ucfirst(strtolower($row['COMPANY'])) ;?>
                                                                </li>
                                                                <!-- <li class="list-inline-item"> <span>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                </span> -->
                                                                <!-- <span class="text-warning">4.5</span> -->
                                                                <!-- <span class="fs-6 text-muted">(9,300)</span></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic questiond end -->


                    
                        <!-- HR Questions START -->
                        
                        <?php
                            $sql="SELECT * FROM interview_question WHERE Q_TYPE='HR'";
                            $result = mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($result);
                        ?>
                        <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                            <div class="py-6">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-xl-8 col-md-6 col-12">
                                                <h4 class="mb-3 mb-md-0">Total <?php echo $count; ?> Questions</h4>
                                                </div>
                                                <!-- <div class="col-xl-2 col-md-3 col-6 pe-0"> -->
                                                <!-- Custom select -->
                                                <!-- <select class="selectpicker" data-width="100%" >
                                                    <option value="">Category</option>
                                                    <option value="2">Design</option>
                                                    <option value="3">Development</option>
                                                    <option value="3">Program</option>
                                                </select>
                                                </div> -->
                                                <!-- Custom select -->
                                                <!-- <div class="col-xl-2 col-md-3 col-6">
                                                <select class="selectpicker" data-width="100%">
                                                    <option value="">Sort by</option>
                                                    <option value="1">Newest</option>
                                                    <option value="2">Popularity</option>
                                                    <option value="3">Rated</option>
                                                </select>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="container">
                                <div class="row">
                                    
                                    <div class="col-xl-12 col-lg-9 col-md-8 col-12">
                                        <div class="tab-pane fade show active pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                        <?php
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                        ?>
                                            <div class="card mb-4 card-hover">
                                                <div class="row g-0">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <!-- Card body -->
                                                        <div class="card-body">
                                                            <h3 class="mb-2 text-truncate-line-2 "><a href="interview_question.php?int_id=<?php echo $row['QUES_ID'];?>" class="text-inherit"><?php echo $row['QUESTION'];?></a></h3>
                                                                <!-- List inline -->
                                                                <?php $str=strip_tags($row['ANSWER']);?>
                                                            <p> <?php echo substr($str,0,200);echo "<a href='interview_question.php?int_id=".$row['QUES_ID']."'>... Read More</a>";?></p>
                                                            <ul class="mb-5 list-inline">
                                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>
                                                                    <?php echo $row['DATE'];?>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <i class="fa fa-building" aria-hidden="true"></i>
                                                                    <?php echo ucfirst(strtolower($row['COMPANY'])) ;?>
                                                                </li>
                                                                <!-- <li class="list-inline-item"> <span>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                </span> -->
                                                                <!-- <span class="text-warning">4.5</span> -->
                                                                <!-- <span class="fs-6 text-muted">(9,300)</span></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- HR Questions END -->

                        <!-- Technical Questions START -->
                                            
                        <?php
                            $sql="SELECT * FROM interview_question WHERE Q_TYPE='Technical'";
                            $result = mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($result);

                        ?>
                        <div class="tab-pane fade" id="trending1" role="tabpanel" aria-labelledby="trending-tab">
                            <div class="py-6">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-xl-8 col-md-6 col-12">
                                                <h4 class="mb-3 mb-md-0">Total <?php echo $count; ?> Questions</h4>
                                                </div>
                                                <!-- <div class="col-xl-2 col-md-3 col-6 pe-0"> -->
                                                <!-- Custom select -->
                                                <!-- <select class="selectpicker" data-width="100%" >
                                                    <option value="">Category</option>
                                                    <option value="2">Design</option>
                                                    <option value="3">Development</option>
                                                    <option value="3">Program</option>
                                                </select>
                                                </div> -->
                                                <!-- Custom select -->
                                                <!-- <div class="col-xl-2 col-md-3 col-6">
                                                <select class="selectpicker" data-width="100%">
                                                    <option value="">Sort by</option>
                                                    <option value="1">Newest</option>
                                                    <option value="2">Popularity</option>
                                                    <option value="3">Rated</option>
                                                </select>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="container">
                                <div class="row">
                                    
                                    <div class="col-xl-12 col-lg-9 col-md-8 col-12">
                                        <div class="tab-pane fade show active pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                        <?php
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                        ?>
                                            <div class="card mb-4 card-hover">
                                                <div class="row g-0">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <!-- Card body -->
                                                        <div class="card-body">
                                                            <h3 class="mb-2 text-truncate-line-2 "><a href="interview_question.php?int_id=<?php echo $row['QUES_ID'];?>" class="text-inherit"><?php echo $row['QUESTION'];?></a></h3>
                                                                <!-- List inline -->
                                                                <?php $str=strip_tags($row['ANSWER']);?>
                                                            <p> <?php echo substr($str,0,200);echo "<a href='interview_question.php?int_id=".$row['QUES_ID']."'>... Read More</a>";?></p>
                                                            <ul class="mb-5 list-inline">
                                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>
                                                                    <?php echo $row['DATE'];?>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <i class="fa fa-building" aria-hidden="true"></i>
                                                                    <?php echo ucfirst(strtolower($row['COMPANY'])) ;?>
                                                                </li>
                                                                <!-- <li class="list-inline-item"> <span>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning me-n1"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                </span> -->
                                                                <!-- <span class="text-warning">4.5</span> -->
                                                                <!-- <span class="fs-6 text-muted">(9,300)</span></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Technical Questions END -->

                        <!-- Companies Questions START -->
                        
                    <?php
                        $sql="SELECT DISTINCT COMPANY FROM interview_question ORDER  BY COMPANY ASC";
                        $result = mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($result);

                    ?>
                        <div class="tab-pane fade" id="trending2" role="tabpanel" aria-labelledby="trending2-tab">
                            <div class="py-6">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-xl-8 col-md-6 col-12">
                                                <h4 class="mb-3 mb-md-0">Total <?php echo $count; ?> Companies</h4>
                                                </div>
                                                <!-- <div class="col-xl-2 col-md-3 col-6 pe-0"> -->
                                                <!-- Custom select -->
                                                <!-- <select class="selectpicker" data-width="100%" >
                                                    <option value="">Category</option>
                                                    <option value="2">Design</option>
                                                    <option value="3">Development</option>
                                                    <option value="3">Program</option>
                                                </select>
                                                </div> -->
                                                <!-- Custom select -->
                                                <!-- <div class="col-xl-2 col-md-3 col-6">
                                                <select class="selectpicker" data-width="100%">
                                                    <option value="">Sort by</option>
                                                    <option value="1">Newest</option>
                                                    <option value="2">Popularity</option>
                                                    <option value="3">Rated</option>
                                                </select>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="container">
                                <div class="row">
                                    <!-- card -->
                                    <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        { 
                                            $sql_count="SELECT QUES_ID FROM interview_question WHERE COMPANY='".$row["COMPANY"]."'";
                                            $result_count_1 = mysqli_query($conn,$sql_count);
                                            $result_count_2 = mysqli_num_rows($result_count_1);
                                    ?>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4 card-hover">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <div class="d-flex">
                                                <a class="h3" href="">
                                                    <!-- Img -->
                                                    <i class="fa fa-building p-2" aria-hidden="true"></i>
                                                </a>
                                                <div class="ms-2">
                                                    <h4 class="mb-0">
                                                    <a href="interview_ques_company.php?companyname=<?php echo $row["COMPANY"];?>&page=1" class="text-inherit">
                                                        <?php echo ucfirst(strtolower($row['COMPANY']));?>
                                                    </a>
                                                    </h4>
                                                    <p class="mb-0 fs-6">
                                                        <span class="me-2"><span class="text-dark fw-medium"><?php echo $result_count_2;?> Questions</span></span>
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
                        </div>
                        <!-- Companies Questions END -->



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->

      
      
            
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