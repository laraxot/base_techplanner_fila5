@props(['blocks'])

@if ($blocks)
    <div>
        <h2>{{ __('pub_theme::contact_form.post.see_also.title') }}</h2>

        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
            <x-render-blocks :blocks="$blocks" />
        </div>
    </div>
@endif
