<?php
$date = new DateTime();
$month = $date->format("m");
$year = $date->format("Y");
$month_array = [
    1 => "Janvier",
    2 => "Février",
    3 => "Mars",
    4 => "Avril",
    5 => "Mai",
    6 => "Juin",
    7 => "Juillet",
    8 => "Août",
    9 => "Septembre",
    10 => "Octobre",
    11 => "Novembre",
    12 => "Décembre"
];
$month_array_keys = array_keys($month_array);
include('connexion.php');
$req1 = $pdo->query('SELECT * from commune');
$communes = $req1->fetchAll();
if (isset($_POST['vbtn'])) {
    if ($_SESSION['role'] == 'admin') {
        $inf = $pdo->prepare("SELECT * FROM adherent JOIN cotisation_mensuelle ON adherent.id_adherent = cotisation_mensuelle.adherent JOIN commune ON adherent.commune = commune.ID_COMMUNE WHERE MOIS_COTISATION = ? AND ANNEE_COTISATION = ?");
        $inf->execute([$_POST['mois'], $_POST['annee']]);
    } else {
        $inf = $pdo->prepare("SELECT * FROM adherent JOIN cotisation_mensuelle ON adherent.id_adherent = cotisation_mensuelle.adherent JOIN commune ON adherent.commune = commune.ID_COMMUNE WHERE MOIS_COTISATION = ? AND ANNEE_COTISATION = ? AND adherent.commune = ?");
        $inf->execute([$_POST['mois'], $_POST['annee'], $_SESSION['commune']]);
    }
    $result = $inf->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:31 GMT -->

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cotisations mensuelles</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <form action="" method="POST">
                                        <div class="row">
                                        <div class="col-4">
                                                <div>
                                                    <select class="form-select" id="commune" aria-label="Floating label select example" name="commune" required>
                                                        <option value="">...</option>
                                                        <?php foreach ($communes as $commune) { ?>
                                                            <option value="<?= $commune['ID_COMMUNE'] ?>" <?php if (isset($_POST['ok']) && $_POST['commune'] == $key) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $commune['NOM_COMMUNE'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect">Commune<span style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <select class="form-select" id="mois" aria-label="Floating label select example" name="mois" required>
                                                        <option value="">...</option>
                                                        <?php foreach ($month_array_keys as $key) { ?>
                                                            <option value="<?= $key ?>" <?php if (isset($_POST['ok']) && $_POST['mois'] == $key) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $month_array[$key] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect">Mois<span style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="">
                                                    <select class="form-select" id="annee" aria-label="Floating label select example" name="annee" required>
                                                        <option value="">...</option>
                                                        <?php for ($i = 2021; $i <= $year; $i++) { ?>
                                                            <option value="<?= $i ?>" <?php if (isset($_POST['ok']) && $_POST['annee'] == $i) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect">Année<span style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-primary disabled" id="vbtn" name="vbtn">Valider</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive mt-3">
                                    <?php if (isset($_POST['vbtn'])) { ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Nom et Prénom</th>
                                                    <th>Sexe</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Commune</th>
                                                    <th>Montant</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_body">
                                                <?php if (isset($result) && $result != array()) {
                                                    $i = 1;
                                                    foreach ($result as $cotisation) { ?>
                                                        <tr>
                                                            <td><?php echo $i;
                                                                $i++ ?></td>
                                                            <td><?= $cotisation['nom_adherent'] . " " . $cotisation['prenom_adherent'] ?></td>
                                                            <td><?= $cotisation['contact_adherent'] ?></td>
                                                            <td><?= $cotisation['sexe_adherent'] ?></td>
                                                            <td><?= $cotisation['email_adherent'] ?></td>
                                                            <td><?= $cotisation['NOM_COMMUNE'] ?></td>
                                                            <td><?= $cotisation['MONTANT_COTISATION'] ?></td>
                                                        </tr>
                                                    <?php }
                                                } else if (!isset($result) || $result == array()) { ?>
                                                    <tr colspan="7">
                                                        Aucune informations disponible pour cette période
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
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
    <script>
        var mois = document.getElementById('mois')
        var annee = document.getElementById('annee')
        var commune = document.getElementById('commune')
        var vbtn = document.getElementById('vbtn')
        var tbody = document.getElementById('table_body')
        var tbody_content = document.getElementById('tbody_content')
        var data;
        var set = {
            mois: null,
            annee: null
        }
        commune.addEventListener('change', function(e) {
            set.commune = commune.value
            ennabledButton()
        })
        mois.addEventListener('change', function(e) {
            set.mois = mois.value
            ennabledButton()
        })
        annee.addEventListener('change', function(e) {
            set.annee = annee.value
            ennabledButton()
        })
        vbtn.addEventListener('click', function() {
            const data = {
                'method': 'getCotisationMensuelle',
                'mois': set.mois,
                'annee': set.annee,
            }
            fetch('function.php', {
                    method: 'POST',
                    mode: 'cors',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    return response.json()
                })
                .then(result => {
                    fillTable(result)
                })
                .catch(error => {
                    console.error(error)
                })
        })

        function ennabledButton() {
            if ((set.mois !== null && set.annee !== null && set.commune !== null) && (set.mois !== "" && set.annee !== "" && set.commune !== "")) {
                document.getElementById("vbtn").classList.remove('disabled')
            } else {
                document.getElementById("vbtn").classList.add('disabled')
            }
        }

        function fillTable(param) {
            var content = "";
            var i = 1;
            if (param == null) {
                content += `
          <tr>
            <td colspan="6" align="center"><b>AUNCUNE INFORMATION TROUV&Eacute;E POUR CETTE P&Eacute;RIODE</b></td>
          </tr>`;
            } else {
                for (obj in param) {
                    content += `
          <tr>
          <td>${i}</td>
          <td>${obj.nom_adherent} ${obj.prenom_adherent}</td>
          <td>${obj.sexe_adherent}</td>
          <td>${obj.contact_adherent}</td>
          <td>${obj.email_adherent}</td>
          <td>${obj.commune}</td>
          <td>${obj.MONTANT_COTISATION}</td>
          </tr>`;
                    i++;
                }
            }

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }
            tbody.innerHTML = content
        }
    </script>
</body>
<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:32 GMT -->

</html>