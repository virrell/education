@props(['id', 'createTime', 'updateTime', 'userAvatar', 'userName'=>'Default', 'isEditable' => false])
<div class='m-5 flex'>

    <a href=""
        class="pr-2 text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
        <img class="h-8 w-8 rounded-full object-cover" src="{{ $userAvatar }}" alt="{{ $userName }}" />
    </a>

    <div>
        <h5>{{ $userName }}</h5>
        <time class="text-xs">Создано: {{ $createTime }}</time>
        @if ($createTime != $updateTime)
            <time class="text-xs">Обновлено: {{ $updateTime }}</time>
        @endif
    </div>
    @if ($isEditable)
        <div class="ml-auto text-xs text-blue-500">
        <a href={{route('post.edit', $id) }}>Edit</a>
        </div>
    @endif
</div>
