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
                @if (@session('success'))
                    <div class="ml-4 mt-2">
                        <span class="font-medium text-success">{{ session('success') }}</span>
                    </div>
                @endif
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
                                        @include('GestionProjets.projets.table')
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-2">
                                <div class="d-flex align-items-center mb-2">

                                    <form action="{{ route('projets.import') }}" method="post"
                                        enctype="multipart/form-data" id="importForm">
                                        @csrf
                                        <label for="upload" class="btn btn-default btn-sm mb-0 font-weight-normal">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                            {{ __('IMPORTER') }}
                                        </label>
                                        <input type="file" id="upload" name="file" style="display:none;"
                                            onchange="submitForm()" />
                                    </form>
                                    <form>
                                        <a href="{{ route('projets.export') }}" class="btn  btn-default btn-sm mt-0 mx-2">
                                            <i class="fa-solid fa-file-export"></i>
                                            {{ __('EXPORTER') }}
                                        </a>
                                    </form>


                                </div>
                                <div class="mr-5">
                                    {!! $projectData->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id='page' value="1">
        </section>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function fetchData(page, searchValue) {
            $.ajax({
                url: 'projets/?page=' + page + '&searchValue=' + searchValue,
                success: function(data) {
                    $('tbody').html('');
                    $('tbody').html(data);
                    console.log(data);
                }
            });
            console.log(searchValue);
        }

        $('body').on('click', '.pagination a', function(param) {

            param.preventDefault();

            var page = $(this).attr('href').split('page=')[1];
            console.log(page);
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);

        });

        $('body').on('keyup', '#table_search', function() {
            var page = $('#page').val();
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);
        });

    });
</script>
