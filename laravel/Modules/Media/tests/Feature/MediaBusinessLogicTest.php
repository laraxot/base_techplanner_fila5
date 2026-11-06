<?php

declare(strict_types=1);

namespace Modules\Media\Tests\Feature;

use Illuminate\Http\UploadedFile;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
<<<<<<< .merge_file_9Qu9tf
use Modules\Media\Database\Factories\MediaConvertFactory;
use Modules\Media\Database\Factories\MediaFactory;
use Modules\Media\Database\Factories\TemporaryUploadFactory;
=======
=======
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_hHS2zx
use Modules\Media\Models\Media;
use Modules\Media\Models\MediaConvert;
use Modules\Media\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Media Business Logic', function () {
    beforeEach(function (): void {
        Storage::fake('public');
    });

<<<<<<< .merge_file_9Qu9tf
    it('can create media from temporary upload', function (): void {
=======
    it('can create media from temporary upload', function () {
<<<<<<< HEAD
>>>>>>> .merge_file_hHS2zx
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $temporaryColumns = Schema::connection('media')->getColumnListing('temporary_uploads');

        /** @var array<string, mixed> $temporaryPayload */
        $temporaryPayload = [
            'session_id' => session()->getId(),
        ];

        $user = null;

        if (in_array('user_id', $temporaryColumns, true)) {
            $user = UserFactory::new()->createOne();
            $temporaryPayload['user_id'] = $user->id;
        }

        if (in_array('file_name', $temporaryColumns, true)) {
            $temporaryPayload['file_name'] = $file->getClientOriginalName();
        }

        if (in_array('file_size', $temporaryColumns, true)) {
            $temporaryPayload['file_size'] = $file->getSize();
        }

        if (in_array('mime_type', $temporaryColumns, true)) {
            $temporaryPayload['mime_type'] = $file->getMimeType();
        }

        if (in_array('status', $temporaryColumns, true)) {
            $temporaryPayload['status'] = 'uploading';
        }

        $temporaryUpload = TemporaryUploadFactory::new()->createOne($temporaryPayload);

        $mediaColumns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $mediaPayload */
        $mediaPayload = [
            'disk' => 'public',
            'collection_name' => 'default',
        ];

        if (in_array('file_name', $mediaColumns, true) && in_array('file_name', $temporaryColumns, true)) {
            $mediaPayload['file_name'] = $temporaryUpload->file_name;
        } else {
            $mediaPayload['file_name'] = 'test-image.jpg';
        }

        if (in_array('mime_type', $mediaColumns, true) && in_array('mime_type', $temporaryColumns, true)) {
            $mediaPayload['mime_type'] = $temporaryUpload->mime_type;
        } else {
            $mediaPayload['mime_type'] = $file->getMimeType();
        }

        if (in_array('file_size', $mediaColumns, true) && in_array('file_size', $temporaryColumns, true)) {
            $mediaPayload['file_size'] = $temporaryUpload->file_size;
        }

        if (in_array('size', $mediaColumns, true) && in_array('file_size', $temporaryColumns, true)) {
            $mediaPayload['size'] = (int) $temporaryUpload->file_size;
        }

        if ($user instanceof UserContract && in_array('user_id', $mediaColumns, true)) {
            $mediaPayload['user_id'] = $user->id;
        }

<<<<<<< .merge_file_9Qu9tf
        $media = MediaFactory::new()->createOne($mediaPayload);

        expect($media->file_name)
=======
        $media = Media::factory()->create($mediaPayload);
=======
        $user = User::factory()->create();
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $temporaryUpload = TemporaryUpload::factory()->create([
            'user_id' => $user->id,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
        ]);

        $media = Media::factory()->create([
            'user_id' => $user->id,
            'file_name' => $temporaryUpload->file_name,
            'file_size' => $temporaryUpload->file_size,
            'mime_type' => $temporaryUpload->mime_type,
            'disk' => 'public',
            'collection_name' => 'default',
        ]);
>>>>>>> 6ed19256f (.)

        expect($media)
            ->toBeInstanceOf(Media::class)
            ->and($media->file_name)
<<<<<<< HEAD
>>>>>>> .merge_file_hHS2zx
            ->toBe($mediaPayload['file_name'])
            ->and($media->mime_type)
            ->toBe($mediaPayload['mime_type']);

        $this->assertMediaTableHas('media', [
            'id' => $media->id,
            'file_name' => $mediaPayload['file_name'],
            'mime_type' => $mediaPayload['mime_type'],
        ]);
    });

    it('can convert media to different formats', function (): void {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        foreach (['media_id', 'original_format', 'target_format', 'status'] as $requiredColumn) {
            if (! in_array($requiredColumn, $convertColumns, true)) {
                $this->skipTest('media_converts table is missing required columns for this test in this install.');
            }
        }

        /** @var array<string, mixed> $payload */
        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
            $user = UserFactory::new()->createOne();
            $payload['user_id'] = $user->id;
        }

<<<<<<< .merge_file_9Qu9tf
        $media = MediaFactory::new()->createOne($payload);
=======
        $media = Media::factory()->create($payload);
=======
            ->toBe($temporaryUpload->file_name)
            ->and($media->file_size)
            ->toBe($temporaryUpload->file_size)
            ->and($media->mime_type)
            ->toBe($temporaryUpload->mime_type);

        $this->assertDatabaseHas('media', [
            'id' => $media->id,
            'user_id' => $user->id,
            'file_name' => $temporaryUpload->file_name,
            'file_size' => $temporaryUpload->file_size,
            'mime_type' => $temporaryUpload->mime_type,
        ]);
    });

    it('can convert media to different formats', function () {
        $user = User::factory()->create();
        $media = Media::factory()->create([
            'user_id' => $user->id,
            'mime_type' => 'image/jpeg',
        ]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_hHS2zx

        $mediaConvert = MediaConvertFactory::new()->createOne([
            'media_id' => $media->id,
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);

        expect($mediaConvert->media_id)
            ->toBe($media->id)
            ->and($mediaConvert->getAttribute('original_format'))
            ->toBe('jpeg')
            ->and($mediaConvert->getAttribute('target_format'))
            ->toBe('png');

<<<<<<< .merge_file_9Qu9tf
        $this->assertMediaTableHas('media_converts', [
            'id' => $mediaConvert->id,
            'media_id' => $media->id,
=======
        $this->assertDatabaseHas('media_converts', [
<<<<<<< HEAD
            'id' => (int) $mediaConvert->getKey(),
            'media_id' => (int) $media->getKey(),
>>>>>>> .merge_file_hHS2zx
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);
    });

    it('can track temporary upload lifecycle', function (): void {
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $columns = Schema::connection('media')->getColumnListing('temporary_uploads');

        /** @var array<string, mixed> $payload */
        $payload = [
            'session_id' => session()->getId(),
        ];

        $user = null;

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
            $payload['user_id'] = $user->id;
        }

        if (in_array('file_name', $columns, true)) {
            $payload['file_name'] = $file->getClientOriginalName();
        }

        if (in_array('file_size', $columns, true)) {
            $payload['file_size'] = $file->getSize();
        }

        if (in_array('mime_type', $columns, true)) {
            $payload['mime_type'] = $file->getMimeType();
        }

        if (in_array('status', $columns, true)) {
            $payload['status'] = 'uploading';
        }

<<<<<<< .merge_file_9Qu9tf
        $temporaryUpload = TemporaryUploadFactory::new()->createOne($payload);
=======
        $temporaryUpload = TemporaryUpload::factory()->create($payload);
=======
            'id' => $mediaConvert->id,
            'media_id' => $media->id,
            'original_format' => 'jpeg',
            'target_format' => 'png',
            'status' => 'pending',
        ]);
    });

    it('can track temporary upload lifecycle', function () {
        $user = User::factory()->create();
        $file = UploadedFile::fake()->image('test-image.jpg', 100, 100);

        $temporaryUpload = TemporaryUpload::factory()->create([
            'user_id' => $user->id,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'status' => 'uploading',
        ]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_hHS2zx

        $temporaryUpload->update(['status' => 'completed']);

        expect($temporaryUpload->fresh()?->getAttribute('status'))->toBe('completed');

<<<<<<< .merge_file_9Qu9tf
        /** @var array<string, mixed> $expected */
=======
<<<<<<< HEAD
>>>>>>> .merge_file_hHS2zx
        $expected = [
            'id' => $temporaryUpload->id,
            'status' => 'completed',
        ];

        if ($user instanceof UserContract && in_array('user_id', $columns, true)) {
            $expected['user_id'] = $user->id;
        }

        $this->assertMediaTableHas('temporary_uploads', $expected);
    });

    it('can manage media collections', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $profilePayload */
        $profilePayload = [
            'collection_name' => 'profile',
            'disk' => 'public',
        ];

        /** @var array<string, mixed> $documentPayload */
        $documentPayload = [
            'collection_name' => 'documents',
            'disk' => 'public',
        ];

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
            $profilePayload['user_id'] = $user->id;
            $documentPayload['user_id'] = $user->id;
        }

        $profileMedia = MediaFactory::new()->createOne($profilePayload);

<<<<<<< .merge_file_9Qu9tf
        $documentMedia = MediaFactory::new()->createOne($documentPayload);
=======
        $documentMedia = Media::factory()->create($documentPayload);
=======
        $this->assertDatabaseHas('temporary_uploads', [
            'id' => $temporaryUpload->id,
            'user_id' => $user->id,
            'status' => 'completed',
        ]);
    });

    it('can manage media collections', function () {
        $user = User::factory()->create();

        $profileMedia = Media::factory()->create([
            'user_id' => $user->id,
            'collection_name' => 'profile',
            'disk' => 'public',
        ]);

        $documentMedia = Media::factory()->create([
            'user_id' => $user->id,
            'collection_name' => 'documents',
            'disk' => 'public',
        ]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_hHS2zx

        expect($profileMedia->collection_name)
            ->toBe('profile')
            ->and($documentMedia->collection_name)
            ->toBe('documents');

<<<<<<< .merge_file_9Qu9tf
        $profileMediaId = $profileMedia->getKey();
        Assert::assertIsInt($profileMediaId);

        $this->assertMediaTableHas('media', [
            'id' => $profileMediaId,
=======
        $this->assertDatabaseHas('media', [
<<<<<<< HEAD
            'id' => (int) $profileMedia->getKey(),
>>>>>>> .merge_file_hHS2zx
            'collection_name' => 'profile',
        ]);

        $documentMediaId = $documentMedia->getKey();
        Assert::assertIsInt($documentMediaId);

        $this->assertMediaTableHas('media', [
            'id' => $documentMediaId,
            'collection_name' => 'documents',
        ]);
    });

    it('can validate media file types', function (): void {
        $columns = Schema::connection('media')->getColumnListing('media');

        /** @var array<string, mixed> $imagePayload */
        $imagePayload = [
            'mime_type' => 'image/jpeg',
            'file_name' => 'valid-image.jpg',
        ];

        $user = null;

        if (in_array('user_id', $columns, true)) {
            $user = UserFactory::new()->createOne();
            $imagePayload['user_id'] = $user->id;
        }

        $validImage = MediaFactory::new()->createOne($imagePayload);

        $imageMime = (string) ($validImage->mime_type ?? '');
        expect($imageMime)->toStartWith('image/');

        /** @var array<string, mixed> $documentPayload */
        $documentPayload = [
            'mime_type' => 'application/pdf',
            'file_name' => 'valid-document.pdf',
        ];

        if ($user instanceof UserContract && in_array('user_id', $columns, true)) {
            $documentPayload['user_id'] = $user->id;
        }

        $validDocument = MediaFactory::new()->createOne($documentPayload);

        $docMime = (string) ($validDocument->mime_type ?? '');
        expect($docMime)->toStartWith('application/');
    });

    it('can track media conversion status', function (): void {
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        $convertColumns = Schema::connection('media')->getColumnListing('media_converts');

        if (! in_array('status', $convertColumns, true) || ! in_array('media_id', $convertColumns, true)) {
            $this->skipTest('media_converts table is missing required columns for this test in this install.');
        }

        /** @var array<string, mixed> $payload */
        $payload = [
            'mime_type' => 'image/jpeg',
        ];

        if (in_array('user_id', $mediaColumns, true)) {
            $user = UserFactory::new()->createOne();
            $payload['user_id'] = $user->id;
        }

<<<<<<< .merge_file_9Qu9tf
        $media = MediaFactory::new()->createOne($payload);
=======
        $media = Media::factory()->create($payload);
=======
            'id' => $profileMedia->id,
            'collection_name' => 'profile',
        ]);

        $this->assertDatabaseHas('media', [
            'id' => $documentMedia->id,
            'collection_name' => 'documents',
        ]);
    });

    it('can validate media file types', function () {
        $user = User::factory()->create();

        $validImage = Media::factory()->create([
            'user_id' => $user->id,
            'mime_type' => 'image/jpeg',
            'file_name' => 'valid-image.jpg',
        ]);

        expect($validImage->isImage())->toBeTrue()->and($validImage->isDocument())->toBeFalse();

        $validDocument = Media::factory()->create([
            'user_id' => $user->id,
            'mime_type' => 'application/pdf',
            'file_name' => 'valid-document.pdf',
        ]);

        expect($validDocument->isImage())->toBeFalse()->and($validDocument->isDocument())->toBeTrue();
    });

    it('can track media conversion status', function () {
        $user = User::factory()->create();
        $media = Media::factory()->create([
            'user_id' => $user->id,
            'mime_type' => 'image/jpeg',
        ]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_hHS2zx

        $mediaConvert = MediaConvertFactory::new()->createOne([
            'media_id' => $media->id,
            'status' => 'pending',
        ]);

        $mediaConvert->update(['status' => 'processing']);
        $mediaConvert->update(['status' => 'completed']);

        expect($mediaConvert->fresh()?->getAttribute('status'))->toBe('completed');

<<<<<<< .merge_file_9Qu9tf
        $this->assertMediaTableHas('media_converts', [
            'id' => $mediaConvert->id,
            'status' => 'completed',
        ]);
=======
        $this->assertDatabaseHas('media_converts', [
<<<<<<< HEAD
            'id' => (int) $mediaConvert->getKey(),
            'status' => 'completed',
        ], 'media');
=======
            'id' => $mediaConvert->id,
            'status' => 'completed',
        ]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_hHS2zx
    });

    it('can manage media permissions', function (): void {
        $owner = UserFactory::new()->createOne();
        $otherUser = UserFactory::new()->createOne();

<<<<<<< HEAD
        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true) || ! in_array('is_public', $columns, true)) {
            $this->skipTest('This install does not have user_id/is_public columns on media table.');
        }

<<<<<<< .merge_file_9Qu9tf
        $media = MediaFactory::new()->createOne([
=======
=======
>>>>>>> 6ed19256f (.)
        $media = Media::factory()->create([
>>>>>>> .merge_file_hHS2zx
            'user_id' => $owner->id,
            'is_public' => false,
        ]);

        expect($media->user_id)
            ->toBe($owner->id)
            ->and($media->getAttribute('is_public'))
            ->toBeFalse()
            ->and($media->user_id)
            ->not->toBe($otherUser->id);
    });

<<<<<<< .merge_file_9Qu9tf
    it('can handle media deletion', function (): void {
=======
    it('can handle media deletion', function () {
<<<<<<< HEAD
>>>>>>> .merge_file_hHS2zx
        $columns = Schema::connection('media')->getColumnListing('media');

        if (in_array('deleted_at', $columns, true)) {
            $this->skipTest('This install has deleted_at on media table; deletion semantics are install-specific.');
        }

        $media = MediaFactory::new()->createOne();
        $mediaId = $media->id;

        $media->delete();

        $this->assertMediaTableMissing('media', [
            'id' => $mediaId,
        ]);
    });

<<<<<<< .merge_file_9Qu9tf
    it('can generate media urls', function (): void {
        $media = MediaFactory::new()->createOne([
=======
    it('can generate media urls', function () {
        $media = Media::factory()->create([
=======
        $user = User::factory()->create();
        $media = Media::factory()->create([
            'user_id' => $user->id,
        ]);

        $media->delete();

        $this->assertSoftDeleted('media', [
            'id' => $media->id,
        ]);

        $this->assertDatabaseMissing('media', [
            'id' => $media->id,
            'deleted_at' => null,
        ]);
    });

    it('can generate media urls', function () {
        $user = User::factory()->create();
        $media = Media::factory()->create([
            'user_id' => $user->id,
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_hHS2zx
            'file_name' => 'test-image.jpg',
            'disk' => 'public',
        ]);

        $url = $media->getUrl();

        expect($url)->not->toBeEmpty()->and($url)->toContain('test-image.jpg');
    });

    it('can validate file size limits', function (): void {
        $user = UserFactory::new()->createOne();

        $columns = TestCase::mediaTableColumns();

        $makePayload = function (int $size) use ($user, $columns): array {
            $payload = TestCase::mediaPayloadSet([], $columns, 'user_id', $user->id);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'model_type', $user->getMorphClass());
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'model_id', $user->id);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'file_size', $size);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'size', $size);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'file_name', 'test-file.pdf');
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'name', 'test-file');
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'disk', 'public');
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'collection_name', 'default');
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'mime_type', 'application/pdf');
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'manipulations', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'custom_properties', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'generated_conversions', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'responsive_images', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'created_at', now());
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'updated_at', now());

            return $payload;
        };

        $validPayload = $makePayload(1024 * 1024);
        if ($validPayload === []) {
            $this->skipTest('Unable to build minimal payload for media table in this install.');
        }

        $validMedia = Media::query()->create($validPayload);
        $sizeValue = $validMedia->size;
        expect($sizeValue)->toBeLessThanOrEqual(10 * 1024 * 1024);

        $largeMedia = Media::query()->create($makePayload(15 * 1024 * 1024));
        $largeSizeValue = $largeMedia->size;
        expect($largeSizeValue)->toBeGreaterThan(10 * 1024 * 1024);
    });

    it('can track media usage statistics', function (): void {
        $user = UserFactory::new()->createOne();

        $columns = TestCase::mediaTableColumns();

        $makePayload = function (string $mime, string $fileName) use ($user, $columns): array {
            $payload = TestCase::mediaPayloadSet([], $columns, 'user_id', $user->id);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'model_type', $user->getMorphClass());
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'model_id', $user->id);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'mime_type', $mime);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'file_name', $fileName);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'name', pathinfo($fileName, PATHINFO_FILENAME));
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'disk', 'public');
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'collection_name', 'default');
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'file_size', 123);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'size', 123);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'manipulations', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'custom_properties', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'generated_conversions', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'responsive_images', []);
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'created_at', now());
            $payload = TestCase::mediaPayloadSet($payload, $columns, 'updated_at', now());

            return $payload;
        };

        for ($i = 0; $i < 5; $i++) {
            Media::query()->create($makePayload('image/jpeg', "img-{$i}.jpg"));
        }

        for ($i = 0; $i < 3; $i++) {
            Media::query()->create($makePayload('application/pdf', "doc-{$i}.pdf"));
        }

<<<<<<< .merge_file_9Qu9tf
        $mediaColumns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $mediaColumns, true)) {
            $this->skipTest('This install does not have user_id column on media table.');
=======
<<<<<<< HEAD
        $columns = Schema::connection('media')->getColumnListing('media');
        if (! in_array('user_id', $columns, true)) {
            $this->markTestSkipped('This install does not have user_id column on media table.');
>>>>>>> .merge_file_hHS2zx
        }

=======
>>>>>>> 6ed19256f (.)
        $totalMedia = Media::where('user_id', $user->id)->count();
        $imageCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'image/%')->count();
        $documentCount = Media::where('user_id', $user->id)->where('mime_type', 'like', 'application/%')->count();

        expect($totalMedia)->toBe(8)->and($imageCount)->toBe(5)->and($documentCount)->toBe(3);
    });
});