<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <title>Emsal Messenger Project</title>
    @vite(['resources/css/app.css','resources/sass/app.scss'])
</head>
<body>
<div id="app">

</div>
@vite('resources/js/app.js')
</body>
</html>
