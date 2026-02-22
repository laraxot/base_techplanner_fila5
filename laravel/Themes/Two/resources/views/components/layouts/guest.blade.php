<x-layouts.main :title="$title ?? ''">
    @if(isset($head))
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endif

    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</x-layouts.main>