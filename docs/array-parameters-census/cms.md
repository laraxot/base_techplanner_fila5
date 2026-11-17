# Modulo Cms — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **29**

---

## `Modules/Cms/app/Actions/BuildPageSchemaAction.php`

Namespace: `Modules\Cms\Actions`

### `public function execute(...)` — class `BuildPageSchemaAction` (linea 24)

```php
function execute(MetatagData $meta, ?string $routeName, string $path, array $routeParameters = [], ?Authenticatable $user = null,)
```

**Parametri array:**
- `array $routeParameters = []`

### `private function resolvePageType(...)` — class `BuildPageSchemaAction` (linea 68)

```php
function resolvePageType(?string $routeName, string $path, array $routeParameters)
```

**Parametri array:**
- `array $routeParameters`

### `private function resolveProfileMainEntity(...)` — class `BuildPageSchemaAction` (linea 133)

```php
function resolveProfileMainEntity(array $routeParameters, ?Authenticatable $user)
```

**Parametri array:**
- `array $routeParameters`

---

## `Modules/Cms/app/Actions/ResolveBlockQueryAction.php`

Namespace: `Modules\Cms\Actions`

### `public function execute(...)` — class `ResolveBlockQueryAction` (linea 22)

```php
function execute(array $queryConfig)
```

**Parametri array:**
- `array $queryConfig`

---

## `Modules/Cms/app/Actions/ResolveLocalizedBlockDataAction.php`

Namespace: `Modules\Cms\Actions`

### `public function execute(...)` — class `ResolveLocalizedBlockDataAction` (linea 22)

```php
function execute(array $data)
```

**Parametri array:**
- `array $data`

### `private function walkArray(...)` — class `ResolveLocalizedBlockDataAction` (linea 37)

```php
function walkArray(array $value)
```

**Parametri array:**
- `array $value`

---

## `Modules/Cms/app/Datas/BlockData.php`

Namespace: `Modules\Cms\Datas`

### `public function __construct(...)` — class `BlockData` (linea 47)

```php
function __construct(string $type, array $data, ?string $slug = null, bool $active = true)
```

**Parametri array:**
- `array $data`

### `public static function collection(...)` — class `BlockData` (linea 80)

```php
function collection(EloquentCollection|Collection|array $data)
```

**Parametri array:**
- `EloquentCollection|Collection|array $data`

---

## `Modules/Cms/app/Filament/Resources/AttachmentResource/Pages/CreateAttachment.php`

Namespace: `Modules\Cms\Filament\Resources\AttachmentResource\Pages`

### `protected function mutateFormDataBeforeCreate(...)` — class `mutateFormDataBeforeCreate` (linea 15)

```php
function mutateFormDataBeforeCreate(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Cms/app/Filament/Resources/AttachmentResource/Pages/EditAttachment.php`

Namespace: `Modules\Cms\Filament\Resources\AttachmentResource\Pages`

### `protected function mutateFormDataBeforeSave(...)` — class `mutateFormDataBeforeSave` (linea 38)

```php
function mutateFormDataBeforeSave(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Cms/app/Http/Middleware/PageSlugMiddleware.php`

Namespace: `Modules\Cms\Http\Middleware`

### `protected function executeMiddlewareChain(...)` — class `PageSlugMiddleware` (linea 127)

```php
function executeMiddlewareChain(Request $request, array $middlewares, \Closure $finalNext)
```

**Parametri array:**
- `array $middlewares`

---

## `Modules/Cms/app/Models/Traits/HasBlocks.php`

Namespace: `Modules\Cms\Models\Traits`

### `public function compile(...)` — trait `HasBlocks` (linea 88)

```php
function compile(array $blocks)
```

**Parametri array:**
- `array $blocks`

---

## `Modules/Cms/app/View/Components/Page.php`

Namespace: `Modules\Cms\View\Components`

### `public function __construct(...)` — class `Page` (linea 34)

