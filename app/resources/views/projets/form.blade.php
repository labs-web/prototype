<form action="{{ route('projets.store') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le titre">
            @error('nom')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date">Date de début</label>
            <input name="date_debut" type="date" class="form-control" id="date_debut"
                placeholder="Sélectionnez la date de début">
            @error('date_debut')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Date de fin</label>
            <input name="date_de_fin" type="date" class="form-control" id="date_de_fin"
                placeholder="Sélectionnez la date de fin">
            @error('date_de_fin')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="editor">
            </textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <button type="submit" class="btn btn-info">Ajouter</button>
    </div>
</form>  
<!-- Include CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
