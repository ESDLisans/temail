@props(['format' => 'horizontal', 'label' => null])

@php
$dimensions = [
    'horizontal' => ['width' => '100%', 'height' => '90px'],
    'vertical' => ['width' => '100%', 'height' => '600px'],
    'square' => ['width' => '100%', 'height' => '250px'],
];
@endphp

<div {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-md border border-slate-200/50 dark:border-slate-800/50 bg-white/80 dark:bg-slate-950/80 backdrop-blur-sm shadow-sm']) }} style="height: {{ $dimensions[$format]['height'] }}">
    <div class="absolute top-0 right-0 bg-slate-200 dark:bg-slate-800 text-xs px-2 py-0.5 text-slate-500 dark:text-slate-400 rounded-bl-md">
        Ad
    </div>
    <div class="w-full h-full flex items-center justify-center text-sm text-slate-400 dark:text-slate-500">
        Google Ads Space {{ $label ? "- $label" : "- $format format" }}
    </div>
</div>
