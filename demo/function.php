<?php
if (isset($_POST)) {
    if (isset($_POST['ajouter_deces'])) {
        include('connexion.php');
        $inf = $pdo->query("insert into deces(adherent,DATE_DECES) values('$_POST[membre_decede]','$_POST[date_deces]')");
        if ($inf) {
            echo "<script>alert('Décès marqué');location.href =\"index.php?id=liste_adherent.php\"</script>";
        }
    } else if (isset($_POST['method'])) {
        switch ($_POST['method']) {
            case 'getDeces':
                include('connexion.php');
                $inf = $pdo->query("SELECT * FROM deces JOIN adherent ON id_adherent = deces.adherent WHERE ID_DECES NOT IN (SELECT DISTINCT(deces) FROM cotisation_deces WHERE adherent= '$_POST[adherent]')");
                $result = $inf->fetchAll();
                echo json_encode($result);
                break;
            case '':
                
                break;
            default:
                # code...
                break;
        }
    } else if (isset($_POST['ajouter_cotisation_deces'])) {
        include('connexion.php');
        $inf = $pdo->prepare("INSERT INTO cotisation_deces(DATE_COTISATION, MONTANT_COTISATION, deces, adherent) VALUES (?,?,?,?)");
        $exec = $inf->execute(
            [date('Y-m-d'), $_POST['montant'], $_POST['deces_conc'], $_POST['adherent']]
        );
        if ($exec) {
            echo "<script>alert('Cotisation enregistrée');location.href =\"index.php?id=liste_adherent.php\"</script>";
        }
    }
}
