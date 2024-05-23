@extends('layouts.app')
@section('title', __('GestionProjets/projet.singular'))

@section('content')
    <section class="content">
        <div class="mermaid">
            gantt
                dateFormat  YYYY-MM-DD
                title       Planning des Projets
            
                @foreach ($taches as $tache)
                section {{ $tache->nom }}
                {{ $tache->nom }} :{{ $tache->status }}, {{ $tache->date_debut }}, {{ $tache->date_echeance }}
                @endforeach
        </div>
    </section>
@endsection