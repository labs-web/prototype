@extends('layouts.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Détails du projet</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('projets.edit' , $fetchedData->id)}}" class="btn btn-default float-right"><i class="far fa-edit"></i> Modifier</a>
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
                                    <label for="nom">Nom:</label>
                                    <p>{{$fetchedData->nom}}</p>
                                </div>

                                <!-- Description Field -->
                                <div class="col-sm-12">
                                    <label for="description">Description:</label>
                                    <p>{{$fetchedData->description}}</p>
                                </div>

                                <!-- Description Field -->
                                <div class="col-sm-12">
                                    <label for="description">Date:</label>
                                    <p>Date de début: {{$fetchedData->date_debut}}</p>
                                    <p>Date de fin: {{$fetchedData->date_de_fin}}</p>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
