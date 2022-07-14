<?php
    
    session_start();
    // if(!isset($_SESSION["user_email"]))
    // {
    //     header("Location: login/signin.php");
    //     exit();
    // }
        include "../connectiondb.inc.php";
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
    <title>PrePlaced || Questions</title>
</head>

<body>
    <!-- HEADER START -->
        <?php include "../header/header.php"; ?>
    <!-- HEADER END -->
    
    <?php
        //Topicwise questions
        if(isset($_GET['topicname']) && strlen($_GET['topicname'])>0 && isset($_GET['pagename']) && strlen($_GET['pagename'])>0 && isset($_GET['page']) && strlen($_GET['page'])>0)
        {
            $tablename=$_GET['pagename'];
            $top_comp = $_GET['topicname'];
            $page = $_GET['page'];
            $top_comp_name = 'topicname';

            $limit = 20;
            $offset = ($page-1)*$limit;
            
            $query = "SELECT * FROM $tablename WHERE TOPICNAME='$top_comp' LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $query);
            
            $pagination_query = "SELECT * FROM $tablename WHERE TOPICNAME='$top_comp'";
            $pagination_result = mysqli_query($conn, $pagination_query);

            if(mysqli_num_rows($result)==0){
                header('Location: quantitative.php');
                exit();
            }
            $count = 0;
        }   
        //Companywise questions
        else if(isset($_GET['companyname']) && strlen($_GET['companyname'])>0 && isset($_GET['pagename']) && strlen($_GET['pagename'])>0 && isset($_GET['page']) && strlen($_GET['page'])>0)
        {
            $tablename=$_GET['pagename'];
            $top_comp = $_GET['companyname'];
            $page = $_GET['page'];
            $top_comp_name = 'companyname';
            
            $limit = 20;
            $offset = ($page-1)*$limit;

            $query = "SELECT * FROM $tablename WHERE COMPANY='$top_comp' LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $query);
            
            $pagination_query = "SELECT * FROM $tablename WHERE COMPANY='$top_comp'";
            $pagination_result = mysqli_query($conn, $pagination_query);

            if(mysqli_num_rows($result)==0){
                header('Location: quantitative.php');
                exit();
            }
            $count = 0;
        }
        else
        {
            if(isset($_GET['pagename']) && strlen($_GET['pagename'])>0)
            {
                $pagename = $_GET['pagename'];
                if($pagename == "quantitative")
                {
                    header('Location: quantitative.php?');
                    exit();
                }
                else if($pagename == "reasoning")
                {
                    header('Location: reasoning.php');
                    exit();
                }
                else if($pagename == "technical")
                {
                    header('Location: technical.php');
                    exit();
                }
                else
                {
                    header('Location: ../index.php');
                    exit();
                }
            }
            else
            {
                header('Location: ../index.php');
                exit();
            }
        }
    ?>
            <!-- PAGE HEADER START -->
            <div class="bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="py-4 py-lg-6">
                                <h1 class="mb-0 text-white display-4"><?php echo $top_comp; ?></h1>
                                <p class="text-white mb-0 lead">
                                    Practice ! Practice ! Practice !
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE HEADER END -->


            <?php
                $count=$offset;
                while($row = mysqli_fetch_array($result))
                {
                    $count=$count+1;
                    $Question_id = $row['QUES_ID'];
            ?>      
                
                    <!-- QUESTIONS START -->
                    <div class="col-md-12 col-md-8 col-12">
                        <!-- Card -->
                        <div class="card my-6 col-md-10 offset-md-1">
                            <!-- Card header -->
                            <div class="card-header" style="border-bottom:none;">
                                <p class="mb-0" style="font-size: 1.1rem; font-weight: 500;"><?php echo $count; echo '.'; echo $row['QUESTION'];?></p>
                            </div>
                            <!-- Card body -->
                            <div class="card-body py-0 px-4">
                                <!-- <form action="questions.php" method="POST"> -->
                                    <div class="pb-3 border-bottom" style="font-size: 1rem; font-weight: 400;" id="CheckAnswer">
                                        <div class="class">
                                            <input class="form-check-input" id="<?php echo $Question_id; ?>_1" type="radio" name="<?php echo $Question_id; ?>" value="1">
                                            <label class="form-check-label" for="<?php echo $Question_id; ?>_1"><?php echo $row['OPTION_1']; ?></label>
                                        </div>
                                        <div class="class">
                                            <input class="form-check-input" id="<?php echo $Question_id; ?>_2" type="radio" name="<?php echo $Question_id; ?>" value="2">
                                            <label class="form-check-label" for="<?php echo $Question_id; ?>_2"> <?php echo $row['OPTION_2']; ?></label>
                                        </div>
                                        <div class="class">
                                            <input class="form-check-input" id="<?php echo $Question_id; ?>_3" type="radio" name="<?php echo $Question_id; ?>" value="3">
                                            <label class="form-check-label" for="<?php echo $Question_id; ?>_3"> <?php echo $row['OPTION_3']; ?></label>
                                        </div>
                                        <div class="class">
                                            <input class="form-check-input" id="<?php echo $Question_id; ?>_4" type="radio" name="<?php echo $Question_id; ?>" value="4">
                                            <label class="form-check-label" for="<?php echo $Question_id; ?>_4"> <?php echo $row['OPTION_4']; ?></label>
                                        </div>
                                    </div>
                                <!-- </form> -->
                                
                                <!-- Success alert -->
                                <div id="C_<?php echo $row['QUES_ID']; ?>" class="Correct" style="display:none;">
                                    <div class="alert alert-success d-flex align-items-center p-1" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                        </svg>
                                        <div>
                                            Correct!
                                        </div>
                                    </div>
                                </div>
                                <!-- Danger alert -->
                                <div id="W_<?php echo $row['QUES_ID']; ?>" class="Wrong" style="display:none;">
                                    <div class="alert alert-danger d-flex align-items-center p-1" role="alert">
                                    <i class="fas fa-times-circle" style="font-size: 1.3rem;"></i>&nbsp
                                        <div>
                                            Wrong! 
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Explanation START -->
                            <li class="list-group-item">
                                <!-- Toggle -->
                                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                                    href="#courseThree_<?php echo $Question_id; ?>" role="button" aria-expanded="false">
                                    <div class="me-auto">
                                    <!-- Title -->
                                    Explanation
                                    </div>
                                    <!-- Chevron -->
                                    <span class="chevron-arrow  ms-4">
                                    <i class="fe fe-chevron-down fs-4"></i>
                                    </span>
                                </a>
                                <!-- Row -->
                                <!-- Collapse -->
                                <div class="collapse" id="courseThree_<?php echo $Question_id; ?>" data-bs-parent="#courseAccordion">
                                    <div class="py-2 nav" id="course-tabTwo" role="tablist" aria-orientation="vertical" style="display: inherit;">
                                        <a class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none disableClick"
                                            id="course-intro-tab2" data-bs-toggle="pill" href="#" role="tab" aria-controls="course-intro"
                                            aria-selected="true">
                                            <div class="">
                                                <span>
                                                    <?php echo $row['EXPLANATION']; ?>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Explanation START -->

                        </div>
                    </div>
                    

            <!-- JQuery to check correct ans -->
            <script>
                $(document).ready(function() 
                {
                    $("input[name$='<?php echo $Question_id; ?>']").click(function() 
                    {
                        var test = $(this).val();
                        var ans = '<?php echo $row['CORRECT_OPTION']; ?>';
                        
                        if(test == ans)
                        {
                            $("#W_<?php echo $Question_id; ?>").hide();
                            $("#C_<?php echo $Question_id; ?>").show();
                            $("#courseThree_<?php echo $Question_id; ?>").show();
                        }
                        else
                        {
                            $("#C_<?php echo $Question_id; ?>").hide();
                            $("#W_<?php echo $Question_id; ?>").show();
                        }
                    });
                });
            </script>

            <?php
                }
            ?>
            <!-- QUESTIONS END -->



    <!-- Pagination -->
    <div class="container d-flex justify-content-center my-8">
        <?php

            $total_records = mysqli_num_rows($pagination_result);
            $total_pages = ceil($total_records/$limit);
            $com = "companyname";
            if($page==1){
                $prev = 1;
            }
            else{
                $prev = $page-1;
            }

            if($page == $total_pages){
                $next = $total_pages;
            }
            else{
                $next = $page+1;
            }

            echo '<ul class="pagination">';
                echo '<li class="page-item"> <a class="page-link" href="questions.php?pagename='.$tablename.'&'.$top_comp_name.'='.$top_comp.'&page='.$prev.'" tabindex="-1" aria-disabled="true">Previous</a> </li>';
                for($i=1; $i<= $total_pages; $i++)
                {
                    echo '<li class="page-item"><a class="page-link" href="questions.php?pagename='.$tablename.'&'.$top_comp_name.'='.$top_comp.'&page='.$i.'">'.$i.'</a></li>';
                }
                echo '<li class="page-item"> <a class="page-link" href="questions.php?pagename='.$tablename.'&'.$top_comp_name.'='.$top_comp.'&page='.$next.'">Next</a> </li>';
            echo '</ul>';
        ?>
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