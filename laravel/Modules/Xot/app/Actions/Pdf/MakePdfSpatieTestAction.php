<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\QueueableAction\QueueableAction;

/**
 * Smoke-test action for spatie/laravel-pdf (Browsershot driver via config).
 *
 * Dependency owner: Modules/Xot/composer.json — merge via composer go dalla root laravel.
 */
class MakePdfSpatieTestAction
{
    use QueueableAction;

    /**
     * Build a PDF download response from a Blade view using Spatie Laravel Pdf.
     *
     * @param  array<string, mixed>  $data
     */
    public function execute(
        array $data = [],
        string $filename = 'spatie-pdf-test.pdf',
        string $view = 'xot::pdf.spatie-test',
        ?Request $request = null,
    ): Response {
        $request ??= request();

        return Pdf::view($view, [
            'title' => 'Spatie PDF Test',
            'generated_at' => now(),
            'payload' => $data,
        ])
            ->format('a4')
            ->name($filename)
            ->toResponse($request);
    }
}
