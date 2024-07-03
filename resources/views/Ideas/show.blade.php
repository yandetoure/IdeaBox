@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'Idée</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $idea->content }}</h5>
                <p class="card-text">Catégorie: {{ $idea->category->name }}</p>
                <p class="card-text">Date de création: {{ $idea->created_at }}</p>

                @if (auth()->user()->isAdmin())
                    <a href="{{ route('ideas.edit', ['idea' => $idea->id]) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('ideas.destroy', ['idea' => $idea->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
