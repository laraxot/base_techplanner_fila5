<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Traits;

use Modules\Notify\Traits\HasNotificationTracking;

final class NotifyTrackingDummy
{
    use HasNotificationTracking;

    private string $trackingId = '';

    public function addTrackingPublic(string $html, string $trackingId): string
    {
        $this->trackingId = $trackingId;

        return $this->addTracking($html, $trackingId);
    }

    public function trackingId(): string
    {
        return $this->trackingId;
    }

    public function trackingEnabled(): bool
    {
        return $this->isTrackingEnabled();
    }
<<<<<<< .merge_file_ulNO8W
}
=======

    public function pixelTrackingEnabled(): bool
    {
        return $this->isPixelTrackingEnabled();
    }

    public function linkTrackingEnabled(): bool
    {
        return $this->isLinkTrackingEnabled();
    }

    public function generatedTrackingId(): string
    {
        return $this->generateTrackingId();
    }
}
>>>>>>> .merge_file_MjKtEa
