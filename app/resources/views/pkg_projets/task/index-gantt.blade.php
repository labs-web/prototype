@extends('layouts.app')
@section('title', __('GestionProjets/projet.singular'))

@section('content')
    <section class="content">
        @if ($taches->isEmpty())
            <div class="alert alert-warning mt-3">
                <strong>{{ __('No tasks available.') }}</strong>
            </div>
        @else
            <div class="mermaid">
                gantt
                dateFormat YYYY-MM-DD
                title {{ $taches->first()->Projet->nom }}

                @foreach ($taches as $tache)
                    section {{ $tache->nom }}
                    {{ $tache->StatutTache->nom }} :{{ $tache->StatutTache->nom }}, {{ $tache->dateDebut }}, {{ $tache->dateEchéance }}
                @endforeach
            </div>
        @endif
    </section>
@endsection
