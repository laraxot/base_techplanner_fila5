<?php

declare(strict_types=1);

namespace Modules\Media\Console\Commands;

use FFMpeg\Format\Video\WebM;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
<<<<<<< HEAD
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
=======
>>>>>>> 6ed19256f (.)
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Webmozart\Assert\Assert;

class ConvertVideoCommand extends Command
{
    protected $signature = 'media:convert-video {disk} {file}';

    protected $description = 'Convert Video';

    public function handle(): string
    {
        Assert::string($disk = $this->argument('disk'));
        Assert::string($file = $this->argument('file'));
        $this->info('disk: '.print_r($disk, true));
        $this->info('file: '.print_r($file, true));

        if (! Storage::disk($disk)->exists($file)) {
            $this->error('['.$disk.'] file ['.$file.'] Not Exists');

            return '';
        }

<<<<<<< HEAD
        $format = new WebM;
        $extension = mb_strtolower(class_basename($format));
        $file_new = Str::of($file)->replaceLast('.mp4', '.'.$extension)->toString();

        /** @var MediaOpener $media */
        $media = FFMpeg::fromDisk($disk)->open($file);

        /** @var MediaExporter $export */
=======
        $format = new WebM();
        $extension = mb_strtolower(class_basename($format));
        $file_new = Str::of($file)->replaceLast('.mp4', '.'.$extension)->toString();

        $media = FFMpeg::fromDisk($disk)->open($file);
>>>>>>> 6ed19256f (.)
        $export = $media->export();

        $export->onProgress(function (float $percentage, float $remaining, float $rate): void {
            $this->info("{$percentage}% transcoded");
            $this->info("{$remaining} seconds left at rate: {$rate}");
        });
<<<<<<< HEAD
        /** @var MediaExporter $toDisk */
        $toDisk = $export->toDisk($disk);

        /** @var MediaExporter $formatted */
        $formatted = $toDisk->inFormat($format);

        $formatted->save($file_new);
=======
        // @phpstan-ignore method.nonObject, method.nonObject
        $export
            ->toDisk($disk)
            // @phpstan-ignore method.nonObject
            ->inFormat($format)
            // @phpstan-ignore method.nonObject
            ->save($file_new);
>>>>>>> 6ed19256f (.)

        return Storage::disk($disk)->url($file_new);
    }
}
