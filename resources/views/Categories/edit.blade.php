@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la catégorie</h1>

        <form action="{{ route('ideas.update', ['idea' => $idea->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de la catégorie</label>
                <textarea class="form-control" id="content" name="content" rows="3" required>{{ $categorie->nom }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
