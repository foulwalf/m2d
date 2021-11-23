<?php
$date = new DateTime();
$month = $date->format("m");
$year = $date->format("Y");
if (isset($_POST['vbtn'])) {
    include('connexion.php');
    if ($_SESSION['role'] == 'admin') {
        $inf = $pdo->prepare("SELECT *, SUM(MONTANT_COTISATION) as total, adherent.sexe_adherent as classe FROM  cotisation_mensuelle join adherent on adherent.id_adherent = cotisation_mensuelle.adherent where ANNEE_COTISATION = ? group by MOIS_COTISATION, classe order by MOIS_COTISATION ASC");
        $inf->execute([$_POST['annee']]);
    } else {
        $inf = $pdo->prepare("SELECT *, SUM(MONTANT_COTISATION) as total, adherent.sexe_adherent as classe FROM cotisation_mensuelle JOIN adherent ON adherent.id_adherent = cotisation_mensuelle.adherent JOIN commune ON adherent.commune = commune.ID_COMMUNE WHERE ANNEE_COTISATION = ? AND adherent.commune = ? GROUP BY MOIS_COTISATION order by MOIS_COTISATION ASC");
        $inf->execute([$_POST['annee'], $_SESSION['user_commune']]);
    }
    $results = $inf->fetchAll(PDO::FETCH_ASSOC);
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
    $cotisation = [];
    for ($i = 0; $i < sizeof($results); $i++) {
        $temp_array['mois'] = $month_array[$results[$i]['MOIS_COTISATION']];
        $temp_array['annee'] = $results[$i]['ANNEE_COTISATION'];
        if ($results[$i]['classe'] == 'F') {
            $temp_array['femme'] = $results[$i]['total'];
        } else {
            $temp_array['homme'] = $results[$i]['total'];
        }
        if (!isset($temp_array['femme'])) {
            $temp_array['femme'] = 0;
        }
        if (!isset($temp_array['homme'])) {
            $temp_array['homme'] = 0;
        }
        array_push($cotisation, $temp_array);
    }
    // echo "<pre>";
    // var_dump($cotisation);
    // echo "</pre>";

    // die;
    /* if ($results !== []) {
        $total_ann = $results[0]['total'];
        $real_results = [];
        for ($i = 0; $i < sizeof($month_array); $i++) {
            $total = 0;
            $temp_arr = [];
            for ($j = 0; $j < sizeof($results); $j++) {
                if ($results[$j]['MOIS_COTISATION'] == $i) {
                    array_push($temp_arr, $results[$j]);
                    $total += $results[$j]['MONTANT_COTISATION'];
                    array_splice($results, $i, 1);
                }
            }
            array_push($real_results, [
                'mois' => $month_array[$i],
                'content' => $temp_arr,
                'total' => $total
            ]);
        }
    } */
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
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="floatingSelect">Année<span style="color:red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-primary" id="vbtn" type="submit" name="vbtn">Valider</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <?php if (isset($_POST['vbtn']) && $cotisation !== []) { ?>
                                    <div class="table-responsive">
                                        <div class="table-responsive mt-3">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Mois</th>
                                                        <th>Année</th>
                                                        <th>Homme</th>
                                                        <th>Femme</th>
                                                        <th>Total par mois</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body">
                                                    <?php $i = 1;
                                                    $total_homme = 0;
                                                    $total_femme = 0;
                                                    $total_ann = 0;
                                                    foreach ($cotisation as $cota) { ?>
                                                        <tr>
                                                            <td><?= $i;
                                                                $i++ ?></td>
                                                            <td><?= $cota['mois'] ?></td>
                                                            <td><?= $cota['annee'] ?></td>
                                                            <td><?php $total_homme += $cota['homme'];
                                                                echo $cota['homme'] ?></td>
                                                            <td><?php $total_femme += $cota['femme'];
                                                                echo $cota['femme'] ?></td>
                                                            <td><?php $total_ann += $cota['homme'] + $cota['femme'];
                                                                echo $cota['homme'] + $cota['femme']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" align="center">Total</td>
                                                        <td><?= $total_homme ?></td>
                                                        <td><?= $total_femme ?></td>
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