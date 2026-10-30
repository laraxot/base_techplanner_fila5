@props([
    'content' => '',
])

<div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg mx-auto prose prose-lg text-gray-700">
        {!! $content !!}
    </div>
</div>