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
                <h1>{{__('Autorisation/Action/message.editAction')}} {{$action->name}}</h1>
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
                    <h3 class="card-title">{{__('Autorisation/Action/message.edit')}}</h3>
                </div>
                <form action="{{ route('actions.update',$action->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        @include('Autorisation.Action.fields')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('actions.index') }}" class="btn btn-default">{{__('Autorisation/Action/message.cancel')}}</a>
                        <button type="submit" class="btn btn-primary">{{__('Autorisation/Action/message.edit')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>
    
@endsection