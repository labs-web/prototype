<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('Controller*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Autorisations
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('Action.index') }}" class="nav-link {{ Request::is('Action*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>Actions</p>
            </a>
        </li>
    </ul>   
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('Controller.index') }}" class="nav-link {{ Request::is('Controller*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>Controller</p>
            </a>
        </li>
    </ul>

</li>
