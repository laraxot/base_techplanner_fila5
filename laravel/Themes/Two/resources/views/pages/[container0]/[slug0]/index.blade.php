<?php
declare(strict_types=1);

use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Modules\Cms\Actions\ResolvePageAction;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;
use Modules\Cms\Models\Page;

name('container0.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $container0 = '';
    public string $slug0 = '';
    public string $pageSlug = '';
    public array $data = [];

    public function mount(string $container0, string $slug0 = ''): void
    {
        $this->container0 = $container0;
        $this->slug0 = $slug0;
        $resolved = app(ResolvePageAction::class)->execute($container0, $slug0);
        $this->pageSlug = $resolved->pageSlug;
        // ne' una pagina CMS ne' un record: 404 vero, non un 200 vuoto
        abort_if(Page::findUniqueBySlug($this->pageSlug) === null, 404);
        // `{container0}.view` senza record e' solo il modello del dettaglio: 404
        abort_if($resolved->item === null && $this->pageSlug === $container0 . '.view', 404);
        $this->data = [
            'container0' => $container0,
            'slug0' => $slug0,
            'item' => $resolved->item,
        ];
    }
};
?>

<x-layouts.app>
    @volt('container0.view')
        <div>
            <x-page
                side="content"
                :slug="$pageSlug"
                :data="$data"
            />
        </div>
    @endvolt
</x-layouts.app>
