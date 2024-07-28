@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Idée</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-title {
            color: #343a40;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .btn-edit {
            color: #007bff;
        }
        .btn-edit:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .btn-delete {
            color: #dc3545;
        }
        .btn-delete:hover {
            color: #bd2130;
            text-decoration: underline;
        }
        .btn-info {
            color: #6c757d;
        }
        .btn-info:hover {
            color: #343a40;
            text-decoration: underline;
        }
        .image {
            width: 100%;
            max-width: 800px;
            height: auto;
            margin-bottom: 20px;
        }
        .comment-section {
            margin-top: 40px;
        }
        .comment-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding: 10px;
        }
        .comment-form textarea {
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        .comment-form button {
            margin-top: 10px;
        }
        .text-muted{
            font-size: 12px;
        }
        textarea{
            height:50px;
        }
        h5{
            font-size: 16px;
        }
        .btn-add{
            font-size: 14px;
            height: 35px;
            width: 70px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<div class="container mt-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card membre-card mb-3">
                <div class="card-body">
                    <h6 class="card-title">{{ $idea->user->name }}</h6>
                    <p class="card-text">{{ $idea->content }}</p>
                    @if ($idea->image)
                        <img src="{{ $idea->image }}" alt="image" class="image">
                    @endif
                    <p class="card-text"><strong>Catégorie:</strong> {{ $idea->category->name }}</p>
                    <p class="card-text"><strong>Date de création:</strong> {{ $idea->created_at->format('d/m/Y') }}</p>
                    @if (auth()->id() === $idea->user_id)
                                <a href="{{ route('ideas.edit', $idea->id) }}" class="btn btn-edit"><i class="fas fa-edit"></i> Modifier</a>
                                <a href="{{ route('ideas.destroy', $idea->id) }}" class="btn btn-delete"><i class="fas fa-trash-alt"></i> Supprimer</a>
                                @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h5>Commentaires</h5>
            @foreach ($comments as $comment)
                <div class="comment-card">
                    <p><strong>{{ $comment->user->name }}</strong></p>
                    <p class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</p>
                    <p>{{ $comment->content }}</p>
                    @if (auth()->id() === $comment->user_id)
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-edit"><i class="fas fa-edit"></i> Modifier</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-delete"><i class="fas fa-trash-alt"></i> Supprimer</button>
                        </form>
                    @endif
                </div>
            @endforeach
            {{ $comments->links() }}

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un commentaire</h5>
                    <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
                        @csrf
                        <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                        <textarea name="content" rows="3" required></textarea>
                        <button type="submit" class="btn-add btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
