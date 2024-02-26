<?php 
    session_start();
?>
<!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Liens de navigation de gauche -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="../../adminlte/dist/img/directeur.png" class="user-image img-circle elevation-2" alt="Image d'utilisateur">
                <span class="d-none d-md-inline"><?php echo  $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- Image d'utilisateur -->
                <li class="user-header bg-info">
                    <img src="../../adminlte/dist/img/directeur.png" class="img-circle elevation-2" alt="Image d'utilisateur">
                    <p>
                    <?php echo  $_SESSION['name']; ?>
                        <small>Membre depuis le 28/12/2023</small>
                    </p>
                </li>
                <!-- Pied de page du menu -->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                    <a href="../../auth/connecter/index.php" class="btn btn-default btn-flat float-right">
                        Se déconnecter
                    </a>
                </li>
            </ul>

        </li>
    </ul>
</nav>