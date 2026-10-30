<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-cms::head />
    <body class="bg-white">
        <div class="flex flex-col min-h-screen">
            <main>{!! $slot ?? '' !!}</main>
        </div>
    </body>
</html>
