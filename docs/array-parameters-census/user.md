# Modulo User — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **178**

---

## `Modules/User/app/Actions/Activity/LogRegistrationAction.php`

Namespace: `Modules\User\Actions\Activity`

### `public function execute(...)` — class `LogRegistrationAction` (linea 19)

```php
function execute(User $user, array $properties = [])
```

**Parametri array:**
- `array $properties = []`

---

## `Modules/User/app/Actions/Socialite/ResolveUserNameFieldsFromSocialiteAction.php`

Namespace: `Modules\User\Actions\Socialite`

### `private function normalizeRawUserArray(...)` — class `ResolveUserNameFieldsFromSocialiteAction` (linea 154)

```php
function normalizeRawUserArray(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Actions/User/CreateUserAction.php`

Namespace: `Modules\User\Actions\User`

### `public function execute(...)` — class `CreateUserAction` (linea 19)

```php
function execute(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Actions/User/UpdateUserAction.php`

Namespace: `Modules\User\Actions\User`

### `public function execute(...)` — class `UpdateUserAction` (linea 29)

```php
function execute(Model $user, array $data)
```

**Parametri array:**
- `array $data`

### `protected function prepareUpdateData(...)` — class `UpdateUserAction` (linea 86)

```php
function prepareUpdateData(array $data, Hasher $hasher, SafeStringCastAction $safeStringCast)
```

**Parametri array:**
- `array $data`

### `protected function validateUpdateData(...)` — class `UpdateUserAction` (linea 127)

```php
function validateUpdateData(Model $user, array $data, ValidationException $validationException)
```

**Parametri array:**
- `array $data`

### `protected function afterUpdate(...)` — class `UpdateUserAction` (linea 152)

```php
function afterUpdate(Model $user, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Contracts/CreatesNewUsers.php`

Namespace: `Modules\User\Contracts`

### `public function create(...)` — interface `CreatesNewUsers` (linea 20)

```php
function create(array $input)
```

**Parametri array:**
- `array $input`

---

## `Modules/User/app/Contracts/CreatesTeams.php`

Namespace: `Modules\User\Contracts`

### `public function create(...)` — interface `CreatesTeams` (linea 18)

```php
function create(UserContract $userContract, array $input)
```

**Parametri array:**
- `array $input`

---

## `Modules/User/app/Contracts/PassportHasApiTokensContract.php`

Namespace: `Modules\User\Contracts`

### `public function createToken(...)` — interface `PassportHasApiTokensContract` (linea 53)

```php
function createToken(string $name, array $scopes = [])
```

**Parametri array:**
- `array $scopes = []`

---

## `Modules/User/app/Contracts/ResetsUserPasswords.php`

Namespace: `Modules\User\Contracts`

### `public function reset(...)` — interface `ResetsUserPasswords` (linea 20)

```php
function reset(UserContract $userContract, array $input)
```

**Parametri array:**
- `array $input`

---

## `Modules/User/app/Contracts/UpdatesTeamNames.php`

Namespace: `Modules\User\Contracts`

### `public function update(...)` — interface `UpdatesTeamNames` (linea 20)

```php
function update(UserContract $userContract, TeamContract $teamContract, array $input)
```

**Parametri array:**
- `array $input`

---

## `Modules/User/app/Contracts/UpdatesUserPasswords.php`

Namespace: `Modules\User\Contracts`

### `public function update(...)` — interface `UpdatesUserPasswords` (linea 20)

```php
function update(UserContract $userContract, array $input)
```

**Parametri array:**
- `array $input`

---

## `Modules/User/app/Contracts/UpdatesUserProfileInformation.php`

Namespace: `Modules\User\Contracts`

### `public function update(...)` — interface `UpdatesUserProfileInformation` (linea 17)

```php
function update(UserContract $userContract, array $input)
```

**Parametri array:**
- `array $input`

---

## `Modules/User/app/Filament/Clusters/Appearance/Pages/Alignment.php`

Namespace: `Modules\User\Filament\Clusters\Appearance\Pages`

### `protected function handleRecordUpdate(...)` — class `Alignment` (linea 111)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Clusters/Appearance/Pages/Background.php`

Namespace: `Modules\User\Filament\Clusters\Appearance\Pages`

### `protected function handleRecordUpdate(...)` — class `Background` (linea 104)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Clusters/Appearance/Pages/Colors.php`

