@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('GestionProjets/projet/message.detail')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('projets.edit', $fetchedData->id) }}" class="btn btn-default float-right">{{__('GestionProjets/projet/message.edit')}}</a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-sm-12">
                                <label for="nom">{{__('GestionProjets/projet/message.name')}}:</label>
                                <p>{{ $fetchedData->nom }}</p>
                            </div>

                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{__('GestionProjets/projet/message.description')}}:</label>
                                <p>{{ $fetchedData->description }}</p>
                            </div>

                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{__('GestionProjets/projet/message.date')}}:</label>
                                <p>{{__('GestionProjets/projet/message.startDate')}}: {{ $fetchedData->date_debut }}</p>
                                <p>{{__('GestionProjets/projet/message.endDate')}}: {{ $fetchedData->date_de_fin }}</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
