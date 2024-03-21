<div class="form-group">
    <label for="exampleInputcontroller">{{__('Autorisation/Permission/message.controller')}}</label>
    <select name="controller_id" class="form-control" id="exampleInputcontroller" required>
        @if (isset($Permission))
            <option value="{{ $Permission->id }}">{{ substr($Permission->nom, strpos($Permission->nom, '-') + 1) }}
            </option>
        @else
         <option value="">{{__('Autorisation/Permission/message.choix')}}</option>
        @endif
        @foreach ($controllers as $item)
            @if (!isset($Permission) || !$Permission->name || $item->id !== $Permission->controller->id)
                <option value="{{$item->id}}">{{$item->nom}}</option>
            @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="exampleInputEmail1">{{__('Autorisation/Permission/message.action')}}</label>
    <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="{{isset($Permission) ? $Permission->action : null}}">
</div>





