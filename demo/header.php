
<div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
           
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <h4><strong> M2D</strong></h4>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                  <img src="../images/icons8-user-64.png" alt="profile"/>
                  <span><?=$_SESSION['IDENTITE_USER']?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" style="top: 50px!important;">
                  <a class="dropdown-item" href="index.php?id=param.php">
                    <i class="ti-settings text-primary"></i>
                    Parametres
                  </a>
                  <a class="dropdown-item" href="logout.php">
                    <i class="ti-power-off text-primary"></i>
                    Deconexion
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="ti-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="index.php?id=tableau.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Tableau de bords</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Gestion des Adherents</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="index.php?id=adherent.php">Nouvel Adherent</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php?id=liste_adherent.php">Listes</a></li>                   
                </ul>
              </div>
            </li>
             <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Gestion des Cotisations</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="index.php?id=liste_adherent_cotisation.php">Mensuel</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php?id=liste_cotisation_deces.php">De Décès</a></li>
                   
                </ul>
              </div>
            </li>
              <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">ETAT</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="index.php?id=etat_cotisations_mensuelles.php">Mensuel</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php?id=etat_cotisations_décès.php">De Décès</a></li>
                </ul>
              </div>
            </li>
            <?php if($_SESSION['role'] == 'admin' ) {?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Utilisateurs</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="index.php?id=user.php">Nouvel utilisateur</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php?id=liste_utilisateur.php">Listes</a></li>                   
                </ul>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </div>