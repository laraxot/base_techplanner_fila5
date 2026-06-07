<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Tables\Columns;

use Filament\Tables\Columns\IconColumn;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class IconMediaColumn extends IconColumn
{
    protected function setUp(): void
    {
        parent::setUp();
        $attachment = $this->getName();

        $this->default(function ($record) use ($attachment) {
            if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                return $record->getFirstMedia($attachment);
            }
<<<<<<< HEAD

<<<<<<< HEAD
=======
            return null;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        })
            ->icon('heroicon-o-document-text')
            ->color(function ($record) use ($attachment): string {
                if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                    return $record->getFirstMedia($attachment) ? 'success' : 'danger';
                }

                return 'danger';
            })
            ->tooltip(function ($record) use ($attachment): string {
                if (is_object($record) && method_exists($record, 'getFirstMedia')) {
                    $media = $record->getFirstMedia($attachment);
                    if (is_object($media) && isset($media->file_name) && is_string($media->file_name)) {
                        return $media->file_name;
                    }
                }

                return 'Documento non caricato';
            })
<<<<<<< HEAD
            ->action(function (array $arguments, Request $request) use ($attachment) {
                // Skip action if record is not available or doesn't have media capabilities
                if (! isset($arguments['record'])) {
<<<<<<< HEAD
                    return;
=======
                    return null;
>>>>>>> 4b6b99016 (first commit)
=======
            ->action(function (array $arguments, Request $request) use ($attachment): void {
                // Skip action if record is not available or doesn't have media capabilities
                if (! isset($arguments['record'])) {
                    return;
>>>>>>> dev
                }

                $record = $arguments['record'];

                // Verify record is an object and has the required method
                if (! is_object($record) || ! method_exists($record, 'getFirstMedia')) {
<<<<<<< HEAD
<<<<<<< HEAD
                    return;
=======
                    return null;
>>>>>>> 4b6b99016 (first commit)
=======
                    return;
>>>>>>> dev
                }

                /** @var Media|null $media */
                $media = $record->getFirstMedia($attachment);
                if ($media === null) {
<<<<<<< HEAD
<<<<<<< HEAD
                    return;
=======
                    return null;
>>>>>>> 4b6b99016 (first commit)
                }

                return $media->toInlineResponse($request);
=======
                    return;
                }

                $media->toInlineResponse($request);
>>>>>>> dev

                // return $media->toResponse($request);
                // return Storage::disk($media->disk)->download($media->getPathRelativeToRoot());
                // return Storage::disk($media->disk)
                //    ->temporaryUploadUrl($media->getPathRelativeToRoot(),now()->addMinutes(5));
                // return response()->streamDownload(function () use ($media) {
                //    echo $media->get();
                // }, $media->file_name);
                // $headers=[
                //    'Content-Type' => $media->mime_type,
                //    'Content-Disposition' => 'inline; filename="' . basename($media->getPathRelativeToRoot()) . '"'
                // ];
                // $path = Storage::disk($media->disk)->path($media->getPathRelativeToRoot());
                // return response()->file($path, $headers);

                // return Storage::disk($media->disk)->response($media->getPathRelativeToRoot(), null, $headers);
            });
    }
}
