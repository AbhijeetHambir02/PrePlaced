<?php

// GOOGLE LOGIN
//Include Configuration File
include("config.php");

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

	
	if(!empty($data['given_name']))
		{
			$_SESSION['user_first_name'] = $data['given_name'];
			$user_fname=$_SESSION['user_first_name'];
		}

	if(!empty($data['family_name']))
	{
		$_SESSION['user_last_name'] = $data['family_name'];
		$user_lname=$_SESSION['user_last_name'];
	}
	
	//   if(!empty($data['gender']))
	//   {
	//   $_SESSION['user_gender'] = $data['gender'];
	//   }

	if(!empty($data['email']))
	{
		$_SESSION['user_email_address'] = $data['email'];
	}


	// if(!empty($data['picture']))
	// {
	// 	$_SESSION['user_image'] = $data['picture'];
	// 	$profile_img=$_SESSION['user_image'];
	// }
	
	// INSERT GOOGLE USER IN DATABASE 
	
		include("../connectiondb.inc.php"); 

		$google_email=$_SESSION['user_email_address'];
		$password=$_SESSION['user_email_address'];
		
		if(isset($user_fname) and isset($user_lname))
		{
			$user_name=$user_fname.' '.$user_lname;
		}
		else
		{
			$user_name='';
		}
		
		
		$login_type="Google";
		
		$sql="SELECT * from users WHERE user_email='$google_email';";
		$result = mysqli_query($conn, $sql);  
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
		$count = mysqli_num_rows($result);
		$verification="Verified";
		$date=date("Y-m-d h:i:sa");
		$token = "000000";
		
			if($count==0)
			{
				$isql="INSERT INTO users(user_id,user_name,user_email,user_password,login_type,signup_date,signup_verification,signup_token) VALUES (DEFAULT,?,?,?,?,?,?,?);";
				$stmt=mysqli_stmt_init($conn);
			
				if(!mysqli_stmt_prepare($stmt,$isql)){
					echo "SQL ERROR";
					exit();
				}
				else{
					mysqli_stmt_bind_param($stmt,"sssssss",$user_name,$google_email,$password,$login_type,$date,$verification,$token);
					mysqli_stmt_execute($stmt);
					
					//Reset OAuth access token
					$google_client->revokeToken();
					//Destroy entire session data.
					session_destroy();
					
					// Creating a folder for users data
					
					// if(!file_exists('../img/listing/'.$google_email)){
					// 	mkdir('../img/listing/'.$google_email);
					// }
					
					header("Location: signin.php?error=AccountCreated");
				}
			}
			else
			{
				//Reset OAuth access token
				$google_client->revokeToken();
				//Destroy entire session data.
				session_destroy();
				header("Location: signup.php?error=Existing_User_Error");
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
		<title>Sign Up | PrePlaced</title>
	</head>

<body>
	<!-- Page content -->
	<div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center g-0 min-vh-100">
			<div class="col-lg-5 col-md-8 py-8 py-xl-0">
				<!-- Card -->
				<div class="card shadow">
					<!-- Card body -->
					<div class="card-body px-6">
						<div class="mb-2">
							<!-- <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt="" /></a> -->
						    <center><h1 class="mb-1 fw-bold">SIGN UP</h1></center>
						</div>
						
						<!-- Display input errors START -->
							<?php
								if(isset($_GET['error']))
								{
									if($_GET['error']=="InternalError")
									{
										echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</svg>
											<div>';
												echo 'Internal Error!';
											echo '</div>
										</div>';
									}
									elseif($_GET['error']=="InvalidName")
									{
										echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</svg>
											<div>';
												echo 'Invalid Name!';
											echo '</div>
										</div>';
									}
									elseif($_GET['error']=="Password_Length_Error")
									{
										echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</svg>
											<div>';
												echo 'Password length should be greater than 6!';
											echo '</div>
										</div>';
									}
									elseif($_GET['error']=="PasswordNotSame")
									{
										echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</svg>
											<div>';
												echo 'Password entered are not same!';
											echo '</div>
										</div>';
									}
									elseif($_GET['error']=="Existing_User_Error")
									{
										echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</svg>
											<div>';
												echo 'User with that email already exists!';
											echo '</div>
										</div>';
									}
									elseif($_GET['error']=="EmailError")
									{
										echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</svg>
											<div>';
												echo 'There was a problem in sending email!';
											echo '</div>
										</div>';
									}
								}
							?>
						<!-- Display input errors END -->

						<!-- Form -->
						<form action="signupdb.php" method="POST">
							<!-- Username -->
							<div class="mb-3">
								<label for="username" class="form-label">Name</label>
								<input type="text" id="username" class="form-control" name="user_name" placeholder="Enter your name"
									required />
							</div>
							<!-- Email -->
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" id="email" class="form-control" name="user_email" placeholder="Enter your email"
									required />
							</div>
							<!-- Password -->
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" id="password" class="form-control" name="user_password" placeholder="•••••••••"
									required />
							</div>
							<!-- Confirm Password -->
							<div class="mb-3">
								<label for="cpassword" class="form-label">Confirm Password</label>
								<input type="password" id="cpassword" class="form-control" name="user_cpassword" placeholder="•••••••••"
									required />
							</div>
							<!-- Checkbox -->
							<div class="mb-3">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="agreeCheck" />
									<label class="form-check-label" for="agreeCheck">
										<span>I agree to the <a href="terms-condition-page.html">Terms of
												Service </a>and
											<a href="terms-condition-page.html">Privacy Policy.</a>
										</span>
									</label>
								</div>
							</div>
							<div>
								<!-- Button -->
								<div class="d-grid">
									<button type="submit" class="btn btn-primary" name="signup_btn" id="signup_btn">
										Create Account
									</button>
								</div>
							</div>
                            <div class="mb-4 mt-3">
                                <!-- <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt="" /></a> -->
                                <span>Already have an account?
								    <a href="signin.php" class="ms-1">Sign in</a>
								</span>
						    </div>

							<hr class="my-4" />
							<div class="mt-4 text-center">
								<!--Google-->
                                <!-- <a href="" class="btn-social btn-social-outline btn-google">
                                	<i class="fab fa-google"></i>
                                </a> -->
								<div class="row">
									<center><div class="col-md-3" style="width:100%;">
									<a class="btn btn-outline-dark" href="<?php echo $login_button; ?>" role="button" style="text-transform:none">
										<img width="20px" style="margin-bottom:3px; margin-right:5px" alt="" src="../assets/images/logo/google_logo.webp" />
										Sign in with Google
									</a>
									</div></center>
								</div>

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

	<!-- Custom JS -->
	<script src="../assets/js/custom.js"></script>
</body>
</html>