@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des idées</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .nav-bar {
            height: 45px;
            font-size: 18px;
            background-color: #4edde2;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            margin-top: 50px;
        }
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
            text-decoration: none;
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
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text">
                @foreach ($ideas as $idea)
                    <div class="card membre-card mb-3">
                        <div class="card-body">
                            <h6 class="card-title">{{ $idea->user->name }}</h6>
                            <p class="card-text">{{ $idea->content }}</p>
                            @if ($idea->image)
                                <img src="{{ $idea->image }}" alt="image" class="image">
                            @endif
                            <div class="d-flex justify-content-between">
                                <span>{{ $idea->comments->count() }} Commentaires</span>
                                <a href="{{ route('ideas.show', $idea->id) }}" class="btn"><i class="fas fa-info-circle"></i> Afficher plus</a>
                            </div>
                            <div class="text-center mt-2">
                                @if (auth()->id() === $idea->user_id)
                                    <a href="{{ route('ideas.edit', $idea->id) }}" class="btn btn-edit"><i class="fas fa-edit"></i> Modifier</a>
                                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette idée ?');"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (count($ideas) === 0)
                    <p>Aucune idée trouvée.</p>
                @endif
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
