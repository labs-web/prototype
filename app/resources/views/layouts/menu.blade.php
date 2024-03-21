<!-- need to remove -->


<li class="nav-item">
    <a href="{{ route('task.index') }}" class="nav-link {{ Request::is('task.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tasks"></i>
        <p>Tâches
        </p>
    </a>
</li>

@php
$current_route = $_SERVER['REQUEST_URI'];
@endphp

<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ (strpos($current_route, 'Autorisation') !== false) ? 'active' : '' }}">
      <i class="nav-icon fas fa-user-lock"></i>
      <p>
        Autorisations
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="" class="nav-link {{ Request::routeIs('') ? 'active' : '' }}">
                  <i class=" far fa-check-circle nav-icon"></i>
          <p>Autorisation</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link {{ Request::routeIs('') ? 'active' : '' }}">
          <i class="far fa-user-circle nav-icon"></i>
          <p>Rôle</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('controllers.index') }}" class="nav-link {{ Request::routeIs('controllers.index') ? 'active' : '' }}">
          <i class="fas fa-gamepad nav-icon"></i>
          <p>Controllers</p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="" class="nav-link {{ Request::routeIs('') ? 'active' : '' }}">
          <i class="fas fa-cogs nav-icon"></i>
          <p>Actions</p>
        </a>
      </li>
    </ul>
  </li>
