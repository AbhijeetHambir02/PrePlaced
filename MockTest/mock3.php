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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>Mock Test || PrePlaced</title>
</head>

<body>

    <!-- HEADER START -->
        <?php include "../header/header.php";?>
    <!-- HEADER END -->

    <?php    
        if(isset($_GET['topicname']) && isset($_GET['pagename']) && isset($_GET['testno']))
        {
            if(strlen($_GET['topicname'])>0 && strlen($_GET['pagename'])>0 && strlen($_GET['testno'])>0)
            {
                $topicname = $_GET['topicname'];
                $tablename = $_GET['pagename'];
                $testno = $_GET['testno'];
                $end = $testno*20;
                $start = $end-20;

                $query = "SELECT * FROM $tablename WHERE TOPICNAME='$topicname' LIMIT $start,20";
                $result = mysqli_query($conn, $query);
                $count = mysqli_num_rows($result);

            }
            else
            {
                header('Location: mock2.php');
                exit();
            }
        }
        else
        {
            header('Location: mock2.php');
            exit();
        }
    ?>


    <div id="timeshow" style="display:none; background-color: #754ffed3;" class="p-3 mb-6 sticky-top text-white">
        <div class="text-center fw-bold m-0">
            <span class="" style="font-size:30px"><?php echo $topicname; ?> Mock Test</span>
        </div>

        <div class="text-center fw-bold">
            <span style="font-size:30px" class=""><i class="far fa-clock"></i></span>
            <span id="timer" style="font-size:30px" class=""></span> 
        </div>
    </div>


    <div id="mock" style="display:none">
        <div class="container-fluid">
            
            <form action="test_result.php" method="POST" name="mocktest">

                
                <input type="text" value="<?php echo $tablename;?>" style="display:none;" name="tablename">
                <input type="text" value="<?php echo $topicname;?>" style="display:none;" name="topicname">
                <input type="text" value="<?php echo $testno;?>" style="display:none;" name="testno">
                    
                <?php
                    $count = 0;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $count = $count+1;
                ?>

                <div class="col-md-12 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card my-3 col-md-10 offset-md-1">   
                        <!-- Card header -->
                        <div class="card-header" style="border-bottom:none;">
                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 500;"><?php echo $count; echo '. '; echo $row['QUESTION'];?></p>
                        </div>
                        <!-- Card body -->
                        
                        <div class="card-body py-0 px-4">
                            <div class="pb-3 border-bottom" style="font-size: 1rem; font-weight: 400;" id="CheckAnswer">
                                <div class="class">
                                    <input class="form-check-input" id="<?php echo $row['QUES_ID']; ?>_1" type="radio" name="ans[<?php echo $row['QUES_ID']; ?>]" value="1">
                                    <label class="form-check-label" for="<?php echo $row['QUES_ID']; ?>_1"><?php echo $row['OPTION_1']; ?></label>
                                </div>
                                <div class="class">
                                    <input class="form-check-input" id="<?php echo $row['QUES_ID']; ?>_2" type="radio" name="ans[<?php echo $row['QUES_ID']; ?>]" value="2">
                                    <label class="form-check-label" for="<?php echo $row['QUES_ID']; ?>_2"> <?php echo $row['OPTION_2']; ?></label>
                                </div>
                                <div class="class">
                                    <input class="form-check-input" id="<?php echo $row['QUES_ID']; ?>_3" type="radio" name="ans[<?php echo $row['QUES_ID']; ?>]" value="3">
                                    <label class="form-check-label" for="<?php echo $row['QUES_ID']; ?>_3"> <?php echo $row['OPTION_3']; ?></label>
                                </div>
                                <div class="class">
                                    <input class="form-check-input" id="<?php echo $row['QUES_ID']; ?>_4" type="radio" name="ans[<?php echo $row['QUES_ID']; ?>]" value="4">
                                    <label class="form-check-label" for="<?php echo $row['QUES_ID']; ?>_4"> <?php echo $row['OPTION_4']; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php    
                    }
                ?>
                <div class="offset-md-1 mb-6">
                    <button type="button" onclick="endtest()" class="btn btn-danger mt-2 me-2">End Test</button>
                    <button type="submit" name="test_over" onclick="submittest()" class="btn btn-success mt-2">Submit Test</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Page Content -->
    <div class="py-lg-8 py-10 bg-auto" id="instructions" style="display:block">
        <div class="container">
        <!-- Hero Section -->
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-5 col-md-10">
            <div class="py-8 py-lg-0 text-left">
                <h1 class="display-2 fw-bold mb-3 text-primary"><span class="text-dark px-3 px-md-0">Instructions</span></h1>
                <ul class="list-unstyled fs-3 text-dark mb-6 fw-medium">
                <li class="mb-1 d-flex"><i class="mdi mdi-check-circle text-success
                    me-2"></i>Test has 20 questions.</li>
                <li class="mb-1 d-flex"><i class="mdi mdi-check-circle text-success
                    me-2"></i>Time limit for the test is 20 minutes.</li>
                <li class="mb-1 d-flex"><i class="mdi mdi-check-circle text-success
                    me-2"></i>Each question carries 1 mark.</li>
                <li class="mb-1 d-flex"><i class="mdi mdi-check-circle text-success
                    me-2"></i>No Negative Marking.</li>
                    <li class="mb-1 d-flex"><i class="mdi mdi-check-circle text-success
                    me-2"></i>Kindly do not refresh the page.</li>
                </ul>
                <button class="btn btn-primary me-2" onclick="startTest()">Start Test</button>
                <a href="mock2.php" class="btn btn-outline-secondary">Back</a>
                
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- FOOTER START -->
    <footer>
        <?php include "../header/footer.php";?>
    </footer>
    <!-- FOOTER END -->

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

<!-- Mock JS -->
<script src="../assets/js/mock.js"></script>

</body>
</html>