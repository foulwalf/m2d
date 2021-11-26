<?php
include('connexion.php');
if ($_SESSION['role'] == 'admin') {
  $req = $pdo->query("SELECT * from adherent join commune on adherent.commune = commune.ID_COMMUNE where id_adherent not in (select adherent from deces)");
} else {
  $req = $pdo->prepare("SELECT * from adherent join commune on commune.ID_COMMUNE = adherent.commune where id_adherent not in (select adherent from deces) and adherent.commune = ?");
  $req->execute([$_SESSION['commune']]);
}
$data = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014'], Tue, 31 Aug 2021 13:11:31 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>M2D</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/horizontal-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    .dropdown-toggle:focus>.dropdown-menu {
      display: block;
    }
  </style>
</head>

<body>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajout décès</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="function.php" method="POST">
          <div class="modal-body">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Membre:</label>
              <input required type="text" class="form-control bg-light" id="nom_membre_decede" readonly>
              <input required type="hidden" id="membre_decede" name="membre_decede">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Date de décès:</label>
              <input required type="date" class="form-control" id="recipient-name" name="date_deces" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" name="ajouter_deces" class="btn btn-primary">Ajouter</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <div class="modal fade" id="cotisationMensuelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-target="#staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cotisation mensuelle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="function.php" method="POST">
          <div class="modal-body">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Adhérent</label>
              <input required type="text" class="form-control bg-light" id="adherent_name" name="adherent_name" readonly>
              <input required type="hidden" class="form-control bg-light" id="adherent" name="adherent">
            </div>
            <div id="mensuel">
              <div class="mb-3">
                <label for="typeCotisation" class="col-form-label">Mois</label>
                <select required class="form-select" aria-label=".form-select-lg example" name="mois">
                  <option selected>...</option>
                  <option value="1">Janvier</option>
                  <option value="2">Février</option>
                  <option value="3">Mars</option>
                  <option value="4">Avril</option>
                  <option value="5">Mai</option>
                  <option value="6">Juin</option>
                  <option value="7">Juillet</option>
                  <option value="8">Août</option>
                  <option value="9">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Décembre</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Montant</label>
                <input required type="text" class="form-control" id="montant" name="montant" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" name="ajouter_cotisation_mensuelle" class="btn btn-primary">Ajouter</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <div class="modal fade" id="cotisationDecesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-target="#staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cotisation de décès</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="function.php" method="POST">
          <div class="modal-body">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Adhérent</label>
              <input required type="text" class="form-control bg-light" id="adherent_name" name="adherent_name" readonly>
              <input required type="hidden" class="form-control bg-light" id="adherent" name="adherent">
            </div>
            <div id="deces">
              <div class="mb-3">
                <label for="typeCotisation" class="col-form-label">Décès concerné</label>
                <select required class="form-select" aria-label=".form-select-lg example" id="deces_conc" name="deces_conc">
                  <option selected>...</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Montant</label>
                <input required type="text" class="form-control" id="montant" name="montant" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" name="ajouter_cotisation_deces" class="btn btn-primary">Ajouter</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">LISTE DES ADHERENTS</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nom et Prénom</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Commune</th>
                        <th>Entreprise</th>
                        <th colspan="3">
                          <center>Actions</center>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0;
                      foreach ($data as $v) {
                        $i++;
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td><strong>$v[nom_adherent] $v[prenom_adherent]</strong></td>";
                        echo "<td><strong>$v[contact_adherent]</strong></td>";
                        echo "<td><strong>$v[email_adherent]</strong></td>";
                        echo "<td><strong>$v[NOM_COMMUNE]</strong></td>";
                        echo "<td><strong>$v[entreprise_adherent]</strong></td>";
                        echo "<td><a href=index.php?id=update_adherent.php&id1=$v[id_adherent]><button class='btn btn-secondary'>Modifier les infos</button></a></td>";
                        if ($_SESSION['role'] !== 'admin') {
                          echo "<td><button class='btn btn-primary cotisation dropdown-toggle' type=button id=dropdownMenuButton1>Cotisations
                        <ul class=dropdown-menu aria-labelledby=dropdownMenuButton1>
                        <li><a class=\"dropdown-item cotisationMensuelleBtn\" data-bs-toggle=modal data-bs-target=#cotisationMensuelModal data-to-send=\"$v[id_adherent],$v[nom_adherent] $v[prenom_adherent]\" data-bs-target=#staticBackdrop2>Cotisations mensuelles</a></li>
                        <li><a class=\"dropdown-item cotisationDecesBtn\" data-bs-toggle=modal data-bs-target=#cotisationDecesModal data-to-send=\"$v[id_adherent],$v[nom_adherent] $v[prenom_adherent]\" data-bs-target=#staticBackdrop2>Cotisations pour les décès</a></li>
                      </ul>
                        </button></td>";
                        }
                        echo "<td><button class='btn btn-danger add_deces' data-bs-toggle=modal data-bs-target=#exampleModal data-to-send=\"$v[id_adherent],$v[nom_adherent] $v[prenom_adherent]\" data-bs-target=#staticBackdrop1>Marquer le décès</button></></td>";
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->

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
  <!-- Plugin js for this page-->
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/data-table.js"></script>
  <!-- End custom js for this page-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(".add_deces").on('click', function() {
      var data = $(this).attr('data-to-send').split(',')
      $("#nom_membre_decede").val(data[1])
      $("#membre_decede").val(data[0])
    })
    $(".cotisationDecesBtn").on('click', function() {
      var data = $(this).attr('data-to-send').split(',')
      $("[name=adherent_name]").val(data[1])
      $("[name=adherent]").val(data[0])
      $.ajax({
        crossDomain: true,
        method: "post",
        url: "function.php",
        data: {
          "adherent": data[0],
          "method": "getDeces"
        },
        dataType: "JSON",
        success: function(data) {
          var options = $('#deces_conc option')
          options = `<option>...</option>`
          $.each(data, function(i, element) {
            //console.log(element);
            options += `<option value=${element.ID_DECES}>Décès de ${element.nom_adherent} ${element.prenom_adherent}  </option>`
          })
          $('#deces_conc option').remove()
          $('#deces_conc').append(options)
        },
        error: function(error) {
          console.log(error);
        }

      })
    })
    $(".cotisationMensuelleBtn").on('click', function() {
      var data = $(this).attr('data-to-send').split(',')
      $("[name=adherent_name]").val(data[1])
      $("[name=adherent]").val(data[0])
      // $.ajax({
      //   crossDomain: true,
      //   method: "post",
      //   url: "function.php",
      //   data: {
      //     "adherent": data[0],
      //     "method": "getDeces"
      //   },
      //   dataType: "JSON",
      //   success: function(data) {
      //     var options = $('#deces_conc option')
      //     $.each(data, function(i, element) {
      //       options += `<option value=${i}>Décès de ${element.nom_adherent} ${element.prenom_adherent}  </option>`
      //     })
      //     $('#deces_conc option').remove
      //     $('#deces_conc').append(options)
      //   },
      //   error: function(error) {
      //     console.log(error);
      //   }

      // })
    })
  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:32 GMT -->

</html>