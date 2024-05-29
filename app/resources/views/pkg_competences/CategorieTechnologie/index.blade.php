@extends('layouts.app')
@section('title', __('pkg_competences/categorieTechnologie.singular'))

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
                            // Generate the title using the title function
                            use App\helpers\TranslationHelper;
                            $lang = Config::get('app.locale');
                            $translatedName = TranslationHelper::getTitle(
                                __('pkg_competences/categorieTechnologie.singular'),
                                $lang,
                            );
                            echo $translatedName;
                        @endphp
                    </h1>
                </div>

                <div class="col-sm-6">
                    <div class="float-sm-right">
                        @can('create-CategorieTechnologieController')
                        <a href="{{ route('CategorieTechnologie.create') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                            {{ __('app.add') }} {{  __('pkg_competences/categorieTechnologie.singular') }}
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
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorieTechnologiesData as $categorieTechnologieData)
                                    <tr>   
                                        <td>{{ $categorieTechnologieData->nom }}</td>
                                        <td>{!! Str::limit($categorieTechnologieData->description, 50, '...') !!}</td>
                                        <td class="text-center">
                                            @can('show-CategorieTechnologieController')
                                            <a href="{{ route('CategorieTechnologie.show', $categorieTechnologieData->id) }}" class="btn btn-default btn-sm">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            @endcan
                                            @can('edit-CategorieTechnologieController')
                                            <a href="{{ route('CategorieTechnologie.edit', $categorieTechnologieData->id) }}" class="btn btn-sm btn-default">
                                                <i class="fas fa-pen-square"></i>
                                            </a>
                                            @endcan
                                            @can('destroy-CategorieTechnologieController')
                                            <form action="{{ route('CategorieTechnologie.destroy', $categorieTechnologieData->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endcan
                    
                                        </td>                    
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-md-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center mb-2 ml-2 mt-2">
                                @can('import-CategorieTechnologieController')
                                    <form action="{{ route('CategorieTechnologie.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
                                        id="importForm">
                                        @csrf
                                        <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                                            <i class="fas fa-file-download"></i>
                                            {{ __('app.import') }}
                                        </label>
                                        <input type="file" id="upload" name="file" style="display:none;" />
                                    </form>
                                @endcan
                                @can('export-CategorieTechnologieController')
                                    <form class="">
                                        <a href="{{ route('CategorieTechnologie.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
                                            <i class="fas fa-file-export"></i>
                                            {{ __('app.export') }}</a>
                                    </form>
                                @endcan
                            </div>
                            <ul class="pagination  m-0 float-right">
                                {{ $categorieTechnologiesData->onEachSide(1)->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <input type="hidden" id='page' value="1">
    </section>
@endsection
