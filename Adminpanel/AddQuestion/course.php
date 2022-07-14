<?php
    include "../../connectiondb.inc.php";
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="PrePlaced helps students to improve their aptitude skills" />


<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon/favicon-1.png">


<!-- Libs CSS -->
<link href="../../assets/fonts/feather/feather.css" rel="stylesheet">
<link href="../../assets/libs/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="../../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="../../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="../../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="../../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="../../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="../../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="../../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="../../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="../../assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">



<!-- Theme CSS -->
<link rel="stylesheet" href="../../assets/css/theme.min.css">
    <title>PrePlaced || Add Course</title>

</head>
<body>

    <div id="db-wrapper">
        <?php
            include "../sidebar/sidebar.php";
        ?>
    <div id="page-content">
        <?php
            include "../sidebar/header.php";
        ?>


        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-2 mb-6 d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-0 h2 fw-bold"> Add Course </h1>
                        </div>
                    </div>
                </div>
            </div>

            
        <div class="row mx-6">
            
        <?php
                if(isset($_GET['var']))
                {
                    if($_GET['var']=="success")
                    {?>
                        <div class="alert alert-success text-center" role="alert">
                            Course Created successfully !
                        </div>
                    <?php
                    }
                    else if($_GET['var'] == "InternalError")
                    {
                    ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Something went wrong, Please try again !
                        </div>
                    <?php
                    }
                    else if($_GET['var'] == "FileTypeError")
                    {
                    ?>
                        <div class="alert alert-danger text-center" role="alert">
                            File extension should be png, jpg, jpeg !
                        </div>
                    <?php
                    }
                }
                ?>

            <div class="card mb-4 smooth-shadow-md">
                <!-- Card Body -->
                <div class="card-body">

                    <form action="coursedb.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-2 col-12 col-md-12">
                            <label class="form-label" for="dept">Course :</label>
                            <input type="text" id="dept" name="name" class="form-control" placeholder="Course Name" required>
                        </div>
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="teacher">Teacher : </label>
                            <input type="text" id="teacher" name="teacher" class="form-control" placeholder="Teacher Name" required>
                        </div>
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="fileToUpload">Upload photo : </label>
							<input type="file" class="form-control" name="filename" id="fileToUpload" required>
						</div>
                        <div class="text-center">
                            <button type="submit" name="add_submit" class="btn btn-success mb-0">Create Course</button>
                        </div>
                    </form>
                </div>
            </div>
            




            <!-- Add course -->
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error']=="success")
                    {?>
                        <div class="alert alert-success text-center" role="alert">
                            Course details Added successfully !
                        </div>
                    <?php
                    }
                    else if($_GET['error'] == "InternalError")
                    {
                    ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Something went wrong, Please try again !
                        </div>
                    <?php
                    }
                }
                ?>

            <!-- Card -->
            <div class="card mb-4 smooth-shadow-md p-3">
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form -->
                    <form class="row" action="coursedb.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 col-12 col-md-12">
                            <label class="form-label">Course</label>
                            <select class="selectpicker" name="coursename" data-width="100%">
                                
                                <!-- Fetching departments -->
                                <?php
                                    $query = "SELECT DISTINCT COURSE_NAME FROM course";
                                    $result = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                        <option value="<?php echo $row['COURSE_NAME']; ?>"><?php echo ucwords($row['COURSE_NAME']); ?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="coursename">Title : </label>
                            <input type="text" id="coursename" name="title" class="form-control" placeholder="Enter topic" required>
                        </div>
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="des">Details : </label>
                            <div class="mb-3">
                                <div id="editor">
                                    <p>Enter detail theory on this topic...</p>
                                </div>
                                <!-- <small>A brief summary of your courses.</small> -->
                            </div>
                            <textarea style="display:none;" name="details" id="hiddenArea"></textarea>
                        </div>
                        
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="teacher">Embed code : </label>
                            <input type="text" id="teacher" name="embedcode" class="form-control" placeholder="Paste code here..." required>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="course.php"><button type="button" class="btn btn-danger mb-2">Clear</button></a>
                            <button type="submit" name="submit" id="submitbtn" class="btn btn-success mb-2">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        </div>

    </div>
    </div>


    <!-- Libs JS -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/odometer/odometer.min.js"></script>
    <script src="../../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="../../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
    <script src="../../assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="../../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="../../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="../../assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="../../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="../../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="../../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="../../assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="../../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="../../assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="../../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../../assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="../../assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="../../assets/js/custom.js"></script>
    <script src="../../assets/js/theme.min.js"></script>
</body>
</html>

