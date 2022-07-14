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
    <title>PrePlaced || Mock Tests Quantitative</title>

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
                        <h1 class="mb-0 h2 fw-bold">Mock tests of Quantitative</h1>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php
            $query = "SELECT * FROM test_result WHERE QTYPE='quantitative' ORDER BY CORRECT_ANS DESC";
            $result = mysqli_query($conn, $query);
            $num_rows = mysqli_num_rows($result);

        ?>
        <div class="row">
            <?php
                if($num_rows==0)
                {
                    ?>
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-0 h2 fw-bold text-muted text-center">No records found !</h1>
                    </div>
                <?php
                }
                else
                {
            ?>
            <div class="col-12">
                <div class="card">
                    <!-- table  -->
                    <div class="table-responsive">
                    <table class="table table-hover table-success mb-0">
                        <thead>
                        <tr class="table-primary">
                            <th class="py-3" style="font-size:1rem;">Sr</th>
                            <th class="py-3" style="font-size:1rem;">Name</th>
                            <th class="py-3" style="font-size:1rem;">Email</th>
                            <th class="py-3" style="font-size:1rem;">Topic</th>
                            <th class="py-3" style="font-size:1rem;">Aptitude</th>
                            <th class="py-3" style="font-size:1rem;">Score</th>
                            <th class="py-3" style="font-size:1rem;">Date</th>
                        </tr>
                        </thead>

                        <?php
                            $count=0;
                            while($data = mysqli_fetch_assoc($result))
                            {
                                $name_query = "SELECT user_name FROM users WHERE user_email='".$data["USER_EMAIL"]."'";
                                $name_result = mysqli_query($conn, $name_query);
                                $name = mysqli_fetch_assoc($name_result);
                                $count += 1;
                        ?>
                        <tbody>
                        <tr>
                            <td class="">
                                <span class="h4 text-inherit"> <?php echo $count."."; ?></span>
                            </td>
                            <td>
                                <a href="../User/user.php?var=<?php echo $data['USER_EMAIL']; ?>"><span class="h4 text-inherit"> <?php echo ucwords(strtolower($name['user_name'])); ?> </span></a>
                            </td>
                            <td>
                                <a href="../User/user.php?var=<?php echo $data['USER_EMAIL']; ?>"><span class="h4 text-inherit"> <?php echo $data['USER_EMAIL']; ?> </span></a>
                            </td>
                            <td>
                                <span class="h4 text-inherit"> <?php echo ucwords(strtolower($data['TOPICNAME'])); ?> </span>
                            </td>
                            <td>
                                <span class="h4 text-inherit"> <?php echo ucfirst($data['QTYPE']); ?> </span>
                            </td>
                            <td class="">
                                <span class="h4 text-inherit"> <?php echo $data['CORRECT_ANS']; ?>
                                <?php if($data['CORRECT_ANS']<9){ ?>
                                    <i class="bi bi-patch-question-fill text-danger mx-2"></i>
                                    <?php }else if($data['CORRECT_ANS']<15 && $data['CORRECT_ANS']>8){ ?>
                                        <i class="bi bi-patch-check-fill text-warning mx-2"></i>
                                <?php } else { ?>
                                    <i class="bi bi-patch-check-fill text-success mx-2"></i>
                                <?php }?>    
                                </span>
                            </td>
                            <td>
                                <span class="h4 text-inherit"> <?php echo $data['DATE_TIME']; ?> </span>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>

            <div class="container d-flex justify-content-center my-4">
                <?php
                    $pagination_query = "SELECT * FROM test_result";
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

                    echo '<ul class="pagination mt-4">';
                        echo '<li class="page-item"> <a class="page-link" href="quantitative.php?page='.$prev.'" tabindex="-1" aria-disabled="true">Previous</a> </li>';
                        for($i=1; $i<= $total_pages; $i++)
                        {
                            echo '<li class="page-item"><a class="page-link" href="quantitative.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        echo '<li class="page-item"> <a class="page-link" href="quantitative.php?page='.$next.'">Next</a> </li>';
                    echo '</ul>';
                ?>
            </div>

            <h4 class="mb-2 text-end"><a href="../index.php"><button type="button" class="btn btn-primary mt-4 p-2 px-4 mx-4">Back</button></a></h4>
            <?php }  ?>
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