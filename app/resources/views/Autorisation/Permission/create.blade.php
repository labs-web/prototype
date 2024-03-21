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
                <h1>{{__('Autorisation/Permission/message.addPermission')}}
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
                    <h3 class="card-title">{{__('Autorisation/Permission/message.addPermission')}}</h3>
                </div>
                <form action="{{ route('permission.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        @include('Autorisation.Permission.fields')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('permission.index') }}" class="btn btn-default">{{__('Autorisation/Permission/message.cancel')}}</a>
                        <button type="submit" class="btn btn-primary">{{__('Autorisation/Permission/message.add')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>

@endsection