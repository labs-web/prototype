@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('app.edit') }}  {{ __('pkg_realisation_projet/Nature_Livrables.name') }}</h1>
    <form action="{{ route('nature-livrables.update', $dataToEdit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">{{ __('app.name') }}:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $dataToEdit->nom }}" required>
        </div>
        <div class="form-group">
            <label for="description">{{ __('app.description') }}:</label>
            <textarea class="form-control" id="description" name="description">{{ $dataToEdit->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-info">{{ __('app.edit') }}</button>
    </form>
</div>
@endsection

