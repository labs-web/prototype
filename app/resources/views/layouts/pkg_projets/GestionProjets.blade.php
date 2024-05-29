<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('gestionprojet*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Projets
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    @include('layouts.pkg_realisation_projet.Tache')
    @include('layouts.pkg_realisation_projet.Projet')
    @include('layouts.pkg_realisation_projet.Equipe')
</li>
