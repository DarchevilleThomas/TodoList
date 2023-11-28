<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List - Modifier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="text-center">

<h1 class="text-primary">Modification d'une tâche</h1>

@if (session('status'))
    <div class="alert alert-danger mx-5"> {{session('status')}}</div>
@endif

@if (session('success'))
    <div class="alert alert-success mx-5"> {{session('success')}}</div>
@endif

<form action="/edit/traitement" method="POST" class="mx-5">
    @csrf
    <input type="text" name="id" value="{{$todo['id']}}" hidden>
    <div class="row mb-3">
    <label>Nom de la tâche</label>
    <input type="text" name="tache" value="{{$todo['tache']}}">
    </div>
    <div class="row mb-3">
    <label>Description</label>
        <textarea type="text" name="description" value="{{$todo['description']}}" rows="5"> </textarea>
    </div>
    <div class="row mb-3">
    <label>Date de fin</label>
    <input type="date" name="dateDeFin" value="{{$todo['dateDeFin']}}">
    </div>
    <div class="row mb-3">
        <label>Réalisé ou non</label>
        @if($todo['fini']==0)
            <input type="checkbox" name="fini" >
        @else
            <input type="checkbox" name="fini" checked>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<br>
<a href="/" class="mx-3 link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Retourner à la liste des tâches</a>
</body>
</html>
