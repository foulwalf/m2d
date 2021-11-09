<script>
    function myFunction() {
         document.location = ("index.php?id=liste_adherent.php");
        
    }
</script>

<?php
include('connexion.php');
$req=$pdo->query("select * from adherent where id_adherent='".$_GET['id1']."'");
$data=$req->fetch();

if(isset($_POST['ok'])){
$inf=$pdo->query("update  adherent set nom_adherent='".$_POST['nom']."',  prenom_adherent='".$_POST['prenom']."',  contact_adherent='".$_POST['contact']."',  email_adherent='".$_POST['email']."',  sexe_adherent='".$_POST['sexe']."', commune='".$_POST['quartier']."', entreprise_adherent='".$_POST['entreprise']."' where id_adherent=$_GET[id1]");
if($inf)
echo '<script type=text/javascript> myFunction()</script>';
}
?>


<!DOCTYPE html>
<html lang="fr">

 
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Premium Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/horizontal-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
      <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
             <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><center>IDENTIFICATION DE L'ADHERENT</h4>
                  <form class="form-sample" method="post" action="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>NOM</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nom" value="<?php echo $data['nom_adherent']; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>PRENOM</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="prenom" value="<?php echo $data['prenom_adherent']; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>CONTACT</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="contact" value="<?php echo $data['contact_adherent']; ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>EMAIL</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="<?php echo $data['email_adherent']; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                           
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>QUARTIER</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $data['commune']; ?>" name="quartier"/>
                          </div>
                        </div>
                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>ENTREPRISE</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="entreprise" value="<?php echo $data['entreprise_adherent']; ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>SEXE</strong></label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="membershipRadios1" value="M" <?php if($data['sexe_adherent']=='M') echo "checked"; ?> >
                                Masculin
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="membershipRadios2" value="F" <?php if($data['sexe_adherent']=='F') echo "checked"; ?>>
                                Feminin
                              </label>
                            </div>
                          </div>
                        </div>
                         
                            
                        </div>

                      </div>
                      <div class="col-md-6">
                        <button type="submit" name="ok" class="btn btn-primary me-2">Appliquez les modification</button>
                      </div>
                    </div>
                  
                                      
                    
                  </form>
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
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../js/file-upload.js"></script>
  <script src="../../../js/typeahead.js"></script>
  <script src="../../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>


 
</html>
