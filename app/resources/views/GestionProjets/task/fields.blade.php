<div class="form-group">
    <label for="exampleInputProject">{{__('GestionProjets/task/message.project')}}</label>
    <select name="project_id" class="form-control" id="exampleInputProject" required>
        @if (isset($task))
            <option value="{{ $task->project->id }}">{{ $task->project->nom }}</option>
        @else
         <option value="">{{__('GestionProjets/task/message.choix')}}</option>
        @endif
        @foreach ($projects as $item)
            @if (!isset($task) || !$task->project || $item->id !== $task->project->id)
                <option value="{{$item->id}}">{{$item->nom}}</option>
            @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="exampleInputEmail1">{{__('GestionProjets/task/message.name')}}</label>
    <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="{{isset($task) ? $task->nom : null}}">
</div>

<div class="form-group">
    <label for="inputDescription">{{__('GestionProjets/task/message.description')}}</label>
    <textarea name="description" class="form-control" rows="7" id="inputDescription" placeholder="Entrez la description" >{{isset($task) ? $task->description : null}}</textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">{{__('GestionProjets/task/message.startDate')}}</label>
    <input name="date_debut" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="{{isset($task) ? $task->date_debut : null}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">{{__('GestionProjets/task/message.endDate')}}</label>
    <input name="date_de_fin" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="{{isset($task) ? $task->date_de_fin : null}}">
</div>

