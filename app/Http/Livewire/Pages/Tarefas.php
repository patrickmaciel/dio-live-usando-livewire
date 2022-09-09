<?php

namespace App\Http\Livewire\Pages;

use App\Models\Tarefa;
use Livewire\Component;

class Tarefas extends Component
{
    public $busca;

    // Atributos do Form
    public $tarefa_id;
    public $titulo;
    public $categoria;
    public $concluida;

    public $categorias = [
        'bug' => 'B.O zão',
        'task' => 'Tarefa',
        'home' => 'Atividades que a dignissima te pediu'
    ];

    public $queryString = [
        'busca'
    ];

    public $rules = [
        'titulo' => 'required|min:3',
        'categoria' => 'required',
        'concluida' => 'required'
    ];

    protected $messages = [
        'titulo.required' => 'É obrigatório capivara',
        'titulo.min' => 'Larga de preeguiça e digita isso ai direito...'
    ];

    public function updatedBusca($value)
    {
        \Log::info('Busca: ' . $value);
    }

    public function updated($nomeDoCampo)
    {
        \Log::info('Livewire UPDATED...');

        if ($nomeDoCampo != 'busca') {
            $this->validate();
        }
    }

    public function salvar()
    {
        if (empty($this->tarefa_id)) {
            Tarefa::create([
                'titulo' => $this->titulo,
                'categoria' => $this->categoria,
                'concluida' => $this->concluida
            ]);
        } else {
            Tarefa::where('id', $this->tarefa_id)
                ->update([
                    'titulo' => $this->titulo,
                    'categoria' => $this->categoria,
                    'concluida' => $this->concluida
                ]);
        }

        $this->reset('tarefa_id', 'categoria', 'titulo', 'concluida');
    }

    public function editar($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $this->tarefa_id = $tarefa->id;
        $this->titulo = $tarefa->titulo;
        $this->categoria = $tarefa->categoria;
        $this->concluida = $tarefa->concluida;
    }

    public function excluir($id)
    {
        Tarefa::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.pages.tarefas', [
            'tarefas' => Tarefa::query()
                ->when($this->busca, function ($query) {
                    $query->where('titulo', 'like', '%' . $this->busca . '%');
                })
                ->paginate(25)
        ]);
    }
}
