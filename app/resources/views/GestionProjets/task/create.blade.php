@extends('layouts.app')
@section('content')

<div class="content-header">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('success') }}.
    </div>
    @endif
    @if($errors->has('task_exists'))
        <div class="alert alert-danger">
            {{ $errors->first('task_exists') }}
        </div>
    @else
        @if($errors->has('unexpected_error'))
            <div class="alert alert-danger">
                {{ $errors->first('unexpected_error') }}
            </div>
        @endif
    @endif


    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('GestionProjets/task/message.addTask')}}
                </h1>
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
                    <h3 class="card-title">{{__('GestionProjets/task/message.addTask')}}</h3>
                </div>
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        @include('GestionProjets.task.fields')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('task.index') }}" class="btn btn-default">{{__('GestionProjets/task/message.cancel')}}</a>
                        <button type="submit" class="btn btn-primary">{{__('GestionProjets/task/message.add')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>

@endsection