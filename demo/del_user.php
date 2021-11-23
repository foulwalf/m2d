<?php 
include('connexion.php');
$req = $pdo->prepare('DELETE FROM utilisateur WHERE ID_USER = ?');
$execution = $req->execute([$_GET['id']]);
if ($execution) {
    echo '<script>alert("Utilisateur supprimé");location.href="index.php?id=liste_utilisateur.php"</script>';
}