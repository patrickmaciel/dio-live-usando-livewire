<x-page-layout>
    <h1 class="text-3xl font-bold uppercase mb-2">Tarefas Livewire</h1>

    <div class="flex flex-row gap-4 w-full">
        <div id="form-tarefas">
            <h1 class="text-2xl font-bold uppercase">
                @if($tarefa_id)
                    Editar Tarefa {{ $tarefa_id }}
                @else
                    Nova Tarefa
                @endif
            </h1>

            <form wire:submit.prevent="salvar" class="flex flex-col gap-2 space-y-2">

                <div class="flex flex-col gap-2">
                    <x-input-text wire:model.debounce.500ms="titulo" placeholder="Titulo aqui" />
                    @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <x-select name="categoria" wire:model="categoria" default="Categoria">
                        @foreach ($categorias as $index => $value)
                            <option value="{{ $index }}">{{ $value }}</option>
                        @endforeach
                    </x-select>
                    @error('categoria') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <x-select name="concluida" wire:model="concluida" default="Concluida?">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </x-select>
                    @error('concluida') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Salvar</button>
            </form>
        </div>

        <div id="table-tarefas">
            <h1 class="text-2xl font-bold uppercase">Registers</h1>

            <form wire:submit.prevent method="GET" class="flex gap-4">
                <!-- normal, lazy, debounce.300ms -->
                <input wire:model.debounce.500ms="busca" type="text" name="busca" id="busca" autocomplete="given-name" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" placeholder="Buscar tarefa">
            </form>

            <table class="w-full">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Nome</th>
                    <th>Concluida</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($tarefas as $tarefa)
                    <tr>
                        <td>{{ $tarefa->id }}</td>
                        <td>{{ $tarefa->categoria }}</td>
                        <td>{{ $tarefa->titulo }}</td>
                        <td>{{ $tarefa->concluida }}</td>
                        <td>
                            <a class='text-blue-500 font-bold underline' href="#" wire:click.prevent="editar({{ $tarefa->id }})">Editar</a>
                            <a class='text-blue-500 font-bold underline' href="#" wire:click.prevent="excluir({{ $tarefa->id }})">Excluir</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum registro encontrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-page-layout>
