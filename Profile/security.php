<?php

	session_start();

	if(isset($_SESSION['user_email'])){

		include "../connectiondb.inc.php";
		$user_email=$_SESSION['user_email'];

		$sql="SELECT * FROM users WHERE user_email='$user_email' and signup_verification='Verified';";
        $result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);

		if($count!=1){
			header("Location: ../login/signin.php");
			exit();     
		}
	}
	else
	{
		header("Location: ../login/signin.php");
		exit();
	}


	// Profile picture
	$query = "SELECT * FROM users WHERE	user_email='$user_email'";
	$result = mysqli_query($conn, $query);
	$row=mysqli_fetch_assoc($result);

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
	<title>Profile || PrePlaced</title>
</head>

<body>

<!-- HEADER -->
<?php include"../header/header.php"; ?>


<div class="pt-5 pb-5">
		<div class="container">
			<div class="row align-items-center">
				<!-- User info -->
				<div class="col-xl-12 col-lg-12 col-md-12 col-12">
					<div class="pt-16 rounded-top-md" style="
								background: url(../assets/images/background/profile-bg.jpg) no-repeat;
								background-size: cover;
							"></div>
					<div
						class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
						<div class="d-flex align-items-center">
							<div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
								<img src="<?php echo substr($row['profile_pic_path'],3); ?>" class="avatar-xl rounded-circle border border-4 border-white"
									alt="" />
							</div>
							<div class="lh-1">
								<h2 class="mb-0">
									<?php echo $row['user_name']; ?>
									<a href="#" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top" title="Beginner">
										
									</a>
								</h2>
								<p class="mb-0 d-block"><?php echo $row['user_email']; ?></p>
							</div>
						</div>
						<div>
							<a href="dashboard-student.html" class="btn btn-outline-primary btn-sm d-none d-md-block">Go to
								Dashboard</a>
						</div>
					</div>
				</div>
			</div>

	<!-- Content -->

	<div class="row mt-0 mt-md-4">
				<div class="col-lg-3 col-md-4 col-12">
					<!-- Side navbar -->
					<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
							<!-- Menu -->
						<a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
							<!-- Button -->
						<button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
							data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="fe fe-menu"></span>
						</button>
							<!-- Collapse navbar -->
						<div class="collapse navbar-collapse" id="sidenav">
							<div class="navbar-nav flex-column">
							<span class="navbar-header">Account Settings</span>
                			<!-- List -->
							<ul class="list-unstyled ms-n2 mb-0">
									<!-- Nav item -->
									<li class="nav-item active">
										<a class="nav-link" href="profile.php"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="security.php"><i class="fe fe-user nav-icon"></i>Security</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link " href="dashboard.php"><i class="fe fe-calendar nav-icon"></i>Result</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="delete_account.php"><i class="fe fe-trash nav-icon"></i>Delete
											Account</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="../login/logout.php"><i class="fe fe-power nav-icon"></i>Sign Out</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<!-- Content -->
				<div class="col-lg-9 col-md-8 col-12">
				<?php
					if(isset($_GET['result'])){
						if($_GET['result']=="invalidconfirmpassword"){
							echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
									<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
									</svg>
									<div>
									Invalid Confirm Password!
									</div>
								</div>';
						}	
						elseif($_GET['result']=="dberror"){
							echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
									<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
									</svg>
									<div>
									Invalid Database Error!
									</div>
								</div>';
						}
						elseif($_GET['result']=="invalidoldpassword"){
							echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
									<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
									</svg>
									<div>
									Invalid Current Password!
									</div>
								</div>';
						}
					}
					
					?>
					<!-- Card -->
					<div class="card">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Security</h3>
							<p class="mb-0">
								Edit your account security settings and change your password here.
							</p>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<div>
								<h4 class="mb-0">Change Password</h4>
								<p>
									We will email you a confirmation when changing your
									password, so please expect that email after submitting.
								</p>
								<!-- Form -->
								<form class="row" action="editprofile/change_password.php" method="POST">
									<div class="col-lg-6 col-md-12 col-12">
											<!-- Current password -->
										<div class="mb-3">
											<label class="form-label" for="currentpassword">Current password</label>
											<input id="currentpassword" type="password" name="currentpassword" class="form-control"
												placeholder="" required />
										</div>
											<!-- New password -->
										<div class="mb-3 password-field">
											<label class="form-label" for="newpassword">New password</label>
											<input id="newpassword" type="password" name="newpassword" class="form-control mb-2"
												placeholder="" required />
											<div class="row align-items-center g-0">
												<div class="col-6">
													<span data-bs-toggle="tooltip" data-placement="right"
														title="Test it by typing a password in the field below. To reach full strength, use at least 6 characters, a capital letter and a digit, e.g. 'abc@123'">Password
														strength
														<i class="fas fa-question-circle ms-1"></i></span>
												</div>
											</div>
										</div>
										<div class="mb-3">
												<!-- Confirm new password -->
											<label class="form-label" for="confirmpassword">Confirm New Password</label>
											<input id="confirmpassword" type="password" name="confirmpassword" class="form-control mb-2"
												placeholder="" required />
										</div>
											<!-- Button -->
										<button type="submit" name="change_password_sbtn" class="btn btn-primary">
											Save Password
										</button>
										<div class="col-6"></div>
									</div>
								</form>
									<div class="col-12 mt-4">
										<p class="mb-0">
											Can't remember your current password?
											<a href="#">Reset your password via email</a>
										</p>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
    <?php include "../header/footer.php";?>
	<!-- Footer -->


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