Namespace: `Modules\User\Filament\Clusters\Appearance\Pages`

### `protected function handleRecordUpdate(...)` — class `Colors` (linea 100)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Clusters/Appearance/Pages/CustomCss.php`

Namespace: `Modules\User\Filament\Clusters\Appearance\Pages`

### `protected function handleRecordUpdate(...)` — class `CustomCss` (linea 96)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Clusters/Appearance/Pages/Favicon.php`

Namespace: `Modules\User\Filament\Clusters\Appearance\Pages`

### `protected function handleRecordUpdate(...)` — class `Favicon` (linea 96)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Clusters/Appearance/Pages/Logo.php`

Namespace: `Modules\User\Filament\Clusters\Appearance\Pages`

### `protected function handleRecordUpdate(...)` — class `Logo` (linea 94)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Pages/MyProfilePage.php`

Namespace: `Modules\User\Filament\Pages`

### `protected function handleRecordUpdate(...)` — class `MyProfilePage` (linea 276)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Pages/Password.php`

Namespace: `Modules\User\Filament\Pages`

### `protected function handleRecordUpdate(...)` — class `Password` (linea 134)

```php
function handleRecordUpdate(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Pages/SocialiteProviderSettingsPage.php`

Namespace: `Modules\User\Filament\Pages`

### `private function writeSocialiteConfig(...)` — class `SocialiteProviderSettingsPage` (linea 270)

```php
function writeSocialiteConfig(array $config)
```

**Parametri array:**
- `array $config`

### `private function updateSocialProviderActiveStates(...)` — class `SocialiteProviderSettingsPage` (linea 295)

```php
function updateSocialProviderActiveStates(array $config)
```

**Parametri array:**
- `array $config`

### `private function configStringList(...)` — class `SocialiteProviderSettingsPage` (linea 372)

```php
function configStringList(string $key, array $default)
```

**Parametri array:**
- `array $default`

---

## `Modules/User/app/Filament/Pages/Tenancy/RegisterTeam.php`

Namespace: `Modules\User\Filament\Pages\Tenancy`

### `protected function handleRegistration(...)` — class `RegisterTeam` (linea 34)

```php
function handleRegistration(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Pages/Tenancy/RegisterTenant.php`

Namespace: `Modules\User\Filament\Pages\Tenancy`

### `protected function handleRegistration(...)` — class `RegisterTenant` (linea 72)

```php
function handleRegistration(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Resources/BaseProfileResource/Pages/CreateProfile.php`

Namespace: `Modules\User\Filament\Resources\BaseProfileResource\Pages`

### `public function mutateFormDataBeforeCreate(...)` — class `mutateFormDataBeforeCreate` (linea 16)

```php
function mutateFormDataBeforeCreate(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Resources/RoleResource/Pages/CreateRole.php`

Namespace: `Modules\User\Filament\Resources\RoleResource\Pages`

### `protected function mutateFormDataBeforeCreate(...)` — class `mutateFormDataBeforeCreate` (linea 20)

```php
function mutateFormDataBeforeCreate(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Resources/RoleResource/Pages/EditRole.php`

Namespace: `Modules\User\Filament\Resources\RoleResource\Pages`

### `protected function mutateFormDataBeforeSave(...)` — class `EditRole` (linea 51)

```php
function mutateFormDataBeforeSave(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Resources/TeamResource/Pages/CreateTeam.php`

Namespace: `Modules\User\Filament\Resources\TeamResource\Pages`

### `protected function mutateFormDataBeforeCreate(...)` — class `mutateFormDataBeforeCreate` (linea 15)

```php
function mutateFormDataBeforeCreate(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Resources/TenantResource/Pages/CreateTenant.php`

Namespace: `Modules\User\Filament\Resources\TenantResource\Pages`

### `protected function handleRecordCreation(...)` — class `handleRecordCreation` (linea 22)

```php
function handleRecordCreation(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Resources/UserResource/Pages/BaseEditUser.php`

Namespace: `Modules\User\Filament\Resources\UserResource\Pages`

### `protected function mutateFormDataBeforeSave(...)` — class `mutateFormDataBeforeSave` (linea 28)

```php
function mutateFormDataBeforeSave(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Filament/Resources/UserResource/Pages/EditUser.php`

