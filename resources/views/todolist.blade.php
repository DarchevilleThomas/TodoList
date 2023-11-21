<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
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
</head>
<body>

<h1>Liste de tâches</h1>

@if (session('status'))
    <div> {{session('status')}}</div>
@endif
<a href="/ajouter"><h2>Ajout de tâche</h2></a>
<a href="/delete"><h2>Tout supprimer</h2></a>

@if(sizeof($todos)>0)
<table>
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
            <td><a href="/"><div class="false"></div></a></td>
        @else
            <td><a href="/"><div class="true"></div></a></td>
        @endif
        <td><a href="/edit/{{$todo['id']}}">Editer</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
    <h2>Liste vide !</h2>
@endif
</body>
</html>
