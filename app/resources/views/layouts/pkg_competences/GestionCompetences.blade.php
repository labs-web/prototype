<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('Competences*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Competences
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="#" class="nav-link {{ Request::is('Technologies*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>
                    Gestion des Technologies
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
        </li>
    </ul>
        <ul class="nav nav-treeview">
        <li class="nav-item ">
                <a href="#" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-leaf"></i>
            <p>
                Gestion des Categories
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
    
    </li>
    </ul>    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="#" class="nav-link {{ Request::is('Competences*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-leaf"></i>
                <p>
                    Competences
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
    
    
        </li>
    </ul>
    
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="#" class="nav-link {{ Request::is('niveux*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-leaf"></i>
            <p>
                Gestion des niveux
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
    
    </li>
    </ul>
</li>

