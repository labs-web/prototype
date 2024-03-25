@extends('layouts.app')
@section('content')
    <div class="content-header">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{__('GestionProjets/projet/message.editProjet')}} {{$dataToEdit->nom}}</h3>
                        </div>
                        @if (@session('success'))
                            <div class="ml-4 mt-2">
                                <span class="font-medium text-success">{{ session('success') }}</span>
                            </div>
                        @endif
                        <!-- Obtenir le formulaire -->
                        @include('GestionProjets.projet.fields')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
