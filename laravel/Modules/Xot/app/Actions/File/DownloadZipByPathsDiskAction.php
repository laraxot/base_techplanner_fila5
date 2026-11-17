<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
<<<<<<< HEAD
=======
use ZipArchive;
>>>>>>> 6ed19256f (.)

class DownloadZipByPathsDiskAction
{
    use QueueableAction;

    /**
     * Crea un file ZIP dai percorsi forniti e lo restituisce come download.
     *
<<<<<<< HEAD
     * @param array<string> $attachments Array di percorsi file
     * @param string        $disk        Nome del disco di storage
=======
     * @param  array<string>  $attachments  Array di percorsi file
     * @param  string  $disk  Nome del disco di storage
>>>>>>> 6ed19256f (.)
     *
     * @return BinaryFileResponse|null Risposta di download o null se fallisce
     */
    public function execute(array $attachments, string $disk): ?BinaryFileResponse
    {
        $zipFileName = 'temp_zip_'.uniqid().'.zip';
        $zipPath = 'temp/'.$zipFileName;

        // Crea un file temporaneo per lo ZIP usando Storage
<<<<<<< HEAD
        $zip = new \ZipArchive();
=======
        $zip = new ZipArchive();
>>>>>>> 6ed19256f (.)
        $tempFilePath = storage_path('app/'.$zipPath);

        // Assicurati che la directory temp esista
        Storage::disk('local')->makeDirectory('temp');

<<<<<<< HEAD
        if (true === $zip->open($tempFilePath, \ZipArchive::CREATE)) {
=======
        if ($zip->open($tempFilePath, ZipArchive::CREATE) === true) {
>>>>>>> 6ed19256f (.)
            foreach ($attachments as $attachment) {
                $filePath = $attachment;

                if (Storage::disk($disk)->exists($filePath)) {
                    $fileContent = Storage::disk($disk)->get($filePath);
<<<<<<< HEAD
                    if (null !== $fileContent) {
=======
                    if ($fileContent !== null) {
>>>>>>> 6ed19256f (.)
                        $zip->addFromString($attachment.'.pdf', $fileContent);
                    }
                } else {
                    dddx(['filePath' => $filePath]);
                }
            }
            $zip->close();

            $downloadFileName = 'attachments_'.uniqid().'.zip';

            // Usa response()->download() per il download
            return response()->download($tempFilePath, $downloadFileName, [
                'Content-Type' => 'application/zip',
            ]); // ->deleteFileAfterSend(true);
        }

        return null;
    }
}
