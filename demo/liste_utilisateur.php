<?php
include('connexion.php');
$req = $pdo->query("SELECT * from utilisateur JOIN commune on utilisateur.commune = commune.ID_COMMUNE WHERE role = 'user'");
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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">LISTE DES UTILISATEURS</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom et Prénom</th>
                                                <th>Email</th>
                                                <th>Commune</th>
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
                                                echo "<td><strong>$v[IDENTITE_USER]</strong></td>";
                                                echo "<td><strong>$v[LOGIN_USER]</strong></td>";
                                                echo "<td><strong>$v[NOM_COMMUNE]</strong></td>";
                                                echo "<td><a href=reset_pwd.php?id=$v[ID_USER]><button class='btn btn-primary add_deces'>Réinitialiser le mot de passe</button></a></td>";
                                                echo "<td><a href=del_user.php?id=$v[ID_USER] onclick=\"return confirm('Voulez vous vraiment supprimer cet utlisateur')\"><button class='btn btn-danger add_deces'data-bs-target=#staticBackdrop1>Supprimer</button></a></td>";
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