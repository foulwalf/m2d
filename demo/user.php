<?php
include('connexion.php');
$communes = $pdo->query("SELECT * FROM commune");

if (isset($_POST['ok'])) {
    $inf = $pdo->prepare("INSERT INTO utilisateur(IDENTITE_USER, LOGIN_USER, PWD_USER, role, commune) VALUES (?,?,?,?,?)");
    $inf->execute(array($_POST['nom'].' '.$_POST['prenom'], $_POST['email'], '12345', $_POST['role'], $_POST['commune']));
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

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle commune</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="function.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Commune</label>
                            <input type="text" class="form-control" id="recipient-name" name="n_commune" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name="ajouter_commune">Ajouter</button>
                    </div>
                </form>
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
                                        <center>IDENTIFICATION DE L'UTILISATEUR
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
                                                    <label class="col-sm-3 col-form-label"><strong>EMAIL</strong></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="email adherent" name="email" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"><strong>RÔLE</strong></label>
                                                    <div class="input-group col-sm-9 w-75">
                                                        <select name="role" id="" class="form-select" required>
                                                            <option value="">...</option>
                                                            <option value="admin">administrateur</option>
                                                            <option value="user">Utilisateur</option>
                                                        </select>
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
                                                            <select name="quartier" id="" class="form-select" required>
                                                                <option value="">...</option>
                                                                <?php while ($commune = $communes->fetch()) { ?>
                                                                    <option value="<?= $commune['ID_COMMUNE'] ?>"><?= $commune['NOM_COMMUNE'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <button class="btn btn-primary col-1 d-flex justify-content-center align-items-center" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+</button>
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
    <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:08 GMT -->

</html>