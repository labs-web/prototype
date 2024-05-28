<li class="nav-item has-treeview">
    <a class="nav-link {{ Request::is('Autorisatoins*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-street-view"></i>
        <p>
            Autorisatoins
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link {{ Request::is('Controllers*') ? 'active' : '' }}">
                <!-- <i class="nav-icon fas fa-leaf"></i> -->
                <p>Controllers</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link {{ Request::is('Actions*') ? 'active' : '' }}">
                <!-- <i class="nav-icon fas fa-leaf"></i> -->
                <p>Actions</p>
            </a>
        </li>
    </ul>
</li>