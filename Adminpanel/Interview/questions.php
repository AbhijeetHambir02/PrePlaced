<?php
    include "../../connectiondb.inc.php";

    if(isset($_GET['page']) && strlen($_GET['page'])>0)
    {
        $page=$_GET['page'];
    }
    else
    {
        $page=1;
    }

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
    <title>PrePlaced || Interview Questions</title>

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
                        <h1 class="mb-0 h2 fw-bold">Interview Questions</h1>
                    </div>
                </div>
            </div>
        </div>


        <!-- Fetching interview questions -->
        <?php
            $query = "SELECT * FROM interview_question LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $query);
        ?>
        <div class="row">
            <div class="col-12">
            <!-- card -->
            <div class="card">
                <!-- table -->
                <div class="table-responsive overflow-y-hidden">
                <table class="table mb-0 text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col" class=" border-top-0">Question</th>
                        </tr>
                    </thead>
                    <?php
                        $count=$offset;
                        while($data = mysqli_fetch_assoc($result))
                        {
                            $count+=1;
                    ?>
                    <tbody>
                    <tr>
                        <td class="align-middle ">
                            <div class="">
                                <h4 class="mb-0"><a href="question.php?var=<?php echo $data['QUES_ID']; ?>" class="text-inherit"><?php echo $count.". ".$data['QUESTION']; ?></a></h4>
                            </div>
                            <div class="ms-3">
                            <?php $str=strip_tags($data['ANSWER']);?>
                                <p class="text-muted"><span class="text-success">Answer:</span> <?php echo substr($str,0,140);echo "<a href='question.php?var=".$data['QUES_ID']."'>... Read More</a>";?></p>
                                                            
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                </div>
            </div>
            </div>
        </div>


        <!-- Pagination -->
    <div class="container d-flex justify-content-center my-4">
        <?php
            $pagination_query = "SELECT * FROM interview_question";
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
                echo '<li class="page-item"> <a class="page-link" href="questions.php?page='.$prev.'" tabindex="-1" aria-disabled="true">Previous</a> </li>';
                for($i=1; $i<= $total_pages; $i++)
                {
                    echo '<li class="page-item"><a class="page-link" href="questions.php?page='.$i.'">'.$i.'</a></li>';
                }
                echo '<li class="page-item"> <a class="page-link" href="questions.php?page='.$next.'">Next</a> </li>';
            echo '</ul>';
        ?>
    </div>
    
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