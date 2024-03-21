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
    <a href="{{ route('controllers.index') }}" class="nav-link {{ Request::is('controllers.index') ? 'active' : '' }}">
        <i class="fas fa-gamepad nav-icon"></i>
        <p>Controllers</p>
    </a>
</li>
