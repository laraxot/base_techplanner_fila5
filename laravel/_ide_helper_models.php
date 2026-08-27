<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\AI\Models{
/**
 * Class AiActionProposal.
 *
 * An action the AI proposes to execute on the domain, subject to human
 * confirmation before being executed. Status lifecycle:
 * pending -> confirmed -> executed
 *        \-> cancelled
 *        \-> failed
 *
 * @property-read Profile|null $creator
 * @property-read AiThread|null $thread
 * @property-read Profile|null $updater
 * @method static Builder<static>|AiActionProposal newModelQuery()
 * @method static Builder<static>|AiActionProposal newQuery()
 * @method static Builder<static>|AiActionProposal query()
 * @mixin \Eloquent
 */
	class AiActionProposal extends \Eloquent {}
}

namespace Modules\AI\Models{
/**
 * Class AiMessage.
 *
 * A single message (user|assistant|tool|system) within an AiThread.
 *
 * @property-read Profile|null $creator
 * @property-read AiThread|null $thread
 * @property-read Profile|null $updater
 * @method static Builder<static>|AiMessage newModelQuery()
 * @method static Builder<static>|AiMessage newQuery()
 * @method static Builder<static>|AiMessage query()
 * @mixin \Eloquent
 */
	class AiMessage extends \Eloquent {}
}

namespace Modules\AI\Models{
/**
 * Class AiThread.
 *
 * A persisted conversation thread between a user and the AI assistant.
 *
 * @property-read Profile|null $creator
 * @property-read Collection<int, AiMessage> $messages
 * @property-read int|null $messages_count
 * @property-read Collection<int, AiActionProposal> $proposals
 * @property-read int|null $proposals_count
 * @property-read Collection<int, AiToolLog> $toolLogs
 * @property-read int|null $tool_logs_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|AiThread newModelQuery()
 * @method static Builder<static>|AiThread newQuery()
 * @method static Builder<static>|AiThread query()
 * @mixin \Eloquent
 */
	class AiThread extends \Eloquent {}
}

namespace Modules\AI\Models{
/**
 * Class AiToolLog.
 *
 * Audit trail of tool calls performed by the AI assistant.
 *
 * @property-read Profile|null $creator
 * @property-read AiActionProposal|null $proposal
 * @property-read AiThread|null $thread
 * @property-read Profile|null $updater
 * @method static Builder<static>|AiToolLog newModelQuery()
 * @method static Builder<static>|AiToolLog newQuery()
 * @method static Builder<static>|AiToolLog query()
 * @mixin \Eloquent
 */
	class AiToolLog extends \Eloquent {}
}

