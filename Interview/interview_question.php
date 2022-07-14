<?php
  session_start();
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
  <title>PrePlaced || Interview Question</title>
</head>

<body>
  <!-- Page content -->
  <div class="bg-white">
    <!-- navbar login -->

    <!-- HEADER START -->
    <?php include "../header/header.php";?>
    <!-- HEADER END -->

    
<?php
  if(isset($_GET['int_id']))
  {
    if(strlen($_GET['int_id'])>0)
    {
        $ques_id=$_GET['int_id'];

        //  include "../connectiondb.inc.php";

          $sql="SELECT * FROM interview_question WHERE QUES_id=$ques_id";
          $result = mysqli_query($conn,$sql);
          $count=mysqli_num_rows($result);
          if($count!=1)
          {
              header("Location: interview_questions.php?DBError");
              exit();     
          }
          $row=mysqli_fetch_assoc($result);
    } 
    else
    {
        header("Location: interview_questions.php");
        exit();
    }
  }
  else
  {
      header("Location: interview_questions.php");
      exit();
  }
?>


    <!-- Content -->
    <div class="py-4 py-lg-8 pb-14 ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-8 col-md-12 col-12 mb-2">
            <div class="text-center mb-4">
              <!-- <a href="interview_companies.php" class="fs-5 fw-semi-bold d-block mb-4 text-primary">Interview Experiences</a> -->
              <h1 class="display-3 fw-bold mb-4"><?php echo $row['QUESTION'];?></h1>
              <!-- <span class="mb-3 d-inline-block"><?php //echo "|| ".$row['COMPANY']." ||";?> </span> -->
            </div>
            <!-- Media -->
            <div class="d-flex justify-content-between align-items-center mb-1">
              <div class="d-flex align-items-center">
                <!-- <img src="../assets/images/avatar/avatar-4.jpg" alt="" class="rounded-circle avatar-md"> -->
                <div class="ms-2 lh-1">
                  <!-- <h5 class="mb-1 "><?php //echo $row['Q_TYPE'];?></h5> -->
                  <!-- <span class="text-primary"><?php //echo $row['DATE'];?></span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row justify-content-center"> -->
          <!-- Image -->
          <!-- <div class="col-xl-10 col-lg-10 col-md-12 col-12 mb-6">
            <img src="../assets/images/blog/blogpost-1.jpg" alt="" class="img-fluid rounded-3">
          </div>
        </div> -->
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-8 col-md-12 col-12 mb-2">
            <!-- Descriptions -->
              <div>
                <div class="mb-4">
                  <p class="lead text-dark pb-4">
                      
                  <?php 
                    echo $row['ANSWER'];
                  ?>

                  </p>
                  <div class="mb-4">
                    <p class="text-dark"><b>Question Type: : </b><?php echo $row['Q_TYPE']; ?>
                    </p>
                  </div>
                  <div class="mb-4">
                    <p class="text-dark"><b>Company : </b><?php echo ucfirst(strtolower($row['COMPANY'])); ?>
                    </p>
                  </div>
                </div>
              </div>
              
            <!-- Media -->
            <hr class="mt-8 mb-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
              <div class="d-flex align-items-center">
                <!-- <img src="../assets/images/avatar/avatar-4.jpg" alt="" class="rounded-circle avatar-md"> -->
                <div class="ms-2 lh-1">
                  <!-- <h5 class="mb-1 "><?php //echo $row['student_name'];?></h5>
                  <span class="text-primary"><?php //echo $row['college_name'];?></span> -->
                </div>
              </div>
        
          </div>
        </div>
      </div>
      <!-- Container -->
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="my-5">
              <h2>Related Interviews Questions</h2>
            </div>
          </div>

          <!-- FETCH LATEST INTERVIEWS START-->
          <?php
            $sql="SELECT * FROM interview_question WHERE COMPANY='".$row["COMPANY"]."' EXCEPT SELECT * FROM interview_question WHERE QUES_ID=".$row['QUES_ID']." LIMIT 3;";
            
            $result = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);

            if($count == 0){
                $sql="SELECT * FROM interview_question EXCEPT SELECT * FROM interview_question WHERE QUES_ID=".$row['QUES_ID']." ORDER BY QUES_ID LIMIT 3;";
                $result = mysqli_query($conn,$sql);
            }

          ?>
          <!-- FETCH LATEST INTERVIEWS START-->
          
          <?php 
            while($row=mysqli_fetch_assoc($result)){
          ?>
          <!-- CARD START -->
          <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            <div class="card mb-4 shadow-lg ">
              <!-- Card body -->
              <div class="card-body">
                <a href="interview_ques_company.php?companyname=<?php echo $row['COMPANY'];?>" class="fs-5 fw-semi-bold d-block mb-3 text-primary"><?php echo $row['COMPANY']; ?></a>
                <a href="interview_question.php?int_id=<?php echo $row['QUES_ID'];?>">
                  <h4><?php echo $row['QUESTION']?></h4>
                </a>
                <p><?php $str=strip_tags($row['ANSWER']);?>
                <?php echo substr($str,0,50);echo "<a href='interview_question.php?int_id=".$row['QUES_ID']."'>... Read More</a>";?>
                </p>
                <!-- Media content -->
                <div class="row align-items-center g-0 mt-4">
                  <div class="col-auto">
                    <!-- <img src="../assets/images/avatar/avatar-1.jpg" alt="" class="rounded-circle avatar-sm me-2"> -->
                  </div>
                  <div class="col lh-1">
                    <h5 class="mb-1"><?php echo $row['Q_TYPE']?></h5>
                    <p class="fs-6 mb-0"> Question</p>
                  </div>
                  <div class="col-auto">
                    <p class="fs-6 mb-0"><?php echo $row['DATE']; ?></p>
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
    </div>

  <!-- Footer START -->
  <?php include "../header/footer.php";?>
  <!-- Footer END-->


  </div>
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