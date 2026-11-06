<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Media\Models\Media;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * Modules\Notify\Models\Contact.
 *
 * @property-read ProfileContract|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read ProfileContract|null $updater
 *
 * @method static Builder<static>|Contact newModelQuery()
 * @method static Builder<static>|Contact newQuery()
 * @method static Builder<static>|Contact query()
 *
 * @property string $id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $contact_type
 * @property string|null $value
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $user_id
 * @property string|null $verified_at
 * @property string|null $token
 * @property int|null $sms_count
 * @property string|null $sms_status_code
 * @property string|null $sms_status_txt
 * @property Carbon|null $sms_sent_at
 * @property Carbon|null $mail_sent_at
 * @property int|null $mail_count
 * @property int|null $usesleft
 * @property int|null $order_column
 * @property int|null $duplicate_count
 * @property string|null $attribute_1
 * @property string|null $attribute_2
 * @property string|null $attribute_3
<<<<<<< .merge_file_W1sF0j
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
=======
 * @property string|null $attribute_4
 * @property string|null $attribute_5
 * @property string|null $attribute_6
 * @property string|null $attribute_7
 * @property string|null $attribute_8
 * @property string|null $attribute_9
 * @property string|null $attribute_10
 * @property string|null $attribute_11
 * @property string|null $attribute_12
 * @property string|null $attribute_13
 * @property string|null $attribute_14
 * @property string|null $usesleft
 * @property string|null $sms_status_code
 * @property string|null $sms_status_txt
 * @property int|null $duplicate_count
 * @property int|null $order_column
 *
 * @method static ContactFactory factory($count = null, $state = [])
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @method static Builder|Contact whereContactType($value)
 * @method static Builder|Contact whereCreatedAt($value)
 * @method static Builder|Contact whereCreatedBy($value)
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereModelId($value)
 * @method static Builder|Contact whereModelType($value)
 * @method static Builder|Contact whereLastName($value)
 * @method static Builder|Contact whereMailCount($value)
 * @method static Builder|Contact whereMailSentAt($value)
 * @method static Builder|Contact whereMobilePhone($value)
 * @method static Builder|Contact whereOrderColumn($value)
 * @method static Builder|Contact whereSmsCount($value)
 * @method static Builder|Contact whereSmsSentAt($value)
 * @method static Builder|Contact whereSmsStatusCode($value)
 * @method static Builder|Contact whereSmsStatusTxt($value)
 * @method static Builder|Contact whereSurveyPdfId($value)
 * @method static Builder|Contact whereToken($value)
 * @method static Builder|Contact whereUpdatedAt($value)
 * @method static Builder|Contact whereUpdatedBy($value)
 * @method static Builder|Contact whereUserId($value)
 * @method static Builder|Contact whereValue($value)
 * @method static Builder|Contact whereVerifiedAt($value)
 *
 * @mixin Eloquent
 *
 * @property string|null $email
 * @property string|null $mobile_phone
 *
 * @method static Builder|Contact whereAttribute1($value)
 * @method static Builder|Contact whereAttribute10($value)
 * @method static Builder|Contact whereAttribute11($value)
 * @method static Builder|Contact whereAttribute12($value)
 * @method static Builder|Contact whereAttribute13($value)
 * @method static Builder|Contact whereAttribute14($value)
 * @method static Builder|Contact whereAttribute2($value)
 * @method static Builder|Contact whereAttribute3($value)
 * @method static Builder|Contact whereAttribute4($value)
 * @method static Builder|Contact whereAttribute5($value)
 * @method static Builder|Contact whereAttribute6($value)
 * @method static Builder|Contact whereAttribute7($value)
 * @method static Builder|Contact whereAttribute8($value)
 * @method static Builder|Contact whereAttribute9($value)
 * @method static Builder|Contact whereDuplicateCount($value)
 * @method static Builder|Contact whereEmail($value)
 * @method static Builder|Contact whereFirstName($value)
 * @method static Builder|Contact whereUsesleft($value)
 *
<<<<<<< HEAD
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
=======
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
>>>>>>> 6ed19256f (.)
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
>>>>>>> .merge_file_l4GHaW
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|Contact whereContactType($value)
 * @method static Builder<static>|Contact whereCreatedAt($value)
 * @method static Builder<static>|Contact whereCreatedBy($value)
 * @method static Builder<static>|Contact whereDeletedAt($value)
 * @method static Builder<static>|Contact whereDeletedBy($value)
 * @method static Builder<static>|Contact whereId($value)
 * @method static Builder<static>|Contact whereModelId($value)
 * @method static Builder<static>|Contact whereModelType($value)
 * @method static Builder<static>|Contact whereToken($value)
 * @method static Builder<static>|Contact whereUpdatedAt($value)
 * @method static Builder<static>|Contact whereUpdatedBy($value)
 * @method static Builder<static>|Contact whereUserId($value)
 * @method static Builder<static>|Contact whereValue($value)
 * @method static Builder<static>|Contact whereVerifiedAt($value)
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class Contact extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'model_id',
        'model_type',
        'contact_type',
        'value',
        'verified_at',
        'updated_at',
        'created_at',
        'updated_by',
        'created_by',
        'user_id',
        'token',
        'first_name',
        'last_name',
        'sms_sent_at',
        'sms_count',
        'mail_sent_at',
        'mail_count',
        'sms_status_code',
        'sms_status_txt',
        'usesleft',
        'order_column',
        'duplicate_count',
        'attribute_1',
        'attribute_2',
        'attribute_3',
        'attribute_4',
        'attribute_5',
        'attribute_6',
        'attribute_7',
        'attribute_8',
        'attribute_9',
        'attribute_10',
        'attribute_11',
        'attribute_12',
        'attribute_13',
        'attribute_14'];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            // 'date_start' => 'datetime:Y-m-d\TH:i',
            // 'date_end' => 'datetime:Y-m-d\TH:i',
            'model_id' => 'string',
            'user_id' => 'string',
            'mail_sent_at' => 'datetime',
            'sms_sent_at' => 'datetime'];
    }
}
