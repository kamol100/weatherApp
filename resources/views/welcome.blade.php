<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather app</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
        <style>
            body{
              font-family: 'Poppins', sans-serif;  
            }
        </style>

        @vite(['resources/js/app.js', 'resources/css/app.css'])

    </head>
    <body class="antialiased">
        <div id="app"></div>
    </body>
</html>