```php
function __construct(string $side = 'content', ?string $slug = null, ?string $type = null, array $data = [],)
```

**Parametri array:**
- `array $data = []`

---

## `Modules/Cms/app/View/Composers/ThemeComposer.php`

Namespace: `Modules\Cms\View\Composers`

### `public function getMenuUrl(...)` — class `ThemeComposer` (linea 43)

```php
function getMenuUrl(array $menu)
```

**Parametri array:**
- `array $menu`

---

## `Modules/Cms/resources/views/Composers/ThemeComposer.php`

Namespace: `Modules\Cms\View\Composers`

### `public function getMenuUrl(...)` — class `ThemeComposer` (linea 43)

```php
function getMenuUrl(array $menu)
```

**Parametri array:**
- `array $menu`

---

## `Modules/Cms/resources/views/composers/ThemeComposer.php`

Namespace: `Modules\Cms\View\Composers`

### `public function getMenuUrl(...)` — class `ThemeComposer` (linea 43)

```php
function getMenuUrl(array $menu)
```

**Parametri array:**
- `array $menu`

---

## `Modules/Cms/tests/Feature/HeaderNavJsonTest.php`

Namespace: `Modules\Cms\Tests\Feature`

### `function primaryNavItems(...)` — _(funzione globale / closure con nome)_ (linea 40)

```php
function primaryNavItems(array $config)
```

**Parametri array:**
- `array $config`

### `function navItemSlugs(...)` — _(funzione globale / closure con nome)_ (linea 68)

```php
function navItemSlugs(array $items)
```

**Parametri array:**
- `array $items`

---

## `Modules/Cms/tests/PestHelpers.php`

### `function cmsCreateTestUser(...)` — _(funzione globale / closure con nome)_ (linea 45)

```php
function cmsCreateTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function cmsCreateUnverifiedUser(...)` — _(funzione globale / closure con nome)_ (linea 53)

```php
function cmsCreateUnverifiedUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function cmsGet(...)` — _(funzione globale / closure con nome)_ (linea 96)

```php
function cmsGet(string $uri, array $headers = [])
```

**Parametri array:**
- `array $headers = []`

### `function cmsGetOrSkipOnServerError(...)` — _(funzione globale / closure con nome)_ (linea 106)

```php
function cmsGetOrSkipOnServerError(string $uri, array $headers = [])
```

**Parametri array:**
- `array $headers = []`

### `function cmsPost(...)` — _(funzione globale / closure con nome)_ (linea 123)

```php
function cmsPost(string $uri, array $data = [], array $headers = [])
```

**Parametri array:**
- `array $data = []`
- `array $headers = []`

### `function cmsActingAsGet(...)` — _(funzione globale / closure con nome)_ (linea 153)

```php
function cmsActingAsGet(Authenticatable $user, string $uri, array $data = [])
```

**Parametri array:**
- `array $data = []`

---

## `Modules/Cms/tests/PestStubs.php`

### `function livewire(...)` — _(funzione globale / closure con nome)_ (linea 28)

```php
function livewire(string $component, array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Cms/tests/TestCase.php`

Namespace: `Modules\Cms\Tests`

### `protected static function createTestUser(...)` — class `TestCase` (linea 99)

```php
function createTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `public static function pestCreateTestUser(...)` — class `TestCase` (linea 110)

```php
function pestCreateTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Cms/tests/Unit/Http/Middleware/PageSlugMiddlewareTest.php`

### `function invokeProtected(...)` — class `invokeProtected` (linea 16)

```php
function invokeProtected(object $object, string $method, array $args = [])
```

**Parametri array:**
- `array $args = []`

---

## `Modules/Cms/tests/Unit/Support/PageSchemaBuilderTest.php`

Namespace: `Modules\Cms\Tests\Unit\Support`

### `function pageSchemaMainEntity(...)` — class `pageSchemaMainEntity` (linea 20)

```php
function pageSchemaMainEntity(array $schema)
```

**Parametri array:**
- `array $schema`

