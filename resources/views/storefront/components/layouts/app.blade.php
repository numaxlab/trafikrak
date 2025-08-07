<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ !empty($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
    <meta name="description" content="{{ !empty($description) ? $description : '' }}">

    <meta name="color-scheme" content="light">
    @vite('resources/css/app.css')
    @if (isset($head))
        {{ $head }}
    @endif
</head>
<body>
<x-trafikrak::header/>

<main>
    {{ $slot }}
</main>

<x-trafikrak::footer/>

@vite('resources/js/app.js')
@if (isset($scripts))
    {{ $scripts }}
@endif
</body>
</html>
