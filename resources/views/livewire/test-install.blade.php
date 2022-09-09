<x-page-layout>
    <h1>Test Install Livewire</h1>

    <div class="flex gap-4 mb-2">
        <input type="text" wire:model.debounce.500ms="nome" class="">

        <select name="categoria" id="categoria" wire:model="categoria">
            <option value="">Selecione</option>
            @foreach($categorias as $value => $categoria_nome)
                <option value="{{ $value }}">{{ $categoria_nome }}</option>
            @endforeach
        </select>

        <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" wire:click="salvar">Button text</button>
    </div>

    <h2>Meu nome é {{ $nome }}</h2>
    <h3>Categoria da tarefa: {{ $categoria }}</h3>
</x-page-layout>
