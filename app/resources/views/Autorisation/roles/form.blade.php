<form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store')}}" method="POST">
    @csrf
    @if(isset($role))
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="roleName">Nom de rôle</label>
        <input type="text" class="form-control @error('roleName') is-invalid @enderror" id="roleName" placeholder="Enter role name" name="roleName" value="{{ isset($role) ? $role->name : '' }}">
        @error('roleName')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-info">{{ isset($role) ? 'Modifier' : 'Ajoute' }}</button>
</form>
