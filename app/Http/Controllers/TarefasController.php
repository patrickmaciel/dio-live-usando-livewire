<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::query()
            ->when(request()->has('busca'), function ($query) {
                $query->where('titulo', 'like', '%' . request('busca') . '%');
            })
            ->paginate(20);

        return view('tarefas.index', compact('tarefas'));
    }
}
