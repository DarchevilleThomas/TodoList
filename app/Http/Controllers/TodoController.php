<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(){
        $todos = Todos::all();
        return view('todolist',['todos' => $todos]);
    }

    public function ajouter(){
        return view('ajouter');
    }


    public function ajouterTraitement(Request $request){
        $infos = $request->all();
        if ($infos['tache']==null) return redirect('/ajouter')->with('status',"Erreur ! La tache n'a pas été ajoutée car le nom de tâche n'est pas renseignée ! ");

        DB::insert("INSERT INTO todos (tache,description,fini,dateDeFin) VALUES (?,?,?,?)",[$infos['tache'],$infos['description'],false,$infos['dateDeFin']]);
        return redirect('/ajouter')->with('status','La tâche a bien été ajoutée avec succès !');
    }

    public function deleteAll(){
        DB::delete("DELETE FROM todos");
        return redirect('/')->with('status','Tout a était supprimé !');
    }

}
