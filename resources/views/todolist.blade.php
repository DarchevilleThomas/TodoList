<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
</head>
<body>

<h1>Liste de tâches</h1>

<table>
    <thead>
    <tr>
        <th>Nom de la Tâche</th>
        <th>Réalisée ou non</th>
        <th>Date de fin</th>
    </tr>
    </thead>
    <tbody>
    @foreach($todos as $todo)
    <tr>
        <td>{{$todo['tache']}}</td>
        <td>{{$todo['fini']}}</td>
        <td>{{$todo['dateDeFin']}}</td>
    </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
