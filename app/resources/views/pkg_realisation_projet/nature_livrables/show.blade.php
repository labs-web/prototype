@extends('layouts.app')

@section('content')
<div class="container">
    <h1>View Nature Livrable</h1>
    <div class="card">
        <div class="card-header">
            {{ $fetchedData->nom }}
        </div>
        <div class="card-body">
            <p><strong>{{ __('pkg_realisation_projet/Nature_Livrables.description') }}:</strong> {{ $fetchedData->description }}</p>
        </div>
    </div>
    <!-- <a href="{{ route('nature-livrables.edit', $fetchedData->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('nature-livrables.destroy', $fetchedData->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('nature-livrables.index') }}" class="btn btn-info">Back to List</a> -->
</div>
@endsection

