@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Idées</h1>

        <a href="{{ route('ideas.create') }}" class="btn btn-primary mb-3">Créer une Idée</a>

        <div class="card-deck">
            @foreach ($categories as $categorie)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categorie->nom }}</h5>
                        <p class="card-text">Date de création: {{ $idea->created_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



<!DOCTYPE html>
<html>
<body>
<!-- bouton -->
<button id="myButton">Click me</button>

<!-- Après un clic la function est appelée grâce à l'écouteur d'événement -->
<script>
document.getElementById('myButton').addEventListener('click', function() {
  alert('Vous avez cliqué sur le bouton!');
});
</script>

</body>
</html>
