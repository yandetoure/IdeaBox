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
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .btn {
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #138496;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Liste des Idées</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                @foreach ($ideas as $idea)
                    <div class="card membre-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->ame }}</h5>
                            <p class="card-text">Titre: {{ $idea->title }}</p>
                            <p class="card-text">Priorité: {{ $idea->state }}</p>
                            <a href="{{ route('ideas.edit', $idea->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Modifier</a>
                            <a href="{{ route('ideas.delete', $idea->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</a>
                            <a href="{{ route('ideas.show', $idea->id) }}" class="btn btn-info"><i class="fas fa-info-circle"></i> Afficher plus</a>
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