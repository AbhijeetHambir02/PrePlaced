<?php
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



<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>PrePlaced || Home</title>

</head>
<body>

    <div id="db-wrapper">
        <?php
            include "sidebar.php";
        ?>
    <div id="page-content">
        <?php
            include "header.php";
        ?>
    
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Fetching users count -->
                <?php
                    $query = "SELECT user_id FROM users WHERE signup_verification='Verified'";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                ?>

                <div class="col-md-6 col-xl-3 col-12">
                    <!-- card  -->
                    <a href="User/users.php">
                    <div class="card mb-4 card-hover">
                        <!-- card body  -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between
                                align-items-center">
                                <div>
                                    <h4 class="mb-0">Students</h4>
                                </div>
                                <div>
                                    <span class="bi bi-people fs-3 text-primary"></span>
                                </div>
                            </div>
                            <!-- text center  -->
                            <div class="text-center my-2">
                                <h1 class="display-3 text-primary mb-0 fw-bold"><?php echo $count; ?></h1>
                                <!-- <p class="mb-0"><span class="text-dark fw-semi-bold">8</span> Today Completed</p> -->
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <!-- Fetching mock test count -->
                <?php
                    $query = "SELECT QTYPE FROM test_result";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                ?>

                <div class="col-md-6 col-xl-3 col-12">
                    <!-- card  -->
                    <a href="MockTest/mock_all.php">
                    <div class="card mb-4 card-hover">
                        <!-- card body  -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">Mock Test</h4>
                            </div>
                            <div>
                                <span class="bi bi-file-text fs-3 text-primary"></span>
                            </div>
                            </div>
                            <!-- text center  -->
                            <div class="text-center my-2">
                                <h1 class="display-3 text-success mb-0 fw-bold"><?php echo $count; ?></h1>
                                <!-- <p class="mb-0"><span class="text-dark fw-semi-bold">8</span> Today Completed</p> -->
                            </div>  
                        </div>
                    </div>
                    </a>
                </div>

                <!-- Fetching interview questions count -->
                <?php
                    $query = "SELECT QUES_ID FROM interview_question";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                ?>

                <div class="col-md-6 col-xl-3 col-12">
                    <!-- card  -->
                    <a href="Interview/questions.php">
                    <div class="card mb-4 card-hover">
                        <!-- card body  -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between
                                align-items-center">
                                <div>
                                    <h4 class="mb-0">Interview Questions</h4>
                                </div>
                                <div>
                                    <span class="bi bi-pencil-square fs-3 text-primary"></span>
                                </div>
                            </div>
                            <!-- text center  -->
                            <div class="text-center my-2">
                                <h1 class="display-3 text-info mb-0 fw-bold"><?php echo $count; ?></h1>
                                <!-- <p class="mb-0 "> <span class="text-dark fw-semi-bold">6</span> In Progress </p> -->
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <!-- Fetching Interview exp pendings count -->
                <?php
                    $query = "SELECT interview_id FROM interview_experiences WHERE status='Unverified'";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                ?>

                <div class="col-md-6 col-xl-3 col-12">
                    <!-- card  -->
                    <a href="Interview/unverified_interview_experiences.php">
                    <div class="card mb-4 card-hover">
                        <!-- card body  -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between
                                align-items-center">
                                <div>
                                    <h4 class="mb-0">Interview Experiences </h4>
                                </div>
                                <div>
                                    <span class="bi bi-bell fs-3 text-primary"></span>
                                </div>
                            </div>
                            <!-- text center  -->
                            <div class="text-center my-2">
                                <h1 class="display-3 text-danger mb-0 fw-bold"><?php echo $count; ?></h1>
                                <!-- <p class="mb-0 "><span class="text-dark fw-semi-bold">4</span> Yesterday</p> -->
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

            </div>
        </div>

        <!-- Aptitude section -->
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-0 h2 fw-bold">Aptitude Section</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12 col-xl-4 col-12">
                <!-- card  -->
                <div class="card mb-4 bg-primary border-primary card-hover">
                    <!-- card body  -->
                    <div class="card-body">
                        <!-- <h4 class="card-title text-white">Launch Date </h4> -->
                        <!-- dropdown  -->
                        <div class="d-flex justify-content-between align-items-center mt-8">
                            <div>
                                <h1 class="display-4 text-white mb-1">Quantitative</h1>
                                <a href="Aptitude/aptitude_topic.php?var=quantitative"><p class="mb-0 text-white"><u>View</u></p></a>
                            </div>
                            <div>
                                <i class="bi bi-lightbulb-off-fill fs-1 text-light-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-md-12 col-xl-4 col-12">
                <!-- card  -->
                <div class="card mb-4 bg-primary border-primary card-hover">
                    <!-- card body  -->
                    <div class="card-body">
                        <!-- <h4 class="card-title text-white">Launch Date </h4> -->
                        <!-- dropdown  -->
                        <div class="d-flex justify-content-between align-items-center mt-8">
                            <div>
                                <h1 class="display-4 text-white mb-1">Reasoning</h1>
                                <a href="Aptitude/aptitude_topic.php?var=reasoning"><p class="mb-0 text-white"><u>View</u></p></a>
                            </div>
                            <div>
                                <i class="bi bi-book-half fs-1 text-light-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-md-12 col-xl-4 col-12">
                <!-- card  -->
                <div class="card mb-4 bg-primary border-primary card-hover">
                    <!-- card body  -->
                    <div class="card-body">
                        <!-- <h4 class="card-title text-white">Launch Date </h4> -->
                        <!-- dropdown  -->
                        <div class="d-flex justify-content-between align-items-center mt-8">
                            <div>
                                <h1 class="display-4 text-white mb-1">Technical</h1>
                                <a href="Aptitude/aptitude_topic.php?var=technical"><p class="mb-0 text-white"><u>View</u></p></a>
                            </div>
                            <div>
                                <i class="bi bi-gear-fill fs-1 text-light-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
                
        <!-- Interview Section -->
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-0 h2 fw-bold">Interview Section</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="offset-xl-2 col-xl-4 offset-lg-1 col-lg-10 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card border-0 mb-3 card-hover">
                        <!-- Card body -->
                        <div class="p-5 text-center">
                            <!-- <img src="../assets/images/svg/price-icon-1.svg" alt="" class="mb-5" /> -->
                            <i class="fa fa-graduation-cap fs-1 text-info mb-5"></i>
                            <div class="mb-5">
                                <h2 class="fw-bold">Intervew Questions</h2>
                                <p class="mb-0">
                                In the middle of difficulty lies opportunity.<br>
                                    <span class="text-dark fw-medium">Add & View</span>
                                    questions.
                                </p>
                            </div>
                            <!-- <div class="d-flex justify-content-center mb-4">
                                <span class="h3 mb-0 fw-bold">$</span>
                                <div class="price-card--price-number toggle-price-content odometer" data-price-monthly="0"
                                    data-price-yearly="0">
                                    0
                                </div>
                                <span class="align-self-end mb-1 ms-2 toggle-price-content" data-price-monthly="/Monthly"
                                    data-price-yearly="/Yearly">/Yearly</span>
                            </div> -->
                            <div class="d-grid">
                                <a href="Interview/questions.php" class="btn btn-outline-primary">View</a>
                            </div>
                        </div>
                    </div>
				</div>

                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card border-0 mb-3 card-hover">
                        <!-- Card body -->
                        <div class="p-5 text-center">
                            <!-- <img src="../assets/images/svg/price-icon-1.svg" alt="" class="mb-5" /> -->
                            <i class="fa fa-graduation-cap fs-1 text-info mb-5"></i>
                            <div class="mb-5">
                                <h2 class="fw-bold">Intervew Experiences</h2>
                                <p class="mb-0">
                                In the middle of difficulty lies opportunity.<br>
                                    <span class="text-dark fw-medium">Add & View</span>
                                    experiences.
                                </p>
                            </div>
                            <!-- <div class="d-flex justify-content-center mb-4">
                                <span class="h3 mb-0 fw-bold">$</span>
                                <div class="price-card--price-number toggle-price-content odometer" data-price-monthly="0"
                                    data-price-yearly="0">
                                    0
                                </div>
                                <span class="align-self-end mb-1 ms-2 toggle-price-content" data-price-monthly="/Monthly"
                                    data-price-yearly="/Yearly">/Yearly</span>
                            </div> -->
                            <div class="d-grid">
                                <a href="Interview/experiences.php" class="btn btn-outline-primary">View</a>
                            </div>
                        </div>
                    </div>
				</div>

            </div>
        </div>

        <div class="container-fluid p-4">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-0 h2 fw-bold">Mock Test</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fetching test results -->
            <?php
                $test_query = "SELECT * FROM test_result LIMIT 10";
                $test_result = mysqli_query($conn, $test_query);
            ?>

            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- card -->
                    <div class="card">
                        <!-- card header -->
                        <div class="card-header">
                            <h4 class="mb-0 text-center">All Test Results</h4>
                        </div>
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Topic</th>
                                    <th>Type</th>
                                    <th>Total Questions</th>
                                    <th>Correct</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                
                                <?php
                                    while($data = mysqli_fetch_assoc($test_result))
                                    {
                                        $name_query = "SELECT user_name FROM users WHERE user_email='".$data["USER_EMAIL"]."'";
                                        $name_result = mysqli_query($conn, $name_query);
                                        $name = mysqli_fetch_assoc($name_result);
                                        $percentage = ($data['CORRECT_ANS']/20)*100;
                                        ?>
                                <tbody>
                                <tr>
                                    <td><a class="text-inherit" href="User/user.php?var=<?php echo $data['USER_EMAIL']; ?>"> <?php echo ucwords($name['user_name']); ?></a> </td>
                                    <td><?php echo ucwords($data['TOPICNAME']); ?></td>
                                    <td><?php echo ucfirst($data['QTYPE']); ?></td>
                                    <!-- <td>52% <i class="bi bi-arrow-up text-danger"></i></td> -->
                                    <td> 20 </td>
                                    <td> <?php echo $data['CORRECT_ANS']; ?></td>
                                    <td> <?php echo $percentage; ?>% <?php if($percentage<10){ ?><i class="bi bi-arrow-down text-danger"></i><?php }else{ ?><i class="bi bi-arrow-up text-success"></i><?php } ?></td>
                                </tr>
                                </tbody>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                        <div class="card-header">
                            <h4 class="mb-0 text-end"><a href="MockTest/mock_all.php"><button type="button" class="btn btn-primary p-1 px-2 mx-4">View All >></button></a></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

 
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