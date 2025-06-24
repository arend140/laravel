<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Carrinho
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if(count($carrinho) > 0)
                    @foreach($carrinho as $id => $item)
                    <div class="flex flex-col justify-between border border-black ">
                            <span>{{ $item->nome }}</span>
                            <span>{{ $item->preco }}</span>
                            <span>{{ $item->descricao }}</span>
                            @if ($item->imagem) 
                                <img src="{{ asset('storage/' . $item->imagem) }}" alt="imagem" style="max-height:80px; width:150px;">
                            @endif
                            <x-nav-link href="{{ route('carrinho.apagar', $id) }}">Remover do carrinho</x-nav-link>
                        </div>
                    @endforeach
                @else
                    Nenhum item foi encontrado
                @endif

                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>