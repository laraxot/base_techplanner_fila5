<?php

declare(strict_types=1);

namespace Themes\Sixteen\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $service_id
 * @property int|null $office_id
 * @property int|null $citizen_id
 * @property Carbon|null $appointment_date
 * @property Carbon|null $start_time
 * @property Carbon|null $end_time
 * @property string $status
 * @property string|null $purpose
 * @property string|null $notes
 * @property array|null $required_documents
 * @property string|null $confirmation_code
 * @property bool $reminder_sent
 * @property string|null $cancellation_reason
 * @property array|null $metadata
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read User|null $user
 * @property-read User|null $citizen
 * @property-read self|null $office
 * @property-read self|null $service
 */
class Appointment extends Model
{
    use HasFactory, SoftDeletes;

/**
     * Stati appuntamento conformi AGID
     */
    public const STATUS_PENDING = 'pending';      // In attesa di conferma

    public const STATUS_CONFIRMED = 'confirmed';  // Confermato

    public const STATUS_COMPLETED = 'completed';  // Completato

    public const STATUS_CANCELLED = 'cancelled';  // Cancellato

    public const STATUS_NO_SHOW = 'no_show';      // Non presentato

    /**
     * Tipi di servizio supportati
     */
    public const SERVICE_ANAGRAFE = 'anagrafe';

    public const SERVICE_TRIBUTI = 'tributi';

    public const SERVICE_SUAP = 'suap';

    public const SERVICE_URP = 'urp';

    public const SERVICE_OTHER = 'other';
     * Verifica se è necessario inviare promemoria
     */
    public function needsReminder(): bool
    {
        return ! $this->reminder_sent
            && $this->status === self::STATUS_CONFIRMED
            && $this->appointment_date->isTomorrow()
            && now()->hour < 18; // Invio solo prima delle 18
    }

    /**
/**
     * Formatta l'orario per display
     */
    protected function timeSlot(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->start_time->format('H:i').' - '.$this->end_time->format('H:i')
        );
    }

    /**
     * Durata appuntamento in minuti
     */
    protected function duration(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->start_time->diffInMinutes($this->end_time)
        );
    }

    /**
     * Eventi del modello
     */
    protected static function booted(): void
    {
        static::creating(function ($appointment): void {
            if (empty($appointment->confirmation_code)) {
                $appointment->confirmation_code = self::generateConfirmationCode();
            }
        });

        static::updating(function ($appointment): void {
            if ($appointment->isDirty('status') && $appointment->status === self::STATUS_CANCELLED) {
                $appointment->cancelled_at = now();
            }
        });
    }
}
