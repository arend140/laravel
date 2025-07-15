<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button href="{{ route('post.create') }}">
                       + Post
                    </x-link-button>
                </div>
                
                <div class="flex flex-col">
                    @foreach ($posts as $post)
                        <div class="flex flex-col justify-between border border-black ">
                            <span class="text-xl font-semibold">{{ $post->title }}</span>
                            <span class="font-semibold">Categoria: {{ $post->category->name }}</span>
                            <span class="font-semibold">Autor: {{ $post->user->name }}</span>
                            <span>{{ $post->content }}</span>
                            <span class="font-semibold"><a href="posts/edit/{{ $post->id }}">Editar</a></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>