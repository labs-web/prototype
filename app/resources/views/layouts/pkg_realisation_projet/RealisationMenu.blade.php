<li class="nav-item has-treeview">
    <a class="nav-link {{ Request::is('livrables*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-project-diagram"></i>
        <p>
            Realisation Projet
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('livrables.index') }}" class="nav-link {{ Request::is('livrables*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>Livrables</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('nature-livrables.index') }}" class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>Naturele Livrables</p>
            </a>
        </li>
    </ul>
</li>
