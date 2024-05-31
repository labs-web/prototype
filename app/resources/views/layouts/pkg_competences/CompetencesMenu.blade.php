<li class="nav-item has-treeview">
    <a class="nav-link nav-link {{ Request::is('competences*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Gestion des Competences
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('index-CategorieTechnologieController')
            <li class="nav-item ">
                <a href="{{ route('CategorieTechnologie.index') }}"
                    class="nav-link nav-link {{ Request::is('CategorieTechnologie*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Categorie technologie</p>
                </a>
            </li>
        @endcan
        <li class="nav-item ">
            <a href="{{ route('competence.index') }}"
                class="nav-link nav-link {{ Request::is('competence*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Gestion Competences</p>
                <a href="{{ route('technologie.index') }}"
                    class="nav-link nav-link {{ Request::is('technologie*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Technologies</p>
                </a>
        </li>
    </ul>
</li>
