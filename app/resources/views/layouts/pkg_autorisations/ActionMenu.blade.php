
<li class="nav-item has-treeview">
    <a class="nav-link {{ Request::is('livrables*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-street-view"></i>
        <p>
            Autorisations
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link {{ Request::is('livrables*') ? 'active' : '' }}">
                <!-- <i class="nav-icon fas fa-leaf"></i> -->
                <p>Controllers</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('actions.index') }}" class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
                <!-- <i class="nav-icon fas fa-leaf"></i> -->
                <p>Actions</p>
            </a>
        </li>
    </ul>
</li>