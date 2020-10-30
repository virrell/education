<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новости') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
                    @foreach ($viewModel as $post)
                    <x-post-card :viewModel='$post'/>
                    @endforeach

        </div>
    </div>
</x-app-layout>
