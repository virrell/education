<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Редактирование
            </h2>
        </x-slot>
        <x-create-post-form id="postBody" title="Отредактируйте" :viewModel='$viewModel' data-postid='{{ $viewModel["postId"] }}'>
            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Сохранить изменения') }}
                </x-jet-button>
                <x-jet-button id="deleteBtn" class="inline-flex bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    {{ __('Удалить пост') }}
                </x-jet-button>
            </x-slot>
        </x-create-post-form>
    </div>
    <x-modal id="modal"/>
    <script src="{{ asset('js/deletePostModalController.js') }}"></script>
    <script>
            const url = '{{ route("post-delete", $viewModel["postId"]) }}';
            const redirectUrl = '{{ route("dashboard") }}';
    </script>
</x-app-layout>
