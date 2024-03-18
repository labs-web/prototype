<div class="form-group">
    <label for="exampleInputProject">Projet</label>
    <select name="project_id" class="form-control" id="exampleInputProject">
        @if (isset($task))
            <option value="{{ $task->project->id }}">{{ $task->project->nom }}</option>
        @else
         <option value="">Choisir un projet</option>
        @endif
        @foreach ($projects as $item)
            @if (!isset($task) || !$task->project || $item->id !== $task->project->id)
                <option value="{{$item->id}}">{{$item->nom}}</option>
            @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="{{isset($task) ? $task->nom : null}}">
</div>

<div class="form-group">
    <label for="inputDescription">Description</label>
    <textarea name="description" class="form-control" rows="7" id="inputDescription" placeholder="Entrez la description" >{{isset($task) ? $task->description : null}}</textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Date de début</label>
    <input name="date_debut" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="{{isset($task) ? $task->date_debut : null}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Date de fin</label>
    <input name="date_de_fin" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="{{isset($task) ? $task->date_de_fin : null}}">
</div>

