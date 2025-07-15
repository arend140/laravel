<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts &raquo; Criar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x>
                            <x-input-label for="title" :value="__('Título')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />

                            <x-input-label for="content" :value="__('Conteúdo')" />
                            <x-textarea id="content" class="block mt-1 w-full" type="text" name="content"
                            required autofocus autocomplete="content" > {{ old('content') }} </x-textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />

                            <x-input-label for="category_id" :value="__('Categoria')" />
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                        </div>

                        <x-primary-button class="m-5">Gravar post</x-primary-button>

                
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>