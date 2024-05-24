@extends('layouts.app')
@section('title', __('GestionProjets/projet.singular'))

@section('content')
    <section class="content">
        <div class="mermaid">
            gantt
            dateFormat YYYY-MM-DD
            @foreach ($taches as $tache)
            title {{ $tache->Projet->nom }}

                section {{ $tache->nom }}
                {{ $tache->StatutTache->nom }} :{{ $tache->StatutTache->nom }}, {{ $tache->dateDebut }}, {{ $tache->dateEchéance }}
            @endforeach
        </div>
    </section>
@endsection
