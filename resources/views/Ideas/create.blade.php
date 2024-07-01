@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une Nouvelle Idée</h1>

        <form action="{{ route('ideas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Contenu de l'idée</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
