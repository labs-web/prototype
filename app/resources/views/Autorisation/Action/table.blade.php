<div class="card-body table-responsive p-0">
<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{__('Autorisation/action/message.nomAction')}}</th>
            <th>{{__('Autorisation/action/message.controller')}}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="action-table">
        @forelse ($actions as $item)
        <tr>
            <td>{{$item->nom}}</td>
            <td>{{$item->controller->nom}}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('actions.edit', $item->id) }}" class="btn btn-sm btn-default"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('actions.destroy', $item->id) }}" class="ml-2" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this.form)"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form> 
            </td>
        </tr>
        @empty
            <tr><td>Aucun action trouvée</td></tr>
        @endforelse ($actions as $item)
    </tbody>
</table>
</div>
    <div class="d-flex justify-content-between align-items-center p-2">

        <div class="">
            <ul class="pagination  m-0 float-right">
                {{$actions->links()}}
            </ul>
        </div>
    </div>
   
