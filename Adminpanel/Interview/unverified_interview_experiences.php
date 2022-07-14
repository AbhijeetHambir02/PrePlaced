<?php
    include "../../connectiondb.inc.php";
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
    <title>PrePlaced || Interview Experiences</title>

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
                        <h1 class="mb-0 h2 fw-bold"> Unverified Interview Experiences</h1>
                    </div>
                </div>
            </div>
        </div>


        
        <div class="row">
            <?php
                if(isset($_GET['success']) && strlen($_GET['success'])>0)
                {
                    if($_GET['success']=="deleted")
                    {?>
                        <div class="alert alert-danger text-center" role="alert">
                        <i class="bi bi-patch-check-fill text-danger mx-2 h3"></i><span class="h4 text-danger fw-bold">Deleted successfully !</span>
                        </div>
                    <?php
                    }
                    else if($_GET['success']=="verified")
                    {?>
                        <div class="alert alert-success text-center" role="alert">
                        <i class="bi bi-patch-check-fill text-success mx-2 h3"></i><span class="h4 text-success fw-bold">Verified successfully !</span>
                        </div>
                    <?php
                    }
                }
            ?>


            <!-- Fetching interview questions -->
            <?php
                $query = "SELECT * FROM interview_experiences WHERE status='Unverified'";
                $result = mysqli_query($conn, $query);
                $num_row = mysqli_num_rows($result);

                if($num_row>0)
                {
            ?>

            <div class="col-12">
            <!-- card -->
            <div class="card">
                <!-- table -->
                <div class="table-responsive overflow-y-hidden">
                <table class="table mb-0 text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col" class=" border-top-0">Verify following Interview Experiences</th>
                        </tr>
                    </thead>
                    <?php
                        $count=0;
                        while($data = mysqli_fetch_assoc($result))
                        {
                            $count+=1;
                    ?>
                    <tbody>
                    <tr>
                        <td class="align-middle ">
                            <div class="">
                                <h3 class="mb-0"><a href="unverified_interview_experience.php?var=<?php echo $data['interview_id']; ?>" class="text-inherit"><?php echo $count.". ".$data['interview_title']; ?></a></h3>
                            </div>
                            <div class="ms-3">
                            <?php $str=strip_tags($data['interview_details']);?>
                                <p class="text-muted mb-0"><span class="text-success h4">Details : </span> <?php echo substr($str,0,140);echo "<a href='unverified_interview_experience.php?var=".$data['interview_id']."'>... Read More</a>";?></p>
                            </div>
                            <div class="ms-3">
                                <p class="text-truncate fs-4 mb-0"><span class="text-info h4">Job Role : </span><?php echo $data['job_role']; ?></p>    
                            </div>
                            <div class="ms-3">
                                <p class="text-truncate fs-4"><span class="text-primary h4">Company : </span><?php echo $data['company_name']; ?></p>    
                            </div>
                            <div class="ms-3 text-end">
                                <form action="verify_interview_experiencedb.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $data['interview_id']; ?>">
                                    <button type="submit" onclick="del_exp()" name="delete_exp" class="btn btn-danger py-2 px-4">Delete</button>
                                    <button type="submit" name="submit_exp" class="btn btn-success py-2 px-4">Verify</button>
                                </form>
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
            <?php
                }
                else
                {
                    echo '<h1 class="mb-0 h3 text-muted fw-bold text-center"> There is no any record !</h1>';
                }
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
    <script src="../../assets/js/custom.js"></script>
</body>
</html>