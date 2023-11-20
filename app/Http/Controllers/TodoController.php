<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(){
        $todos = Todos::all();
        return view('todolist',['todos' => $todos]);
    }
}
