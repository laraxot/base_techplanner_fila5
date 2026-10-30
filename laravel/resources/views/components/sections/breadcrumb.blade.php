@php
use Illuminate\Support\Facades\Route;

// Build breadcrumb based on current route
$breadcrumbs = [];
$currentPath = Route::current() ? Route::current()->uri() : '';
$locale = app()->getLocale();

// Home is always first
$breadcrumbs[] = [
    'label' => __('navigation.breadcrumb.home'),
    'url' => route('home')
];

// Determine current page and add appropriate breadcrumbs
if (str_contains($currentPath, 'services')) {
    $breadcrumbs[] = ['label' => __('navigation.links.services'), 'url' => '/services'];
    if (str_contains($currentPath, 'services/')) {
        // Service detail page - would extract slug from route parameter
        $breadcrumbs[] = ['label' => __('navigation.breadcrumb.service_detail'), 'url' => null];
    }
} elseif (str_contains($currentPath, 'about')) {
    $breadcrumbs[] = ['label' => __('navigation.links.about'), 'url' => '/about'];
} elseif (str_contains($currentPath, 'blog')) {
    $breadcrumbs[] = ['label' => __('navigation.links.blog'), 'url' => '/blog'];
    if (str_contains($currentPath, 'blog/')) {
        $breadcrumbs[] = ['label' => __('navigation.breadcrumb.article'), 'url' => null];
    }
} elseif (str_contains($currentPath, 'faq')) {
    $breadcrumbs[] = ['label' => __('navigation.links.faq'), 'url' => '/faq'];
} elseif (str_contains($currentPath, 'contacts')) {
    $breadcrumbs[] = ['label' => __('navigation.links.contacts'), 'url' => '/contacts'];
} elseif (str_contains($currentPath, 'admin')) {
    $breadcrumbs[] = ['label' => __('navigation.breadcrumb.admin_area'), 'url' => '/admin'];
}
@endphp

@if (count($breadcrumbs) > 1)
<nav class="bg-gray-50 border-b" aria-label="{{ __('navigation.breadcrumb.aria_label') }}">
    <div class="container mx-auto px-4 py-3">
        <ol class="flex items-center space-x-2 text-sm">
            @foreach ($breadcrumbs as $index => $breadcrumb)
                @if ($index === count($breadcrumbs) - 1)
                    <li class="text-gray-700 font-medium" aria-current="page">
                        {{ $breadcrumb['label'] }}
                    </li>
                @else
                    <li>
                        <a href="{{ $breadcrumb['url'] }}" 
                           class="text-gray-500 hover:text-blue-600 transition-colors flex items-center">
                            {{ $breadcrumb['label'] }}
                        </a>
                    </li>
                    <li class="text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                @endif
            @endforeach
        </ol>
    </div>
</nav>
@endif