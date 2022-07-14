<?php
  include "../connectiondb.inc.php";
  
  session_start();
  if(isset($_SESSION['user_email']))
  {
    $user_email = $_SESSION['user_email'];    
  }
  else
  {
    header('Location: ../login/signin.php');
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
  <title>Dashboard || PrePlaced</title>
</head>
<body>

  <!-- HEADER -->
  <?php include "../header/header.php";?>
  <!-- HEADER -->
  <?php
    
    $query = "SELECT * FROM test_result WHERE USER_EMAIL = '$user_email' ORDER BY CORRECT_ANS DESC";
    $result = mysqli_query($conn, $query);
    $row_count = mysqli_num_rows($result);
    // print($count);
    $tests = floor($count/20);

    ?>

<div class="container">
  <div class="row">
    <h1 class="display-2 text-center mt-10 mb-4 fw-bold">All Tests Result....</h1>
    <?php
      if($row_count>0)
      {
    ?>
      <div class="col-12 mb-8">
        <div class="card">
            <!-- table  -->
            <div class="table-responsive">
            <table class="table table-hover table-success mb-0">
                <thead>
                <tr class="table-primary">
                    <th class="py-3" style="font-size:1rem;">Sr</th>
                    <th class="py-3" style="font-size:1rem;">Topic</th>
                    <th class="py-3" style="font-size:1rem;">Aptitude</th>
                    <th class="py-3" style="font-size:1rem;">Correct </th>
                    <th class="py-3" style="font-size:1rem;">Wrong </th>
                    <th class="py-3" style="font-size:1rem;">Date</th>
                </tr>
                </thead>

                <?php
                    $count=0;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $count += 1;
                ?>
                <tbody>
                <tr>
                    <td class="">
                        <span class="h4 text-inherit"> <?php echo $count."."; ?></span>
                    </td>
                    <td>
                        <span class="h4 text-inherit"> <?php echo ucwords(strtolower($row['TOPICNAME'])); ?> </span>
                    </td>
                    <td>
                        <span class="h4 text-inherit"> <?php echo ucfirst($row['QTYPE']); ?> </span>
                    </td>
                    <td class="">
                        <span class="h4 text-inherit"> <?php echo $row['CORRECT_ANS']; ?>
                        <?php if($row['CORRECT_ANS']<9){ ?>
                            <i class="bi bi-patch-question-fill text-danger mx-2"></i>
                            <?php }else if($row['CORRECT_ANS']<15 && $row['CORRECT_ANS']>8){ ?>
                                <i class="bi bi-patch-check-fill text-warning mx-2"></i>
                        <?php } else { ?>
                            <i class="bi bi-patch-check-fill text-success mx-2"></i>
                        <?php }?>    
                        </span>
                    </td>
                    <td>
                        <span class="h4 text-inherit"> <?php echo $row['WRONG_ANS']; ?> </span>
                    </td>
                    <td>
                        <span class="h4 text-inherit"> <?php echo $row['DATE_TIME']; ?> </span>
                    </td>
                </tr>
                </tbody>
                <?php
                    }
                ?>
                    </table>
                </div>
            </div>
          </div>
          <?php
            }
            else
            {
              echo '<h2 class="text-center text-muted mt-2 mb-4 fw-bold">You have not attempt any test yet!</h2>';
            }
          ?>
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