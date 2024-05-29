<div class="form-group">
    <label for="exampleInputEmail1">Nom </label>
    <input name="nom" type="text" class="form-control"
        id="exampleInputEmail1" value="{{ isset($personne) ? $personne->nom : null}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Prenom</label>
    <input name="prenom" type="text" class="form-control"
        id="exampleInputPassword1" value="{{ isset($personne) ? $personne->prenom : null}}">
</div>

<div class="form-group">
    <label for="groupeSelect">Groupe</label>
    <select name="groupe_id" id="groupeSelect" class="form-control">
        @foreach ($groupes as $item)
            @if(isset($personne) && $personne->groupe_id == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->nom }}</option>
            @else
                <option value="{{ $item->id }}">{{ $item->nom }}</option>
            @endif
        @endforeach
    </select>
</div>
