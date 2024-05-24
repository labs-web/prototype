<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Livrables
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('nature-livrables.index') }}" class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>Nature des Livrables</p>
            </a>
        </li>
    </ul>    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('nature-livrables.index') }}" class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>les Livrables</p>
            </a>
        </li>
    </ul>

</li>
