<?php

declare(strict_types=1);

use Modules\Seo\Actions\Url\NormalizeLocalizedPathAction;
use PHPUnit\Framework\Assert;

/**
 * DCP-288 (FO-6-20): /IT, /It/tickets, /it//tickets e /it/tickets/ rispondevano 200 come la forma canonica.
 */
function normalizedPath(string $path): ?string
{
    return app(NormalizeLocalizedPathAction::class)->execute($path, ['it', 'en', 'de', 'es']);
}

it('returns the canonical path for the duplicates of a localized page', function (): void {
    $cases = [
        ['/IT/tickets', '/it/tickets'],
        ['/It/tickets', '/it/tickets'],
        ['/IT', '/it'],
        ['/it/', '/it'],
        ['/it//tickets', '/it/tickets'],
        ['/it///tickets//12', '/it/tickets/12'],
        ['/it/tickets/', '/it/tickets'],
        ['/DE//Tickets//', '/de/Tickets'],
    ];
    foreach ($cases as [$path, $canonical]) {
        Assert::assertSame($canonical, normalizedPath($path));
    }
});

it('returns null when the path is already canonical or is not a localized page', function (): void {
    foreach (['/it', '/en/tickets', '/it/Blog', '/', '/livewire/livewire.js', '/storage/', '/fr/tickets/'] as $path) {
        Assert::assertNull(normalizedPath($path));
    }
});
