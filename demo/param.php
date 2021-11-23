<?php
if (isset($_POST['save'])) {
    include('connexion.php');
    $req = $pdo->prepare('UPDATE utilisateur SET IDENTITE_USER=?,LOGIN_USER=?,PWD_USER=? WHERE ID_USER = ?');
    $req->execute(array($_POST['identite'], $_POST['login'], $_POST['password'], $_SESSION['ID_USER']));
    if ($req) {
        $_SESSION['IDENTITE_USER'] = $_POST['identite'];
        $_SESSION['LOGIN_USER'] = $_POST['login'];
        $_SESSION['PWD_USER'] = $_POST['password'];
        echo '<script>alert("Modification effectuée avec succès")</script>';
    } else {
        echo '<script>alert("Erreur lors de la modification")</script>';
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card">
                    <div class="container bg-white col-8 p-3 rounded-1">
                        <form action="" id="form" method="POST">
                            <div class="input-group my-4">
                                <span class="input-group-text sl px-2" id="basic-addon1">Identité</span>
                                <input type="text" class="form-control" value="<?= $_SESSION['IDENTITE_USER'] ?>" readonly name="identite" required>
                                <span class="input-group-text" id="basic-addon1"><i class="icon fas fa-lock"></i></span>
                            </div>

                            <div class="input-group my-4">
                                <span class="input-group-text sl px-2" id="basic-addon1">Nom d'utilisateur</span>
                                <input type="text" class="form-control" value="<?= $_SESSION['LOGIN_USER'] ?>" readonly name="login" required>
                                <span class="input-group-text" id="basic-addon1"><i class="icon fas fa-lock"></i></span>
                            </div>

                            <div class="input-group mt-4 mb-2">
                                <span class="input-group-text sl px-2" id="basic-addon1">Mot de passe</span>
                                <input type="password" class="form-control" value="<?= $_SESSION['PWD_USER'] ?>" readonly id="pwd" name="password" required>
                                <span class="input-group-text" id="basic-addon1"><i class="icon fas fa-lock"></i></span>
                            </div>
                            <div class="form-check mt-1 mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" style="cursor: pointer;">
                                <label class="form-check-label" for="defaultCheck1" style="cursor: pointer;">
                                    Afficher le mot de passe
                                </label>
                            </div>
                            <button type="button" class="btn btn-primary pull-right" id="btn-mod" data-toggle="button" aria-pressed="false" autocomplete="off">
                                Cliquez ici pour modifier ces informations
                            </button>
                            <button type="reset" class="btn btn-danger pull-right hidden" id="btn-reset" data-toggle="button" aria-pressed="false" autocomplete="off">
                                Annuler
                            </button>
                            <button type="submit" class="btn btn-primary pull-right hidden" id="btn-save" data-toggle="button" aria-pressed="false" autocomplete="off" name="save">
                                Enregistrer les modifications
                            </button>
                        </form>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#btn-mod').on('click', function() {
            $(this).addClass('hidden')
            $('#form input').removeAttr('readonly')
            $('#btn-reset').removeClass('hidden')
            $('#btn-save').removeClass('hidden')
            $('.icon').removeClass('fa-lock').addClass('fa-lock-open')
        })
        $('#btn-reset').on('click', function() {
            $(this).addClass('hidden')
            $('#form input').prop('readonly', true)
            $('#btn-mod').removeClass('hidden')
            $('#btn-save').addClass('hidden')
            $('.icon').removeClass('fa-lock-open').addClass('fa-lock')
        })
        $('#defaultCheck1').on('click', function() {
            if ($(this).prop('checked')) {
                $('#pwd').attr('type', 'text')
            } else {
                $('#pwd').attr('type', 'password')
            }
        })
    </script>
</body>
<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:11:32 GMT -->

</html>