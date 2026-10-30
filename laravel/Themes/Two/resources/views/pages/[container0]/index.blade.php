<?php

use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;
use Modules\Cms\Models\Page;

name('container0');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $container0 = '';
    public string $slug0 = '';
    public array $data = [];

    public function mount(string $container0): void
    {
        // nessuna pagina CMS con questo slug: 404 vero, non un 200 con <main> vuoto
        abort_if(Page::findUniqueBySlug($container0) === null, 404);
        $this->container0 = $container0;
    }
};
?>

<x-layouts.app>
    @volt('container0')
    <div>
        <x-page side="content" :slug="$container0" />
    </div>
    @endvolt
</x-layouts.app>
