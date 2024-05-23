{{--
<h1>Hello am kanban</h1>
@dd($tachesData) --}}


@extends('layouts.app')
@section('title', __('GestionProjets/tache.singular'))

@section('content')
    <div class="content-header">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}.
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        @php
                            use App\helpers\TranslationHelper;
                            $lang = Config::get('app.locale');
                            $translatedName = TranslationHelper::getTitle(__('GestionProjets/tache.singular'), $lang);
                            echo $translatedName;

                        @endphp
                    </h1>
                </div>

                <div class="col-sm-6">
                    <div class="float-sm-right">
                        @can('create-ProjetController')
                            <a href="{{ route('projets.create') }}" class="btn btn-info">
                                <i class="fas fa-plus"></i>
                                {{ __('app.add') }} {{ __('GestionProjets/tache.singular') }}
                            </a>
                        @endcan
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
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" name="table_search" id="table_search"
                                        class="form-control float-right" placeholder="Recherche">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="myKanban"></div>
                    {{-- <button id="addDefault">Add "Default" board</button>

                        <br />
                        <button id="addToDo">Add element in "To Do" Board</button>
                        <br />
                        <button id="addToDoAtPosition">Add element in "To Do" Board at position 2</button>
                        <br />
                        <button id="removeBoard">Remove "Done" Board</button>
                        <br />
                        <button id="removeElement">Remove "My Task Test"</button> --}}
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" id='page' value="1">
    </section>
@endsection
