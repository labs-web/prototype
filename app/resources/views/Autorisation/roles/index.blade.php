@extends('layouts.app')
@section('content')
    <div class="content">
        <section class="content-header">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Les Roles</h1>
                        </div>
                        <div class="col-sm-6">

                            <div class="float-sm-right mr-2">
                                <a href="{{ route('roles.create') }}" class="btn btn-info">
                                    <i class="fas fa-plus"></i> {{ __('GestionProjets/task/message.add') }}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('success') }}.
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class=" p-0">
                                    <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Recherche">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                {{-- get table --}}
                                @include('Autorisation.roles.table')
                            </div>

                            <div class="d-flex justify-content-between align-items-center p-2">
                                <div class="d-flex align-items-center mb-2">
                                    <button type="button" class="btn  btn-default btn-sm">
                                        <i class="fa-solid fa-file-arrow-down"></i>
                                        IMPORTER</button>
                                    <button type="button" class="btn  btn-default btn-sm mt-0 mx-2">
                                        <i class="fa-solid fa-file-export"></i>
                                        EXPORTER</button>
                                </div>
                                <div class="mr-5">
                                    <ul class="pagination  m-0 float-right">
                                        <li class="page-item"><a class="page-link text-secondary" href="#">«</a></li>
                                        <li class="page-item"><a class="page-link text-secondary active"
                                                href="#">1</a></li>
                                        <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link text-secondary" href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetch_data(page, search) {
                var projectID = $('#projectID').data('projectid');
                var url;

                if (projectID) {
                    url = '/projet/' + projectID + '/tâches?page=' + page + '&searchTask=' + search;
                } else {
                    url = '/projets/tâches?page=' + page + '&searchTask=' + search;
                }

                $.ajax({
                    url: url,
                    success: function(data) {
                        var newData = $(data);
                        console.log(newData);
                        $('#task-table').html(newData.find('#task-table').html());
                        $('.card-footer').html(newData.find('.card-footer').html());
                        var paginationHtml = newData.find('.pagination').html();
                        if (paginationHtml) {
                            $('.pagination').html(paginationHtml);
                        } else {
                            $('.pagination').html('');
                        }
                    }
                });
            }

            $('body').on('click', '.pagination a', function(param) {
                param.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var search = $('#task_search').val();
                fetch_data(page, search);
            });

            $('body').on('keyup', '#task_search', function() {
                var search = $('#task_search').val();
                var page = 1;
                fetch_data(page, search);
            });

            fetch_data(1, '');
        });


        function confirmDelete(form) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?")) {
                form.submit();
            }
        }

        function submitForm() {
            document.getElementById("importForm").submit();
        }
    </script>
@endsection
