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
                <h1>{{__('pkg_autorisations/actions.edit')}} {{$action->nom}}</h1>
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
                    <h3 class="card-title">{{__('pkg_autorisations/actions.edit')}}</h3>
                </div>
                <form action="{{ route('actions.update',$action->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        @include('pkg_autorisations.Actions.fields')
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('actions.index') }}" class="btn btn-default">{{__('pkg_autorisations/actions.cancel')}}</a>
                        <button type="submit" class="btn btn-info">{{__('pkg_autorisations/actions.edit')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>

@endsection
