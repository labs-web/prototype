<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
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
                <td colspan="2" class="text-center">Aucun tâches trouvée</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- get modal delete roles --}}
<x-modal-delete-role />

<script>
    function AddIdInModal(roleId) {
        document.getElementById('deleteForm').action = "{{ route('roles.destroy', ':roleId') }}".replace(':roleId',
            roleId);
    }
</script>
