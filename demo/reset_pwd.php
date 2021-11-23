<?php 
include('connexion.php');
$req = $pdo->prepare('UPDATE utilisateur SET PWD_USER= \'12345\' WHERE ID_USER=?');
$execution = $req->execute([$_GET['id']]);
if ($execution) {
    echo '<script>alert("Mot de passe réinitialisé");location.href="index.php?id=liste_utilisateur.php"</script>';
}