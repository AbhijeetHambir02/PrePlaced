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

<!-- JQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- Theme CSS -->
<link rel="stylesheet" href="../../assets/css/theme.min.css">

    <title>PrePlaced || Add Experience</title>

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
                            <h1 class="mb-0 h2 fw-bold"> Add Interview Experience</h1>
                        </div>
                    </div>
                </div>
            </div>

            
        <div class="row mx-6">
            <!-- error -->
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error']=="InternalError")
                    {?>
                        <div class="alert alert-danger text-center" role="alert">
                        Sorry, The interview experience is not submitted due to some internal error!
                        </div>
                    <?php
                    }
                    else if($_GET['error']=="InvalidAnswerFormat")
                    {?>
                        <div class="alert alert-danger text-center" role="alert">
                        Sorry, The interview experience is not submitted due to some internal error!
                        </div>
                    <?php
                    }
                    else if($_GET['error']=="success")
                    {?>
                        <div class="alert alert-success text-center" role="alert">
                            Interview Experience submitted successfully for verification !
                        </div>
                    <?php
                    }
                }
            ?>
            <!-- Card -->
            <div class="card mb-4 smooth-shadow-md p-3">
                <div class="card-header">
                    <h3 class="mb-0">Basic Information</h3>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form -->
                    <form class="row" id="identifier" action="interview_experiencedb.php" method="POST">

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" name="username" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="college">College Name</label>
                            <input type="text" id="college" name="college" class="form-control" placeholder="College Name" required>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="company">Company Name</label>
                            <input type="text" id="company" name="company" class="form-control" placeholder="Comapny Name" required>
                        </div>
                        
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="location">Location</label>
                            <input type="text" id="location" name="location" class="form-control" placeholder="Location" required>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="date">Date</label>
                            <input type="text" id="date" name="date" class="form-control bg-transparent" value="<?php echo date("d-M-Y"); ?>" readonly required>
                        </div>


                        <div class="card-header mb-4">
                            <h3 class="mb-0">Interview Details</h3>
                        </div>
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="title">Interview Title</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Interview title" required>
                        </div>

                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="jobrole">Job Role</label>
                            <input type="text" id="jobrole" name="jobrole" class="form-control" placeholder="Job Role" required>
                        </div>

                        <div class="mb-3 col-12 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Interview experience</label>
                                <div id="editor">
                                    <p>Enter your complete interview experience</p>
                                </div>
                                <!-- <small>A brief summary of your courses.</small> -->
                            </div>
                            <textarea style="display:none;" name="interview_details" id="hiddenArea"></textarea>
                        </div>

                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label">Result</label>
                            <select class="selectpicker" name="result" data-width="100%">
                                <option value="selected">Selected</option>
                                <option value="not selected">Not Selected</option>
                                <option value="prefer not to say">Prefer not to say</option>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label" for="tags">Tags</label>
                            <input name='tags' value='On Campus, Interview Experience' name="tags">
                        </div>

                        <div class="mt-4 text-center">
                            <a href="interview_experience.php"><button type="button" class="btn btn-danger mb-2">Clear</button></a>
                            <button id="submitbtn" type="submit" name="submit" class="btn btn-success mb-2">Add</button>
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
    <script src="../../assets/js/theme.min.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>
</html>

