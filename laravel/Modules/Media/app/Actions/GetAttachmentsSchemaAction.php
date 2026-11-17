<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Arr;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Config;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
>>>>>>> 6ed19256f (.)
use Webmozart\Assert\Assert;

class GetAttachmentsSchemaAction
{
    public function execute(array $attachments, string $disk = 'attachments'): array
    {
        $form = [];
<<<<<<< HEAD

        foreach ($attachments as $attachment) {
            $attachmentStr = (string) $attachment;
            $fileUpload = FileUpload::make($attachmentStr)
                // $fileUpload=SpatieMediaLibraryFileUpload::make($attachmentStr)
                ->directory('temp') // Use 'temp' as expected by test
                ->disk('attachments') // Use 'attachments' as expected by test
                ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']) // Include doc, docx as expected
                ->maxSize(10 * 1024 * 1024) // 10MB in bytes (what the test expects)
                ->visibility('public') // Add visibility
                ->preserveFilenames()
                ->required()
                ->previewable(true) // Make previewable
                ->downloadable(true) // Make downloadable
                ->reorderable(false) // Not reorderable
                ->multiple(false) // Not multiple
                // ->saveUploadedFiles()
                ->afterStateUpdated(function ($state, Set $set) use ($attachment): void {
=======
        $sessionId = session()->getId();
        $prefix = Config::string('media-library.prefix');

        $sessionDir = "session-uploads/{$sessionId}";
        if ($prefix !== '') {
            $sessionDir = $prefix.'/'.$sessionDir;
        }
        foreach ($attachments as $attachment) {
            $attachmentStr = (string) $attachment;
            $form[$attachmentStr] = FileUpload::make($attachmentStr)
                // $form[$attachment]=SpatieMediaLibraryFileUpload::make($attachment)
                ->directory($sessionDir)
                ->disk($disk)
                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'])
                ->maxSize(5120 * 2)
                ->preserveFilenames()
                ->required()
                ->previewable(false)
                // ->saveUploadedFiles()
                ->afterStateUpdated(function ($state, Set $set) use ($attachment, $sessionDir, $disk): void {
>>>>>>> 6ed19256f (.)
                    if (! $state) {
                        return;
                    }
                    $state = Arr::wrap($state);

                    $sessionFiles = [];

<<<<<<< HEAD
                    // Using a simple temp path for tests
                    foreach ($state as $file) {
                        $sessionFiles[] = $file; // Just pass through the file
=======
                    foreach ($state as $file) {
                        if ($file instanceof TemporaryUploadedFile) {
                            // Salva direttamente nella directory di sessione
                            $fileName = time().'_'.$file->getClientOriginalName();
                            $sessionPath = $file->storeAs($sessionDir, $fileName, $disk);
                            $sessionFiles[] = $sessionPath;
                        } else {
                            // È già un percorso salvato
                            $sessionFiles[] = $file;
                        }
>>>>>>> 6ed19256f (.)
                    }

                    // Set expects Component|string, pass attachment as string
                    Assert::string($attachment, 'Attachment must be string');
                    $set($attachment, $sessionFiles);
                });
<<<<<<< HEAD

            $form[] = $fileUpload; // Add to numerically indexed array
=======
>>>>>>> 6ed19256f (.)
        }

        return $form;
    }
}
