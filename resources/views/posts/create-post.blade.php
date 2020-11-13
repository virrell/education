<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Создать
            </h2>
        </x-slot>

        <x-create-post-form title="Новый пост" httpmethod='POST' :viewModel='$viewModel'>
            
            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Опубликовать') }}
                </x-jet-button>
            </x-slot>
        </x-create-post-form>
    </div>
</x-app-layout>
