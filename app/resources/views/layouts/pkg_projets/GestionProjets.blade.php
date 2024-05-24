<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('gestionprojet*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Projets
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('nature-livrables.index') }}"
                class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>les Taches</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('nature-livrables.index') }}"
                class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>les Projets</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('nature-livrables.index') }}"
                class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>les Equipes</p>
            </a>
        </li>
    </ul>
</li>
