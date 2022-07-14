<?php
    include "../../connectiondb.inc.php";


    if(isset($_GET['pagename']) && isset($_GET['topicname']) && strlen($_GET['pagename'])>0 && strlen($_GET['topicname'])>0 && isset($_GET['page']) && strlen($_GET['page'])>0)
    {
        $tablename = $_GET['pagename'];
        $topicname = $_GET['topicname'];
        $page = $_GET['page'];
    }
    else
    {
        header("Location: aptitude_topic.php");
        exit();
    }
?>


<?php
    $limit = 20;
    $offset = ($page-1)*$limit;
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
    <title>PrePlaced || Aptitude</title>

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


        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-0 h2 fw-bold"><?php echo ucwords($topicname); ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                    $query = "SELECT * FROM $tablename WHERE TOPICNAME='$topicname' LIMIT {$offset},{$limit}";
                    $result = mysqli_query($conn, $query);
                
                    $count = $offset;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $Question_id = $row['QUES_ID'];
                        $count+=1;

                 ?>
                <div class="col-md-12 col-md-12 col-12 mb-4">
                    <!-- Card -->
                    <div class="card my-2 col-md-12 smooth-shadow-md">
                        <!-- Card header -->
                        <div class="card-header" style="border-bottom:none;">
                            <div class="text-inherit h3 border-bottom"> Question <?php echo $count; ?></div>
                            <p class="mb-0 text-inherit" style="font-size: 1.1rem;"><?php echo $row['QUESTION']; ?></p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body py-0 px-4">
                            <div class="pb-0 border-bottom" id="CheckAnswer">
                                <div class="class">
                                    <p class="mb-0 text-inherit" style="font-size: 1.1rem;"><span class="text-muted">Option 1: </span><?php echo $row['OPTION_1']; ?></p>
                                </div>
                                <div class="class">
                                    <p class="mb-0 text-inherit" style="font-size: 1.1rem;"><span class="text-muted">Option 2: </span><?php echo $row['OPTION_2']; ?></p>
                                </div>
                                <div class="class">
                                    <p class="mb-0 text-inherit" style="font-size: 1.1rem;"><span class="text-muted">Option 3: </span><?php echo $row['OPTION_3']; ?></p>
                                </div>
                                <div class="class">
                                    <p class="mb-0 text-inherit" style="font-size: 1.1rem;"><span class="text-muted">Option 4: </span><?php echo $row['OPTION_4']; ?></p>
                                </div>
                                <div class="class">
                                    <p class="mt-3 text-inherit" style="font-size: 1.1rem;"><span class="text-success">Correct Option: </span><?php echo $row['CORRECT_OPTION']; ?></p>
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
                <?php
                    }
                ?>

                <!-- Pagination -->
    <div class="container d-flex justify-content-center my-4">
        <?php
            $pagination_query = "SELECT * FROM $tablename WHERE TOPICNAME='$topicname'";
            $pagination_result = mysqli_query($conn, $pagination_query);

            $total_records = mysqli_num_rows($pagination_result);
            $total_pages = ceil($total_records/$limit);
            
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
                echo '<li class="page-item"> <a class="page-link" href="questions.php?pagename='.$tablename.'&topicname='.$topicname.'&page='.$prev.'" tabindex="-1" aria-disabled="true">Previous</a> </li>';
                for($i=1; $i<= $total_pages; $i++)
                {
                    echo '<li class="page-item"><a class="page-link" href="questions.php?pagename='.$tablename.'&topicname='.$topicname.'&page='.$i.'">'.$i.'</a></li>';
                }
                echo '<li class="page-item"> <a class="page-link" href="questions.php?pagename='.$tablename.'&topicname='.$topicname.'&page='.$next.'">Next</a> </li>';
            echo '</ul>';
        ?>
    </div>


            </div>
            <h4 class="mb-2 text-end"><a href="aptitude_topic.php?var=<?php echo $tablename; ?>"><button type="button" class="btn btn-primary mt-4 p-2 px-4 mx-4">Back</button></a></h4>
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