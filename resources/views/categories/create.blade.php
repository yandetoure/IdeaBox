@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une Catégorie</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de la catégorie</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
