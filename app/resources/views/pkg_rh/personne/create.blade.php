@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ajouter un {{$type}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content-header">
    @if ($errors->has('personne_exists'))
        <div class="alert alert-danger">
            {{ $errors->first('personne_exists') }}
        </div>
    @else
        @if ($errors->has('unexpected_error'))
            <div class="alert alert-danger">
                {{ $errors->first('unexpected_error') }}
            </div>
        @endif
    @endif
</div>
<section class="content">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-4">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">>{{__('app.add')}} {{$type}}</h3>
                </div>
                <form action="{{ route($type.'.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        @include('pkg_rh.personne.fields')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route($type.'.index') }}" class="btn btn-default">>{{__('app.back')}}</a>
                        <button type="submit" class="btn btn-primary">>{{__('app.add')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>
@endsection