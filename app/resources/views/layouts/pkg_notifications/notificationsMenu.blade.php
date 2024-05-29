<li class="nav-item has-treeview">
    <a class="nav-link nav-link {{ Request::is('notification*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-bell"></i>
        <p>
            Gestion des notification
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{-- @can('index-notificationController') --}}
            <li class="nav-item ">
                <a href="{{ route('notification.index') }}"
                class="nav-link nav-link {{ Request::is('notifications*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Notifications</p>
                </a>
            </li>
        {{-- @endcan --}}
    </ul>
</li>
