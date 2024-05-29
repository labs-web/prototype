<ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="{{ route('Controller.index') }}" class="nav-link {{ Request::is('Controller*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-leaf"></i>
            <p>Controller</p>
        </a>
    </li>
</ul>