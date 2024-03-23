<div class="card-body table-responsive p-0">
<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{__('Autorisation/action/message.name')}}</th>
            <th>{{__('Autorisation/action/message.startDate')}}</th>
            <th>{{__('Autorisation/action/message.endDate')}}</th>
            <th>{{__('Autorisation/action/message.controller')}}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="action-table">
        @forelse ($actions as $item)
        <tr>
            <td>{{$item->nom}}</td>
            <td>{{$item->date_debut}}</td>
            <td>{{$item->date_de_fin}}</td>
            <td>{{$item->controller->nom}}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('action.detail', $item->id) }}" class="btn btn-sm btn-default mr-2"><i class="far fa-eye"></i></a>
                <a href="{{ route('action.edit', $item->id) }}" class="btn btn-sm btn-default"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('action.delete', $item->id) }}" class="ml-2" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this.form)"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form> 
            </td>
        </tr>
        @empty
            <tr><td>Aucun tâches trouvée</td></tr>
        @endforelse ($actions as $item)
    </tbody>
</table>
</div>
    <div class="d-flex justify-content-between align-items-center p-2">
        <div class="d-flex align-items-center mb-2 ml-2 mt-2">
                <form action="{{ route('action.import') }}" method="post" class="mt-2" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <label for="upload" class="btn btn-default btn-sm">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        IMPORTER
                    </label>
                    <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
                </form>
            <a href="{{ route('action.export') }}" class="btn  btn-default btn-sm mt-0 mx-2 text-bold">
                <i class="fa-solid fa-file-export"></i>
                EXPORTER</a>
        </div>
        <div class="">
            <ul class="pagination  m-0 float-right">
                {{$actions->links()}}
            </ul>
        </div>
    </div>
   
