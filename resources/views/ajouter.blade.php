<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List - Ajouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="text-center">

<h1 class="text-primary">Ajout d'une tâche</h1>

@if (session('status'))
    <div class="mx-3 alert alert-success"> {{session('status')}}</div>
@endif

@if (session('errors'))
    <div class="mx-3 alert alert-danger"> {{session('errors')}}</div>
@endif

<form action="/ajouter/traitement" method="POST" class="mx-5">
    @csrf
    <div class="row mb-3">
        <label>Nom de la tâche</label>
        <input type="text" name="tache">
    </div>
    <div class="row mb-3">
    <label>Description</label>
        <textarea type="text" name="description"> </textarea>
    </div>
    <div class="row mb-3">
        <label>Date de fin</label>
        <input type="date" name="dateDeFin">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<br>
<a href="/" class="mx-3 link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Retourner à la liste des tâches</a>
</body>
</html>
