@extends('layouts.app')
@section('title', __('app.add') . ' ' . __('pkg_realisation_projet/nature_livrables.singular'))
@section('content')
    <div class="content-header">
        @if ($errors->has('livrable_exists'))
            <div class="alert alert-danger">
                {{ $errors->first('livrable_exists') }}
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
                                {{ __('app.add') }} {{ __('pkg_realisation_projet/nature_livrables.singular') }}
                            </h3>
                        </div>
                        <form action="{{ route('nature-livrables.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom">Name:</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection