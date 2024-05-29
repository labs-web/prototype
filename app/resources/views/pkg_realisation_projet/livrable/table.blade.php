<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap">
        <thead>
            <tr>
                <th>{{ __('pkg_realisation_projet/livrable.plural') }}</th>
                <th>{{ __('app.description') }}</th>
                <th>{{ __('pkg_realisation_projet/livrable.link') }}</th> <!-- Added column header for 'lien' -->
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livrableData as $livrable)
                <tr>
                    <td>{{ $livrable->titre }}</td>
                    <td>{{ $livrable->description }}</td>
                    <td>{{ $livrable->lien }}</td> <!-- Added data cell for 'lien' -->
                    <td class="text-center">
                        @can('show-LivrableController')
                            <a href="{{ route('livrables.show', $livrable) }}" class="btn btn-default btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                        @can('edit-LivrableController')
                            <a href="{{ route('livrables.edit', $livrable) }}" class="btn btn-sm btn-default">
                                <i class="fas fa-pen-square"></i>
                            </a>
                        @endcan
                        @can('destroy-LivrableController')
                            <form action="{{ route('livrables.destroy', $livrable) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livrable ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- Existing pagination below the table -->
    <div class="d-md-flex justify-content-between align-items-center p-2">
        <div class="d-flex align-items-center mb-2 ml-2 mt-2">
            @can('import-LivrableController')
                <form action="{{ route('livrables.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
                    id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                        <i class="fas fa-file-download"></i>
                        {{ __('app.import') }}
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
                </form>
            @endcan
            @can('export-LivrableController')
                <form class="">
                    <a href="{{ route('livrables.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
                        <i class="fas fa-file-export"></i>
                        {{ __('app.export') }}</a>
                </form>
            @endcan
        </div>
        
        <ul class="pagination m-0 float-right">
            {{ $livrableData->onEachSide(1)->links() }}
        </ul>
    </div>
</div>