Namespace: `Modules\User\Filament\Resources\UserResource\Pages`

### `protected function mutateFormDataBeforeSave(...)` — class `mutateFormDataBeforeSave` (linea 26)

```php
function mutateFormDataBeforeSave(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/User/app/Models/BaseUser.php`

Namespace: `Modules\User\Models`

### `public function __construct(...)` — class `BaseUser` (linea 216)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/app/Models/DeviceProfile.php`

Namespace: `Modules\User\Models`

### `public function __construct(...)` — class `DeviceProfile` (linea 39)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/app/Models/ModelHasRole.php`

Namespace: `Modules\User\Models`

### `public function __construct(...)` — class `ModelHasRole` (linea 68)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/app/Models/SsoProvider.php`

Namespace: `Modules\User\Models`

### `public function mapRoles(...)` — class `SsoProvider` (linea 124)

```php
function mapRoles(array $samlRoles)
```

**Parametri array:**
- `array $samlRoles`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_125f1e1505.php`

### `public function __construct(...)` — class `Container_125f1e1505` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6861)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6919)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 7031)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 7071)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_27df4e40e3.php`

### `public function __construct(...)` — class `Container_27df4e40e3` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6009)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6067)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6179)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6219)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_2a4d2f27a9.php`

### `public function __construct(...)` — class `Container_2a4d2f27a9` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6008)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6066)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6178)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6218)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_39fd3660ce.php`

### `public function __construct(...)` — class `Container_39fd3660ce` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6902)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6960)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 7072)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 7112)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_405ffe3007.php`

### `public function __construct(...)` — class `Container_405ffe3007` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6006)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6064)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6176)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6216)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_4376600dda.php`

### `public function __construct(...)` — class `Container_4376600dda` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6903)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6961)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 7073)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 7113)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_4b82cf859e.php`

### `public function __construct(...)` — class `Container_4b82cf859e` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6860)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6918)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 7030)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 7070)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_6022aa32fc.php`

### `public function __construct(...)` — class `Container_6022aa32fc` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6008)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6066)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6178)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6218)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_ab2d14dc79.php`

### `public function __construct(...)` — class `Container_ab2d14dc79` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6009)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6067)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6179)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6219)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_c70092225b.php`

### `public function __construct(...)` — class `Container_c70092225b` (linea 2277)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 5644)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 5702)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 5814)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 5854)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_cea6261e32.php`

### `public function __construct(...)` — class `Container_cea6261e32` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6903)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6961)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 7073)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 7113)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_d8da2d2dd1.php`

### `public function __construct(...)` — class `Container_d8da2d2dd1` (linea 2277)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 5644)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 5702)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 5814)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 5854)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_db97c9626c.php`

### `public function __construct(...)` — class `Container_db97c9626c` (linea 2277)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 5644)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 5702)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 5814)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 5854)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_e53e4237eb.php`

### `public function __construct(...)` — class `Container_e53e4237eb` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6009)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6067)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6179)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 6219)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/build/phpstan/cache/nette.configurator/Container_f95c3b2b00.php`

### `public function __construct(...)` — class `Container_f95c3b2b00` (linea 2634)

```php
function __construct(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public function create(...)` — class `anonymous` (linea 6860)

```php
function create(PHPStan\BetterReflection\Reflection\Adapter\ReflectionFunction $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, ?string $filename, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, bool $acceptsNamedArguments, ?string $phpDocComment, array $phpDocParameterOutTypes, array $phpDocParameterImmediatelyInvokedCallable, array $phpDocParameterClosureThisTypes, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $phpDocParameterImmediatelyInvokedCallable`
- `array $phpDocParameterClosureThisTypes`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 6918)

```php
function create(PHPStan\Reflection\ClassReflection $declaringClass, ?PHPStan\Reflection\ClassReflection $declaringTrait, PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod $reflection, PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap, array $phpDocParameterTypes, ?PHPStan\Type\Type $phpDocReturnType, ?PHPStan\Type\Type $phpDocThrowType, ?PHPStan\PhpDoc\ResolvedPhpDocBlock $resolvedPhpDocBlock, ?string $deprecatedDescription, bool $isDeprecated, bool $isInternal, bool $isFinal, ?bool $isPure, PHPStan\Reflection\Assertions $asserts, ?PHPStan\Type\Type $selfOutType, ?string $phpDocComment, array $phpDocParameterOutTypes, array $immediatelyInvokedCallableParameters, array $phpDocClosureThisTypeParameters, bool $acceptsNamedArguments, array $attributes)
```

