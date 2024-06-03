<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            {{ __('app.home') }}
        </p>
    </a>
</li>

@include('layouts.pkg_projets.GestionProjetsMenu')
@include('layouts.pkg_competences.CompetencesMenu')
@include('layouts.pkg_rh.pkg_rhMenu')
@include('layouts.pkg_realisation_projet.RealisationMenu')
@include('pkg_autorisations.AutorisationsMenu')
@include('layouts.pkg_notifications.notificationsMenu')

