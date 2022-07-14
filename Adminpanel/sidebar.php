<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand mt-3" href="index.php">
            <img src="../assets/images/brand/logo/ass.png" alt="Preplaced" />
            <span class="text-white">|</span>
            <span class="text-white fw-bold h3"> PrePlaced<span>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                    <i class="bi bi-house-door me-2"></i><span class="fs-4">Home</span>
                    </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="#" data-bs-toggle="collapse" data-bs-target="#navDashboard" aria-expanded="false" aria-controls="navDashboard">
                    <i class="bi bi-pencil-square me-2"></i> <span class="fs-4">Aptitude section</span>
                </a>
                <div id="navDashboard" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link   " href="Aptitude/aptitude_topic.php?var=quantitative">
                                    Quantitative
                                </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item ">
                            <a class="nav-link " href="Aptitude/aptitude_topic.php?var=reasoning">
                                    Reasoning

                                </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item ">
                            <a class="nav-link " href="Aptitude/aptitude_topic.php?var=technical">
                                    Technical

                                </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link  collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#navCourses" aria-expanded="false" aria-controls="navCourses">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace me-2" viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                    </svg><span class="fs-4">Interview section</span>
                </a>
                <div id="navCourses"  class="collapse"  data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="Interview/questions.php">
                                    Interview Question
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Interview/experiences.php">
                                    Interview Experiences
                                </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link   collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navProfile" aria-expanded="false" aria-controls="navProfile">
                    <i class="bi bi-file-text me-2"></i> <span class="fs-4">Mock Test</span>
                </a>
                <div id="navProfile" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="MockTest/mock_all.php">
                                    All
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="MockTest/quantitative.php">
                                    Quantitative
                                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="MockTest/reasoning.php">
                                Reasoning
                                </a>
                            </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="MockTest/technical.php">
                                Technical
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <?php
                // include "../connectiondb.inc.php";

                $d_query = "SELECT DISTINCT NAME FROM departments ORDER BY NAME ASC";
                $d_result = mysqli_query($conn, $d_query);
            ?>
            <!-- Departments -->
            <li class="nav-item">
                <a class="nav-link" href="Departments/departments.php" data-bs-toggle="collapse" data-bs-target="#navDashboard1" aria-expanded="false" aria-controls="navDashboard">
                <i class="me-2 i bi-building"></i> <span class="fs-4">Departments</span>
                </a>
                <div id="navDashboard1" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <?php
                            while($d_data = mysqli_fetch_assoc($d_result))
                            {
                        ?>
                        <li class="nav-item ">
                            <a class="nav-link   " href="Departments/topics.php?var=<?php echo $d_data['NAME']; ?>">
                                    <?php echo ucwords(strtolower($d_data['NAME'])); ?>
                                </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </li>

            <!-- Add questions section-->
            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Add</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="AddQuestion/aptitude.php">
                    <i class="bi bi-plus-square me-2"></i> <span class="fs-4">Aptitude Questions</span>

                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="AddQuestion/interview_question.php">
                    <i class="bi bi-plus-square me-2"></i> <span class="fs-4">Interview Questions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="AddQuestion/interview_experience.php">
                    <i class="bi bi-plus-square me-2"></i> <span class="fs-4">Interview Experiences </span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link " href="AddQuestion/department.php">
                    <i class="bi bi-plus-square me-2"></i> <span class="fs-4">Department Questions</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link " href="AddQuestion/course.php">
                    <i class="bi bi-plus-square me-2"></i> <span class="fs-4">Course</span>
                </a>
            </li>
            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Users</div>
            </li>
                <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="User/users.php" data-bs-toggle="" data-bs-target="#navTables" aria-expanded="false" aria-controls="navTables">
                    <i class="nav-icon bi bi-people me-2"></i> <span class="fs-4">Students</span>
                </a>
            </li>
                <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="Departments/departments.php" data-bs-toggle="" data-bs-target="#navTables" aria-expanded="false" aria-controls="navTables">
                <i class="me-2 i bi-building"></i><span class="fs-4">Departments</span>
                </a>
            </li>
        </ul>                    
    </div>  
</nav>