namespace Modules\Activity\Models{
/**
 * Class Activity.
 *
 * This class extends the BaseActivity model to represent activities in the application.
 *
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $properties
 * @property-read Model $causer
 * @property-read Model $subject
 * @method static Builder<static>|Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static \Modules\Activity\Database\Factories\ActivityFactory factory($count = null, $state = [])
 * @method static Builder<static>|Activity forBatch(string $batchUuid)
 * @method static Builder<static>|Activity forEvent(\Spatie\Activitylog\Enums\ActivityEvent|string $event)
 * @method static Builder<static>|Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static Builder<static>|Activity hasBatch()
 * @method static Builder<static>|Activity inLog(\BackedEnum|array|string ...$logNames)
 * @method static Builder<static>|Activity newModelQuery()
 * @method static Builder<static>|Activity newQuery()
 * @method static Builder<static>|Activity query()
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property int|null $subject_id
 * @property string|null $causer_type
 * @property string|null $causer_id
 * @property string|null $batch_uuid
 * @property string|null $event
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Activity whereBatchUuid($value)
 * @method static Builder<static>|Activity whereCauserId($value)
 * @method static Builder<static>|Activity whereCauserType($value)
 * @method static Builder<static>|Activity whereCreatedAt($value)
 * @method static Builder<static>|Activity whereCreatedBy($value)
 * @method static Builder<static>|Activity whereDeletedAt($value)
 * @method static Builder<static>|Activity whereDeletedBy($value)
 * @method static Builder<static>|Activity whereDescription($value)
 * @method static Builder<static>|Activity whereEvent($value)
 * @method static Builder<static>|Activity whereId($value)
 * @method static Builder<static>|Activity whereLogName($value)
 * @method static Builder<static>|Activity whereProperties($value)
 * @method static Builder<static>|Activity whereSubjectId($value)
 * @method static Builder<static>|Activity whereSubjectType($value)
 * @method static Builder<static>|Activity whereUpdatedAt($value)
 * @method static Builder<static>|Activity whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Activity extends \Eloquent {}
}

namespace Modules\Activity\Models{
/**
 * Modules\Activity\Models\Snapshot.
 *
 * @method static \Modules\Activity\Database\Factories\SnapshotFactory factory($count = null, $state = [])
 * @method static Builder<static>|Snapshot newModelQuery()
 * @method static Builder<static>|Snapshot newQuery()
 * @method static Builder<static>|Snapshot query()
 * @method static Builder<static>|Snapshot uuid(string $uuid)
 * @property int $id
 * @property string $aggregate_uuid
 * @property int $aggregate_version
 * @property array<array-key, mixed> $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Snapshot whereAggregateUuid($value)
 * @method static Builder<static>|Snapshot whereAggregateVersion($value)
 * @method static Builder<static>|Snapshot whereCreatedAt($value)
 * @method static Builder<static>|Snapshot whereCreatedBy($value)
 * @method static Builder<static>|Snapshot whereId($value)
 * @method static Builder<static>|Snapshot whereState($value)
 * @method static Builder<static>|Snapshot whereUpdatedAt($value)
 * @method static Builder<static>|Snapshot whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Snapshot extends \Eloquent {}
}

namespace Modules\Activity\Models{
/**
 * Class StoredEvent.
 *
 * Represents a stored event in the activity module.
 *
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $meta_data
 * @property-read ShouldBeStored|null $event
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent afterVersion(int $version)
 * @method static EloquentStoredEventCollection<int, static> all($columns = ['*'])
 * @method static \Modules\Activity\Database\Factories\StoredEventFactory factory($count = null, $state = [])
 * @method static EloquentStoredEventCollection<int, static> get($columns = ['*'])
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent lastEvent(string ...$eventClasses)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent newModelQuery()
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent newQuery()
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent query()
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent startingFrom(int $storedEventId)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereAggregateRoot(string $uuid)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEvent(string ...$eventClasses)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent wherePropertyIs(string $property, ?mixed $value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent wherePropertyIsNot(string $property, ?mixed $value)
 * @method static \Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEventQueryBuilder<static>|StoredEvent withMetaDataAttributes()
 * @property int $id
 * @property string|null $aggregate_uuid
 * @property int|null $aggregate_version
 * @property int $event_version
 * @property string $event_class
 * @property array<array-key, mixed> $event_properties
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereAggregateUuid($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereAggregateVersion($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereCreatedAt($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereCreatedBy($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEventClass($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEventProperties($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEventVersion($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereId($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereMetaData($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereUpdatedAt($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class StoredEvent extends \Eloquent {}
}

namespace Modules\Activity\Models{
/**
 * Test model for Activity module tests.
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel query()
 * @mixin \Eloquent
 */
	final class TestModel extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * ---.
 *
 * @property string $id
 * @property array<array-key, mixed>|null $title
 * @property array<array-key, mixed>|null $description
 * @property string|null $slug
 * @property string|null $disk
 * @property array<array-key, mixed>|null $attachment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read Profile|null $creator
 * @property-read array $translatable_columns_from
 * @property-read MediaCollection<int, \Modules\Media\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $translations
 * @property-read Profile|null $updater
 * @method static Builder<static>|Attachment newModelQuery()
 * @method static Builder<static>|Attachment newQuery()
 * @method static Builder<static>|Attachment query()
 * @method static Builder<static>|Attachment whereAttachment($value)
 * @method static Builder<static>|Attachment whereCreatedAt($value)
 * @method static Builder<static>|Attachment whereCreatedBy($value)
 * @method static Builder<static>|Attachment whereDescription($value)
 * @method static Builder<static>|Attachment whereDisk($value)
 * @method static Builder<static>|Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereLocales(string $column, array $locales)
 * @method static Builder<static>|Attachment whereSlug($value)
 * @method static Builder<static>|Attachment whereTitle($value)
 * @method static Builder<static>|Attachment whereUpdatedAt($value)
 * @method static Builder<static>|Attachment whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Attachment extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Conf.
 *
 * @property string $id
 * @property string|null $name
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Conf newModelQuery()
 * @method static Builder<static>|Conf newQuery()
 * @method static Builder<static>|Conf query()
 * @method static Builder<static>|Conf whereId($value)
 * @method static Builder<static>|Conf whereName($value)
 * @mixin \Eloquent
 */
	class Conf extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Menu.
 *
 * @property string $id
 * @property string|null $title
 * @property int|null $parent_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read Collection<int, Menu> $children
 * @property-read int|null $children_count
 * @property-read Profile|null $creator
 * @property-read Menu|null $parent
 * @property-read Profile|null $updater
 * @property-read int $depth
 * @property-read string $path
 * @property-read Collection<int, Menu> $ancestors The model's recursive parents.
 * @property-read int|null $ancestors_count
 * @property-read Collection<int, Menu> $ancestorsAndSelf The model's recursive parents and itself.
 * @property-read int|null $ancestors_and_self_count
 * @property-read Collection<int, Menu> $bloodline The model's ancestors, descendants and itself.
 * @property-read int|null $bloodline_count
 * @property-read Collection<int, Menu> $childrenAndSelf The model's direct children and itself.
 * @property-read int|null $children_and_self_count
 * @property-read Collection<int, Menu> $descendants The model's recursive children.
 * @property-read int|null $descendants_count
 * @property-read Collection<int, Menu> $descendantsAndSelf The model's recursive children and itself.
 * @property-read int|null $descendants_and_self_count
 * @property-read Collection<int, Menu> $parentAndSelf The model's direct parent and itself.
 * @property-read int|null $parent_and_self_count
 * @property-read Menu|null $rootAncestor The model's topmost parent.
 * @property-read Collection<int, Menu> $siblings The parent's other children.
 * @property-read int|null $siblings_count
 * @property-read Collection<int, Menu> $siblingsAndSelf All the parent's children.
 * @property-read int|null $siblings_and_self_count
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Builder<static>|Menu breadthFirst()
 * @method static Builder<static>|Menu depthFirst()
 * @method static Builder<static>|Menu doesntHaveChildren()
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static Builder<static>|Menu getExpressionGrammar()
 * @method static Builder<static>|Menu hasChildren()
 * @method static Builder<static>|Menu hasParent()
 * @method static Builder<static>|Menu isLeaf()
 * @method static Builder<static>|Menu isRoot()
 * @method static Builder<static>|Menu newModelQuery()
 * @method static Builder<static>|Menu newQuery()
 * @method static Builder<static>|Menu query()
 * @method static Builder<static>|Menu tree($maxDepth = null)
 * @method static Builder<static>|Menu treeOf(\Illuminate\Database\Eloquent\Model|callable $constraint, $maxDepth = null)
 * @method static Builder<static>|Menu whereCreatedAt($value)
 * @method static Builder<static>|Menu whereCreatedBy($value)
 * @method static Builder<static>|Menu whereDepth($operator, $value = null)
 * @method static Builder<static>|Menu whereId($value)
 * @method static Builder<static>|Menu whereParentId($value)
 * @method static Builder<static>|Menu whereTitle($value)
 * @method static Builder<static>|Menu whereUpdatedAt($value)
 * @method static Builder<static>|Menu whereUpdatedBy($value)
 * @method static Builder<static>|Menu withGlobalScopes(array $scopes)
 * @method static Builder<static>|Menu withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 * @mixin \Eloquent
 */
	class Menu extends \Eloquent implements \Modules\Xot\Contracts\HasRecursiveRelationshipsContract {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Module.
 *
 * @property string $id
 * @property string|null $name
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Module newModelQuery()
 * @method static Builder<static>|Module newQuery()
 * @method static Builder<static>|Module query()
 * @method static Builder<static>|Module whereId($value)
 * @method static Builder<static>|Module whereName($value)
 * @mixin \Eloquent
 */
	class Module extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Page.
 *
 * @property string|null $id
 * @property array<array-key, mixed>|null $title
 * @property string|null $slug
 * @property array<array-key, mixed>|null $middleware
 * @property string|null $content
 * @property string|null $description
 * @property array<array-key, mixed>|null $blocks
 * @property array<array-key, mixed>|null $content_blocks
 * @property array<array-key, mixed>|null $sidebar_blocks
 * @property array<array-key, mixed>|null $footer_blocks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read Profile|null $creator
 * @property-read array $translatable_columns_from
 * @property-read mixed $translations
 * @property-read Profile|null $updater
 * @method static Builder<static>|Page newModelQuery()
 * @method static Builder<static>|Page newQuery()
 * @method static Builder<static>|Page query()
 * @method static Builder<static>|Page whereBlocks($value)
 * @method static Builder<static>|Page whereContent($value)
 * @method static Builder<static>|Page whereContentBlocks($value)
 * @method static Builder<static>|Page whereCreatedAt($value)
 * @method static Builder<static>|Page whereCreatedBy($value)
 * @method static Builder<static>|Page whereDescription($value)
 * @method static Builder<static>|Page whereFooterBlocks($value)
 * @method static Builder<static>|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereLocales(string $column, array $locales)
 * @method static Builder<static>|Page whereMiddleware($value)
 * @method static Builder<static>|Page whereSidebarBlocks($value)
 * @method static Builder<static>|Page whereSlug($value)
 * @method static Builder<static>|Page whereTitle($value)
 * @method static Builder<static>|Page whereUpdatedAt($value)
 * @method static Builder<static>|Page whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Page extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\PageContent.
 *
 * @property string|null $id
 * @property array<array-key, mixed>|null $name
 * @property string|null $slug
 * @property array<array-key, mixed>|null $blocks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read Profile|null $creator
 * @property-read array $translatable_columns_from
 * @property-read mixed $translations
 * @property-read Profile|null $updater
 * @method static Builder<static>|PageContent newModelQuery()
 * @method static Builder<static>|PageContent newQuery()
 * @method static Builder<static>|PageContent query()
 * @method static Builder<static>|PageContent whereBlocks($value)
 * @method static Builder<static>|PageContent whereCreatedAt($value)
 * @method static Builder<static>|PageContent whereCreatedBy($value)
 * @method static Builder<static>|PageContent whereId($value)
 * @method static Builder<static>|PageContent whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|PageContent whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|PageContent whereLocale(string $column, string $locale)
 * @method static Builder<static>|PageContent whereLocales(string $column, array $locales)
 * @method static Builder<static>|PageContent whereName($value)
 * @method static Builder<static>|PageContent whereSlug($value)
 * @method static Builder<static>|PageContent whereUpdatedAt($value)
 * @method static Builder<static>|PageContent whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class PageContent extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Section.
 *
 * @property string|null $id
 * @property array<array-key, mixed>|null $name
 * @property string|null $slug
 * @property array<array-key, mixed>|null $blocks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read Profile|null $creator
 * @property-read array $translatable_columns_from
 * @property-read mixed $translations
 * @property-read Profile|null $updater
 * @method static Builder<static>|Section newModelQuery()
 * @method static Builder<static>|Section newQuery()
 * @method static Builder<static>|Section query()
 * @method static Builder<static>|Section whereBlocks($value)
 * @method static Builder<static>|Section whereCreatedAt($value)
 * @method static Builder<static>|Section whereCreatedBy($value)
 * @method static Builder<static>|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Section whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Section whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Section whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Section whereLocales(string $column, array $locales)
 * @method static Builder<static>|Section whereName($value)
 * @method static Builder<static>|Section whereSlug($value)
 * @method static Builder<static>|Section whereUpdatedAt($value)
 * @method static Builder<static>|Section whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Section extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class AbsenceRequest.
 *
 * Richiesta di assenza (ferie/permesso/malattia/infortunio) di un dipendente,
 * soggetta ad approvazione/rifiuto da parte di un responsabile.
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property string|null $notes
 * @property string $status
 * @property int|null $decided_by_user_id
 * @property \Illuminate\Support\Carbon|null $decided_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Profile|null $creator
 * @property-read Employee|null $decidedBy
 * @property-read Profile|null $updater
 * @property-read Employee|null $user
 * @method static Builder<static>|AbsenceRequest forUser(int $userId)
 * @method static Builder<static>|AbsenceRequest newModelQuery()
 * @method static Builder<static>|AbsenceRequest newQuery()
 * @method static Builder<static>|AbsenceRequest onlyTrashed()
 * @method static Builder<static>|AbsenceRequest pending()
 * @method static Builder<static>|AbsenceRequest query()
 * @method static Builder<static>|AbsenceRequest withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|AbsenceRequest withoutTrashed()
 * @mixin \Eloquent
 */
	class AbsenceRequest extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class Admin
 *
 * NOTA: Il trait HasFactory è stato rimosso perché già incluso nella catena di ereditarietà (BaseUser -> User -> Admin).
 * Dichiararlo qui è ridondante e può causare warning o confusione.
 * Vedi docs/DRY-model-traits.md
 *
 * @property-read Collection<int, Consent> $activeConsents
 * @property-read int|null $active_consents_count
 * @property-read Collection<int, AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read Collection<int, OauthClient> $clients
 * @property-read int|null $clients_count
 * @property-read Collection<int, Consent> $consents
 * @property-read int|null $consents_count
 * @property-read Team|null $currentTeam
 * @property-read TenantUser|TeamUser|DeviceUser|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Collection<int, User> $all_team_users
 * @property-read string $full_name
 * @property-read string $name
 * @property-read AuthenticationLog|null $latestAuthentication
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, Team> $membershipTeams
 * @property-read int|null $membership_teams_count
 * @property-read DatabaseNotificationCollection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, OauthClient> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Profile|null $profile
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-write mixed $password
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read int|null $socialite_users_count
 * @property-read Collection<int, TeamUser> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Collection<int, Tenant> $tenants
 * @property-read int|null $tenants_count
 * @property-read Collection<int, OauthToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection<int, Treatment> $treatments
 * @property-read int|null $treatments_count
 * @method static Builder<static>|Admin childrenWith(array<int, string> $relations)
 * @method static Builder<static>|Admin childrenWithCount(array<int, string> $relations)
 * @method static \Modules\Employee\Database\Factories\AdminFactory factory($count = null, $state = [])
 * @method static Builder<static>|Admin newModelQuery()
 * @method static Builder<static>|Admin newQuery()
 * @method static Builder<static>|Admin orWhereNotState(string $column, $states)
 * @method static Builder<static>|Admin orWhereState(string $column, $states)
 * @method static Builder<static>|Admin permission($permissions, bool $without = false)
 * @method static Builder<static>|Admin query()
 * @method static Builder<static>|Admin role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Admin team($teams, bool $without = false)
 * @method static Builder<static>|Admin whereNotState(string $column, $states)
 * @method static Builder<static>|Admin whereState(string $column, $states)
 * @method static Builder<static>|Admin withoutPermission($permissions)
 * @method static Builder<static>|Admin withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Admin withoutTeam($teams)
 * @property string $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $lang
 * @property bool $is_active
 * @property bool $is_otp
 * @property \Illuminate\Support\Carbon|null $password_expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $state
 * @method static Builder<static>|Admin whereCreatedAt($value)
 * @method static Builder<static>|Admin whereCreatedBy($value)
 * @method static Builder<static>|Admin whereCurrentTeamId($value)
 * @method static Builder<static>|Admin whereDeletedAt($value)
 * @method static Builder<static>|Admin whereDeletedBy($value)
 * @method static Builder<static>|Admin whereEmail($value)
 * @method static Builder<static>|Admin whereEmailVerifiedAt($value)
 * @method static Builder<static>|Admin whereFirstName($value)
 * @method static Builder<static>|Admin whereId($value)
 * @method static Builder<static>|Admin whereIsActive($value)
 * @method static Builder<static>|Admin whereIsOtp($value)
 * @method static Builder<static>|Admin whereLang($value)
 * @method static Builder<static>|Admin whereLastName($value)
 * @method static Builder<static>|Admin whereName($value)
 * @method static Builder<static>|Admin wherePassword($value)
 * @method static Builder<static>|Admin wherePasswordExpiresAt($value)
 * @method static Builder<static>|Admin whereProfilePhotoPath($value)
 * @method static Builder<static>|Admin whereRememberToken($value)
 * @method static Builder<static>|Admin whereTwoFactorConfirmedAt($value)
 * @method static Builder<static>|Admin whereTwoFactorRecoveryCodes($value)
 * @method static Builder<static>|Admin whereTwoFactorSecret($value)
 * @method static Builder<static>|Admin whereType($value)
 * @method static Builder<static>|Admin whereUpdatedAt($value)
 * @method static Builder<static>|Admin whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
 * @property-read int|null $teams_count
 */
	class Admin extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class Department.
 *
 * @property-read Profile|null $creator
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|Department newModelQuery()
 * @method static Builder<static>|Department newQuery()
 * @method static Builder<static>|Department query()
 * @mixin \Eloquent
 */
	class Department extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class Employee.
 *
 * @property string|null $employee_code
 * @property array<string, mixed>|null $personal_data
 * @property array<string, mixed>|null $contact_data
 * @property array<string, mixed>|null $work_data
 * @property array<string, mixed>|null $documents
 * @property string|null $photo_url
 * @property string|null $status
 * @property int|null $department_id
 * @property string|null $manager_id
 * @property int|null $position_id
 * @property array<string, mixed>|null $salary_data
 * @property-read Collection<int, Consent> $activeConsents
 * @property-read int|null $active_consents_count
 * @property-read Collection<int, AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read Collection<int, OauthClient> $clients
 * @property-read int|null $clients_count
 * @property-read Collection<int, Consent> $consents
 * @property-read int|null $consents_count
 * @property-read Team|null $currentTeam
 * @property-read TenantUser|TeamUser|DeviceUser|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Collection<int, User> $all_team_users
 * @property-read string $full_name
 * @property-read string $name
 * @property-read string $status_label
 * @property-read AuthenticationLog|null $latestAuthentication
 * @property-read Employee|null $manager
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, Team> $membershipTeams
 * @property-read int|null $membership_teams_count
 * @property-read DatabaseNotificationCollection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, OauthClient> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Profile|null $profile
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-write mixed $password
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read int|null $socialite_users_count
 * @property-read Collection<int, Employee> $subordinates
 * @property-read int|null $subordinates_count
 * @property-read Collection<int, TeamUser> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Collection<int, Tenant> $tenants
 * @property-read int|null $tenants_count
 * @property-read Collection<int, OauthToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection<int, Treatment> $treatments
 * @property-read int|null $treatments_count
 * @property-read Collection<int, WorkHour> $workHours
 * @property-read int|null $work_hours_count
 * @method static Builder<static>|Employee childrenWith(array<int, string> $relations)
 * @method static Builder<static>|Employee childrenWithCount(array<int, string> $relations)
 * @method static \Modules\Employee\Database\Factories\EmployeeFactory factory($count = null, $state = [])
 * @method static Builder<static>|Employee newModelQuery()
 * @method static Builder<static>|Employee newQuery()
 * @method static Builder<static>|Employee orWhereNotState(string $column, $states)
 * @method static Builder<static>|Employee orWhereState(string $column, $states)
 * @method static Builder<static>|Employee permission($permissions, bool $without = false)
 * @method static Builder<static>|Employee query()
 * @method static Builder<static>|Employee role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Employee team($teams, bool $without = false)
 * @method static Builder<static>|Employee whereNotState(string $column, $states)
 * @method static Builder<static>|Employee whereState(string $column, $states)
 * @method static Builder<static>|Employee withoutPermission($permissions)
 * @method static Builder<static>|Employee withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Employee withoutTeam($teams)
 * @property string $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property string|null $deleted_at
 * @property string|null $lang
 * @property int $is_active
 * @property int $is_otp
 * @property string|null $password_expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $state
 * @method static Builder<static>|Employee whereCreatedAt($value)
 * @method static Builder<static>|Employee whereCreatedBy($value)
 * @method static Builder<static>|Employee whereCurrentTeamId($value)
 * @method static Builder<static>|Employee whereDeletedAt($value)
 * @method static Builder<static>|Employee whereDeletedBy($value)
 * @method static Builder<static>|Employee whereEmail($value)
 * @method static Builder<static>|Employee whereEmailVerifiedAt($value)
 * @method static Builder<static>|Employee whereFirstName($value)
 * @method static Builder<static>|Employee whereId($value)
 * @method static Builder<static>|Employee whereIsActive($value)
 * @method static Builder<static>|Employee whereIsOtp($value)
 * @method static Builder<static>|Employee whereLang($value)
 * @method static Builder<static>|Employee whereLastName($value)
 * @method static Builder<static>|Employee whereName($value)
 * @method static Builder<static>|Employee wherePassword($value)
 * @method static Builder<static>|Employee wherePasswordExpiresAt($value)
 * @method static Builder<static>|Employee whereProfilePhotoPath($value)
 * @method static Builder<static>|Employee whereRememberToken($value)
 * @method static Builder<static>|Employee whereTwoFactorConfirmedAt($value)
 * @method static Builder<static>|Employee whereTwoFactorRecoveryCodes($value)
 * @method static Builder<static>|Employee whereTwoFactorSecret($value)
 * @method static Builder<static>|Employee whereType($value)
 * @method static Builder<static>|Employee whereUpdatedAt($value)
 * @method static Builder<static>|Employee whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
 * @property-read int|null $teams_count
 */
	class Employee extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class Position.
 *
 * @property-read Profile|null $creator
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|Position newModelQuery()
 * @method static Builder<static>|Position newQuery()
 * @method static Builder<static>|Position query()
 * @mixin \Eloquent
 */
	class Position extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class TimeEntry.
 *
 * @property int $id
 * @property int $employee_id
 * @property Carbon $clock_in
 * @property Carbon|null $clock_out
 * @property Carbon|null $break_start
 * @property Carbon|null $break_end
 * @property int $break_duration
 * @property float|null $total_hours
 * @property float|null $regular_hours
 * @property float|null $overtime_hours
 * @property array<mixed>|null $location_in
 * @property array<mixed>|null $location_out
 * @property array<mixed>|null $device_info
 * @property string|null $notes
 * @property string|null $employee_notes
 * @property string|null $supervisor_notes
 * @property string $status
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property string|null $rejection_reason
 * @property array<mixed>|null $anomalies
 * @property-read Employee|null $approvedBy
 * @property-read Profile|null $creator
 * @property-read Employee|null $employee
 * @property-read Profile|null $updater
 * @method static Builder<static>|TimeEntry forEmployee(int $employeeId)
 * @method static Builder<static>|TimeEntry newModelQuery()
 * @method static Builder<static>|TimeEntry newQuery()
 * @method static Builder<static>|TimeEntry pending()
 * @method static Builder<static>|TimeEntry query()
 * @method static Builder<static>|TimeEntry withAnomalies()
 * @mixin \Eloquent
 */
	final class TimeEntry extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class TimeRecord.
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $timestamp
 * @property string $type
 * @property bool $is_manual
 * @property string|null $method
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $address
 * @property string|null $notes
 * @property string|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read User|null $createdBy
 * @property-read Profile|null $creator
 * @property-read string $formatted_date
 * @property-read string $formatted_time
 * @property-read string $formatted_timestamp
 * @property-read User|null $updatedBy
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|TimeRecord forDate(\Carbon\Carbon $date)
 * @method static Builder<static>|TimeRecord forUser(int $userId)
 * @method static Builder<static>|TimeRecord newModelQuery()
 * @method static Builder<static>|TimeRecord newQuery()
 * @method static Builder<static>|TimeRecord ofType(string $type)
 * @method static Builder<static>|TimeRecord query()
 * @method static Builder<static>|TimeRecord valid()
 * @mixin \Eloquent
 */
	class TimeRecord extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Employee Module User Model
 *
 * Extends BaseUser with Single Table Inheritance for Employee module.
 * Parent class for Admin and Employee models using Parental STI.
 *
 * @property-read Collection<int, Consent> $activeConsents
 * @property-read int|null $active_consents_count
 * @property-read Collection<int, AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read Collection<int, OauthClient> $clients
 * @property-read int|null $clients_count
 * @property-read Collection<int, Consent> $consents
 * @property-read int|null $consents_count
 * @property-read Team|null $currentTeam
 * @property-read TenantUser|TeamUser|DeviceUser|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Collection<int, User> $all_team_users
 * @property-read string $full_name
 * @property-read string $name
 * @property-read AuthenticationLog|null $latestAuthentication
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, Team> $membershipTeams
 * @property-read int|null $membership_teams_count
 * @property-read DatabaseNotificationCollection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, OauthClient> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Profile|null $profile
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-write mixed $password
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read int|null $socialite_users_count
 * @property-read Collection<int, TeamUser> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Collection<int, Tenant> $tenants
 * @property-read int|null $tenants_count
 * @property-read Collection<int, OauthToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection<int, Treatment> $treatments
 * @property-read int|null $treatments_count
 * @method static Builder<static>|User childrenWith(array<int, string> $relations)
 * @method static Builder<static>|User childrenWithCount(array<int, string> $relations)
 * @method static \Modules\Employee\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User orWhereNotState(string $column, $states)
 * @method static Builder<static>|User orWhereState(string $column, $states)
 * @method static Builder<static>|User permission($permissions, bool $without = false)
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|User team($teams, bool $without = false)
 * @method static Builder<static>|User whereNotState(string $column, $states)
 * @method static Builder<static>|User whereState(string $column, $states)
 * @method static Builder<static>|User withoutPermission($permissions)
 * @method static Builder<static>|User withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|User withoutTeam($teams)
 * @property string $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $lang
 * @property bool $is_active
 * @property bool $is_otp
 * @property \Illuminate\Support\Carbon|null $password_expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $state
 * @method static Builder<static>|User whereCreatedAt($value)
 * @method static Builder<static>|User whereCreatedBy($value)
 * @method static Builder<static>|User whereCurrentTeamId($value)
 * @method static Builder<static>|User whereDeletedAt($value)
 * @method static Builder<static>|User whereDeletedBy($value)
 * @method static Builder<static>|User whereEmail($value)
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereFirstName($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereIsActive($value)
 * @method static Builder<static>|User whereIsOtp($value)
 * @method static Builder<static>|User whereLang($value)
 * @method static Builder<static>|User whereLastName($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User wherePasswordExpiresAt($value)
 * @method static Builder<static>|User whereProfilePhotoPath($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereTwoFactorConfirmedAt($value)
 * @method static Builder<static>|User whereTwoFactorRecoveryCodes($value)
 * @method static Builder<static>|User whereTwoFactorSecret($value)
 * @method static Builder<static>|User whereType($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
 * @property-read int|null $teams_count
 */
	class User extends \Eloquent implements \Spatie\ModelStates\HasStatesContract {}
}

namespace Modules\Employee\Models{
/**
 * Class WorkHour.
 *
 * @property int $id
 * @property string $employee_id
 * @property WorkHourTypeEnum $type
 * @property WorkHourStatusEnum $status
 * @property \Illuminate\Support\Carbon $timestamp
 * @property numeric-string|null $location_lat
 * @property numeric-string|null $location_lng
 * @property string|null $location_name
 * @property array<string, mixed>|null $device_info
 * @property string|null $photo_path
 * @property string|null $notes
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $approvedBy
 * @property-read Profile|null $creator
 * @property-read User|null $employee
 * @property-read string $formatted_date
 * @property-read string $formatted_date_time
 * @property-read string $formatted_time
 * @property-read Profile|null $updater
 * @method static Builder<static>|WorkHour forDate(\Carbon\Carbon $date)
 * @method static Builder<static>|WorkHour forEmployee(string $employeeId)
 * @method static Builder<static>|WorkHour newModelQuery()
 * @method static Builder<static>|WorkHour newQuery()
 * @method static Builder<static>|WorkHour ofType(string $type)
 * @method static Builder<static>|WorkHour query()
 * @method static Builder<static>|WorkHour today()
 * @method static Builder<static>|WorkHour whereApprovedAt($value)
 * @method static Builder<static>|WorkHour whereApprovedBy($value)
 * @method static Builder<static>|WorkHour whereCreatedAt($value)
 * @method static Builder<static>|WorkHour whereDeviceInfo($value)
 * @method static Builder<static>|WorkHour whereEmployeeId($value)
 * @method static Builder<static>|WorkHour whereId($value)
 * @method static Builder<static>|WorkHour whereLocationLat($value)
 * @method static Builder<static>|WorkHour whereLocationLng($value)
 * @method static Builder<static>|WorkHour whereLocationName($value)
 * @method static Builder<static>|WorkHour whereNotes($value)
 * @method static Builder<static>|WorkHour wherePhotoPath($value)
 * @method static Builder<static>|WorkHour whereStatus($value)
 * @method static Builder<static>|WorkHour whereTimestamp($value)
 * @method static Builder<static>|WorkHour whereType($value)
 * @method static Builder<static>|WorkHour whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class WorkHour extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Consent.
 *
 * @property-read Profile|null $creator
 * @property-read Treatment|null $treatment
 * @property-read Profile|null $updater
 * @method static Builder<static>|Consent newModelQuery()
 * @method static Builder<static>|Consent newQuery()
 * @method static Builder<static>|Consent query()
 * @property string $id
 * @property string|null $treatment_id
 * @property string|null $subject_id
 * @property string $user_type
 * @property int $user_id
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $accepted_at
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property array<array-key, mixed>|null $metadata
 * @property \Illuminate\Support\Carbon|null $revoked_at
 * @property string|null $revoked_ip_address
 * @method static Builder<static>|Consent whereAcceptedAt($value)
 * @method static Builder<static>|Consent whereCreatedAt($value)
 * @method static Builder<static>|Consent whereCreatedBy($value)
 * @method static Builder<static>|Consent whereDeletedAt($value)
 * @method static Builder<static>|Consent whereDeletedBy($value)
 * @method static Builder<static>|Consent whereId($value)
 * @method static Builder<static>|Consent whereIpAddress($value)
 * @method static Builder<static>|Consent whereMetadata($value)
 * @method static Builder<static>|Consent whereRevokedAt($value)
 * @method static Builder<static>|Consent whereRevokedIpAddress($value)
 * @method static Builder<static>|Consent whereSubjectId($value)
 * @method static Builder<static>|Consent whereTreatmentId($value)
 * @method static Builder<static>|Consent whereType($value)
 * @method static Builder<static>|Consent whereUpdatedAt($value)
 * @method static Builder<static>|Consent whereUpdatedBy($value)
 * @method static Builder<static>|Consent whereUserAgent($value)
 * @method static Builder<static>|Consent whereUserId($value)
 * @method static Builder<static>|Consent whereUserType($value)
 * @mixin \Eloquent
 */
	class Consent extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Event.
 *
 * @property-read Consent|null $consent
 * @property-read Profile|null $creator
 * @property-write mixed $ip
 * @property-write mixed $payload
 * @property-read Profile|null $updater
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event query()
 * @property string $id
 * @property string|null $treatment_id
 * @property string|null $consent_id
 * @property string $subject_id
 * @property string $action
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Event whereAction($value)
 * @method static Builder<static>|Event whereConsentId($value)
 * @method static Builder<static>|Event whereCreatedAt($value)
 * @method static Builder<static>|Event whereCreatedBy($value)
 * @method static Builder<static>|Event whereDeletedAt($value)
 * @method static Builder<static>|Event whereDeletedBy($value)
 * @method static Builder<static>|Event whereId($value)
 * @method static Builder<static>|Event whereIp($value)
 * @method static Builder<static>|Event wherePayload($value)
 * @method static Builder<static>|Event whereSubjectId($value)
 * @method static Builder<static>|Event whereTreatmentId($value)
 * @method static Builder<static>|Event whereUpdatedAt($value)
 * @method static Builder<static>|Event whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Event extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Profile.
 *
 * @property SchemalessAttributes $extra
 * @property-read string $avatar
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $first_name
 * @property-read string|null $full_name
 * @property-read string|null $last_name
 * @property-read MediaCollection<int, \Modules\Media\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @property-read User|null $user
 * @property-read string|null $user_name
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(array $relations)
 * @method static Builder<static>|Profile childrenWithCount(array $relations)
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, bool $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Profile team($teams, bool $without = false)
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Profile withoutTeam($teams)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
 * @property-read int|null $teams_count
 */
	class Profile extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Treatment.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Treatment newModelQuery()
 * @method static Builder<static>|Treatment newQuery()
 * @method static Builder<static>|Treatment query()
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Treatment whereActive($value)
 * @method static Builder<static>|Treatment whereCreatedAt($value)
 * @method static Builder<static>|Treatment whereCreatedBy($value)
 * @method static Builder<static>|Treatment whereDeletedAt($value)
 * @method static Builder<static>|Treatment whereDeletedBy($value)
 * @method static Builder<static>|Treatment whereDescription($value)
 * @method static Builder<static>|Treatment whereDocumentUrl($value)
 * @method static Builder<static>|Treatment whereDocumentVersion($value)
 * @method static Builder<static>|Treatment whereId($value)
 * @method static Builder<static>|Treatment whereName($value)
 * @method static Builder<static>|Treatment whereRequired($value)
 * @method static Builder<static>|Treatment whereUpdatedAt($value)
 * @method static Builder<static>|Treatment whereUpdatedBy($value)
 * @method static Builder<static>|Treatment whereWeight($value)
 * @mixin \Eloquent
 */
	class Treatment extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Class Address.
 *
 * Implementazione di Schema.org PostalAddress
 *
 * @property int $id
 * @property Carbon|null $deleted_at
 * @property string|null $model_type
 * @property int|string|null $model_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $phone
 * @property string|null $route
 * @property string|null $street_number
 * @property string|null $locality
 * @property string|null $administrative_area_level_3
 * @property string|null $administrative_area_level_2
 * @property string|null $administrative_area_level_1
 * @property string|null $country
 * @property string|null $postal_code
 * @property string|null $formatted_address
 * @property string|null $place_id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property AddressTypeEnum $type
 * @property bool $is_primary
 * @property array<string, mixed>|null $extra_data
 * @property-read Model $addressable
 * @property-read Profile|null $creator
 * @property-read string $full_address
 * @property-read string $street_address
 * @property-read Model $model
 * @property-read Profile|null $updater
 * @method static Builder<static>|Address nearby(float $latitude, float $longitude, float $radiusKm = 10)
 * @method static Builder<static>|Address newModelQuery()
 * @method static Builder<static>|Address newQuery()
 * @method static Builder<static>|Address ofType(\Modules\Geo\Enums\AddressTypeEnum|string $type)
 * @method static Builder<static>|Address primary()
 * @method static Builder<static>|Address query()
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @method static Builder<static>|Address onlyTrashed()
 * @method static Builder<static>|Address whereAdministrativeAreaLevel1($value)
 * @method static Builder<static>|Address whereAdministrativeAreaLevel2($value)
 * @method static Builder<static>|Address whereAdministrativeAreaLevel3($value)
 * @method static Builder<static>|Address whereCountry($value)
 * @method static Builder<static>|Address whereCreatedAt($value)
 * @method static Builder<static>|Address whereCreatedBy($value)
 * @method static Builder<static>|Address whereDeletedAt($value)
 * @method static Builder<static>|Address whereDeletedBy($value)
 * @method static Builder<static>|Address whereDescription($value)
 * @method static Builder<static>|Address whereExtraData($value)
 * @method static Builder<static>|Address whereFormattedAddress($value)
 * @method static Builder<static>|Address whereId($value)
 * @method static Builder<static>|Address whereIsPrimary($value)
 * @method static Builder<static>|Address whereLatitude($value)
 * @method static Builder<static>|Address whereLocality($value)
 * @method static Builder<static>|Address whereLongitude($value)
 * @method static Builder<static>|Address whereModelId($value)
 * @method static Builder<static>|Address whereModelType($value)
 * @method static Builder<static>|Address whereName($value)
 * @method static Builder<static>|Address wherePhone($value)
 * @method static Builder<static>|Address wherePlaceId($value)
 * @method static Builder<static>|Address wherePostalCode($value)
 * @method static Builder<static>|Address whereRoute($value)
 * @method static Builder<static>|Address whereStreetNumber($value)
 * @method static Builder<static>|Address whereType($value)
 * @method static Builder<static>|Address whereUpdatedAt($value)
 * @method static Builder<static>|Address whereUpdatedBy($value)
 * @method static Builder<static>|Address withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Address withoutTrashed()
 * @mixin \Eloquent
 */
	class Address extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Modello per i comuni italiani con Sushi.
 *
 * Implementa il pattern Facade per fornire un'interfaccia unificata a tutti i dati geografici:
 * regioni, province, città, CAP, codici ISTAT, ecc.
 * Tutti i dati sono estratti da file JSON e gestiti tramite Sushi.
 *
 * @property string|null                  $nome
 * @property float|null                   $codice
 * @property array<array-key, mixed>|null $zona
 * @property array<array-key, mixed>|null $regione
 * @property array<array-key, mixed>|null $provincia
 * @property string|null                  $sigla
 * @property string|null                  $codiceCatastale
 * @property array<array-key, mixed>|null $cap
 * @property int|null                     $popolazione
 * @property int|null                     $id
 * @property string|null                  $title
 * @property string|null                  $slug
 * @property string|null                  $content
 * @property string|null                  $created_at
 * @property string|null                  $updated_at
 * @property string|null                  $created_by
 * @property string|null                  $updated_by
 * @property ProfileContract|null         $creator
 * @property ProfileContract|null         $updater
 * @method static Builder<static>|Comune newModelQuery()
 * @method static Builder<static>|Comune newQuery()
 * @method static Builder<static>|Comune query()
 * @method static Builder<static>|Comune whereCap($value)
 * @method static Builder<static>|Comune whereCodice($value)
 * @method static Builder<static>|Comune whereCodiceCatastale($value)
 * @method static Builder<static>|Comune whereContent($value)
 * @method static Builder<static>|Comune whereCreatedAt($value)
 * @method static Builder<static>|Comune whereCreatedBy($value)
 * @method static Builder<static>|Comune whereId($value)
 * @method static Builder<static>|Comune whereNome($value)
 * @method static Builder<static>|Comune wherePopolazione($value)
 * @method static Builder<static>|Comune whereProvincia($value)
 * @method static Builder<static>|Comune whereRegione($value)
 * @method static Builder<static>|Comune whereSigla($value)
 * @method static Builder<static>|Comune whereSlug($value)
 * @method static Builder<static>|Comune whereTitle($value)
 * @method static Builder<static>|Comune whereUpdatedAt($value)
 * @method static Builder<static>|Comune whereUpdatedBy($value)
 * @method static Builder<static>|Comune whereZona($value)
 * @property ProfileContract|null $deleter
 * @method static ComuneFactory factory($count = null, $state = [])
 * @property int|null    $altitudine
 * @property string|null $codice_catastale
 * @property float|null  $lat
 * @property float|null  $lng
 * @property string|null $sigla_provincia
 * @property float|null  $superficie
 * @property string|null $zona_altimetrica
 * @method static Builder<static>|Comune whereAltitudine($value)
 * @method static Builder<static>|Comune whereLat($value)
 * @method static Builder<static>|Comune whereLng($value)
 * @method static Builder<static>|Comune whereSiglaProvincia($value)
 * @method static Builder<static>|Comune whereSuperficie($value)
 * @method static Builder<static>|Comune whereZonaAltimetrica($value)
 * @mixin \Eloquent
 */
	class Comune extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Suddivisione tipo “county” (contesto USA / geonames), non il comune italiano.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|County newModelQuery()
 * @method static Builder<static>|County newQuery()
 * @method static Builder<static>|County query()
 * @property int $id
 * @property int|null $state_id Stato/regione di appartenenza
 * @property string $county Nome della suddivisione (county/provincia)
 * @property string|null $county_code Codice della suddivisione
 * @property int|null $state_index Indice progressivo entro lo stato
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|County whereCounty($value)
 * @method static Builder<static>|County whereCountyCode($value)
 * @method static Builder<static>|County whereCreatedAt($value)
 * @method static Builder<static>|County whereCreatedBy($value)
 * @method static Builder<static>|County whereDeletedAt($value)
 * @method static Builder<static>|County whereDeletedBy($value)
 * @method static Builder<static>|County whereId($value)
 * @method static Builder<static>|County whereStateId($value)
 * @method static Builder<static>|County whereStateIndex($value)
 * @method static Builder<static>|County whereUpdatedAt($value)
 * @method static Builder<static>|County whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class County extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Modules\Geo\Models\GeoNamesCap.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|GeoNamesCap newModelQuery()
 * @method static Builder<static>|GeoNamesCap newQuery()
 * @method static Builder<static>|GeoNamesCap query()
 * @property int $id
 * @property string|null $country_code Codice paese ISO (es. IT)
 * @property string|null $postal_code CAP / codice postale
 * @property string|null $place_name Nome della località
 * @property string|null $admin_name1 Regione
 * @property string|null $admin_code1 Codice regione
 * @property string|null $admin_name2 Provincia
 * @property string|null $admin_code2 Codice provincia
 * @property string|null $admin_name3 Comune
 * @property string|null $admin_code3 Codice comune
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property int|null $accuracy Accuratezza coordinate GeoNames
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|GeoNamesCap whereAccuracy($value)
 * @method static Builder<static>|GeoNamesCap whereAdminCode1($value)
 * @method static Builder<static>|GeoNamesCap whereAdminCode2($value)
 * @method static Builder<static>|GeoNamesCap whereAdminCode3($value)
 * @method static Builder<static>|GeoNamesCap whereAdminName1($value)
 * @method static Builder<static>|GeoNamesCap whereAdminName2($value)
 * @method static Builder<static>|GeoNamesCap whereAdminName3($value)
 * @method static Builder<static>|GeoNamesCap whereCountryCode($value)
 * @method static Builder<static>|GeoNamesCap whereCreatedAt($value)
 * @method static Builder<static>|GeoNamesCap whereCreatedBy($value)
 * @method static Builder<static>|GeoNamesCap whereDeletedAt($value)
 * @method static Builder<static>|GeoNamesCap whereDeletedBy($value)
 * @method static Builder<static>|GeoNamesCap whereId($value)
 * @method static Builder<static>|GeoNamesCap whereLatitude($value)
 * @method static Builder<static>|GeoNamesCap whereLongitude($value)
 * @method static Builder<static>|GeoNamesCap wherePlaceName($value)
 * @method static Builder<static>|GeoNamesCap wherePostalCode($value)
 * @method static Builder<static>|GeoNamesCap whereUpdatedAt($value)
 * @method static Builder<static>|GeoNamesCap whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class GeoNamesCap extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int|null $region_id
 * @property int|null $province_id
 * @property int $id
 * @property string|null $name
 * @property array<array-key, mixed>|null $postal_code
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Locality newModelQuery()
 * @method static Builder<static>|Locality newQuery()
 * @method static Builder<static>|Locality query()
 * @method static Builder<static>|Locality whereId($value)
 * @method static Builder<static>|Locality whereName($value)
 * @method static Builder<static>|Locality wherePostalCode($value)
 * @method static Builder<static>|Locality whereProvinceId($value)
 * @method static Builder<static>|Locality whereRegionId($value)
 * @mixin \Eloquent
 */
	class Locality extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Class Location.
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $lat
 * @property float|null $lng
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $formatted_address
 * @property bool $processed
 * @property string|null $description
 * @property-read Profile|null $creator
 * @property-read array<string, mixed> $location
 * @property-read Profile|null $updater
 * @method static Builder<static>|Location newModelQuery()
 * @method static Builder<static>|Location newQuery()
 * @method static Builder<static>|Location query()
 * @method static Builder<static>|Location withinDistance(float $latitude, float $longitude, float $distanceInKm)
 * @property string|null $model_type
 * @property string|null $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Location whereCity($value)
 * @method static Builder<static>|Location whereCreatedAt($value)
 * @method static Builder<static>|Location whereCreatedBy($value)
 * @method static Builder<static>|Location whereDeletedAt($value)
 * @method static Builder<static>|Location whereDeletedBy($value)
 * @method static Builder<static>|Location whereDescription($value)
 * @method static Builder<static>|Location whereFormattedAddress($value)
 * @method static Builder<static>|Location whereId($value)
 * @method static Builder<static>|Location whereLat($value)
 * @method static Builder<static>|Location whereLng($value)
 * @method static Builder<static>|Location whereModelId($value)
 * @method static Builder<static>|Location whereModelType($value)
 * @method static Builder<static>|Location whereName($value)
 * @method static Builder<static>|Location whereProcessed($value)
 * @method static Builder<static>|Location whereState($value)
 * @method static Builder<static>|Location whereStreet($value)
 * @method static Builder<static>|Location whereUpdatedAt($value)
 * @method static Builder<static>|Location whereUpdatedBy($value)
 * @method static Builder<static>|Location whereZip($value)
 * @mixin \Eloquent
 */
	class Location extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property-read Address|null $address
 * @property-read Profile|null $creator
 * @property-read string $formatted_address
 * @property-read float|null $latitude
 * @property-read float|null $longitude
 * @property-read Model $linked
 * @property string|null $name
 * @property string|null $description
 * @property-read PlaceType|null $placeType
 * @property-read Profile|null $updater
 * @method static Builder<static>|Place newModelQuery()
 * @method static Builder<static>|Place newQuery()
 * @method static Builder<static>|Place query()
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property string|null $nearest_street
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $post_type
 * @method static Builder<static>|Place whereAddress($value)
 * @method static Builder<static>|Place whereCreatedAt($value)
 * @method static Builder<static>|Place whereCreatedBy($value)
 * @method static Builder<static>|Place whereDeletedBy($value)
 * @method static Builder<static>|Place whereFormattedAddress($value)
 * @method static Builder<static>|Place whereId($value)
 * @method static Builder<static>|Place whereLatitude($value)
 * @method static Builder<static>|Place whereLongitude($value)
 * @method static Builder<static>|Place whereModelId($value)
 * @method static Builder<static>|Place whereModelType($value)
 * @method static Builder<static>|Place whereNearestStreet($value)
 * @method static Builder<static>|Place wherePostType($value)
 * @method static Builder<static>|Place whereUpdatedAt($value)
 * @method static Builder<static>|Place whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Place extends \Eloquent implements \Modules\Geo\Contracts\HasGeolocation {}
}

namespace Modules\Geo\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Geo\Database\Factories\PlaceTypeFactory factory($count = null, $state = [])
 * @method static Builder<static>|PlaceType newModelQuery()
 * @method static Builder<static>|PlaceType newQuery()
 * @method static Builder<static>|PlaceType query()
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder<static>|PlaceType whereCreatedAt($value)
 * @method static Builder<static>|PlaceType whereDescription($value)
 * @method static Builder<static>|PlaceType whereId($value)
 * @method static Builder<static>|PlaceType whereName($value)
 * @method static Builder<static>|PlaceType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PlaceType extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int|null $region_id
 * @property int $id
 * @property string|null $name
 * @property-read Profile|null $creator
 * @property-read Collection<int, Locality> $localities
 * @property-read int|null $localities_count
 * @property-read Region|null $region
 * @property-read Profile|null $updater
 * @method static \Modules\Geo\Database\Factories\ProvinceFactory factory($count = null, $state = [])
 * @method static Builder<static>|Province newModelQuery()
 * @method static Builder<static>|Province newQuery()
 * @method static Builder<static>|Province query()
 * @method static Builder<static>|Province whereId($value)
 * @method static Builder<static>|Province whereName($value)
 * @method static Builder<static>|Province whereRegionId($value)
 * @mixin \Eloquent
 */
	class Province extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int|null $id
 * @property string|null $name
 * @property-read Profile|null $creator
 * @property-read Collection<int, Province> $provinces
 * @property-read int|null $provinces_count
 * @property-read Profile|null $updater
 * @method static \Modules\Geo\Database\Factories\RegionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Region newModelQuery()
 * @method static Builder<static>|Region newQuery()
 * @method static Builder<static>|Region query()
 * @method static Builder<static>|Region whereId($value)
 * @method static Builder<static>|Region whereName($value)
 * @mixin \Eloquent
 */
	class Region extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|State newModelQuery()
 * @method static Builder<static>|State newQuery()
 * @method static Builder<static>|State query()
 * @property int $id
 * @property string $state Nome dello stato/regione
 * @property string|null $state_code Codice dello stato/regione
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|State whereCreatedAt($value)
 * @method static Builder<static>|State whereCreatedBy($value)
 * @method static Builder<static>|State whereDeletedAt($value)
 * @method static Builder<static>|State whereDeletedBy($value)
 * @method static Builder<static>|State whereId($value)
 * @method static Builder<static>|State whereState($value)
 * @method static Builder<static>|State whereStateCode($value)
 * @method static Builder<static>|State whereUpdatedAt($value)
 * @method static Builder<static>|State whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class State extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * @property-read Model|Eloquent $user
 * @method static Builder<static>|Export newModelQuery()
 * @method static Builder<static>|Export newQuery()
 * @method static Builder<static>|Export query()
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property string $file_disk
 * @property string|null $file_name
 * @property string $exporter
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property string|null $user_type
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Export whereCompletedAt($value)
 * @method static Builder<static>|Export whereCreatedAt($value)
 * @method static Builder<static>|Export whereCreatedBy($value)
 * @method static Builder<static>|Export whereDeletedAt($value)
 * @method static Builder<static>|Export whereDeletedBy($value)
 * @method static Builder<static>|Export whereExporter($value)
 * @method static Builder<static>|Export whereFileDisk($value)
 * @method static Builder<static>|Export whereFileName($value)
 * @method static Builder<static>|Export whereId($value)
 * @method static Builder<static>|Export whereProcessedRows($value)
 * @method static Builder<static>|Export whereSuccessfulRows($value)
 * @method static Builder<static>|Export whereTotalRows($value)
 * @method static Builder<static>|Export whereUpdatedAt($value)
 * @method static Builder<static>|Export whereUpdatedBy($value)
 * @method static Builder<static>|Export whereUserId($value)
 * @method static Builder<static>|Export whereUserType($value)
 * @mixin Eloquent
 */
	class Export extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|FailedImportRow newModelQuery()
 * @method static Builder<static>|FailedImportRow newQuery()
 * @method static Builder<static>|FailedImportRow query()
 * @property string $id
 * @property array<array-key, mixed> $data
 * @property int $import_id
 * @property string|null $validation_error
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|FailedImportRow whereCreatedAt($value)
 * @method static Builder<static>|FailedImportRow whereCreatedBy($value)
 * @method static Builder<static>|FailedImportRow whereData($value)
 * @method static Builder<static>|FailedImportRow whereId($value)
 * @method static Builder<static>|FailedImportRow whereImportId($value)
 * @method static Builder<static>|FailedImportRow whereUpdatedAt($value)
 * @method static Builder<static>|FailedImportRow whereUpdatedBy($value)
 * @method static Builder<static>|FailedImportRow whereValidationError($value)
 * @mixin \Eloquent
 */
	class FailedImportRow extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\FailedJob.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|FailedJob newModelQuery()
 * @method static Builder<static>|FailedJob newQuery()
 * @method static Builder<static>|FailedJob query()
 * @property string $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property string $exception
 * @property string $failed_at
 * @method static Builder<static>|FailedJob whereConnection($value)
 * @method static Builder<static>|FailedJob whereException($value)
 * @method static Builder<static>|FailedJob whereFailedAt($value)
 * @method static Builder<static>|FailedJob whereId($value)
 * @method static Builder<static>|FailedJob wherePayload($value)
 * @method static Builder<static>|FailedJob whereQueue($value)
 * @method static Builder<static>|FailedJob whereUuid($value)
 * @mixin \Eloquent
 */
	class FailedJob extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Frequency.
 *
 * @property-read Profile|null $creator
 * @property-read Collection<int, Parameter> $parameters
 * @property-read int|null $parameters_count
 * @property-read Task|null $task
 * @property-read Profile|null $updater
 * @method static Builder<static>|Frequency newModelQuery()
 * @method static Builder<static>|Frequency newQuery()
 * @method static Builder<static>|Frequency query()
 * @property int $id
 * @property int $task_id
 * @property string $label
 * @property string $interval
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Frequency whereCreatedAt($value)
 * @method static Builder<static>|Frequency whereCreatedBy($value)
 * @method static Builder<static>|Frequency whereId($value)
 * @method static Builder<static>|Frequency whereInterval($value)
 * @method static Builder<static>|Frequency whereLabel($value)
 * @method static Builder<static>|Frequency whereTaskId($value)
 * @method static Builder<static>|Frequency whereUpdatedAt($value)
 * @method static Builder<static>|Frequency whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Frequency extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Import newModelQuery()
 * @method static Builder<static>|Import newQuery()
 * @method static Builder<static>|Import query()
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property string $file_name
 * @property string $file_path
 * @property string $importer
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property string|null $user_type
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Import whereCompletedAt($value)
 * @method static Builder<static>|Import whereCreatedAt($value)
 * @method static Builder<static>|Import whereCreatedBy($value)
 * @method static Builder<static>|Import whereDeletedAt($value)
 * @method static Builder<static>|Import whereDeletedBy($value)
 * @method static Builder<static>|Import whereFileName($value)
 * @method static Builder<static>|Import whereFilePath($value)
 * @method static Builder<static>|Import whereId($value)
 * @method static Builder<static>|Import whereImporter($value)
 * @method static Builder<static>|Import whereProcessedRows($value)
 * @method static Builder<static>|Import whereSuccessfulRows($value)
 * @method static Builder<static>|Import whereTotalRows($value)
 * @method static Builder<static>|Import whereUpdatedAt($value)
 * @method static Builder<static>|Import whereUpdatedBy($value)
 * @method static Builder<static>|Import whereUserId($value)
 * @method static Builder<static>|Import whereUserType($value)
 * @mixin \Eloquent
 */
	class Import extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Job.
 *
 * @property-read Profile|null $creator
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read Profile|null $updater
 * @method static Builder<static>|Job newModelQuery()
 * @method static Builder<static>|Job newQuery()
 * @method static Builder<static>|Job query()
 * @property int $id
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Job whereAttempts($value)
 * @method static Builder<static>|Job whereAvailableAt($value)
 * @method static Builder<static>|Job whereCreatedAt($value)
 * @method static Builder<static>|Job whereCreatedBy($value)
 * @method static Builder<static>|Job whereId($value)
 * @method static Builder<static>|Job wherePayload($value)
 * @method static Builder<static>|Job whereQueue($value)
 * @method static Builder<static>|Job whereReservedAt($value)
 * @method static Builder<static>|Job whereUpdatedAt($value)
 * @method static Builder<static>|Job whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Job extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\JobBatch.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|JobBatch newModelQuery()
 * @method static Builder<static>|JobBatch newQuery()
 * @method static Builder<static>|JobBatch query()
 * @property string $id
 * @property string $name
 * @property int $total_jobs
 * @property int $pending_jobs
 * @property int $failed_jobs
 * @property string $failed_job_ids
 * @property \Illuminate\Support\Collection<array-key, mixed>|null $options
 * @property \Illuminate\Support\Carbon|null $cancelled_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $finished_at
 * @method static Builder<static>|JobBatch whereCancelledAt($value)
 * @method static Builder<static>|JobBatch whereCreatedAt($value)
 * @method static Builder<static>|JobBatch whereFailedJobIds($value)
 * @method static Builder<static>|JobBatch whereFailedJobs($value)
 * @method static Builder<static>|JobBatch whereFinishedAt($value)
 * @method static Builder<static>|JobBatch whereId($value)
 * @method static Builder<static>|JobBatch whereName($value)
 * @method static Builder<static>|JobBatch whereOptions($value)
 * @method static Builder<static>|JobBatch wherePendingJobs($value)
 * @method static Builder<static>|JobBatch whereTotalJobs($value)
 * @mixin \Eloquent
 */
	class JobBatch extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * @property-read Profile|null $creator
 * @property-read string $status
 * @property-read Profile|null $updater
 * @method static Builder<static>|JobManager newModelQuery()
 * @method static Builder<static>|JobManager newQuery()
 * @method static Builder<static>|JobManager query()
 * @property string $id
 * @property string $job_id
 * @property string|null $name
 * @property string|null $queue
 * @property Carbon|null $started_at
 * @property Carbon|null $finished_at
 * @property bool $failed
 * @property int $attempt
 * @property int|null $progress
 * @property string|null $exception_message
 * @method static Builder<static>|JobManager whereAttempt($value)
 * @method static Builder<static>|JobManager whereExceptionMessage($value)
 * @method static Builder<static>|JobManager whereFailed($value)
 * @method static Builder<static>|JobManager whereFinishedAt($value)
 * @method static Builder<static>|JobManager whereId($value)
 * @method static Builder<static>|JobManager whereJobId($value)
 * @method static Builder<static>|JobManager whereName($value)
 * @method static Builder<static>|JobManager whereProgress($value)
 * @method static Builder<static>|JobManager whereQueue($value)
 * @method static Builder<static>|JobManager whereStartedAt($value)
 * @mixin \Eloquent
 */
	class JobManager extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\JobsWaiting.
 *
 * @property-read Profile|null $creator
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read Profile|null $updater
 * @method static Builder<static>|JobsWaiting newModelQuery()
 * @method static Builder<static>|JobsWaiting newQuery()
 * @method static Builder<static>|JobsWaiting query()
 * @property int $id
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|JobsWaiting whereAttempts($value)
 * @method static Builder<static>|JobsWaiting whereAvailableAt($value)
 * @method static Builder<static>|JobsWaiting whereCreatedAt($value)
 * @method static Builder<static>|JobsWaiting whereCreatedBy($value)
 * @method static Builder<static>|JobsWaiting whereId($value)
 * @method static Builder<static>|JobsWaiting wherePayload($value)
 * @method static Builder<static>|JobsWaiting whereQueue($value)
 * @method static Builder<static>|JobsWaiting whereReservedAt($value)
 * @method static Builder<static>|JobsWaiting whereUpdatedAt($value)
 * @method static Builder<static>|JobsWaiting whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class JobsWaiting extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Parameter.
 *
 * @property-read Profile|null $creator
 * @property-read Frequency|null $task
 * @property-read Profile|null $updater
 * @method static Builder<static>|Parameter newModelQuery()
 * @method static Builder<static>|Parameter newQuery()
 * @method static Builder<static>|Parameter query()
 * @property int $id
 * @property int $frequency_id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Parameter whereCreatedAt($value)
 * @method static Builder<static>|Parameter whereCreatedBy($value)
 * @method static Builder<static>|Parameter whereFrequencyId($value)
 * @method static Builder<static>|Parameter whereId($value)
 * @method static Builder<static>|Parameter whereName($value)
 * @method static Builder<static>|Parameter whereUpdatedAt($value)
 * @method static Builder<static>|Parameter whereUpdatedBy($value)
 * @method static Builder<static>|Parameter whereValue($value)
 * @mixin \Eloquent
 */
	class Parameter extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Result.
 *
 * @property-read Profile|null $creator
 * @property-read Task|null $task
 * @property-read Profile|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result query()
 * @property string $id
 * @property int $task_id
 * @property \Illuminate\Support\Carbon $ran_at
 * @property numeric $duration
 * @property string $result
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereRanAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Result extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Schedule.
 *
 * @property Status $status
 * @property-read Profile|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ScheduleHistory> $histories
 * @property-read int|null $histories_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|Schedule active()
 * @method static Builder<static>|Schedule inactive()
 * @method static Builder<static>|Schedule newModelQuery()
 * @method static Builder<static>|Schedule newQuery()
 * @method static Builder<static>|Schedule query()
 * @property string $id
 * @property string $command
 * @property string|null $command_custom
 * @property array<array-key, mixed>|null $params
 * @property string $expression
 * @property array<array-key, mixed>|null $environments
 * @property array<array-key, mixed>|null $options
 * @property array<array-key, mixed>|null $options_with_value
 * @property string|null $log_filename
 * @property int $even_in_maintenance_mode
 * @property int $without_overlapping
 * @property int $on_one_server
 * @property string|null $webhook_before
 * @property string|null $webhook_after
 * @property string|null $email_output
 * @property int $sendmail_error
 * @property int $log_success
 * @property int $log_error
 * @property int $run_in_background
 * @property int $sendmail_success
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @method static Builder<static>|Schedule whereCommand($value)
 * @method static Builder<static>|Schedule whereCommandCustom($value)
 * @method static Builder<static>|Schedule whereCreatedAt($value)
 * @method static Builder<static>|Schedule whereCreatedBy($value)
 * @method static Builder<static>|Schedule whereDeletedAt($value)
 * @method static Builder<static>|Schedule whereDeletedBy($value)
 * @method static Builder<static>|Schedule whereEmailOutput($value)
 * @method static Builder<static>|Schedule whereEnvironments($value)
 * @method static Builder<static>|Schedule whereEvenInMaintenanceMode($value)
 * @method static Builder<static>|Schedule whereExpression($value)
 * @method static Builder<static>|Schedule whereId($value)
 * @method static Builder<static>|Schedule whereLogError($value)
 * @method static Builder<static>|Schedule whereLogFilename($value)
 * @method static Builder<static>|Schedule whereLogSuccess($value)
 * @method static Builder<static>|Schedule whereOnOneServer($value)
 * @method static Builder<static>|Schedule whereOptions($value)
 * @method static Builder<static>|Schedule whereOptionsWithValue($value)
 * @method static Builder<static>|Schedule whereParams($value)
 * @method static Builder<static>|Schedule whereRunInBackground($value)
 * @method static Builder<static>|Schedule whereSendmailError($value)
 * @method static Builder<static>|Schedule whereSendmailSuccess($value)
 * @method static Builder<static>|Schedule whereStatus($value)
 * @method static Builder<static>|Schedule whereUpdatedAt($value)
 * @method static Builder<static>|Schedule whereUpdatedBy($value)
 * @method static Builder<static>|Schedule whereWebhookAfter($value)
 * @method static Builder<static>|Schedule whereWebhookBefore($value)
 * @method static Builder<static>|Schedule whereWithoutOverlapping($value)
 * @mixin \Eloquent
 */
	class Schedule extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\ScheduleHistory.
 *
 * @property-read Schedule|null $command
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|ScheduleHistory newModelQuery()
 * @method static Builder<static>|ScheduleHistory newQuery()
 * @method static Builder<static>|ScheduleHistory query()
 * @property string $id
 * @property array<array-key, mixed>|null $params
 * @property string $output
 * @property array<array-key, mixed>|null $options
 * @property int|null $schedule_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|ScheduleHistory whereCommand($value)
 * @method static Builder<static>|ScheduleHistory whereCreatedAt($value)
 * @method static Builder<static>|ScheduleHistory whereCreatedBy($value)
 * @method static Builder<static>|ScheduleHistory whereDeletedAt($value)
 * @method static Builder<static>|ScheduleHistory whereDeletedBy($value)
 * @method static Builder<static>|ScheduleHistory whereId($value)
 * @method static Builder<static>|ScheduleHistory whereOptions($value)
 * @method static Builder<static>|ScheduleHistory whereOutput($value)
 * @method static Builder<static>|ScheduleHistory whereParams($value)
 * @method static Builder<static>|ScheduleHistory whereScheduleId($value)
 * @method static Builder<static>|ScheduleHistory whereUpdatedAt($value)
 * @method static Builder<static>|ScheduleHistory whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class ScheduleHistory extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Task.
 *
 * @property-read Profile|null $creator
 * @property-read Collection<int, Frequency> $frequencies
 * @property-read int|null $frequencies_count
 * @property-read bool $activated
 * @property-read float $average_runtime
 * @property-read Result|null $last_result
 * @property-read string $upcoming
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Result> $results
 * @property-read int|null $results_count
 * @property-read Profile|null $updater
 * @method static \Modules\Job\Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static Builder<static>|Task newModelQuery()
 * @method static Builder<static>|Task newQuery()
 * @method static Builder<static>|Task query()
 * @method static Builder<static>|Task sortableBy(array $sortableColumns, array $defaultSort = [])
 * @property int $id
 * @property string $description
 * @property string $command
 * @property string|null $parameters
 * @property string|null $expression
 * @property string $timezone
 * @property int $is_active
 * @property int $dont_overlap
 * @property int $run_in_maintenance
 * @property string|null $notification_email_address
 * @property string|null $notification_phone_number
 * @property string $notification_slack_webhook
 * @property int $auto_cleanup_num
 * @property string|null $auto_cleanup_type
 * @property int $run_on_one_server
 * @property int $run_in_background
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Task whereAutoCleanupNum($value)
 * @method static Builder<static>|Task whereAutoCleanupType($value)
 * @method static Builder<static>|Task whereCommand($value)
 * @method static Builder<static>|Task whereCreatedAt($value)
 * @method static Builder<static>|Task whereCreatedBy($value)
 * @method static Builder<static>|Task whereDeletedAt($value)
 * @method static Builder<static>|Task whereDeletedBy($value)
 * @method static Builder<static>|Task whereDescription($value)
 * @method static Builder<static>|Task whereDontOverlap($value)
 * @method static Builder<static>|Task whereExpression($value)
 * @method static Builder<static>|Task whereId($value)
 * @method static Builder<static>|Task whereIsActive($value)
 * @method static Builder<static>|Task whereNotificationEmailAddress($value)
 * @method static Builder<static>|Task whereNotificationPhoneNumber($value)
 * @method static Builder<static>|Task whereNotificationSlackWebhook($value)
 * @method static Builder<static>|Task whereParameters($value)
 * @method static Builder<static>|Task whereRunInBackground($value)
 * @method static Builder<static>|Task whereRunInMaintenance($value)
 * @method static Builder<static>|Task whereRunOnOneServer($value)
 * @method static Builder<static>|Task whereTimezone($value)
 * @method static Builder<static>|Task whereUpdatedAt($value)
 * @method static Builder<static>|Task whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Task extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Class TaskComment.
 *
 * @property-read Profile|null $creator
 * @property-read Task|null $task
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|TaskComment newModelQuery()
 * @method static Builder<static>|TaskComment newQuery()
 * @method static Builder<static>|TaskComment query()
 * @mixin \Eloquent
 */
	class TaskComment extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * Modules\Lang\Models\LanguageLine.
 *
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @method static EloquentBuilder<static>|LanguageLine newModelQuery()
 * @method static EloquentBuilder<static>|LanguageLine newQuery()
 * @method static EloquentBuilder<static>|LanguageLine query()
 * @property int $id
 * @property string $group
 * @property string $key
 * @property array<array-key, mixed> $text
 * @property string $locale
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static EloquentBuilder<static>|LanguageLine whereCreatedAt($value)
 * @method static EloquentBuilder<static>|LanguageLine whereCreatedBy($value)
 * @method static EloquentBuilder<static>|LanguageLine whereGroup($value)
 * @method static EloquentBuilder<static>|LanguageLine whereId($value)
 * @method static EloquentBuilder<static>|LanguageLine whereKey($value)
 * @method static EloquentBuilder<static>|LanguageLine whereLocale($value)
 * @method static EloquentBuilder<static>|LanguageLine whereText($value)
 * @method static EloquentBuilder<static>|LanguageLine whereUpdatedAt($value)
 * @method static EloquentBuilder<static>|LanguageLine whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class LanguageLine extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * Modules\Lang\Models\Post.
 *
 * @property-read Profile|null $creator
 * @property-read string|null $guid
 * @property string|null $title
 * @property-read string|null $txt
 * @property-read Model $linkable
 * @property-read Profile|null $updater
 * @method static \Modules\Lang\Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static Builder<static>|Post newModelQuery()
 * @method static Builder<static>|Post newQuery()
 * @method static Builder<static>|Post query()
 * @mixin \Eloquent
 */
	class Post extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * Modules\Lang\Models\Translation.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static EloquentBuilder<static>|Translation newModelQuery()
 * @method static EloquentBuilder<static>|Translation newQuery()
 * @method static EloquentBuilder<static>|Translation ofTranslatedGroup(string $group)
 * @method static EloquentBuilder<static>|Translation orderByGroupKeys(bool $ordered)
 * @method static EloquentBuilder<static>|Translation query()
 * @method static EloquentBuilder<static>|Translation selectDistinctGroup()
 * @mixin \Eloquent
 */
	class Translation extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * @property int $id
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|TranslationFile newModelQuery()
 * @method static Builder<static>|TranslationFile newQuery()
 * @method static Builder<static>|TranslationFile query()
 * @method static Builder<static>|TranslationFile whereId($value)
 * @mixin \Eloquent
 */
	class TranslationFile extends \Eloquent {}
}

namespace Modules\Media\Models{
/**
 * @property-read User|null $creator
 * @property-read mixed $extension
 * @property-read \Modules\Media\Models\array<int, array{name: $entry_conversions
 * @property-read mixed $human_readable_size
 * @property-read EloquentCollection<int, MediaConvert> $mediaConverts
 * @property-read int|null $media_converts_count
 * @property-read Model|Eloquent $model
 * @property-read mixed $original_url
 * @property-read mixed $preview_url
 * @property-read TemporaryUpload|null $temporaryUpload
 * @property-read mixed $type
 * @property-read Profile|null $updater
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static \Modules\Media\Database\Factories\MediaFactory factory($count = null, $state = [])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static Builder<static>|Media newModelQuery()
 * @method static Builder<static>|Media newQuery()
 * @method static Builder<static>|Media ordered()
 * @method static Builder<static>|Media query()
 * @property string $id
 * @property string $model_type
 * @property string|null $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array<array-key, mixed> $manipulations
 * @property array<array-key, mixed> $custom_properties
 * @property array<array-key, mixed> $generated_conversions
 * @property array<array-key, mixed> $responsive_images
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property-read \Modules\Media\Models\array<int, array{name: $entry_conversions
 * @method static Builder<static>|Media whereCollectionName($value)
 * @method static Builder<static>|Media whereConversionsDisk($value)
 * @method static Builder<static>|Media whereCreatedAt($value)
 * @method static Builder<static>|Media whereCreatedBy($value)
 * @method static Builder<static>|Media whereCustomProperties($value)
 * @method static Builder<static>|Media whereDeletedAt($value)
 * @method static Builder<static>|Media whereDeletedBy($value)
 * @method static Builder<static>|Media whereDisk($value)
 * @method static Builder<static>|Media whereFileName($value)
 * @method static Builder<static>|Media whereGeneratedConversions($value)
 * @method static Builder<static>|Media whereId($value)
 * @method static Builder<static>|Media whereManipulations($value)
 * @method static Builder<static>|Media whereMimeType($value)
 * @method static Builder<static>|Media whereModelId($value)
 * @method static Builder<static>|Media whereModelType($value)
 * @method static Builder<static>|Media whereName($value)
 * @method static Builder<static>|Media whereOrderColumn($value)
 * @method static Builder<static>|Media whereResponsiveImages($value)
 * @method static Builder<static>|Media whereSize($value)
 * @method static Builder<static>|Media whereUpdatedAt($value)
 * @method static Builder<static>|Media whereUpdatedBy($value)
 * @method static Builder<static>|Media whereUuid($value)
 * @mixin Eloquent
 * @property-read \Modules\Media\Models\array<int, array{name: $entry_conversions
 */
	class Media extends \Eloquent {}
}

namespace Modules\Media\Models{
/**
 * @property-read Profile|null $creator
 * @property-read string|null $converted_file
 * @property-read string|null $disk
 * @property-read string|null $file
 * @property-read Media|null $media
 * @property-read Profile|null $updater
 * @method static Builder<static>|MediaConvert newModelQuery()
 * @method static Builder<static>|MediaConvert newQuery()
 * @method static Builder<static>|MediaConvert query()
 * @property string $id
 * @property int $media_id
 * @property string|null $format
 * @property string|null $codec_video
 * @property string|null $codec_audio
 * @property string|null $preset
 * @property string|null $bitrate
 * @property int|null $width
 * @property int|null $height
 * @property int|null $threads
 * @property int|null $speed
 * @property numeric|null $percentage
 * @property numeric|null $remaining
 * @property numeric|null $rate
 * @property numeric|null $execution_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|MediaConvert whereBitrate($value)
 * @method static Builder<static>|MediaConvert whereCodecAudio($value)
 * @method static Builder<static>|MediaConvert whereCodecVideo($value)
 * @method static Builder<static>|MediaConvert whereCreatedAt($value)
 * @method static Builder<static>|MediaConvert whereCreatedBy($value)
 * @method static Builder<static>|MediaConvert whereDeletedAt($value)
 * @method static Builder<static>|MediaConvert whereDeletedBy($value)
 * @method static Builder<static>|MediaConvert whereExecutionTime($value)
 * @method static Builder<static>|MediaConvert whereFormat($value)
 * @method static Builder<static>|MediaConvert whereHeight($value)
 * @method static Builder<static>|MediaConvert whereId($value)
 * @method static Builder<static>|MediaConvert whereMediaId($value)
 * @method static Builder<static>|MediaConvert wherePercentage($value)
 * @method static Builder<static>|MediaConvert wherePreset($value)
 * @method static Builder<static>|MediaConvert whereRate($value)
 * @method static Builder<static>|MediaConvert whereRemaining($value)
 * @method static Builder<static>|MediaConvert whereSpeed($value)
 * @method static Builder<static>|MediaConvert whereThreads($value)
 * @method static Builder<static>|MediaConvert whereUpdatedAt($value)
 * @method static Builder<static>|MediaConvert whereUpdatedBy($value)
 * @method static Builder<static>|MediaConvert whereWidth($value)
 * @mixin \Eloquent
 */
	class MediaConvert extends \Eloquent {}
}

namespace Modules\Media\Models{
/**
 * Modules\Media\Models\TemporaryUpload.
 *
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, \Modules\Media\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Profile|null $updater
 * @method static \Modules\Media\Database\Factories\TemporaryUploadFactory factory($count = null, $state = [])
 * @method static Builder<static>|TemporaryUpload newModelQuery()
 * @method static Builder<static>|TemporaryUpload newQuery()
 * @method static Builder<static>|TemporaryUpload query()
 * @property string $id
 * @property string $session_id
 * @property string|null $user_id
 * @property string $file_name
 * @property int|null $file_size
 * @property string|null $mime_type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|TemporaryUpload whereCreatedAt($value)
 * @method static Builder<static>|TemporaryUpload whereCreatedBy($value)
 * @method static Builder<static>|TemporaryUpload whereDeletedAt($value)
 * @method static Builder<static>|TemporaryUpload whereDeletedBy($value)
 * @method static Builder<static>|TemporaryUpload whereFileName($value)
 * @method static Builder<static>|TemporaryUpload whereFileSize($value)
 * @method static Builder<static>|TemporaryUpload whereId($value)
 * @method static Builder<static>|TemporaryUpload whereMimeType($value)
 * @method static Builder<static>|TemporaryUpload whereSessionId($value)
 * @method static Builder<static>|TemporaryUpload whereStatus($value)
 * @method static Builder<static>|TemporaryUpload whereUpdatedAt($value)
 * @method static Builder<static>|TemporaryUpload whereUpdatedBy($value)
 * @method static Builder<static>|TemporaryUpload whereUserId($value)
 * @mixin \Eloquent
 */
	class TemporaryUpload extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Notify\Models{
/**
 * Modules\Notify\Models\Contact.
 *
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, \Modules\Media\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|Contact newModelQuery()
 * @method static Builder<static>|Contact newQuery()
 * @method static Builder<static>|Contact query()
 * @property string $id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $contact_type
 * @property string|null $value
 * @property string|null $user_id
 * @property string|null $verified_at
 * @property string|null $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
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
 * @mixin \Eloquent
 */
	class Contact extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate query()
 * @mixin \Eloquent
 */
	class EmailTemplate extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property-read array $translatable_columns_from
 * @property-read array $variables
 * @property-read mixed $translations
 * @method static Builder<static>|MailTemplate forMailable(\Illuminate\Contracts\Mail\Mailable $mailable)
 * @method static Builder<static>|MailTemplate newModelQuery()
 * @method static Builder<static>|MailTemplate newQuery()
 * @method static Builder<static>|MailTemplate query()
 * @method static Builder<static>|MailTemplate whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|MailTemplate whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|MailTemplate whereLocale(string $column, string $locale)
 * @method static Builder<static>|MailTemplate whereLocales(string $column, array $locales)
 * @property int $id
 * @property string|null $name
 * @property string|null $mailable
 * @property string|null $slug
 * @property array<array-key, mixed>|null $subject
 * @property array<array-key, mixed>|null $html_template
 * @property array<array-key, mixed>|null $text_template
 * @property string $version
 * @property string|null $params
 * @property array<array-key, mixed>|null $sms_template
 * @property int $counter
 * @property string|null $html_layout_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|MailTemplate whereCounter($value)
 * @method static Builder<static>|MailTemplate whereCreatedAt($value)
 * @method static Builder<static>|MailTemplate whereCreatedBy($value)
 * @method static Builder<static>|MailTemplate whereDeletedAt($value)
 * @method static Builder<static>|MailTemplate whereDeletedBy($value)
 * @method static Builder<static>|MailTemplate whereHtmlLayoutPath($value)
 * @method static Builder<static>|MailTemplate whereHtmlTemplate($value)
 * @method static Builder<static>|MailTemplate whereId($value)
 * @method static Builder<static>|MailTemplate whereMailable($value)
 * @method static Builder<static>|MailTemplate whereName($value)
 * @method static Builder<static>|MailTemplate whereParams($value)
 * @method static Builder<static>|MailTemplate whereSlug($value)
 * @method static Builder<static>|MailTemplate whereSmsTemplate($value)
 * @method static Builder<static>|MailTemplate whereSubject($value)
 * @method static Builder<static>|MailTemplate whereTextTemplate($value)
 * @method static Builder<static>|MailTemplate whereUpdatedAt($value)
 * @method static Builder<static>|MailTemplate whereUpdatedBy($value)
 * @method static Builder<static>|MailTemplate whereVersion($value)
 * @mixin \Eloquent
 */
	class MailTemplate extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Model $mailable
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read MailTemplate|null $template
 * @property-read Profile|null $updater
 * @method static Builder<static>|MailTemplateLog newModelQuery()
 * @method static Builder<static>|MailTemplateLog newQuery()
 * @method static Builder<static>|MailTemplateLog query()
 * @mixin \Eloquent
 */
	class MailTemplateLog extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read MailTemplate|null $template
 * @property-read Profile|null $updater
 * @method static Builder<static>|MailTemplateVersion newModelQuery()
 * @method static Builder<static>|MailTemplateVersion newQuery()
 * @method static Builder<static>|MailTemplateVersion onlyTrashed()
 * @method static Builder<static>|MailTemplateVersion query()
 * @method static Builder<static>|MailTemplateVersion withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|MailTemplateVersion withoutTrashed()
 * @property string $id
 * @property int $mail_template_id
 * @property int $version
 * @property string|null $subject
 * @property string $html_template
 * @property string|null $text_template
 * @property array<array-key, mixed>|null $metadata
 * @property string|null $created_by
 * @property string|null $change_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|MailTemplateVersion whereChangeNotes($value)
 * @method static Builder<static>|MailTemplateVersion whereCreatedAt($value)
 * @method static Builder<static>|MailTemplateVersion whereCreatedBy($value)
 * @method static Builder<static>|MailTemplateVersion whereDeletedAt($value)
 * @method static Builder<static>|MailTemplateVersion whereDeletedBy($value)
 * @method static Builder<static>|MailTemplateVersion whereHtmlTemplate($value)
 * @method static Builder<static>|MailTemplateVersion whereId($value)
 * @method static Builder<static>|MailTemplateVersion whereMailTemplateId($value)
 * @method static Builder<static>|MailTemplateVersion whereMetadata($value)
 * @method static Builder<static>|MailTemplateVersion whereSubject($value)
 * @method static Builder<static>|MailTemplateVersion whereTextTemplate($value)
 * @method static Builder<static>|MailTemplateVersion whereUpdatedAt($value)
 * @method static Builder<static>|MailTemplateVersion whereUpdatedBy($value)
 * @method static Builder<static>|MailTemplateVersion whereVersion($value)
 * @mixin \Eloquent
 */
	class MailTemplateVersion extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Notification model for the Notify module.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Notify\Database\Factories\NotificationFactory factory($count = null, $state = [])
 * @method static Builder<static>|Notification newModelQuery()
 * @method static Builder<static>|Notification newQuery()
 * @method static Builder<static>|Notification query()
 * @property string $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property array<array-key, mixed> $data
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Notification whereCreatedAt($value)
 * @method static Builder<static>|Notification whereCreatedBy($value)
 * @method static Builder<static>|Notification whereData($value)
 * @method static Builder<static>|Notification whereDeletedAt($value)
 * @method static Builder<static>|Notification whereDeletedBy($value)
 * @method static Builder<static>|Notification whereId($value)
 * @method static Builder<static>|Notification whereNotifiableId($value)
 * @method static Builder<static>|Notification whereNotifiableType($value)
 * @method static Builder<static>|Notification whereReadAt($value)
 * @method static Builder<static>|Notification whereType($value)
 * @method static Builder<static>|Notification whereUpdatedAt($value)
 * @method static Builder<static>|Notification whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Notification extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Profile|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel query()
 * @mixin \Eloquent
 */
	class NotificationChannel extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Model $notifiable
 * @property-read NotificationTemplate|null $template
 * @property-read Profile|null $updater
 * @method static Builder<static>|NotificationLog forChannel(string $channel)
 * @method static Builder<static>|NotificationLog forNotifiable(\Illuminate\Database\Eloquent\Model $notifiable)
 * @method static Builder<static>|NotificationLog newModelQuery()
 * @method static Builder<static>|NotificationLog newQuery()
 * @method static Builder<static>|NotificationLog query()
 * @method static Builder<static>|NotificationLog withStatus(string $status)
 * @property string $id
 * @property string|null $template_id
 * @property string $notifiable_type
 * @property string $notifiable_id
 * @property string $channel
 * @property string $status
 * @property string|null $status_message
 * @property array<array-key, mixed>|null $data
 * @property array<array-key, mixed>|null $metadata
 * @property string|null $tenant_id
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $failed_at
 * @property \Illuminate\Support\Carbon|null $opened_at
 * @property \Illuminate\Support\Carbon|null $clicked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
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
 * @method static Builder<static>|NotificationLog whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class NotificationLog extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Class NotificationTemplate.
 *
 * @property NotificationTypeEnum $type
 * @property-read Profile|null $creator
 * @property-read string $channels_label
 * @property-read array $translatable_columns_from
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $translations
 * @property-read Profile|null $updater
 * @method static Builder<static>|NotificationTemplate active()
 * @method static Builder<static>|NotificationTemplate forCategory(string $category)
 * @method static Builder<static>|NotificationTemplate forChannel(string $channel)
 * @method static Builder<static>|NotificationTemplate newModelQuery()
 * @method static Builder<static>|NotificationTemplate newQuery()
 * @method static Builder<static>|NotificationTemplate query()
 * @method static Builder<static>|NotificationTemplate whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|NotificationTemplate whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|NotificationTemplate whereLocale(string $column, string $locale)
 * @method static Builder<static>|NotificationTemplate whereLocales(string $column, array $locales)
 * @mixin \Eloquent
 */
	class NotificationTemplate extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read NotificationTemplate|null $template
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @method static Builder<static>|NotificationTemplateVersion newModelQuery()
 * @method static Builder<static>|NotificationTemplateVersion newQuery()
 * @method static Builder<static>|NotificationTemplateVersion query()
 * @mixin \Eloquent
 */
	class NotificationTemplateVersion extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @method static Builder<static>|NotificationType newModelQuery()
 * @method static Builder<static>|NotificationType newQuery()
 * @method static Builder<static>|NotificationType query()
 * @mixin \Eloquent
 */
	class NotificationType extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Modules\Notify\Models\NotifyTheme.
 *
 * @property-read Profile|null $creator
 * @property-read array{path: string, width: int, height: int} $logo
 * @property-read Model $linkable
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|NotifyTheme newModelQuery()
 * @method static Builder<static>|NotifyTheme newQuery()
 * @method static Builder<static>|NotifyTheme query()
 * @property string $id
 * @property string|null $lang
 * @property string|null $type
 * @property string|null $subject
 * @property string|null $body
 * @property string|null $from
 * @property string|null $post_type
 * @property int|null $post_id
 * @property string|null $body_html
 * @property string|null $theme
 * @property string|null $from_email
 * @property string|null $logo_src
 * @property int|null $logo_width
 * @property int|null $logo_height
 * @property array<array-key, mixed>|null $view_params
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|NotifyTheme whereBody($value)
 * @method static Builder<static>|NotifyTheme whereBodyHtml($value)
 * @method static Builder<static>|NotifyTheme whereCreatedAt($value)
 * @method static Builder<static>|NotifyTheme whereCreatedBy($value)
 * @method static Builder<static>|NotifyTheme whereDeletedAt($value)
 * @method static Builder<static>|NotifyTheme whereDeletedBy($value)
 * @method static Builder<static>|NotifyTheme whereFrom($value)
 * @method static Builder<static>|NotifyTheme whereFromEmail($value)
 * @method static Builder<static>|NotifyTheme whereId($value)
 * @method static Builder<static>|NotifyTheme whereLang($value)
 * @method static Builder<static>|NotifyTheme whereLogoHeight($value)
 * @method static Builder<static>|NotifyTheme whereLogoSrc($value)
 * @method static Builder<static>|NotifyTheme whereLogoWidth($value)
 * @method static Builder<static>|NotifyTheme wherePostId($value)
 * @method static Builder<static>|NotifyTheme wherePostType($value)
 * @method static Builder<static>|NotifyTheme whereSubject($value)
 * @method static Builder<static>|NotifyTheme whereTheme($value)
 * @method static Builder<static>|NotifyTheme whereType($value)
 * @method static Builder<static>|NotifyTheme whereUpdatedAt($value)
 * @method static Builder<static>|NotifyTheme whereUpdatedBy($value)
 * @method static Builder<static>|NotifyTheme whereViewParams($value)
 * @mixin Eloquent
 */
	class NotifyTheme extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Modules\Notify\Models\NotifyThemeable.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|NotifyThemeable newModelQuery()
 * @method static Builder<static>|NotifyThemeable newQuery()
 * @method static Builder<static>|NotifyThemeable query()
 * @property string $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property int|null $notify_theme_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|NotifyThemeable whereCreatedAt($value)
 * @method static Builder<static>|NotifyThemeable whereCreatedBy($value)
 * @method static Builder<static>|NotifyThemeable whereDeletedAt($value)
 * @method static Builder<static>|NotifyThemeable whereDeletedBy($value)
 * @method static Builder<static>|NotifyThemeable whereId($value)
 * @method static Builder<static>|NotifyThemeable whereModelId($value)
 * @method static Builder<static>|NotifyThemeable whereModelType($value)
 * @method static Builder<static>|NotifyThemeable whereNotifyThemeId($value)
 * @method static Builder<static>|NotifyThemeable whereUpdatedAt($value)
 * @method static Builder<static>|NotifyThemeable whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class NotifyThemeable extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Theme query()
 * @mixin \Eloquent
 */
	class Theme extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @property-read Client|null $client
 * @property-read Collection<int, Machine> $machines
 * @property-read int|null $machines_count
 * @method static Builder<static>|Appointment newModelQuery()
 * @method static Builder<static>|Appointment newQuery()
 * @method static Builder<static>|Appointment query()
 * @property int $id
 * @property int|null $client_id
 * @property string $date
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Appointment whereClientId($value)
 * @method static Builder<static>|Appointment whereCreatedAt($value)
 * @method static Builder<static>|Appointment whereCreatedBy($value)
 * @method static Builder<static>|Appointment whereDate($value)
 * @method static Builder<static>|Appointment whereDeletedAt($value)
 * @method static Builder<static>|Appointment whereDeletedBy($value)
 * @method static Builder<static>|Appointment whereId($value)
 * @method static Builder<static>|Appointment whereNotes($value)
 * @method static Builder<static>|Appointment whereUpdatedAt($value)
 * @method static Builder<static>|Appointment whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Appointment extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class Client.
 *
 * @property-read Address|null $address
 * @property-read Collection<int, Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read Collection<int, Appointment> $appointments
 * @property-read int|null $appointments_count
 * @property-read Profile|null $creator
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string $contacts_html
 * @property-read string $full_address
 * @property-read string|null $full_addresses
 * @property-read Collection<int, LegalOffice> $legalOffices
 * @property-read int|null $legal_offices_count
 * @property-read Collection<int, LegalRepresentative> $legalRepresentatives
 * @property-read int|null $legal_representatives_count
 * @property-read Collection<int, MedicalDirector> $medicalDirectors
 * @property-read int|null $medical_directors_count
 * @property-read Collection<int, PhoneCall> $phoneCalls
 * @property-read int|null $phone_calls_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|Client inCity(string $city)
 * @method static Builder<static>|Client inPostalCode(string $postalCode)
 * @method static Builder<static>|Client inProvince(string $province)
 * @method static Builder<static>|Client inRegion(string $region)
 * @method static Builder<static>|Client newModelQuery()
 * @method static Builder<static>|Client newQuery()
 * @method static Builder<static>|Client orderByDistance(float $latitude, float $longitude)
 * @method static Builder<static>|Client query()
 * @method static Builder<static>|Client withDistance(float $latitude, float $longitude)
 * @property int $id
 * @property string|null $vat_number
 * @property string|null $fiscal_code
 * @property string|null $name Location name
 * @property string|null $route Street name (Via/Piazza)
 * @property string|null $street_number Street number
 * @property string|null $locality City/Municipality
 * @property string|null $administrative_area_level_3 Comune
 * @property string|null $administrative_area_level_2 Provincia
 * @property string|null $administrative_area_level_1 Regione
 * @property string|null $country Country/Stato
 * @property string|null $postal_code CAP/Postal Code
 * @property float|null $latitude Latitude coordinate
 * @property float|null $longitude Longitude coordinate
 * @property string|null $notes General notes
 * @property string|null $city Legacy city field
 * @property string|null $province Legacy province field
 * @property string|null $region Legacy region field
 * @property string|null $cap Legacy CAP field
 * @property bool $business_closed
 * @property string|null $competent_health_unit Az ULSS competente
 * @property string|null $tax_code Codice fiscale
 * @property string|null $company_name Ragione sociale
 * @property string|null $company_office Sede ditta
 * @property string|null $activity Attività
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Client whereActivity($value)
 * @method static Builder<static>|Client whereAddress($value)
 * @method static Builder<static>|Client whereAdministrativeAreaLevel1($value)
 * @method static Builder<static>|Client whereAdministrativeAreaLevel2($value)
 * @method static Builder<static>|Client whereAdministrativeAreaLevel3($value)
 * @method static Builder<static>|Client whereBusinessClosed($value)
 * @method static Builder<static>|Client whereCap($value)
 * @method static Builder<static>|Client whereCity($value)
 * @method static Builder<static>|Client whereCompanyName($value)
 * @method static Builder<static>|Client whereCompanyOffice($value)
 * @method static Builder<static>|Client whereCompetentHealthUnit($value)
 * @method static Builder<static>|Client whereCountry($value)
 * @method static Builder<static>|Client whereCreatedAt($value)
 * @method static Builder<static>|Client whereCreatedBy($value)
 * @method static Builder<static>|Client whereDeletedAt($value)
 * @method static Builder<static>|Client whereDeletedBy($value)
 * @method static Builder<static>|Client whereFiscalCode($value)
 * @method static Builder<static>|Client whereId($value)
 * @method static Builder<static>|Client whereLatitude($value)
 * @method static Builder<static>|Client whereLocality($value)
 * @method static Builder<static>|Client whereLongitude($value)
 * @method static Builder<static>|Client whereName($value)
 * @method static Builder<static>|Client whereNotes($value)
 * @method static Builder<static>|Client wherePostalCode($value)
 * @method static Builder<static>|Client whereProvince($value)
 * @method static Builder<static>|Client whereRegion($value)
 * @method static Builder<static>|Client whereRoute($value)
 * @method static Builder<static>|Client whereStreetNumber($value)
 * @method static Builder<static>|Client whereTaxCode($value)
 * @method static Builder<static>|Client whereUpdatedAt($value)
 * @method static Builder<static>|Client whereUpdatedBy($value)
 * @method static Builder<static>|Client whereVatNumber($value)
 * @mixin \Eloquent
 */
	class Client extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class Device.
 *
 * @property-read Client|null $client
 * @property-read Profile|null $creator
 * @property-read DeviceVerification|null $latest_verification
 * @property-read bool $needs_verification
 * @property-read Profile|null $updater
 * @property-read Collection<int, DeviceVerification> $verifications
 * @property-read int|null $verifications_count
 * @method static Builder<static>|Device newModelQuery()
 * @method static Builder<static>|Device newQuery()
 * @method static Builder<static>|Device query()
 * @property int $id
 * @property int $appointment_id
 * @property string|null $name
 * @property string|null $status
 * @property string|null $notes
 * @property int|null $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $headset_serial
 * @property string|null $tube_serial
 * @property numeric|null $kv
 * @property numeric|null $ma
 * @property string|null $serial_number
 * @property string|null $inventory_number
 * @property string|null $purchase_date
 * @property \Illuminate\Support\Carbon|null $first_verification_date
 * @property string|null $warranty_expiration
 * @method static Builder<static>|Device whereAppointmentId($value)
 * @method static Builder<static>|Device whereBrand($value)
 * @method static Builder<static>|Device whereClientId($value)
 * @method static Builder<static>|Device whereCreatedAt($value)
 * @method static Builder<static>|Device whereCreatedBy($value)
 * @method static Builder<static>|Device whereDeletedAt($value)
 * @method static Builder<static>|Device whereDeletedBy($value)
 * @method static Builder<static>|Device whereFirstVerificationDate($value)
 * @method static Builder<static>|Device whereHeadsetSerial($value)
 * @method static Builder<static>|Device whereId($value)
 * @method static Builder<static>|Device whereInventoryNumber($value)
 * @method static Builder<static>|Device whereKv($value)
 * @method static Builder<static>|Device whereMa($value)
 * @method static Builder<static>|Device whereModel($value)
 * @method static Builder<static>|Device whereName($value)
 * @method static Builder<static>|Device whereNotes($value)
 * @method static Builder<static>|Device wherePurchaseDate($value)
 * @method static Builder<static>|Device whereSerialNumber($value)
 * @method static Builder<static>|Device whereStatus($value)
 * @method static Builder<static>|Device whereTubeSerial($value)
 * @method static Builder<static>|Device whereType($value)
 * @method static Builder<static>|Device whereUpdatedAt($value)
 * @method static Builder<static>|Device whereUpdatedBy($value)
 * @method static Builder<static>|Device whereWarrantyExpiration($value)
 * @mixin \Eloquent
 */
	class Device extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class DeviceVerification.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|DeviceVerification newModelQuery()
 * @method static Builder<static>|DeviceVerification newQuery()
 * @method static Builder<static>|DeviceVerification query()
 * @property int $id
 * @property int $device_id
 * @property string $verification_date
 * @property string $next_verification_date
 * @property string $result
 * @property string $exposure_parameters
 * @property string $verification_type
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|DeviceVerification whereCreatedAt($value)
 * @method static Builder<static>|DeviceVerification whereCreatedBy($value)
 * @method static Builder<static>|DeviceVerification whereDeletedAt($value)
 * @method static Builder<static>|DeviceVerification whereDeletedBy($value)
 * @method static Builder<static>|DeviceVerification whereDeviceId($value)
 * @method static Builder<static>|DeviceVerification whereExposureParameters($value)
 * @method static Builder<static>|DeviceVerification whereId($value)
 * @method static Builder<static>|DeviceVerification whereNextVerificationDate($value)
 * @method static Builder<static>|DeviceVerification whereNotes($value)
 * @method static Builder<static>|DeviceVerification whereResult($value)
 * @method static Builder<static>|DeviceVerification whereUpdatedAt($value)
 * @method static Builder<static>|DeviceVerification whereUpdatedBy($value)
 * @method static Builder<static>|DeviceVerification whereVerificationDate($value)
 * @method static Builder<static>|DeviceVerification whereVerificationType($value)
 * @mixin \Eloquent
 */
	class DeviceVerification extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @method static \Modules\TechPlanner\Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event query()
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $start_at
 * @property string $end_at
 * @property string|null $status
 * @method static Builder<static>|Event whereDescription($value)
 * @method static Builder<static>|Event whereEndAt($value)
 * @method static Builder<static>|Event whereId($value)
 * @method static Builder<static>|Event whereName($value)
 * @method static Builder<static>|Event whereStartAt($value)
 * @method static Builder<static>|Event whereStatus($value)
 * @mixin \Eloquent
 */
	class Event extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class LegalOffice.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|LegalOffice newModelQuery()
 * @method static Builder<static>|LegalOffice newQuery()
 * @method static Builder<static>|LegalOffice query()
 * @property int $id
 * @property int $client_id
 * @property string $name
 * @property string|null $address
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $province
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|LegalOffice whereAddress($value)
 * @method static Builder<static>|LegalOffice whereCity($value)
 * @method static Builder<static>|LegalOffice whereClientId($value)
 * @method static Builder<static>|LegalOffice whereCreatedAt($value)
 * @method static Builder<static>|LegalOffice whereCreatedBy($value)
 * @method static Builder<static>|LegalOffice whereDeletedAt($value)
 * @method static Builder<static>|LegalOffice whereDeletedBy($value)
 * @method static Builder<static>|LegalOffice whereEmail($value)
 * @method static Builder<static>|LegalOffice whereId($value)
 * @method static Builder<static>|LegalOffice whereName($value)
 * @method static Builder<static>|LegalOffice whereNotes($value)
 * @method static Builder<static>|LegalOffice wherePhone($value)
 * @method static Builder<static>|LegalOffice wherePostalCode($value)
 * @method static Builder<static>|LegalOffice whereProvince($value)
 * @method static Builder<static>|LegalOffice whereUpdatedAt($value)
 * @method static Builder<static>|LegalOffice whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class LegalOffice extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class LegalRepresentative.
 *
 * @property-read Client|null $client
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|LegalRepresentative newModelQuery()
 * @method static Builder<static>|LegalRepresentative newQuery()
 * @method static Builder<static>|LegalRepresentative query()
 * @property int $id
 * @property int $client_id
 * @property string $name
 * @property string|null $fiscal_code
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|LegalRepresentative whereClientId($value)
 * @method static Builder<static>|LegalRepresentative whereCreatedAt($value)
 * @method static Builder<static>|LegalRepresentative whereCreatedBy($value)
 * @method static Builder<static>|LegalRepresentative whereDeletedAt($value)
 * @method static Builder<static>|LegalRepresentative whereDeletedBy($value)
 * @method static Builder<static>|LegalRepresentative whereEmail($value)
 * @method static Builder<static>|LegalRepresentative whereFiscalCode($value)
 * @method static Builder<static>|LegalRepresentative whereId($value)
 * @method static Builder<static>|LegalRepresentative whereName($value)
 * @method static Builder<static>|LegalRepresentative whereNotes($value)
 * @method static Builder<static>|LegalRepresentative wherePhone($value)
 * @method static Builder<static>|LegalRepresentative whereUpdatedAt($value)
 * @method static Builder<static>|LegalRepresentative whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class LegalRepresentative extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @method static \Modules\TechPlanner\Database\Factories\LocationFactory factory($count = null, $state = [])
 * @method static Builder<static>|Location newModelQuery()
 * @method static Builder<static>|Location newQuery()
 * @method static Builder<static>|Location query()
 * @property int $id
 * @property string|null $model_type
 * @property string|null $model_id
 * @property string|null $name
 * @property string|null $lat
 * @property string|null $lng
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $formatted_address
 * @property string|null $description
 * @property int|null $processed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Location whereCity($value)
 * @method static Builder<static>|Location whereCreatedAt($value)
 * @method static Builder<static>|Location whereCreatedBy($value)
 * @method static Builder<static>|Location whereDeletedAt($value)
 * @method static Builder<static>|Location whereDeletedBy($value)
 * @method static Builder<static>|Location whereDescription($value)
 * @method static Builder<static>|Location whereFormattedAddress($value)
 * @method static Builder<static>|Location whereId($value)
 * @method static Builder<static>|Location whereLat($value)
 * @method static Builder<static>|Location whereLng($value)
 * @method static Builder<static>|Location whereModelId($value)
 * @method static Builder<static>|Location whereModelType($value)
 * @method static Builder<static>|Location whereName($value)
 * @method static Builder<static>|Location whereProcessed($value)
 * @method static Builder<static>|Location whereState($value)
 * @method static Builder<static>|Location whereStreet($value)
 * @method static Builder<static>|Location whereUpdatedAt($value)
 * @method static Builder<static>|Location whereUpdatedBy($value)
 * @method static Builder<static>|Location whereZip($value)
 * @mixin \Eloquent
 */
	class Location extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @property-read Appointment|null $appointment
 * @property-read Client|null $client
 * @property-read Profile|null $creator
 * @property-read DeviceVerification|null $latest_verification
 * @property-read bool $needs_verification
 * @property-read Profile|null $updater
 * @property-read Collection<int, DeviceVerification> $verifications
 * @property-read int|null $verifications_count
 * @method static Builder<static>|Machine newModelQuery()
 * @method static Builder<static>|Machine newQuery()
 * @method static Builder<static>|Machine query()
 * @property int $id
 * @property int $appointment_id
 * @property string|null $name
 * @property string|null $status
 * @property string|null $notes
 * @property int|null $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $headset_serial
 * @property string|null $tube_serial
 * @property numeric|null $kv
 * @property numeric|null $ma
 * @property string|null $serial_number
 * @property string|null $inventory_number
 * @property string|null $purchase_date
 * @property \Illuminate\Support\Carbon|null $first_verification_date
 * @property string|null $warranty_expiration
 * @method static Builder<static>|Machine whereAppointmentId($value)
 * @method static Builder<static>|Machine whereBrand($value)
 * @method static Builder<static>|Machine whereClientId($value)
 * @method static Builder<static>|Machine whereCreatedAt($value)
 * @method static Builder<static>|Machine whereCreatedBy($value)
 * @method static Builder<static>|Machine whereDeletedAt($value)
 * @method static Builder<static>|Machine whereDeletedBy($value)
 * @method static Builder<static>|Machine whereFirstVerificationDate($value)
 * @method static Builder<static>|Machine whereHeadsetSerial($value)
 * @method static Builder<static>|Machine whereId($value)
 * @method static Builder<static>|Machine whereInventoryNumber($value)
 * @method static Builder<static>|Machine whereKv($value)
 * @method static Builder<static>|Machine whereMa($value)
 * @method static Builder<static>|Machine whereModel($value)
 * @method static Builder<static>|Machine whereName($value)
 * @method static Builder<static>|Machine whereNotes($value)
 * @method static Builder<static>|Machine wherePurchaseDate($value)
 * @method static Builder<static>|Machine whereSerialNumber($value)
 * @method static Builder<static>|Machine whereStatus($value)
 * @method static Builder<static>|Machine whereTubeSerial($value)
 * @method static Builder<static>|Machine whereType($value)
 * @method static Builder<static>|Machine whereUpdatedAt($value)
 * @method static Builder<static>|Machine whereUpdatedBy($value)
 * @method static Builder<static>|Machine whereWarrantyExpiration($value)
 * @mixin \Eloquent
 */
	class Machine extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class MedicalDirector.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|MedicalDirector newModelQuery()
 * @method static Builder<static>|MedicalDirector newQuery()
 * @method static Builder<static>|MedicalDirector query()
 * @property int $id
 * @property int $client_id
 * @property string $name
 * @property string|null $fiscal_code
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|MedicalDirector whereClientId($value)
 * @method static Builder<static>|MedicalDirector whereCreatedAt($value)
 * @method static Builder<static>|MedicalDirector whereCreatedBy($value)
 * @method static Builder<static>|MedicalDirector whereDeletedAt($value)
 * @method static Builder<static>|MedicalDirector whereDeletedBy($value)
 * @method static Builder<static>|MedicalDirector whereEmail($value)
 * @method static Builder<static>|MedicalDirector whereFiscalCode($value)
 * @method static Builder<static>|MedicalDirector whereId($value)
 * @method static Builder<static>|MedicalDirector whereName($value)
 * @method static Builder<static>|MedicalDirector whereNotes($value)
 * @method static Builder<static>|MedicalDirector wherePhone($value)
 * @method static Builder<static>|MedicalDirector whereUpdatedAt($value)
 * @method static Builder<static>|MedicalDirector whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class MedicalDirector extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @method static \Modules\TechPlanner\Database\Factories\ParticipantFactory factory($count = null, $state = [])
 * @method static Builder<static>|Participant newModelQuery()
 * @method static Builder<static>|Participant newQuery()
 * @method static Builder<static>|Participant query()
 * @mixin \Eloquent
 */
	class Participant extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|PhoneCall newModelQuery()
 * @method static Builder<static>|PhoneCall newQuery()
 * @method static Builder<static>|PhoneCall query()
 * @property int $id
 * @property int|null $client_id
 * @property \Illuminate\Support\Carbon $date
 * @property int|null $duration
 * @property string|null $notes
 * @property string $call_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|PhoneCall whereCallType($value)
 * @method static Builder<static>|PhoneCall whereClientId($value)
 * @method static Builder<static>|PhoneCall whereCreatedAt($value)
 * @method static Builder<static>|PhoneCall whereCreatedBy($value)
 * @method static Builder<static>|PhoneCall whereDate($value)
 * @method static Builder<static>|PhoneCall whereDeletedAt($value)
 * @method static Builder<static>|PhoneCall whereDeletedBy($value)
 * @method static Builder<static>|PhoneCall whereDuration($value)
 * @method static Builder<static>|PhoneCall whereId($value)
 * @method static Builder<static>|PhoneCall whereNotes($value)
 * @method static Builder<static>|PhoneCall whereUpdatedAt($value)
 * @method static Builder<static>|PhoneCall whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class PhoneCall extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @property SchemalessAttributes $extra
 * @property-read string $avatar
 * @property-read Profile|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $first_name
 * @property-read string|null $full_name
 * @property-read string|null $last_name
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @property-read string|null $user_name
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(array $relations)
 * @method static Builder<static>|Profile childrenWithCount(array $relations)
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, bool $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Profile team($teams, bool $without = false)
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Profile withoutTeam($teams)
 * @property int $id
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $bio
 * @property string|null $timezone
 * @property string|null $locale
 * @property array<array-key, mixed>|null $preferences
 * @property string|null $status
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @method static Builder<static>|Profile whereAddress($value)
 * @method static Builder<static>|Profile whereAvatar($value)
 * @method static Builder<static>|Profile whereBio($value)
 * @method static Builder<static>|Profile whereBirthDate($value)
 * @method static Builder<static>|Profile whereCreatedAt($value)
 * @method static Builder<static>|Profile whereCreatedBy($value)
 * @method static Builder<static>|Profile whereDeletedAt($value)
 * @method static Builder<static>|Profile whereDeletedBy($value)
 * @method static Builder<static>|Profile whereEmail($value)
 * @method static Builder<static>|Profile whereExtra($value)
 * @method static Builder<static>|Profile whereFirstName($value)
 * @method static Builder<static>|Profile whereGender($value)
 * @method static Builder<static>|Profile whereId($value)
 * @method static Builder<static>|Profile whereIsActive($value)
 * @method static Builder<static>|Profile whereLastName($value)
 * @method static Builder<static>|Profile whereLocale($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile wherePreferences($value)
 * @method static Builder<static>|Profile whereStatus($value)
 * @method static Builder<static>|Profile whereTimezone($value)
 * @method static Builder<static>|Profile whereType($value)
 * @method static Builder<static>|Profile whereUpdatedAt($value)
 * @method static Builder<static>|Profile whereUpdatedBy($value)
 * @method static Builder<static>|Profile whereUserId($value)
 * @method static Builder<static>|Profile whereUserName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
 * @property-read int|null $teams_count
 */
	class Profile extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Modules\TechPlanner\Models\Worker.
 *
 * @property-read Profile|null $creator
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $cod_fisc
 * @property-read string|null $full_address
 * @property-read string $full_name
 * @property-read float|null $latitude
 * @property-write mixed $address
 * @property-write mixed $birth_day
 * @property-read Profile|null $updater
 * @method static Builder<static>|Worker newModelQuery()
 * @method static Builder<static>|Worker newQuery()
 * @method static Builder<static>|Worker ofInPolygon(string $polygon_field, float $lat, float $lng)
 * @method static Builder<static>|Worker ofJobRoleId(int $id)
 * @method static Builder<static>|Worker query()
 * @method static Builder<static>|Worker withDistance(float $lat, float $lng)
 * @method static Builder<static>|Worker withDistanceCustomField(string $lat_field, string $lng_field, float $lat, float $lng)
 * @property int $id
 * @property string|null $type
 * @property int|null $client_id
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $birth_place
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $note
 * @property string|null $premise
 * @property string|null $premise_short
 * @property string|null $locality
 * @property string|null $locality_short
 * @property string|null $postal_town
 * @property string|null $postal_town_short
 * @property string|null $administrative_area_level_3
 * @property string|null $administrative_area_level_3_short
 * @property string|null $administrative_area_level_2
 * @property string|null $administrative_area_level_2_short
 * @property string|null $administrative_area_level_1
 * @property string|null $administrative_area_level_1_short
 * @property string|null $country
 * @property string|null $country_short
 * @property string|null $street_number
 * @property string|null $street_number_short
 * @property string|null $route
 * @property string|null $route_short
 * @property string|null $postal_code
 * @property string|null $postal_code_short
 * @property string|null $point_of_interest
 * @property string|null $point_of_interest_short
 * @property string|null $political
 * @property string|null $political_short
 * @property string|null $phone
 * @property string|null $website
 * @property string|null $email
 * @property string|null $formatted_address
 * @property numeric|null $longitude
 * @property string|null $p_iva
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Worker whereAddress($value)
 * @method static Builder<static>|Worker whereAdministrativeAreaLevel1($value)
 * @method static Builder<static>|Worker whereAdministrativeAreaLevel1Short($value)
 * @method static Builder<static>|Worker whereAdministrativeAreaLevel2($value)
 * @method static Builder<static>|Worker whereAdministrativeAreaLevel2Short($value)
 * @method static Builder<static>|Worker whereAdministrativeAreaLevel3($value)
 * @method static Builder<static>|Worker whereAdministrativeAreaLevel3Short($value)
 * @method static Builder<static>|Worker whereBirthDay($value)
 * @method static Builder<static>|Worker whereBirthPlace($value)
 * @method static Builder<static>|Worker whereClientId($value)
 * @method static Builder<static>|Worker whereCodFisc($value)
 * @method static Builder<static>|Worker whereCountry($value)
 * @method static Builder<static>|Worker whereCountryShort($value)
 * @method static Builder<static>|Worker whereCreatedAt($value)
 * @method static Builder<static>|Worker whereCreatedBy($value)
 * @method static Builder<static>|Worker whereDateEnd($value)
 * @method static Builder<static>|Worker whereDateStart($value)
 * @method static Builder<static>|Worker whereDeletedAt($value)
 * @method static Builder<static>|Worker whereDeletedBy($value)
 * @method static Builder<static>|Worker whereEmail($value)
 * @method static Builder<static>|Worker whereFirstName($value)
 * @method static Builder<static>|Worker whereFormattedAddress($value)
 * @method static Builder<static>|Worker whereFullAddress($value)
 * @method static Builder<static>|Worker whereFullName($value)
 * @method static Builder<static>|Worker whereId($value)
 * @method static Builder<static>|Worker whereLastName($value)
 * @method static Builder<static>|Worker whereLatitude($value)
 * @method static Builder<static>|Worker whereLocality($value)
 * @method static Builder<static>|Worker whereLocalityShort($value)
 * @method static Builder<static>|Worker whereLongitude($value)
 * @method static Builder<static>|Worker whereNote($value)
 * @method static Builder<static>|Worker wherePIva($value)
 * @method static Builder<static>|Worker wherePhone($value)
 * @method static Builder<static>|Worker wherePointOfInterest($value)
 * @method static Builder<static>|Worker wherePointOfInterestShort($value)
 * @method static Builder<static>|Worker wherePolitical($value)
 * @method static Builder<static>|Worker wherePoliticalShort($value)
 * @method static Builder<static>|Worker wherePostalCode($value)
 * @method static Builder<static>|Worker wherePostalCodeShort($value)
 * @method static Builder<static>|Worker wherePostalTown($value)
 * @method static Builder<static>|Worker wherePostalTownShort($value)
 * @method static Builder<static>|Worker wherePremise($value)
 * @method static Builder<static>|Worker wherePremiseShort($value)
 * @method static Builder<static>|Worker whereRoute($value)
 * @method static Builder<static>|Worker whereRouteShort($value)
 * @method static Builder<static>|Worker whereStreetNumber($value)
 * @method static Builder<static>|Worker whereStreetNumberShort($value)
 * @method static Builder<static>|Worker whereType($value)
 * @method static Builder<static>|Worker whereUpdatedAt($value)
 * @method static Builder<static>|Worker whereUpdatedBy($value)
 * @method static Builder<static>|Worker whereWebsite($value)
 * @mixin \Eloquent
 */
	class Worker extends \Eloquent implements \Modules\TechPlanner\Contracts\WorkerContract {}
}

namespace Modules\Tenant\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseConfig query()
 * @mixin \Eloquent
 */
	class DatabaseConfig extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property string|null $id
 * @property string|null $name
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Domain newModelQuery()
 * @method static Builder<static>|Domain newQuery()
 * @method static Builder<static>|Domain query()
 * @method static Builder<static>|Domain whereId($value)
 * @method static Builder<static>|Domain whereName($value)
 * @mixin \Eloquent
 */
	class Domain extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * Modello Tenant per la gestione multi-tenant dell'applicazione.
 *
 * @property-read Profile|null $creator
 * @property-read string $url
 * @property-write mixed $name
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder<static>|Tenant newModelQuery()
 * @method static Builder<static>|Tenant newQuery()
 * @method static Builder<static>|Tenant query()
 * @mixin \Eloquent
 */
	class Tenant extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property string|null $id
 * @property string|null $name
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|TenantDomain newModelQuery()
 * @method static Builder<static>|TenantDomain newQuery()
 * @method static Builder<static>|TenantDomain query()
 * @method static Builder<static>|TenantDomain whereId($value)
 * @method static Builder<static>|TenantDomain whereName($value)
 * @mixin \Eloquent
 */
	class TenantDomain extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Tenant|null $tenant
 * @property-read Profile|null $updater
 * @method static Builder<static>|TenantSetting newModelQuery()
 * @method static Builder<static>|TenantSetting newQuery()
 * @method static Builder<static>|TenantSetting query()
 * @mixin \Eloquent
 */
	class TenantSetting extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Tenant|null $tenant
 * @property-read Profile|null $updater
 * @method static Builder<static>|TenantSubscription newModelQuery()
 * @method static Builder<static>|TenantSubscription newQuery()
 * @method static Builder<static>|TenantSubscription query()
 * @mixin \Eloquent
 */
	class TenantSubscription extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $status
 * @property array<array-key, mixed>|null $metadata
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @method static \Modules\Tenant\Database\Factories\TestSushiModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestSushiModel whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class TestSushiModel extends \Eloquent {}
}

namespace Modules\UI\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\UI\Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|Category newModelQuery()
 * @method static Builder<static>|Category newQuery()
 * @method static Builder<static>|Category query()
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace Modules\UI\Models{
/**
 * Collection model for UI module.
 *
 * FormBuilder module not available - extending from XotBaseModel instead.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\UI\Database\Factories\CollectionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Collection newModelQuery()
 * @method static Builder<static>|Collection newQuery()
 * @method static Builder<static>|Collection query()
 * @mixin \Eloquent
 */
	class Collection extends \Eloquent {}
}

namespace Modules\UI\Models{
/**
 * FieldOption model for UI module.
 *
 * FormBuilder module not available - extending from XotBaseModel instead.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\UI\Database\Factories\FieldOptionFactory factory($count = null, $state = [])
 * @method static Builder<static>|FieldOption newModelQuery()
 * @method static Builder<static>|FieldOption newQuery()
 * @method static Builder<static>|FieldOption query()
 * @mixin \Eloquent
 */
	class FieldOption extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Authentication Model.
 *
 * Tracks user authentication attempts and sessions.
 *
 * @property-read Model $authenticatable
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Authentication newModelQuery()
 * @method static Builder<static>|Authentication newQuery()
 * @method static Builder<static>|Authentication query()
 * @property int $id
 * @property string $type
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Authentication whereCreatedAt($value)
 * @method static Builder<static>|Authentication whereCreatedBy($value)
 * @method static Builder<static>|Authentication whereId($value)
 * @method static Builder<static>|Authentication whereIpAddress($value)
 * @method static Builder<static>|Authentication whereLocation($value)
 * @method static Builder<static>|Authentication whereType($value)
 * @method static Builder<static>|Authentication whereUpdatedAt($value)
 * @method static Builder<static>|Authentication whereUpdatedBy($value)
 * @method static Builder<static>|Authentication whereUserAgent($value)
 * @mixin \Eloquent
 */
	class Authentication extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read Model $authenticatable
 * @property string|null $authenticatable_type
 * @property int|string|null $authenticatable_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property \Illuminate\Support\Carbon|null $login_at
 * @property bool|null $login_successful
 * @property \Illuminate\Support\Carbon|null $logout_at
 * @property bool|null $cleared_by_user
 * @property array<string, mixed>|null $location
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|AuthenticationLog newModelQuery()
 * @method static Builder<static>|AuthenticationLog newQuery()
 * @method static Builder<static>|AuthenticationLog query()
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|AuthenticationLog whereAuthenticatableId($value)
 * @method static Builder<static>|AuthenticationLog whereAuthenticatableType($value)
 * @method static Builder<static>|AuthenticationLog whereClearedByUser($value)
 * @method static Builder<static>|AuthenticationLog whereCreatedAt($value)
 * @method static Builder<static>|AuthenticationLog whereCreatedBy($value)
 * @method static Builder<static>|AuthenticationLog whereId($value)
 * @method static Builder<static>|AuthenticationLog whereIpAddress($value)
 * @method static Builder<static>|AuthenticationLog whereLocation($value)
 * @method static Builder<static>|AuthenticationLog whereLoginAt($value)
 * @method static Builder<static>|AuthenticationLog whereLoginSuccessful($value)
 * @method static Builder<static>|AuthenticationLog whereLogoutAt($value)
 * @method static Builder<static>|AuthenticationLog whereUpdatedAt($value)
 * @method static Builder<static>|AuthenticationLog whereUpdatedBy($value)
 * @method static Builder<static>|AuthenticationLog whereUserAgent($value)
 * @mixin \Eloquent
 */
	class AuthenticationLog extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Device model representing a user's device in the system.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @property-read DeviceUser|null $pivot
 * @property-read EloquentCollection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder<static>|Device newModelQuery()
 * @method static Builder<static>|Device newQuery()
 * @method static Builder<static>|Device query()
 * @property string $id
 * @property string|null $uuid
 * @property string|null $mobile_id
 * @property array<array-key, mixed>|null $languages
 * @property string|null $device
 * @property string|null $platform
 * @property string|null $browser
 * @property string|null $version
 * @property bool|null $is_robot
 * @property string|null $robot
 * @property bool|null $is_desktop
 * @property bool|null $is_mobile
 * @property bool|null $is_tablet
 * @property bool|null $is_phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Device whereBrowser($value)
 * @method static Builder<static>|Device whereCreatedAt($value)
 * @method static Builder<static>|Device whereCreatedBy($value)
 * @method static Builder<static>|Device whereDevice($value)
 * @method static Builder<static>|Device whereId($value)
 * @method static Builder<static>|Device whereIsDesktop($value)
 * @method static Builder<static>|Device whereIsMobile($value)
 * @method static Builder<static>|Device whereIsPhone($value)
 * @method static Builder<static>|Device whereIsRobot($value)
 * @method static Builder<static>|Device whereIsTablet($value)
 * @method static Builder<static>|Device whereLanguages($value)
 * @method static Builder<static>|Device whereMobileId($value)
 * @method static Builder<static>|Device wherePlatform($value)
 * @method static Builder<static>|Device whereRobot($value)
 * @method static Builder<static>|Device whereUpdatedAt($value)
 * @method static Builder<static>|Device whereUpdatedBy($value)
 * @method static Builder<static>|Device whereUuid($value)
 * @method static Builder<static>|Device whereVersion($value)
 * @mixin \Eloquent
 */
	class Device extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * DeviceProfile Model.
 *
 * Represents the relationship between a device and a user profile.
 * Extends the base DeviceUser model to add specific functionality.
 *
 * @property-read Profile|null $creator
 * @property-read Device|null $device
 * @property-read Profile|null $profile
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
 * @mixin \Eloquent
 */
	class DeviceProfile extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\DeviceUser.
 *
 * @property string|null $user_id
 * @property string|null $device_id
 * @property-read Profile|null $creator
 * @property-read Device|null $device
 * @property-read Profile|null $profile
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|DeviceUser newModelQuery()
 * @method static Builder<static>|DeviceUser newQuery()
 * @method static Builder<static>|DeviceUser query()
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $login_at
 * @property \Illuminate\Support\Carbon|null $logout_at
 * @property string|null $push_notifications_token
 * @property bool|null $push_notifications_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|DeviceUser whereCreatedAt($value)
 * @method static Builder<static>|DeviceUser whereCreatedBy($value)
 * @method static Builder<static>|DeviceUser whereDeviceId($value)
 * @method static Builder<static>|DeviceUser whereId($value)
 * @method static Builder<static>|DeviceUser whereLoginAt($value)
 * @method static Builder<static>|DeviceUser whereLogoutAt($value)
 * @method static Builder<static>|DeviceUser wherePushNotificationsEnabled($value)
 * @method static Builder<static>|DeviceUser wherePushNotificationsToken($value)
 * @method static Builder<static>|DeviceUser whereUpdatedAt($value)
 * @method static Builder<static>|DeviceUser whereUpdatedBy($value)
 * @method static Builder<static>|DeviceUser whereUserId($value)
 * @mixin \Eloquent
 */
	class DeviceUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property SchemalessAttributes $extra_attributes
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\User\Database\Factories\ExtraFactory factory($count = null, $state = [])
 * @method static Builder<static>|Extra newModelQuery()
 * @method static Builder<static>|Extra newQuery()
 * @method static Builder<static>|Extra query()
 * @property string $id
 * @property string $model_type
 * @property string $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Extra whereCreatedAt($value)
 * @method static Builder<static>|Extra whereCreatedBy($value)
 * @method static Builder<static>|Extra whereDeletedAt($value)
 * @method static Builder<static>|Extra whereDeletedBy($value)
 * @method static Builder<static>|Extra whereExtraAttributes($value)
 * @method static Builder<static>|Extra whereId($value)
 * @method static Builder<static>|Extra whereModelId($value)
 * @method static Builder<static>|Extra whereModelType($value)
 * @method static Builder<static>|Extra whereUpdatedAt($value)
 * @method static Builder<static>|Extra whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	final class Extra extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Feature newModelQuery()
 * @method static Builder<static>|Feature newQuery()
 * @method static Builder<static>|Feature query()
 * @property int $id
 * @property string $name
 * @property string $scope
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static Builder<static>|Feature whereCreatedAt($value)
 * @method static Builder<static>|Feature whereDeletedAt($value)
 * @method static Builder<static>|Feature whereId($value)
 * @method static Builder<static>|Feature whereName($value)
 * @method static Builder<static>|Feature whereScope($value)
 * @method static Builder<static>|Feature whereUpdatedAt($value)
 * @method static Builder<static>|Feature whereValue($value)
 * @mixin \Eloquent
 */
	class Feature extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\Membership.
 *
 * @property int|string|null $user_id
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Membership newModelQuery()
 * @method static Builder<static>|Membership newQuery()
 * @method static Builder<static>|Membership query()
 * @property int $id
 * @property int $team_id
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Membership whereCreatedAt($value)
 * @method static Builder<static>|Membership whereCreatedBy($value)
 * @method static Builder<static>|Membership whereDeletedAt($value)
 * @method static Builder<static>|Membership whereDeletedBy($value)
 * @method static Builder<static>|Membership whereId($value)
 * @method static Builder<static>|Membership whereRole($value)
 * @method static Builder<static>|Membership whereTeamId($value)
 * @method static Builder<static>|Membership whereUpdatedAt($value)
 * @method static Builder<static>|Membership whereUpdatedBy($value)
 * @method static Builder<static>|Membership whereUserId($value)
 * @mixin \Eloquent
 */
	class Membership extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\ModelHasPermission.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\User\Database\Factories\ModelHasPermissionFactory factory($count = null, $state = [])
 * @method static Builder<static>|ModelHasPermission newModelQuery()
 * @method static Builder<static>|ModelHasPermission newQuery()
 * @method static Builder<static>|ModelHasPermission query()
 * @property string $id
 * @property int $permission_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|ModelHasPermission whereCreatedAt($value)
 * @method static Builder<static>|ModelHasPermission whereCreatedBy($value)
 * @method static Builder<static>|ModelHasPermission whereId($value)
 * @method static Builder<static>|ModelHasPermission whereModelId($value)
 * @method static Builder<static>|ModelHasPermission whereModelType($value)
 * @method static Builder<static>|ModelHasPermission wherePermissionId($value)
 * @method static Builder<static>|ModelHasPermission whereTeamId($value)
 * @method static Builder<static>|ModelHasPermission whereUpdatedAt($value)
 * @method static Builder<static>|ModelHasPermission whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class ModelHasPermission extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\ModelHasRole.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\User\Database\Factories\ModelHasRoleFactory factory($count = null, $state = [])
 * @method static Builder<static>|ModelHasRole newModelQuery()
 * @method static Builder<static>|ModelHasRole newQuery()
 * @method static Builder<static>|ModelHasRole query()
 * @property string $id
 * @property string|null $role_id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $team_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|ModelHasRole whereCreatedAt($value)
 * @method static Builder<static>|ModelHasRole whereCreatedBy($value)
 * @method static Builder<static>|ModelHasRole whereId($value)
 * @method static Builder<static>|ModelHasRole whereModelId($value)
 * @method static Builder<static>|ModelHasRole whereModelType($value)
 * @method static Builder<static>|ModelHasRole whereRoleId($value)
 * @method static Builder<static>|ModelHasRole whereTeamId($value)
 * @method static Builder<static>|ModelHasRole whereUpdatedAt($value)
 * @method static Builder<static>|ModelHasRole whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class ModelHasRole extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\ModelHasRole.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\User\Database\Factories\ModelRoleFactory factory($count = null, $state = [])
 * @method static Builder<static>|ModelRole newModelQuery()
 * @method static Builder<static>|ModelRole newQuery()
 * @method static Builder<static>|ModelRole query()
 * @property string $id
 * @property int|null $role_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|ModelRole whereCreatedAt($value)
 * @method static Builder<static>|ModelRole whereCreatedBy($value)
 * @method static Builder<static>|ModelRole whereId($value)
 * @method static Builder<static>|ModelRole whereModelId($value)
 * @method static Builder<static>|ModelRole whereModelType($value)
 * @method static Builder<static>|ModelRole whereRoleId($value)
 * @method static Builder<static>|ModelRole whereTeamId($value)
 * @method static Builder<static>|ModelRole whereUpdatedAt($value)
 * @method static Builder<static>|ModelRole whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class ModelRole extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read Model $notifiable
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static Builder<static>|Notification newModelQuery()
 * @method static Builder<static>|Notification newQuery()
 * @method static Builder<static>|Notification query()
 * @method static Builder<static>|Notification read()
 * @method static Builder<static>|Notification unread()
 * @mixin \Eloquent
 */
	class Notification extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\OauthAccessToken.
 *
 * @property bool $revoked
 * @property int|string|null $user_id
 * @property-read OauthClient|null $client
 * @property-read OauthRefreshToken|null $refreshToken
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken existsIn(array<int, mixed> $haystack)
 * @method static Builder<static>|OauthAccessToken newModelQuery()
 * @method static Builder<static>|OauthAccessToken newQuery()
 * @method static Builder<static>|OauthAccessToken query()
 * @property string $id
 * @property string $client_id
 * @property string|null $name
 * @property array<array-key, mixed>|null $scopes
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|OauthAccessToken whereClientId($value)
 * @method static Builder<static>|OauthAccessToken whereCreatedAt($value)
 * @method static Builder<static>|OauthAccessToken whereCreatedBy($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedAt($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedBy($value)
 * @method static Builder<static>|OauthAccessToken whereExpiresAt($value)
 * @method static Builder<static>|OauthAccessToken whereId($value)
 * @method static Builder<static>|OauthAccessToken whereName($value)
 * @method static Builder<static>|OauthAccessToken whereRevoked($value)
 * @method static Builder<static>|OauthAccessToken whereScopes($value)
 * @method static Builder<static>|OauthAccessToken whereUpdatedAt($value)
 * @method static Builder<static>|OauthAccessToken whereUpdatedBy($value)
 * @method static Builder<static>|OauthAccessToken whereUserId($value)
 * @mixin \Eloquent
 */
	class OauthAccessToken extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property bool $revoked
 * @property-read OauthClient|null $client
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode query()
 * @property string $id
 * @property string|null $user_id
 * @property string|null $client_id
 * @property string|null $scopes
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereUserId($value)
 * @mixin \Eloquent
 */
	class OauthAuthCode extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property string $id
 * @property int|string|null $user_id
 * @property string $name
 * @property string|null $provider
 * @property string|null $redirect
 * @property string $secret
 * @property bool $personal_access_client
 * @property bool $password_client
 * @property bool $revoked
 * @property-read Collection<int, OauthAuthCode> $authCodes
 * @property-read int|null $auth_codes_count
 * @property-read array<int, string> $grant_types
 * @property-read User $owner
 * @property-read string|null $plain_secret
 * @property-read array<int, string> $redirect_uris
 * @property-read Collection<int, OauthToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Modules\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient existsIn(array<int, mixed> $haystack)
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient query()
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $owner_type
 * @property int|null $owner_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereGrantTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereOwnerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient wherePasswordClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient wherePersonalAccessClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereRedirectUris($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereUserId($value)
 * @mixin \Eloquent
 */
	class OauthClient extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Class OauthDeviceCode.
 *
 * Wrapper for Laravel Passport DeviceCode model.
 *
 * @property bool $revoked
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode query()
 * @mixin \Eloquent
 */
	class OauthDeviceCode extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read OauthClient|null $client
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient query()
 * @property int $id
 * @property string $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class OauthPersonalAccessClient extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read OauthToken|null $accessToken
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken query()
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereAccessTokenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereRevoked($value)
 * @mixin \Eloquent
 */
	class OauthRefreshToken extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property bool $revoked
 * @property int|string|null $user_id
 * @property-read OauthClient|null $client
 * @property-read OauthRefreshToken|null $refreshToken
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken existsIn(array<int, mixed> $haystack)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken query()
 * @property string $id
 * @property string $client_id
 * @property string|null $name
 * @property array<array-key, mixed>|null $scopes
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken whereUserId($value)
 * @mixin \Eloquent
 */
	class OauthToken extends \Eloquent {}
}

namespace Modules\User\Models\Passport{
/**
 * Custom Passport Client model to fix compatibility issues with Laravel 12.
 *
 * @property-read Collection<int, OauthAuthCode> $authCodes
 * @property-read int|null $auth_codes_count
 * @property-read array<int, string> $grant_types
 * @property-read User $owner
 * @property-read string|null $plain_secret
 * @property-read array<int, string> $redirect_uris
 * @property-write string|null $secret
 * @property-read Collection<int, OauthToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Modules\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client existsIn(array<int, mixed> $haystack)
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client query()
 * @mixin \Eloquent
 */
	class Client extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\PasswordReset.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|PasswordReset newModelQuery()
 * @method static Builder<static>|PasswordReset newQuery()
 * @method static Builder<static>|PasswordReset query()
 * @property int $id
 * @property string|null $uuid
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|PasswordReset whereCreatedAt($value)
 * @method static Builder<static>|PasswordReset whereCreatedBy($value)
 * @method static Builder<static>|PasswordReset whereEmail($value)
 * @method static Builder<static>|PasswordReset whereId($value)
 * @method static Builder<static>|PasswordReset whereToken($value)
 * @method static Builder<static>|PasswordReset whereUpdatedAt($value)
 * @method static Builder<static>|PasswordReset whereUpdatedBy($value)
 * @method static Builder<static>|PasswordReset whereUuid($value)
 * @mixin \Eloquent
 */
	class PasswordReset extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static \Modules\User\Database\Factories\PermissionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Permission newModelQuery()
 * @method static Builder<static>|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission permission($permissions, bool $without = false)
 * @method static Builder<static>|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission role($roles, ?string $guard = null, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission withoutRole($roles, ?string $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission withoutTeam($teams)
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Permission whereCreatedAt($value)
 * @method static Builder<static>|Permission whereCreatedBy($value)
 * @method static Builder<static>|Permission whereGuardName($value)
 * @method static Builder<static>|Permission whereId($value)
 * @method static Builder<static>|Permission whereName($value)
 * @method static Builder<static>|Permission whereUpdatedAt($value)
 * @method static Builder<static>|Permission whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
 * @property-read int|null $teams_count
 */
	class Permission extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|PermissionRole newModelQuery()
 * @method static Builder<static>|PermissionRole newQuery()
 * @method static Builder<static>|PermissionRole query()
 * @property string $id
 * @property string $permission_id
 * @property string $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|PermissionRole whereCreatedAt($value)
 * @method static Builder<static>|PermissionRole whereCreatedBy($value)
 * @method static Builder<static>|PermissionRole whereId($value)
 * @method static Builder<static>|PermissionRole wherePermissionId($value)
 * @method static Builder<static>|PermissionRole whereRoleId($value)
 * @method static Builder<static>|PermissionRole whereUpdatedAt($value)
 * @method static Builder<static>|PermissionRole whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class PermissionRole extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\User\Database\Factories\PermissionUserFactory factory($count = null, $state = [])
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 * @property string $id
 * @property int $permission_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|PermissionUser whereCreatedAt($value)
 * @method static Builder<static>|PermissionUser whereCreatedBy($value)
 * @method static Builder<static>|PermissionUser whereId($value)
 * @method static Builder<static>|PermissionUser whereModelId($value)
 * @method static Builder<static>|PermissionUser whereModelType($value)
 * @method static Builder<static>|PermissionUser wherePermissionId($value)
 * @method static Builder<static>|PermissionUser whereTeamId($value)
 * @method static Builder<static>|PermissionUser whereUpdatedAt($value)
 * @method static Builder<static>|PermissionUser whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class PermissionUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\PersonalAccessToken.
 *
 * @method static \Modules\User\Database\Factories\PersonalAccessTokenFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken query()
 * @property int $id
 * @property string $tokenable_type
 * @property int $tokenable_id
 * @property string $name
 * @property string $token
 * @property array<array-key, mixed>|null $abilities
 * @property \Illuminate\Support\Carbon|null $last_used_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereTokenableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereTokenableType($value)
 * @mixin \Eloquent
 */
	class PersonalAccessToken extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * User Profile Model.
 *
 * Represents a user profile with relationships to devices, teams, and roles.
 *
 * @property SchemalessAttributes $extra
 * @property string|null $bio
 * @property-read string $avatar
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read ProfileTeam|DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $first_name
 * @property-read string|null $full_name
 * @property-read string|null $last_name
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, Team> $teams
 * @property-read int|null $teams_count
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @property-read User|null $user
 * @property-read string|null $user_name
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(array<string> $relations)
 * @method static Builder<static>|Profile childrenWithCount(array<string> $relations)
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, bool $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Profile team($teams, bool $without = false)
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Profile withoutTeam($teams)
 * @property int $id
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $timezone
 * @property string|null $locale
 * @property array<array-key, mixed>|null $preferences
 * @property string|null $status
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @method static Builder<static>|Profile whereAddress($value)
 * @method static Builder<static>|Profile whereAvatar($value)
 * @method static Builder<static>|Profile whereBio($value)
 * @method static Builder<static>|Profile whereBirthDate($value)
 * @method static Builder<static>|Profile whereCreatedAt($value)
 * @method static Builder<static>|Profile whereCreatedBy($value)
 * @method static Builder<static>|Profile whereDeletedAt($value)
 * @method static Builder<static>|Profile whereDeletedBy($value)
 * @method static Builder<static>|Profile whereEmail($value)
 * @method static Builder<static>|Profile whereExtra($value)
 * @method static Builder<static>|Profile whereFirstName($value)
 * @method static Builder<static>|Profile whereGender($value)
 * @method static Builder<static>|Profile whereId($value)
 * @method static Builder<static>|Profile whereIsActive($value)
 * @method static Builder<static>|Profile whereLastName($value)
 * @method static Builder<static>|Profile whereLocale($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile wherePreferences($value)
 * @method static Builder<static>|Profile whereStatus($value)
 * @method static Builder<static>|Profile whereTimezone($value)
 * @method static Builder<static>|Profile whereType($value)
 * @method static Builder<static>|Profile whereUpdatedAt($value)
 * @method static Builder<static>|Profile whereUpdatedBy($value)
 * @method static Builder<static>|Profile whereUserId($value)
 * @method static Builder<static>|Profile whereUserName($value)
 * @mixin \Eloquent
 */
	class Profile extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * ProfileTeam Model.
 *
 * Represents the relationship between a profile and a team, including the user's role.
 *
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|ProfileTeam childrenWith(array<string> $relations)
 * @method static Builder<static>|ProfileTeam childrenWithCount(array<string> $relations)
 * @method static Builder<static>|ProfileTeam newModelQuery()
 * @method static Builder<static>|ProfileTeam newQuery()
 * @method static Builder<static>|ProfileTeam query()
 * @property int $id
 * @property string|null $profile_id
 * @property int $team_id
 * @property string|null $role
 * @property array<array-key, mixed>|null $permissions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|ProfileTeam whereCreatedAt($value)
 * @method static Builder<static>|ProfileTeam whereCreatedBy($value)
 * @method static Builder<static>|ProfileTeam whereDeletedAt($value)
 * @method static Builder<static>|ProfileTeam whereDeletedBy($value)
 * @method static Builder<static>|ProfileTeam whereId($value)
 * @method static Builder<static>|ProfileTeam wherePermissions($value)
 * @method static Builder<static>|ProfileTeam whereProfileId($value)
 * @method static Builder<static>|ProfileTeam whereRole($value)
 * @method static Builder<static>|ProfileTeam whereTeamId($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedAt($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class ProfileTeam extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\Role.
 *
 * @property-read Profile|null $creator
 * @property-read PermissionRole|null $pivot
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static \Modules\User\Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static Builder<static>|Role newModelQuery()
 * @method static Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role permission($permissions, bool $without = false)
 * @method static Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role withoutPermission($permissions)
 * @property int $id
 * @property int|null $team_id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $display_name
 * @property string|null $description
 * @method static Builder<static>|Role whereCreatedAt($value)
 * @method static Builder<static>|Role whereCreatedBy($value)
 * @method static Builder<static>|Role whereDescription($value)
 * @method static Builder<static>|Role whereDisplayName($value)
 * @method static Builder<static>|Role whereGuardName($value)
 * @method static Builder<static>|Role whereId($value)
 * @method static Builder<static>|Role whereName($value)
 * @method static Builder<static>|Role whereTeamId($value)
 * @method static Builder<static>|Role whereUpdatedAt($value)
 * @method static Builder<static>|Role whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\RoleHasPermission.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|RoleHasPermission newModelQuery()
 * @method static Builder<static>|RoleHasPermission newQuery()
 * @method static Builder<static>|RoleHasPermission query()
 * @property string $id
 * @property int $permission_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|RoleHasPermission whereCreatedAt($value)
 * @method static Builder<static>|RoleHasPermission whereCreatedBy($value)
 * @method static Builder<static>|RoleHasPermission whereId($value)
 * @method static Builder<static>|RoleHasPermission wherePermissionId($value)
 * @method static Builder<static>|RoleHasPermission whereRoleId($value)
 * @method static Builder<static>|RoleHasPermission whereUpdatedAt($value)
 * @method static Builder<static>|RoleHasPermission whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class RoleHasPermission extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property array<array-key, mixed>|null $scopes
 * @property array<array-key, mixed>|null $parameters
 * @property bool|null $stateless
 * @property bool|null $active
 * @property bool|null $socialite
 * @property string|null $svg
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|SocialProvider newModelQuery()
 * @method static Builder<static>|SocialProvider newQuery()
 * @method static Builder<static>|SocialProvider query()
 * @method static Builder<static>|SocialProvider whereActive($value)
 * @method static Builder<static>|SocialProvider whereCreatedAt($value)
 * @method static Builder<static>|SocialProvider whereCreatedBy($value)
 * @method static Builder<static>|SocialProvider whereId($value)
 * @method static Builder<static>|SocialProvider whereName($value)
 * @method static Builder<static>|SocialProvider whereParameters($value)
 * @method static Builder<static>|SocialProvider whereScopes($value)
 * @method static Builder<static>|SocialProvider whereSocialite($value)
 * @method static Builder<static>|SocialProvider whereStateless($value)
 * @method static Builder<static>|SocialProvider whereSvg($value)
 * @method static Builder<static>|SocialProvider whereUpdatedAt($value)
 * @method static Builder<static>|SocialProvider whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class SocialProvider extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\SocialiteUser.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|SocialiteUser newModelQuery()
 * @method static Builder<static>|SocialiteUser newQuery()
 * @method static Builder<static>|SocialiteUser query()
 * @property int $id
 * @property string $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $name
 * @property string|null $email
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|SocialiteUser whereAvatar($value)
 * @method static Builder<static>|SocialiteUser whereCreatedAt($value)
 * @method static Builder<static>|SocialiteUser whereCreatedBy($value)
 * @method static Builder<static>|SocialiteUser whereEmail($value)
 * @method static Builder<static>|SocialiteUser whereId($value)
 * @method static Builder<static>|SocialiteUser whereName($value)
 * @method static Builder<static>|SocialiteUser whereProvider($value)
 * @method static Builder<static>|SocialiteUser whereProviderId($value)
 * @method static Builder<static>|SocialiteUser whereToken($value)
 * @method static Builder<static>|SocialiteUser whereUpdatedAt($value)
 * @method static Builder<static>|SocialiteUser whereUpdatedBy($value)
 * @method static Builder<static>|SocialiteUser whereUserId($value)
 * @mixin \Eloquent
 */
	class SocialiteUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\SsoProvider.
 *
 * @property array<int, string>|null $domain_whitelist
 * @property array<string, string>|null $role_mapping
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder<static>|SsoProvider newModelQuery()
 * @method static Builder<static>|SsoProvider newQuery()
 * @method static Builder<static>|SsoProvider query()
 * @mixin \Eloquent
 */
	class SsoProvider extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Class Modules\User\Models\Team.
 *
 * @property-read Profile|null $creator
 * @property-read TeamUser|null $pivot
 * @property-read Collection<int, User> $members
 * @property-read int|null $members_count
 * @property-read User|null $owner
 * @property-read Collection<int, TeamPermission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, TeamInvitation> $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read Collection<int, TeamUser> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder<static>|Team newModelQuery()
 * @method static Builder<static>|Team newQuery()
 * @method static Builder<static>|Team query()
 * @property int $id
 * @property string|null $owner_id
 * @property string|null $uuid
 * @property string|null $user_id
 * @property string $name
 * @property bool $personal_team
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $avatar_path
 * @property array<array-key, mixed>|null $settings
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static Builder<static>|Team whereAvatarPath($value)
 * @method static Builder<static>|Team whereCode($value)
 * @method static Builder<static>|Team whereCreatedAt($value)
 * @method static Builder<static>|Team whereCreatedBy($value)
 * @method static Builder<static>|Team whereDeletedAt($value)
 * @method static Builder<static>|Team whereDeletedBy($value)
 * @method static Builder<static>|Team whereDescription($value)
 * @method static Builder<static>|Team whereId($value)
 * @method static Builder<static>|Team whereName($value)
 * @method static Builder<static>|Team whereOwnerId($value)
 * @method static Builder<static>|Team wherePersonalTeam($value)
 * @method static Builder<static>|Team whereSettings($value)
 * @method static Builder<static>|Team whereSlug($value)
 * @method static Builder<static>|Team whereUpdatedAt($value)
 * @method static Builder<static>|Team whereUpdatedBy($value)
 * @method static Builder<static>|Team whereUserId($value)
 * @method static Builder<static>|Team whereUuid($value)
 * @mixin \Eloquent
 */
	class Team extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\TeamInvitation.
 *
 * @property string|null $email
 * @property string|null $role
 * @property int|string|null $user_id
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @method static Builder<static>|TeamInvitation newModelQuery()
 * @method static Builder<static>|TeamInvitation newQuery()
 * @method static Builder<static>|TeamInvitation query()
 * @property int $id
 * @property string $uuid
 * @property string|null $team_id
 * @property \Illuminate\Support\Carbon|null $accepted_at
 * @property \Illuminate\Support\Carbon|null $declined_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|TeamInvitation whereAcceptedAt($value)
 * @method static Builder<static>|TeamInvitation whereCreatedAt($value)
 * @method static Builder<static>|TeamInvitation whereCreatedBy($value)
 * @method static Builder<static>|TeamInvitation whereDeclinedAt($value)
 * @method static Builder<static>|TeamInvitation whereDeletedAt($value)
 * @method static Builder<static>|TeamInvitation whereDeletedBy($value)
 * @method static Builder<static>|TeamInvitation whereEmail($value)
 * @method static Builder<static>|TeamInvitation whereId($value)
 * @method static Builder<static>|TeamInvitation whereRole($value)
 * @method static Builder<static>|TeamInvitation whereTeamId($value)
 * @method static Builder<static>|TeamInvitation whereUpdatedAt($value)
 * @method static Builder<static>|TeamInvitation whereUpdatedBy($value)
 * @method static Builder<static>|TeamInvitation whereUserId($value)
 * @method static Builder<static>|TeamInvitation whereUuid($value)
 * @mixin \Eloquent
 */
	class TeamInvitation extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Team Permission Model.
 *
 * Represents a permission assigned to a user within a team context.
 *
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|TeamPermission newModelQuery()
 * @method static Builder<static>|TeamPermission newQuery()
 * @method static Builder<static>|TeamPermission query()
 * @property int $id
 * @property int $team_id
 * @property string $permission
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|TeamPermission whereCreatedAt($value)
 * @method static Builder<static>|TeamPermission whereCreatedBy($value)
 * @method static Builder<static>|TeamPermission whereDeletedAt($value)
 * @method static Builder<static>|TeamPermission whereDeletedBy($value)
 * @method static Builder<static>|TeamPermission whereId($value)
 * @method static Builder<static>|TeamPermission whereName($value)
 * @method static Builder<static>|TeamPermission wherePermission($value)
 * @method static Builder<static>|TeamPermission whereTeamId($value)
 * @method static Builder<static>|TeamPermission whereUpdatedAt($value)
 * @method static Builder<static>|TeamPermission whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class TeamPermission extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\TeamUser.
 *
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read User|null $user
 * @method static Builder<static>|TeamUser childrenWith(array<string> $relations)
 * @method static Builder<static>|TeamUser childrenWithCount(array<string> $relations)
 * @method static Builder<static>|TeamUser newModelQuery()
 * @method static Builder<static>|TeamUser newQuery()
 * @method static Builder<static>|TeamUser query()
 * @property int $id
 * @property int $team_id
 * @property string|null $user_id
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|TeamUser whereCreatedAt($value)
 * @method static Builder<static>|TeamUser whereCreatedBy($value)
 * @method static Builder<static>|TeamUser whereDeletedAt($value)
 * @method static Builder<static>|TeamUser whereDeletedBy($value)
 * @method static Builder<static>|TeamUser whereId($value)
 * @method static Builder<static>|TeamUser whereRole($value)
 * @method static Builder<static>|TeamUser whereTeamId($value)
 * @method static Builder<static>|TeamUser whereUpdatedAt($value)
 * @method static Builder<static>|TeamUser whereUpdatedBy($value)
 * @method static Builder<static>|TeamUser whereUserId($value)
 * @mixin \Eloquent
 */
	class TeamUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\Tenant.
 *
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read TenantUser|null $pivot
 * @property-read EloquentCollection<int, User> $members
 * @property-read int|null $members_count
 * @property-read Profile|null $updater
 * @property-read EloquentCollection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder<static>|Tenant newModelQuery()
 * @method static Builder<static>|Tenant newQuery()
 * @method static Builder<static>|Tenant query()
 * @property string $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $domain
 * @property string|null $database
 * @property int $is_active
 * @property string|null $email_address
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $address
 * @property string|null $primary_color
 * @property string|null $secondary_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Tenant whereAddress($value)
 * @method static Builder<static>|Tenant whereCreatedAt($value)
 * @method static Builder<static>|Tenant whereCreatedBy($value)
 * @method static Builder<static>|Tenant whereDatabase($value)
 * @method static Builder<static>|Tenant whereDeletedAt($value)
 * @method static Builder<static>|Tenant whereDeletedBy($value)
 * @method static Builder<static>|Tenant whereDomain($value)
 * @method static Builder<static>|Tenant whereEmailAddress($value)
 * @method static Builder<static>|Tenant whereId($value)
 * @method static Builder<static>|Tenant whereIsActive($value)
 * @method static Builder<static>|Tenant whereMobile($value)
 * @method static Builder<static>|Tenant whereName($value)
 * @method static Builder<static>|Tenant wherePhone($value)
 * @method static Builder<static>|Tenant wherePrimaryColor($value)
 * @method static Builder<static>|Tenant whereSecondaryColor($value)
 * @method static Builder<static>|Tenant whereSlug($value)
 * @method static Builder<static>|Tenant whereUpdatedAt($value)
 * @method static Builder<static>|Tenant whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Tenant extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\TenantUser.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|TenantUser newModelQuery()
 * @method static Builder<static>|TenantUser newQuery()
 * @method static Builder<static>|TenantUser query()
 * @property string $id
 * @property int $tenant_id
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|TenantUser whereCreatedAt($value)
 * @method static Builder<static>|TenantUser whereCreatedBy($value)
 * @method static Builder<static>|TenantUser whereDeletedAt($value)
 * @method static Builder<static>|TenantUser whereDeletedBy($value)
 * @method static Builder<static>|TenantUser whereId($value)
 * @method static Builder<static>|TenantUser whereTenantId($value)
 * @method static Builder<static>|TenantUser whereUpdatedAt($value)
 * @method static Builder<static>|TenantUser whereUpdatedBy($value)
 * @method static Builder<static>|TenantUser whereUserId($value)
 * @mixin \Eloquent
 */
	class TenantUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Class Modules\User\Models\User.
 *
 * @property-read Collection<int, AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read Collection<int, OauthClient> $clients
 * @property-read int|null $clients_count
 * @property-read Team|null $currentTeam
 * @property-read TenantUser|TeamUser|DeviceUser|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Collection<int, User> $all_team_users
 * @property-read string $full_name
 * @property-read string $name
 * @property-read AuthenticationLog|null $latestAuthentication
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, Team> $membershipTeams
 * @property-read int|null $membership_teams_count
 * @property-read DatabaseNotificationCollection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, OauthClient> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Profile|null $profile
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property string $password
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read int|null $socialite_users_count
 * @property-read Collection<int, TeamUser> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Collection<int, Tenant> $tenants
 * @property-read int|null $tenants_count
 * @property-read Collection<int, OauthToken> $tokens
 * @property-read int|null $tokens_count
 * @method static Builder<static>|User childrenWith(array<string> $relations)
 * @method static Builder<static>|User childrenWithCount(array<string> $relations)
 * @method static \Modules\User\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User permission($permissions, bool $without = false)
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|User team($teams, bool $without = false)
 * @method static Builder<static>|User withoutPermission($permissions)
 * @method static Builder<static>|User withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|User withoutTeam($teams)
 * @property string $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $lang
 * @property bool $is_active
 * @property bool $is_otp
 * @property \Illuminate\Support\Carbon|null $password_expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $state
 * @method static Builder<static>|User whereCreatedAt($value)
 * @method static Builder<static>|User whereCreatedBy($value)
 * @method static Builder<static>|User whereCurrentTeamId($value)
 * @method static Builder<static>|User whereDeletedAt($value)
 * @method static Builder<static>|User whereDeletedBy($value)
 * @method static Builder<static>|User whereEmail($value)
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereFirstName($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereIsActive($value)
 * @method static Builder<static>|User whereIsOtp($value)
 * @method static Builder<static>|User whereLang($value)
 * @method static Builder<static>|User whereLastName($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User wherePasswordExpiresAt($value)
 * @method static Builder<static>|User whereProfilePhotoPath($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereState($value)
 * @method static Builder<static>|User whereTwoFactorConfirmedAt($value)
 * @method static Builder<static>|User whereTwoFactorRecoveryCodes($value)
 * @method static Builder<static>|User whereTwoFactorSecret($value)
 * @method static Builder<static>|User whereType($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
 * @property-read int|null $teams_count
 */
	class User extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\Cache.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\CacheFactory factory($count = null, $state = [])
 * @method static Builder<static>|Cache newModelQuery()
 * @method static Builder<static>|Cache newQuery()
 * @method static Builder<static>|Cache query()
 * @property string $key
 * @property string $value
 * @property int $expiration
 * @method static Builder<static>|Cache whereExpiration($value)
 * @method static Builder<static>|Cache whereKey($value)
 * @method static Builder<static>|Cache whereValue($value)
 * @mixin \Eloquent
 */
	class Cache extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\CacheLock.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\CacheLockFactory factory($count = null, $state = [])
 * @method static Builder<static>|CacheLock newModelQuery()
 * @method static Builder<static>|CacheLock newQuery()
 * @method static Builder<static>|CacheLock query()
 * @property string $key
 * @property string $owner
 * @property int $expiration
 * @method static Builder<static>|CacheLock whereExpiration($value)
 * @method static Builder<static>|CacheLock whereKey($value)
 * @method static Builder<static>|CacheLock whereOwner($value)
 * @mixin \Eloquent
 */
	class CacheLock extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Model Extra.
 *
 * @property SchemalessAttributes $extra_attributes
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\ExtraFactory factory($count = null, $state = [])
 * @method static Builder<static>|Extra newModelQuery()
 * @method static Builder<static>|Extra newQuery()
 * @method static Builder<static>|Extra query()
 * @property string $id
 * @property string $model_type
 * @property string $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Extra whereCreatedAt($value)
 * @method static Builder<static>|Extra whereCreatedBy($value)
 * @method static Builder<static>|Extra whereDeletedAt($value)
 * @method static Builder<static>|Extra whereDeletedBy($value)
 * @method static Builder<static>|Extra whereExtraAttributes($value)
 * @method static Builder<static>|Extra whereId($value)
 * @method static Builder<static>|Extra whereModelId($value)
 * @method static Builder<static>|Extra whereModelType($value)
 * @method static Builder<static>|Extra whereUpdatedAt($value)
 * @method static Builder<static>|Extra whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Extra extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\Feed.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\FeedFactory factory($count = null, $state = [])
 * @method static Builder<static>|Feed newModelQuery()
 * @method static Builder<static>|Feed newQuery()
 * @method static Builder<static>|Feed query()
 * @mixin \Eloquent
 */
	class Feed extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @method static Builder<static>|HealthCheckResultHistoryItem newModelQuery()
 * @method static Builder<static>|HealthCheckResultHistoryItem newQuery()
 * @method static Builder<static>|HealthCheckResultHistoryItem query()
 * @property int $id
 * @property string $check_name
 * @property string $check_label
 * @property string $status
 * @property string|null $notification_message
 * @property string|null $short_summary
 * @property array<array-key, mixed> $meta
 * @property string $ended_at
 * @property string $batch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|HealthCheckResultHistoryItem whereBatch($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCheckLabel($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCheckName($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCreatedAt($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereCreatedBy($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereEndedAt($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereId($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereMeta($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereNotificationMessage($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereShortSummary($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereStatus($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereUpdatedAt($value)
 * @method static Builder<static>|HealthCheckResultHistoryItem whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class HealthCheckResultHistoryItem extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Represents a table in the INFORMATION_SCHEMA.TABLES.
 *
 * Provides metadata and statistics about database tables.
 *
 * @property string|null $created_at
 * @property string|null $created_by
 * @property int $id
 * @property string|null $model_class
 * @property string|null $table_name
 * @property int|null $table_rows
 * @property string|null $table_schema
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @method static Builder<static>|InformationSchemaTable newModelQuery()
 * @method static Builder<static>|InformationSchemaTable newQuery()
 * @method static Builder<static>|InformationSchemaTable query()
 * @method static Builder<static>|InformationSchemaTable whereCreatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereCreatedBy($value)
 * @method static Builder<static>|InformationSchemaTable whereId($value)
 * @method static Builder<static>|InformationSchemaTable whereModelClass($value)
 * @method static Builder<static>|InformationSchemaTable whereTableName($value)
 * @method static Builder<static>|InformationSchemaTable whereTableRows($value)
 * @method static Builder<static>|InformationSchemaTable whereTableSchema($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class InformationSchemaTable extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\Feed.
 *
 * @property string|null $id
 * @property string|null $name
 * @property int|null $size
 * @property-read Profile|null $creator
 * @property-read string|null $file_content
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\LogFactory factory($count = null, $state = [])
 * @method static Builder<static>|Log newModelQuery()
 * @method static Builder<static>|Log newQuery()
 * @method static Builder<static>|Log query()
 * @method static Builder<static>|Log whereId($value)
 * @method static Builder<static>|Log whereName($value)
 * @method static Builder<static>|Log whereSize($value)
 * @mixin \Eloquent
 */
	class Log extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property bool|null $status
 * @property int|null $priority
 * @property string|null $path
 * @property string|null $icon
 * @property array<array-key, mixed>|null $colors
 * @method static Builder<static>|Module newModelQuery()
 * @method static Builder<static>|Module newQuery()
 * @method static Builder<static>|Module query()
 * @method static Builder<static>|Module whereColors($value)
 * @method static Builder<static>|Module whereDescription($value)
 * @method static Builder<static>|Module whereIcon($value)
 * @method static Builder<static>|Module whereId($value)
 * @method static Builder<static>|Module whereName($value)
 * @method static Builder<static>|Module wherePath($value)
 * @method static Builder<static>|Module wherePriority($value)
 * @method static Builder<static>|Module whereStatus($value)
 * @mixin \Eloquent
 */
	class Module extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\PulseAggregateFactory factory($count = null, $state = [])
 * @method static Builder<static>|PulseAggregate newModelQuery()
 * @method static Builder<static>|PulseAggregate newQuery()
 * @method static Builder<static>|PulseAggregate query()
 * @property string $id
 * @property int $bucket
 * @property int $period
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $aggregate
 * @property numeric $value
 * @property int|null $count
 * @method static Builder<static>|PulseAggregate whereAggregate($value)
 * @method static Builder<static>|PulseAggregate whereBucket($value)
 * @method static Builder<static>|PulseAggregate whereCount($value)
 * @method static Builder<static>|PulseAggregate whereId($value)
 * @method static Builder<static>|PulseAggregate whereKey($value)
 * @method static Builder<static>|PulseAggregate whereKeyHash($value)
 * @method static Builder<static>|PulseAggregate wherePeriod($value)
 * @method static Builder<static>|PulseAggregate whereType($value)
 * @method static Builder<static>|PulseAggregate whereValue($value)
 * @mixin \Eloquent
 */
	class PulseAggregate extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\PulseEntryFactory factory($count = null, $state = [])
 * @method static Builder<static>|PulseEntry newModelQuery()
 * @method static Builder<static>|PulseEntry newQuery()
 * @method static Builder<static>|PulseEntry query()
 * @property string $id
 * @property int $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property int|null $value
 * @method static Builder<static>|PulseEntry whereId($value)
 * @method static Builder<static>|PulseEntry whereKey($value)
 * @method static Builder<static>|PulseEntry whereKeyHash($value)
 * @method static Builder<static>|PulseEntry whereTimestamp($value)
 * @method static Builder<static>|PulseEntry whereType($value)
 * @method static Builder<static>|PulseEntry whereValue($value)
 * @mixin \Eloquent
 */
	class PulseEntry extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\PulseValueFactory factory($count = null, $state = [])
 * @method static Builder<static>|PulseValue newModelQuery()
 * @method static Builder<static>|PulseValue newQuery()
 * @method static Builder<static>|PulseValue query()
 * @property string $id
 * @property int $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
 * @method static Builder<static>|PulseValue whereId($value)
 * @method static Builder<static>|PulseValue whereKey($value)
 * @method static Builder<static>|PulseValue whereKeyHash($value)
 * @method static Builder<static>|PulseValue whereTimestamp($value)
 * @method static Builder<static>|PulseValue whereType($value)
 * @method static Builder<static>|PulseValue whereValue($value)
 * @mixin \Eloquent
 */
	class PulseValue extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\Session.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static \Modules\Xot\Database\Factories\SessionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Session newModelQuery()
 * @method static Builder<static>|Session newQuery()
 * @method static Builder<static>|Session query()
 * @property string $id
 * @property string|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Session whereCreatedAt($value)
 * @method static Builder<static>|Session whereCreatedBy($value)
 * @method static Builder<static>|Session whereDeletedAt($value)
 * @method static Builder<static>|Session whereDeletedBy($value)
 * @method static Builder<static>|Session whereId($value)
 * @method static Builder<static>|Session whereIpAddress($value)
 * @method static Builder<static>|Session whereLastActivity($value)
 * @method static Builder<static>|Session wherePayload($value)
 * @method static Builder<static>|Session whereUpdatedAt($value)
 * @method static Builder<static>|Session whereUpdatedBy($value)
 * @method static Builder<static>|Session whereUserAgent($value)
 * @method static Builder<static>|Session whereUserId($value)
 * @mixin \Eloquent
 */
	class Session extends \Eloquent {}
}

