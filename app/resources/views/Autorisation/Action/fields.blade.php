<div class="form-group">
    <label for="exampleInputcontroller">{{__('Autorisation/Action/message.controller')}}</label>
    <select name="controller" class="form-control" id="exampleInputcontroller" required>
        @if (isset($action))
            <option value="{{ $action->id }}">{{ substr($action->nom, strpos($action->nom, '-') + 1) }}
            </option>
        @else
         <option value="">{{__('Autorisation/Action/message.choix')}}</option>
        @endif
        @foreach ($controller as $item)
            @if (!isset($action) || !$action->name )
                <option id="{{$item->id}}" value="{{$item->nom}}">{{$item->nom}}</option>
            @endif
        @endforeach
    </select>
    @error('controller')
    <p>
      {{$message}}
    </p>
@enderror

</div>


<div class="form-group">
    <label for="exampleInputEmail1">{{__('Autorisation/Action/message.action')}}</label>
    <input name="action" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="{{isset($action) ? $action->action : null}}">
    @error('action')
        <p>
          {{$message}}
        </p>
    @enderror
</div>





