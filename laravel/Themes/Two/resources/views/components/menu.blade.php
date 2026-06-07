@props(['name'])

<<<<<<< HEAD
<<<<<<< HEAD
@if ($menu = \Modules\Cms\Models\Menu::whereName($name)->first())
=======
@if ($menu = \App\Models\Menu::whereName($name)->first())
>>>>>>> 4b6b99016 (first commit)
=======
@if ($menu = \Modules\Cms\Models\Menu::whereName($name)->first())
>>>>>>> dev
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
