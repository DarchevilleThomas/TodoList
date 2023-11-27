<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List - Modifier</title>
    <style>
        .test{
            background-color: red;
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>

<h1>Modification d'une tâche</h1>

@if (session('status'))
    <div> {{session('status')}}</div>
@endif

@if (session('success'))
    <div> {{session('success')}}</div>
@endif

<form action="/edit/traitement" method="POST">
    @csrf
    <input type="text" name="id" value="{{$todo['id']}}" hidden>
    <label>Nom de la tâche</label>
    <input type="text" name="tache" value="{{$todo['tache']}}">
    <label>Description</label>
    <input type="text" name="description" value="{{$todo['description']}}">
    <label>Réalisé ou non</label>
    @if($todo['fini']==0)
        <input type="checkbox" name="fini" >
    @else
        <input type="checkbox" name="fini" checked>
    @endif
    <label>Date de fin</label>
    <input type="date" name="dateDeFin" value="{{$todo['dateDeFin']}}">
    <button type="submit">Valider</button>
</form>

<br>
<a href="/">Retourner à la liste des tâches</a>
</body>
</html>
