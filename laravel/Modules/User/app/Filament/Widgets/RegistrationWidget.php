<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use Webmozart\Assert\Assert;

class RegistrationWidget extends XotBaseSchemaWidget
{
    public string $type = '';

    /** @var class-string */
    public string $resource;

    /** @var class-string<Model> */
    public string $model = Model::class;

    public string $action = '';
=======
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Actions\Cast\SafeArrayCastAction;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

class RegistrationWidget extends XotBaseWidget
{
    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = null;

    public string $type;

    public string $resource;

    public string $model;

    public string $action;
>>>>>>> 8215f950 (.)

    public Model $record;

    protected int|string|array $columnSpan = 'full';

<<<<<<< HEAD
public function mount(string $type = ''): void
    {
        parent::mount();
        $this->type = $type;
        $resourceClass = XotData::make()->getUserResourceClassByType($type);
        Assert::classExists($resourceClass);
        $this->resource = $resourceClass;

        /** @var class-string<Model> $modelClass */
        $modelClass = $resourceClass::getModel();
        Assert::subclassOf($modelClass, Model::class);
        $this->model = $modelClass;
=======
    /**
     * @phpstan-var class-string
     *
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.registration';

    public function mount(string $type, Request $_request): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);

        $modelClass = $this->resource::getModel();
        $this->model = \is_string($modelClass) ? $modelClass : '';
>>>>>>> 8215f950 (.)

        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\RegisterAction')
            ->toString();
        $record = $this->getFormModel();
        $data = $this->getFormFill();

        $this->data = $data;
        $this->form->fill($this->data);
        $this->form->model($record);
        $this->record = $record;
    }

    public function getFormModel(): Model
    {
<<<<<<< HEAD
$user = is_string($email)
            ? $this->model::firstWhere('email', $email)
            : null;
        if (! $user instanceof Model) {
            $model = app($this->model);
            Assert::isInstanceOf($model, Model::class);
=======
        /** @var class-string<Model> $modelClass */
        $modelClass = $this->model;

        $data = request()->all();
        $email = Arr::get($data, 'email');
        $token = Arr::get($data, 'token');

        /** @var Model|null $user */
        $user = $this->model::firstWhere('email', $email);
        if (null === $user) {
            /** @var Model $model */
            $model = app($this->model);
>>>>>>> 8215f950 (.)

            return $model;
        }

<<<<<<< HEAD
$rememberToken = $user->getAttribute('remember_token');
        if (is_string($token) && $token !== '') {
            $user->setAttribute('remember_token', $token);
            $user->save();
=======
        $remember_token = $user->getAttribute('remember_token');
        if ($token) {
            $user->setAttribute('remember_token', $token);
            $user->save();
            $remember_token = $user->getAttribute('remember_token');
        }

        if ($remember_token === $token) {
>>>>>>> 8215f950 (.)
            $this->record = $user;

            return $user;
        }

<<<<<<< HEAD
if (is_string($rememberToken) && $rememberToken === $token) {
            $this->record = $user;

            return $user;
        }

        $model = app($this->model);
=======
        $model = app($modelClass);
>>>>>>> 8215f950 (.)
        Assert::isInstanceOf($model, Model::class);

        return $model;
    }

    /**
     * @return array<string, mixed>
     */
<<<<<<< HEAD
// @override
=======
    #[\Override]
>>>>>>> 8215f950 (.)
    public function getFormFill(): array
    {
        /** @var array<string, mixed> $data */
        $data = SafeArrayCastAction::cast(parent::getFormFill());
        $data['type'] = $this->type;

        return $data;
    }

    /**
     * @return array<int|string, Component>
     */
<<<<<<< HEAD
public function getFormSchema(): array
    {
        return self::normalizeFormSchema($this->resource::getFormSchemaWidget());
=======
    #[\Override]
    public function getFormSchema(): array
    {
        /** @var array<int|string, Component> $schema */
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema);

        return $schema;
>>>>>>> 8215f950 (.)
    }

    /**
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
<<<<<<< HEAD
// @override
    public function register(): RedirectResponse|Redirector
    {
=======
    public function register(): RedirectResponse|Redirector
    {
        $lang = app()->getLocale();

>>>>>>> 8215f950 (.)
        $data = $this->form->getState();
        /** @var array<string, mixed> $initialData */
        $initialData = $this->data ?? [];
        $data = array_merge($initialData, $data);
        $record = $this->record;

<<<<<<< HEAD
$actionInstance = app($this->action);
        if (! \is_object($actionInstance) || ! method_exists($actionInstance, 'execute')) {
            throw new \RuntimeException(\sprintf('Registration action [%s] must expose an execute method.', $this->action));
        }
        \call_user_func([$actionInstance, 'execute'], $record, $data);
=======
        /** @var object{execute: callable} $actionInstance */
        $actionInstance = app($this->action);

        /** @phpstan-ignore method.notFound */
        $user = $actionInstance->execute($record, $data);
>>>>>>> 8215f950 (.)

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type.'_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        // return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }

    /**
     * @return array<int|string, Component>
     */
    private static function normalizeFormSchema(mixed $schema): array
    {
        if (! \is_array($schema)) {
            return [];
        }

        $normalized = [];
        foreach ($schema as $key => $component) {
            if (! $component instanceof Component) {
                return [];
            }

            $normalized[$key] = $component;
        }

        return $normalized;
    }
}
