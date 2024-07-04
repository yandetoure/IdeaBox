@extends('layouts.app')

@section('content')

</style>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un événement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .conatainer{
            background-image: url('');
        }
        .form-container {
            max-width: 900px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 6px;
            color: #343a40;
        }
        .form-label {
            color: #343a40;
            font-weight: 500;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #fff;
            border: 2 solid #0148AD;
            border-radius: 10px;
            padding: 10px 20px;
            margin-left: 0px;
            margin-top: 20px;
            width: 100%;
            color: #0148AD;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0148AD;
        }
        .text-center a {
            text-decoration: none;
        }
        textarea{
            height: 60px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h1>Publier maintenant !</h1>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

                <div class="card-body">
                    <form action="{{ route('ideas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input class="form-control" id="image" name="image" rows="3" required></input>
                        </div>
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

        <div class="mt-3 text-center">
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

@endsection
