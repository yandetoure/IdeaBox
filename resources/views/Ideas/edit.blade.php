@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'Idée</h1>

        <form action="{{ route('ideas.update', ['idea' => $idea->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">Contenu de l'idée</label>
                <textarea class="form-control" id="content" name="content" rows="3" required>{{ $idea->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $idea->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
        </form>
    </div>
@endsection
