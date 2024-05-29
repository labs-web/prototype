@extends('layouts.app')
@section('title', __('app.add') . ' ' . __('pkg_realisation_projet/livrable.singular'))
@section('content')
    <div class="content-header">
        @if ($errors->has('livrable_exists'))
            <div class="alert alert-danger">
                {{ $errors->first('livrable_exists') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
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
                                {{ __('app.add') }} {{ __('pkg_realisation_projet/livrable.singular') }}
                            </h3>
                        </div>
                        <!-- Include the form fields from a separate blade file for better reusability -->
                        @include('pkg_realisation_projet.livrable.fields')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

