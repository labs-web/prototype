<div class="form-group">
    <label for="exampleInputController">{{__('Autorisation/action/message.controller')}}</label>
    <select name="controller_id" class="form-control" id="exampleInputController" required>
        @if (isset($action))
            <option value="{{ $action->controller->id }}">{{ $action->controller->nom }}</option>
        @else
         <option value="">{{__('Autorisation/action/message.choix')}}</option>
        @endif
        @foreach ($controllers as $item)
            @if (!isset($action) || !$action->controller || $item->id !== $action->controller->id)
                <option value="{{$item->id}}">{{$item->nom}}</option>
            @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="exampleInputEmail1">{{__('Autorisation/action/message.name')}}</label>
    <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="{{isset($action) ? $action->nom : null}}">
</div>

<div class="form-group">
    <label for="inputDescription">{{__('Autorisation/action/message.description')}}</label>
    <textarea name="description" class="form-control" rows="7" id="inputDescription" placeholder="Entrez la description" >{{isset($action) ? $action->description : null}}</textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">{{__('Autorisation/action/message.startDate')}}</label>
    <input name="date_debut" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="{{isset($action) ? $action->date_debut : null}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">{{__('Autorisation/action/message.endDate')}}</label>
    <input name="date_de_fin" type="date" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" value="{{isset($action) ? $action->date_de_fin : null}}">
</div>

