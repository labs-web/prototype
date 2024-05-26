@extends('layouts.app')
@section('title', __('app.add') . ' ' . __('pkg_autorisations/actions.singular'))
@section('content')

<body class="sidebar-mini" style="height: auto;">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Les actions</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route('actions.sync') }}" class="btn btn-secondary mx-5">
                            <i class="fas fa-download"></i> Télécharger les Actions
                        </a>
                        <a href="{{ route('actions.create') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i> Ajouter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Filtre et recherche -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <!-- Filtre par contrôleur -->
                            <form method="GET" action="{{ route('actions.index') }}" class="d-flex">
                                <div class="form-group mb-0 mr-2">
                                    <label for="controllerSelect">{{ __('pkg_autorisations/actions.all controllers') }}</label>
                                    <select class="form-control" id="controllerSelect" name="controller">
                                        <option value="">Tous les Contrôleurs</option>
                                        @foreach ($controllers as $controller)
                                            <option value="{{ $controller->nom }}">{{ $controller->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-0 align-self-end">
                                    <button type="submit" class="btn btn-primary">Filtrer</button>
                                </div>
                            </form>

                            <!-- Recherche par nom d'action -->
                            <form method="GET" action="{{ route('actions.index') }}" class="d-flex">
                                <div class="form-group mb-0 mr-2">
                                    <label for="searchAction">{{ __('pkg_autorisations/actions.search') }}</label>
                                    <input type="text" class="form-control" id="searchAction" name="searchAction" placeholder="Rechercher une action">
                                </div>
                                <div class="form-group mb-0 align-self-end">
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Affichage des actions -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Actions</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nom de l'action</th>
                                        <th>Controller</th>
                                        <th class="action-column" style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($actions as $action)
                                    <tr>
                                        <td>{{ $action->nom }}</td>
                                        <td>{{ $action->controller->nom }}</td>
                                        <td>
                                            <a href="{{ route('actions.edit', $action->id) }}" class="btn btn-sm btn-default">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('actions.destroy', $action->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <ul class="pagination justify-content-end">
                                                {{ $actions->links() }}
                                            </ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
