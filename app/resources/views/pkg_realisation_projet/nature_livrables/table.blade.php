<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap">
        <thead>
            <tr>
                <th>{{ __('pkg_realisation_projet/Nature_Livrables.name') }}</th>
                <th>{{ __('app.description') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($natureLivrableData as $natureLivrable)
                <tr>
                    <td>{{ $natureLivrable->nom }}</td>
                    <td>{{ $natureLivrable->description }}</td>
                    <td class="text-center">
                      
                            <a href="{{ route('nature-livrables.show', $natureLivrable) }}" class="btn btn-default btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        
                            @can('edit-NatureLivrableController')
                            <a href="{{ route('nature-livrables.edit', $natureLivrable) }}" class="btn btn-sm btn-default">
                                <i class="fas fa-pen-square"></i>
                            </a>
                            @endcan
                        
                            @can('destroy-NatureLivrableController')
                            <form action="{{ route('nature-livrables.destroy', $natureLivrable) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">
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

<!-- <div class="d-md-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        <!-- TODO css-2 : Importer et exporter ne doit pas s'afficher dans la version mobile  -->
        <!-- @('import-NatureLivrableController') -->
            <!-- <form action="{{ route('nature-livrables.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
                id="importForm">
                @csrf
                <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                    <i class="fas fa-file-download"></i>
                    {{ __('app.import') }}
                </label>
                <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
            </form> -->
        
        <!-- @('export-NatureLivrableController') -->
            <!-- <form class="">
                <a href="{{ route('nature-livrables.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
                    <i class="fas fa-file-export"></i>
                    {{ __('app.export') }}</a>
            </form> -->
        
    </div> 
    
    <ul class="pagination m-0 float-right">
        {{ $natureLivrableData->onEachSide(1)->links() }}
    </ul>
</div>

