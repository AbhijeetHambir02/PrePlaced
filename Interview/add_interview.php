<?php
  session_start();
  include "../connectiondb.inc.php"
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

<!-- JQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
    <title>PrePlaced || Add Interview Experience    </title>
</head>

<body>

    <!-- HEADER START -->
        <?php include "../header/header.php";?>
    <!-- HEADER END -->
 

    <!-- CONTENT START-->
    <!-- ADD EXPERIENCE START -->

    <!-- Page header-->
  <div class="py-4 py-lg-6 bg-primary">
    <div class="container">
      <div class="row">
        <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
          <div class="d-lg-flex align-items-center justify-content-between">
            <!-- Content -->
            <div class="mb-4 mb-lg-0">
              <h1 class="text-white mb-1">Add New Interview Experience</h1>
              <p class="mb-0 text-white lead">
                Just fill the form and add your experience.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Page Content -->
  <div class="pb-12">
    <div class="container">
      <div id="courseForm" class="bs-stepper">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <?php

              if(isset($_GET['result'])){
                if($_GET['result']=="Added"){
                  echo '<div class="alert alert-success mt-3" role="alert">
              <h4 class="alert-heading">Congratulations!</h4>
              <p>Cheers, your interview experience is successfully submitted for review purposes.</p>
              
              <p class="mb-0"> It will be checked throughly for errors and you will be notified once it is posted.</p>
            </div>';
                }

                if(isset($_GET['result'])){
                  if($_GET['result']=="SQLERROR"){
                    echo '<div class="alert alert-danger mt-3" role="alert">
                <h4 class="alert-heading">Something went wrong!</h4>
                <p>Sorry, The interview experience is not submitted due to some internal error!</p>
                
                <p class="mb-0">Please try again later.</p>
              </div>';
                  }
                }
              }
              

            ?>  
            <!-- Stepper Button -->
            <div class="bs-stepper-header shadow-sm">
              <div class="step">
                <button type="button" class="step-trigger" id="courseFormtrigger1">
                  <span class="bs-stepper-circle">1</span>
                  <span class="bs-stepper-label">Basic Information</span>
                </button>
              </div>
              <div class="bs-stepper-line"></div>
              <div class="step">
                <button type="button" class="step-trigger" id="courseFormtrigger2">
                  <span class="bs-stepper-circle">2</span>
                  <span class="bs-stepper-label">Interview Details</span>
                </button>
              </div>
              <div class="bs-stepper-line"></div>
              <div class="step">
                <button type="button" class="step-trigger" id="courseFormtrigger3">
                  <span class="bs-stepper-circle">3</span>
                  <span class="bs-stepper-label">Interview Result</span>
                </button>
              </div>
              <div class="bs-stepper-line"></div>
              <div class="step">
                <button type="button" class="step-trigger" id="courseFormtrigger4">
                  <span class="bs-stepper-circle">4</span>
                  <span class="bs-stepper-label">Tags</span>
                </button>
              </div>
            </div>
            <!-- Stepper content -->
            <div class="bs-stepper-content mt-5">
              <form id="regForm" action="add_interview_db.php" method="POST">
                <!-- Content one -->
                <div id="test-l-1" class="bs-stepper-pane fade" >
                  <!-- Card -->
                  <div class="card mb-3 ">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Basic Information</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="courseTitle1" class="form-label">Name</label>
                        <input id="courseTitle1" class="form-control" name="username" type="text" placeholder="Enter your name" required/>
                        <!-- <small>Write a 60 character course title.</small> -->
                      </div>
                      <div class="mb-3">
                        <label for="courseTitle2" class="form-label">Email ID</label>
                        <input id="courseTitle2" class="form-control" name="username_email" type="email" placeholder="Enter your email id" required/>
                        <!-- <small>Write a 60 character course title.</small> -->
                      </div>
                      <div class="mb-3">
                        <label for="courseTitle3" class="form-label">College Name</label>
                        <input id="courseTitle3" class="form-control" name="college_name" type="text" placeholder="Enter your college name" />
                        <!-- <small>Write a 60 character course title.</small> -->
                      </div>
                      <div class="mb-3">
                        <label for="courseTitle4" class="form-label">Company Name</label>
                        <input id="courseTitle4" class="form-control" name="company_name" type="text" placeholder="Enter company name" required/>
                        <!-- <small>Write a 60 character course title.</small> -->
                      </div>

                      <div class="mb-3">
                        <label for="courseTitle4" class="form-label">Interview Location</label>
                        <input id="courseTitle4" class="form-control" name="interview_location" type="text" placeholder="Enter location" />
                        <!-- <small>Write a 60 character course title.</small> -->
                      </div>

                      <div class="mb-3">
                        <label for="courseTitle5" class="form-label">Interview Date</label>
                        <input id="courseTitle5" class="form-control" name="interview_date" type="date" placeholder="ENter Interview Date" />
                        <!-- <small>Write a 60 character course title.</small> -->
                      </div>

                    </div>
                  </div>
                  
                </div>
                <!-- Content two -->
                <div id="test-l-2" class="bs-stepper-pane fade">
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Interview Details</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="courseTitle6" class="form-label">Interview Title</label>
                        <input id="courseTitle6" class="form-control" name="interview_title" type="text" placeholder="Enter Interview Title" />
                        <small>Ex. Amazon Interview Experience | On-Campus 2022</small>
                      </div>
                      <div class="mb-3">
                        <label for="courseTitle7" class="form-label">Job Role</label>
                        <input id="courseTitle7" class="form-control" name="job_role" type="text" placeholder="Enter Job Role" />
                        <small>Ex. SDE-1, Data Analyst</small>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Interview experience</label>
                        <div id="editor">
                          <p>Enter your complete interview experience</p>
                        </div>
                        <!-- <small>A brief summary of your courses.</small> -->
                      </div>
                      <textarea style="display:none" name="interview_details" id="hiddenArea"></textarea>
                    </div>
                  </div>
                  
                </div>
                <!-- Content three -->
                <div id="test-l-3" class="bs-stepper-pane fade">
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Interview Result</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body ">
                      
                      <div class="mb-3">
                        <label class="form-label">Interview Result</label>
                        <select class="selectpicker" name="interview_result" data-width="100%">
                          <option disabled value>Select Result</option>
                          <option value="Seletced">Selected</option>
                          <option value="Not Selected">Not Selected</option>
                          <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- Content four -->
                <div id="test-l-4" class="bs-stepper-pane fade">
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Tags</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <input name='tags' value='On Campus, Interview Experience' name="tags" autofocus>
                    </div>
                  </div>
                  
                </div>
                <div class="d-flex justify-content-between mb-10">
                    <!-- Button -->
                    <button type="button" class="btn btn-secondary mt-5" id="prevBtn" onclick="nextPrev(-1)">
                      Previous
                    </button>
                    <button type="button" id="nextBtn" name="submit_btn" class="btn btn-primary mt-5" onclick="nextPrev(1)">
                      Next
                    </button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    <!-- ADD EXPERIENCE END -->
            
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
<!-- <script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script> -->
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

<!-- Custom JS -->
<script src="../assets/js/custom.js"></script>

</body>
</html>