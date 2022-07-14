<?php
    if(isset($_GET['token']) && strlen($_GET['token'])>0)
    {
        include "../connectiondb.inc.php";
        
        $token = $_GET['token'];
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
	<title>PrePlaced | Forgot Password </title>
</head>
<!-- Page Content -->

<body>
	<div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center g-0 min-vh-100">
			<div class="col-lg-5 col-md-8 py-8 py-xl-0">
				<!-- Card -->
				<div class="card shadow">
					<!-- Card body -->
					<div class="card-body p-6">
						<div class="mb-2">
							<!-- <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt="" /></a> -->
							<h1 class="mb-1 fw-bold">Reset Your Password</h1>
							<p></p>
						</div>
                        <?php
                            if(isset($_GET['error']))
                            {
                                if($_GET['error']=="passwordnotmatch")
                                {
                                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                    <div>
                                        Password not match !
                                    </div>
                                </div>';
                                }
                                else if($_GET['error']=="passwordlen")
                                {
                                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                    <div>
                                        Password length should be greater than 6!
                                    </div>
                                </div>';
                                }
                            }
                        ?>

							<!-- Form -->
						<form action="reset_passworddb.php" Method="POST">
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
							<div class="mb-3">
								<label for="npassword" class="form-label">New Password</label>
								<input type="password" id="npassword" class="form-control" name="npassword" placeholder=" New Password "
									required />
							</div>
							<div class="mb-3">
								<label for="cpassword" class="form-label">Confirm Password</label>
								<input type="password" id="cpassword" class="form-control" name="cpassword" placeholder=" Confirm Password"
									required />
							</div>
								<!-- Button -->
							<div class="mb-3 d-grid">
								<button type="submit" class="btn btn-primary" name="submit_btn">
									Submit
								</button>
							</div>
							<span>Return to <a href="signin.php">Sign in</a></span>
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
</html>