<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categoria
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{ route('categoria.create') }}">
                       + Categoria
                    </x-link-button>
                </div>
                
                <div class="flex flex-col">
                    @foreach ($categorias as $categoria)
                        <div class="flex flex-col justify-between border border-black ">
                            <span>{{ $categoria->nome }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>