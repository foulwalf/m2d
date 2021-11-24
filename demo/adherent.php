<?php
include('connexion.php');
if (isset($_POST['ok'])) {
  $inf = $pdo->query("insert into adherent(nom_adherent,prenom_adherent,contact_adherent,email_adherent,sexe_adherent,commune,entreprise_adherent) values('$_POST[nom]','$_POST[prenom]','$_POST[contact]','$_POST[email]','$_POST[sexe]','$_POST[quartier]','$_POST[entreprise]')");
  if ($inf)
    echo '<script type=text/javascript> myFunction()</script>';
}
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:06 GMT -->

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

<body onload="getCommunes();">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle commune</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Commune</label>
            <input type="text" class="form-control" id="input_commune" name="n_commune" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary" name="ajouter_commune" id="ajouter_commune" disabled>Ajouter</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <center>IDENTIFICATION DE L'ADHERENT
                  </h4>
                  <form class="form-sample" method="post" action="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>NOM</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nom" placeholder="nom adherent" name="nom" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>PRENOM</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="prenom" placeholder="prénom adherent" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>CONTACT</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="contact" placeholder="contact adherent" required />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>EMAIL</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="email adherent" name="email" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><strong>COMMUNE</strong></label>
                            <div class="input-group col-sm-9 w-75">
                              <select name="quartier" id="commune" class="form-select" required>
                                <option value="">...</option>
                              </select>
                              <button class="btn btn-primary col-1 d-flex justify-content-center align-items-center" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+</button>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><strong>ENTREPRISE</strong></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="entreprise" placeholder="entreprise  adherent" required />
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
                                <input type="radio" class="form-check-input" name="sexe" id="membershipRadios1" value="M" required>
                                Masculin
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexe" id="membershipRadios2" value="F" required>
                                Feminin
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <button type="submit" name="ok" class="btn btn-primary me-2">Enregistrer</button>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- End custom js for this page-->
  <script>
    var btn = document.getElementById('ajouter_commune');
    var input = document.getElementById('input_commune');
    var modal = new bootstrap.Modal(document.getElementById('exampleModal'), {
      keyboard: false
    })
    input.addEventListener('change', function name(params) {
      if (this.value != '') {
        btn.disabled = false;
      } else {
        btn.disabled = true;
      }
    })
    btn.addEventListener('click', function() {
      ajouter_commune()
    });

    function ajouter_commune() {
      var nom = input.value;
      console.log(nom);
      const data = {
        'method': 'addCommune',
        'value': nom
      }
      $.ajax({
        url: 'function.php',
        type: 'POST',
        crossDomain: true,
        data: data,
        dataType: 'json',
        success: function(response) {
          //console.log(response);
          if (response) {
            getCommunes();
            input.value = '';
            modal.hide();
            alert("Commune ajoutée")
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }

    function getCommunes() {
      const data = {
        'method': 'getCommunes',
      }
      $.ajax({
        url: 'function.php',
        type: 'POST',
        crossDomain: true,
        data: data,
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if (response) {
            var select = document.getElementById('commune');
            select.innerHTML = '';
            var option = document.createElement('option');
            option.value = '';
            option.innerHTML = '...';
            select.appendChild(option);
            response.forEach(commune => {
              var option = document.createElement('option');
              option.value = commune.ID_COMMUNE;
              option.innerHTML = commune.NOM_COMMUNE;
              select.appendChild(option);
            });
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }
  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:08 GMT -->

</html>