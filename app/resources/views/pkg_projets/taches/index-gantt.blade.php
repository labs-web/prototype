@extends('layouts.app')

@section('title', __('GestionProjets/projet.singular'))

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Diagramme de Gantt</h1>
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
                            <div class="">
                                <div class="form-group col-md-3">
                                    {{-- <label for="projectSelect">{{ __('Select Project') }}</label> --}}
                                    <select id="projectSelect" class="form-control">
                                        <option value="">{{ __('All Projects') }}</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="taskContainer">
                            @include('pkg_projets.taches.gantt-chart')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="page" value="1">
    </section>
@endsection
