@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ajouter une tache</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-4">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ajouter {{$type}}</h3>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        @include('GestionProjets.task.fields')
                    </div>

                    <div class="card-footer">
                        <a href="" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>
    
@endsection