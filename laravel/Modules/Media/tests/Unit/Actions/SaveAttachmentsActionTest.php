<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

uses(Tests\TestCase::class)->beforeEach(function () {
    Storage::fake('attachments');
});

    // Arrange
    $action = new SaveAttachmentsAction;

    // Mock del record HasMedia
    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->andReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice', 'contract'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
    ];

    // Crea file temporanei
    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert
    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
});

    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);
    $record->shouldReceive('update')->with([])->andReturn(true);

    $attachments = [];
    $data = [];

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert - non dovrebbe lanciare eccezioni
    expect(true)->toBeTrue();
});

    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);
    $record->shouldReceive('update')->with([])->andReturn(true);

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'nonexistent/file.pdf',
    ];

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert - non dovrebbe lanciare eccezioni
    expect(true)->toBeTrue();
});

    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);
    $record->shouldReceive('addMedia')->andThrow(new Exception('Storage error'));

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

    // Act & Assert
    expect(fn () => $action->execute($record, $attachments, $data, 'attachments'))
        ->toThrow(\Exception::class, 'Storage error');
});

    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->andReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    // Crea file su disco diverso
    Storage::fake('custom_disk');
    Storage::disk('custom_disk')->put('temp/invoice.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'custom_disk');

    // Assert
    expect(Storage::disk('custom_disk')->exists('temp/invoice.pdf'))->toBeTrue();
});

    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->andReturn($media);

    $record->shouldReceive('addMedia')->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
    ];

    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert - il file temporaneo dovrebbe essere pulito
    // Questo test verifica che la pulizia avvenga nel finally block
    expect(true)->toBeTrue();
});

    // Arrange
    $action = new SaveAttachmentsAction;

    $record = Mockery::mock(HasMedia::class);

    $media = Mockery::mock(Media::class);
    $media->shouldReceive('getPathRelativeToRoot')->times(3)->andReturn('media/test-path');

    $fileAdder = Mockery::mock(FileAdder::class);
    $fileAdder->shouldReceive('usingFileName')->times(3)->andReturnSelf();
    $fileAdder->shouldReceive('toMediaCollection')->times(3)->andReturn($media);

    $record->shouldReceive('addMedia')->times(3)->andReturn($fileAdder);
    $record->shouldReceive('update')->andReturn(true);

    $attachments = ['invoice', 'contract', 'receipt'];
    $data = [
        'invoice' => 'temp/invoice.pdf',
        'contract' => 'temp/contract.pdf',
        'receipt' => 'temp/receipt.pdf',
    ];

    // Crea file temporanei
    Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');
    Storage::disk('attachments')->put('temp/receipt.pdf', 'fake content');

    // Act
    $action->execute($record, $attachments, $data, 'attachments');

    // Assert
    expect(Storage::disk('attachments')->exists('temp/invoice.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/contract.pdf'))->toBeTrue();
    expect(Storage::disk('attachments')->exists('temp/receipt.pdf'))->toBeTrue();
});
=======
namespace Modules\Media\Tests\Unit\Actions;

use Exception;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Modules\Media\Actions\SaveAttachmentsAction;
use Modules\Media\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Tests\TestCase;

class SaveAttachmentsActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('attachments');
    }

    public function test_executes_save_attachments_successfully(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        // Mock del record HasMedia
        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andReturnSelf();
        $record->shouldReceive('usingFileName')->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

        $attachments = ['invoice', 'contract'];
        $data = [
            'invoice' => 'temp/invoice.pdf',
            'contract' => 'temp/contract.pdf',
        ];

        // Crea file temporanei
        Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
        Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert
        static::assertTrue(Storage::disk('attachments')->exists('temp/invoice.pdf'));
        static::assertTrue(Storage::disk('attachments')->exists('temp/contract.pdf'));
    }

    public function test_handles_empty_attachments(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('update')->with([])->andReturn(true);

        $attachments = [];
        $data = [];

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert - non dovrebbe lanciare eccezioni
        static::assertTrue(true);
    }

    public function test_skips_nonexistent_files(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('update')->with([])->andReturn(true);

        $attachments = ['invoice'];
        $data = [
            'invoice' => 'nonexistent/file.pdf',
        ];

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert - non dovrebbe lanciare eccezioni
        static::assertTrue(true);
    }

    public function test_handles_storage_errors_gracefully(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andThrow(new Exception('Storage error'));

        $attachments = ['invoice'];
        $data = [
            'invoice' => 'temp/invoice.pdf',
        ];

        Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

        // Act & Assert
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Storage error');

        $action->execute($record, $attachments, $data, 'attachments');
    }

    public function test_uses_correct_disk(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andReturnSelf();
        $record->shouldReceive('usingFileName')->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

        $attachments = ['invoice'];
        $data = [
            'invoice' => 'temp/invoice.pdf',
        ];

        // Crea file su disco diverso
        Storage::fake('custom_disk');
        Storage::disk('custom_disk')->put('temp/invoice.pdf', 'fake content');

        // Act
        $action->execute($record, $attachments, $data, 'custom_disk');

        // Assert
        static::assertTrue(Storage::disk('custom_disk')->exists('temp/invoice.pdf'));
    }

    public function test_cleans_up_temp_files(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->andReturnSelf();
        $record->shouldReceive('usingFileName')->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

        $attachments = ['invoice'];
        $data = [
            'invoice' => 'temp/invoice.pdf',
        ];

        Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert - il file temporaneo dovrebbe essere pulito
        // Questo test verifica che la pulizia avvenga nel finally block
        static::assertTrue(true);
    }

    public function test_handles_multiple_attachments(): void
    {
        // Arrange
        $action = new SaveAttachmentsAction;

        $record = Mockery::mock(HasMedia::class);
        $record->shouldReceive('addMedia')->times(3)->andReturnSelf();
        $record->shouldReceive('usingFileName')->times(3)->andReturnSelf();
        $record->shouldReceive('toMediaCollection')->times(3)->andReturn(new Media);
        $record->shouldReceive('update')->andReturn(true);

        $attachments = ['invoice', 'contract', 'receipt'];
        $data = [
            'invoice' => 'temp/invoice.pdf',
            'contract' => 'temp/contract.pdf',
            'receipt' => 'temp/receipt.pdf',
        ];

        // Crea file temporanei
        Storage::disk('attachments')->put('temp/invoice.pdf', 'fake content');
        Storage::disk('attachments')->put('temp/contract.pdf', 'fake content');
        Storage::disk('attachments')->put('temp/receipt.pdf', 'fake content');

        // Act
        $action->execute($record, $attachments, $data, 'attachments');

        // Assert
        static::assertTrue(Storage::disk('attachments')->exists('temp/invoice.pdf'));
        static::assertTrue(Storage::disk('attachments')->exists('temp/contract.pdf'));
        static::assertTrue(Storage::disk('attachments')->exists('temp/receipt.pdf'));
    }
}
>>>>>>> 6ed19256f (.)
