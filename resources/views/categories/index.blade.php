<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="flex flex-col">
                    @foreach ($categories as $category)
                        <div class="flex flex-col justify-between border border-black ">
                            <span class="text-xl font-semibold">
                                <a href="category/posts/{{ $category->id }}">{{ $category->name }}</a>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>