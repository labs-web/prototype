@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des projets</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="{{ route('projets.create') }}" class="btn btn-info">
                                <i class="fas fa-plus"></i> Nouveau projet
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class=" p-0">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Recherche">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Date de Début</th>
                                            <th>Date de Fin</th>
                                            <th class="text-center">Tâches</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projectData as $project)
                                            <tr>
                                                <td>{{ $project->nom }}</td>
                                                <td>{{ $project->date_debut }}</td>
                                                <td>{{ $project->date_de_fin }}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-sm btn-secondary mx-2">
                                                        <i class="nav-icon fas fa-tasks"></i> Les Tâches
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('projets.show', $project) }}" class="btn btn-default btn-sm">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('projets.edit', $project) }}" class="btn btn-sm btn-default">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ route('projets.destroy', $project) }}" class="btn btn-sm btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-2">
                                <div class="d-flex align-items-center mb-2">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fa-solid fa-file-arrow-down"></i>
                                        IMPORTER</button>
                                    <button type="button" class="btn btn-default btn-sm mt-0 mx-2">
                                        <i class="fa-solid fa-file-export"></i>
                                        EXPORTER</button>
                                </div>
                                <div class="mr-5">
                                    {!! $projectData->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