**Parametri array:**
- `array $phpDocParameterTypes`
- `array $phpDocParameterOutTypes`
- `array $immediatelyInvokedCallableParameters`
- `array $phpDocClosureThisTypeParameters`
- `array $attributes`

### `public function create(...)` — class `anonymous` (linea 7030)

```php
function create(array $analyseExcludes)
```

**Parametri array:**
- `array $analyseExcludes`

### `public function create(...)` — class `anonymous` (linea 7070)

```php
function create(array $fileReplacements)
```

**Parametri array:**
- `array $fileReplacements`

---

## `Modules/User/database/factories/OauthAccessTokenFactory.php`

Namespace: `Modules\User\Database\Factories`

### `public function withScopes(...)` — class `OauthAccessTokenFactory` (linea 93)

```php
function withScopes(array $scopes)
```

**Parametri array:**
- `array $scopes`

---

## `Modules/User/database/factories/OauthClientFactory.php`

Namespace: `Modules\User\Database\Factories`

### `public function withScopes(...)` — class `OauthClientFactory` (linea 127)

```php
function withScopes(array $scopes)
```

**Parametri array:**
- `array $scopes`

---

## `Modules/User/database/factories/OauthTokenFactory.php`

Namespace: `Modules\User\Database\Factories`

### `public function withScopes(...)` — class `OauthTokenFactory` (linea 118)

```php
function withScopes(array $scopes)
```

**Parametri array:**
- `array $scopes`

---

## `Modules/User/database/seeders/RolesSeeder.php`

Namespace: `Modules\User\Database\Seeders`

### `private function displayResults(...)` — class `RolesSeeder` (linea 52)

```php
function displayResults(array $roles)
```

**Parametri array:**
- `array $roles`

---

## `Modules/User/tests/Support/helpers-core.php`

### `function createUser(...)` — _(funzione globale / closure con nome)_ (linea 16)

```php
function createUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeUser(...)` — _(funzione globale / closure con nome)_ (linea 30)

```php
function makeUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTeam(...)` — _(funzione globale / closure con nome)_ (linea 44)

```php
function createTeam(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTestUser(...)` — _(funzione globale / closure con nome)_ (linea 54)

```php
function createTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Support/helpers-extended.php`

### `function attachTeamMember(...)` — _(funzione globale / closure con nome)_ (linea 36)

```php
function attachTeamMember(Team $team, User $user, array $pivot = [])
```

**Parametri array:**
- `array $pivot = []`

### `function createProfile(...)` — _(funzione globale / closure con nome)_ (linea 92)

```php
function createProfile(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function mockSocialiteOauthUser(...)` — _(funzione globale / closure con nome)_ (linea 121)

```php
function mockSocialiteOauthUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function userResourceFindComponentByName(...)` — _(funzione globale / closure con nome)_ (linea 244)

```php
function userResourceFindComponentByName(array $components, string $name)
```

**Parametri array:**
- `array $components`

### `function stubUser(...)` — _(funzione globale / closure con nome)_ (linea 262)

```php
function stubUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function hasTeamsCurrentCreateUser(...)` — _(funzione globale / closure con nome)_ (linea 270)

```php
function hasTeamsCurrentCreateUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function hasTeamsCurrentCreateTeam(...)` — _(funzione globale / closure con nome)_ (linea 278)

```php
function hasTeamsCurrentCreateTeam(User $user, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function enableTwoFactorForUser(...)` — _(funzione globale / closure con nome)_ (linea 291)

```php
function enableTwoFactorForUser(User $user, Google2FA $google2fa, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Support/helpers.php`

### `function createUser(...)` — _(funzione globale / closure con nome)_ (linea 24)

```php
function createUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeUser(...)` — _(funzione globale / closure con nome)_ (linea 38)

```php
function makeUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTeam(...)` — _(funzione globale / closure con nome)_ (linea 52)

```php
function createTeam(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTestUser(...)` — _(funzione globale / closure con nome)_ (linea 62)

```php
function createTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function attachTeamMember(...)` — _(funzione globale / closure con nome)_ (linea 155)

```php
function attachTeamMember(Team $team, User $user, array $pivot = [])
```

