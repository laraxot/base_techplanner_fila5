<?php

use function Livewire\Volt\layout;
use Modules\User\Filament\Widgets\Auth\LoginWidget;

layout('pub_theme::layouts.auth');

?>

@if (auth()->check())
    <?php return redirect()->intended('/dashboard'); ?>
@endif

<div class="flex flex-col sm:justify-center items-center py-8 sm:py-12">
    <div class="w-full sm:max-w-md px-6 py-8 sm:px-8 sm:py-10 bg-white dark:bg-gray-800/80 shadow-xl rounded-2xl border border-gray-200/80 dark:border-gray-700/80 overflow-hidden">
        @livewire(LoginWidget::class)
    </div>
</div>
