<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('task.index') }}" class="nav-link {{ Request::is('task.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tasks"></i>
        <p>Tâches
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('utilisateurs.index') }}" class="nav-link {{ Request::is('utilisateurs.index') ? 'active' : '' }}">
        <i class="fa-solid fa-users pl-1 pr-1"></i>
        <p>{{ __('utilisateurs/message.Users') }}
        </p>
    </a>
</li>