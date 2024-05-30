@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>La liste des {{ $type }}s</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route($type . '.create') }}"  class="btn btn-info">Ajouter</a>
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
                                    <input type="text" id="table_search" class="form-control float-right"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('pkg_rh.personne.table')
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection
