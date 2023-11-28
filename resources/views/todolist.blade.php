<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List - Afficher</title>
    <style>
        .false{
            background-color: red;
            width: 50px;
            height: 50px;
        }
        .true{
            background-color: limegreen;
            width: 50px;
            height: 50px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="text-center">

<div class="text-center">
<h1 class="text-primary">Liste de tâches</h1>

@if (session('status'))
    <div class="alert alert-success mx-5"> {{session('status')}}</div>
@endif
@if (session('errors'))
    <div class="alert alert-danger mx-5"> {{session('errors')}}</div>
@endif
<div>

<a href="/ajouter" class="btn btn-success btn-sm me-3"><h3>Ajout de tâche</h3></a>
<a href="/delete" class="btn btn-danger btn-sm"><h3>Tout supprimer</h3></a>
</div>
</div>
@if(sizeof($todos)>0)
<table class="table">
    <thead>
    <tr>
        <th>Nom de la Tâche</th>
        <th>Date de fin</th>
        <th>Réalisée ou non</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($todos as $todo)
    <tr>
        <td>{{$todo['tache']}}</td>
        <td>{{$todo['dateDeFin']}}</td>
        @if($todo['fini']==0)
            <td><a href="/activate/{{$todo['id']}}"><div class="false mx-auto" ></div></a></td>
        @else
            <td><a href="/activate/{{$todo['id']}}"><div class="true mx-auto"></div></a></td>
        @endif
        <td><a href="/edit/{{$todo->id}}" class="btn btn-primary">Éditer</a> <a href="/delete/{{$todo['id']}}" class="btn btn-danger">Supprimer</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$todos->onEachSide(1)->links()}}
@else
    <h2>Liste vide !</h2>
@endif
</body>
</html>
