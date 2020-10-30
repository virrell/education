@props(['disabled' => false, 'name' => 'default', 'content'])

@if ($content)
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm', 'name' => $name])   !!}>{{ $content }}</textarea>

@else
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm', 'name' => $name]) !!}
    placeholder="Напишите что-нибудь"></textarea>
@endif
