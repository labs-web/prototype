!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
@extends('layouts.app')
@section('title', ('app.add') . ' ' . ('pkg_autoristions/actions.singular'))
@section('content')

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <div class="content-wrapper" style="min-height: 1302.4px;">

            <div class="content-header">
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"> <i class="fas fa-cogs nav-icon"></i> Ajouter un Action</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Obtenir le formulaire -->
                                    @include('pkg_autorisations/actions.form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>            
        </div>
        
        <!-- Inclure le pied de page -->
        <!-- Inclure le script -->
    </div>
@endsection