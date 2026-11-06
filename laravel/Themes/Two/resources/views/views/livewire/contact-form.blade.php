<div>
    @if ($isSent)
        <div class="text-center">{{ __('pub_theme::contact_form.sent.thanks.message') }}</div>
    @else
        <form wire:submit="submit">
            <div class="mt-4">
                <x-input wire:model="first_name" name="first_name" :label="__('pub_theme::contact_form.fields.first_name.label')" required />
            </div>

            <div class="mt-4">
                <x-input wire:model="email" name="email" :label="__('pub_theme::contact_form.fields.email.label')" type="email" required />
            </div>

            <div class="mt-4">
                <x-textarea wire:model="message" name="message" :label="__('pub_theme::contact_form.fields.message.label')" rows="8" required />
            </div>

            <div class="mt-4">
                <x-input wire:model="quiz" name="quiz" :label="__('pub_theme::contact_form.fields.quiz.label')" required />
            </div>

            <div class="mt-4">
                <x-button :label="__('pub_theme::contact_form.actions.send.label')" />
            </div>
        </form>
    @endif
</div>
