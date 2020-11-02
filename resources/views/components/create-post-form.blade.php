<x-form-section id="postBody" method="POST" :data-postid='$attributes["viewModel"]["postId"]' :action='$attributes["viewModel"]["actionRoute"]'>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="description">
        {{ __('') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-6">
            <x-text-area 
            :name='$attributes["viewModel"]["contentFieldName"]' 
            :content='$attributes["viewModel"]["postContent"]'  
            autofocus='autofocus' class="mt-1 block w-full"
            />
        </div>
    </x-slot>
    <x-slot name="actions">
        {{ $actions }}
    </x-slot>
</x-form-section>
