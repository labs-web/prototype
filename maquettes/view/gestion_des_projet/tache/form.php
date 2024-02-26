<form>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="tâche 1">
        </div>

        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea name="projectDescription" class="form-control" id="inputDescription" placeholder="Entrez la description">Description de CNMH</textarea>
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Date de début</label>
            <input name="startDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="2023-01-01">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Date de fin</label>
            <input name="endDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="2023-12-31">
        </div>

    </div>

    <div class="card-footer">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <button type="submit" class="btn btn-info">Soumettre</button>
    </div>
</form>

<script>
    tinymce.init({
        selector: '#inputDescription',
        height: 300, // Set the height of the editor
        menubar: false, // Hide the menu bar
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                   alignleft aligncenter alignright alignjustify | \
                   bullist numlist outdent indent | removeformat | help'
    });
</script>