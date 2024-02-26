<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
  <!-- Logo de la marque -->
  <a href="../../gestion_des_projet/project/index.php" class="brand-link">
    <img src="../../../maquettage-prototype/adminlte/dist/img/gestion-de-projet.png" class="brand-image img-circle elevation-3" alt="Image de groupe">
    <span class="brand-text font-weight-light text-center">Gestion de Projets</span>
  </a>

  <!-- Barre latérale -->
  <div class="sidebar">
    <!-- Menu latéral -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
        if ($_SESSION['name'] == "utilisateur" || $_SESSION['name'] == "chef de projet") {
        ?>
          <li class="nav-item">
            <a href="../../gestion_des_projet/project/index.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Projets
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../gestion_des_projet/tache/index.php" class="nav-link ">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Tâches
              </p>
            </a>
          </li>
          <!-- MEMBRE -->
        <?php
        } if ($_SESSION['name'] == "chef de projet") {
        ?>
          <li class="nav-item">
            <a href="../../gestion_des_projet/membre/index.php" class="nav-link ">
              <i class="fa-solid fa-users pl-1 pr-1"></i>
              <p>
                Membre
              </p>
            </a>
            <!-- Authorization -->
          <?php
        } elseif ($_SESSION['name'] == "admin") {

          ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Droit d'accès
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../droit_d'accés/Autorisations/index.php" class="nav-link active">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Autorisation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../droit_d'accés/Roles/index.php" class="nav-link">
                  <i class="far fa-user-circle nav-icon"></i>
                  <p>Rôle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../droit_d'accés/Controllers/index.php" class="nav-link ">
                  <i class="fas fa-gamepad nav-icon"></i>
                  <p>Controllers</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="../../droit_d'accés/Actions/index.php" class="nav-link ">
                  <i class="fas fa-cogs nav-icon"></i>
                  <p>Actions</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        }
        ?>

        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>