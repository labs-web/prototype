@extends('layouts.app')
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
                <h1>{{$type}} {{$personne->nom}} {{$personne->prenom}}</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-4">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Editer {{$type}}</h3>
                </div>
                <form action="{{ route($type.'.update', $personne->id) }}" method="post">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        @include('pkg_rh.personne.fields')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route($type.'.index') }}" class="btn btn-default">{{__('app.back')}}</a>
                        <button type="submit" class="btn btn-primary">Editer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>
    
@endsection