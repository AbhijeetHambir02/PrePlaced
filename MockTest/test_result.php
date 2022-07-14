<?php
    include "../connectiondb.inc.php";

    session_start();
    $user_email = $_SESSION['user_email'];  

    if(isset($_POST['test_over']))
    {
        if(isset($_POST['tablename']) && isset($_POST['topicname']) && isset($_POST['testno']))
        {
            $tablename = $_POST['tablename'];
            $testno = $_POST['testno'];
            $topicname = $_POST['topicname'];
            $testno = $_POST['testno'];
            $end = $testno*20;
            $start = $end-20;

            $query1 = "SELECT * FROM $tablename WHERE TOPICNAME='$topicname' LIMIT $start,20";
            $result1 = mysqli_query($conn, $query1);
            $count = mysqli_num_rows($result1);

            $keys = array();
            if(isset($_POST['ans']))
            {  
                $user_ans = $_POST['ans'];
                $user_answers = array();
                $ques_id = array();

                $correct_ans = 0;
                $wrong_ans = 0;
                foreach($user_ans as $key => $val)
                {
                    array_push($user_answers, $val);
                    array_push($keys, $key);
                    
                    $query = "SELECT CORRECT_OPTION FROM $tablename WHERE QUES_ID='$key'";
                    $result = mysqli_query($conn, $query);
                    
                    $row = mysqli_fetch_assoc($result);
                    
                    if($row['CORRECT_OPTION'] == $val)
                    {
                        $correct_ans++;
                    }
                    else
                    {
                      $wrong_ans++;
                    }
                }

                $not_attempt = $count-($correct_ans+$wrong_ans);
                $wrongans = $wrong_ans+$not_attempt;
                
                // INSERT TEST RESULT
                
                date_default_timezone_set("Asia/Kolkata");  
                $DATEnTIME = date('d-m-y h:i');
                $query_test = "INSERT INTO test_result VALUES('$topicname', '$tablename', '$user_email', '$correct_ans', '$wrongans', '$DATEnTIME')";
                $result_test = mysqli_query($conn, $query_test);
                 

                while($data = mysqli_fetch_assoc($result1))
                {
                  $QUES_ID = $data['QUES_ID'];
                  
                  array_push($ques_id, $QUES_ID);
                }
            }
            else
            {
                $correct_ans = 0; 
                $wrong_ans = 0;
                $not_attempt = 20;
            }
        }     
    }

    // INSERT USER ANSWERS INTO TEST RESULT
    $len = count($keys);

    for($i=0;$i<$count;$i++)
    {
      for($j=0;$j<$len;$j++)
      {
        if($ques_id[$i] == $keys[$j])
        {
          $ans = $user_answers[$j];
          $k = $keys[$j];
          $q = "UPDATE test_result SET USER_ANSWER=$ans WHERE QUES_ID=$k";
          $r = mysqli_query($conn, $q);
        }
      }
    }

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




<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>Mock Test || Result</title>
</head>

<body style="background-color: #FFF;">

    <!-- HEADER START -->
        <?php include "../header/header.php";?>
    <!-- HEADER END -->
    <!-- Page header -->
    <!-- <div class="bg-primary">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="py-4 py-lg-6">
                <h1 class="mb-0 text-white display-4"><?php//echo $topicname;?></h1>
                <p class="text-white mb-0 lead">
                    
                </p>
            </div>
            </div>
        </div>
        </div>
    </div> -->
 
    <!-- Showing result Start-->
    
      <div class="container">
        <div class="row">
                 <!-- heading -->
                <h1 class="display-2 mt-10 mb-0 fw-bold text-center">Mock Test Finished</h1>
                 <!-- para -->
                <?php
                    if($correct_ans>15)
                    { ?>
                        <p class="display-6 mb-5 text-center"> Excelent Work! </p>
                        <?php
                    }
                    else
                    {
                        ?>
                        <p class="display-6 mb-5 text-center"> You need to do more practice! </p>
                <?php
                    }
                    ?>
                
            <div class="row text-center mb-6 mt-0 border alert-success smooth-shadow-md pb-3 rounded">
              <div class="col-lg-3 col-md-4 col-12">
                <!-- counter -->
                <div class="mt-xl-8 mt-5 mb-md-5">
                  <h1 class="display-6 fw-bold mb-0"><?php echo ucfirst($topicname); ?></h1>
                  <p class="lead text-muted"><?php echo 'Topicname'; ?></p>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-12">
                <!-- counter -->
                <div class="mt-xl-8 mt-5 mb-md-5">
                  <h1 class="display-6 fw-bold mb-0"> 20</h1>
                  <p class="lead text-muted">Total Questions</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-12">
                <!-- counter -->
                <div class="mt-xl-8 mt-5 mb-md-5">
                  <h1 class="display-6 fw-bold mb-0"><?php echo $correct_ans; ?></h1>
                  <p class="lead text-muted">Correct Answers</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-12">
                <!-- counter -->
                <div class="mt-xl-8 mt-5 mb-md-5">
                  <h1 class="display-6 fw-bold mb-0"><?php echo $wrong_ans+$not_attempt; ?></h1>
                  <p class="lead text-muted">Wrong Answers</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    <!-- Showing result End -->


    <div class="text-center mb-12">
      <a href="../Profile/dashboard.php"><button type="button" class="btn btn-primary mt-2 me-2">Go to Dashboard</button></a>
      <a href="mock1.php"><button type="button" class="btn btn-success mt-2">Next Test</button></a>
    </div>



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