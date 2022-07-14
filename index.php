<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en">


<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="PrePlaced helps students to improve their aptitude skills" />


<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon-1.png">


<!-- Libs CSS -->
<link href="assets/fonts/feather/feather.css" rel="stylesheet">
<link href="assets/libs/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">







  <!-- Theme CSS -->
  <link rel="stylesheet" href="assets/css/theme.min.css">
      <title>PrePlaced</title>
  </head>

<body>

    <!-- HEADER START -->
        <?php include "header.php";?>
    <!-- HEADER END -->
    
    <!-- HOMEPAGE START -->

    <!-- Page Content -->
    <div class="bg-primary">
        <div class="container">
            <!-- Hero Section -->
            <div class="row align-items-center g-0">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="py-5 py-lg-0">
                        <h1 class="text-white display-4 fw-bold">Access 3000+ Aptitude Questions, Mock Tests & Interview Experiences. 
                        </h1>
                        <p class="text-white-50 mb-4 lead">
                            Learn Practice Pre-Placement questions for a garunteed 100% placement.
                        </p>
                        <?php
                          if(isset($_SESSION['user_email'])){
                            echo '<a href="Profile/dashboard.php" class="btn btn-success">Dashboard</a>';
                          }
                          else{
                            echo '<a href="login/signin.php" class="btn btn-success">Sign In</a>
                            <a href="login/signup.php" class="btn btn-white">Sign Up</a>';
                          }
                        ?>
                        <!-- <a href="pages/course-filter-list.html" class="btn btn-success">Browse Courses</a>
                        <a href="pages/sign-in.html" class="btn btn-white">Are You Instructor?</a> -->
                    </div>
                </div>
                <div class=" col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
                  <img src="assets/images/hero/hero-img.png" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->

    <div class="py-lg-8 py-8">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 col-12">
             <!-- featues -->
            <div class="mb-6 mb-lg-0 fs-4">
               <!-- icon -->
              <div class="icon-shape icon-lg bg-primary text-white rounded-circle
                text-center mb-4"><i class="mdi mdi-flash mdi-24px lh-1"></i></div>
              <h3 class="fw-bold">Aptitude Questions</h3>
              <p>Practice questions for Quantitative aptitude, Reasoning.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 col-12">
             <!-- features -->
            <div class="mb-6 mb-lg-0 fs-4">
               <!-- icon -->
              <div class="icon-shape icon-lg bg-primary text-white rounded-circle
                text-center mb-4"><i class="mdi mdi-layers mdi-24px lh-1"></i></div>
              <h3 class="fw-bold">Interview Preparation</h3>
              <p>Prepare interview questions for your dream company.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 col-12">
             <!-- features -->
            <div class="mb-6 mb-lg-0 fs-4">
               <!-- icon -->
              <div class="icon-shape icon-lg bg-primary text-white rounded-circle
                text-center mb-4"><i class="mdi mdi-cellphone mdi-24px
                  lh-1"></i></div>
              <h3 class="fw-bold">Mock Tests</h3>
              <p>Check your Knowledge and speed by practicing mock tests.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 col-12">
             <!-- features -->
            <div class="mb-6 mb-lg-0 fs-4">
               <!-- icon -->
              <div class="icon-shape icon-lg bg-primary text-white rounded-circle
                text-center mb-4"><i class="mdi mdi-infinity mdi-24px lh-1"></i></div>
              <h3 class="fw-bold">Programming MCQ's</h3>
              <p>Get well versed in multiple programming languages with online MCQ's.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>    
    
    <!-- Content -->
    <hr class="my-lg-0 my-2">

    <!-- Aptitude Content START-->

    <div class="py-0 py-lg-8 bg-light">
    <div class="container">
      <div class="row mb-8 justify-content-center">
        <div class="col-lg-8 col-md-12 col-12 text-center">
          <!-- caption -->
          <h2 class="mb-2 display-4 fw-bold">Aptitude Questions</h2>
          <p class="lead">”Aptitude plus obsession equals greatness”</p>
        </div>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-lg-4 col-md-12 col-12">
          <!-- Features -->
          <div class="card mb-4">
              <!-- Card body -->
            <div class="card-body p-6">
              <div class="d-md-flex mb-4">
                <div class="mb-3 mb-md-0">
                    <!-- Img -->
                  <img src="assets/images/svg/feature-icon-1.svg" alt=""
                    class=" bg-primary icon-shape icon-xxl rounded-circle">
                </div>
               <!-- Content -->
                <div class="ms-md-4">
                  <h2 class="fw-bold mb-1">Quantitative</h2>
                  </div>
              </div>
              <p class="mb-4 fs-4">Data Interpretation, Inequalities, Percentages, Number Series, Arithmetic Aptitude, Profit and Loss...</p>
              <a href="Aptitude/quantitative.php" class="btn-link" style="text-decoration:none;">View More <i
                  class="fe fe-plus"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12">
          <!-- features -->
          <div class="card mb-4">
            <div class="card-body p-6">
              <div class="d-md-flex mb-4">
                <div class="mb-3 mb-md-0">
                  <img src="assets/images/svg/feature-icon-2.svg" alt=""
                    class=" bg-primary icon-shape icon-xxl rounded-circle">
                </div>
                <div class="ms-md-4">
                  <h2 class="fw-bold mb-1">Reasoning</h2>
                  </div>
              </div>
              <p class="mb-4 fs-4">Alphabet Test, Analogy, Arithmetical Reasoning, Blood Relations, Coding & Decoding, Classification, Cubes and Dices Test...</p>
              <a href="Aptitude/reasoning.php" class="btn-link" style="text-decoration:none;">View More <i
                  class="fe fe-plus"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12">
          <!-- features -->
          <div class="card mb-4">
            <div class="card-body p-6">
              <div class="d-md-flex mb-4">
                <div class="mb-3 mb-md-0">
                  <img src="assets/images/svg/feature-icon-3.svg" alt=""
                    class=" bg-primary icon-shape icon-xxl rounded-circle">
                </div>
                <div class="ms-md-4">
                  <h2 class="fw-bold mb-1">Technical</h2>
                  </div>
              </div>
              <p class="mb-4 fs-4">OOP'S, DBMS, Operating Systems, UNIX, Linux, Networking, Data Structures, Deadlock, Data Mining & Warehousing...</p>
              <a href="Aptitude/technical.php" class="btn-link" style="text-decoration:none;">View More <i
                  class="fe fe-plus"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Aptitude Content END -->

    <!-- INTERVIEW PREPARATION START -->
    <div class="pt-lg-0 pb-lg-12">
      <div class="container">
            <div class="row mt-10">
                <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
                <!-- pricing -->
                    <div class="mb-8 text-center">
                        <h2 class="display-4 mb-3 fw-bold">Interview Preparation</h2>
                        <p class="lead mb-4">“One important key to success is self-confidence. An important key to self-confidence is preparation.”</p>
                        
                    </div>
                    <div class="row">
                        <!-- col  -->
                        <div class="col-lg-6 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card shadow-none border mb-3">
                            <!-- Card body -->
                            <div class="p-5">
                            <div class="mb-5">
                                <h4 class="fw-bold ls-md mb-4">INTERVIEW QUESTIONS</h4>
                                
                            </div>
                            <!-- button  -->
                            <a href="Interview/interview_questions.php" class="btn btn-outline-primary btn-block">View Questions</a>
                            <div class="px-2 mt-6">
                                <!-- List -->
                                <ul class="list-unstyled mb-0
                                ">
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-check  text-success me-2"></i>
                                    <span>150+ questions </span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-check  text-success me-2"></i>
                                    <span>success is not final ! </span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-check  text-success me-2"></i>
                                    <span>No shortcut, Work hard !</span>
                                </li>
                                <!-- <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-x   me-2"></i>
                                    <span>300+ beautiful design pages </span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-x   me-2"></i>
                                    <span>Admin dashboard pages </span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="fe fe-x   me-2"></i>
                                    <span>Support 24/7 hours </span>
                                </li> -->
                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card shadow-none border mb-3">
                            <!-- Card body -->
                            <div class="p-5">
                            <div class="mb-5">
                                <h4 class="fw-bold text-uppercase ls-md mb-4">INTERVIEW EXPERIENCES</h4>
                                
                            </div>
                            <!-- button  -->
                            <a href="Interview/interview_experiences.php" class="btn btn-primary btn-block">View Experiences</a>
                            <div class="px-2 mt-6">
                                <!-- List -->
                                <ul class="list-unstyled mb-0
                                ">
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-check  text-success me-2"></i>
                                    <span> 100+ quality questions </span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-check  text-success me-2"></i>
                                    <span>Simple and added by students </span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <i class="fe fe-check  text-success me-2"></i>
                                    <span>Add your own interview </span>
                                </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- INTERVIEW PREPARATION END -->

    <!-- MOCK TEST START -->

    <div class="py-lg-6 py-10 bg-dark" style="background: url(assets/images/background/course-graphics.svg)no-repeat; background-size: cover; background-position: top center">
  <div class="container">
      <!-- row -->
    <div class="row justify-content-center text-center">
      <div class="col-md-9 col-12">
          <!-- heading -->
        <h2 class="display-4 text-white">Practice Mock Tests</h2>
        <p class="lead text-white px-lg-12 mb-6">"The only good thing about this mock test is that for each question I have at least have a 25% chance of getting it right."</p>
          <!-- button -->
          <div class="d-grid d-md-block">
        <a href="MockTest/mock1.php" class="btn btn-info">START TEST</a>
      </div>
      </div>
    </div>
  </div>
