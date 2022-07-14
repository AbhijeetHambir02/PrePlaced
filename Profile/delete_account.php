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
				<!-- User info -->
			<div class="row align-items-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-12">
					<!-- Bg -->
					<div class="pt-16 rounded-top-md" style="
								background: url(../assets/images/background/profile-bg.jpg) no-repeat;
								background-size: cover;
							"></div>
					<div
						class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
						<div class="d-flex align-items-center">
							<div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
								<img src="<?php echo substr($row['profile_pic_path'],3);?>" class="avatar-xl rounded-circle border border-4 border-white"
									alt="" />
							</div>
							<div class="lh-1">
								<h2 class="mb-0">
									<?php echo $row['user_name'];?>
									
								</h2>
								<p class="mb-0 d-block"><i class="fas fa-at"></i> <?php echo $row['user_email'];?></p>
							</div>
						</div>
						<div>
							<a href="dashboard.php" class="btn btn-outline-primary btn-sm d-none d-md-block">Go to
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
				<div class="col-lg-9 col-md-8 col-12">
				<?php
					if(isset($_GET['var']))
					{
						if($_GET['var']=="AccountDeleted")
						{
							echo '<div class="alert alert-success d-flex align-items-center" role="alert">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
									<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
								</svg>
								<div>
									Account Deleted Successfully!
								</div>
							</div>';
						}
						else
						{
						echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
								<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
							</svg>
							<div>
								Something went wrong!
							</div>
						</div>';
						}
					}
				?>
					
					<!-- Card -->
					<div class="card">
						<!-- Card header -->
						
						<!-- Card body -->
						<div class="card-body">
							<div class="d-lg-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center mb-2 mb-lg-0">
									<div class="ms-3">
										<h2 class="mb-0">Delete Account</h2>
									</div>
								</div>
							</div>
							<hr class="my-5" />
							<div>
								<h4 class="mb-0">Do you want to permanently delete your account?</h4>
								If you want to permanently delete your account, let us know. Once the deletion process begins,
								you won't be able to reactivate your account or retrieve any of the information you have added.
								<div class="mt-6">
									<form action="editprofile/delete_accountdb.php" method="POST">
										<button type="submit" class="btn btn-danger mb-2" name="delete_account_btn">Delete Your Account</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL TO UPLOAD PROFILE PIC START-->
	<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload Profile Picture</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="editprofile/upload_avatar.php" method="POST" enctype="multipart/form-data">
						<div class="input-group mb-6">
							<label class="input-group-text" for="fileToUpload">Upload</label>
							<input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
						</div>
						<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-sm">Upload Avatar</button>
					</form>
				</div>
			
			</div>
		</div>
	</div>
	<!-- MODAL TO UPLOAD PROFILE PIC END-->


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
<script src="../assets/js/custom.js"></script>
</body>

</html>