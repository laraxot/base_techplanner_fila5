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
 * @property int $id
 * @property string $public_id
 * @property int $ai_thread_id
 * @property int $proposed_by_user_id
 * @property string $type
 * @property array<string, mixed> $payload
 * @property string|null $preview
 * @property string $status
 * @property int|null $confirmed_by_user_id
 * @property Carbon|null $confirmed_at
 * @property Carbon|null $executed_at
 * @property array<string, mixed>|null $result
 * @property string|null $error
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read AiThread $thread
 * @method static Builder<static>|AiActionProposal newModelQuery()
 * @method static Builder<static>|AiActionProposal newQuery()
 * @method static Builder<static>|AiActionProposal query()
 * @mixin \Eloquent
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 */
	class AiActionProposal extends \Eloquent {}
}

namespace Modules\AI\Models{
/**
 * Class AiMessage.
 *
 * A single message (user|assistant|tool|system) within an AiThread.
 *
 * @property int $id
 * @property int $ai_thread_id
 * @property int|null $user_id
 * @property string $role
 * @property string|null $content
 * @property array<string, mixed>|null $payload
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read AiThread $thread
 * @method static Builder<static>|AiMessage newModelQuery()
 * @method static Builder<static>|AiMessage newQuery()
 * @method static Builder<static>|AiMessage query()
 * @mixin \Eloquent
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 */
	class AiMessage extends \Eloquent {}
}

namespace Modules\AI\Models{
/**
 * Class AiThread.
 *
 * A persisted conversation thread between a user and the AI assistant.
 *
 * @property int $id
 * @property string $public_id
 * @property int $created_by_user_id
 * @property string $panel_id
 * @property Carbon|null $last_message_at
 * @property array<string, mixed>|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, AiMessage> $messages
 * @property-read Collection<int, AiActionProposal> $proposals
 * @property-read Collection<int, AiToolLog> $toolLogs
 * @method static Builder<static>|AiThread newModelQuery()
 * @method static Builder<static>|AiThread newQuery()
 * @method static Builder<static>|AiThread query()
 * @mixin \Eloquent
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read int|null $messages_count
 * @property-read int|null $proposals_count
 * @property-read int|null $tool_logs_count
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 */
	class AiThread extends \Eloquent {}
}

namespace Modules\AI\Models{
/**
 * Class AiToolLog.
 *
 * Audit trail of tool calls performed by the AI assistant.
 *
 * @property int $id
 * @property int $ai_thread_id
 * @property int|null $ai_action_proposal_id
 * @property int|null $user_id
 * @property string $tool_name
 * @property array<string, mixed>|null $arguments
 * @property array<string, mixed>|null $response
 * @property string $status
 * @property string|null $error
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read AiThread $thread
 * @property-read AiActionProposal|null $proposal
 * @method static Builder<static>|AiToolLog newModelQuery()
 * @method static Builder<static>|AiToolLog newQuery()
 * @method static Builder<static>|AiToolLog query()
 * @mixin \Eloquent
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 */
	class AiToolLog extends \Eloquent {}
}

namespace Modules\Activity\Models{
/**
 * Class Activity.
 *
 * This class extends the BaseActivity model to represent activities in the application.
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property string|null $subject_id
 * @property string|null $causer_type
 * @property string|null $causer_id
 * @property array<string, mixed>|Collection<array-key, mixed>|null $properties
 * @property Collection<int, mixed>|null $attribute_changes
 * @property string|null $batch_uuid
 * @property string|null $event
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Model|null $causer
 * @property-read Collection<int, mixed> $changes
 * @property-read Model|null $subject
 * @method static ActivityFactory factory($count = null, $state = [])
 * @method static Builder<static>|Activity forBatch(string $batchUuid)
 * @method static Builder<static>|Activity forEvent(string $event)
 * @method static Builder<static>|Activity forSubject(Model $subject)
 * @method static Builder<static>|Activity hasBatch()
 * @method static Builder<static>|Activity inLog(...$logNames)
 * @method static Builder<static>|Activity newModelQuery()
 * @method static Builder<static>|Activity newQuery()
 * @method static Builder<static>|Activity query()
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
 * @method static Builder<static>|Activity where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Activity create(array<string, mixed> $attributes = [])
 * @method static Builder<static>|Activity clone()
 * @method static Builder<static>|Activity selectRaw(string $expression)
 * @method static Builder<static>|Activity whereDate(string $column, string $operator, mixed $value = null)
 * @method static Builder<static>|Activity whereBetween(string $column, array<int, mixed> $values)
 * @method static Builder<static>|Activity whereMonth(string $column, string $operator, mixed $value = null)
 * @method static Builder<static>|Activity whereYear(string $column, string $operator, mixed $value = null)
 * @method static Builder<static>|Activity latest(string $column = 'created_at')
 * @method static Builder<static>|Activity limit(int $value)
 * @method static Builder<static>|Activity with(array<string, mixed>|string $relations)
 * @method static int sum(string $column)
 * @method static Collection<int, static> get(array<string>|string $columns = ['*'])
 * @method static static|null first(array<string>|string $columns = ['*'])
 * @method static static find(mixed $id, array<string>|string $columns = ['*'])
 * @method static static|null firstWhere(string $column, mixed $operator = null, mixed $value = null)
 * @method static Builder<static>|Activity orderBy(string $column, string $direction = 'asc')
 * @method static Builder<static>|Activity groupBy(array<string>|string $groups)
 * @method static Builder<static>|Activity having(string $column, string $operator, mixed $value)
 * @method static Builder<static>|Activity orWhere(string $column, mixed $operator = null, mixed $value = null)
 * @method static Builder<static>|Activity whereIn(string $column, array<int, mixed> $values)
 * @method static Builder<static>|Activity whereNotIn(string $column, array<int, mixed> $values)
 * @method static Builder<static>|Activity whereNull(string $column)
 * @method static Builder<static>|Activity whereNotNull(string $column)
 * @method static int count(string $columns = '*')
 * @method static Collection<int, mixed> pluck(string $column, string|null $key = null)
 * @method static mixed max(string $column)
 * @method static mixed min(string $column)
 * @method static mixed avg(string $column)
 * @method static int sum(string $column)
 * @method static bool exists()
 * @method static bool doesntExist()
 * @method static Builder<static>|Activity distinct()
 * @method static Builder<static>|Activity join(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder<static>|Activity leftJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder<static>|Activity rightJoin(string $table, string $first, string $operator = null, string $second = null)
 * @method static Builder<static>|Activity crossJoin(string $table)
 * @method static Builder<static>|Activity causedBy(Model $causer)
 * @mixin \Eloquent
 */
	class Activity extends \Eloquent {}
}

