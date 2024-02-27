<form action="process_form.php" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="inputNom">Titre</label>
            <input name="projectName" type="text" class="form-control" id="inputNom" placeholder="Entrez le titre" value="CNMH">
        </div>

        <div class="form-group">
            <label for="inputStartDate">Date de début</label>
            <input name="startDate" type="date" class="form-control" id="inputStartDate" placeholder="Sélectionnez la date de début" value="2023-01-01">
        </div>

        <div class="form-group">
            <label for="inputEndDate">Date de fin</label>
            <input name="endDate" type="date" class="form-control" id="inputEndDate" placeholder="Sélectionnez la date de fin" value="2024-02-01">
        </div>

        <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea name="projectDescription" class="form-control" id="inputDescription" placeholder="Entrez la description">Description de CNMH</textarea>
        </div>

    </div>

    <div class="card-footer">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <button type="submit" class="btn btn-info">Ajouter</button>
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