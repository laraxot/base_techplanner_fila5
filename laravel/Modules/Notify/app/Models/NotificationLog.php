<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

<<<<<<< HEAD
=======
use Carbon\Carbon;
>>>>>>> 6ed19256f (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Modules\Media\Models\Media;
<<<<<<< .merge_file_HqgtJV
use Modules\Notify\Enums\NotificationLogStatusEnum;
use Modules\Notify\Models\Traits\NotificationLogRelations;
=======
=======
use Modules\Media\Models\Media;
use Modules\Notify\Database\Factories\NotificationLogFactory;
use Modules\Notify\Enums\NotificationLogStatusEnum;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_rv3OiT
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
<<<<<<< .merge_file_HqgtJV
=======
<<<<<<< HEAD
 * @property string|null $template_id
 * @property string|null $notifiable_type
 * @property string|null $notifiable_id
 * @property string|null $channel
 * @property string|null $status
 * @property string|null $status_message
 * @property array<string, mixed>|null $data
 * @property array<string, mixed>|null $metadata
 *
 * @method static Builder<static> where(string $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static static|null find(mixed $id, array|string $columns = ['*'])
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $channels
 * @property Carbon $sent_at
 * @property string|null $error
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
=======
 * Modello per il logging delle notifiche.
 *
 * @property int $id
 * @property int|null $template_id
 * @property string $recipient_type
 * @property int $recipient_id
 * @property string $content
 * @property array $data
 * @property array $channels
 * @property NotificationLogStatusEnum $status
 * @property Carbon|null $sent_at
 * @property Carbon|null $delivered_at
 * @property Carbon|null $opened_at
 * @property Carbon|null $clicked_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read NotificationTemplate|null $template
 *
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $title
 * @property string|null $error
 *
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_rv3OiT
 * @property-read ProfileContract|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
<<<<<<< .merge_file_HqgtJV
 * @property-read Model $notifiable
=======
 * @property-read Model|\Eloquent $notifiable
<<<<<<< HEAD
>>>>>>> .merge_file_rv3OiT
 * @property-read NotificationTemplate|null $template
 * @property-read ProfileContract|null $updater
 *
 * @method static Builder<static>|NotificationLog forChannel(string $channel)
 * @method static Builder<static>|NotificationLog forNotifiable(\Illuminate\Database\Eloquent\Model $notifiable)
=======
 * @property-read ProfileContract|null $updater
 *
 * @method static NotificationLogFactory factory($count = null, $state = [])
 * @method static Builder<static>|NotificationLog forNotifiable(Model $notifiable)
 * @method static Builder<static>|NotificationLog forTemplate(int $templateId)
>>>>>>> 6ed19256f (.)
 * @method static Builder<static>|NotificationLog newModelQuery()
 * @method static Builder<static>|NotificationLog newQuery()
 * @method static Builder<static>|NotificationLog query()
 * @method static Builder<static>|NotificationLog withStatus(NotificationLogStatusEnum $status)
 *
 * @property string $id
 * @property string|null $template_id
 * @property string $notifiable_type
 * @property string $notifiable_id
 * @property string $channel
 * @property NotificationLogStatusEnum $status
 * @property string|null $status_message
 * @property array<array-key, mixed>|null $data
 * @property array<array-key, mixed>|null $metadata
 * @property string|null $tenant_id
 * @property Carbon|null $sent_at
 * @property Carbon|null $delivered_at
 * @property Carbon|null $failed_at
 * @property Carbon|null $opened_at
 * @property Carbon|null $clicked_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|NotificationLog whereChannel($value)
 * @method static Builder<static>|NotificationLog whereClickedAt($value)
 * @method static Builder<static>|NotificationLog whereCreatedAt($value)
 * @method static Builder<static>|NotificationLog whereCreatedBy($value)
 * @method static Builder<static>|NotificationLog whereData($value)
 * @method static Builder<static>|NotificationLog whereDeliveredAt($value)
 * @method static Builder<static>|NotificationLog whereFailedAt($value)
 * @method static Builder<static>|NotificationLog whereId($value)
 * @method static Builder<static>|NotificationLog whereMetadata($value)
 * @method static Builder<static>|NotificationLog whereNotifiableId($value)
 * @method static Builder<static>|NotificationLog whereNotifiableType($value)
 * @method static Builder<static>|NotificationLog whereOpenedAt($value)
 * @method static Builder<static>|NotificationLog whereSentAt($value)
 * @method static Builder<static>|NotificationLog whereStatus($value)
 * @method static Builder<static>|NotificationLog whereStatusMessage($value)
 * @method static Builder<static>|NotificationLog whereTemplateId($value)
 * @method static Builder<static>|NotificationLog whereTenantId($value)
 * @method static Builder<static>|NotificationLog whereUpdatedAt($value)
<<<<<<< .merge_file_HqgtJV
 * @method static Builder<static>|NotificationLog whereUpdatedBy($value)
=======
<<<<<<< HEAD
 * @method static Builder<static>|NotificationLog withStatus(string $status)
>>>>>>> .merge_file_rv3OiT
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class NotificationLog extends BaseModel
{
    use NotificationLogRelations;

    protected $table = 'notification_logs';

    protected $fillable = [
        'template_id',
        'notifiable_type',
        'notifiable_id',
        'channel',
        'status',
        'status_message',
        'data',
        'metadata',
        'sent_at',
        'delivered_at',
        'failed_at',
        'opened_at',
        'clicked_at',
        'tenant_id'];

<<<<<<< .merge_file_HqgtJV
    /** @return MorphTo<Model, $this> */

    /** @return BelongsTo<NotificationTemplate, $this> */
=======
=======
 * @method static Builder<static>|NotificationLog withStatus(NotificationLogStatusEnum $status)
 *
 * @mixin \Eloquent
 */
final class NotificationLog extends BaseModel
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'template_id',
        'recipient_id',
        'recipient_type',
        'content',
        'data',
        'channels',
        'status',
        'sent_at',
        'delivered_at',
        'opened_at',
    ];

    /**
     * Ottiene il template associato a questo log.
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(NotificationTemplate::class);
    }

    /**
     * Ottiene il notifiable associato a questo log.
     */
>>>>>>> 6ed19256f (.)
    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

<<<<<<< HEAD
    public function template(): BelongsTo
    {
        return $this->belongsTo(NotificationTemplate::class, 'template_id');
    }
>>>>>>> .merge_file_rv3OiT

    /**
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeWithStatus(Builder $query, NotificationLogStatusEnum $status): Builder
    {
        return $query->where('status', $status->value);
    }

    /**
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeForChannel(Builder $query, string $channel): Builder
    {
        return $query->where('channel', $channel);
    }

    /**
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeForNotifiable(Builder $query, Model $notifiable): Builder
    {
        return $query
            ->where('notifiable_type', $notifiable::class)
            ->where('notifiable_id', $notifiable->getKey());
    }

    public function markAsOpened(): self
    {
        $this->update([
            'status' => NotificationLogStatusEnum::OPENED->value,
            'opened_at' => now()]);

        return $this;
    }

    public function markAsClicked(): self
    {
        $this->update([
            'status' => NotificationLogStatusEnum::CLICKED->value,
            'clicked_at' => now()]);

        return $this;
    }

    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'status' => NotificationLogStatusEnum::class,
            'data' => 'array',
            'metadata' => 'array',
            'sent_at' => 'datetime',
            'delivered_at' => 'datetime',
            'failed_at' => 'datetime',
            'opened_at' => 'datetime',
<<<<<<< .merge_file_HqgtJV
            'clicked_at' => 'datetime']);
=======
            'clicked_at' => 'datetime',
        ]);
=======
    /**
     * Scope per filtrare i log per notifiable.
     */
    public function scopeForNotifiable(
        Builder $query,
        Model $notifiable,
    ): Builder {
        return $query->where('recipient_type', $notifiable->getMorphClass())->where(
            'recipient_id',
            $notifiable->getKey(),
        );
    }

    /**
     * Scope per filtrare i log per stato.
     */
    public function scopeWithStatus(
        Builder $query,
        NotificationLogStatusEnum $status,
    ): Builder {
        return $query->where('status', $status);
    }

    /**
     * Scope per filtrare i log per template.
     */
    public function scopeForTemplate(
        Builder $query,
        int $templateId,
    ): Builder {
        return $query->where('template_id', $templateId);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'data' => 'array',
            'channels' => 'array',
            'sent_at' => 'datetime',
            'delivered_at' => 'datetime',
            'opened_at' => 'datetime',
            'clicked_at' => 'datetime',
            'status' => NotificationLogStatusEnum::class,
        ];
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_rv3OiT
    }
}
