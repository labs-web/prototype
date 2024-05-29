@extends('layouts.app')
@section('title', __('app.show') . ' ' . __('pkg_competences/categorieTechnologie.singular'))
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.detail') }} {{ __('pkg_competences/categorieTechnologie.singular') }}</h1>
                </div>
                {{-- @can('edit-TaskController') --}}
                    <div class="col-sm-6">
                        <a href="{{ route('CategorieTechnologie.edit', $fetchedData->id) }}" class="btn btn-info float-right">
                            <i class="far fa-edit"></i>
                            {{ __('app.edit') }}
                        </a>
                    </div>
                {{-- @endcan --}}
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
                                <label>{{ __('app.name') }}</label>
                                <p>{{ $fetchedData->nom }}</p>
                            </div>

                            <div class="col-sm-12">
                                <label>{{ __('app.description') }}</label>
                                <p>{!! $fetchedData->description !!}</p>
                            </div>
                        </div>  
                        <div class="card-footer">
                            <a href="{{ route('CategorieTechnologie.index') }}" class="btn btn-secondary">{{ __('app.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
