@extends('layouts.app')
@section('title', __('app.add') . ' ' . __('pkg_autorisations/Controller.singular'))
@section('content')
    <div class="content-header">
        @if ($errors->has('controller_exists'))
            <div class="alert alert-danger">
                {{ $errors->first('controller_exists') }}
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
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-table"></i>
                                {{ __('app.add') }} {{ __('pkg_autorisations/Controller.singular') }}
                            </h3>
                        </div>
                        <!-- Obtenir le formulaire -->
                        <form action="{{ route('controllers.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="card-body">
                                    <div class="form-group">    
                                        <label for="nom">{{ __('app.name') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="nom" class="form-control" id="ControllerName"
                                            placeholder="Entrez le nom de Controller" value="{{ old('nom') }}">
                                            @error('nom')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('controllers.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
                                    <button type="submit" class="btn btn-info ml-2">{{ __('app.add') }}</button>
                                </div>

                            </form>



                        <!-- formulair end -->
                    </div>
                </div>
            </div>
           
        </div>
    
    </section>
@endsection