@extends('layouts.app')
@section('title', __('app.show') . ' ' . __('pkg_realisation_projet/livrable.singular'))
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.detail') }}</h1>
                </div>
                @can('edit-LivrableController')
                    <div class="col-sm-6">
                        <a href="{{ route('livrables.edit', $fetchedData->id) }}" class="btn btn-default float-right">
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
                                <label for=titre">{{ __('pkg_realisation_projet/livrable.title') }}:</label>
                                <p>{{ $fetchedData->titre}}</p>
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

                            <!-- Link Field -->
                            <div class="col-sm-12">
                                <label for="lien">{{ __('pkg_realisation_projet/livrable.link') }}:</label>
                                <p>{{ $fetchedData->lien }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

