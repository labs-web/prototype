@extends('layouts.app')
@section('title', __('pkg_autorisations/Controller.singular'))

@section('content')
<div class="content-header">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('success') }}.
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('error') }}.
    </div>
    @endif
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @php
                    // Generate the title using the title function
                    use App\helpers\TranslationHelper;
                    $lang = Config::get('app.locale');
                    $translatedName = TranslationHelper::getTitle(__('pkg_autorisations/controller.plural'), $lang);
                    echo $translatedName;

                    @endphp
                </h1>
            </div>

            <div class="col-sm-6">
                <div class="float-sm-right d-flex justify-content-end">
                    <form action="{{ route('controllers.sync') }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-secondary mx-2"> <i class="fas fa-download"></i>
                            Mettre à jour {{ __('pkg_autorisations/Controller.singular') }}
                        </button>
                    </form>
                    <a href="{{ route('controllers.create') }}" class="btn btn-info">
                        <i class="fas fa-plus"></i>
                        {{ __('app.add') }} {{ __('pkg_autorisations/Controller.singular') }}
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
                            <form id="search_form" action="{{ route('controllers.index') }}" method="get">
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" name="searchValue" id="table_search" class="form-control float-right" placeholder="Recherche">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="table_container">
                        @include('pkg_autorisations.controllers.table')
                    </div>
                    <!-- @include('pkg_autorisations.controllers.table') -->
                </div>
            </div>
        </div>
        <input type="hidden" id='page' value="1">
</section>

@endsection
