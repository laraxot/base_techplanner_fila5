@volt('dashboard.index')
<?php

use function Livewire\Volt\{state, mount};
use Modules\User\Models\User;
use App\Models\Post;

state([
    'stats' => [],
]);

mount(function () {
    $this->stats = [
        'users' => User::count(),
        'posts' => Post::count(),
        'active_users' => User::where('last_active_at', '>', now()->subDay())->count(),
    ];
});

?>

<div>
    <x-filament::page>
        <x-slot name="header">
            <h2 class="text-2xl font-bold">
                {{ __('pub_theme::dashboard.page.heading.title') }}
            </h2>
        </x-slot>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-laraxot::card>
                <x-slot name="title">
                    {{ __('pub_theme::dashboard.stats.users_total.title') }}
                </x-slot>
                <div class="text-3xl font-bold">
                    {{ $stats['users'] }}
                </div>
            </x-laraxot::card>

            <x-laraxot::card>
                <x-slot name="title">
                    {{ __('pub_theme::dashboard.stats.posts_total.title') }}
                </x-slot>
                <div class="text-3xl font-bold">
                    {{ $stats['posts'] }}
                </div>
            </x-laraxot::card>

            <x-laraxot::card>
                <x-slot name="title">
                    {{ __('pub_theme::dashboard.stats.users_active.title') }}
                </x-slot>
                <div class="text-3xl font-bold">
                    {{ $stats['active_users'] }}
                </div>
            </x-laraxot::card>
        </div>

        <div class="mt-6">
            <x-laraxot::card>
                <x-slot name="title">
                    {{ __('pub_theme::dashboard.latest.posts.title') }}
                </x-slot>

                <div class="space-y-4">
                    @foreach(Post::latest()->take(5)->get() as $post)
                        <div class="border-b pb-4">
                            <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                            <p class="text-gray-600">{{ $post->excerpt }}</p>
                            <div class="text-sm text-gray-500 mt-2">
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-laraxot::card>
        </div>
    </x-filament::page>
</div>
@endvolt
