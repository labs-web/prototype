<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des Livrables
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>


    @include('layouts.pkg_realisation_projet.NatureLivrableMenu')


</li>
