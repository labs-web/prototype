<div class="form-group">
    <label for="exampleInputcontroller">{{__('Autorisation/Permission/message.controller')}}</label>
    <select name="controller" class="form-control" id="exampleInputcontroller" required>
        @if (isset($permission))
            <option value="{{ $permission->id }}">{{ substr($permission->nom, strpos($permission->nom, '-') + 1) }}
            </option>
        @else
         <option value="">{{__('Autorisation/Permission/message.choix')}}</option>
        @endif
        @foreach ($controller as $item)
            @if (!isset($permission) || !$permission->name )
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
    <label for="exampleInputEmail1">{{__('Autorisation/Permission/message.action')}}</label>
    <input name="action" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom" value="{{isset($permission) ? $permission->action : null}}">
    @error('action')
        <p>
          {{$message}}
        </p>
    @enderror
</div>





