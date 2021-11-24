<?php
session_start();

if (!isset($_SESSION['LOGIN_USER'])) {
  echo "<script>alert('Veuillez vous connecter s\'il vous plait'); location.href=\"../index.php\"</script>";
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:10:23 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> M2D Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/horizontal-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <style>
    .nav-item:hover>.dropdown-menu{
      display: block;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- ENTETE AVEC LES MENUS  -->
    <?php include("header.php"); ?>
    <!-- FIN DE L'ENTETE ---->

    <!-- partial -->
    <?php
    if (!empty($_GET['id']))
      include($_GET['id']);
    else
      include("tableau.php");
    ?>
  </div>

  <?php include("footer.php"); ?>
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


</body>


</html>