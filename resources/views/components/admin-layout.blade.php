@props(['header'])

<x-layouts.admin>
    <x-slot name="header">
        {{ $header ?? '' }}
    </x-slot>
    
    {{ $slot }}
</x-layouts.admin> 