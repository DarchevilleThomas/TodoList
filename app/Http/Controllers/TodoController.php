<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(){
        $todos = Todos::paginate(10);
        return view('todolist',['todos' => $todos]);
    }

    public function ajouter(){
        return view('ajouter');
    }


    public function ajouterTraitement(Request $request){
        $infos = $request->all();
        if ($infos['tache']==null) return redirect('/ajouter')->with('errors',"Erreur ! La tache n'a pas été ajoutée car le nom de tâche n'est pas renseignée ! ");

        DB::insert("INSERT INTO todos (tache,description,fini,dateDeFin) VALUES (?,?,?,?)",[$infos['tache'],$infos['description'],false,$infos['dateDeFin']]);
        return redirect('/ajouter')->with('status',"La tâche '{$infos['tache']}' a bien été ajoutée avec succès !");
    }

    public function delete( $id = null){
        if ($id==null){
            DB::delete("DELETE FROM todos");
            return redirect('/')->with('status','Tout a été supprimé !');
        }
        else {
            $todo = Todos::find($id);
            $todo->delete();
            return redirect('/')->with('status', "La tâche '$todo->tache' a été supprimée");
        }
    }

    public function edit($id = -1){
        $todo = Todos::all()->find($id);
        if($todo==null) return redirect('/')->with('errors',"Vous ne pouvez pas editer une tâche qui n'exite pas");;
        return \view('editer',['todo' => $todo]);
    }

    public function editTraitement(Request $request){
        $infos = $request->all();
        if ($infos['tache']==null) return redirect("/edit/{$infos['id']}")->with('status',"Erreur ! La tache n'a pas été modifiée car le nom de tâche n'est pas renseignée ! ");
        $id = $infos['id'];
        if (!array_key_exists('fini',$infos)) $infos['fini']=0;
        else $infos['fini']=1;
        $liste = [
            'tache'=>$infos['tache'],
            'description'=>$infos['description'],
            'dateDeFin'=>$infos['dateDeFin'],
            'fini'=>$infos['fini'],
        ];
        foreach (array_keys($liste) as $attribut){
            DB::update("UPDATE todos SET {$attribut}='{$liste[$attribut]}' WHERE id={$id}");
        }
        return redirect("/edit/{$infos['id']}")->with('success','La tache a bien été mise à jour !');
    }

    public function activate($id){
        $todo = Todos::all()->find($id);
        if($todo["fini"]==0) $todo["fini"]=1;
        else $todo["fini"]=0;
        $todo->save();
        return redirect('/');
    }
}
