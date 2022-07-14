<?php

  //Include Configuration File
  include("config1.php");

  $login_button = '';
  
  if(isset($_GET["code"]))
  {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if(!isset($token['error']))
    {
      $google_client->setAccessToken($token['access_token']);
      $_SESSION['access_token'] = $token['access_token'];
      $google_service = new Google_Service_Oauth2($google_client);
      $data = $google_service->userinfo->get();

      if(!empty($data['email']))
      {
        $_SESSION['user_email_address'] = $data['email'];
        $google_email=$_SESSION['user_email_address'];
      }

      include("../connectiondb.inc.php");
      $sql = "SELECT * FROM users WHERE user_email = '$google_email' AND login_type='Google';";  
      $result = mysqli_query($conn, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result); 

        if($count == 1)
        {  
          // CREATING A USER SESSION
          $_SESSION['user_email']=$google_email;
          
          header("Location: ../index.php");
          exit();
          }  
          else
          {  
              header("Location: signin.php?error=InvalidDetails"); 
              exit();
          }     
      }
      }

      if(!isset($_SESSION['access_token']))
      {
        $login_button = $google_client->createAuthUrl();
      }
      else
      {
        $login_button = $google_client->createAuthUrl();
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
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon-1.png">

<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
  <title>Sign in | PrePlaced</title>
</head>

<body>
  <!-- Page content -->
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
              <!-- <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt=""></a> -->
              <center><h1 class="mb-1 fw-bold">SIGN IN</h1></center>
            </div>

            <!-- signup successful START -->
            <?php
              if(isset($_GET['error']))
              {
                if($_GET['error']=="verification")
                {
                  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>
                      Account Created Successfully!<br>
                      To Sign In verify your email first!
                    </div>
                </div>';
                }
                else if($_GET['error']=="AccountVerified")
                {
                  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>
                      Account Verified !
                    </div>
                </div>';
                }
                else if($_GET['error']=="passwordrest")
                {
                  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>
                      Password Reset Successfully !
                    </div>
                </div>';
                }
                elseif($_GET['error']=="Signedout")
                {
                  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>
                      Signed Out Successfully!
                    </div>
                </div>';
                }
                elseif($_GET['error']=="passwordchanged")
                {
                  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <div>
                      Password Changed Successfully!
                    </div>
                </div>';
                }
                elseif($_GET['error']=="InvalidDetails")
									{
										echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</svg>
											<div>';
												echo 'Invalid Credentials!';
											echo '</div>
										</div>';
									}
              }
            ?>
            <!-- signup successful END -->

            <!-- Form -->
            <form action="signindb.php" method="POST">
              	<!-- Username -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="user_email" value="<?php if(isset($_COOKIE["user_email"])) { echo $_COOKIE["user_email"]; } ?>" placeholder="Enter your email"
                  required>
              </div>
              	<!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="user_password" value="<?php if(isset($_COOKIE["user_password"])) { echo $_COOKIE["user_password"]; } ?>" placeholder="•••••••••"
                  required>
              </div>
              	<!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme">
                  <label class="form-check-label " for="rememberme">Remember me</label>
                </div>
                <div>
                  <a href="forgotpassword.php">Forgot your password?</a>
                </div>
              </div>
              <div>
                	<!-- Button -->
                  <div class="d-grid">
                <button type="submit" class="btn btn-primary" name="signin_btn">Sign in</button>
              </div>
              
            </div>
            <div class="mb-4 mt-3">
              <!-- <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt=""></a> -->
              <span>Don’t have an account? <a href="signup.php" class="ms-1">Sign up</a></span>
            </div>

            
              <hr class="my-4">
              <div class="mt-4 text-center">
                <!--Google-->
                <!-- <a href="" class="btn-social btn-social-outline btn-google">
                  <i class="fab fa-google"></i>
                </a> -->
              </div>

              <div class="row">
                <center><div class="col-md-3" style="width:100%;">
                  <a class="btn btn-outline-dark" href="<?php echo $login_button; ?>" role="button" style="text-transform:none">
                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="" src="../assets/images/logo/google_logo.webp" />
                    Sign in with Google
                  </a>
                </div></center>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
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


<!-- Mirrored from codescandy.com/geeks-bootstrap-5/pages/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 14:19:38 GMT -->
</html>