**Parametri array:**
- `array $pivot = []`

### `function createProfile(...)` — _(funzione globale / closure con nome)_ (linea 211)

```php
function createProfile(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function mockSocialiteOauthUser(...)` — _(funzione globale / closure con nome)_ (linea 240)

```php
function mockSocialiteOauthUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function userResourceFindComponentByName(...)` — _(funzione globale / closure con nome)_ (linea 363)

```php
function userResourceFindComponentByName(array $components, string $name)
```

**Parametri array:**
- `array $components`

### `function stubUser(...)` — _(funzione globale / closure con nome)_ (linea 381)

```php
function stubUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function hasTeamsCurrentCreateUser(...)` — _(funzione globale / closure con nome)_ (linea 389)

```php
function hasTeamsCurrentCreateUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function hasTeamsCurrentCreateTeam(...)` — _(funzione globale / closure con nome)_ (linea 397)

```php
function hasTeamsCurrentCreateTeam(User $user, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function enableTwoFactorForUser(...)` — _(funzione globale / closure con nome)_ (linea 410)

```php
function enableTwoFactorForUser(User $user, Google2FA $google2fa, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Support/team-management-business-helpers.php`

### `function teamMgmtBizCreateUser(...)` — _(funzione globale / closure con nome)_ (linea 36)

```php
function teamMgmtBizCreateUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function teamMgmtBizCreateTeam(...)` — _(funzione globale / closure con nome)_ (linea 49)

```php
function teamMgmtBizCreateTeam(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function teamMgmtBizAssertDatabaseHas(...)` — _(funzione globale / closure con nome)_ (linea 60)

```php
function teamMgmtBizAssertDatabaseHas(string $table, array $where)
```

**Parametri array:**
- `array $where`

### `function teamMgmtBizAssertDatabaseMissing(...)` — _(funzione globale / closure con nome)_ (linea 73)

```php
function teamMgmtBizAssertDatabaseMissing(string $table, array $where)
```

**Parametri array:**
- `array $where`

### `function teamMgmtBizAttachMember(...)` — _(funzione globale / closure con nome)_ (linea 86)

```php
function teamMgmtBizAttachMember(Team $team, User $user, array $pivot = [])
```

**Parametri array:**
- `array $pivot = []`

### `function teamMgmtBizCreateInvitation(...)` — _(funzione globale / closure con nome)_ (linea 126)

```php
function teamMgmtBizCreateInvitation(Team $team, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Support/team-management-helpers.php`

### `function teamMgmtCreateUser(...)` — _(funzione globale / closure con nome)_ (linea 34)

```php
function teamMgmtCreateUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function teamMgmtCreateTeam(...)` — _(funzione globale / closure con nome)_ (linea 47)

```php
function teamMgmtCreateTeam(User $owner, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function teamMgmtAttachMember(...)` — _(funzione globale / closure con nome)_ (linea 70)

```php
function teamMgmtAttachMember(Team $team, User $user, array $pivot = [])
```

**Parametri array:**
- `array $pivot = []`

### `function teamMgmtCreateInvitation(...)` — _(funzione globale / closure con nome)_ (linea 114)

```php
function teamMgmtCreateInvitation(Team $team, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/TestCase.php`

Namespace: `Modules\User\Tests`

### `public static function createTestUser(...)` — class `TestCase` (linea 396)

