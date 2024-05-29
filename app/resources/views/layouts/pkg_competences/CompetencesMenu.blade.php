<li class="nav-item has-treeview {{ \Illuminate\Support\Str::contains(request()->url(), 'competences') ? 'menu-is-opening menu-open' : '' }}">
    <a class="nav-link {{ Request::is('competences*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Gestion des Competences
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="{{ \Illuminate\Support\Str::contains(request()->url(), 'competences') ? 'display:block;' : '' }}">
        
        <li class="nav-item">
            <a href="{{ route('technologies.index') }}"
                class="nav-link {{ Route::is('technologies.index*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Technologies</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('niveauxCompetences.index') }}"
                class="nav-link {{ Route::is('niveauxCompetences.index*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Niveaux Competences</p>
            </a>
        </li>
       
        <li class="nav-item">
            <a href="{{ route('competence.index') }}"
                class="nav-link {{ Route::is('competence.index*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Gestion Competences</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('CategorieTechnologie.index') }}"
                class="nav-link {{ Route::is('CategorieTechnologie.index*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Categorie Technologie</p>
            </a>
        </li>
    </ul>
</li>
