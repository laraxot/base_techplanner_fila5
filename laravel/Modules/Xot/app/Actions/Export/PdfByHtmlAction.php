<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Spipu\Html2Pdf\Exception\HtmlParsingException;
        try {
            $html2pdf->writeHTML($html);
        } catch (HtmlParsingException $e) {
            dddx($html);
        }
        $path = Storage::disk($disk)->path($filename);
        $html2pdf->output($path, 'F');

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return match ($out) {
            'download' => response()->download($path, $filename, $headers),
            'content' => $html2pdf->output($path, 'S'), // D
            default => $path,
        };
    }
}
