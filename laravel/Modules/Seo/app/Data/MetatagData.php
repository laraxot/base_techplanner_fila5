<?php

declare(strict_types=1);

namespace Modules\Seo\Data;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use DateTimeInterface;
use Illuminate\Support\Arr;
use Livewire\Wireable;
<<<<<<< HEAD
=======
use DateTimeInterface;
use Illuminate\Support\Arr;
use Livewire\Wireable;
>>>>>>> c101b34 (.)
=======
use DateTimeInterface;
use Illuminate\Support\Arr;
use Livewire\Wireable;
>>>>>>> d0f51b6 (.)
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class MetatagData extends Data implements Wireable
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> a771e9c (.)
use BadMethodCallException;
use DateTimeInterface;
use Illuminate\Support\Arr;
use Livewire\Wireable;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> d20252d (.)
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
use DateTimeInterface;
use Illuminate\Support\Arr;
use Livewire\Wireable;
>>>>>>> fc52fe0 (.)
=======
>>>>>>> a771e9c (.)
use Modules\Seo\Interfaces\MetatagDataInterface;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class MetatagData extends Data implements MetatagDataInterface, Wireable
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
=======
>>>>>>> a771e9c (.)
{
    use WireableData;

    /**
     * The raw data.
     *
     * @var array<string, mixed>
     */
    protected array $data;

    /**
     * Create a new metatag data instance.
     *
     * @param  array<string, mixed>  $data
     * @return void
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the title.
     */
    public function getTitle(): string
    {
        $value = $this->data['title'] ?? '';

        return is_string($value) ? $value : '';
    }

    /**
     * Get the description.
     */
    public function getDescription(): string
    {
        $value = $this->data['description'] ?? '';

        return is_string($value) ? $value : '';
    }

    /**
     * Get the keywords.
     */
    public function getKeywords(): string
    {
        $value = $this->data['keywords'] ?? '';

        return is_string($value) ? $value : '';
    }

    /**
     * Get the colors.
     *
     * @return array<string, string>
     */
    public function getColors(): array
    {
        $default = [
            'primary' => '#3490dc',
            'secondary' => '#6574cd',
            'accent' => '#9561e2',
        ];

        $colorsData = $this->data['colors'] ?? null;

        if (! is_array($colorsData)) {
            return $default;
        }

        // Ensure all values are strings
        $result = [];

        foreach ($colorsData as $key => $value) {
            $strKey = is_string($key) ? $key : (string) $key;
            $strValue = is_string($value) ? $value : '';
            $result[$strKey] = $strValue;
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $result ? $result : $default;
=======
        return $result ?: $default;
>>>>>>> d20252d (.)
=======
        return $result ?: $default;
>>>>>>> dbf8b8d (.)
=======
        return $result ?: $default;
>>>>>>> 77e0353 (.)
=======
        return $result ? $result : $default;
>>>>>>> fc52fe0 (.)
=======
        return $result ? $result : $default;
>>>>>>> c101b34 (.)
=======
        return $result ? $result : $default;
>>>>>>> d0f51b6 (.)
=======
        return $result ?: $default;
>>>>>>> a771e9c (.)
    }

    /**
     * Get the robots.
     */
    public function getRobots(): string
    {
        $value = $this->data['robots'] ?? 'index, follow';

        return is_string($value) ? $value : 'index, follow';
    }

    /**
     * Get the canonical URL.
     */
    public function getCanonical(): ?string
    {
        $value = $this->data['canonical'] ?? null;

        return is_string($value) ? $value : null;
    }

    /**
     * Get the image URL.
     */
    public function getImage(): ?string
    {
        $value = $this->data['image'] ?? null;

        return is_string($value) ? $value : null;
    }

    /**
     * Get the locale.
     */
    public function getLocale(): string
    {
        $value = $this->data['locale'] ?? app()->getLocale();
        $defaultValue = app()->getLocale();

        if (is_string($value)) {
            return $value;
        }

        return is_string($defaultValue) ? $defaultValue : 'en';
    }

    /**
     * Get the type.
     */
    public function getType(): string
    {
        $value = $this->data['type'] ?? 'website';

        return is_string($value) ? $value : 'website';
    }

    /**
     * Get the site name.
     */
    public function getSiteName(): string
    {
        $value = $this->data['site_name'] ?? config('app.name');
        $configValue = config('app.name');
        $defaultValue = is_string($configValue) ? $configValue : 'Application';

        return is_string($value) ? $value : $defaultValue;
    }

    /**
     * Get the URL.
     */
    public function getUrl(): ?string
    {
        $value = $this->data['url'] ?? null;

        if (is_string($value)) {
            return $value;
        }

        $current = url()->current();

        return is_string($current) ? $current : null;
    }

    /**
     * Get the author.
     */
    public function getAuthor(): ?string
    {
        $value = $this->data['author'] ?? null;

        return is_string($value) ? $value : null;
    }

    /**
     * Get the published time.
     */
    public function getPublishedTime(): ?DateTimeInterface
    {
        $value = $this->data['published_time'] ?? null;

        return $value instanceof DateTimeInterface ? $value : null;
    }

    /**
     * Get the modified time.
     */
    public function getModifiedTime(): ?DateTimeInterface
    {
        $value = $this->data['modified_time'] ?? null;

        return $value instanceof DateTimeInterface ? $value : null;
    }

    /**
     * Get extra metadata.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     */
    public function get(string $key, mixed $default = null): mixed
=======
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> a771e9c (.)
     *
     * @param  mixed  $default
     * @return mixed
     */
    public function get(string $key, $default = null)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> d20252d (.)
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
     */
    public function get(string $key, mixed $default = null): mixed
>>>>>>> fc52fe0 (.)
=======
     */
    public function get(string $key, mixed $default = null): mixed
>>>>>>> c101b34 (.)
=======
     */
    public function get(string $key, mixed $default = null): mixed
>>>>>>> d0f51b6 (.)
=======
>>>>>>> a771e9c (.)
    {
        return Arr::get($this->data, $key, $default);
    }

    /**
     * Check if the metadata has a specific key.
     */
    public function has(string $key): bool
    {
        return Arr::has($this->data, $key);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> a771e9c (.)
     * Handle dynamic method calls.
     *
     * @param  array<int, mixed>  $parameters
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        if (strpos($method, 'get') === 0) {
            $key = lcfirst(substr($method, 3));

            return $this->get($key, $parameters[0] ?? null);
        }

        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }

    /**
<<<<<<< HEAD
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
=======
>>>>>>> a771e9c (.)
     * Convert the object to its array representation.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * Convert the data for Livewire.
     *
     * @return array<string, mixed>
     */
    public function toLivewire(): array
    {
        return $this->data;
    }

    /**
     * Create a new instance from Livewire data.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     */
    public static function fromLivewire(mixed $value): self
=======
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
>>>>>>> a771e9c (.)
     *
     * @param  mixed  $value
     */
    public static function fromLivewire($value): self
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> d20252d (.)
=======
>>>>>>> dbf8b8d (.)
=======
>>>>>>> 77e0353 (.)
=======
     */
    public static function fromLivewire(mixed $value): self
>>>>>>> fc52fe0 (.)
=======
     */
    public static function fromLivewire(mixed $value): self
>>>>>>> c101b34 (.)
=======
     */
    public static function fromLivewire(mixed $value): self
>>>>>>> d0f51b6 (.)
=======
>>>>>>> a771e9c (.)
    {
        if (is_array($value)) {
            /** @var array<string, mixed> $typedValue */
            $typedValue = $value;

            return new self($typedValue);
        }

        return new self([]);
    }
}
