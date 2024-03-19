@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ajouter un Controller</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-gamepad nav-icon"></i> Ajouter un Controller</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('controllers.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="ControllerName">Nom de Controller</label>
                                <input type="text" name="nom" class="form-control" id="ControllerName" placeholder="Entrez le nom de l'action" value="ProjetsController">
                            </div>
                            <a href="{{route('controllers.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
