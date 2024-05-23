
<li class="nav-item has-treeview">
    <a href="#" class="nav-link nav-link {{ Request::is('projets*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Gestion de RH
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="{{ route('apprenant.index') }}" class="nav-link nav-link {{ Request::is('apprenant*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Apprenant</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('formateur.index') }}" class="nav-link nav-link {{ Request::is('formateur*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Formateur</p>
            </a>
        </li>
    </ul>

</li>