namespace Modules\Activity\Models{
/**
 * Modules\Activity\Models\Snapshot.
 *
 * @property int $id
 * @property string $aggregate_uuid
 * @property int $aggregate_version
 * @property array<array-key, mixed> $state
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|Snapshot newModelQuery()
 * @method static Builder<static>|Snapshot newQuery()
 * @method static Builder<static>|Snapshot query()
 * @method static Builder<static>|Snapshot uuid(string $uuid)
 * @method static Builder<static>|Snapshot whereAggregateUuid($value)
 * @method static Builder<static>|Snapshot whereAggregateVersion($value)
 * @method static Builder<static>|Snapshot whereCreatedAt($value)
 * @method static Builder<static>|Snapshot whereCreatedBy($value)
 * @method static Builder<static>|Snapshot whereId($value)
 * @method static Builder<static>|Snapshot whereState($value)
 * @method static Builder<static>|Snapshot whereUpdatedAt($value)
 * @method static Builder<static>|Snapshot whereUpdatedBy($value)
 * @method static SnapshotFactory factory($count = null, $state = [])
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
 * @property int $id
 * @property string|null $aggregate_uuid
 * @property int|null $aggregate_version
 * @property int $event_version
 * @property string $event_class
 * @property array<array-key, mixed> $event_properties
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $meta_data
 * @property string $created_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property-read ShouldBeStored|null $event
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent afterVersion(int $version)
 * @method static EloquentStoredEventCollection<static> all($columns = ['*'])
 * @method static EloquentStoredEventCollection<static> get($columns = ['*'])
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent lastEvent(string ...$eventClasses)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent newModelQuery()
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent newQuery()
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent query()
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent startingFrom(int $storedEventId)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereAggregateRoot(string $uuid)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereAggregateUuid($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereAggregateVersion($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereCreatedAt($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereCreatedBy($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEvent(string ...$eventClasses)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEventClass($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEventProperties($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereEventVersion($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereId($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereMetaData($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent wherePropertyIs(string $property, mixed $value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent wherePropertyIsNot(string $property, mixed $value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereUpdatedBy($value)
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent withMetaDataAttributes()
 * @method static StoredEventFactory factory($count = null, $state = [])
 * @property string|null $updated_at
 * @method static EloquentStoredEventQueryBuilder<static>|StoredEvent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class StoredEvent extends \Eloquent {}
}

namespace Modules\Activity\Models{
/**
 * Test model for Activity module tests.
 *
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereUpdatedAt($value)
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
 * @property ProfileContract|null $creator
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property array<string, array<string, mixed>> $translations
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Attachment newModelQuery()
 * @method static Builder<static>|Attachment newQuery()
 * @method static Builder<static>|Attachment query()
 * @method static Builder<static>|Attachment whereAttachment($value)
 * @method static Builder<static>|Attachment whereCreatedAt($value)
 * @method static Builder<static>|Attachment whereCreatedBy($value)
 * @method static Builder<static>|Attachment whereDescription($value)
 * @method static Builder<static>|Attachment whereDisk($value)
 * @method static Builder<static>|Attachment whereId($value)
 * @method static Builder<static>|Attachment whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Attachment whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Attachment whereLocale(string $column, string $locale)
 * @method static Builder<static>|Attachment whereLocales(string $column, array<int, string> $locales)
 * @method static Builder<static>|Attachment whereSlug($value)
 * @method static Builder<static>|Attachment whereTitle($value)
 * @method static Builder<static>|Attachment whereUpdatedAt($value)
 * @method static Builder<static>|Attachment whereUpdatedBy($value)
 * @method static static|null firstWhere(string $column, mixed $operator = null, mixed $value = null)
 * @property ProfileContract|null $deleter
 * @method static AttachmentFactory factory($count = null, $state = [])
 * @method array<int, array<string, mixed>> getSushiRows()
 * @mixin \Eloquent
 * @property-read array $translatable_columns_from
 */
	class Attachment extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Conf.
 *
 * @property int         $id
 * @property string|null $name
 * @method static Builder<static>|Conf newModelQuery()
 * @method static Builder<static>|Conf newQuery()
 * @method static Builder<static>|Conf query()
 * @method static Builder<static>|Conf whereId($value)
 * @method static Builder<static>|Conf whereName($value)
 * @method static int                  count()
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @method static ConfFactory factory($count = null, $state = [])
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
 * @property array<int, mixed>|null $items
 * @property int|null $parent_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Collection<int, Menu> $children
 * @property int|null $children_count
 * @property ProfileContract|null $creator
 * @property Menu|null $parent
 * @property ProfileContract|null $updater
 * @property int $depth
 * @property string $path
 * @property Collection<int, Menu> $ancestors The model's recursive parents.
 * @property string $id
 * @property string|null $title
 * @property int|null $parent_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Collection<int, Menu> $children
 * @property int|null $children_count
 * @property ProfileContract|null $creator
 * @property Menu|null $parent
 * @property ProfileContract|null $updater
 * @property int $depth
 * @property string $path
 * @property Collection<int, Menu> $ancestors The model's recursive parents.
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
 * @method static Builder<static>|Menu treeOf((Model|callable) $constraint, $maxDepth = null)
 * @method static Builder<static>|Menu whereCreatedAt($value)
 * @method static Builder<static>|Menu whereCreatedBy($value)
 * @method static Builder<static>|Menu whereDepth($operator, $value = null)
 * @method static Builder<static>|Menu whereId($value)
 * @method static Builder<static>|Menu whereParentId($value)
 * @method static Builder<static>|Menu whereTitle($value)
 * @method static Builder<static>|Menu whereUpdatedAt($value)
 * @method static Builder<static>|Menu whereUpdatedBy($value)
 * @method static Builder<static>|Menu whereDepth($operator, $value = null)
 * @method static Builder<static>|Menu withGlobalScopes(array<string, mixed> $scopes)
 * @method static Builder<static>|Menu withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static Builder<static>|Menu delete()
 * @method static Builder<static>|Menu where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Menu whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Menu whereNotIn($column, $values, $boolean = 'and')
 * @method static Builder<static>|Menu whereNull($columns, $boolean = 'and', $not = false)
 * @method static Builder<static>|Menu whereNotNull($columns, $boolean = 'and')
 * @method static Builder<static>|Menu whereBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Menu whereNotBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Menu whereDate($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Menu whereMonth($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Menu whereDay($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Menu whereYear($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Menu whereTime($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Menu whereColumn($column, string $operator, mixed $value, $boolean = 'and')
 * @method static Builder<static>|Menu orderBy($column, $direction = 'asc')
 * @method static Builder<static>|Menu latest($column = 'created_at')
 * @method static Builder<static>|Menu oldest($column = 'created_at')
 * @method static Builder<static>|Menu limit($value)
 * @method static Builder<static>|Menu take($value)
 * @method static Builder<static>|Menu skip($value)
 * @method static Builder<static>|Menu offset($value)
 * @method static int count()
 * @method static int max($column)
 * @method static int min($column)
 * @method static int sum($column)
 * @method static float avg($column)
 * @method static mixed pluck($column, $key = null)
 * @method static Builder<static>|Menu join($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Menu leftJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Menu rightJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Menu crossJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Menu having($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Menu orWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Menu whereExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Menu whereNotExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Menu whereHas($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Menu whereDoesntHave($relation, $operator = '<', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Menu whereJsonContains($column, mixed $value, $boolean = 'and', $not = false)
 * @method static Builder<static>|Menu whereJsonLength($column, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Menu whereJsonPath($path, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Menu whereJsonOverlaps($column, $value, $boolean = 'and')
 * @method static Builder<static>|Menu with($relations)
 * @method static Builder<static>|Menu without($relations)
 * @method static Builder<static>|Menu withCount($relations)
 * @method static Builder<static>|Menu withSum($relation, $column)
 * @method static Builder<static>|Menu withAvg($relation, $column)
 * @method static Builder<static>|Menu withMin($relation, $column)
 * @method static Builder<static>|Menu withMax($relation, $column)
 * @method static Builder<static>|Menu findOrFail($id, $columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static firstOrFail($columns = ['*'])
 * @method static static update($attributes)
 * @method static int increment($column, $amount = 1, $extra = [])
 * @method static int decrement($column, $amount = 1, $extra = [])
 * @method static bool truncate()
 * @method static static destroy($ids)
 * @method static static restore()
 * @method static static forceDelete()
 * @method static static onlyTrashed()
 * @method static static withTrashed()
 * @method static static withoutTrashed()
 * @property ProfileContract|null $deleter
 * @method static MenuFactory factory($count = null, $state = [])
 * @method array<int, array<string, mixed>> getSushiRows()
 * @mixin \Eloquent
 */
	class Menu extends \Eloquent implements \Modules\Xot\Contracts\HasRecursiveRelationshipsContract {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Module.
 *
 * @property string               $id
 * @property string|null          $name
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Module newModelQuery()
 * @method static Builder<static>|Module newQuery()
 * @method static Builder<static>|Module query()
 * @method static Builder<static>|Module whereId($value)
 * @method static Builder<static>|Module whereName($value)
 * @method static int                    count()
 * @property ProfileContract|null $deleter
 * @method static ModuleFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Module extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Page.
 *
 * @property string $id
 * @method static array<int, array<string, mixed>> getMiddlewareBySlug(string $slug)
 * @method static array<string, \Modules\Cms\Datas\BlockData> getBlocksBySlug(string $slug, ?string $side = null)
 * @property string $id
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
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @property array<string, array<string, mixed>> $translations
 * @method static Builder<static>|Page newModelQuery()
 * @method static Builder<static>|Page newQuery()
 * @method static Builder<static>|Page query()
 * @method static Builder<static>|Page whereContent($value)
 * @method static Builder<static>|Page whereContentBlocks($value)
 * @method static Builder<static>|Page whereCreatedAt($value)
 * @method static Builder<static>|Page whereCreatedBy($value)
 * @method static Builder<static>|Page whereDescription($value)
 * @method static Builder<static>|Page whereFooterBlocks($value)
 * @method static Builder<static>|Page whereId($value)
 * @method static Builder<static>|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Page whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Page whereLocale(string $column, string $locale)
 * @method static Builder<static>|Page whereLocales(string $column, array<int, string> $locales)
 * @method static Builder<static>|Page whereMiddleware($value)
 * @method static Builder<static>|Page whereSidebarBlocks($value)
 * @method static Builder<static>|Page whereSlug($value)
 * @method static Builder<static>|Page whereTitle($value)
 * @method static Builder<static>|Page whereUpdatedAt($value)
 * @method static Builder<static>|Page whereUpdatedBy($value)
 * @method static Builder<static>|Page where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static static|null first(array|string $columns = ['*'])
 * @method static static|null firstWhere(string $column, mixed $operator = null, mixed $value = null)
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static Builder<static>|Page delete()
 * @method static Builder<static>|Page whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotIn($column, $values, $boolean = 'and')
 * @method static Builder<static>|Page whereNull($columns, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotNull($columns, $boolean = 'and')
 * @method static Builder<static>|Page whereBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereDate($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereMonth($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereDay($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereYear($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereTime($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereColumn($column, string $operator, mixed $value, $boolean = 'and')
 * @method static Builder<static>|Page orderBy($column, $direction = 'asc')
 * @method static Builder<static>|Page latest($column = 'created_at')
 * @method static Builder<static>|Page oldest($column = 'created_at')
 * @method static Builder<static>|Page limit($value)
 * @method static Builder<static>|Page take($value)
 * @method static Builder<static>|Page skip($value)
 * @method static Builder<static>|Page offset($value)
 * @method static int count()
 * @method static int max($column)
 * @method static int min($column)
 * @method static int sum($column)
 * @method static float avg($column)
 * @method static mixed pluck($column, $key = null)
 * @method static Builder<static>|Page join($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page leftJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page rightJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page crossJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page having($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page orWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page whereExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereHas($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereDoesntHave($relation, $operator = '<', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereJsonContains($column, mixed $value, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereJsonLength($column, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonPath($path, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonOverlaps($column, $value, $boolean = 'and')
 * @method static Builder<static>|Page with($relations)
 * @method static Builder<static>|Page without($relations)
 * @method static Builder<static>|Page withCount($relations)
 * @method static Builder<static>|Page withSum($relation, $column)
 * @method static Builder<static>|Page withAvg($relation, $column)
 * @method static Builder<static>|Page withMin($relation, $column)
 * @method static Builder<static>|Page withMax($relation, $column)
 * @method static Builder<static>|Page findOrFail($id, $columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static firstOrFail($columns = ['*'])
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static update($attributes)
 * @method static Builder<static>|Page where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotIn($column, $values, $boolean = 'and')
 * @method static Builder<static>|Page whereNull($columns, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotNull($columns, $boolean = 'and')
 * @method static Builder<static>|Page whereBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereDate($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereMonth($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereDay($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereYear($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereTime($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereColumn($column, string $operator, mixed $value, $boolean = 'and')
 * @method static Builder<static>|Page orderBy($column, $direction = 'asc')
 * @method static Builder<static>|Page latest($column = 'created_at')
 * @method static Builder<static>|Page oldest($column = 'created_at')
 * @method static Builder<static>|Page limit($value)
 * @method static Builder<static>|Page take($value)
 * @method static Builder<static>|Page skip($value)
 * @method static Builder<static>|Page offset($value)
 * @method static int count()
 * @method static int max($column)
 * @method static int min($column)
 * @method static int sum($column)
 * @method static float avg($column)
 * @method static mixed pluck($column, $key = null)
 * @method static Builder<static>|Page join($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page leftJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page rightJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page crossJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page having($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page orWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page whereExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereHas($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereDoesntHave($relation, $operator = '<', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereJsonContains($column, mixed $value, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereJsonLength($column, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonPath($path, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonOverlaps($column, $value, $boolean = 'and')
 * @method static Builder<static>|Page with($relations)
 * @method static Builder<static>|Page without($relations)
 * @method static Builder<static>|Page withCount($relations)
 * @method static Builder<static>|Page withSum($relation, $column)
 * @method static Builder<static>|Page withAvg($relation, $column)
 * @method static Builder<static>|Page withMin($relation, $column)
 * @method static Builder<static>|Page withMax($relation, $column)
 * @method static Builder<static>|Page findOrFail($id, $columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static firstOrFail($columns = ['*'])
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static update($attributes)
 * @method static int increment($column, $amount = 1, $extra = [])
 * @method static int decrement($column, $amount = 1, $extra = [])
 * @method static bool truncate()
 * @method static static destroy($ids)
 * @method static static restore()
 * @method static static forceDelete()
 * @method static static onlyTrashed()
 * @method static static withTrashed()
 * @method static static withoutTrashed()
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static static|null first($columns = ['*'])
 * @method static static|null find($id, $columns = ['*'])
 * @method static Builder<static>|Page newModelQuery()
 * @method static Builder<static>|Page newQuery()
 * @method static Builder<static>|Page query()
 * @method static Builder<static>|Page whereContent($value)
 * @method static Builder<static>|Page whereContentBlocks($value)
 * @method static Builder<static>|Page whereCreatedAt($value)
 * @method static Builder<static>|Page whereCreatedBy($value)
 * @method static Builder<static>|Page whereDescription($value)
 * @method static Builder<static>|Page whereFooterBlocks($value)
 * @method static Builder<static>|Page whereId($value)
 * @method static Builder<static>|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Page whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Page whereLocale(string $column, string $locale)
 * @method static Builder<static>|Page whereLocales(string $column, array<int, string> $locales)
 * @method static Builder<static>|Page whereMiddleware($value)
 * @method static Builder<static>|Page whereSidebarBlocks($value)
 * @method static Builder<static>|Page whereSlug($value)
 * @method static Builder<static>|Page whereTitle($value)
 * @method static Builder<static>|Page whereUpdatedAt($value)
 * @method static Builder<static>|Page whereUpdatedBy($value)
 * @method static Builder<static>|Page where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static static|null first(array|string $columns = ['*'])
 * @method static static|null firstWhere(string $column, mixed $operator = null, mixed $value = null)
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static Builder<static>|Page delete()
 * @method static Builder<static>|Page whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotIn($column, $values, $boolean = 'and')
 * @method static Builder<static>|Page whereNull($columns, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotNull($columns, $boolean = 'and')
 * @method static Builder<static>|Page whereBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereDate($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereMonth($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereDay($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereYear($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereTime($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereColumn($column, string $operator, mixed $value, $boolean = 'and')
 * @method static Builder<static>|Page orderBy($column, $direction = 'asc')
 * @method static Builder<static>|Page latest($column = 'created_at')
 * @method static Builder<static>|Page oldest($column = 'created_at')
 * @method static Builder<static>|Page limit($value)
 * @method static Builder<static>|Page take($value)
 * @method static Builder<static>|Page skip($value)
 * @method static Builder<static>|Page offset($value)
 * @method static int count()
 * @method static int max($column)
 * @method static int min($column)
 * @method static int sum($column)
 * @method static float avg($column)
 * @method static mixed pluck($column, $key = null)
 * @method static Builder<static>|Page join($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page leftJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page rightJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page crossJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page having($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page orWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page whereExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereHas($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereDoesntHave($relation, $operator = '<', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereJsonContains($column, mixed $value, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereJsonLength($column, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonPath($path, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonOverlaps($column, $value, $boolean = 'and')
 * @method static Builder<static>|Page with($relations)
 * @method static Builder<static>|Page without($relations)
 * @method static Builder<static>|Page withCount($relations)
 * @method static Builder<static>|Page withSum($relation, $column)
 * @method static Builder<static>|Page withAvg($relation, $column)
 * @method static Builder<static>|Page withMin($relation, $column)
 * @method static Builder<static>|Page withMax($relation, $column)
 * @method static Builder<static>|Page findOrFail($id, $columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static firstOrFail($columns = ['*'])
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static update($attributes)
 * @method static Builder<static>|Page where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotIn($column, $values, $boolean = 'and')
 * @method static Builder<static>|Page whereNull($columns, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotNull($columns, $boolean = 'and')
 * @method static Builder<static>|Page whereBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotBetween($column, array<int, mixed> $values, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereDate($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereMonth($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereDay($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereYear($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereTime($column, string $operator, string $value, $boolean = 'and')
 * @method static Builder<static>|Page whereColumn($column, string $operator, mixed $value, $boolean = 'and')
 * @method static Builder<static>|Page orderBy($column, $direction = 'asc')
 * @method static Builder<static>|Page latest($column = 'created_at')
 * @method static Builder<static>|Page oldest($column = 'created_at')
 * @method static Builder<static>|Page limit($value)
 * @method static Builder<static>|Page take($value)
 * @method static Builder<static>|Page skip($value)
 * @method static Builder<static>|Page offset($value)
 * @method static int count()
 * @method static int max($column)
 * @method static int min($column)
 * @method static int sum($column)
 * @method static float avg($column)
 * @method static mixed pluck($column, $key = null)
 * @method static Builder<static>|Page join($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page leftJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page rightJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page crossJoin($table, $first, $operator = null, $second = null)
 * @method static Builder<static>|Page having($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page orWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder<static>|Page whereExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereNotExists($callback, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereHas($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereDoesntHave($relation, $operator = '<', $count = 1, $boolean = 'and', $callback = null)
 * @method static Builder<static>|Page whereJsonContains($column, mixed $value, $boolean = 'and', $not = false)
 * @method static Builder<static>|Page whereJsonLength($column, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonPath($path, $operator, $value, $boolean = 'and')
 * @method static Builder<static>|Page whereJsonOverlaps($column, $value, $boolean = 'and')
 * @method static Builder<static>|Page with($relations)
 * @method static Builder<static>|Page without($relations)
 * @method static Builder<static>|Page withCount($relations)
 * @method static Builder<static>|Page withSum($relation, $column)
 * @method static Builder<static>|Page withAvg($relation, $column)
 * @method static Builder<static>|Page withMin($relation, $column)
 * @method static Builder<static>|Page withMax($relation, $column)
 * @method static Builder<static>|Page findOrFail($id, $columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static firstOrFail($columns = ['*'])
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static update($attributes)
 * @method static int increment($column, $amount = 1, $extra = [])
 * @method static int decrement($column, $amount = 1, $extra = [])
 * @method static bool truncate()
 * @method static static destroy($ids)
 * @method static static restore()
 * @method static static forceDelete()
 * @method static static onlyTrashed()
 * @method static static withTrashed()
 * @method static static withoutTrashed()
 * @method static \Illuminate\Database\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Collection<int, static> get($columns = ['*'])
 * @method static static|null first($columns = ['*'])
 * @method static static|null find($id, $columns = ['*'])
 * @property ProfileContract|null $deleter
 * @method static PageFactory factory($count = null, $state = [])
 * @property array<array-key, mixed>|null $blocks
 * @method static Builder<static>|Page whereBlocks($value)
 * @method array<int, array<string, mixed>> getSushiRows()
 * @method static array<string, \Modules\Cms\Datas\BlockData> getBlocksBySlug(string $slug, ?string $side = null)
 * @method static array<int, string> getMiddlewareBySlug(string $slug)
 * @method static PageFactory factory($count = null, $state = [])
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
 * @method static Builder<static>|Page whereMiddleware($value)
 * @method static Builder<static>|Page whereSidebarBlocks($value)
 * @method static Builder<static>|Page whereSlug($value)
 * @method static Builder<static>|Page whereTitle($value)
 * @method static Builder<static>|Page whereUpdatedAt($value)
 * @method static Builder<static>|Page whereUpdatedBy($value)
 * @method static Builder<static>|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Page whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Page whereLocale(string $column, string $locale)
 * @method static Builder<static>|Page whereLocales(string $column, array<int, string> $locales)
 * @method static Collection<int, static> all($columns = ['*'])
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static static|null first($columns = ['*'])
 * @method static static|null find($id, $columns = ['*'])
 * @method static array<string, \Modules\Cms\Datas\BlockData> getBlocksBySlug(string $slug, ?string $side = null)
 * @method static array<int, string> getMiddlewareBySlug(string $slug)
 * @method array<int, array<string, mixed>> getSushiRows()
 * @mixin \Eloquent
 * @property-read array $translatable_columns_from
 */
	class Page extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\PageContent.
 *
 * @property string $id
 * @property array<array-key, mixed>|null $name
 * @property string|null $slug
 * @property array<array-key, mixed>|null $blocks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property ProfileContract|null $creator
 * @property array<string, array<string, mixed>> $translations
 * @property ProfileContract|null $updater
 * @method static Builder<static>|PageContent newModelQuery()
 * @method static Builder<static>|PageContent newQuery()
 * @method static Builder<static>|PageContent query()
 * @method static Builder<static>|PageContent whereBlocks($value)
 * @method static Builder<static>|PageContent whereCreatedAt($value)
 * @method static Builder<static>|PageContent whereCreatedBy($value)
 * @method static Builder<static>|PageContent whereId($value)
 * @method static Builder<static>|PageContent whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|PageContent whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|PageContent whereLocale(string $column, string $locale)
 * @method static Builder<static>|PageContent whereLocales(string $column, array<int, string> $locales)
 * @method static Builder<static>|PageContent whereName($value)
 * @method static Builder<static>|PageContent whereSlug($value)
 * @method static Builder<static>|PageContent whereUpdatedAt($value)
 * @method static Builder<static>|PageContent whereUpdatedBy($value)
 * @method static int count()
 * @property ProfileContract|null $deleter
 * @method static PageContentFactory factory($count = null, $state = [])
 * @method array<int, array<string, mixed>> getSushiRows()
 * @mixin \Eloquent
 * @property-read array $translatable_columns_from
 */
	class PageContent extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * Modules\Cms\Models\Section.
 *
 * @property string $id
 * @method static array<string, \Modules\Cms\Datas\BlockData> getBlocksBySlug(string $slug, ?string $side = null)
 * @property string $id
 * @property array<array-key, mixed>|null $name
 * @property string|null $slug
 * @property array<array-key, mixed>|null $blocks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property ProfileContract|null $creator
 * @property array<string, array<string, mixed>> $translations
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Section newModelQuery()
 * @method static Builder<static>|Section newQuery()
 * @method static Builder<static>|Section query()
 * @method static Builder<static>|Section whereBlocks($value)
 * @method static Builder<static>|Section whereCreatedAt($value)
 * @method static Builder<static>|Section whereCreatedBy($value)
 * @method static Builder<static>|Section whereId($value)
 * @method static Builder<static>|Section whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|Section whereLocale(string $column, string $locale)
 * @method static Builder<static>|Section whereLocales(string $column, array<int, string> $locales)
 * @method static Builder<static>|Section whereName($value)
 * @method static Builder<static>|Section whereSlug($value)
 * @method static Builder<static>|Section whereUpdatedAt($value)
 * @method static Builder<static>|Section whereUpdatedBy($value)
 * @method static int count()
 * @method static Builder<static>|Section where($column, $operator = null, $value = null, $boolean = 'and')
 * @property ProfileContract|null $deleter
 * @method static SectionFactory factory($count = null, $state = [])
 * @method array<int, array<string, mixed>> getSushiRows()
 * @mixin \Eloquent
 * @property-read array $translatable_columns_from
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
 * @property Carbon $starts_at
 * @property Carbon $ends_at
 * @property string|null $notes
 * @property string $status
 * @property int|null $decided_by_user_id
 * @property Carbon|null $decided_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Employee|null $user
 * @property-read Employee|null $decidedBy
 * @method static AbsenceRequestFactory factory($count = null, $state = [])
 * @method static Builder<static>|AbsenceRequest newModelQuery()
 * @method static Builder<static>|AbsenceRequest newQuery()
 * @method static Builder<static>|AbsenceRequest query()
 * @mixin \Eloquent
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AbsenceRequest forUser(int $userId)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AbsenceRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AbsenceRequest pending()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AbsenceRequest withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AbsenceRequest withoutTrashed()
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
 * @property string $id
 * @property string $user_id
 * @property string|null $date_of_birth
 *                                      Employee Module Admin Model
 *
 * Admin user type using Single Table Inheritance with Parental package.
 * Child class of User model for administrative users.
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $type
 * @property string|null $first_name
 * @property string|null $last_name
 * @property Carbon|null $date_of_birth
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read \Modules\User\Models\User|null $user
 * @method static Builder|Admin newModelQuery()
 * @method static Builder|Admin newQuery()
 * @method static Builder|Admin query()
 * @method static Builder|Admin whereAddress($value)
 * @method static Builder|Admin whereCreatedAt($value)
 * @method static Builder|Admin whereCreatedBy($value)
 * @method static Builder|Admin whereDateOfBirth($value)
 * @method static Builder|Admin whereGender($value)
 * @method static Builder|Admin whereId($value)
 * @method static Builder|Admin wherePhone($value)
 * @method static Builder|Admin whereUpdatedAt($value)
 * @method static Builder|Admin whereUpdatedBy($value)
 * @method static Builder|Admin whereUserId($value)
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string|null $city
 * @property string|null $registration_number
 * @property string|null $status
 * @property array<array-key, mixed>|null $certifications
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $state
 * @property array<array-key, mixed>|null $moderation_data
 * @property string|null $lang
 * @property string|null $type
 * @property bool $is_active
 * @property bool $is_otp
 * @property \Illuminate\Support\Carbon|null $password_expires_at
 * @property string|null $uuid
 * @property string|null $full_name
 * @property string|null $deleted_by
 * @property-read Collection<int, Consent> $activeConsents
 * @property-read int|null $active_consents_count
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Collection<int, Authentication> $authentications
 * @property-read int|null $authentications_count
 * @property-read Collection<int, Client> $clients
 * @property-read int|null $clients_count
 * @property-read Collection<int, Consent> $consents
 * @property-read int|null $consents_count
 * @property-read Team|null $currentTeam
 * @property-read Collection<int, Model> $all_team_users
 * @property-read AuthenticationLog|null $latestAuthentication
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read DatabaseNotificationCollection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read ProfileContract|null $profile
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read int|null $socialite_users_count
 * @property-read mixed|null $pivot
 * @property-read Collection<int, Team> $teams
 * @property-read int|null $teams_count
 * @property-read Collection<int, Token> $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection<int, Treatment> $treatments
 * @property-read int|null $treatments_count
 * @method static Builder<static>|Admin admins()
 * @method static Builder<static>|Admin doctors()
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|Admin orWhereNotState(string $column, $states)
 * @method static Builder<static>|Admin orWhereState(string $column, $states)
 * @method static Builder<static>|Admin patients()
 * @method static Builder<static>|Admin permission($permissions, $without = false)
 * @method static Builder<static>|Admin role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Admin whereCertifications($value)
 * @method static Builder<static>|Admin whereCity($value)
 * @method static Builder<static>|Admin whereCurrentTeamId($value)
 * @method static Builder<static>|Admin whereDeletedAt($value)
 * @method static Builder<static>|Admin whereDeletedBy($value)
 * @method static Builder<static>|Admin whereEmail($value)
 * @method static Builder<static>|Admin whereEmailVerifiedAt($value)
 * @method static Builder<static>|Admin whereFirstName($value)
 * @method static Builder<static>|Admin whereFullName($value)
 * @method static Builder<static>|Admin whereIsActive($value)
 * @method static Builder<static>|Admin whereIsOtp($value)
 * @method static Builder<static>|Admin whereLang($value)
 * @method static Builder<static>|Admin whereLastName($value)
 * @method static Builder<static>|Admin whereModerationData($value)
 * @method static Builder<static>|Admin whereName($value)
 * @method static Builder<static>|Admin whereNotState(string $column, $states)
 * @method static Builder<static>|Admin wherePassword($value)
 * @method static Builder<static>|Admin wherePasswordExpiresAt($value)
 * @method static Builder<static>|Admin whereProfilePhotoPath($value)
 * @method static Builder<static>|Admin whereRegistrationNumber($value)
 * @method static Builder<static>|Admin whereRememberToken($value)
 * @method static Builder<static>|Admin whereState($value)
 * @method static Builder<static>|Admin whereStatus($value)
 * @method static Builder<static>|Admin whereType($value)
 * @method static Builder<static>|Admin whereUuid($value)
 * @method static Builder<static>|Admin withoutPermission($permissions)
 * @method static Builder<static>|Admin withoutRole($roles, $guard = null)
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property string|null $dental_problems
 * @property string|null $last_dental_visit
 * @property string|null $pregnancy_certificate
 * @property string|null $isee_certificate
 * @property string|null $identity_document
 * @property string|null $health_card
 * @property string|null $certificates
 * @property-read Collection<int, Membership> $teamUsers
 * @property-read int|null $team_users_count
 * @method static Builder<static>|Admin whereCertificates($value)
 * @method static Builder<static>|Admin whereDentalProblems($value)
 * @method static Builder<static>|Admin whereHealthCard($value)
 * @method static Builder<static>|Admin whereIdentityDocument($value)
 * @method static Builder<static>|Admin whereIseeCertificate($value)
 * @method static Builder<static>|Admin whereLastDentalVisit($value)
 * @method static Builder<static>|Admin wherePregnancyCertificate($value)
 * @property string|null $country_code
 * @property string|null $children_count
 * @property string|null $family_members
 * @property string|null $years_in_italy
 * @property string|null $nationality
 * @property string|null $fiscal_code
 * @property string|null $data_privacy_form
 * @property string|null $doctor_certificate
 * @property array<array-key, mixed>|null $certification
 * @property string|null $last_dental_visit_period
 * @method static Builder<static>|Admin whereCertification($value)
 * @method static Builder<static>|Admin whereChildrenCount($value)
 * @method static Builder<static>|Admin whereCountryCode($value)
 * @method static Builder<static>|Admin whereDataPrivacyForm($value)
 * @method static Builder<static>|Admin whereDoctorCertificate($value)
 * @method static Builder<static>|Admin whereFamilyMembers($value)
 * @method static Builder<static>|Admin whereFiscalCode($value)
 * @method static Builder<static>|Admin whereLastDentalVisitPeriod($value)
 * @method static Builder<static>|Admin whereNationality($value)
 * @method static Builder<static>|Admin whereYearsInItaly($value)
 * @property string|null $age_range
 * @method static Builder<static>|Admin whereAgeRange($value)
 * @property-read Collection<int, Tenant> $tenants
 * @property-read int|null $tenants_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $membershipTeams
 * @property-read int|null $membership_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthClient> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin childrenWith(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin childrenWithCount(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin withoutTeam($teams)
 */
	class Admin extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class Department.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $manager_id
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
 * @method static DepartmentFactory factory($count = null, $state = [])
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
 * @property int $id
 * @property int|null $user_id
 * @property string $employee_code
 * @property array<string, mixed> $personal_data
 * @property array<string, mixed> $contact_data
 * @property array<string, mixed> $work_data
 * @property array<string, mixed> $documents
 * @property string|null $photo_url
 * @property string $status
 * @property int|null $department_id
 * @property int|null $manager_id
 * @property int|null $position_id
 * @property array<string, mixed> $salary_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Modules\User\Models\User|null $user
 * @property-read Collection<int, WorkHour> $workHours
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property string|null $deleted_at
 * @property string|null $lang
 * @property int $is_active
 * @property int $is_otp
 * @property string|null $password_expires_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string|null $type
 * @property-read Collection<int, Consent> $activeConsents
 * @property-read int|null $active_consents_count
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Collection<int, AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read Collection<int, Client> $clients
 * @property-read int|null $clients_count
 * @property-read Collection<int, Consent> $consents
 * @property-read int|null $consents_count
 * @property-read Team|null $currentTeam
 * @property-read TenantUser|Membership|DeviceUser|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Collection<int, \Modules\User\Models\User> $all_team_users
 * @property-read string|null $full_name
 * @property-read string $status_label
 * @property-read AuthenticationLog|null $latestAuthentication
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read DatabaseNotificationCollection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read ProfileContract|null $profile
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read int|null $socialite_users_count
 * @property-read int|null $subordinates_count
 * @property-read Collection<int, Membership> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Collection<int, Team> $teams
 * @property-read int|null $teams_count
 * @property-read Collection<int, Domain> $tenants
 * @property-read int|null $tenants_count
 * @property-read Collection<int, Token> $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection<int, Treatment> $treatments
 * @property-read int|null $treatments_count
 * @property-read int|null $work_hours_count
 * @method static EmployeeFactory factory($count = null, $state = [])
 * @method static Builder<static>|Employee newModelQuery()
 * @method static Builder<static>|Employee newQuery()
 * @method static Builder<static>|Employee orWhereNotState(string $column, $states)
 * @method static Builder<static>|Employee orWhereState(string $column, $states)
 * @method static Builder<static>|Employee permission($permissions, $without = false)
 * @method static Builder<static>|Employee query()
 * @method static Builder<static>|Employee role($roles, $guard = null, $without = false)
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
 * @method static Builder<static>|Employee whereNotState(string $column, $states)
 * @method static Builder<static>|Employee wherePassword($value)
 * @method static Builder<static>|Employee wherePasswordExpiresAt($value)
 * @method static Builder<static>|Employee whereProfilePhotoPath($value)
 * @method static Builder<static>|Employee whereRememberToken($value)
 * @method static Builder<static>|Employee whereState(string $column, $states)
 * @method static Builder<static>|Employee whereType($value)
 * @method static Builder<static>|Employee whereUpdatedAt($value)
 * @method static Builder<static>|Employee whereUpdatedBy($value)
 * @method static Builder<static>|Employee withoutPermission($permissions)
 * @method static Builder<static>|Employee withoutRole($roles, $guard = null)
 * @property-read Employee|null $manager
 * @property-read Collection<int, Employee> $subordinates
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $membershipTeams
 * @property-read int|null $membership_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthClient> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee childrenWith(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee childrenWithCount(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee withoutTeam($teams)
 */
	class Employee extends \Eloquent {}
}

namespace Modules\Employee\Models{
/**
 * Class Position.
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $department
 * @property int|null $level
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
 * @method static PositionFactory factory($count = null, $state = [])
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
 * @property array<string, mixed>|null $location_in
 * @property array<string, mixed>|null $location_out
 * @property array<string, mixed>|null $device_info
 * @property string|null $notes
 * @property string|null $employee_notes
 * @property string|null $supervisor_notes
 * @property string $status
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property string|null $rejection_reason
 * @property array<string, mixed>|null $anomalies
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read Employee|null $approvedBy
 * @property string $type Type of time entry
 * @property string $timestamp Exact time of entry
 * @property numeric|null $location_lat GPS latitude coordinate
 * @property numeric|null $location_lng GPS longitude coordinate
 * @property string|null $location_name Human readable location name
 * @property string|null $photo_path Path to verification photo
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
 * @method static TimeEntryFactory factory($count = null, $state = [])
 * @method static Builder<static>|TimeEntry forEmployee(int $employeeId)
 * @method static Builder<static>|TimeEntry newModelQuery()
 * @method static Builder<static>|TimeEntry newQuery()
 * @method static Builder<static>|TimeEntry pending()
 * @method static Builder<static>|TimeEntry query()
 * @method static Builder<static>|TimeEntry whereApprovedAt($value)
 * @method static Builder<static>|TimeEntry whereApprovedBy($value)
 * @method static Builder<static>|TimeEntry whereClockIn($value)
 * @method static Builder<static>|TimeEntry whereClockOut($value)
 * @method static Builder<static>|TimeEntry whereBreakStart($value)
 * @method static Builder<static>|TimeEntry whereBreakEnd($value)
 * @method static Builder<static>|TimeEntry whereBreakDuration($value)
 * @method static Builder<static>|TimeEntry whereTotalHours($value)
 * @method static Builder<static>|TimeEntry whereRegularHours($value)
 * @method static Builder<static>|TimeEntry whereOvertimeHours($value)
 * @method static Builder<static>|TimeEntry whereLocationIn($value)
 * @method static Builder<static>|TimeEntry whereLocationOut($value)
 * @method static Builder<static>|TimeEntry whereDeviceInfo($value)
 * @method static Builder<static>|TimeEntry whereNotes($value)
 * @method static Builder<static>|TimeEntry whereEmployeeNotes($value)
 * @method static Builder<static>|TimeEntry whereSupervisorNotes($value)
 * @method static Builder<static>|TimeEntry whereStatus($value)
 * @method static Builder<static>|TimeEntry whereRejectionReason($value)
 * @method static Builder<static>|TimeEntry whereAnomalies($value)
 * @method static Builder<static>|TimeEntry whereCreatedAt($value)
 * @method static Builder<static>|TimeEntry whereUpdatedAt($value)
 * @method static Builder<static>|TimeEntry whereId($value)
 * @method static Builder<static>|TimeEntry whereEmployeeId($value)
 * @method static Builder<static>|TimeEntry whereLocationLat($value)
 * @method static Builder<static>|TimeEntry whereLocationLng($value)
 * @method static Builder<static>|TimeEntry whereLocationName($value)
 * @method static Builder<static>|TimeEntry wherePhotoPath($value)
 * @method static Builder<static>|TimeEntry whereTimestamp($value)
 * @method static Builder<static>|TimeEntry whereType($value)
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
 * @property int $user_id
 * @property Carbon $timestamp
 * @property string $type
 * @property string $method
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $address
 * @property string|null $notes
 * @property string $status
 * @property bool $is_manual
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 * @property-read ProfileContract|null $creator
 * @property-read string $formatted_date
 * @property-read string $formatted_time
 * @property-read string $formatted_timestamp
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|TimeRecord forDate(\Carbon\Carbon $date)
 * @method static Builder<static>|TimeRecord forUser(int $userId)
 * @method static Builder<static>|TimeRecord newModelQuery()
 * @method static Builder<static>|TimeRecord newQuery()
 * @method static Builder<static>|TimeRecord ofType(string $type)
 * @method static Builder<static>|TimeRecord query()
 * @method static Builder<static>|TimeRecord valid()
 * @property-read ProfileContract|null $deleter
 * @method static TimeRecordFactory factory($count = null, $state = [])
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
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $type
 * @property string|null $first_name
 * @property string|null $last_name
 * @property Carbon|null $date_of_birth
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $city
 * @property string|null $phone
 * @property string|null $lang
 * @property int|null $current_team_id
 * @property bool $is_active
 * @property bool $is_otp
 * @property Carbon|null $password_expires_at
 * @property Carbon|null $email_verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $remember_token
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property-read Collection<int, Consent> $activeConsents
 * @property-read int|null $active_consents_count
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Collection<int, AuthenticationLog> $authentications
 * @property-read int|null $authentications_count
 * @property-read Collection<int, Client> $clients
 * @property-read int|null $clients_count
 * @property-read Collection<int, Consent> $consents
 * @property-read int|null $consents_count
 * @property-read Team|null $currentTeam
 * @property-read TenantUser|Membership|DeviceUser|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Collection<int, User> $all_team_users
 * @property-read string $full_name
 * @property-read AuthenticationLog|null $latestAuthentication
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read DatabaseNotificationCollection<int, Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read ProfileContract|null $profile
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read int|null $socialite_users_count
 * @property-read Collection<int, Membership> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Collection<int, Team> $teams
 * @property-read int|null $teams_count
 * @property-read Collection<int, Tenant> $tenants
 * @property-read int|null $tenants_count
 * @property-read Collection<int, Token> $tokens
 * @property-read int|null $tokens_count
 * @property-read Collection<int, Treatment> $treatments
 * @property-read int|null $treatments_count
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User orWhereNotState(string $column, $states)
 * @method static Builder<static>|User orWhereState(string $column, $states)
 * @method static Builder<User> permission($permissions, $without = false)
 * @method static Builder<User> query()
 * @method static Builder<User> role($roles, $guard = null, $without = false)
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
 * @method static Builder<static>|User whereNotState(string $column, $states)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User wherePasswordExpiresAt($value)
 * @method static Builder<static>|User whereProfilePhotoPath($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereState(string $column, $states)
 * @method static Builder<static>|User whereType($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User whereUpdatedBy($value)
 * @method static Builder<User> withoutPermission($permissions)
 * @method static Builder<User> withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $membershipTeams
 * @property-read int|null $membership_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthClient> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User childrenWith(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User childrenWithCount(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTeam($teams)
 */
	class User extends \Eloquent implements \Spatie\ModelStates\HasStatesContract {}
}

namespace Modules\Employee\Models{
/**
 * Class WorkHour.
 *
 * @property int $id
 * @property int $employee_id
 * @property WorkHourTypeEnum $type
 * @property Carbon $timestamp
 * @property float|null $location_lat
 * @property float|null $location_lng
 * @property string|null $location_name
 * @property array<string, mixed>|null $device_info
 * @property string|null $photo_path
 * @property string|null $notes
 * @property WorkHourStatusEnum $status
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read User|null $approvedBy
 * @property-read ProfileContract|null $creator
 * @property-read string $formatted_date
 * @property-read string $formatted_date_time
 * @property-read string $formatted_time
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|WorkHour forDate(\Carbon\Carbon $date)
 * @method static Builder<static>|WorkHour forEmployee(int $employeeId)
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
 * @property-read ProfileContract|null $deleter
 * @method static WorkHourFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class WorkHour extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Consent.
 *
 * @property string $id
 * @property string|null $treatment_id
 * @property string|null $subject_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $user_type
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $accepted_at
 * @property ProfileContract|null $creator
 * @property Treatment|null $treatment
 * @property string $id
 * @property string|null $treatment_id
 * @property string|null $subject_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $user_type
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $accepted_at
 * @property ProfileContract|null $creator
 * @property Treatment|null $treatment
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Consent newModelQuery()
 * @method static Builder<static>|Consent newQuery()
 * @method static Builder<static>|Consent query()
 * @method static Builder<static>|Consent whereAcceptedAt($value)
 * @method static Builder<static>|Consent whereCreatedAt($value)
 * @method static Builder<static>|Consent whereCreatedBy($value)
 * @method static Builder<static>|Consent whereDeletedAt($value)
 * @method static Builder<static>|Consent whereDeletedBy($value)
 * @method static Builder<static>|Consent whereId($value)
 * @method static Builder<static>|Consent whereSubjectId($value)
 * @method static Builder<static>|Consent whereTreatmentId($value)
 * @method static Builder<static>|Consent whereType($value)
 * @method static Builder<static>|Consent whereUpdatedAt($value)
 * @method static Builder<static>|Consent whereUpdatedBy($value)
 * @method static Builder<static>|Consent whereUserId($value)
 * @method static Builder<static>|Consent whereUserType($value)
 * @property ProfileContract|null $deleter
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @method static \Modules\Gdpr\Database\Factories\ConsentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Consent whereIpAddress($value)
 * @method static Builder<static>|Consent whereUserAgent($value)
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @method static \Modules\Gdpr\Database\Factories\ConsentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Consent whereIpAddress($value)
 * @method static Builder<static>|Consent whereUserAgent($value)
 * @mixin \Eloquent
 */
	class Consent extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Event.
 *
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property string               $id
 * @property string|null          $treatment_id
 * @property string|null          $consent_id
 * @property string               $subject_id
 * @property string               $ip
 * @property string               $action
 * @property string               $payload
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 * @property Consent|null         $consent
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event query()
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
 * @property ProfileContract|null $deleter
 * @method static \Modules\Gdpr\Database\Factories\EventFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Event extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Profile.
 *
 * @property string                                                    $id
 * @property string|null                                               $post_type
 * @property string|null                                               $bio
 * @property Carbon|null                                               $created_at
 * @property Carbon|null                                               $updated_at
 * @property string|null                                               $created_by
 * @property string|null                                               $updated_by
 * @property string|null                                               $deleted_by
 * @property string|null                                               $first_name
 * @property string|null                                               $surname
 * @property string|null                                               $email
 * @property string|null                                               $phone
 * @property string|null                                               $address
 * @property string|null                                               $user_id
 * @property string|null                                               $last_name
 * @property string|null                                               $tax_code
 * @property string|null                                               $vat_number
 * @property Carbon|null                                               $deleted_at
 * @property SchemalessAttributes                                      $extra
 * @property string                                                    $avatar
 * @property ProfileContract|null                                      $creator
 * @property Collection<int, DeviceUser>                               $deviceUsers
 * @property int|null                                                  $device_users_count
 * @property DeviceProfile|null                                        $pivot
 * @property Collection<int, Device>                                   $devices
 * @property int|null                                                  $devices_count
 * @property string|null                                               $full_name
 * @property MediaCollection<int, Media>                               $media
 * @property int|null                                                  $media_count
 * @property Collection<int, DeviceUser>                               $mobileDeviceUsers
 * @property int|null                                                  $mobile_device_users_count
 * @property Collection<int, Device>                                   $mobileDevices
 * @property int|null                                                  $mobile_devices_count
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property string                                                    $id
 * @property string|null                                               $post_type
 * @property string|null                                               $bio
 * @property Carbon|null                                               $created_at
 * @property Carbon|null                                               $updated_at
 * @property string|null                                               $created_by
 * @property string|null                                               $updated_by
 * @property string|null                                               $deleted_by
 * @property string|null                                               $first_name
 * @property string|null                                               $surname
 * @property string|null                                               $email
 * @property string|null                                               $phone
 * @property string|null                                               $address
 * @property string|null                                               $user_id
 * @property string|null                                               $last_name
 * @property string|null                                               $tax_code
 * @property string|null                                               $vat_number
 * @property Carbon|null                                               $deleted_at
 * @property SchemalessAttributes                                      $extra
 * @property string                                                    $avatar
 * @property ProfileContract|null                                      $creator
 * @property Collection<int, DeviceUser>                               $deviceUsers
 * @property int|null                                                  $device_users_count
 * @property DeviceProfile|null                                        $pivot
 * @property Collection<int, Device>                                   $devices
 * @property int|null                                                  $devices_count
 * @property string|null                                               $full_name
 * @property MediaCollection<int, Media>                               $media
 * @property int|null                                                  $media_count
 * @property Collection<int, DeviceUser>                               $mobileDeviceUsers
 * @property int|null                                                  $mobile_device_users_count
 * @property Collection<int, Device>                                   $mobileDevices
 * @property int|null                                                  $mobile_devices_count
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Permission>                               $permissions
 * @property int|null                                                  $permissions_count
 * @property Collection<int, Role>                                     $roles
 * @property int|null                                                  $roles_count
 * @property ProfileContract|null                                      $updater
 * @property User|null                                                 $user
 * @property string|null                                               $user_name
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Permission>                               $permissions
 * @property int|null                                                  $permissions_count
 * @property Collection<int, Role>                                     $roles
 * @property int|null                                                  $roles_count
 * @property ProfileContract|null                                      $updater
 * @property User|null                                                 $user
 * @property string|null                                               $user_name
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Profile whereAddress($value)
 * @method static Builder<static>|Profile whereBio($value)
 * @method static Builder<static>|Profile whereCreatedAt($value)
 * @method static Builder<static>|Profile whereCreatedBy($value)
 * @method static Builder<static>|Profile whereDeletedAt($value)
 * @method static Builder<static>|Profile whereDeletedBy($value)
 * @method static Builder<static>|Profile whereEmail($value)
 * @method static Builder<static>|Profile whereFirstName($value)
 * @method static Builder<static>|Profile whereId($value)
 * @method static Builder<static>|Profile whereLastName($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile wherePostType($value)
 * @method static Builder<static>|Profile whereSurname($value)
 * @method static Builder<static>|Profile whereTaxCode($value)
 * @method static Builder<static>|Profile whereUpdatedAt($value)
 * @method static Builder<static>|Profile whereUpdatedBy($value)
 * @method static Builder<static>|Profile whereUserId($value)
 * @method static Builder<static>|Profile whereVatNumber($value)
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, $guard = null)
 * @property ProfileContract|null $deleter
 * @property string|null          $fiscal_code
 * @property string|null          $notes
 * @property string|null          $fiscal_code
 * @property string|null          $notes
 * @method static Builder<static>|Profile                         childrenWith(array<int|string, mixed> $relations)
 * @method static Builder<static>|Profile                         childrenWithCount(array<int|string, mixed> $relations)
 * @method static \Modules\Gdpr\Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @method static Builder<static>|Profile                         whereFiscalCode($value)
 * @method static Builder<static>|Profile                         whereNotes($value)
 * @method static Builder<static>|Profile                         byUuid(string $uuid)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile withoutTeam($teams)
 */
	class Profile extends \Eloquent {}
}

namespace Modules\Gdpr\Models{
/**
 * Modules\Gdpr\Models\Treatment.
 *
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $id
 * @property int $active
 * @property int $required
 * @property string $name
 * @property string $description
 * @property string|null $documentVersion
 * @property string|null $documentUrl
 * @property int $weight
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Treatment newModelQuery()
 * @method static Builder<static>|Treatment newQuery()
 * @method static Builder<static>|Treatment query()
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
 * @property ProfileContract|null $deleter
 * @method static \Modules\Gdpr\Database\Factories\TreatmentFactory factory($count = null, $state = [])
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
 * @property string|null $model_type
 * @property string|null $model_id
 * @property string|null $name Nome identificativo dell'indirizzo
 * @property string|null $description Descrizione opzionale
 * @property string|null $route Via/Piazza
 * @property string|null $street_number Numero civico
 * @property string|null $locality Comune/Città
 * @property string|null $administrative_area_level_3 Provincia
 * @property string|null $administrative_area_level_2 Regione
 * @property string|null $administrative_area_level_1 Stato/Paese
 * @property string|null $country Codice paese ISO
 * @property string|null $postal_code CAP
 * @property string|null $formatted_address
 * @property string|null $place_id ID Google Places
 * @property float|null $latitude
 * @property float|null $longitude
 * @property AddressTypeEnum|null $type Tipo indirizzo (home, work, etc.)
 * @property bool $is_primary
 * @property array<array-key, mixed>|null $extra_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property Model|\Eloquent|null $addressable
 * @property ProfileContract|null $creator
 * @property string $full_address
 * @property string $street_address
 * @property Model|\Eloquent|null $model
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Address nearby(float $latitude, float $longitude, float $radiusKm = 10)
 * @method static Builder<static>|Address newModelQuery()
 * @method static Builder<static>|Address newQuery()
 * @method static Builder<static>|Address ofType($type)
 * @method static Builder<static>|Address primary()
 * @method static Builder<static>|Address query()
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
 * @method static Builder<static>|Address wherePlaceId($value)
 * @method static Builder<static>|Address wherePostalCode($value)
 * @method static Builder<static>|Address whereRoute($value)
 * @method static Builder<static>|Address whereStreetNumber($value)
 * @method static Builder<static>|Address whereType($value)
 * @method static Builder<static>|Address whereUpdatedAt($value)
 * @method static Builder<static>|Address whereUpdatedBy($value)
 * @property ProfileContract|null $deleter
 * @method static AddressFactory factory($count = null, $state = [])
 * @property string|null $phone
 * @method static Builder<static>|Address wherePhone($value)
 * @mixin \Eloquent
 */
	class Address extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Suddivisione tipo “county” (contesto USA / geonames), non il comune italiano.
 *
 * @property string               $id
 * @property string               $county
 * @property string|null          $county_code
 * @property int|null             $state_id
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static CountyFactory          factory($count = null, $state = [])
 * @method static Builder<static>|County newModelQuery()
 * @method static Builder<static>|County newQuery()
 * @method static Builder<static>|County query()
 * @method static Builder<static>|County whereCounty($value)
 * @method static Builder<static>|County whereCountyCode($value)
 * @method static Builder<static>|County whereCreatedAt($value)
 * @method static Builder<static>|County whereId($value)
 * @method static Builder<static>|County whereStateId($value)
 * @method static Builder<static>|County whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class County extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Modules\Geo\Models\GeoNamesCap.
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|GeoNamesCap newModelQuery()
 * @method static Builder<static>|GeoNamesCap newQuery()
 * @method static Builder<static>|GeoNamesCap query()
 * @property ProfileContract|null $deleter
 * @method static GeoNamesCapFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class GeoNamesCap extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int|null $region_id
 * @property int|null $province_id
 * @property string|null $name
 * @property int $id
 * @property array<array-key, mixed>|null $postal_code
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Locality newModelQuery()
 * @method static Builder<static>|Locality newQuery()
 * @method static Builder<static>|Locality query()
 * @method static Builder<static>|Locality whereId($value)
 * @method static Builder<static>|Locality whereName($value)
 * @method static Builder<static>|Locality wherePostalCode($value)
 * @method static Builder<static>|Locality whereProvinceId($value)
 * @method static Builder<static>|Locality whereRegionId($value)
 * @property ProfileContract|null $deleter
 * @method static LocalityFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Locality extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * Class Location.
 *
 * @property int                                     $id
 * @property string|null                             $model_type
 * @property string|null                             $model_id
 * @property string|null                             $name
 * @property float|null                              $lat
 * @property float|null                              $lng
 * @property string|null                             $street
 * @property string|null                             $city
 * @property string|null                             $state
 * @property string|null                             $zip
 * @property string|null                             $formatted_address
 * @property string|null                             $description
 * @property bool|null                               $processed
 * @property Carbon|null                             $created_at
 * @property Carbon|null                             $updated_at
 * @property string|null                             $updated_by
 * @property string|null                             $created_by
 * @property string|null                             $deleted_at
 * @property string|null                             $deleted_by
 * @property ProfileContract|null                    $creator
 * @property array{lat: float|null, lng: float|null} $location
 * @property ProfileContract|null                    $updater
 * @method static Builder<static>|Location newModelQuery()
 * @method static Builder<static>|Location newQuery()
 * @method static Builder<static>|Location query()
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
 * @method static Builder<static>|Location withinDistance(float $latitude, float $longitude, float $distanceInKm)
 * @property ProfileContract|null $deleter
 * @method static LocationFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Location extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property Address|null         $address
 * @property ProfileContract|null $creator
 * @property string               $formatted_address
 * @property float|null           $latitude
 * @property float|null           $longitude
 * @property Model|\Eloquent      $linked
 * @property PlaceType|null       $placeType
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Place newModelQuery()
 * @method static Builder<static>|Place newQuery()
 * @method static Builder<static>|Place query()
 * @property int                  $id
 * @property string|null          $model_type
 * @property int|null             $model_id
 * @property string|null          $premise
 * @property string|null          $premise_short
 * @property string|null          $locality
 * @property string|null          $locality_short
 * @property string|null          $postal_town
 * @property string|null          $postal_town_short
 * @property string|null          $administrative_area_level_3
 * @property string|null          $administrative_area_level_3_short
 * @property string|null          $administrative_area_level_2
 * @property string|null          $administrative_area_level_2_short
 * @property string|null          $administrative_area_level_1
 * @property string|null          $administrative_area_level_1_short
 * @property string|null          $country
 * @property string|null          $country_short
 * @property string|null          $street_number
 * @property string|null          $street_number_short
 * @property string|null          $route
 * @property string|null          $route_short
 * @property string|null          $postal_code
 * @property string|null          $postal_code_short
 * @property string|null          $googleplace_url
 * @property string|null          $googleplace_url_short
 * @property string|null          $point_of_interest
 * @property string|null          $point_of_interest_short
 * @property string|null          $political
 * @property string|null          $political_short
 * @property string|null          $campground
 * @property string|null          $campground_short
 * @property string|null          $nearest_street
 * @property string|null          $created_by
 * @property string|null          $updated_by
 * @property string|null          $deleted_by
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $post_type
 * @property ProfileContract|null $deleter
 * @method static PlaceFactory          factory($count = null, $state = [])
 * @method static Builder<static>|Place whereAddress($value)
 * @method static Builder<static>|Place whereAdministrativeAreaLevel1($value)
 * @method static Builder<static>|Place whereAdministrativeAreaLevel1Short($value)
 * @method static Builder<static>|Place whereAdministrativeAreaLevel2($value)
 * @method static Builder<static>|Place whereAdministrativeAreaLevel2Short($value)
 * @method static Builder<static>|Place whereAdministrativeAreaLevel3($value)
 * @method static Builder<static>|Place whereAdministrativeAreaLevel3Short($value)
 * @method static Builder<static>|Place whereCampground($value)
 * @method static Builder<static>|Place whereCampgroundShort($value)
 * @method static Builder<static>|Place whereCountry($value)
 * @method static Builder<static>|Place whereCountryShort($value)
 * @method static Builder<static>|Place whereCreatedAt($value)
 * @method static Builder<static>|Place whereCreatedBy($value)
 * @method static Builder<static>|Place whereDeletedBy($value)
 * @method static Builder<static>|Place whereFormattedAddress($value)
 * @method static Builder<static>|Place whereGoogleplaceUrl($value)
 * @method static Builder<static>|Place whereGoogleplaceUrlShort($value)
 * @method static Builder<static>|Place whereId($value)
 * @method static Builder<static>|Place whereLatitude($value)
 * @method static Builder<static>|Place whereLocality($value)
 * @method static Builder<static>|Place whereLocalityShort($value)
 * @method static Builder<static>|Place whereLongitude($value)
 * @method static Builder<static>|Place whereModelId($value)
 * @method static Builder<static>|Place whereModelType($value)
 * @method static Builder<static>|Place whereNearestStreet($value)
 * @method static Builder<static>|Place wherePointOfInterest($value)
 * @method static Builder<static>|Place wherePointOfInterestShort($value)
 * @method static Builder<static>|Place wherePolitical($value)
 * @method static Builder<static>|Place wherePoliticalShort($value)
 * @method static Builder<static>|Place wherePostType($value)
 * @method static Builder<static>|Place wherePostalCode($value)
 * @method static Builder<static>|Place wherePostalCodeShort($value)
 * @method static Builder<static>|Place wherePostalTown($value)
 * @method static Builder<static>|Place wherePostalTownShort($value)
 * @method static Builder<static>|Place wherePremise($value)
 * @method static Builder<static>|Place wherePremiseShort($value)
 * @method static Builder<static>|Place whereRoute($value)
 * @method static Builder<static>|Place whereRouteShort($value)
 * @method static Builder<static>|Place whereStreetNumber($value)
 * @method static Builder<static>|Place whereStreetNumberShort($value)
 * @method static Builder<static>|Place whereUpdatedAt($value)
 * @method static Builder<static>|Place whereUpdatedBy($value)
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $description
 * @property int|null    $place_type_id
 * @method static Builder<static>|Place whereDescription($value)
 * @method static Builder<static>|Place whereName($value)
 * @method static Builder<static>|Place wherePlaceTypeId($value)
 * @method static Builder<static>|Place whereSlug($value)
 * @mixin \Eloquent
 */
	class Place extends \Eloquent implements \Modules\Geo\Contracts\HasGeolocation {}
}

namespace Modules\Geo\Models{
/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|PlaceType newModelQuery()
 * @method static Builder<static>|PlaceType newQuery()
 * @method static Builder<static>|PlaceType query()
 * @property ProfileContract|null $deleter
 * @method static PlaceTypeFactory factory($count = null, $state = [])
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
 * @property ProfileContract|null $creator
 * @property Collection<int, Locality> $localities
 * @property int|null $localities_count
 * @property Region|null $region
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Province newModelQuery()
 * @method static Builder<static>|Province newQuery()
 * @method static Builder<static>|Province query()
 * @method static Builder<static>|Province whereId($value)
 * @method static Builder<static>|Province whereName($value)
 * @method static Builder<static>|Province whereRegionId($value)
 * @property ProfileContract|null $deleter
 * @method static ProvinceFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Province extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property ProfileContract|null $creator
 * @property Collection<int, Province> $provinces
 * @property int|null $provinces_count
 * @property ProfileContract|null $updater
 * @method static RegionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Region newModelQuery()
 * @method static Builder<static>|Region newQuery()
 * @method static Builder<static>|Region query()
 * @method static Builder<static>|Region whereId($value)
 * @method static Builder<static>|Region whereName($value)
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Region extends \Eloquent {}
}

namespace Modules\Geo\Models{
/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|State newModelQuery()
 * @method static Builder<static>|State newQuery()
 * @method static Builder<static>|State query()
 * @property ProfileContract|null $deleter
 * @method static StateFactory factory($count = null, $state = [])
 * @property string      $id
 * @property string      $state
 * @property string      $state_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder<static>|State whereCreatedAt($value)
 * @method static Builder<static>|State whereId($value)
 * @method static Builder<static>|State whereState($value)
 * @method static Builder<static>|State whereStateCode($value)
 * @method static Builder<static>|State whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class State extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * @property string $id
 * @property Carbon|null $completed_at
 * @property string $file_disk
 * @property string|null $file_name
 * @property string $exporter
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $user_type
 * @property-read Model|Eloquent|null $user
 * @method static Builder<static>|Export newModelQuery()
 * @method static Builder<static>|Export newQuery()
 * @method static Builder<static>|Export query()
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
 * @property string $id
 * @property array<array-key, mixed> $data
 * @property int $import_id
 * @property string|null $validation_error
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static FailedImportRowFactory factory($count = null, $state = [])
 * @method static Builder<static>|FailedImportRow newModelQuery()
 * @method static Builder<static>|FailedImportRow newQuery()
 * @method static Builder<static>|FailedImportRow query()
 * @method static Builder<static>|FailedImportRow whereCreatedAt($value)
 * @method static Builder<static>|FailedImportRow whereCreatedBy($value)
 * @method static Builder<static>|FailedImportRow whereData($value)
 * @method static Builder<static>|FailedImportRow whereId($value)
 * @method static Builder<static>|FailedImportRow whereImportId($value)
 * @method static Builder<static>|FailedImportRow whereUpdatedAt($value)
 * @method static Builder<static>|FailedImportRow whereUpdatedBy($value)
 * @method static Builder<static>|FailedImportRow whereValidationError($value)
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class FailedImportRow extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\FailedJob.
 *
 * @property string $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property string $exception
 * @property string $failed_at
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static FailedJobFactory factory($count = null, $state = [])
 * @method static Builder<static>|FailedJob newModelQuery()
 * @method static Builder<static>|FailedJob newQuery()
 * @method static Builder<static>|FailedJob query()
 * @method static Builder<static>|FailedJob whereConnection($value)
 * @method static Builder<static>|FailedJob whereException($value)
 * @method static Builder<static>|FailedJob whereFailedAt($value)
 * @method static Builder<static>|FailedJob whereId($value)
 * @method static Builder<static>|FailedJob wherePayload($value)
 * @method static Builder<static>|FailedJob whereQueue($value)
 * @method static Builder<static>|FailedJob whereUuid($value)
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class FailedJob extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Frequency.
 *
 * @property string $id
 * @property int $task_id
 * @property string $label
 * @property string $interval
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
 * @property-read Collection<int, Parameter> $parameters
 * @property-read int|null $parameters_count
 * @property-read Task|null $task
 * @property-read ProfileContract|null $updater
 * @method static FrequencyFactory factory($count = null, $state = [])
 * @method static Builder<static>|Frequency newModelQuery()
 * @method static Builder<static>|Frequency newQuery()
 * @method static Builder<static>|Frequency query()
 * @method static Builder<static>|Frequency whereCreatedAt($value)
 * @method static Builder<static>|Frequency whereCreatedBy($value)
 * @method static Builder<static>|Frequency whereId($value)
 * @method static Builder<static>|Frequency whereInterval($value)
 * @method static Builder<static>|Frequency whereLabel($value)
 * @method static Builder<static>|Frequency whereTaskId($value)
 * @method static Builder<static>|Frequency whereUpdatedAt($value)
 * @method static Builder<static>|Frequency whereUpdatedBy($value)
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Frequency extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * @property string $id
 * @property Carbon|null $completed_at
 * @property string $file_name
 * @property string $file_path
 * @property string $importer
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property string|null $user_type
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static ImportFactory factory($count = null, $state = [])
 * @method static Builder<static>|Import newModelQuery()
 * @method static Builder<static>|Import newQuery()
 * @method static Builder<static>|Import query()
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
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Import extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Job.
 *
 * @property int $id
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read ProfileContract|null $updater
 * @method static JobFactory factory($count = null, $state = [])
 * @method static Builder<static>|Job newModelQuery()
 * @method static Builder<static>|Job newQuery()
 * @method static Builder<static>|Job query()
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
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Job extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\JobBatch.
 *
 * @property string $id
 * @property string $name
 * @property int $total_jobs
 * @property int $pending_jobs
 * @property int $failed_jobs
 * @property string $failed_job_ids
 * @property Collection<array-key, mixed>|null $options
 * @property Carbon|null $cancelled_at
 * @property Carbon $created_at
 * @property Carbon|null $finished_at
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static JobBatchFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobBatch newModelQuery()
 * @method static Builder<static>|JobBatch newQuery()
 * @method static Builder<static>|JobBatch query()
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
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class JobBatch extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
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
 * @property-read ProfileContract|null $creator
 * @property-read string $status
 * @property-read ProfileContract|null $updater
 * @method static JobManagerFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobManager newModelQuery()
 * @method static Builder<static>|JobManager newQuery()
 * @method static Builder<static>|JobManager query()
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
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class JobManager extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\JobsWaiting.
 *
 * @property int $id
 * @property string $queue
 * @property array<array-key, mixed> $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read ProfileContract|null $updater
 * @method static JobsWaitingFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobsWaiting newModelQuery()
 * @method static Builder<static>|JobsWaiting newQuery()
 * @method static Builder<static>|JobsWaiting query()
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
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class JobsWaiting extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Parameter.
 *
 * @property string $id
 * @property int $frequency_id
 * @property string $name
 * @property string $value
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
 * @property-read Frequency|null $task
 * @property-read ProfileContract|null $updater
 * @method static ParameterFactory factory($count = null, $state = [])
 * @method static Builder<static>|Parameter newModelQuery()
 * @method static Builder<static>|Parameter newQuery()
 * @method static Builder<static>|Parameter query()
 * @method static Builder<static>|Parameter whereCreatedAt($value)
 * @method static Builder<static>|Parameter whereCreatedBy($value)
 * @method static Builder<static>|Parameter whereFrequencyId($value)
 * @method static Builder<static>|Parameter whereId($value)
 * @method static Builder<static>|Parameter whereName($value)
 * @method static Builder<static>|Parameter whereUpdatedAt($value)
 * @method static Builder<static>|Parameter whereUpdatedBy($value)
 * @method static Builder<static>|Parameter whereValue($value)
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Parameter extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Result.
 *
 * @property string $id
 * @property int $task_id
 * @property Carbon $ran_at
 * @property string $duration
 * @property string $result
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
 * @property-read Task|null $task
 * @property-read ProfileContract|null $updater
 * @method static Factory<static> factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereRanAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Result whereUpdatedBy($value)
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Result extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Schedule.
 *
 * @property string $id
 * @property string $command
 * @property string|null $command_custom
 * @property array<array-key, array{name?: string, value?: bool|float|int|string|null, required?: bool, type?: string}>|null $params
 * @property string $expression
 * @property array<array-key, bool|float|int|string|null>|null $environments
 * @property array<array-key, array{name?: string, value?: bool|float|int|string|null}|bool|float|int|string|null>|null $options
 * @property array<array-key, array{name?: string, value?: bool|float|int|string|null, required?: bool, type?: string}>|null $options_with_value
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
 * @property Status $status
 * @property int $run_in_background
 * @property int $sendmail_success
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property \Illuminate\Database\Eloquent\Collection<int, ScheduleHistory> $histories
 * @property int|null $histories_count
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Schedule active()
 * @method static ScheduleFactory factory($count = null, $state = [])
 * @method static Builder<static>|Schedule inactive()
 * @method static Builder<static>|Schedule newModelQuery()
 * @method static Builder<static>|Schedule newQuery()
 * @method static Builder<static>|Schedule onlyTrashed()
 * @method static Builder<static>|Schedule query()
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
 * @method static Builder<static>|Schedule withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Schedule withoutTrashed()
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Schedule extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\ScheduleHistory.
 *
 * @property string $id
 * @property Schedule|null $command
 * @property array<array-key, mixed>|null $params
 * @property string $output
 * @property array<array-key, mixed>|null $options
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $schedule_id
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static ScheduleHistoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|ScheduleHistory newModelQuery()
 * @method static Builder<static>|ScheduleHistory newQuery()
 * @method static Builder<static>|ScheduleHistory query()
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
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class ScheduleHistory extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Modules\Job\Models\Task.
 *
 * @property string $id
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
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
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
 * @property-read ProfileContract|null $updater
 * @method static Builder<static>|Task newModelQuery()
 * @method static Builder<static>|Task newQuery()
 * @method static Builder<static>|Task query()
 * @method static Builder<static>|Task sortableBy(array<string> $sortableColumns, array<string, 'asc'|'desc'> $defaultSort = [])
 * @method static Builder<static>|Task whereAutoCleanupNum($value)
 * @method static Builder<static>|Task whereAutoCleanupType($value)
 * @method static Builder<static>|Task whereCommand($value)
 * @method static Builder<static>|Task whereCreatedAt($value)
 * @method static Builder<static>|Task whereCreatedBy($value)
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
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property-read ProfileContract|null $deleter
 * @method static TaskFactory factory($count = null, $state = [])
 * @method static Builder<static>|Task whereDeletedAt($value)
 * @method static Builder<static>|Task whereDeletedBy($value)
 * @mixin \Eloquent
 */
	class Task extends \Eloquent {}
}

namespace Modules\Job\Models{
/**
 * Class TaskComment.
 *
 * @property ProfileContract|null $creator
 * @property Task|null $task
 * @property ProfileContract|null $updater
 * @property User|null $user
 * @method static Builder<static>|TaskComment newModelQuery()
 * @method static Builder<static>|TaskComment newQuery()
 * @method static Builder<static>|TaskComment onlyTrashed()
 * @method static Builder<static>|TaskComment query()
 * @method static Builder<static>|TaskComment withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|TaskComment withoutTrashed()
 * @property-read ProfileContract|null $deleter
 * @method static TaskCommentFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class TaskComment extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * Modules\Lang\Models\LanguageLine.
 *
 * @property int $id
 * @property string $group
 * @property string $key
 * @property array<array-key, mixed> $text
 * @property string $locale
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static EloquentBuilder<static>|LanguageLine newModelQuery()
 * @method static EloquentBuilder<static>|LanguageLine newQuery()
 * @method static EloquentBuilder<static>|LanguageLine query()
 * @method static EloquentBuilder<static>|LanguageLine whereId($value)
 * @method static EloquentBuilder<static>|LanguageLine whereGroup($value)
 * @method static EloquentBuilder<static>|LanguageLine whereKey($value)
 * @method static EloquentBuilder<static>|LanguageLine whereText($value)
 * @method static EloquentBuilder<static>|LanguageLine whereLocale($value)
 * @method static EloquentBuilder<static>|LanguageLine whereCreatedAt($value)
 * @method static EloquentBuilder<static>|LanguageLine whereUpdatedAt($value)
 * @method static EloquentBuilder<static>|LanguageLine whereCreatedBy($value)
 * @method static EloquentBuilder<static>|LanguageLine whereUpdatedBy($value)
 * @property-read Profile|null $creator
 * @property-read Profile|null $deleter
 * @property-read Profile|null $updater
 * @method static \Modules\Lang\Database\Factories\LanguageLineFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class LanguageLine extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * Modules\Lang\Models\Post.
 *
 * @property string $id
 * @property int|null $user_id
 * @property string|null $post_type
 * @property int|null $post_id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $guid
 * @property string|null $txt
 * @property string|null $image_src
 * @property string|null $image_alt
 * @property string|null $image_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property int|null $author_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $category_id
 * @property string|null $image
 * @property string|null $content
 * @property int|null $published
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $url
 * @property array<array-key, mixed>|null $url_lang
 * @property array<array-key, mixed>|null $image_resize_src
 * @property string|null $linked_count
 * @property string|null $related_count
 * @property string|null $relatedrev_count
 * @property string|null $linkable_type
 * @property int|null $views_count
 * @property ProfileContract|null $creator
 * @property Model|null $linkable
 * @property ProfileContract|null $updater
 * @method static Builder<static>|Post newModelQuery()
 * @method static Builder<static>|Post newQuery()
 * @method static Builder<static>|Post query()
 * @method static Builder<static>|Post whereAuthorId($value)
 * @method static Builder<static>|Post whereCategoryId($value)
 * @method static Builder<static>|Post whereContent($value)
 * @method static Builder<static>|Post whereCreatedAt($value)
 * @method static Builder<static>|Post whereCreatedBy($value)
 * @method static Builder<static>|Post whereGuid($value)
 * @method static Builder<static>|Post whereId($value)
 * @method static Builder<static>|Post whereImage($value)
 * @method static Builder<static>|Post whereImageAlt($value)
 * @method static Builder<static>|Post whereImageResizeSrc($value)
 * @method static Builder<static>|Post whereImageSrc($value)
 * @method static Builder<static>|Post whereImageTitle($value)
 * @method static Builder<static>|Post whereLang($value)
 * @method static Builder<static>|Post whereLinkableType($value)
 * @method static Builder<static>|Post whereLinkedCount($value)
 * @method static Builder<static>|Post whereMetaDescription($value)
 * @method static Builder<static>|Post whereMetaKeywords($value)
 * @method static Builder<static>|Post wherePostId($value)
 * @method static Builder<static>|Post wherePostType($value)
 * @method static Builder<static>|Post wherePublished($value)
 * @method static Builder<static>|Post whereRelatedCount($value)
 * @method static Builder<static>|Post whereRelatedrevCount($value)
 * @method static Builder<static>|Post whereSubtitle($value)
 * @method static Builder<static>|Post whereTitle($value)
 * @method static Builder<static>|Post whereTxt($value)
 * @method static Builder<static>|Post whereUpdatedAt($value)
 * @method static Builder<static>|Post whereUpdatedBy($value)
 * @method static Builder<static>|Post whereUrl($value)
 * @method static Builder<static>|Post whereUrlLang($value)
 * @method static Builder<static>|Post whereUserId($value)
 * @method static Builder<static>|Post whereViewsCount($value)
 * @property ProfileContract|null $deleter
 * @method static PostFactory factory($count = null, $state = [])
 * @mixin Model
 * @property string|null $excerpt
 * @property string|null $slug
 * @property string|null $status
 * @property Carbon|null $published_at
 * @property string|null $locale
 * @property string|null $category
 * @property string|null $meta_title
 * @method static Builder<static>|Post whereCategory($value)
 * @method static Builder<static>|Post whereExcerpt($value)
 * @method static Builder<static>|Post whereLocale($value)
 * @method static Builder<static>|Post whereMetaTitle($value)
 * @method static Builder<static>|Post wherePublishedAt($value)
 * @method static Builder<static>|Post whereSlug($value)
 * @method static Builder<static>|Post whereStatus($value)
 * @mixin \Eloquent
 */
	class Post extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * Modules\Lang\Models\Translation.
 *
 * @property string $id
 * @property string|null $lang
 * @property string|null $key
 * @property string|null $value
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $namespace
 * @property string $group
 * @property string|null $item
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static TranslationFactory factory($count = null, $state = [])
 * @method static EloquentBuilder<static>|Translation newModelQuery()
 * @method static EloquentBuilder<static>|Translation newQuery()
 * @method static EloquentBuilder<static>|Translation ofTranslatedGroup(string $group)
 * @method static EloquentBuilder<static>|Translation orderByGroupKeys(bool $ordered)
 * @method static EloquentBuilder<static>|Translation query()
 * @method static EloquentBuilder<static>|Translation selectDistinctGroup()
 * @method static EloquentBuilder<static>|Translation whereCreatedAt($value)
 * @method static EloquentBuilder<static>|Translation whereCreatedBy($value)
 * @method static EloquentBuilder<static>|Translation whereGroup($value)
 * @method static EloquentBuilder<static>|Translation whereId($value)
 * @method static EloquentBuilder<static>|Translation whereItem($value)
 * @method static EloquentBuilder<static>|Translation whereKey($value)
 * @method static EloquentBuilder<static>|Translation whereLang($value)
 * @method static EloquentBuilder<static>|Translation whereNamespace($value)
 * @method static EloquentBuilder<static>|Translation whereUpdatedAt($value)
 * @method static EloquentBuilder<static>|Translation whereUpdatedBy($value)
 * @method static EloquentBuilder<static>|Translation whereValue($value)
 * @property ProfileContract|null $deleter
 * @property string|null $locale
 * @property int|null $user_id
 * @method static EloquentBuilder<static>|Translation whereLocale($value)
 * @method static EloquentBuilder<static>|Translation whereUserId($value)
 * @mixin \Eloquent
 */
	class Translation extends \Eloquent {}
}

namespace Modules\Lang\Models{
/**
 * @property string|null $key
 * @property string|null $path
 * @property string|null $id
 * @property string|null $name
 * @property array<array-key, mixed>|null $content
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static TranslationFileFactory factory($count = null, $state = [])
 * @method static Builder<static>|TranslationFile newModelQuery()
 * @method static Builder<static>|TranslationFile newQuery()
 * @method static Builder<static>|TranslationFile query()
 * @method static Builder<static>|TranslationFile whereContent($value)
 * @method static Builder<static>|TranslationFile whereId($value)
 * @method static Builder<static>|TranslationFile whereKey($value)
 * @method static Builder<static>|TranslationFile whereName($value)
 * @method static Builder<static>|TranslationFile wherePath($value)
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class TranslationFile extends \Eloquent {}
}

namespace Modules\Media\Models{
/**
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array<string, mixed>|null $manipulations
 * @property array<string, mixed>|null $custom_properties
 * @property array<string, bool>|null $generated_conversions
 * @property array<string, string>|null $responsive_images
 * @property int|null $order_column
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $user_id
 * @property string $directory
 * @property string|null $path
 * @property int|null $width
 * @property int|null $height
 * @property string|null $type
 * @property string|null $ext
 * @property string|null $alt
 * @property string|null $title
 * @property string|null $description
 * @property string|null $caption
 * @property string|null $exif
 * @property string|null $curations
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property UserContract|null $creator
 * @property Model|Eloquent $model
 * @property TemporaryUpload|null $temporaryUpload
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @property array<int, array{name: string, generated: bool, src: string}> $entry_conversions
 * @property EloquentCollection<int, MediaConvert> $mediaConverts
 * @property int|null $media_converts_count
 * @method static Builder|Media newModelQuery()
 * @method static Builder|Media newQuery()
 * @method static Builder|Media ordered()
 * @method static Builder|Media query()
 * @method static Builder|Media whereAlt($value)
 * @method static Builder|Media whereCaption($value)
 * @method static Builder|Media whereCollectionName($value)
 * @method static Builder|Media whereConversionsDisk($value)
 * @method static Builder|Media whereCreatedAt($value)
 * @method static Builder|Media whereCreatedBy($value)
 * @method static Builder|Media whereCurations($value)
 * @method static Builder|Media whereCustomProperties($value)
 * @method static Builder|Media whereDeletedAt($value)
 * @method static Builder|Media whereDeletedBy($value)
 * @method static Builder|Media whereDescription($value)
 * @method static Builder|Media whereDirectory($value)
 * @method static Builder|Media whereDisk($value)
 * @method static Builder|Media whereExif($value)
 * @method static Builder|Media whereExt($value)
 * @method static Builder|Media whereFileName($value)
 * @method static Builder|Media whereGeneratedConversions($value)
 * @method static Builder|Media whereHeight($value)
 * @method static Builder|Media whereId($value)
 * @method static Builder|Media whereManipulations($value)
 * @method static Builder|Media whereMimeType($value)
 * @method static Builder|Media whereModelId($value)
 * @method static Builder|Media whereModelType($value)
 * @method static Builder|Media whereName($value)
 * @method static Builder|Media whereOrderColumn($value)
 * @method static Builder|Media wherePath($value)
 * @method static Builder|Media whereResponsiveImages($value)
 * @method static Builder|Media whereSize($value)
 * @method static Builder|Media whereTitle($value)
 * @method static Builder|Media whereType($value)
 * @method static Builder|Media whereUpdatedAt($value)
 * @method static Builder|Media whereUpdatedBy($value)
 * @method static Builder|Media whereUserId($value)
 * @method static Builder|Media whereUuid($value)
 * @method static Builder|Media whereWidth($value)
 * @method static MediaFactory factory($count = null, $state = [])
 * @property-read string $extension
 * @property-read string $human_readable_size
 * @property-read string $original_url
 * @property-read string $preview_url
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @mixin Eloquent
 */
	class Media extends \Eloquent {}
}

namespace Modules\Media\Models{
/**
 * @property int $id
 * @property int $media_id
 * @property string|null $codec_video
 * @property string|null $codec_audio
 * @property string|null $preset
 * @property string|null $bitrate
 * @property int|null $width
 * @property int|null $height
 * @property int|null $threads
 * @property int|null $speed
 * @property string|null $percentage
 * @property string|null $remaining
 * @property string|null $rate
 * @property string|null $execution_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $format
 * @property string|null $converted_file
 * @property string|null $disk
 * @property string|null $file
 * @property string|null $path
 * @property Media|null $media
 * @method static MediaConvertFactory factory($count = null, $state = [])
 * @method static Builder|MediaConvert newModelQuery()
 * @method static Builder|MediaConvert newQuery()
 * @method static Builder|MediaConvert query()
 * @method static Builder|MediaConvert whereBitrate($value)
 * @method static Builder|MediaConvert whereCodecAudio($value)
 * @method static Builder|MediaConvert whereCodecVideo($value)
 * @method static Builder|MediaConvert whereCreatedAt($value)
 * @method static Builder|MediaConvert whereCreatedBy($value)
 * @method static Builder|MediaConvert whereDeletedAt($value)
 * @method static Builder|MediaConvert whereDeletedBy($value)
 * @method static Builder|MediaConvert whereExecutionTime($value)
 * @method static Builder|MediaConvert whereFormat($value)
 * @method static Builder|MediaConvert whereHeight($value)
 * @method static Builder|MediaConvert whereId($value)
 * @method static Builder|MediaConvert whereMediaId($value)
 * @method static Builder|MediaConvert wherePercentage($value)
 * @method static Builder|MediaConvert wherePreset($value)
 * @method static Builder|MediaConvert whereRate($value)
 * @method static Builder|MediaConvert whereRemaining($value)
 * @method static Builder|MediaConvert whereSpeed($value)
 * @method static Builder|MediaConvert whereThreads($value)
 * @method static Builder|MediaConvert whereUpdatedAt($value)
 * @method static Builder|MediaConvert whereUpdatedBy($value)
 * @method static Builder|MediaConvert whereWidth($value)
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class MediaConvert extends \Eloquent {}
}

namespace Modules\Media\Models{
/**
 * Modules\Media\Models\TemporaryUpload.
 *
 * @property string $id
 * @property string $session_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @method static Builder<static>|TemporaryUpload newModelQuery()
 * @method static Builder<static>|TemporaryUpload newQuery()
 * @method static Builder<static>|TemporaryUpload query()
 * @method static Builder<static>|TemporaryUpload whereCreatedAt($value)
 * @method static Builder<static>|TemporaryUpload whereId($value)
 * @method static Builder<static>|TemporaryUpload whereSessionId($value)
 * @method static Builder<static>|TemporaryUpload whereUpdatedAt($value)
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|TemporaryUpload whereCreatedBy($value)
 * @method static Builder<static>|TemporaryUpload whereDeletedAt($value)
 * @method static Builder<static>|TemporaryUpload whereDeletedBy($value)
 * @method static Builder<static>|TemporaryUpload whereUpdatedBy($value)
 * @method static TemporaryUploadFactory factory($count = null, $state = [])
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
 * @property string|null $user_id
 * @property string $file_name
 * @property int|null $file_size
 * @property string|null $mime_type
 * @property string $status
 * @method static Builder<static>|TemporaryUpload whereFileName($value)
 * @method static Builder<static>|TemporaryUpload whereFileSize($value)
 * @method static Builder<static>|TemporaryUpload whereMimeType($value)
 * @method static Builder<static>|TemporaryUpload whereStatus($value)
 * @method static Builder<static>|TemporaryUpload whereUserId($value)
 * @mixin \Eloquent
 */
	class TemporaryUpload extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Notify\Models{
/**
 * Modules\Notify\Models\Contact.
 *
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $contact_type
 * @property string|null $value
 * @property string|null $user_id
 * @property string|null $verified_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $token
 * @property string|null $sms_sent_at
 * @property int|null $sms_count
 * @property string|null $mail_sent_at
 * @property int|null $mail_count
 * @property string|null $survey_pdf_id
 * @property string|null $token
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $attribute_1
 * @property string|null $attribute_2
 * @property string|null $attribute_3
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
 * @property string|null $name
 * @property bool|null $is_active
 * @property string|null $group
 * @property array<string, mixed>|null $preferences
 * @property string|null $engagement_level
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
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|Contact whereDeletedAt($value)
 * @method static Builder<static>|Contact whereDeletedBy($value)
 * @property-read ProfileContract|null $deleter
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
 * @property int $id
 * @property string $mailable
 * @property string|null $subject
 * @property string|null $html_layout_path
 * @property string $html_template
 * @property string|null $text_template
 * @property int $version
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string $name
 * @property string $slug
 * @property array<string, mixed> $variables
 * @property array<string, array<string, mixed>> $translations
 * @method static Builder<static>|MailTemplate forMailable(Mailable $mailable)
 * @method static Builder<static>|MailTemplate newModelQuery()
 * @method static Builder<static>|MailTemplate newQuery()
 * @method static Builder<static>|MailTemplate query()
 * @method static Builder<static>|MailTemplate whereCreatedAt($value)
 * @method static Builder<static>|MailTemplate whereCreatedBy($value)
 * @method static Builder<static>|MailTemplate whereDeletedAt($value)
 * @method static Builder<static>|MailTemplate whereDeletedBy($value)
 * @method static Builder<static>|MailTemplate whereHtmlTemplate($value)
 * @method static Builder<static>|MailTemplate whereId($value)
 * @method static Builder<static>|MailTemplate whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|MailTemplate whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|MailTemplate whereLocale(string $column, string $locale)
 * @method static Builder<static>|MailTemplate whereLocales(string $column, array<int, string> $locales)
 * @method static Builder<static>|MailTemplate whereMailable($value)
 * @method static Builder<static>|MailTemplate whereName($value)
 * @method static Builder<static>|MailTemplate whereSlug($value)
 * @method static Builder<static>|MailTemplate whereSubject($value)
 * @method static Builder<static>|MailTemplate whereTextTemplate($value)
 * @method static Builder<static>|MailTemplate whereUpdatedAt($value)
 * @method static Builder<static>|MailTemplate whereUpdatedBy($value)
 * @property array<int, string>|null $params
 * @method static Builder<static>|MailTemplate whereParams($value)
 * @property array<string, mixed>|null $sms_template
 * @property array<string, mixed>|null $whatsapp_template
 * @property int $counter
 * @method static Builder<static>|MailTemplate whereCounter($value)
 * @method static Builder<static>|MailTemplate whereSmsTemplate($value)
 * @method static Builder<static>|MailTemplate whereWhatsappTemplate($value)
 * @method static Builder<static>|MailTemplate whereHtmlLayoutPath($value)
 * @method static Builder<static>|MailTemplate whereVersion($value)
 * @method static Builder<static>|MailTemplate whereHtmlLayoutPath($value)
 * @method static Builder<static>|MailTemplate whereVersion($value)
 * @method static Builder<static>|MailTemplate whereHtmlLayoutPath($value)
 * @method static Builder<static>|MailTemplate whereVersion($value)
 * @mixin \Eloquent
 * @property-read array $translatable_columns_from
 */
	class MailTemplate extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property int|string $id
 * @property int|null $template_id
 * @property string|null $mailable_type
 * @property int|string|null $mailable_id
 * @property string|null $status
 * @property string|null $status_message
 * @property array<string, mixed> $data
 * @property array<string, mixed> $metadata
 * @property Carbon|null $sent_at
 * @property Carbon|null $delivered_at
 * @property Carbon|null $failed_at
 * @property Carbon|null $opened_at
 * @property Carbon|null $clicked_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
 * @property-read Model|\Eloquent $mailable
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read MailTemplate|null $template
 * @property-read ProfileContract|null $updater
 * @method static MailTemplateLogFactory factory($count = null, $state = [])
 * @method static Builder<static>|MailTemplateLog newModelQuery()
 * @method static Builder<static>|MailTemplateLog newQuery()
 * @method static Builder<static>|MailTemplateLog query()
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class MailTemplateLog extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property int $id
 * @property int $mail_template_id
 * @property int $version
 * @property string|null $subject
 * @property string $html_template
 * @property string|null $text_template
 * @property array<string, mixed>|null $metadata
 * @property string|null $created_by
 * @property string|null $change_notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property-read ProfileContract|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read MailTemplate|null $template
 * @property-read ProfileContract|null $updater
 * @method static MailTemplateVersionFactory factory($count = null, $state = [])
 * @method static Builder<static>|MailTemplateVersion newModelQuery()
 * @method static Builder<static>|MailTemplateVersion newQuery()
 * @method static Builder<static>|MailTemplateVersion onlyTrashed()
 * @method static Builder<static>|MailTemplateVersion query()
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
 * @method static Builder<static>|MailTemplateVersion withTrashed()
 * @method static Builder<static>|MailTemplateVersion withoutTrashed()
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class MailTemplateVersion extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Notification model for the Notify module.
 *
 * @property string $id
 * @property string $type
 * @property string|null $subject
 * @property string|null $content
 * @property string|null $priority
 * @property array<string, mixed>|null $custom_headers
 * @property array<int, mixed>|null $attachments
 * @property string|null $message
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property array<string, mixed> $data
 * @property Carbon|null $read_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property int|null $tenant_id
 * @property int|null $user_id
 * @property string|null $subject_type
 * @property int|null $subject_id
 * @property list<string>|null $channels
 * @property string|null $status
 * @property Carbon|null $sent_at
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static NotificationFactory factory($count = null, $state = [])
 * @method static Builder<static>|Notification newModelQuery()
 * @method static Builder<static>|Notification newQuery()
 * @method static Builder<static>|Notification query()
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
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Notification extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property string|null $name
 * @property string|null $driver
 * @property array<string, mixed>|null $config
 * @property bool|null $is_enabled
 * @property int|null $priority
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read ProfileContract|null $updater
 * @method static \Modules\Notify\Database\Factories\NotificationChannelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationChannel query()
 * @mixin \Eloquent
 */
	class NotificationChannel extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property string|null $template_id
 * @property string|null $notifiable_type
 * @property string|null $notifiable_id
 * @property string|null $channel
 * @property string|null $status
 * @property string|null $status_message
 * @property array<string, mixed>|null $data
 * @property array<string, mixed>|null $metadata
 * @method static Builder<static> where(string $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static static|null find(mixed $id, array<int, string>|string $columns = ['*'])
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $channels
 * @property Carbon $sent_at
 * @property string|null $error
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Model|\Eloquent $notifiable
 * @property-read NotificationTemplate|null $template
 * @property-read ProfileContract|null $updater
 * @method static \Modules\Notify\Database\Factories\NotificationLogFactory factory($count = null, $state = [])
 * @method static Builder<static>|NotificationLog forChannel(string $channel)
 * @method static Builder<static>|NotificationLog forNotifiable(\Illuminate\Database\Eloquent\Model $notifiable)
 * @method static Builder<static>|NotificationLog newModelQuery()
 * @method static Builder<static>|NotificationLog newQuery()
 * @method static Builder<static>|NotificationLog query()
 * @method static Builder<static>|NotificationLog whereChannels($value)
 * @method static Builder<static>|NotificationLog whereContent($value)
 * @method static Builder<static>|NotificationLog whereCreatedAt($value)
 * @method static Builder<static>|NotificationLog whereData($value)
 * @method static Builder<static>|NotificationLog whereError($value)
 * @method static Builder<static>|NotificationLog whereId($value)
 * @method static Builder<static>|NotificationLog whereNotifiableId($value)
 * @method static Builder<static>|NotificationLog whereNotifiableType($value)
 * @method static Builder<static>|NotificationLog whereSentAt($value)
 * @method static Builder<static>|NotificationLog whereStatus($value)
 * @method static Builder<static>|NotificationLog whereTitle($value)
 * @method static Builder<static>|NotificationLog whereUpdatedAt($value)
 * @method static Builder<static>|NotificationLog withStatus(string $status)
 * @mixin \Eloquent
 */
	class NotificationLog extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Class NotificationTemplate.
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $subject
 * @property string|null $body_html
 * @property string|null $body_text
 * @property array<int, string> $channels
 * @property array<string, mixed> $variables
 * @property array<string, mixed>|null $conditions
 * @property array<string, mixed>|null $preview_data
 * @property array<string, mixed>|null $metadata
 * @property string|null $category
 * @property bool $is_active
 * @property int $version
 * @property int|null $tenant_id
 * @property array<string, mixed>|null $grapesjs_data
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read string $channels_label
 * @property NotificationTypeEnum $type
 * @property-read ProfileContract|null $creator
 * @property-read int|null $logs_count
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read array<string, array<string, mixed>> $translations
 * @property-read ProfileContract|null $updater
 * @property-read int|null $versions_count
 * @method static Builder<static>|NotificationTemplate active()
 * @method static NotificationTemplateFactory factory($count = null, $state = [])
 * @method static Builder<static>|NotificationTemplate forCategory(string $category)
 * @method static Builder<static>|NotificationTemplate forChannel(string $channel)
 * @method static Builder<static>|NotificationTemplate newModelQuery()
 * @method static Builder<static>|NotificationTemplate newQuery()
 * @method static Builder<static>|NotificationTemplate query()
 * @method static Builder<static>|NotificationTemplate whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|NotificationTemplate whereJsonContainsLocales(string $column, array<int, string> $locales, ?mixed $value, string $operand = '=')
 * @method static Builder<static>|NotificationTemplate whereLocale(string $column, string $locale)
 * @method static Builder<static>|NotificationTemplate whereLocales(string $column, array<int, string> $locales)
 * @property-read ProfileContract|null $deleter
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @method static Builder<static>|NotificationTemplate whereBodyHtml($value)
 * @method static Builder<static>|NotificationTemplate whereBodyText($value)
 * @method static Builder<static>|NotificationTemplate whereCategory($value)
 * @method static Builder<static>|NotificationTemplate whereChannels($value)
 * @method static Builder<static>|NotificationTemplate whereCode($value)
 * @method static Builder<static>|NotificationTemplate whereConditions($value)
 * @method static Builder<static>|NotificationTemplate whereCreatedAt($value)
 * @method static Builder<static>|NotificationTemplate whereCreatedBy($value)
 * @method static Builder<static>|NotificationTemplate whereDeletedAt($value)
 * @method static Builder<static>|NotificationTemplate whereDeletedBy($value)
 * @method static Builder<static>|NotificationTemplate whereDescription($value)
 * @method static Builder<static>|NotificationTemplate whereGrapesjsData($value)
 * @method static Builder<static>|NotificationTemplate whereId($value)
 * @method static Builder<static>|NotificationTemplate whereIsActive($value)
 * @method static Builder<static>|NotificationTemplate whereMetadata($value)
 * @method static Builder<static>|NotificationTemplate whereName($value)
 * @method static Builder<static>|NotificationTemplate wherePreviewData($value)
 * @method static Builder<static>|NotificationTemplate whereSubject($value)
 * @method static Builder<static>|NotificationTemplate whereTenantId($value)
 * @method static Builder<static>|NotificationTemplate whereType($value)
 * @method static Builder<static>|NotificationTemplate whereUpdatedAt($value)
 * @method static Builder<static>|NotificationTemplate whereUpdatedBy($value)
 * @method static Builder<static>|NotificationTemplate whereVariables($value)
 * @method static Builder<static>|NotificationTemplate whereVersion($value)
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @method static Builder<static>|NotificationTemplate whereBodyHtml($value)
 * @method static Builder<static>|NotificationTemplate whereBodyText($value)
 * @method static Builder<static>|NotificationTemplate whereCategory($value)
 * @method static Builder<static>|NotificationTemplate whereChannels($value)
 * @method static Builder<static>|NotificationTemplate whereCode($value)
 * @method static Builder<static>|NotificationTemplate whereConditions($value)
 * @method static Builder<static>|NotificationTemplate whereCreatedAt($value)
 * @method static Builder<static>|NotificationTemplate whereCreatedBy($value)
 * @method static Builder<static>|NotificationTemplate whereDeletedAt($value)
 * @method static Builder<static>|NotificationTemplate whereDeletedBy($value)
 * @method static Builder<static>|NotificationTemplate whereDescription($value)
 * @method static Builder<static>|NotificationTemplate whereGrapesjsData($value)
 * @method static Builder<static>|NotificationTemplate whereId($value)
 * @method static Builder<static>|NotificationTemplate whereIsActive($value)
 * @method static Builder<static>|NotificationTemplate whereMetadata($value)
 * @method static Builder<static>|NotificationTemplate whereName($value)
 * @method static Builder<static>|NotificationTemplate wherePreviewData($value)
 * @method static Builder<static>|NotificationTemplate whereSubject($value)
 * @method static Builder<static>|NotificationTemplate whereTenantId($value)
 * @method static Builder<static>|NotificationTemplate whereType($value)
 * @method static Builder<static>|NotificationTemplate whereUpdatedAt($value)
 * @method static Builder<static>|NotificationTemplate whereUpdatedBy($value)
 * @method static Builder<static>|NotificationTemplate whereVariables($value)
 * @method static Builder<static>|NotificationTemplate whereVersion($value)
 * @mixin \Eloquent
 * @property-read array $translatable_columns_from
 */
	class NotificationTemplate extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @property int $id
 * @property int $template_id
 * @property string|null $subject
 * @property string|null $body_html
 * @property string|null $body_text
 * @property array<int, string>|null $channels
 * @property array<string, mixed>|null $variables
 * @property array<string, mixed>|null $conditions
 * @property int $version
 * @property string|null $created_by
 * @property string|null $change_notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read NotificationTemplate|null $template
 * @property-read Profile|null $updater
 * @method static NotificationTemplateVersionFactory factory($count = null, $state = [])
 * @method static Builder<static>|NotificationTemplateVersion newModelQuery()
 * @method static Builder<static>|NotificationTemplateVersion newQuery()
 * @method static Builder<static>|NotificationTemplateVersion query()
 * @property-read ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class NotificationTemplateVersion extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * @method static Builder<static>|NotificationType newModelQuery()
 * @method static Builder<static>|NotificationType newQuery()
 * @method static Builder<static>|NotificationType query()
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $category
 * @property bool $is_active
 * @property array<string, array<string, mixed>>|null $channels
 * @property array<string, mixed>|null $settings
 * @property array<string, mixed>|null $metrics
 * @property array<string, mixed>|null $scheduling
 * @property array<string, mixed>|null $rules
 * @property array<string, mixed>|null $permissions
 * @property string|null $display_name
 * @property array<string, mixed>|null $templates
 * @property array<string, mixed>|null $integrations
 * @property array<string, mixed>|null $delivery_rules
 * @property string|null $template
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|NotificationType whereCreatedAt($value)
 * @method static Builder<static>|NotificationType whereCreatedBy($value)
 * @method static Builder<static>|NotificationType whereDescription($value)
 * @method static Builder<static>|NotificationType whereId($value)
 * @method static Builder<static>|NotificationType whereName($value)
 * @method static Builder<static>|NotificationType whereTemplate($value)
 * @method static Builder<static>|NotificationType whereUpdatedAt($value)
 * @method static Builder<static>|NotificationType whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class NotificationType extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Modules\Notify\Models\NotifyTheme.
 *
 * @property int $id
 * @property string|null $lang
 * @property string|null $type
 * @property string|null $subject
 * @property string|null $body
 * @property string|null $from
 * @property Carbon|null $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $post_type
 * @property int|null $post_id
 * @property string|null $body_html
 * @property string|null $theme
 * @property string|null $from_email
 * @property string|null $logo_src
 * @property int|null $logo_width
 * @property int|null $logo_height
 * @property array<string, mixed> $view_params
 * @property array<string, mixed> $logo
 * @property Model|Eloquent $linkable
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @method static NotifyThemeFactory factory($count = null, $state = [])
 * @method static Builder|NotifyTheme newModelQuery()
 * @method static Builder|NotifyTheme newQuery()
 * @method static Builder|NotifyTheme query()
 * @method static Builder|NotifyTheme whereBody($value)
 * @method static Builder|NotifyTheme whereBodyHtml($value)
 * @method static Builder|NotifyTheme whereCreatedAt($value)
 * @method static Builder|NotifyTheme whereCreatedBy($value)
 * @method static Builder|NotifyTheme whereFrom($value)
 * @method static Builder|NotifyTheme whereFromEmail($value)
 * @method static Builder|NotifyTheme whereId($value)
 * @method static Builder|NotifyTheme whereLang($value)
 * @method static Builder|NotifyTheme whereLogoHeight($value)
 * @method static Builder|NotifyTheme whereLogoSrc($value)
 * @method static Builder|NotifyTheme whereLogoWidth($value)
 * @method static Builder|NotifyTheme wherePostId($value)
 * @method static Builder|NotifyTheme wherePostType($value)
 * @method static Builder|NotifyTheme whereSubject($value)
 * @method static Builder|NotifyTheme whereTheme($value)
 * @method static Builder|NotifyTheme whereType($value)
 * @method static Builder|NotifyTheme whereUpdatedAt($value)
 * @method static Builder|NotifyTheme whereUpdatedBy($value)
 * @method static Builder|NotifyTheme whereViewParams($value)
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|NotifyTheme whereDeletedAt($value)
 * @method static Builder<static>|NotifyTheme whereDeletedBy($value)
 * @property-read ProfileContract|null $deleter
 */
	class NotifyTheme extends \Eloquent {}
}

namespace Modules\Notify\Models{
/**
 * Modules\Notify\Models\NotifyThemeable.
 *
 * @property int $id
 * @property string|null $model_type
 * @property int|null $model_id
 * @property Carbon|null $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property int|null $notify_theme_id
 * @method static Builder|NotifyThemeable newModelQuery()
 * @method static Builder|NotifyThemeable newQuery()
 * @method static Builder|NotifyThemeable query()
 * @method static Builder|NotifyThemeable whereCreatedAt($value)
 * @method static Builder|NotifyThemeable whereCreatedBy($value)
 * @method static Builder|NotifyThemeable whereId($value)
 * @method static Builder|NotifyThemeable whereModelId($value)
 * @method static Builder|NotifyThemeable whereModelType($value)
 * @method static Builder|NotifyThemeable whereNotifyThemeId($value)
 * @method static Builder|NotifyThemeable whereUpdatedAt($value)
 * @method static Builder|NotifyThemeable whereUpdatedBy($value)
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|NotifyThemeable whereDeletedAt($value)
 * @method static Builder<static>|NotifyThemeable whereDeletedBy($value)
 * @property-read ProfileContract|null $deleter
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
 * @property int $id
 * @property int $client_id
 * @property string $date
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Client $client
 * @property-read Collection<int, Machine> $machines
 * @property-read int|null $machines_count
 * @method static Builder<static>|Appointment newModelQuery()
 * @method static Builder<static>|Appointment newQuery()
 * @method static Builder<static>|Appointment query()
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
 * @property int $id
 * @property string $name
 * @property string|null $vat_number
 * @property string|null $client_office
 * @property string|null $fiscal_code
 * @property string|null $address
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $province
 * @property string|null $country
 * @property string|null $phone
 * @property string|null $email
 * @property bool $business_closed
 * @property string|null $company_name
 * @property string|null $competent_health_unit
 * @property string|null $tax_code
 * @property string|null $fax
 * @property string|null $mobile
 * @property string|null $pec
 * @property string|null $whatsapp
 * @property float|null $latitude
 * @property float|null $longitude
 * @property int|null $assigned_worker_id
 * @property string|null $notes
 * @property string|null $administrative_reference
 * @property string|null $route
 * @property string|null $street_number
 * @property string|null $locality
 * @property string|null $sublocality
 * @property string|null $sublocality_level_1
 * @property string|null $sublocality_level_2
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $full_address
 * @property-read string $contacts_html
 * @property-read Collection<int, Appointment> $appointments
 * @property-read int|null $appointments_count
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Collection<int, LegalOffice> $legalOffices
 * @property-read int|null $legal_offices_count
 * @property-read Collection<int, LegalRepresentative> $legalRepresentatives
 * @property-read int|null $legal_representatives_count
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|Client newModelQuery()
 * @method static Builder<static>|Client newQuery()
 * @method static Builder<static>|Client query()
 * @method static Builder<static>|Client whereAddress(string $value)
 * @method static Builder<static>|Client whereAdministrativeReference(string $value)
 * @method static Builder<static>|Client whereAssignedWorkerId(int $value)
 * @method static Builder<static>|Client whereBusinessClosed(bool $value)
 * @method static Builder<static>|Client whereCity(string $value)
 * @method static Builder<static>|Client whereCompanyName(string $value)
 * @method static Builder<static>|Client whereCompetentHealthUnit(string $value)
 * @method static Builder<static>|Client whereCountry(string $value)
 * @method static Builder<static>|Client whereCreatedAt(Carbon $value)
 * @method static Builder<static>|Client whereEmail(string $value)
 * @method static Builder<static>|Client whereFax(string $value)
 * @method static Builder<static>|Client whereFiscalCode(string $value)
 * @method static Builder<static>|Client whereId(int $value)
 * @method static Builder<static>|Client whereLatitude(float $value)
 * @method static Builder<static>|Client whereLocality(string $value)
 * @method static Builder<static>|Client whereLongitude(float $value)
 * @method static Builder<static>|Client whereMobile(string $value)
 * @method static Builder<static>|Client whereName(string $value)
 * @method static Builder<static>|Client whereNotes(string $value)
 * @method static Builder<static>|Client wherePec(string $value)
 * @method static Builder<static>|Client wherePhone(string $value)
 * @method static Builder<static>|Client wherePostalCode(string $value)
 * @method static Builder<static>|Client whereProvince(string $value)
 * @method static Builder<static>|Client whereRoute(string $value)
 * @method static Builder<static>|Client whereStreetNumber(string $value)
 * @method static Builder<static>|Client whereSublocality(string $value)
 * @method static Builder<static>|Client whereSublocalityLevel1(string $value)
 * @method static Builder<static>|Client whereSublocalityLevel2(string $value)
 * @method static Builder<static>|Client whereTaxCode(string $value)
 * @method static Builder<static>|Client whereUpdatedAt(Carbon $value)
 * @method static Builder<static>|Client whereUpdatedBy(string $value)
 * @method static Builder<static>|Client whereVatNumber(string $value)
 * @method static Builder<static>|Client whereWhatsapp(string $value)
 * @method static Builder<static>|Client withDistance(float $latitude, float $longitude, float $radiusKm = 10)
 * @property string|null $company_office
 * @property string|null $activity
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $administrative_area_level_1
 * @property string|null $administrative_area_level_2
 * @property string|null $administrative_area_level_3
 * @property string|null $formatted_address Full formatted address
 * @property string|null $place_id Geocoding provider Place ID
 * @property string|null $region DEPRECATED: Use administrative_area_level_1 instead - legacy compatibility
 * @property-read Collection<int, Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read Profile|null $deleter
 * @property-read string|null $full_addresses
 * @property-read Collection<int, MedicalDirector> $medicalDirectors
 * @property-read int|null $medical_directors_count
 * @property-read Collection<int, PhoneCall> $phoneCalls
 * @property-read int|null $phone_calls_count
 * @method static Builder<static>|Client inCity(string $city)
 * @method static Builder<static>|Client inPostalCode(string $postalCode)
 * @method static Builder<static>|Client inProvince(string $province)
 * @method static Builder<static>|Client inRegion(string $region)
 * @method static Builder<static>|Client orderByDistance(float $latitude, float $longitude)
 * @method static Builder<static>|Client whereActivity($value)
 * @method static Builder<static>|Client whereAdministrativeAreaLevel1($value)
 * @method static Builder<static>|Client whereAdministrativeAreaLevel2($value)
 * @method static Builder<static>|Client whereAdministrativeAreaLevel3($value)
 * @method static Builder<static>|Client whereCompanyOffice($value)
 * @method static Builder<static>|Client whereCreatedBy($value)
 * @method static Builder<static>|Client whereDeletedAt($value)
 * @method static Builder<static>|Client whereDeletedBy($value)
 * @method static Builder<static>|Client whereFormattedAddress($value)
 * @method static Builder<static>|Client wherePlaceId($value)
 * @method static Builder<static>|Client whereRegion($value)
 * @method static Builder<static>|Client whereNull($columns, $boolean = 'and', $not = false)
 * @method static Builder<static>|Client whereNotNull($columns, $boolean = 'and')
 * @method static Builder<static>|Client orWhereNull($columns, $boolean = 'and')
 * @method static Builder<static>|Client where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Collection<int, static> get($columns = ['*'])
 * @method static int update(array<string, mixed> $values)
 * @method static void chunk(int $count, callable $callback)
 * @mixin \Eloquent
 */
	class Client extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class Device.
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $device_type
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $headset_serial
 * @property string|null $tube_serial
 * @property string|null $power_kv
 * @property string|null $current_ma
 * @property Carbon|null $first_verification_date
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Client $client
 * @property Collection|DeviceVerification[] $verifications
 * @property int|null $appointment_id
 * @property string|null $name
 * @property string|null $status
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $kv
 * @property string|null $ma
 * @property string|null $serial_number
 * @property string|null $inventory_number
 * @property string|null $purchase_date
 * @property string|null $warranty_expiration
 * @property-read Profile|null $creator
 * @property-read DeviceVerification|null $latest_verification
 * @property-read bool $needs_verification
 * @property-read Profile|null $updater
 * @property-read int|null $verifications_count
 * @method static Builder<static>|Device newModelQuery()
 * @method static Builder<static>|Device newQuery()
 * @method static Builder<static>|Device query()
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
 * @property-read Profile|null $deleter
 * @mixin \Eloquent
 */
	class Device extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class DeviceVerification.
 *
 * @property int $id
 * @property int $device_id
 * @property string|null $verification_date
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|DeviceVerification newModelQuery()
 * @method static Builder<static>|DeviceVerification newQuery()
 * @method static Builder<static>|DeviceVerification query()
 * @method static Builder<static>|DeviceVerification whereCreatedAt($value)
 * @method static Builder<static>|DeviceVerification whereCreatedBy($value)
 * @method static Builder<static>|DeviceVerification whereDeletedAt($value)
 * @method static Builder<static>|DeviceVerification whereDeletedBy($value)
 * @method static Builder<static>|DeviceVerification whereDeviceId($value)
 * @method static Builder<static>|DeviceVerification whereId($value)
 * @method static Builder<static>|DeviceVerification whereStatus($value)
 * @method static Builder<static>|DeviceVerification whereUpdatedAt($value)
 * @method static Builder<static>|DeviceVerification whereUpdatedBy($value)
 * @method static Builder<static>|DeviceVerification whereVerificationDate($value)
 * @property-read Profile|null $deleter
 * @mixin \Eloquent
 */
	class DeviceVerification extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @property int $id
 * @property string|null $treatment_id
 * @property string|null $consent_id
 * @property string $subject_id
 * @property string $ip
 * @property string $action
 * @property string $payload
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static EventFactory factory($count = null, $state = [])
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event query()
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

namespace Modules\TechPlanner\Models{
/**
 * Class LegalOffice.
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property int $client_id
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $province
 * @property string|null $country
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|LegalOffice newModelQuery()
 * @method static Builder<static>|LegalOffice newQuery()
 * @method static Builder<static>|LegalOffice query()
 * @method static Builder<static>|LegalOffice whereAddress($value)
 * @method static Builder<static>|LegalOffice whereCity($value)
 * @method static Builder<static>|LegalOffice whereClientId($value)
 * @method static Builder<static>|LegalOffice whereCountry($value)
 * @method static Builder<static>|LegalOffice whereCreatedAt($value)
 * @method static Builder<static>|LegalOffice whereCreatedBy($value)
 * @method static Builder<static>|LegalOffice whereDeletedAt($value)
 * @method static Builder<static>|LegalOffice whereDeletedBy($value)
 * @method static Builder<static>|LegalOffice whereEmail($value)
 * @method static Builder<static>|LegalOffice whereId($value)
 * @method static Builder<static>|LegalOffice wherePhone($value)
 * @method static Builder<static>|LegalOffice wherePostalCode($value)
 * @method static Builder<static>|LegalOffice whereProvince($value)
 * @method static Builder<static>|LegalOffice whereUpdatedAt($value)
 * @method static Builder<static>|LegalOffice whereUpdatedBy($value)
 * @property-read Profile|null $deleter
 * @mixin \Eloquent
 */
	class LegalOffice extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class LegalRepresentative.
 *
 * @property int $id
 * @property string $name
 * @property string|null $identification_number
 * @property string|null $phone
 * @property string|null $email
 * @property int $client_id
 * @property string|null $fiscal_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Client $client
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|LegalRepresentative newModelQuery()
 * @method static Builder<static>|LegalRepresentative newQuery()
 * @method static Builder<static>|LegalRepresentative query()
 * @method static Builder<static>|LegalRepresentative whereClientId($value)
 * @method static Builder<static>|LegalRepresentative whereCreatedAt($value)
 * @method static Builder<static>|LegalRepresentative whereCreatedBy($value)
 * @method static Builder<static>|LegalRepresentative whereDeletedAt($value)
 * @method static Builder<static>|LegalRepresentative whereDeletedBy($value)
 * @method static Builder<static>|LegalRepresentative whereEmail($value)
 * @method static Builder<static>|LegalRepresentative whereFiscalCode($value)
 * @method static Builder<static>|LegalRepresentative whereId($value)
 * @method static Builder<static>|LegalRepresentative whereName($value)
 * @method static Builder<static>|LegalRepresentative wherePhone($value)
 * @method static Builder<static>|LegalRepresentative whereUpdatedAt($value)
 * @method static Builder<static>|LegalRepresentative whereUpdatedBy($value)
 * @property-read Profile|null $deleter
 * @mixin \Eloquent
 */
	class LegalRepresentative extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static LocationFactory factory($count = null, $state = [])
 * @method static Builder<static>|Location newModelQuery()
 * @method static Builder<static>|Location newQuery()
 * @method static Builder<static>|Location query()
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
 * @property int $id
 * @property int|null $appointment_id
 * @property string|null $name
 * @property string|null $status
 * @property string|null $notes
 * @property int|null $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $type
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $headset_serial
 * @property string|null $tube_serial
 * @property string|null $kv
 * @property string|null $ma
 * @property string|null $serial_number
 * @property string|null $inventory_number
 * @property string|null $purchase_date
 * @property Carbon|null $first_verification_date
 * @property string|null $warranty_expiration
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
 * @property-read Profile|null $deleter
 * @mixin \Eloquent
 */
	class Machine extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Class MedicalDirector.
 *
 * @property int $id
 * @property string $name
 * @property string|null $license_number
 * @property string|null $specialization
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $client_id
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $residence
 * @property string|null $address
 * @property string|null $street_number
 * @property string|null $province
 * @property string|null $birth_place
 * @property string|null $birth_date
 * @property string|null $start_date
 * @property string|null $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|MedicalDirector newModelQuery()
 * @method static Builder<static>|MedicalDirector newQuery()
 * @method static Builder<static>|MedicalDirector query()
 * @method static Builder<static>|MedicalDirector whereAddress($value)
 * @method static Builder<static>|MedicalDirector whereBirthDate($value)
 * @method static Builder<static>|MedicalDirector whereBirthPlace($value)
 * @method static Builder<static>|MedicalDirector whereClientId($value)
 * @method static Builder<static>|MedicalDirector whereCreatedAt($value)
 * @method static Builder<static>|MedicalDirector whereCreatedBy($value)
 * @method static Builder<static>|MedicalDirector whereDeletedAt($value)
 * @method static Builder<static>|MedicalDirector whereDeletedBy($value)
 * @method static Builder<static>|MedicalDirector whereEmail($value)
 * @method static Builder<static>|MedicalDirector whereEndDate($value)
 * @method static Builder<static>|MedicalDirector whereFirstName($value)
 * @method static Builder<static>|MedicalDirector whereId($value)
 * @method static Builder<static>|MedicalDirector whereLastName($value)
 * @method static Builder<static>|MedicalDirector whereLicenseNumber($value)
 * @method static Builder<static>|MedicalDirector whereName($value)
 * @method static Builder<static>|MedicalDirector wherePhone($value)
 * @method static Builder<static>|MedicalDirector whereProvince($value)
 * @method static Builder<static>|MedicalDirector whereResidence($value)
 * @method static Builder<static>|MedicalDirector whereSpecialization($value)
 * @method static Builder<static>|MedicalDirector whereStartDate($value)
 * @method static Builder<static>|MedicalDirector whereStreetNumber($value)
 * @method static Builder<static>|MedicalDirector whereUpdatedAt($value)
 * @method static Builder<static>|MedicalDirector whereUpdatedBy($value)
 * @method static Builder<static>|MedicalDirector selectRaw(string $expression)
 * @method static Builder<static>|MedicalDirector distinct()
 * @method static mixed pluck($column, $key = null)
 * @method static array<string, mixed> toArray()
 * @property-read Profile|null $deleter
 * @mixin \Eloquent
 */
	class MedicalDirector extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @method static ParticipantFactory factory($count = null, $state = [])
 * @method static Builder<static>|Participant newModelQuery()
 * @method static Builder<static>|Participant newQuery()
 * @method static Builder<static>|Participant query()
 * @mixin \Eloquent
 */
	class Participant extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @property int $id
 * @property int $client_id
 * @property Carbon $date
 * @property int|null $duration
 * @property string|null $notes
 * @property string $call_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @method static Builder<static>|PhoneCall newModelQuery()
 * @method static Builder<static>|PhoneCall newQuery()
 * @method static Builder<static>|PhoneCall query()
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
 * @property-read Profile|null $deleter
 * @mixin \Eloquent
 */
	class PhoneCall extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * @property int $id
 * @property string $uuid
 * @property string|null $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $fiscal_code
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property string $credits
 * @property string|null $slug
 * @property SchemalessAttributes|null $extra
 * @property-read string $avatar
 * @property-read Profile|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $full_name
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
 * @method static ProfileFactory factory($count = null, $state = [])
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Profile whereCreatedAt($value)
 * @method static Builder<static>|Profile whereCreatedBy($value)
 * @method static Builder<static>|Profile whereCredits($value)
 * @method static Builder<static>|Profile whereDeletedAt($value)
 * @method static Builder<static>|Profile whereDeletedBy($value)
 * @method static Builder<static>|Profile whereEmail($value)
 * @method static Builder<static>|Profile whereExtra($value)
 * @method static Builder<static>|Profile whereFirstName($value)
 * @method static Builder<static>|Profile whereFiscalCode($value)
 * @method static Builder<static>|Profile whereId($value)
 * @method static Builder<static>|Profile whereLastName($value)
 * @method static Builder<static>|Profile whereNotes($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile whereSlug($value)
 * @method static Builder<static>|Profile whereUpdatedAt($value)
 * @method static Builder<static>|Profile whereUpdatedBy($value)
 * @method static Builder<static>|Profile whereUserId($value)
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, $guard = null)
 * @property string|null $bio
 * @property-read Profile|null $deleter
 * @method static Builder<static>|Profile whereBio($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile byUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile childrenWith(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile childrenWithCount(array $relations)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile withoutTeam($teams)
 */
	class Profile extends \Eloquent {}
}

namespace Modules\TechPlanner\Models{
/**
 * Modules\TechPlanner\Models\Worker.
 *
 * @property mixed $address
 * @property string $full_address
 * @property float|null $latitude
 * @property float|null $longitude
 * @property int $id
 * @property string|null $type
 * @property int|null $client_id
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $birth_place
 * @property string|null $birth_day
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string $full_name
 * @property string|null $p_iva
 * @property string|null $cod_fisc
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read Profile|null $creator
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read Profile|null $updater
 * @method static Builder<static>|Worker newModelQuery()
 * @method static Builder<static>|Worker newQuery()
 * @method static Builder<static>|Worker ofInPolygon(string $polygon_field, float $lat, float $lng)
 * @method static Builder<static>|Worker ofJobRoleId(int $id)
 * @method static Builder<static>|Worker query()
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
 * @method static Builder<static>|Worker withDistance(float $lat, float $lng)
 * @method static Builder<static>|Worker withDistanceCustomField(string $lat_field, string $lng_field, float $lat, float $lng)
 * @property string|null $googleplace_url
 * @property string|null $googleplace_url_short
 * @property string|null $campground
 * @property string|null $campground_short
 * @property-read Profile|null $deleter
 * @method static Builder<static>|Worker whereCampground($value)
 * @method static Builder<static>|Worker whereCampgroundShort($value)
 * @method static Builder<static>|Worker whereGoogleplaceUrl($value)
 * @method static Builder<static>|Worker whereGoogleplaceUrlShort($value)
 * @mixin \Eloquent
 */
	class Worker extends \Eloquent implements \Modules\TechPlanner\Contracts\WorkerContract {}
}

namespace Modules\Tenant\Models{
/**
 * @property string|null $host
 * @property int|null $port
 * @property string|null $database
 * @property string|null $username
 * @property string|null $password
 * @property string|null $charset
 * @property string|null $collation
 * @property string|null $prefix
 * @property bool|null $prefix_indexes
 * @property bool|null $strict
 * @property array<string, mixed>|null $options
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
 * @method static \Modules\Tenant\Database\Factories\DatabaseConfigFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseConfig query()
 * @mixin \Eloquent
 */
	class DatabaseConfig extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property int|null $id
 * @property string|null $name
 * @method static Builder|Domain newModelQuery()
 * @method static Builder|Domain newQuery()
 * @method static Builder|Domain query()
 * @method static Builder|Domain whereId($value)
 * @method static Builder|Domain whereName($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static DomainFactory factory($count = null, $state = [])
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Domain extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * Modello Tenant per la gestione multi-tenant dell'applicazione.
 *
 * @property string $name
 * @property string $domain
 * @property string $database
 * @property string $slug
 * @property array<string, mixed>|null $settings
 * @property bool $is_active
 * @property string|null $logo
 * @property \Carbon\Carbon|null $last_activity_at
 * @property-read string $url
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static TenantFactory factory($count = null, $state = [])
 * @method static Builder<static>|Tenant newModelQuery()
 * @method static Builder<static>|Tenant newQuery()
 * @method static Builder<static>|Tenant query()
 * @method static Tenant|null first()
 * @method static Collection<int, Tenant> get()
 * @method static Tenant create(array<string, mixed> $attributes = [])
 * @method static Tenant firstOrCreate(array<string, mixed> $attributes = [], array<string, mixed> $values = [])
 * @method static Builder<static>|Tenant where((string|Closure) $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static Builder<static>|Tenant whereNotNull((string|Expression) $columns)
 * @method static int count(string $columns = '*')
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static Builder<static>|Tenant whereCreatedAt($value)
 * @method static Builder<static>|Tenant whereDatabase($value)
 * @method static Builder<static>|Tenant whereDeletedAt($value)
 * @method static Builder<static>|Tenant whereDomain($value)
 * @method static Builder<static>|Tenant whereId($value)
 * @method static Builder<static>|Tenant whereIsActive($value)
 * @method static Builder<static>|Tenant whereName($value)
 * @method static Builder<static>|Tenant whereSlug($value)
 * @method static Builder<static>|Tenant whereUpdatedAt($value)
 * @method static Builder<static>|Tenant whereSettings($value)
 * @mixin \Eloquent
 */
	class Tenant extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property int|null $id
 * @property string|int|null $tenant_id
 * @property string|null $name
 * @property string|null $domain
 * @property bool|null $is_primary
 * @property string|null $status
 * @property string|null $verification_token
 * @property Carbon|null $verified_at
 * @method static Builder|TenantDomain newModelQuery()
 * @method static Builder|TenantDomain newQuery()
 * @method static Builder|TenantDomain query()
 * @method static Builder|TenantDomain whereId($value)
 * @method static Builder|TenantDomain whereName($value)
 * @method static Builder|TenantDomain whereDomain($value)
 * @method static Builder|TenantDomain whereIsPrimary($value)
 * @method static Builder|TenantDomain whereStatus($value)
 * @method static Builder|TenantDomain whereVerificationToken($value)
 * @method static Builder|TenantDomain whereVerifiedAt($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static TenantDomainFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class TenantDomain extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property int|null $id
 * @property string|null $tenant_id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $type
 * @method static Builder|TenantSetting newModelQuery()
 * @method static Builder|TenantSetting newQuery()
 * @method static Builder|TenantSetting query()
 * @method static Builder|TenantSetting whereId($value)
 * @method static Builder|TenantSetting whereTenantId($value)
 * @method static Builder|TenantSetting whereKey($value)
 * @method static Builder|TenantSetting whereValue($value)
 * @method static Builder|TenantSetting whereType($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static TenantSettingFactory factory($count = null, $state = [])
 * @property-read Tenant|null $tenant
 * @mixin \Eloquent
 */
	class TenantSetting extends \Eloquent {}
}

namespace Modules\Tenant\Models{
/**
 * @property int|null $id
 * @property string|null $tenant_id
 * @property string|null $plan_name
 * @property string|null $status
 * @property int|null $max_users
 * @property int|null $current_users
 * @property float|null $max_storage_gb
 * @property float|null $current_storage_gb
 * @property string|null $billing_cycle
 * @property float|null $billing_amount
 * @property Carbon|null $next_billing_date
 * @property Carbon|null $expires_at
 * @method static Builder|TenantSubscription newModelQuery()
 * @method static Builder|TenantSubscription newQuery()
 * @method static Builder|TenantSubscription query()
 * @method static Builder|TenantSubscription whereId($value)
 * @method static Builder|TenantSubscription whereTenantId($value)
 * @method static Builder|TenantSubscription wherePlanName($value)
 * @method static Builder|TenantSubscription whereStatus($value)
 * @method static Builder|TenantSubscription whereMaxUsers($value)
 * @method static Builder|TenantSubscription whereCurrentUsers($value)
 * @method static Builder|TenantSubscription whereMaxStorageGb($value)
 * @method static Builder|TenantSubscription whereCurrentStorageGb($value)
 * @method static Builder|TenantSubscription whereBillingCycle($value)
 * @method static Builder|TenantSubscription whereBillingAmount($value)
 * @method static Builder|TenantSubscription whereNextBillingDate($value)
 * @method static Builder|TenantSubscription whereExpiresAt($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static TenantSubscriptionFactory factory($count = null, $state = [])
 * @property-read Tenant|null $tenant
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
 * @property-read Profile|null $creator
 * @property-read Profile|null $deleter
 * @property-read Profile|null $updater
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
 * @property string $id
 * @property string|null $name
 * @property string $title
 * @property string $slug
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $description
 * @property string|null $icon
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property int $is_active
 * @property int $sort_order
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static CategoryFactory factory                  ($count = null, $state = [])
 * @method static Builder<static>|Category newModelQuery   ()
 * @method static Builder<static>|Category newQuery        ()
 * @method static Builder<static>|Category query           ()
 * @method static Builder<static>|Category whereCreatedAt  ($value)
 * @method static Builder<static>|Category whereCreatedBy  ($value)
 * @method static Builder<static>|Category whereDeletedAt  ($value)
 * @method static Builder<static>|Category whereDeletedBy  ($value)
 * @method static Builder<static>|Category whereDescription($value)
 * @method static Builder<static>|Category whereIcon       ($value)
 * @method static Builder<static>|Category whereId         ($value)
 * @method static Builder<static>|Category whereIsActive   ($value)
 * @method static Builder<static>|Category whereParentId   ($value)
 * @method static Builder<static>|Category whereSlug       ($value)
 * @method static Builder<static>|Category whereSortOrder  ($value)
 * @method static Builder<static>|Category whereTitle      ($value)
 * @method static Builder<static>|Category whereUpdatedAt  ($value)
 * @method static Builder<static>|Category whereUpdatedBy  ($value)
 * @mixin \Eloquent
 * @method static \Modules\UI\Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 */
	class Category extends \Eloquent {}
}

namespace Modules\UI\Models{
/**
 * Collection model for UI module.
 *
 * FormBuilder module not available - extending from XotBaseModel instead.
 *
 * @property string|null $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $type
 * @property int|null $theme_id
 * @property int|null $is_active
 * @property int|null $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @property string|null $name
 * @property string|null $description
 * @property string|null $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static CollectionFactory factory($count = null, $state = [])
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
 * @property string|null $id
 * @property string|null $field_id
 * @property string|null $label
 * @property string|null $value
 * @property int|null $order
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static FieldOptionFactory factory($count = null, $state = [])
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
 * @property int $id
 * @property string $type Type of authentication (e.g., 'login', 'logout')
 * @property string|null $ip_address IP address used for authentication
 * @property string|null $user_agent User agent string from the request
 * @property string|null $location Geographic location derived from IP
 * @property bool $login_successful Whether the login attempt was successful
 * @property Carbon|null $login_at When the login attempt occurred
 * @property Carbon|null $logout_at When the logout occurred
 * @property string $authenticatable_type The class name of the authenticatable model
 * @property string $authenticatable_id The ID of the authenticatable model
 * @property Carbon|null $created_at When the record was created
 * @property Carbon|null $updated_at When the record was last updated
 * @method static Builder<static>|Authentication newModelQuery()
 * @method static Builder<static>|Authentication newQuery()
 * @method static Builder<static>|Authentication query()
 * @method static Builder<static>|Authentication whereCreatedAt($value)
 * @method static Builder<static>|Authentication whereId($value)
 * @method static Builder<static>|Authentication whereIpAddress($value)
 * @method static Builder<static>|Authentication whereLocation($value)
 * @method static Builder<static>|Authentication whereType($value)
 * @method static Builder<static>|Authentication whereUpdatedAt($value)
 * @method static Builder<static>|Authentication whereUserAgent($value)
 * @method static Builder<static>|Authentication whereLoginAt($value)
 * @method static Builder<static>|Authentication whereLogoutAt($value)
 * @method static Builder<static>|Authentication whereLoginSuccessful($value)
 * @method static Builder<static>|Authentication whereAuthenticatableType($value)
 * @method static Builder<static>|Authentication whereAuthenticatableId($value)
 * @property Model|\Eloquent $authenticatable
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static \Modules\User\Database\Factories\AuthenticationFactory factory($count = null, $state = [])
 * @method static Builder<static>|Authentication whereCreatedBy($value)
 * @method static Builder<static>|Authentication whereDeletedAt($value)
 * @method static Builder<static>|Authentication whereDeletedBy($value)
 * @method static Builder<static>|Authentication whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Authentication extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property int $id
 * @property string $authenticatable_type
 * @property int $authenticatable_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property Carbon|null $login_at
 * @property bool $login_successful
 * @property Carbon|null $logout_at
 * @property bool $cleared_by_user
 * @property array<string, mixed>|null $location
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Model|\Eloquent $authenticatable
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|AuthenticationLog newModelQuery()
 * @method static Builder|AuthenticationLog newQuery()
 * @method static Builder|AuthenticationLog query()
 * @method static Builder|AuthenticationLog whereAuthenticatableId($value)
 * @method static Builder|AuthenticationLog whereAuthenticatableType($value)
 * @method static Builder|AuthenticationLog whereClearedByUser($value)
 * @method static Builder|AuthenticationLog whereCreatedAt($value)
 * @method static Builder|AuthenticationLog whereCreatedBy($value)
 * @method static Builder|AuthenticationLog whereId($value)
 * @method static Builder|AuthenticationLog whereIpAddress($value)
 * @method static Builder|AuthenticationLog whereLocation($value)
 * @method static Builder|AuthenticationLog whereLoginAt($value)
 * @method static Builder|AuthenticationLog whereLoginSuccessful($value)
 * @method static Builder|AuthenticationLog whereLogoutAt($value)
 * @method static Builder|AuthenticationLog whereUpdatedAt($value)
 * @method static Builder|AuthenticationLog whereUpdatedBy($value)
 * @method static Builder|AuthenticationLog whereUserAgent($value)
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\AuthenticationLogFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class AuthenticationLog extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Device model representing a user's device in the system.
 *
 * @property EloquentCollection<int, Model&UserContract> $users
 * @property int|null $users_count
 * @method static Builder|Device newModelQuery()
 * @method static Builder|Device newQuery()
 * @method static Builder|Device query()
 * @method static Builder|Device whereBrowser($value)
 * @method static Builder|Device whereCreatedAt($value)
 * @method static Builder|Device whereCreatedBy($value)
 * @method static Builder|Device whereDevice($value)
 * @method static Builder|Device whereId($value)
 * @method static Builder|Device whereIsDesktop($value)
 * @method static Builder|Device whereIsMobile($value)
 * @method static Builder|Device whereIsPhone($value)
 * @method static Builder|Device whereIsRobot($value)
 * @method static Builder|Device whereIsTablet($value)
 * @method static Builder|Device whereLanguages($value)
 * @method static Builder|Device whereMobileId($value)
 * @method static Builder|Device wherePlatform($value)
 * @method static Builder|Device whereRobot($value)
 * @method static Builder|Device whereUpdatedAt($value)
 * @method static Builder|Device whereUpdatedBy($value)
 * @method static Builder|Device whereVersion($value)
 * @property DeviceUser $pivot
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string $id
 * @property string|null $mobile_id
 * @property array<int, string>|null $languages
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $uuid
 * @method static Builder<static>|Device whereUuid($value)
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\DeviceFactory factory($count = null, $state = [])
 * @property string|null $name
 * @property string|null $type
 * @method static Builder<static>|Device whereName($value)
 * @method static Builder<static>|Device whereType($value)
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
 * @property ProfileContract|null $creator
 * @property Device|null $device
 * @property ProfileContract|null $profile
 * @property ProfileContract|null $updater
 * @property User|null $user
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\DeviceProfileFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class DeviceProfile extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\DeviceUser.
 *
 * @property Device|null $device
 * @method static Builder|DeviceUser newModelQuery()
 * @method static Builder|DeviceUser newQuery()
 * @method static Builder|DeviceUser query()
 * @property string $id
 * @property string $device_id
 * @property string $user_id
 * @property Carbon|null $login_at
 * @property Carbon|null $logout_at
 * @property string|null $push_notifications_token
 * @property bool|null $push_notifications_enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|DeviceUser whereCreatedAt($value)
 * @method static Builder|DeviceUser whereCreatedBy($value)
 * @method static Builder|DeviceUser whereDeviceId($value)
 * @method static Builder|DeviceUser whereId($value)
 * @method static Builder|DeviceUser whereLoginAt($value)
 * @method static Builder|DeviceUser whereLogoutAt($value)
 * @method static Builder|DeviceUser wherePushNotificationsEnabled($value)
 * @method static Builder|DeviceUser wherePushNotificationsToken($value)
 * @method static Builder|DeviceUser whereUpdatedAt($value)
 * @method static Builder|DeviceUser whereUpdatedBy($value)
 * @method static Builder|DeviceUser whereUserId($value)
 * @property ProfileContract|null $profile
 * @property UserContract|null $user
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\DeviceUserFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class DeviceUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property SchemalessAttributes $extra_attributes
 * @method static Builder|Extra newModelQuery()
 * @method static Builder|Extra newQuery()
 * @method static Builder|Extra query()
 * @method static Builder|Extra withExtraAttributes()
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Extra whereCreatedAt($value)
 * @method static Builder|Extra whereCreatedBy($value)
 * @method static Builder|Extra whereDeletedAt($value)
 * @method static Builder|Extra whereDeletedBy($value)
 * @method static Builder|Extra whereExtraAttributes($value)
 * @method static Builder|Extra whereId($value)
 * @method static Builder|Extra whereModelId($value)
 * @method static Builder|Extra whereModelType($value)
 * @method static Builder|Extra whereUpdatedAt($value)
 * @method static Builder|Extra whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\ExtraFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	final class Extra extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|Feature newModelQuery()
 * @method static Builder|Feature newQuery()
 * @method static Builder|Feature query()
 * @property string $id
 * @property string $name
 * @property string $scope
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Feature whereCreatedAt($value)
 * @method static Builder|Feature whereCreatedBy($value)
 * @method static Builder|Feature whereDeletedAt($value)
 * @method static Builder|Feature whereDeletedBy($value)
 * @method static Builder|Feature whereId($value)
 * @method static Builder|Feature whereName($value)
 * @method static Builder|Feature whereScope($value)
 * @method static Builder|Feature whereUpdatedAt($value)
 * @method static Builder|Feature whereUpdatedBy($value)
 * @method static Builder|Feature whereValue($value)
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\FeatureFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Feature extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\Membership.
 *
 * @property string $role
 * @method static Builder|Membership newModelQuery()
 * @method static Builder|Membership newQuery()
 * @method static Builder|Membership query()
 * @property int $id
 * @property string|null $team_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $customer_id
 * @method static Builder|Membership whereCreatedAt($value)
 * @method static Builder|Membership whereCreatedBy($value)
 * @method static Builder|Membership whereCustomerId($value)
 * @method static Builder|Membership whereRole($value)
 * @method static Builder|Membership whereTeamId($value)
 * @method static Builder|Membership whereUpdatedAt($value)
 * @method static Builder|Membership whereUpdatedBy($value)
 * @method static Builder|Membership whereUserId($value)
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Membership whereDeletedAt($value)
 * @method static Builder|Membership whereDeletedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static Builder<static>|Membership whereId($value)
 * @property array<array-key, mixed>|null $permissions
 * @property string|null $joined_at
 * @method static Builder<static>|Membership whereJoinedAt($value)
 * @method static Builder<static>|Membership wherePermissions($value)
 * @property string $uuid
 * @method static Builder<static>|Membership whereUuid($value)
 * @mixin \Eloquent
 */
	class Membership extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\ModelHasPermission.
 *
 * @property int $id
 * @property int $permission_id
 * @property string $model_type
 * @property string $model_id
 * @method static Builder|ModelHasPermission newModelQuery()
 * @method static Builder|ModelHasPermission newQuery()
 * @method static Builder|ModelHasPermission query()
 * @method static Builder|ModelHasPermission whereId($value)
 * @method static Builder|ModelHasPermission whereModelId($value)
 * @method static Builder|ModelHasPermission whereModelType($value)
 * @method static Builder|ModelHasPermission wherePermissionId($value)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|ModelHasPermission whereCreatedAt($value)
 * @method static Builder|ModelHasPermission whereCreatedBy($value)
 * @method static Builder|ModelHasPermission whereUpdatedAt($value)
 * @method static Builder|ModelHasPermission whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null $team_id
 * @method static Builder|ModelHasPermission whereTeamId($value)
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\ModelHasPermissionFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class ModelHasPermission extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\ModelHasRole.
 *
 * @property string $id
 * @property string $role_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|ModelHasRole newModelQuery()
 * @method static Builder|ModelHasRole newQuery()
 * @method static Builder|ModelHasRole query()
 * @method static Builder|ModelHasRole whereCreatedAt($value)
 * @method static Builder|ModelHasRole whereCreatedBy($value)
 * @method static Builder|ModelHasRole whereId($value)
 * @method static Builder|ModelHasRole whereModelId($value)
 * @method static Builder|ModelHasRole whereModelType($value)
 * @method static Builder|ModelHasRole whereRoleId($value)
 * @method static Builder|ModelHasRole whereTeamId($value)
 * @method static Builder|ModelHasRole whereUpdatedAt($value)
 * @method static Builder|ModelHasRole whereUpdatedBy($value)
 * @property string $uuid (DC2Type:guid)
 * @method static Builder|ModelHasRole whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\ModelHasRoleFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class ModelHasRole extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\ModelHasRole.
 *
 * @property string $id
 * @property string $role_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|ModelHasRole newModelQuery()
 * @method static Builder|ModelHasRole newQuery()
 * @method static Builder|ModelHasRole query()
 * @method static Builder|ModelHasRole whereCreatedAt($value)
 * @method static Builder|ModelHasRole whereCreatedBy($value)
 * @method static Builder|ModelHasRole whereId($value)
 * @method static Builder|ModelHasRole whereModelId($value)
 * @method static Builder|ModelHasRole whereModelType($value)
 * @method static Builder|ModelHasRole whereRoleId($value)
 * @method static Builder|ModelHasRole whereTeamId($value)
 * @method static Builder|ModelHasRole whereUpdatedAt($value)
 * @method static Builder|ModelHasRole whereUpdatedBy($value)
 * @property string $uuid (DC2Type:guid)
 * @method static Builder|ModelHasRole whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\ModelRoleFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class ModelRole extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property Model|\Eloquent $notifiable
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static Builder|Notification newModelQuery()
 * @method static Builder|Notification newQuery()
 * @method static Builder|Notification query()
 * @method static Builder|Notification read()
 * @method static Builder|Notification unread()
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Notification extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\OauthAccessToken.
 *
 * @property string $id
 * @property string|null $user_id
 * @property string $client_id
 * @property string|null $name
 * @property list<string>|null $scopes
 * @property bool $revoked
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $expires_at
 * @property OauthClient|null $client
 * @property User|null $user
 * @method static Builder|OauthAccessToken newModelQuery()
 * @method static Builder|OauthAccessToken newQuery()
 * @method static Builder|OauthAccessToken query()
 * @method static Builder|OauthAccessToken whereClientId($value)
 * @method static Builder|OauthAccessToken whereCreatedAt($value)
 * @method static Builder|OauthAccessToken whereExpiresAt($value)
 * @method static Builder|OauthAccessToken whereId($value)
 * @method static Builder|OauthAccessToken whereName($value)
 * @method static Builder|OauthAccessToken whereRevoked($value)
 * @method static Builder|OauthAccessToken whereScopes($value)
 * @method static Builder|OauthAccessToken whereUpdatedAt($value)
 * @method static Builder|OauthAccessToken whereUserId($value)
 * @property OauthRefreshToken|null $refreshToken
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|OauthAccessToken whereCreatedBy($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedAt($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedBy($value)
 * @method static Builder<static>|OauthAccessToken whereUpdatedBy($value)
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken existsIn(array<int, string> $haystack)
 * @mixin \Eloquent
 */
	class OauthAccessToken extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property string $id
 * @property string $user_id (DC2Type:guid)
 * @property string $client_id
 * @property string|null $scopes
 * @property bool $revoked
 * @property Carbon|null $expires_at
 * @property OauthClient|null $client
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode query()
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
 * @property string|null $name
 * @property string|null $secret
 * @property string|null $provider
 * @property string|null $redirect
 * @property bool $personal_access_client
 * @property bool $password_client
 * @property bool $revoked
 * @property string|null $user_id
 * @property User|null $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $owner_type
 * @property string|null $owner_id
 * @property array<int, string> $redirect_uris
 * @property array<string, bool> $grant_types
 * @property Collection<int, OauthAuthCode> $authCodes
 * @property int|null $auth_codes_count
 * @property \Illuminate\Foundation\Auth\User|null $owner
 * @property string|null $plain_secret
 * @property Collection<int, OauthToken> $tokens
 * @property int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient existsIn(array<int, string> $haystack)
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient query()
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
 * @property string $id
 * @property string $client_id
 * @property OauthClient|null $client
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static \Modules\User\Database\Factories\OauthPersonalAccessClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereUpdatedBy($value)
 * @property-read Profile|null $creator
 * @property-read Profile|null $deleter
 * @property-read Profile|null $updater
 * @mixin \Eloquent
 */
	class OauthPersonalAccessClient extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property \DateTimeInterface|null $expires_at
 * @property OauthToken|null $accessToken
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken query()
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
 * @property string $id
 * @property string $client_id
 * @property string|null $name
 * @property array<array-key, mixed>|null $scopes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $expires_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property OauthClient|null $client
 * @property OauthRefreshToken|null $refreshToken
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken existsIn(array<int, string> $haystack)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthToken query()
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
 * @property-read User|null $user
 * @mixin \Eloquent
 */
	class OauthToken extends \Eloquent {}
}

namespace Modules\User\Models\Passport{
/**
 * Custom Passport Client model to fix compatibility issues with Laravel 12.
 *
 * @property Collection<int, OauthAuthCode> $authCodes
 * @property int|null $auth_codes_count
 * @property list<string> $grant_types
 * @property User $owner
 * @property string|null $plain_secret
 * @property list<string> $redirect_uris
 * @property string|null $secret
 * @property Collection<int, OauthToken> $tokens
 * @property int|null $tokens_count
 * @property \Modules\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client existsIn(array<int, string> $haystack)
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
 * @property int $id
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $user_id
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|PasswordReset newModelQuery()
 * @method static Builder|PasswordReset newQuery()
 * @method static Builder|PasswordReset query()
 * @method static Builder|PasswordReset whereCreatedAt($value)
 * @method static Builder|PasswordReset whereCreatedBy($value)
 * @method static Builder|PasswordReset whereEmail($value)
 * @method static Builder|PasswordReset whereId($value)
 * @method static Builder|PasswordReset whereToken($value)
 * @method static Builder|PasswordReset whereUpdatedAt($value)
 * @method static Builder|PasswordReset whereUpdatedBy($value)
 * @method static Builder|PasswordReset whereUserId($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null $uuid
 * @method static Builder<static>|PasswordReset whereUuid($value)
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\PasswordResetFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class PasswordReset extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Collection<int, Permission> $permissions
 * @property int|null $permissions_count
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property Collection<int, User> $users
 * @property int|null $users_count
 * @method static Builder<static>|Permission newModelQuery()
 * @method static Builder<static>|Permission newQuery()
 * @method static Builder<static>|Permission permission($permissions, $without = false)
 * @method static Builder<static>|Permission query()
 * @method static Builder<static>|Permission role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Permission whereCreatedAt($value)
 * @method static Builder<static>|Permission whereCreatedBy($value)
 * @method static Builder<static>|Permission whereGuardName($value)
 * @method static Builder<static>|Permission whereId($value)
 * @method static Builder<static>|Permission whereName($value)
 * @method static Builder<static>|Permission whereUpdatedAt($value)
 * @method static Builder<static>|Permission whereUpdatedBy($value)
 * @method static Builder<static>|Permission withoutPermission($permissions)
 * @method static Builder<static>|Permission withoutRole($roles, $guard = null)
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\PermissionFactory factory($count = null, $state = [])
 * @property Collection<int, Team> $teams
 * @property int|null $teams_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission withoutTeam($teams)
 * @mixin \Eloquent
 */
	class Permission extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|PermissionRole newModelQuery()
 * @method static Builder|PermissionRole newQuery()
 * @method static Builder|PermissionRole query()
 * @property string $id
 * @property string|null $permission_id
 * @property string|null $role_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|PermissionRole whereCreatedAt($value)
 * @method static Builder|PermissionRole whereCreatedBy($value)
 * @method static Builder|PermissionRole whereId($value)
 * @method static Builder|PermissionRole wherePermissionId($value)
 * @method static Builder|PermissionRole whereRoleId($value)
 * @method static Builder|PermissionRole whereUpdatedAt($value)
 * @method static Builder|PermissionRole whereUpdatedBy($value)
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class PermissionRole extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\PermissionUserFactory factory($count = null, $state = [])
 * @property string $id
 * @property string $permission_id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
 * @property int $id
 * @property string $tokenable_type
 * @property int $tokenable_id
 * @property string $name
 * @property string $token
 * @property string|null $abilities
 * @property Carbon|null $last_used_at
 * @property Carbon|null $expires_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Modules\User\Database\Factories\PersonalAccessTokenFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken query()
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
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $bio
 * @property string|null $avatar
 * @property string|null $timezone
 * @property string|null $locale
 * @property array<string, mixed> $preferences
 * @property string $status
 * @property SchemalessAttributes $extra
 * @property string $avatar
 * @property ProfileContract|null $creator
 * @property Collection<int, DeviceUser> $deviceUsers
 * @property int|null $device_users_count
 * @property ProfileTeam|DeviceProfile|null $pivot
 * @property Collection<int, Device> $devices
 * @property int|null $devices_count
 * @property string|null $first_name
 * @property string|null $full_name
 * @property string|null $last_name
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property Collection<int, DeviceUser> $mobileDeviceUsers
 * @property int|null $mobile_device_users_count
 * @property Collection<int, Device> $mobileDevices
 * @property int|null $mobile_devices_count
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null $notifications_count
 * @property Collection<int, Permission> $permissions
 * @property int|null $permissions_count
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property Collection<int, Team> $teams
 * @property int|null $teams_count
 * @property ProfileContract|null $updater
 * @property UserContract|null $user
 * @property string|null $user_name
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, $guard = null)
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property ProfileContract|null $deleter
 * @method static Builder<static>|Profile whereBio($value)
 * @method static Builder<static>|Profile whereCreatedAt($value)
 * @method static Builder<static>|Profile whereCreatedBy($value)
 * @method static Builder<static>|Profile whereDeletedAt($value)
 * @method static Builder<static>|Profile whereDeletedBy($value)
 * @method static Builder<static>|Profile whereEmail($value)
 * @method static Builder<static>|Profile whereFirstName($value)
 * @method static Builder<static>|Profile whereId($value)
 * @method static Builder<static>|Profile whereLastName($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile whereUpdatedAt($value)
 * @method static Builder<static>|Profile whereUpdatedBy($value)
 * @method static Builder<static>|Profile whereUserId($value)
 * @method static \Modules\User\Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @property string|null $post_type
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $address
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
 * @property string|null $googleplace_url
 * @property string|null $googleplace_url_short
 * @property string|null $point_of_interest
 * @property string|null $point_of_interest_short
 * @property string|null $political
 * @property string|null $political_short
 * @property string|null $campground
 * @property string|null $campground_short
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(list<string> $relations)
 * @method static Builder<static>|Profile childrenWithCount(list<string> $relations)
 * @method static Builder<static>|Profile whereAddress($value)
 * @method static Builder<static>|Profile whereAdministrativeAreaLevel1($value)
 * @method static Builder<static>|Profile whereAdministrativeAreaLevel1Short($value)
 * @method static Builder<static>|Profile whereAdministrativeAreaLevel2($value)
 * @method static Builder<static>|Profile whereAdministrativeAreaLevel2Short($value)
 * @method static Builder<static>|Profile whereAdministrativeAreaLevel3($value)
 * @method static Builder<static>|Profile whereAdministrativeAreaLevel3Short($value)
 * @method static Builder<static>|Profile whereAvatar($value)
 * @method static Builder<static>|Profile whereCampground($value)
 * @method static Builder<static>|Profile whereCampgroundShort($value)
 * @method static Builder<static>|Profile whereCountry($value)
 * @method static Builder<static>|Profile whereCountryShort($value)
 * @method static Builder<static>|Profile whereEnte($value)
 * @method static Builder<static>|Profile whereGoogleplaceUrl($value)
 * @method static Builder<static>|Profile whereGoogleplaceUrlShort($value)
 * @method static Builder<static>|Profile whereLocale($value)
 * @method static Builder<static>|Profile whereLocality($value)
 * @method static Builder<static>|Profile whereLocalityShort($value)
 * @method static Builder<static>|Profile whereMatr($value)
 * @method static Builder<static>|Profile wherePointOfInterest($value)
 * @method static Builder<static>|Profile wherePointOfInterestShort($value)
 * @method static Builder<static>|Profile wherePolitical($value)
 * @method static Builder<static>|Profile wherePoliticalShort($value)
 * @method static Builder<static>|Profile wherePostType($value)
 * @method static Builder<static>|Profile wherePostalCode($value)
 * @method static Builder<static>|Profile wherePostalCodeShort($value)
 * @method static Builder<static>|Profile wherePostalTown($value)
 * @method static Builder<static>|Profile wherePostalTownShort($value)
 * @method static Builder<static>|Profile wherePreferences($value)
 * @method static Builder<static>|Profile wherePremise($value)
 * @method static Builder<static>|Profile wherePremiseShort($value)
 * @method static Builder<static>|Profile whereRoute($value)
 * @method static Builder<static>|Profile whereRouteShort($value)
 * @method static Builder<static>|Profile whereStatus($value)
 * @method static Builder<static>|Profile whereStreetNumber($value)
 * @method static Builder<static>|Profile whereStreetNumberShort($value)
 * @method static Builder<static>|Profile whereTimezone($value)
 * @property string|null $type
 * @property string|null $birth_date
 * @property string|null $gender
 * @property bool $is_active
 * @method static Builder<static>|Profile whereBirthDate($value)
 * @method static Builder<static>|Profile whereExtra($value)
 * @method static Builder<static>|Profile whereGender($value)
 * @method static Builder<static>|Profile whereIsActive($value)
 * @method static Builder<static>|Profile whereType($value)
 * @method static Builder<static>|Profile whereUserName($value)
 * @method static Builder<static>|Profile team($teams, bool $without = false)
 * @method static Builder<static>|Profile withoutTeam($teams)
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
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string $id
 * @property int $team_id
 * @property string|null $user_id
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|ProfileTeam newModelQuery()
 * @method static Builder<static>|ProfileTeam newQuery()
 * @method static Builder<static>|ProfileTeam query()
 * @method static Builder<static>|ProfileTeam whereCreatedAt($value)
 * @method static Builder<static>|ProfileTeam whereCreatedBy($value)
 * @method static Builder<static>|ProfileTeam whereDeletedAt($value)
 * @method static Builder<static>|ProfileTeam whereDeletedBy($value)
 * @method static Builder<static>|ProfileTeam whereId($value)
 * @method static Builder<static>|ProfileTeam whereRole($value)
 * @method static Builder<static>|ProfileTeam whereTeamId($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedAt($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedBy($value)
 * @method static Builder<static>|ProfileTeam whereUserId($value)
 * @property ProfileContract|null $deleter
 * @property Team|null $team
 * @property User|null $user
 * @property string|null $profile_id
 * @property array<array-key, mixed>|null $permissions
 * @method static Builder<static>|ProfileTeam childrenWith(array<int|string, mixed> $relations)
 * @method static Builder<static>|ProfileTeam childrenWithCount(array<int|string, mixed> $relations)
 * @method static \Modules\User\Database\Factories\ProfileTeamFactory factory($count = null, $state = [])
 * @method static Builder<static>|ProfileTeam wherePermissions($value)
 * @method static Builder<static>|ProfileTeam whereProfileId($value)
 * @mixin \Eloquent
 */
	class ProfileTeam extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\Role.
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $team_id
 * @property string $name
 * @property string $guard_name
 * @property string|null $display_name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Collection<int, Permission> $permissions
 * @property int|null $permissions_count
 * @property Team|null $team
 * @property Collection<int, Model&UserContract> $users
 * @property int|null $users_count
 * @property PermissionRole|null $pivot
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role permission($permissions)
 * @method static Builder|Role query()
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereGuardName($value)
 * @method static Builder|Role whereName($value)
 * @method static Builder|Role whereTeamId($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereCreatedBy($value)
 * @method static Builder|Role whereUpdatedBy($value)
 * @method static Builder|Role withoutPermission($permissions)
 * @method static Builder|Role whereDescription($value)
 * @method static Builder|Role whereDisplayName($value)
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static Builder<static>|Role whereUuid($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\RoleHasPermission.
 *
 * @property int $id
 * @property int $permission_id
 * @property int $role_id
 * @method static Builder|RoleHasPermission newModelQuery()
 * @method static Builder|RoleHasPermission newQuery()
 * @method static Builder|RoleHasPermission query()
 * @method static Builder|RoleHasPermission whereId($value)
 * @method static Builder|RoleHasPermission wherePermissionId($value)
 * @method static Builder|RoleHasPermission whereRoleId($value)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|RoleHasPermission whereCreatedAt($value)
 * @method static Builder|RoleHasPermission whereCreatedBy($value)
 * @method static Builder|RoleHasPermission whereUpdatedAt($value)
 * @method static Builder|RoleHasPermission whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class RoleHasPermission extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * @property int|null $id
 * @property string|null $name
 * @property array<int, string>|null $scopes
 * @property array<string, mixed>|null $parameters
 * @property bool|null $stateless
 * @property bool|null $active
 * @property bool|null $socialite
 * @property string|null $svg
 * @property string|null $client_id
 * @property string|null $client_secret
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static Builder|SocialProvider newModelQuery()
 * @method static Builder|SocialProvider newQuery()
 * @method static Builder|SocialProvider query()
 * @method static Builder|SocialProvider whereActive($value)
 * @method static Builder|SocialProvider whereClientId($value)
 * @method static Builder|SocialProvider whereClientSecret($value)
 * @method static Builder|SocialProvider whereId($value)
 * @method static Builder|SocialProvider whereName($value)
 * @method static Builder|SocialProvider whereParameters($value)
 * @method static Builder|SocialProvider whereScopes($value)
 * @method static Builder|SocialProvider whereSocialite($value)
 * @method static Builder|SocialProvider whereStateless($value)
 * @method static Builder|SocialProvider whereSvg($value)
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static Builder|SocialProvider whereCreatedAt($value)
 * @method static Builder|SocialProvider whereCreatedBy($value)
 * @method static Builder|SocialProvider whereUpdatedAt($value)
 * @method static Builder|SocialProvider whereUpdatedBy($value)
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\SocialProviderFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class SocialProvider extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\SocialiteUser.
 *
 * @property int $id
 * @property string $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $name
 * @property string|null $email
 * @property string|null $avatar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property UserContract|null $user
 * @method static Builder|SocialiteUser newModelQuery()
 * @method static Builder|SocialiteUser newQuery()
 * @method static Builder|SocialiteUser query()
 * @method static Builder|SocialiteUser whereAvatar($value)
 * @method static Builder|SocialiteUser whereCreatedAt($value)
 * @method static Builder|SocialiteUser whereCreatedBy($value)
 * @method static Builder|SocialiteUser whereEmail($value)
 * @method static Builder|SocialiteUser whereId($value)
 * @method static Builder|SocialiteUser whereName($value)
 * @method static Builder|SocialiteUser whereProvider($value)
 * @method static Builder|SocialiteUser whereProviderId($value)
 * @method static Builder|SocialiteUser whereToken($value)
 * @method static Builder|SocialiteUser whereUpdatedAt($value)
 * @method static Builder|SocialiteUser whereUpdatedBy($value)
 * @method static Builder|SocialiteUser whereUserId($value)
 * @property string $uuid (DC2Type:guid)
 * @method static Builder|SocialiteUser whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\SocialiteUserFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class SocialiteUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\SsoProvider.
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $type
 * @property string|null $entity_id
 * @property string|null $client_id
 * @property string|null $client_secret
 * @property string|null $redirect_url
 * @property string|null $metadata_url
 * @property string|null $scopes
 * @property array<string, mixed>|null $settings
 * @property array<int, string>|null $domain_whitelist
 * @property array<string, string>|null $role_mapping
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Collection<int, User> $users
 * @property int|null $users_count
 * @method static Builder<static>|SsoProvider newModelQuery()
 * @method static Builder<static>|SsoProvider newQuery()
 * @method static Builder<static>|SsoProvider query()
 * @method static Builder<static>|SsoProvider whereClientId($value)
 * @method static Builder<static>|SsoProvider whereClientSecret($value)
 * @method static Builder<static>|SsoProvider whereCreatedAt($value)
 * @method static Builder<static>|SsoProvider whereCreatedBy($value)
 * @method static Builder<static>|SsoProvider whereDisplayName($value)
 * @method static Builder<static>|SsoProvider whereDomainWhitelist($value)
 * @method static Builder<static>|SsoProvider whereEntityId($value)
 * @method static Builder<static>|SsoProvider whereId($value)
 * @method static Builder<static>|SsoProvider whereIsActive($value)
 * @method static Builder<static>|SsoProvider whereMetadataUrl($value)
 * @method static Builder<static>|SsoProvider whereName($value)
 * @method static Builder<static>|SsoProvider whereRedirectUrl($value)
 * @method static Builder<static>|SsoProvider whereRoleMapping($value)
 * @method static Builder<static>|SsoProvider whereScopes($value)
 * @method static Builder<static>|SsoProvider whereSettings($value)
 * @method static Builder<static>|SsoProvider whereType($value)
 * @method static Builder<static>|SsoProvider whereUpdatedAt($value)
 * @method static Builder<static>|SsoProvider whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\SsoProviderFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class SsoProvider extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Class Modules\User\Models\Team.
 *
 * @property string $id
 * @property string $user_id (DC2Type:guid)
 * @property string $name
 * @property int $personal_team
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property TeamUser $pivot
 * @property Collection<int, User> $members
 * @property int|null $members_count
 * @property User|null $owner
 * @property Collection<int, TeamInvitation> $teamInvitations
 * @property int|null $team_invitations_count
 * @property ProfileContract|null $updater
 * @property Collection<int, User> $users
 * @property int|null $users_count
 * @method static Builder|Team newModelQuery()
 * @method static Builder|Team newQuery()
 * @method static Builder|Team query()
 * @method static Builder|Team whereCreatedAt($value)
 * @method static Builder|Team whereCreatedBy($value)
 * @method static Builder|Team whereDeletedAt($value)
 * @method static Builder|Team whereDeletedBy($value)
 * @method static Builder|Team whereId($value)
 * @method static Builder|Team whereName($value)
 * @method static Builder|Team wherePersonalTeam($value)
 * @method static Builder|Team whereUpdatedAt($value)
 * @method static Builder|Team whereUpdatedBy($value)
 * @method static Builder|Team whereUserId($value)
 * @property string|null $code
 * @method static Builder|Team whereCode($value)
 * @property string|null $uuid
 * @method static Builder<static>|Team whereUuid($value)
 * @property string|null $owner_id
 * @method static Builder<static>|Team whereOwnerId($value)
 * @method static static create(array<string, mixed> $attributes = [])
 * @method static static firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $avatar_path
 * @property array<array-key, mixed>|null $settings
 * @property Collection<int, TeamPermission> $permissions
 * @property int|null $permissions_count
 * @property Collection<int, TeamUser> $teamUsers
 * @property int|null $team_users_count
 * @method static Builder<static>|Team whereAvatarPath($value)
 * @method static Builder<static>|Team whereDescription($value)
 * @method static Builder<static>|Team whereSettings($value)
 * @method static Builder<static>|Team whereSlug($value)
 * @mixin \Eloquent
 */
	class Team extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\TeamInvitation.
 *
 * @property int $id
 * @property string|null $team_id
 * @property string $email
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Team|null $team
 * @property TeamContract|null $team
 * @method static Builder|TeamInvitation newModelQuery()
 * @method static Builder|TeamInvitation newQuery()
 * @method static Builder|TeamInvitation query()
 * @method static Builder|TeamInvitation whereCreatedAt($value)
 * @method static Builder|TeamInvitation whereEmail($value)
 * @method static Builder|TeamInvitation whereId($value)
 * @method static Builder|TeamInvitation whereRole($value)
 * @method static Builder|TeamInvitation whereTeamId($value)
 * @method static Builder|TeamInvitation whereUpdatedAt($value)
 * @property string $uuid
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|TeamInvitation whereCreatedBy($value)
 * @method static Builder|TeamInvitation whereDeletedAt($value)
 * @method static Builder|TeamInvitation whereDeletedBy($value)
 * @method static Builder|TeamInvitation whereUpdatedBy($value)
 * @method static Builder|TeamInvitation whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @property Carbon|null $accepted_at
 * @property Carbon|null $declined_at
 * @property string|null $user_id
 * @method static \Modules\User\Database\Factories\TeamInvitationFactory factory($count = null, $state = [])
 * @method static Builder<static>|TeamInvitation whereAcceptedAt($value)
 * @method static Builder<static>|TeamInvitation whereDeclinedAt($value)
 * @method static Builder<static>|TeamInvitation whereUserId($value)
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
 * @property string $id
 * @property string $team_id
 * @property string $user_id
 * @property string $permission
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 * @property Team $team
 * @property User $user
 * @method static Builder<static>|TeamPermission newModelQuery()
 * @method static Builder<static>|TeamPermission newQuery()
 * @method static Builder<static>|TeamPermission query()
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @property string|null $name
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static \Modules\User\Database\Factories\TeamPermissionFactory factory($count = null, $state = [])
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
 * @method static Builder|TeamUser newModelQuery()
 * @method static Builder|TeamUser newQuery()
 * @method static Builder|TeamUser query()
 * @property int $id
 * @property string $uuid
 * @property string|null $team_id
 * @property string|null $user_id
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $customer_id
 * @method static Builder|TeamUser whereCreatedAt($value)
 * @method static Builder|TeamUser whereCreatedBy($value)
 * @method static Builder|TeamUser whereCustomerId($value)
 * @method static Builder|TeamUser whereId($value)
 * @method static Builder|TeamUser whereRole($value)
 * @method static Builder|TeamUser whereTeamId($value)
 * @method static Builder|TeamUser whereUpdatedAt($value)
 * @method static Builder|TeamUser whereUpdatedBy($value)
 * @method static Builder|TeamUser whereUserId($value)
 * @method static Builder|TeamUser whereUuid($value)
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|TeamUser whereDeletedAt($value)
 * @method static Builder|TeamUser whereDeletedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @property Team|null $team
 * @property User|null $user
 * @property array<array-key, mixed>|null $permissions
 * @property string|null $joined_at
 * @method static Builder<static>|TeamUser childrenWith(array<int|string, mixed> $relations)
 * @method static Builder<static>|TeamUser childrenWithCount(array<int|string, mixed> $relations)
 * @method static \Modules\User\Database\Factories\TeamUserFactory factory($count = null, $state = [])
 * @method static Builder<static>|TeamUser whereJoinedAt($value)
 * @method static Builder<static>|TeamUser wherePermissions($value)
 * @mixin \Eloquent
 */
	class TeamUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\Tenant.
 *
 * @method static Builder|Tenant newModelQuery()
 * @method static Builder|Tenant newQuery()
 * @method static Builder|Tenant query()
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property TenantUser $pivot
 * @property EloquentCollection<int, User> $users
 * @property int|null $users_count
 * @property string $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $domain
 * @property string|null $database
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property ProfileContract|null $deleter
 * @method static Builder<static>|Tenant whereCreatedAt($value)
 * @method static Builder<static>|Tenant whereDatabase($value)
 * @method static Builder<static>|Tenant whereDeletedAt($value)
 * @method static Builder<static>|Tenant whereDomain($value)
 * @method static Builder<static>|Tenant whereId($value)
 * @method static Builder<static>|Tenant whereIsActive($value)
 * @method static Builder<static>|Tenant whereName($value)
 * @method static Builder<static>|Tenant whereSlug($value)
 * @method static Builder<static>|Tenant whereUpdatedAt($value)
 * @property string|null $email_address
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $address
 * @property string|null $primary_color
 * @property string|null $secondary_color
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property string|null $settings
 * @method static \Modules\User\Database\Factories\TenantFactory factory($count = null, $state = [])
 * @method static Builder<static>|Tenant whereAddress($value)
 * @method static Builder<static>|Tenant whereCreatedBy($value)
 * @method static Builder<static>|Tenant whereDeletedBy($value)
 * @method static Builder<static>|Tenant whereEmailAddress($value)
 * @method static Builder<static>|Tenant whereMobile($value)
 * @method static Builder<static>|Tenant wherePhone($value)
 * @method static Builder<static>|Tenant wherePrimaryColor($value)
 * @method static Builder<static>|Tenant whereSecondaryColor($value)
 * @method static Builder<static>|Tenant whereSettings($value)
 * @method static Builder<static>|Tenant whereUpdatedBy($value)
 * @property string|null $trial_ends_at
 * @method static Builder<static>|Tenant whereTrialEndsAt($value)
 * @mixin \Eloquent
 */
	class Tenant extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Modules\User\Models\TenantUser.
 *
 * @method static Builder|TeamUser newModelQuery()
 * @method static Builder|TeamUser newQuery()
 * @method static Builder|TeamUser query()
 * @property int $id
 * @property string|null $tenant_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static Builder|TeamUser whereCreatedAt($value)
 * @method static Builder|TeamUser whereCreatedBy($value)
 * @method static Builder|TeamUser whereCustomerId($value)
 * @method static Builder|TeamUser whereId($value)
 * @method static Builder|TeamUser whereRole($value)
 * @method static Builder|TeamUser whereTeamId($value)
 * @method static Builder|TeamUser whereUpdatedAt($value)
 * @method static Builder|TeamUser whereUpdatedBy($value)
 * @method static Builder|TeamUser whereUserId($value)
 * @method static Builder|TeamUser whereUuid($value)
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|TenantUser whereDeletedAt($value)
 * @method static Builder|TenantUser whereDeletedBy($value)
 * @method static Builder|TenantUser whereTenantId($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\TenantUserFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class TenantUser extends \Eloquent {}
}

namespace Modules\User\Models{
/**
 * Class Modules\User\Models\User.
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Carbon|null $password_expires_at
 * @property string|null $lang
 * @property bool $is_active
 * @property bool $is_otp
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property Collection<int, AuthenticationLog> $authentications
 * @property int|null $authentications_count
 * @property Collection<int, OauthClient> $clients
 * @property int|null $clients_count
 * @property TenantUser $pivot
 * @property Collection<int, Device> $devices
 * @property int|null $devices_count
 * @property string|null $full_name
 * @property AuthenticationLog|null $latestAuthentication
 * @property DatabaseNotificationCollection<int, Notification> $notifications
 * @property int|null $notifications_count
 * @property Collection<int, Team> $ownedTeams
 * @property int|null $owned_teams_count
 * @property Collection<int, Permission> $permissions
 * @property int|null $permissions_count
 * @property ProfileContract|null $profile
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property Membership $membership
 * @property Collection<int, Team> $teams
 * @property int|null $teams_count
 * @property Collection<int, Tenant> $tenants
 * @property int|null $tenants_count
 * @property Collection<int, OauthToken> $tokens
 * @property int|null $tokens_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions, $without = false)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null, $without = false)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCreatedBy($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDeletedBy($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereLang($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereName($value)
 * @method static Builder<static>|User whereNotNull($column, $boolean = 'and')
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUpdatedBy($value)
 * @method static Builder|User withoutPermission($permissions)
 * @method static Builder|User withoutRole($roles, $guard = null)
 * @property string $last_name
 * @property Team|null $currentTeam
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property Collection<int, SocialiteUser> $socialiteUsers
 * @property int|null $socialite_users_count
 * @property Collection<int, Membership> $teamUsers
 * @property int|null $team_users_count
 * @property Collection<int, User> $all_team_users
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $registration_number
 * @property string|null $status
 * @property string|null $state
 * @property string|null $moderation_data
 * @property string|null $certifications
 * @property string|null $type
 * @method static Builder<static>|User whereAddress($value)
 * @method static Builder<static>|User whereCertifications($value)
 * @method static Builder<static>|User whereCity($value)
 * @method static Builder<static>|User whereIsOtp($value)
 * @method static Builder<static>|User whereModerationData($value)
 * @method static Builder<static>|User wherePasswordExpiresAt($value)
 * @method static Builder<static>|User wherePhone($value)
 * @method static Builder<static>|User whereRegistrationNumber($value)
 * @method static Builder<static>|User whereState($value)
 * @method static Builder<static>|User whereStatus($value)
 * @method static Builder<static>|User whereType($value)
 * @property string|null $facebook_id
 * @method static Builder<static>|User whereFacebookId($value)
 * @property User|null $creator
 * @property User|null $updater
 * @property User|null $user
 * @method static \Modules\User\Database\Factories\UserFactory factory($count = null, $state = [])
 * @property string|null $uuid
 * @property string $surname
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property Collection<int, OauthClient> $oauthApps
 * @property int|null $oauth_apps_count
 * @method static Builder<static>|User childrenWith(array<int|string, mixed> $relations)
 * @method static Builder<static>|User childrenWithCount(array<int|string, mixed> $relations)
 * @method static Builder<static>|User whereSurname($value)
 * @method static Builder<static>|User whereTwoFactorConfirmedAt($value)
 * @method static Builder<static>|User whereTwoFactorRecoveryCodes($value)
 * @method static Builder<static>|User whereTwoFactorSecret($value)
 * @method static Builder<static>|User whereUuid($value)
 * @property Collection<int, Team> $membershipTeams
 * @property int|null $membership_teams_count
 * @method static Builder<static>|User team($teams, bool $without = false)
 * @method static Builder<static>|User withoutTeam($teams)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\Cache.
 *
 * @property string $key
 * @property string $value
 * @property int $expiration
 * @method static CacheFactory factory($count = null, $state = [])
 * @method static Builder<static>|Cache newModelQuery()
 * @method static Builder<static>|Cache newQuery()
 * @method static Builder<static>|Cache query()
 * @method static Builder<static>|Cache whereExpiration($value)
 * @method static Builder<static>|Cache whereKey($value)
 * @method static Builder<static>|Cache whereValue($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @mixin \Eloquent
 */
	class Cache extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\CacheLock.
 *
 * @property string $key
 * @property string $owner
 * @property int $expiration
 * @method static CacheLockFactory factory($count = null, $state = [])
 * @method static Builder<static>|CacheLock newModelQuery()
 * @method static Builder<static>|CacheLock newQuery()
 * @method static Builder<static>|CacheLock query()
 * @method static Builder<static>|CacheLock whereExpiration($value)
 * @method static Builder<static>|CacheLock whereKey($value)
 * @method static Builder<static>|CacheLock whereOwner($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @mixin \Eloquent
 */
	class CacheLock extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Model Extra.
 *
 * @property int $id
 * @property int|null $model_id
 * @property string|null $model_type
 * @property SchemalessAttributes $extra_attributes
 * @method static Builder|BaseModel disableCache()
 * @method static ExtraFactory factory($count = null, $state = [])
 * @method static \Illuminate\Contracts\Database\Eloquent\Builder|Extra newModelQuery()
 * @method static Builder|Extra newQuery()
 * @method static Builder|Extra query()
 * @method static Builder|BaseModel withCacheCooldownSeconds(?int $seconds = null)
 * @method static Builder|Extra withExtraAttributes()
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Extra whereCreatedAt($value)
 * @method static Builder|Extra whereCreatedBy($value)
 * @method static Builder|Extra whereDeletedAt($value)
 * @method static Builder|Extra whereDeletedBy($value)
 * @method static Builder|Extra whereExtraAttributes($value)
 * @method static Builder|Extra whereId($value)
 * @method static Builder|Extra whereModelId($value)
 * @method static Builder|Extra whereModelType($value)
 * @method static Builder|Extra whereUpdatedAt($value)
 * @method static Builder|Extra whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin \Eloquent
 */
	class Extra extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\Feed.
 *
 * @property string $id
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static FeedFactory factory($count = null, $state = [])
 * @method static Builder<static>|Feed newModelQuery()
 * @method static Builder<static>|Feed newQuery()
 * @method static Builder<static>|Feed query()
 * @method static Builder<static>|Feed whereCreatedAt($value)
 * @method static Builder<static>|Feed whereCreatedBy($value)
 * @method static Builder<static>|Feed whereId($value)
 * @method static Builder<static>|Feed whereUpdatedAt($value)
 * @method static Builder<static>|Feed whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @mixin \Eloquent
 */
	class Feed extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property int $id
 * @property string $check_name
 * @property string $check_label
 * @property string $status
 * @property string|null $notification_message
 * @property string|null $short_summary
 * @property array<array-key, mixed> $meta
 * @property string $ended_at
 * @property string $batch
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder<static>|HealthCheckResultHistoryItem newModelQuery()
 * @method static Builder<static>|HealthCheckResultHistoryItem newQuery()
 * @method static Builder<static>|HealthCheckResultHistoryItem query()
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
 * @property string|null $TABLE_CATALOG
 * @property string|null $TABLE_SCHEMA
 * @property string|null $TABLE_NAME
 * @property string|null $TABLE_TYPE
 * @property string|null $ENGINE
 * @property int|null $VERSION
 * @property string|null $ROW_FORMAT
 * @property int|null $table_rows
 * @property int|null $AVG_ROW_LENGTH
 * @property int|null $DATA_LENGTH
 * @property int|null $MAX_DATA_LENGTH
 * @property int|null $INDEX_LENGTH
 * @property int|null $DATA_FREE
 * @property int|null $AUTO_INCREMENT
 * @property Carbon|null $CREATE_TIME
 * @property Carbon|null $UPDATE_TIME
 * @property Carbon|null $CHECK_TIME
 * @property string|null $TABLE_COLLATION
 * @property int|null $CHECKSUM
 * @property string|null $CREATE_OPTIONS
 * @property string|null $TABLE_COMMENT
 * @property int $id
 * @method static Builder<static>|InformationSchemaTable newModelQuery()
 * @method static Builder<static>|InformationSchemaTable newQuery()
 * @method static Builder<static>|InformationSchemaTable query()
 * @method static Builder<static>|InformationSchemaTable whereAUTOINCREMENT($value)
 * @method static Builder<static>|InformationSchemaTable whereAVGROWLENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereCHECKSUM($value)
 * @method static Builder<static>|InformationSchemaTable whereCHECKTIME($value)
 * @method static Builder<static>|InformationSchemaTable whereCREATEOPTIONS($value)
 * @method static Builder<static>|InformationSchemaTable whereCREATETIME($value)
 * @method static Builder<static>|InformationSchemaTable whereDATAFREE($value)
 * @method static Builder<static>|InformationSchemaTable whereDATALENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereENGINE($value)
 * @method static Builder<static>|InformationSchemaTable whereINDEXLENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereId($value)
 * @method static Builder<static>|InformationSchemaTable whereMAXDATALENGTH($value)
 * @method static Builder<static>|InformationSchemaTable whereROWFORMAT($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLECATALOG($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLECOLLATION($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLECOMMENT($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLENAME($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLEROWS($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLESCHEMA($value)
 * @method static Builder<static>|InformationSchemaTable whereTABLETYPE($value)
 * @method static Builder<static>|InformationSchemaTable whereUPDATETIME($value)
 * @method static Builder<static>|InformationSchemaTable whereVERSION($value)
 * @property string|null $table_schema
 * @property string|null $table_name
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_at
 * @property string|null $created_by
 * @method static Builder<static>|InformationSchemaTable whereCreatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereCreatedBy($value)
 * @method static Builder<static>|InformationSchemaTable whereTableName($value)
 * @method static Builder<static>|InformationSchemaTable whereTableRows($value)
 * @method static Builder<static>|InformationSchemaTable whereTableSchema($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedAt($value)
 * @method static Builder<static>|InformationSchemaTable whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property string|null $model_class
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InformationSchemaTable whereModelClass($value)
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
 * @method static LogFactory factory($count = null, $state = [])
 * @method static Builder<static>|Log newModelQuery()
 * @method static Builder<static>|Log newQuery()
 * @method static Builder<static>|Log query()
 * @method static Builder<static>|Log whereId($value)
 * @method static Builder<static>|Log whereName($value)
 * @method static Builder<static>|Log whereSize($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property string|null $file_content
 * @property ProfileContract|null $updater
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
 * @method static Builder|Module newModelQuery()
 * @method static Builder|Module newQuery()
 * @method static Builder|Module query()
 * @method static Builder|Module whereDescription($value)
 * @method static Builder|Module whereId($value)
 * @method static Builder|Module whereName($value)
 * @method static Builder|Module wherePath($value)
 * @method static Builder|Module wherePriority($value)
 * @method static Builder|Module whereStatus($value)
 * @property string|null $icon
 * @property array<string, string>|null $colors
 * @method static Builder|Module whereColors($value)
 * @method static Builder|Module whereIcon($value)
 * @mixin \Eloquent
 */
	class Module extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property string $id
 * @property int $bucket
 * @property int $period
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $aggregate
 * @property string $value
 * @property int|null $count
 * @method static PulseAggregateFactory factory($count = null, $state = [])
 * @method static Builder<static>|PulseAggregate newModelQuery()
 * @method static Builder<static>|PulseAggregate newQuery()
 * @method static Builder<static>|PulseAggregate query()
 * @method static Builder<static>|PulseAggregate whereAggregate($value)
 * @method static Builder<static>|PulseAggregate whereBucket($value)
 * @method static Builder<static>|PulseAggregate whereCount($value)
 * @method static Builder<static>|PulseAggregate whereId($value)
 * @method static Builder<static>|PulseAggregate whereKey($value)
 * @method static Builder<static>|PulseAggregate whereKeyHash($value)
 * @method static Builder<static>|PulseAggregate wherePeriod($value)
 * @method static Builder<static>|PulseAggregate whereType($value)
 * @method static Builder<static>|PulseAggregate whereValue($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @mixin \Eloquent
 */
	class PulseAggregate extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property string $id
 * @property int $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property int|null $value
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PulseEntryFactory factory($count = null, $state = [])
 * @method static Builder<static>|PulseEntry newModelQuery()
 * @method static Builder<static>|PulseEntry newQuery()
 * @method static Builder<static>|PulseEntry query()
 * @method static Builder<static>|PulseEntry whereId($value)
 * @method static Builder<static>|PulseEntry whereKey($value)
 * @method static Builder<static>|PulseEntry whereKeyHash($value)
 * @method static Builder<static>|PulseEntry whereTimestamp($value)
 * @method static Builder<static>|PulseEntry whereType($value)
 * @method static Builder<static>|PulseEntry whereValue($value)
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class PulseEntry extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * @property string $id
 * @property int $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PulseValueFactory factory($count = null, $state = [])
 * @method static Builder<static>|PulseValue newModelQuery()
 * @method static Builder<static>|PulseValue newQuery()
 * @method static Builder<static>|PulseValue query()
 * @method static Builder<static>|PulseValue whereId($value)
 * @method static Builder<static>|PulseValue whereKey($value)
 * @method static Builder<static>|PulseValue whereKeyHash($value)
 * @method static Builder<static>|PulseValue whereTimestamp($value)
 * @method static Builder<static>|PulseValue whereType($value)
 * @method static Builder<static>|PulseValue whereValue($value)
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class PulseValue extends \Eloquent {}
}

namespace Modules\Xot\Models{
/**
 * Modules\Xot\Models\Session.
 *
 * @property string $id
 * @property string|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static SessionFactory factory($count = null, $state = [])
 * @method static Builder<static>|Session newModelQuery()
 * @method static Builder<static>|Session newQuery()
 * @method static Builder<static>|Session query()
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
 * @property ProfileContract|null $deleter
 * @mixin \Eloquent
 */
	class Session extends \Eloquent {}
}

