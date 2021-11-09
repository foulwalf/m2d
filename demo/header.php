 <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
           
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <h4><strong> M2D</strong></h4>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="icon-bell mx-0"></i>
                  <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="ti-info-alt mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Application Error</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Just now
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="ti-settings mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Settings</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Private message
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="ti-user mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">New user registration</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        2 days ago
                      </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                  <img src="../../images/faces/face28.jpg" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="ti-settings text-primary"></i>
                    Parametres
                  </a>
                  <a class="dropdown-item">
                    <i class="ti-power-off text-primary"></i>
                    Deconexion
                  </a>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                  <i class="icon-ellipsis"></i>
                </a>
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
                  <li class="nav-item"><a class="nav-link" href="index.php?id=deces.php">Déces</a></li>
                   
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
                  <li class="nav-item"><a class="nav-link" href="index.php?id=liste_adherent_deces.php">De Décès</a></li>
                   
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
                  <li class="nav-item"><a class="nav-link" href="../forms/basic_elements.html">Mensuel</a></li>
                  <li class="nav-item"><a class="nav-link" href="../forms/advanced_elements.html">De Décès</a></li>
                   
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>