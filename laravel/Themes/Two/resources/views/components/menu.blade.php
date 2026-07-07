@props(['name'])

<<<<<<< HEAD
@if ($menu = \Modules\Cms\Models\Menu::whereName($name)->first())
=======
@if ($menu = \App\Models\Menu::whereName($name)->first())
>>>>>>> 6ed19256f (.)
    <ul class="ml-auto flex items-center space-x-4">
        @foreach ($menu->items as $item)
            <li>
                <a
                    href="{{ $item['url'] }}"
                    @if ($item['type'] === 'external') target="_blank" @endif
                >
                    {{ $item['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
<<<<<<< HEAD


=======
>>>>>>> 6ed19256f (.)
