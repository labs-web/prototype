<div class="form-group">
    <label for="exampleInputProject">Projet</label>
    <select name="projet_id" class="form-control" id="exampleInputProject">
        <option value="">Choisir un projet</option>
        @foreach ($projects as $item)
         <option value="{{$item->id}}">{{$item->nom}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="">
</div>

<div class="form-group">
    <label for="inputDescription">Description</label>
    <textarea name="projectDescription" class="form-control" rows="7" id="inputDescription" placeholder="Entrez la description"></textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Date de début</label>
    <input name="startDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Date de fin</label>
    <input name="endDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="">
</div>

