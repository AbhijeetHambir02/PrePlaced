<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-default" id="header">
	<div class="container-fluid px-0">
		<a class="navbar-brand" href="../index.php"
			><img src="../assets/images/brand/logo/PrePlaced.png" alt=""/></a>

		<!-- Button -->
		<button
			class="navbar-toggler collapsed"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbar-default"
			aria-controls="navbar-default"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="icon-bar top-bar mt-0"></span>
			<span class="icon-bar middle-bar"></span>
			<span class="icon-bar bottom-bar"></span>
		</button>
		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="navbar-default">
		<ul class="navbar-nav">
				<li class="nav-item"><a
						class="nav-link"
						href="../index.php"
					>
						Home
					</a>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarBrowse"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
						data-bs-display="static"
					>
						Aptitude
					</a>
					<ul
						class="dropdown-menu dropdown-menu-arrow"
						aria-labelledby="navbarBrowse"
					>
						<li>
							<h4 class="dropdown-header">Aptitude Section</h4>
						</li>
						<li >
							<a
								class="dropdown-item"
								href="../Aptitude/quantitative.php"
							>
								Quantitative
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="../Aptitude/reasoning.php"
							>
								Reasoning
							</a>
						</li>
						<li>
							<a
								href="../Aptitude/technical.php"
								class="dropdown-item"
							>
								Technical
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarLanding"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Interviews
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarLanding">
						<li>
							<h4 class="dropdown-header">Interview Section</h4>
						</li>
						<li>
							<a
								href="../Interview/interview_questions.php"
								class="dropdown-item"
							>
								Interview Questions
							</a>
						</li>
						<li>
							<a
								href="../Interview/interview_experiences.php"
								class="dropdown-item"
							>
								Interview Experiences
							</a>
						</li>
						<li>
							<a
								href="../Interview/add_interview.php"
								class="dropdown-item"
							>
								Add Interview Experience
							</a>
						</li>
						

					</ul>
				</li>
				<li class="nav-item"><a
						class="nav-link"
						href="../Departments/departments.php"
					>
						Departments
					</a>
				</li>
				<li class="nav-item"><a
						class="nav-link"
						href="../MockTest/mock1.php"
					>
						Mock Test
					</a>
				</li>
			</ul>
			<!-- <form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
				<span class="position-absolute ps-3 search-icon">
					<i class="fe fe-search"></i>
				</span>
				<input
					type="search"
					class="form-control ps-6"
					placeholder="Search Courses"
				/>
			</form> -->
			<ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">

				<?php
					if(!isset($_SESSION['user_email']))
					{
						echo '<a href="../login/signin.php" class="btn btn-success">Sign In</a>
						<a href="../login/signup.php" class="btn btn-primary">Sign Up</a>';

					}
					else
					{
						// include "../connectiondb.inc.php";
						$user_email=$_SESSION['user_email'];
				
						$sql="SELECT * FROM users WHERE user_email='$user_email' and signup_verification='Verified'";
						$result = mysqli_query($conn,$sql);
						$count=mysqli_num_rows($result);
						$row=mysqli_fetch_assoc($result);					
					?>


				<li class="dropdown ms-2 d-inline-block">
					<a
						class="rounded-circle"
						href="#"
						data-bs-toggle="dropdown"
						data-bs-display="static"
						aria-expanded="false"
					>
						<div class="avatar avatar-md avatar-indicators avatar-online">
							<img
								alt="avatar"
								src="<?php echo substr($row['profile_pic_path'],3); ?>"
								class="rounded-circle"
							/>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<div class="dropdown-item">
							<div class="d-flex">
								<div class="avatar avatar-md avatar-indicators avatar-online">
									<img
										alt="avatar"
										src="<?php echo substr($row['profile_pic_path'],3); ?>"
										class="rounded-circle"
									/>
								</div>
								<div class="ms-3 lh-1">
									<h5 class="mb-1"><?php echo $row['user_name']; ?></h5>
									<p class="mb-0 text-muted"><?php echo $_SESSION['user_email']; ?></p>
								</div>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<ul class="list-unstyled">
							
							<li>
								<a
									class="dropdown-item"
									href="../Profile/profile.php"
								>
									<i class="fe fe-user me-2"></i>Profile
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="../Profile/dashboard.php"
								>
									<i class="fe fe-star me-2"></i>Dashboard
								</a>
							</li>
							<li>
								<a class="dropdown-item" href="../Profile/security.php">
									<i class="fe fe-settings me-2"></i>Settings
								</a>
							</li>
						</ul>
						<div class="dropdown-divider"></div>
						<ul class="list-unstyled">
							<li>
								<a class="dropdown-item" href="../login/logout.php">
									<i class="fe fe-power me-2"></i>Sign Out
								</a>
							</li>
						</ul>
					</div>
				</li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
</nav>