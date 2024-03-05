@foreach ($projectData as $project)
    <tr>
        <td>{{ $project->nom }}</td>
        <td>{{ $project->date_debut }}</td>
        <td>{{ $project->date_de_fin }}</td>
        <td class="text-center">
            <a href="" class="btn btn-sm btn-secondary mx-2">
                <i class="nav-icon fas fa-tasks"></i> Les Tâches
            </a>
        </td>
        <td class="text-center">
            <a href="{{ route('projets.show', $project) }}" class="btn btn-default btn-sm">
                <i class="far fa-eye"></i>
            </a>
            <a href="{{ route('projets.edit', $project) }}" class="btn btn-sm btn-default">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('projets.destroy', $project) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
