<?php
if (isset($_POST['connexion'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    include('./demo/connexion.php');
    $query = "SELECT * FROM utilisateur WHERE LOGIN_USER = '$username' AND PWD_USER = '$password'";
    $result = $pdo->query($query);
    if ($result->rowCount() == 1) {
        session_start();
        $_SESSION = $result->fetch();
        if($_SESSION['role'] !== 'admin'){
            $_SESSION['user_commune'] = $result->fetch()['commune'];
        }
        header('location: demo/index.php');
    } else {
        echo "<script>alert('Nom d\'utilisateur ou mot de passe incorrect')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="registration-form">
        <form method="POST">
            <div class="form-icon">
                <span>M2D</span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" placeholder="Nom d'utilisateur" name="username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Mot de passe" name="password" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="cursor: pointer">
                <label class="form-check-label" for="flexCheckDefault" style="cursor: pointer">
                    Afficher le mot de passe
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block create-account" name="connexion">Connexion</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        var checkbox = document.getElementById('flexCheckDefault');
        var password = document.getElementById('password');
        console.log(password.classList);
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        });
    </script>
</body>

</html>