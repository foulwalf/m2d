<?php
$date = new DateTime();
$month = $date->format("m");
$year = $date->format("Y");
if (isset($_POST['vbtn'])) {
    include('connexion.php');
    $inf1 = $pdo->prepare("SELECT NOM_COMMUNE, SUM(MONTANT_COTISATION) as total_mensuel, adherent.sexe_adherent as classe FROM  cotisation_mensuelle join adherent on adherent.id_adherent = cotisation_mensuelle.adherent join commune on adherent.commune = commune.ID_COMMUNE where ANNEE_COTISATION = ? group by ID_COMMUNE, classe order by NOM_COMMUNE ASC, classe ASC");
    $inf2 = $pdo->prepare("SELECT NOM_COMMUNE, SUM(MONTANT_COTISATION) as total_deces, adherent.sexe_adherent as classe FROM  cotisation_deces join adherent on adherent.id_adherent = cotisation_deces.adherent join commune on adherent.commune = commune.ID_COMMUNE where YEAR(DATE_COTISATION) = ? group by ID_COMMUNE, classe order by NOM_COMMUNE ASC");
    $inf1->execute([$_POST['annee']]);
    $inf2->execute([$_POST['annee']]);

    $results1 = $inf1->fetchAll(PDO::FETCH_ASSOC);
    $results2 = $inf2->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump(sizeof($results1));
    // var_dump($results2);
    // echo '</pre>';
    // die;
    $cotisation_menuselle = [];
    $commune = [];
    for ($i = 0; $i < sizeof($results1); $i++) {

        if (!isset($cotisation_menuselle[$results1[$i]['NOM_COMMUNE']])) {
            $cotisation_menuselle[$results1[$i]['NOM_COMMUNE']] = [];
        }
        if ($results1[$i]['classe'] == 'M') {
            $cotisation_menuselle[$results1[$i]['NOM_COMMUNE']]['total_mensuel_homme'] = $results1[$i]['total_mensuel'];
        } else {
            $cotisation_menuselle[$results1[$i]['NOM_COMMUNE']]['total_mensuel_femme'] = $results1[$i]['total_mensuel'];
        }
        if (!isset($cotisation_menuselle[$results1[$i]['NOM_COMMUNE']]['total_mensuel_femme'])) {
            $cotisation_menuselle[$results1[$i]['NOM_COMMUNE']]['total_mensuel_femme'] = 0;
        }
        if (!isset($cotisation_menuselle[$results1[$i]['NOM_COMMUNE']]['total_mensuel_homme'])) {
            $cotisation_menuselle[$results1[$i]['NOM_COMMUNE']]['total_mensuel_homme'] = 0;
        }
        //$temp['total_mensuel_homme'] = $results1[$i]['NOM_COMMUNE'];
    }
    $cotisation_deces = [];
    for ($i = 0; $i < sizeof($results2); $i++) {
        if (!isset($cotisation_deces[$results2[$i]['NOM_COMMUNE']])) {
            $cotisation_deces[$results2[$i]['NOM_COMMUNE']] = [];
        }
        if ($results2[$i]['classe'] == 'M') {
            $cotisation_deces[$results2[$i]['NOM_COMMUNE']]['total_deces_homme'] = $results2[$i]['total_deces'] === null ? 0 : $results2[$i]['total_deces'];
        } else {
            $cotisation_deces[$results2[$i]['NOM_COMMUNE']]['total_deces_femme'] = $results2[$i]['total_deces'] === null ? 0 : $results2[$i]['total_deces'];
        }
    }
    if (isset($_POST['annee'])) {
        $etat = fopen("etat_cotisations_communes_" . $_POST['annee'] . ".xls", "w");
    }
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
                        <h4 class="card-title">&Eacute;tat des cotisations mensuelles</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="">
                                                    <select class="form-select" id="annee" aria-label="Floating label select example" required name="annee">
                                                        <option selected value="">...</option>
                                                        <?php for ($i = 2021; $i <= $year; $i++) { ?>
                                                            <option value="<?= $i ?>" <?php if (isset($_POST['vbtn']) && $_POST['annee'] == $i) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect">Année<span style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-primary" id="vbtn" type="submit" name="vbtn">Valider</button>
                                            </div>
                                            <div class="col-4">
                                                <?php if (isset($_POST['annee'])) { ?><a class="btn btn-primary" href="./<?= "etat_cotisations_communes_" . $_POST['annee'] . ".xls" ?>">Télécharger</a><?php } ?>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <?php if (isset($_POST['vbtn']) && $cotisation_deces !== [] && $cotisation_menuselle !== []) { ?>
                                    <div class="table-responsive">
                                        <div class="table-responsive mt-3" id="table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th colspan="2">Cotisations mensuelles</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Commune</th>
                                                        <th>Hommes</th>
                                                        <th>Femmes</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body">
                                                    <?php $i = 1;
                                                    fputs($etat, utf8_decode("Cotisations mensuelles\n"));
                                                    fputs($etat, utf8_decode("N°\tCommune\tCotisation hommes\tCotisation femmes\tTotal\n"));
                                                    $total_mensuel_homme = 0;
                                                    $total_mensuel_femme = 0;
                                                    $total_ann = 0;
                                                    foreach ($cotisation_menuselle as $key => $value) {
                                                        $total_partiel = (!isset($value['total_mensuel_homme']) ? 0 : $value['total_mensuel_homme']) + (!isset($value['total_mensuel_femme']) ? 0 : $value['total_mensuel_femme']);
                                                        fputs($etat, $i . "\t" . $key . "\t" . (!isset($value['total_mensuel_homme']) ? 0 : $value['total_mensuel_homme']) . "\t" . (!isset($value['total_mensuel_femme']) ? 0 : $value['total_mensuel_femme']) . "\t" . $total_partiel . "\n");

                                                    ?>
                                                        <tr>
                                                            <td><?= $i;
                                                                $i++ ?></td>
                                                            <td><?= $key ?></td>
                                                            <td><?php $total_mensuel_homme += !isset($value['total_mensuel_homme']) ? 0 : $value['total_mensuel_homme'];
                                                                echo !isset($value['total_mensuel_homme']) ? 0 : $value['total_mensuel_homme'] ?></td>
                                                            <td><?php $total_mensuel_femme += !isset($value['total_mensuel_femme']) ? 0 : $value['total_mensuel_femme'];
                                                                echo !isset($value['total_mensuel_femme']) ? 0 : $value['total_mensuel_femme'] ?></td>
                                                            <td><?php $total_ann += $total_partiel;
                                                                echo $total_partiel ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <tfoot>
                                                    <tr>
                                                        <?php
                                                        fputs($etat, "Total" . "\t\t" . $total_mensuel_homme . "\t" . $total_mensuel_femme . "\t" . $total_ann . "\n"); ?>
                                                        <td colspan="2" align="center">Total</td>
                                                        <td><?= $total_mensuel_homme ?></td>
                                                        <td><?= $total_mensuel_femme ?></td>
                                                        <td><?= $total_ann ?></td>
                                                    </tr>
                                                </tfoot>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="table-responsive mt-3">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th colspan="2">Cotisations de décès</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Commune</th>
                                                        <th>Hommes</th>
                                                        <th>Femmes</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body">
                                                    <?php
                                                    fputs($etat, utf8_decode("Cotisations de décès\n"));
                                                    fputs($etat, utf8_decode("N°\tCommune\tCotisation hommes\tCotisation femmes\tTotal\n"));
                                                    $i = 1;
                                                    $total_deces_homme = 0;
                                                    $total_deces_femme = 0;
                                                    $total_ann = 0;
                                                    foreach ($cotisation_deces as $key => $value) {
                                                        $total_partiel = (!isset($value['total_deces_homme']) ? 0 : $value['total_deces_homme']) + (!isset($value['total_deces_femme']) ? 0 : $value['total_deces_femme']);
                                                        fputs($etat, $i . "\t" . $key . "\t" . (!isset($value['total_deces_homme']) ? 0 : $value['total_deces_homme']) . "\t" . (!isset($value['total_deces_femme']) ? 0 : $value['total_deces_femme']) . "\t" . $total_partiel . "\n");
                                                    ?>
                                                        <tr>
                                                            <td><?= $i;
                                                                $i++ ?></td>
                                                            <td><?= $key ?></td>
                                                            <td><?php $total_deces_homme += !isset($value['total_deces_homme']) ? 0 : $value['total_deces_homme'];
                                                                echo !isset($value['total_deces_homme']) ? 0 : $value['total_deces_homme'] ?></td>
                                                            <td><?php $total_deces_femme += !isset($value['total_deces_femme']) ? 0 : $value['total_deces_femme'];
                                                                echo !isset($value['total_deces_femme']) ? 0 : $value['total_deces_femme'] ?></td>
                                                            <td><?php $total_ann += $total_partiel;
                                                                echo $total_partiel ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <tfoot>
                                                    <tr>
                                                        <?php
                                                        fputs($etat, "Total" . "\t\t" . $total_deces_homme . "\t" . $total_deces_femme . "\t" . $total_ann . "\n"); ?>
                                                        <td colspan="2" align="center">Total</td>
                                                        <td><?= $total_deces_homme ?></td>
                                                        <td><?= $total_deces_femme ?></td>
                                                        <td><?= $total_ann ?></td>
                                                    </tr>
                                                </tfoot>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <h3>Aucun état disponible pour cette période</h3>
                                    </div>
                                <?php }  ?>
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
        /* var mois = document.getElementById('mois')
        var annee = document.getElementById('annee')
        var vbtn = document.getElementById('body')
        var data;
        var set = {
            mois: null,
            annee: null
        }
        annee.addEventListener('change', function(e) {
            set.annee = annee.value
            ennabledButton()
        })
        vbtn.addEventListener('click', function() {
            const data = {
                'method': 'getEtatCotisationMensuelle',
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
                    console.log(response)
                })
                .then(result => {
                    console.log(result);
                    //fillTable(result)
                })
                .catch(error => {
                    console.error('Error', error)
                })
        })

        function ennabledButton() {
            if ((set.mois !== null && set.annee !== null) && (set.mois !== "" && set.annee !== "")) {
                document.getElementById("vbtn").classList.remove('disabled')
            } else {
                document.getElementById("vbtn").classList.add('disabled')
            }
        }

        function fillTable(param) {
            var content = "";
            for (obj in param) {
                content += `
                
                                <details>
                                    <summary>
                                        ${param.mois}
                                    </summary>
                                </details>
                                <div class="table-responsive mt-3">
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
                                            ${content}
                                        </tbody>
                                    </table>
                                </div>`
            }

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }
            tbody.innerHTML = content
        } */
    </script>
</body>
<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:32 GMT -->

</html>