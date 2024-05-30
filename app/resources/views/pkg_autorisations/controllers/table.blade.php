<div class="card-body table-responsive p-0">
<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{ __('pkg_autorisations/Controller.singular') }}</th>
            <th class="text-center">{{ __('app.action') }}</th>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($controllers as $controller)
            <tr>
                <td>{{ $controller->nom }}</td>
                <td class="text-center">

                    <a href="{{ route('controllers.edit', $controller) }}" class="btn btn-sm btn-default">
                        <i class="fas fa-pen-square"></i>
                    </a>
                    <form action="{{ route('controllers.destroy', $controller) }}" class="ml-2" style="display: inline;" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce controller ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        
        @endforeach
    </tbody>
</table>
</div>
<ul class="pagination m-2 float-right">
            {{ $controllers->onEachSide(1)->links() }}
        </ul>
