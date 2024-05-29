@extends('layouts.app')
@section('title', __('app.edit') . ' ' . __('pkg_autorisations/Controller.singular'))

@section('content')
    <div class="content-header">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-table"></i>
                                {{ __('app.edit') }}
                            </h3>
                        </div>
                        <form action="{{ route('controllers.update', $controller) }}" method="post">
                            <div class="card-body">
                                @csrf
                                @method('put')
                                <div class="form-group">   
                                    <label for="nom">{{ __('app.name') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez le nom de Controller" value="{{ old('nom') ?? $controller->nom }}">         
                                    @error('nom')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('controllers.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
                                <button type="submit" class="btn btn-info ml-2">{{ __('app.edit') }}</button>
                            </div>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection