<form action="{{ $dataToEdit ? route('livrables.update', $dataToEdit->id) : route('livrables.store') }}" method="POST">
    @csrf
    @if ($dataToEdit)
        @method('PUT')
    @endif
    <div class="card-body">
        <div class="form-group">
            <label for="titre">{{ __('pkg_realisation_projet/livrable.title') }} <span class="text-danger">*</span></label>
            <input name="titre" type="text" class="form-control" id="titre" placeholder="Entrez le titre"
                value="{{ $dataToEdit ? $dataToEdit->titre : old('titre') }}">
            @error('titre')
                <div class="text-danger">{{ $message }}</div>
            @enderror 
        </div>

        <div class="form-group">
            <label for="lien"> {{ __('pkg_realisation_projet/livrable.link') }} <span class="text-danger">*</span></label>
            <input name="lien" type="text" class="form-control" id="lien" placeholder="Entrez le lien"
                value="{{ $dataToEdit ? $dataToEdit->lien : old('lien') }}">
            @error('lien')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="projects">{{ __('pkg_realisation_projet/projet.plural') }}</label>
            <select name="projet_id" id="projects" class="form-control">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ ($dataToEdit && $project->id == $dataToEdit->projet_id) ? 'selected' : '' }}>{{ $project->nom }}</option>
                @endforeach
            </select>
            @error('projects')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">    
            <label for="nature_livrable">{{ __('pkg_realisation_projet/Nature_Livrables.singular') }} </label>
            <select name="nature_livrable_id" id="nature_livrable" class="form-control">
                @foreach($natureLivrables as $natureLivrable)
                    <option value="{{ $natureLivrable->id }}" {{ ($dataToEdit && $natureLivrable->id == $dataToEdit->nature_livrable_id) ? 'selected' : '' }}>{{ $natureLivrable->nom }}</option>
                @endforeach
            </select>
            @error('nature_livrable')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">{{ __('app.description') }}</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Entrez la description">
                {{ $dataToEdit ? $dataToEdit->description : old('description') }}
            </textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="card-footer">
        <a href="{{ route('livrables.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
        <button type="submit" class="btn btn-info ml-2">{{ $dataToEdit ? __('app.edit') : __('app.add') }}</button>
    </div>
</form>

