<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{ route('produtos.create') }}">
                       + Produto
                    </x-link-button>
                </div>
                
                <div class="flex flex-col">
                    @foreach ($produtos as $produto)
                        <div class="flex flex-col justify-between border border-black ">
                            <span>{{ $produto->nome }}</span>
                            <span>{{ $produto->preco }}</span>
                            <span>{{ $produto->descricao }}</span>
                            <span>Categoria:{{ $produto->categoria[0]->nome }}</span>
                            @if ($produto->imagem) 
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="imagem" style="max-height:80px; width:150px;">
                            @endif
                            <x-nav-link href="{{ route('carrinho.adicionar', $produto->id) }}">Adicionar ao carrinho</x-nav-link>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>