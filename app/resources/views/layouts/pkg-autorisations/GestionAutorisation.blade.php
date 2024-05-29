<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('Controller*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Autorisations
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    @include('layouts.pkg-autorisations.Action')
    @include('layouts.pkg-autorisations.Controller')

</li>
