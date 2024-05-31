@extends('layouts.app')
@section('title', __('app.show') . ' ' . __('GestionTasks/task/message.titre'))
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.detail') }}</h1>
                </div>
                @can('edit-TechnologieController')
                    <div class="col-sm-6">
                        <a href="{{ route('technologie.edit', $fetchedData->id) }}" class="btn btn-default float-right">
                            <i class="far fa-edit"></i>
                            {{ __('app.edit') }}
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <label for="nom">{{ __('app.name') }}:</label>
                                <p>{{ $fetchedData->nom }}</p>
                            </div>

                            <div class="col-sm-12">
                                <label for="nom">{{ __('pkg_competences/competence.singular') }}:</label>
                                <p>{{ $fetchedData->competence->nom }}</p>
                            </div>

                            <div class="col-sm-12">
                                <label for="nom">{{ __('pkg_competences/categorieTechnologie.singular') }}:</label>
                                <p>{{ $fetchedData->categorieTechnologie->nom }}</p>
                            </div>

                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('app.description') }}:</label>
                                @if ($fetchedData->description)
                                    <p>
                                        {!! $fetchedData->description !!}
                                    </p>
                                @else
                                    <p class="text-secondary">Aucune information disponible</p>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
