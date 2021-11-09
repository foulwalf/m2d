<?php
include('connexion.php');
$req=$pdo->query("select count(id_adherent) as nb from adherent");
$data=$req->fetch();
$req1=$pdo->query("select count(id_adherent) as nbM from adherent where sexe_adherent='M'");
$data1=$req1->fetch();
$req2=$pdo->query("select count(id_adherent) as nbF from adherent where sexe_adherent='F'");
$data2=$req2->fetch();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:10:23 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Premium Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  
</head>

<body>
  <div class="container-scroller">
    

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenue  </h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="https://www.bootstrapdash.com/demo/skydash/template/images/dashboard/people.svg" alt="">
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4"><strong><font color=red>TOTAL DES MEMBRES DE M2D</font></strong></p>
                      <p class="fs-30 mb-2"><strong><?php echo $data['nb']; ?></strong></p>
                       
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">COTISATION MENSUEL</p>
                      <p class="fs-30 mb-2">61344</p>
                      <p>22.00% (30 days)</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">NOMBRE D'HOMME</p>
                      <p class="fs-30 mb-2"><?php echo $data1['nbM']; ?></p>
                       
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">NOMBRE DE FEMME</p>
                      <p class="fs-30 mb-2"><?php echo $data2['nbF']; ?></p>
                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

 
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:10:45 GMT -->
</html>