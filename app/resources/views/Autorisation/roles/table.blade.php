<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody id="role-table">
        @forelse ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td class="text-center">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-default"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="AddIdInModal({{ $role->id }})"
                        data-toggle="modal" data-target="#deleteMod">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">Aucun roles trouvée</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
<div class="d-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        <form action="{{ route('roles.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
            id="importForm">
            @csrf
            <label for="upload" class="btn btn-default btn-sm">
                <i class="fa-solid fa-file-arrow-down"></i>
                IMPORTER
            </label>
            <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
        </form>
        <a href="{{ route('role.export') }}" class="btn  btn-default btn-sm mt-0 mx-2 text-bold">
            <i class="fa-solid fa-file-export"></i>
            EXPORTER</a>
    </div>
    <div class="">
        <ul class="pagination  m-0 float-right">
            {{ $roles->links() }}
        </ul>
    </div>
</div>

{{-- get modal delete roles --}}
<x-modal-delete-role />

<script>
    function submitForm() {
        document.getElementById('importForm').submit();
    }

    function AddIdInModal(roleId) {
        document.getElementById('deleteForm').action = "{{ route('roles.destroy', ':roleId') }}".replace(':roleId', roleId);
    }
</script>
