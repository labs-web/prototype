<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('Competences*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Competences
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    @include('layouts.pkg_competences.Technologie')
    @include('layouts.pkg_competences.Categorie')
    @include('layouts.pkg_competences.Competence')
    @include('layouts.pkg_competences.Niveau')

</li>

