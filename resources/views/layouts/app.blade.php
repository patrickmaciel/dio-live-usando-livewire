<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')
    @livewireStyles

    <title>Document</title>
</head>
<body class="h-full">
    {{ $slot }}

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
