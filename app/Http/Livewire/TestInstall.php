<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestInstall extends Component
{
    public $nome = '';

    public $categorias = [
        'task' => 'Tarefa',
        'bug' => 'Bug',
        'home' => 'Tarefas de Casa'
    ];

    public $categoria = null;

    public function render()
    {
        return view('livewire.test-install');
    }
}
