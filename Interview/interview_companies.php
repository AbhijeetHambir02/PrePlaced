<?php
    include "../connectiondb.inc.php";
    session_start();
?>

<?php

    if(isset($_GET['companyname'])){
        if(strlen($_GET['companyname'])>0){
            $companyname = $_GET['companyname'];
        }
        else{
            header("Location: interview_companies.php");
            exit();
        }
    }
    else{
        header("Location: interview_companies.php");
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
    <title>PrePlaced || Interview Experiences    </title>
</head>

<body>

    <!-- HEADER START -->
        <?php include "../header/header.php";?>
    <!-- HEADER END -->
 

    <!-- CONTENT START-->

        <!-- Page header -->
        <div class="bg-primary py-4 py-lg-6">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div>
                    <h1 class="mb-0 text-white display-4"><?php echo $companyname;?></h1>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Content -->

        <!-- FETCH EXPERIENCES START-->
        <?php

            // include "../connectiondb.inc.php";

            $sql="SELECT * FROM interview_experiences WHERE company_name='$companyname' AND status='Verified';";
            $result = mysqli_query($conn,$sql);

            $count=mysqli_num_rows($result);

        ?>
        <!-- FETCH EXPERIENCES END-->

        <div class="py-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                        <div class="row d-lg-flex justify-content-between align-items-center">
                            <div class="col-md-6 col-lg-8 col-xl-9 ">
                            <h4 class="mb-3 mb-lg-0"><?php echo $count; ?> Experiences</h4>
                            </div>
                            <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3 ">
                            <!-- List  -->
                            <!-- <select class="selectpicker" data-width="100%">
                                <option value="">Sort by</option>
                                <option value="Newest">Newest</option>
                                <option value="Free">Free</option>
                                <option value="Most Popular">Most Popular</option>
                                <option value="Highest Rated">Highest Rated</option>
                            </select> -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tab content -->
                    <div class="col-xl-12 col-lg-9 col-md-8 col-12">
                        <div class="tab-pane fade show active pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">

                        <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <!-- Card START-->
                            <div class="card mb-4 card-hover">
                                <div class="row g-0">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Card body -->
                                        <div class="card-body">
                                        <h3 class="mb-2 text-truncate-line-2 "><a href="interview_experience.php?int_id=<?php echo $row['interview_id'];?>" class="text-inherit"><?php echo $row['interview_title'];?></a></h3>
                                            <!-- List inline -->
                                            <?php $str=strip_tags($row['interview_details']);?>
                                        <p><?php echo substr($str,0,200);echo "<a href='interview_experience.php?int_id=".$row['interview_id']."'>... Read More</a>";?></p>
                                        <ul class="mb-5 list-inline">
                                            <li class="list-inline-item"><i class="far fa-clock me-1"></i><?php echo $row['date_of_interview'];?>
                                            </li>
                                            <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                                </rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                                </rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                                </rect>
                                            </svg><?php echo $row['company_name'];?></li>
                                            <li class="list-inline-item"> <span>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                            </span>
                                            <span class="text-warning">4.5</span>
                                            <span class="fs-6 text-muted">(9,300)</span></li>
                                        </ul>
                                        <!-- Row -->
                                        <div class="row align-items-center g-0">
                                            <div class="col-auto">
                                            <img src="../assets/images/avatar/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
                                            </div>
                                            <div class="col ms-2">
                                            <span><?php echo $row['student_name'];?></span>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                            </div>
                                            <div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>

                            <!-- CARD END -->
                        </div>
                    </div>

                    <!--  -->
                </div>
            </div>
        </div>


    <!-- CONTENT END -->

    <!-- ADD EXPERIENCE END -->
            
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
<script src="../assets/js/theme.min.js"></script>

</body>
</html>