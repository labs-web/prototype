<form action="{{ $dataToEdit ? route('projets.update', $dataToEdit->id) : route('projets.store') }}" method="POST">
    @csrf
    @if ($dataToEdit)
        @method('PUT')
    @endif
    <div class="card-body">
        <div class="form-group">
            <label for="nom">{{__('GestionProjets/projet/message.name')}}</label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le titre"
                value="{{ $dataToEdit ? $dataToEdit->nom : '' }}">
            @error('nom')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_debut">{{__('GestionProjets/projet/message.startDate')}}</label>
            <input name="date_debut" type="date" class="form-control" id="date_debut"
                placeholder="Sélectionnez la date de début" value="{{ $dataToEdit ? $dataToEdit->date_debut : '' }}">
            @error('date_debut')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_de_fin">{{__('GestionProjets/projet/message.endDate')}}</label>
            <input name="date_de_fin" type="date" class="form-control" id="date_de_fin"
                placeholder="Sélectionnez la date de fin" value="{{ $dataToEdit ? $dataToEdit->date_de_fin : '' }}">
            @error('date_de_fin')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputDescription">{{__('GestionProjets/projet/message.description')}}</label>
            <textarea name="description" class="form-control" rows="7" id="inputDescription" placeholder="Entrez la description" >{{ $dataToEdit ? $dataToEdit->description : '' }}</textarea>
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('projets.index') }}" class="btn btn-default">{{__('GestionProjets/projet/message.cancel')}}</a>
        <button type="submit" class="btn btn-primary">{{ $dataToEdit ? __('GestionProjets/projet/message.edit') : __('GestionProjets/projet/message.add') }}</button>
    </div>
</form>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
