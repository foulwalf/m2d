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
            case 'getCotisationMensuelle':
                include('connexion.php');
                if ($_SESSION['role'] == 'admin') {
                    $inf = $pdo->prepare("SELECT * FROM adherent JOIN cotisation_mensuelle ON adherent.id_adherent = cotisation_mensuelle.adherent JOIN commune ON adherent.commune = commune.ID_COMMUNE WHERE MOIS_COTISATION = ? AND ANNEE_COTISATION = ?");
                    $inf->execute([$_POST['mois'], $_POST['annee']]);
                } else {
                    $inf = $pdo->prepare("SELECT * FROM adherent JOIN cotisation_mensuelle ON adherent.id_adherent = cotisation_mensuelle.adherent JOIN commune ON adherent.commune = commune.ID_COMMUNE WHERE MOIS_COTISATION = ? AND ANNEE_COTISATION = ? AND adherent.commune = ?");
                    $inf->execute([$_POST['mois'], $_POST['annee'], $_SESSION['user_commune']]);
                }
                $result = $inf->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                break;
            case 'getCotisationDeces':
                include('connexion.php');
                if ($_SESSION['role'] == 'admin') {
                    $inf = $pdo->prepare("SELECT * FROM adherent JOIN cotisation_deces ON adherent.id_adherent = cotisation_deces.adherent JOIN commune ON adherent.commune = commune.ID_COMMUNE WHERE cotisation_deces.deces = ?");
                    $inf->execute([$_POST['deces']]);
                } else {
                    $inf = $pdo->prepare("SELECT * FROM adherent JOIN cotisation_deces ON adherent.id_adherent = cotisation_deces.adherent JOIN commune ON adherent.commune = commune.ID_COMMUNE WHERE cotisation_deces.deces = ? AND commune = ?");
                    $inf->execute([$_POST['deces'], $_SESSION['user_commune']]);
                }
                $result = $inf->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                break;
            case 'addCommune':
                include('connexion.php');
                $inf = $pdo->prepare("INSERT INTO commune(NOM_COMMUNE) VALUES (?)");
                $exec = $inf->execute(
                    [strtoupper($_POST['value'])]
                );
                if ($exec) {
                    echo json_encode("true");
                }
                break;
            case 'getCommunes':
                include('connexion.php');
                $communes = $pdo->query("SELECT * FROM commune");
                $result = $communes->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
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
    } else if (isset($_POST['ajouter_cotisation_mensuelle'])) {
        include('connexion.php');
        $inf = $pdo->prepare("INSERT INTO cotisation_mensuelle(MOIS_COTISATION, MONTANT_COTISATION, ANNEE_COTISATION, adherent) VALUES (?,?,?,?)");
        $exec = $inf->execute(
            [$_POST['mois'], $_POST['montant'], $_POST['annee'], $_POST['adherent']]
        );
        if ($exec) {
            echo "<script>alert('Cotisation enregistrée');location.href =\"index.php?id=liste_adherent.php\"</script>";
        }
    }
}
