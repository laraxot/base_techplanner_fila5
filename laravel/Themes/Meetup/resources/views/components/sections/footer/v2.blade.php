{{-- Footer Section v1 - Laravel Pizza Meetups --}}
<footer class="bg-slate-900 border-t border-slate-800">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- About --}}
            <div>
                <h3 class="text-white font-bold mb-4">Laravel Pizza Meetups</h3>
                <p class="text-gray-400 text-sm">
                    {{ __('pub_theme::footer.about.description.message') }}
                </p>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="text-white font-semibold mb-4">{{ __('pub_theme::footer.links.title.title') }}</h4>
                <ul class="space-y-2">
                    <li><a href="{{ LaravelLocalization::localizeUrl('/') }}" class="text-gray-400 hover:text-white text-sm transition-colors">{{ __('pub_theme::navigation.home') }}</a></li>
                    <li><a href="{{ LaravelLocalization::localizeUrl('/events') }}" class="text-gray-400 hover:text-white text-sm transition-colors">{{ __('pub_theme::navigation.sections.events.label') }}</a></li>
                    <li><a href="{{ LaravelLocalization::localizeUrl('/dashboard') }}" class="text-gray-400 hover:text-white text-sm transition-colors">{{ __('pub_theme::navigation.user_menu.dashboard.label') }}</a></li>
                </ul>
            </div>

            {{-- Community --}}
            <div>
                <h4 class="text-white font-semibold mb-4">{{ __('pub_theme::navigation.footer.community.label') }}</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">GitHub</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Discord</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Twitter</a></li>
                </ul>
            </div>

            {{-- Legal --}}
            <div>
                <h4 class="text-white font-semibold mb-4">{{ __('pub_theme::footer.legal.title.title') }}</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">{{ __('pub_theme::footer.legal.privacy.label') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">{{ __('pub_theme::footer.legal.terms.label') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-800 mt-8 pt-8 text-center">
            <p class="text-gray-400 text-sm">
                &copy; {{ date('Y') }} Laravel Pizza Meetups. {{ __('pub_theme::footer.credits.made_with.message', ['heart' => '❤️']) }}
            </p>
        </div>
    </div>
</footer>
