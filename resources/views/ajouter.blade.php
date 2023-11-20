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

<h1>Ajout d'une tâche</h1>

@if (session('status'))
    <div> {{session('status')}}</div>
@endif

<form action="/ajouter/traitement" method="POST">
    @csrf
    <label>Nom de la tâche</label>
    <input type="text" name="tache">
    <label>Description</label>
    <input type="text" name="description">
    <label>Date de fin</label>
    <input type="date" name="dateDeFin">
    <button type="submit">Valider</button>
</form>

<br>
<a href="/">Retourner à la liste des tâches</a>
</body>
</html>
