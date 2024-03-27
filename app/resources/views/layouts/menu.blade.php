<!-- need to remove -->
@php
    $current_route = $_SERVER['REQUEST_URI'];

@endphp
{{-- @dd($current_route) --}}
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Accueil
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projets.index') }}" class="nav-link {{ Request::is('projets') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Projets
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('task.index') }}" class="nav-link {{ Request::is('projets/tâches') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Tâches
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('utilisateurs.index') }}"
        class="nav-link {{ strpos($current_route, 'utilisateurs') !== false ? 'active' : '' }}">
        <i class="fa-solid fa-users pl-1 pr-1"></i>
        <p>
            Utilisateurs
        </p>
    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ strpos($current_route, 'Autorisations') !== false ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-lock"></i>
        <p>
            Autorisations
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href=""
                class="nav-link {{ strpos($current_route, 'Autorisation.index') !== false ? 'active' : '' }}">
                <i class=" far fa-check-circle nav-icon"></i>
                <p>Autorisation</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('roles.index') }}"
                class="nav-link {{ strpos($current_route, 'roles') !== false ? 'active' : '' }}">
                <i class="far fa-user-circle nav-icon"></i>
                <p>Rôle</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('controllers.index') }}"
                class="nav-link {{ strpos($current_route, 'controllers') !== false ? 'active' : '' }}">
                <i class="fas fa-gamepad nav-icon"></i>
                <p>Controllers</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('actions.index') }}"
                class="nav-link {{ strpos($current_route, 'actions') !== false ? 'active' : '' }}">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Actions</p>
            </a>
        </li>
    </ul>
</li>
