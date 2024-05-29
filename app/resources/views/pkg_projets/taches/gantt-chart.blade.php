@if ($taches->isEmpty())
    <div class="alert alert-warning mt-3">
        <strong>{{ __('No tasks available.') }}</strong>
    </div>
@else
    <div class="mermaid">
        gantt
        dateFormat YYYY-MM-DD
        title {{ $taches->first()->Projet->nom }}

        @foreach ($taches->groupBy('Projet.nom') as $projetNom => $tachesParProjet)
            section {{ $projetNom }}
            @foreach ($tachesParProjet as $tache)
                {{ $tache->nom }} : {{ $tache->StatutTache->nom }}, {{ $tache->dateDebut }}, {{ $tache->dateEchéance }}
            @endforeach
        @endforeach
    </div>
@endif
