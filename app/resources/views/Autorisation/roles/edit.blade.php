@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="far fa-user-circle nav-icon"></i> Mdifier un Role</h3>
                        </div>
                        <div class="card-body">
                            {{-- get form --}}
                            @include('Autorisation.roles.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> 
@endsection
