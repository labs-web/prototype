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
                <h1>Les taches @isset($project)
                    de {{$project->nom}}<div id="projectID" data-projectid="{{ $project->id }}"></div>
                @endisset</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="#ajout" class="btn btn-info">Ajouter</a>
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
                        <div class="d-flex justify-content-between">

                            <H2>HELLO WORLD</H2>

                        </div>
                    </div>
                    {{-- @include('GestionProjets.task.table') --}}
                </div>

            </div>
        </div>
    </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



@endsection
