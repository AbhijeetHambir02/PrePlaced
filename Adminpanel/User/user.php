<?php
    include "../../connectiondb.inc.php";

    if(isset($_GET['var']) && strlen($_GET['var'])>0)
    {
        $email = $_GET['var'];
    }
    else
    {
        header("Location: users.php");
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
    <title>PrePlaced || Students</title>

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


    <div class="container-fluid pt-11 pb-7 bg-dark bg-opacity-10">
        <!-- <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h1 class="mb-0 h2 fw-bold">Students</h1>
                    </div>
                </div>
            </div>
        </div> -->

        <?php
            $query = "SELECT * FROM users WHERE user_email='$email'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
        ?>
        
        <div class="row">
        <div class="offset-xl-4 col-xl-4 col-12 ">
            <!-- Card -->
            <div class="card mb-4 smooth-shadow-lg">
                <!-- Card body -->
                <div class="card-body">
                    <div class="text-center">
                        <div class="position-relative">
                            <img src="<?php echo substr($data['profile_pic_path'],0);?>" class="rounded-circle avatar-xxl mb-3" alt="" />
                        </div>
                        <h3 class="mb-0 h1"><?php echo $data['user_name']; ?></h3>
                        <p class="mb-0 ">
                            <?php echo $data['user_email']; ?>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                        <span>User ID:</span>
                        <span class="text-dark"><?php echo $data['user_id']; ?></span>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Birth Date:</span>
                        <span class="text-dark"><?php if($data['user_birthdate'] != null){ echo ucfirst($data['user_birthdate']); } else{ ?> <span class="text-muted fw-lighter">No data</span> <?php } ?></span>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Logged in by</span>
                        <?php
                            if($data['login_type']=='Google')
                            {
                            ?>
                            <td class="">
                                <span class="badge rounded-pill bg-success p-2 px-4 fs-5"> <?php echo ucfirst($data['login_type']); ?> </span>
                            </td>
                            <?php
                            } else
                                {
                            ?>
                            <td class="">
                                <span class="badge rounded-pill bg-danger p-2 px-4 fs-5"> <?php echo ucfirst($data['login_type']); ?> </span>
                            </td>
                            <?php
                                }
                            ?>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Signup Date:</span>
                        <span class="text-dark"><?php echo $data['signup_date']; ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>Signup Verification</span>
                        <span class="badge badge-pill bg-success p-2 px-4 fs-5"> <?php echo $data['signup_verification']; ?></span>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
    <div class="container-fluid mt-8 p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-2 mb-6  align-items-center">
                    <div class="mb-3 text-center">
                        <h1 class="mb-0 h2 fw-bold">Mock Test Result</h1>
                    </div>
                </div>
            </div>
        </div>


        <!-- mock test result -->
        <?php
            $query1 = "SELECT * FROM test_result WHERE USER_EMAIL='$email' ORDER BY CORRECT_ANS DESC";
            $result1 = mysqli_query($conn, $query1);
            $num_rows = mysqli_num_rows($result1);

        ?>
        <div class="row">
            <?php
            if($num_rows>0)
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
                            <th class="py-3" style="font-size:1rem;">Topic</th>
                            <th class="py-3" style="font-size:1rem;">Aptitude</th>
                            <th class="py-3" style="font-size:1rem;">Score</th>
                            <th class="py-3" style="font-size:1rem;">Date</th>
                        </tr>
                        </thead>

                        <?php
                            $count=0;
                            while($row = mysqli_fetch_assoc($result1))
                            {
                                $count += 1;
                        ?>
                        <tbody>
                        <tr>
                            <td class="">
                                <span class="h4 text-inherit"> <?php echo $count."."; ?></span>
                            </td>
                            <td>
                                <span class="h4 text-inherit"> <?php echo ucwords(strtolower($row['TOPICNAME'])); ?> </span>
                            </td>
                            <td>
                                <span class="h4 text-inherit"> <?php echo ucfirst($row['QTYPE']); ?> </span>
                            </td>
                            <td class="">
                                <span class="h4 text-inherit"> <?php echo $row['CORRECT_ANS']; ?>
                                <?php if($row['CORRECT_ANS']<9){ ?>
                                    <i class="bi bi-patch-question-fill text-danger mx-2"></i>
                                    <?php }else if($row['CORRECT_ANS']<15 && $row['CORRECT_ANS']>8){ ?>
                                        <i class="bi bi-patch-check-fill text-warning mx-2"></i>
                                <?php } else { ?>
                                    <i class="bi bi-patch-check-fill text-success mx-2"></i>
                                <?php }?>    
                                </span>
                            </td>
                            <td>
                                <span class="h4 text-inherit"> <?php echo $row['DATE_TIME']; ?> </span>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
            <h4 class="mb-2 text-end"><a href="users.php"><button type="button" class="btn btn-primary mt-4 p-2 px-4 mx-4">Back</button></a></h4>
            <?php
            }
            else
            {
            ?>
                <div class="mb-3 text-center">
                    <h1 class="mb-0 h3">No Mock Test Attempted !</h1>
                </div>
            <?php
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
</body>
</html>