@extends('layouts.app')
@section('content')
    <div class="content-header">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="nav-icon fas fa-table"></i>Modifier le Projet</h3>
                        </div>
                        @if (@session('success'))
                            <div class="ml-4 mt-2">
                                <span class="font-medium text-success">{{ session('success') }}</span>
                            </div>
                        @endif
                        <!-- Obtenir le formulaire -->
                        @include('GestionProjets.projets.form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
