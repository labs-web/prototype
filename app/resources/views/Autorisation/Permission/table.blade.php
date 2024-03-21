<div class="card-body table-responsive p-0">
<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{__('Autorisation/Permission/message.name')}}</th>
            <th>{{__('Autorisation/Permission/message.guard_name')}}</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="task-table">
        @forelse ($permission as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->guard_name}}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('permission.edit', $item->id) }}" class="btn btn-sm btn-default"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('permission.destroy', $item->id) }}" class="ml-2" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this.form)"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form> 
            </td>
        </tr>
        @empty
            <tr><td>Aucun perimissions trouvée</td></tr>
        @endforelse ($permissions as $item)
    </tbody>
</table>
</div>
    <div class="d-flex justify-content-between align-items-center p-2">
   
        <div class="">
            <ul class="pagination  m-0 float-right">
                {{$permission->links()}}
            </ul>
        </div>
    </div>
   
