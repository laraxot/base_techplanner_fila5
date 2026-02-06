@props([
    'brand' => config('app.name'),
    'menu_items' => [],
])

<div class="sticky top-0 z-50 w-full px-4 pt-4 transition-all duration-300">
    <div class="navbar bg-base-100/70 backdrop-blur-md border border-white/10 rounded-2xl shadow-xl max-w-7xl mx-auto">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 border border-base-200">
                    @foreach($menu_items as $item)
                        <li><a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] ?? 'Item' }}</a></li>
                    @endforeach
                </ul>
            </div>
            <a href="/" class="btn btn-ghost text-xl font-black tracking-tighter hover:bg-transparent">
                <span class="text-primary">{{ substr($brand, 0, 1) }}</span>{{ substr($brand, 1) }}
            </a>
        </div>
        
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 gap-2">
                @foreach($menu_items as $item)
                    <li>
                        <a href="{{ $item['url'] ?? '#' }}" class="font-medium hover:text-primary transition-colors">
                            {{ $item['label'] ?? 'Item' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        
        <div class="navbar-end gap-2">
            <a href="/login" class="btn btn-ghost btn-sm">Accedi</a>
            <a href="/register" class="btn btn-primary btn-sm rounded-lg shadow-md">Inizia</a>
        </div>
    </div>
</div>