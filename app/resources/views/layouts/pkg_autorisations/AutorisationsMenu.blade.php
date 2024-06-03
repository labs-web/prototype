<li class="nav-item has-treeview">
    <a class="nav-link nav-link {{ Request::is('autorisation*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Gestion des Autorisations
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="{{ route('controllers.index') }}"
                class="nav-link nav-link {{ Request::is('controllers*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Controllers</p>
            </a>
        </li>
    </ul>
</li>
