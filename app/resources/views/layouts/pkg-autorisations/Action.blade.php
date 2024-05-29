<ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="{{ route('Action.index') }}" class="nav-link {{ Request::is('Action*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-leaf"></i>
            <p>Actions</p>
        </a>
    </li>
</ul>