</div>


    <!-- MOCK TEST END -->



    <!-- FOOTER START -->
        
    <!-- footer -->
        <!-- footer -->
        <div class="pt-lg-10 pt-5 footer bg-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                  <!-- about company -->
              <div class="mb-4">
                <img src="assets/images/brand/logo/PrePlaced.png" alt="">
                <div class="mt-4">
                  <p>PrePlaced is crowd source website for interview preparations. </p>                     <!-- social media -->
                  <div class="fs-4 mt-4">
                    <a href="#" class="mdi mdi-facebook text-muted me-2"></a>
                    <a href="#" class="mdi mdi-twitter text-muted me-2"></a>
                    <a href="#" class="mdi mdi-instagram text-muted "></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
              <div class="mb-4">
                    <!-- list -->
                <h3 class="fw-bold mb-3">Company</h3>
                <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                  <li><a href="#" class="nav-link">About</a></li>
                  <!-- <li><a href="#" class="nav-link">Pricing</a></li> -->
                  <!-- <li><a href="#" class="nav-link">Blog</a></li> -->
                  <li><a href="#" class="nav-link">Careers</a></li>
                  <li><a href="#" class="nav-link">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
              <div class="mb-4">
                    <!-- list -->
                <h3 class="fw-bold mb-3">Support</h3>
                <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                  <li><a href="#" class="nav-link">Help and Support</a></li>
                  <!-- <li><a href="#" class="nav-link">Become Instructor</a></li> -->
                  <!-- <li><a href="#" class="nav-link">Get the app</a></li> -->
                  <li><a href="#" class="nav-link">FAQ’s</a></li>
                  <!-- <li><a href="#" class="nav-link">Tutorial</a></li> -->
                </ul>

              </div>
            </div>
            <div class="col-lg-3 col-md-12">
                  <!-- contact info -->
              <div class="mb-4">
                <h3 class="fw-bold mb-3">Get in touch</h3>
                <!-- <p>339 McDermott Points Hettingerhaven, NV 15283</p> -->
                <p class="mb-1">Email: <a href="#">preplaced2022@gmail.com</a></p>
                <p>Phone: <span class="text-dark fw-semi-bold">(000) 123 456 789</span></p>

              </div>
            </div>
          </div>
          <div class="row align-items-center g-0 border-top py-2 mt-6">
            <!-- Desc -->
            <div class="col-lg-4 col-md-5 col-12">
                <span>© 2022 PrePlaced</span>
                </div>

              <!-- Links -->
            <div class="col-12 col-md-7 col-lg-8 d-md-flex justify-content-end">
                <nav class="nav nav-footer">
                  Created by Abhijeet Hambir & Shravan Shetty
                </nav>
            </div>
        </div>
        </div>
      </div>

    <!-- FOOTER END -->

    <!-- Scripts -->
    <!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/odometer/odometer.min.js"></script>
<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/quill/dist/quill.min.js"></script>
<script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="assets/libs/dragula/dist/dragula.min.js"></script>
<script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="assets/libs/typed.js/lib/typed.min.js"></script>
<script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>








<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>

</body>
</html>