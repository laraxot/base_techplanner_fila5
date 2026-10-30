<x-layouts.main :title="__('pub_theme::contact_form.page.meta.title')">
    <x-banner>
        <h1>{{ __('pub_theme::contact_form.page.heading.title') }}</h1>
    </x-banner>

    <x-container>
        <div class="max-w-[600px] mt-8 mx-auto">
            @livewire('contact-form')
        </div>
    </x-container>
</x-layouts.main>
