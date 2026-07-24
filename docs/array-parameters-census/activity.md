# Modulo Activity — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **27**

---

## `Modules/Activity/app/Actions/ActivityLogger.php`

Namespace: `Modules\Activity\Actions`

### `public function log(...)` — class `ActivityLogger` (linea 29)

```php
function log(string $type, mixed $user = null, ?Model $subject = null, ?array $properties = null, ?string $description = null,)
```

**Parametri array:**
- `?array $properties = null`

### `public function custom(...)` — class `ActivityLogger` (linea 123)

```php
function custom(string $type, string $description, ?Model $subject = null, ?array $properties = null,)
```

**Parametri array:**
- `?array $properties = null`

---

## `Modules/Activity/app/Actions/RecordSubjectActivityAction.php`

Namespace: `Modules\Activity\Actions`

### `public function execute(...)` — class `RecordSubjectActivityAction` (linea 21)

```php
function execute(string $subjectType, int|string $subjectId, string $event, ?array $properties = null, ?string $description = null,)
```

**Parametri array:**
- `?array $properties = null`

---

## `Modules/Activity/app/Actions/RedactModelAttributesAction.php`

Namespace: `Modules\Activity\Actions`

### `public function execute(...)` — class `RedactModelAttributesAction` (linea 29)

```php
function execute(array $attributes)
```

**Parametri array:**
- `array $attributes`

---

## `Modules/Activity/app/Actions/RestoreActivityAction.php`

Namespace: `Modules\Activity\Actions`

### `public function execute(...)` — class `RestoreActivityAction` (linea 19)

```php
function execute(Model $record, array $oldProperties)
```

**Parametri array:**
- `array $oldProperties`

---

## `Modules/Activity/app/Adapters/ActivityLogger.php`

Namespace: `Modules\Activity\Adapters`

### `public function log(...)` — class `ActivityLogger` (linea 34)

```php
function log(string $type, mixed $user = null, ?Model $subject = null, ?array $properties = null, ?string $description = null,)
```

**Parametri array:**
- `?array $properties = null`

### `public function custom(...)` — class `ActivityLogger` (linea 89)

```php
function custom(string $type, string $description, ?Model $subject = null, ?array $properties = null,)
```

**Parametri array:**
- `?array $properties = null`

---

## `Modules/Activity/app/Adapters/ActivityRecorder.php`

Namespace: `Modules\Activity\Adapters`

### `public function record(...)` — class `ActivityRecorder` (linea 19)

```php
function record(string $modelClass, int|string $modelId, string $action, array $changes = [])
```

**Parametri array:**
- `array $changes = []`

---

## `Modules/Activity/app/Contracts/ActivityRecorderContract.php`

Namespace: `Modules\Activity\Contracts`

### `public function record(...)` — interface `ActivityRecorderContract` (linea 21)

```php
function record(string $modelClass, int|string $modelId, string $action, array $changes = [])
```

**Parametri array:**
- `array $changes = []`

---

## `Modules/Activity/app/Models/Contracts/ActivityRecorderContract.php`

Namespace: `Modules\Activity\Models\Contracts`

### `public function record(...)` — interface `ActivityRecorderContract` (linea 20)

```php
function record(string $modelClass, int|string $modelId, string $action, array $changes = [])
```

**Parametri array:**
- `array $changes = []`

---

## `Modules/Activity/build/phpstan/cache/nette.configurator/Container_abb4a5e47c.php`

### `public function __construct(...)` — class `Container_abb4a5e47c` (linea 2664)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6028)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6086)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6198)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6238)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/Activity/build/phpstan/cache/nette.configurator/Container_fa2338784f.php`

### `public function __construct(...)` — class `Container_fa2338784f` (linea 2664)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6028)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6086)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6198)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6238)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/Activity/database/factories/SnapshotFactory.php`

Namespace: `Modules\Activity\Database\Factories`

### `public function withState(...)` — class `SnapshotFactory` (linea 70)

```php
function withState(array $state)
```

**Parametri array:**
- `array $state`

---

## `Modules/Activity/tests/Fixtures/ListLogActivitiesActionTestResource.php`

Namespace: `Modules\Activity\Tests\Fixtures`

### `public static function getUrl(...)` — class `ListLogActivitiesActionTestResource` (linea 20)

```php
function getUrl(?string $name = null, array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null, bool $shouldGuessMissingParameters = false, ?string $configuration = null)
```

**Parametri array:**
- `array $parameters = []`

---

## `Modules/Activity/tests/Fixtures/ListLogActivitiesActionTestResourceSimple.php`

Namespace: `Modules\Activity\Tests\Fixtures`

### `public static function getUrl(...)` — class `ListLogActivitiesActionTestResourceSimple` (linea 20)

```php
function getUrl(?string $name = null, array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null, bool $shouldGuessMissingParameters = false, ?string $configuration = null)
```

**Parametri array:**
- `array $parameters = []`

---

## `Modules/Activity/tests/PestStubs.php`

### `function livewire(...)` — _(funzione globale / closure con nome)_ (linea 33)

```php
function livewire(string $component, array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Activity/tests/Unit/Actions/ActivityLifecycleActionsTest.php`

Namespace: `Modules\Activity\Tests\Unit\Actions`

### `function createActivityLifecycleUser(...)` — class `createActivityLifecycleUser` (linea 21)

```php
function createActivityLifecycleUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Activity/tests/fixtures/ListLogActivitiesActionTestResource.php`

Namespace: `Modules\Activity\Tests\Fixtures`

### `public static function getUrl(...)` — class `ListLogActivitiesActionTestResource` (linea 14)

```php
function getUrl(string $name, array $parameters = [])
```

**Parametri array:**
- `array $parameters = []`

---

## `Modules/Activity/tests/fixtures/ListLogActivitiesActionTestResourceSimple.php`

Namespace: `Modules\Activity\Tests\Fixtures`

### `public static function getUrl(...)` — class `ListLogActivitiesActionTestResourceSimple` (linea 14)

```php
function getUrl(string $name, array $parameters = [])
```

**Parametri array:**
- `array $parameters = []`

