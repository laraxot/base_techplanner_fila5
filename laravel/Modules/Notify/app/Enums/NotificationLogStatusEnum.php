<?php

declare(strict_types=1);

namespace Modules\Notify\Enums;

<<<<<<< HEAD
enum NotificationLogStatusEnum: string
{
=======
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

/**
 * Enum for notification log statuses.
 *
 * Uses EnumTrait for getLabel(), getIcon(), getColor().
 * Configure values in: Modules/Notify/lang/{locale}/enums.php
 */
enum NotificationLogStatusEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;

>>>>>>> dev
    case PENDING = 'pending';
    case SENT = 'sent';
    case DELIVERED = 'delivered';
    case FAILED = 'failed';
    case OPENED = 'opened';
    case CLICKED = 'clicked';

<<<<<<< HEAD
    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'In attesa',
            self::SENT => 'Inviato',
            self::DELIVERED => 'Consegnato',
            self::FAILED => 'Fallito',
            self::OPENED => 'Aperto',
            self::CLICKED => 'Cliccato',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'gray',
            self::SENT => 'blue',
            self::DELIVERED => 'green',
            self::FAILED => 'red',
            self::OPENED => 'yellow',
            self::CLICKED => 'purple',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::PENDING => 'heroicon-o-clock',
            self::SENT => 'heroicon-o-paper-airplane',
            self::DELIVERED => 'heroicon-o-check-circle',
            self::FAILED => 'heroicon-o-x-circle',
            self::OPENED => 'heroicon-o-eye',
            self::CLICKED => 'heroicon-o-cursor-arrow-rays',
        };
    }

=======
>>>>>>> dev
    public function isCompleted(): bool
    {
        return match ($this) {
            self::DELIVERED, self::OPENED, self::CLICKED => true,
            default => false,
        };
    }

    public function isFailed(): bool
    {
        return $this === self::FAILED;
    }

    public function isPending(): bool
    {
        return $this === self::PENDING;
    }
}
