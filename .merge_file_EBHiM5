<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Video;

use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
<<<<<<< HEAD
use ProtoneMedia\LaravelFFMpeg\Exporters\MediaExporter;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
=======
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> 6ed19256f (.)

class ConvertVideoAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $disk_mp4, string $file_mp4, string $file_new): string
    {
<<<<<<< HEAD
        /** @var MediaOpener $media */
        $media = FFMpeg::fromDisk($disk_mp4);

        /** @var MediaOpener $openedMedia */
        $openedMedia = $media->open($file_mp4);

        /** @var MediaExporter $exportedMedia */
        $exportedMedia = $openedMedia->export();

        $format = new X264;
        $format->setKiloBitrate(1000);

        $toDisk = $exportedMedia->toDisk($disk_mp4);
        Assert::isInstanceOf($toDisk, MediaExporter::class);

        $formatted = $toDisk->inFormat($format);

        $formatted->save($file_new);
=======
        $media = FFMpeg::fromDisk($disk_mp4);

        $openedMedia = $media->open($file_mp4);

        $exportedMedia = $openedMedia->export();

        $format = new X264();
        $format->setKiloBitrate(1000);

        /** @phpstan-ignore-next-line - FFMpeg fluent API */
        $toDiskMedia = $exportedMedia->toDisk($disk_mp4);

        /** @phpstan-ignore-next-line - FFMpeg fluent API */
        $formattedMedia = $toDiskMedia->inFormat($format);

        /** @phpstan-ignore-next-line - FFMpeg fluent API */
        $formattedMedia->save($file_new);
>>>>>>> 6ed19256f (.)

        return Storage::disk($disk_mp4)->url($file_new);
    }
}