```php
function createTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `public function oauthClientTestPersistedClient(...)` — class `TestCase` (linea 418)

```php
function oauthClientTestPersistedClient(array $overrides = [])
```

**Parametri array:**
- `array $overrides = []`

### `public function attachTeamMember(...)` — class `TestCase` (linea 452)

```php
function attachTeamMember(Team $team, User $user, array $pivot = [])
```

**Parametri array:**
- `array $pivot = []`

### `public function assertDatabaseHasRow(...)` — class `TestCase` (linea 496)

```php
function assertDatabaseHasRow(string $table, array $data, ?string $connection = 'user')
```

**Parametri array:**
- `array $data`

### `public function assertDatabaseMissingRow(...)` — class `TestCase` (linea 504)

```php
function assertDatabaseMissingRow(string $table, array $data, ?string $connection = 'user')
```

**Parametri array:**
- `array $data`

### `public function createTeamInvitationRecord(...)` — class `TestCase` (linea 546)

```php
function createTeamInvitationRecord(Team $team, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/Actions/GetCurrentDeviceActionTest.php`

### `function assertDeviceMatches(...)` — class `assertDeviceMatches` (linea 15)

```php
function assertDeviceMatches(Device $device, array $expected)
```

**Parametri array:**
- `array $expected`

---

## `Modules/User/tests/Unit/CurrentTeamInfiniteLoopFixTest.php`

### `function currentTeamFixCreateUser(...)` — class `currentTeamFixCreateUser` (linea 17)

```php
function currentTeamFixCreateUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function currentTeamFixCreateTeam(...)` — _(funzione globale / closure con nome)_ (linea 28)

```php
function currentTeamFixCreateTeam(User $user, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/HasTeamsTraitPestTest.php`

### `function pestHasTeamsCreateTestUser(...)` — class `pestHasTeamsCreateTestUser` (linea 24)

```php
function pestHasTeamsCreateTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function pestHasTeamsAttachMember(...)` — _(funzione globale / closure con nome)_ (linea 54)

```php
function pestHasTeamsAttachMember(Team $team, User $user, array $pivot = [])
```

**Parametri array:**
- `array $pivot = []`

---

## `Modules/User/tests/Unit/HasTeamsTraitTest.php`

### `function hasTeamsCreateTestUser(...)` — class `hasTeamsCreateTestUser` (linea 24)

```php
function hasTeamsCreateTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function hasTeamsAttachMember(...)` — _(funzione globale / closure con nome)_ (linea 54)

```php
function hasTeamsAttachMember(Team $team, User $user, array $pivot = [])
```

**Parametri array:**
- `array $pivot = []`

---

## `Modules/User/tests/Unit/Models/DeviceTest.php`

### `function modelsDeviceCreate(...)` — class `modelsDeviceCreate` (linea 16)

```php
function modelsDeviceCreate(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function modelsDeviceAssertInDatabase(...)` — _(funzione globale / closure con nome)_ (linea 24)

```php
function modelsDeviceAssertInDatabase(string $id, array $where)
```

**Parametri array:**
- `array $where`

---

## `Modules/User/tests/Unit/Models/PermissionTest.php`

### `function modelsPermissionCreate(...)` — class `modelsPermissionCreate` (linea 15)

```php
function modelsPermissionCreate(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/Models/ProfileTest.php`

### `function modelsProfileCreate(...)` — class `modelsProfileCreate` (linea 15)

```php
function modelsProfileCreate(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function modelsProfileAssertInDatabase(...)` — _(funzione globale / closure con nome)_ (linea 43)

```php
function modelsProfileAssertInDatabase(array $where)
```

**Parametri array:**
- `array $where`

---

## `Modules/User/tests/Unit/Models/RoleTest.php`

### `function modelsRoleCreate(...)` — class `modelsRoleCreate` (linea 16)

```php
function modelsRoleCreate(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/Models/TeamTest.php`

### `function modelsTeamCreateUser(...)` — class `modelsTeamCreateUser` (linea 18)

```php
function modelsTeamCreateUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/Models/UserTest.php`

### `function modelsUserCreate(...)` — class `modelsUserCreate` (linea 18)

```php
function modelsUserCreate(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/PermissionTest.php`

### `function createTestPermission(...)` — class `createTestPermission` (linea 17)

```php
function createTestPermission(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTestRoleForPermission(...)` — _(funzione globale / closure con nome)_ (linea 28)

```php
function createTestRoleForPermission(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/RoleTest.php`

### `function createTestRole(...)` — class `createTestRole` (linea 17)

```php
function createTestRole(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTestPermissionForRole(...)` — _(funzione globale / closure con nome)_ (linea 28)

```php
function createTestPermissionForRole(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/User/tests/Unit/TenantTest.php`

### `function createPersistedTenant(...)` — class `createPersistedTenant` (linea 23)

```php
function createPersistedTenant(array $overrides = [])
```

**Parametri array:**
- `array $overrides = []`

---

## `Modules/User/tests/Unit/Traits/HasAuthenticationLogTraitTest.php`

Namespace: `Modules\User\Tests\Unit\Traits`

### `function makeAuthenticationLogFor(...)` — class `makeAuthenticationLogFor` (linea 16)

```php
function makeAuthenticationLogFor(User $user, array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

