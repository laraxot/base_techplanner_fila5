<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
<<<<<<< HEAD
        @vite(['resources/css/app.css'], 'themes/Two')
=======
        @vite(['resources/css/app.css'])
>>>>>>> 4b6b99016 (first commit)
=======
        @vite(['resources/css/app.css'], 'themes/Two')
>>>>>>> dev
    </head>
    <body class="bg-white">
        <div class="flex flex-col min-h-screen">
            <main>
                {!! $slot ?? '' !!}
            </main>
        </div>
    </body>
</html>
