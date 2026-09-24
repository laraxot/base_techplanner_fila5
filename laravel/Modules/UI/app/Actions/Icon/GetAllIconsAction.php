<?php

declare(strict_types=1);

namespace Modules\UI\Actions\Icon;

use BladeUI\Icons\Factory as IconFactory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
<<<<<<< HEAD
=======
use ReflectionClass;
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

class GetAllIconsAction
{
    use QueueableAction;

    /**
     * @return array<string, array<string, mixed>>
     */
    public function execute(string $_context = 'form'): array
    {
        $iconsFactory = App::make(IconFactory::class);

        // Uso reflection per accedere alle icone in modo sicuro
        try {
<<<<<<< HEAD
            $reflection = new \ReflectionClass($iconsFactory);
=======
            $reflection = new ReflectionClass($iconsFactory);
>>>>>>> laraxot/dev
            $property = $reflection->getProperty('sets');
            $property->setAccessible(true);
            $icons = $property->getValue($iconsFactory);
        } catch (\Exception $e) {
            // Fallback: restituisci array vuoto se non riesci ad accedere
            return [];
        }

        if (! is_iterable($icons)) {
            return [];
        }

        /** @var array<string, array<string, mixed>> $mappedIcons */
        $mappedIcons = [];
        foreach ($icons as $name => $setRaw) {
            if (! is_array($setRaw)) {
                continue;
            }
            if (! is_string($name)) {
                continue;
            }

            /** @var array<string, mixed> $set */
            $set = $setRaw;
            $set['name'] = $name;
            /** @var array<int, string> $iconsList */
            $iconsList = [];

            $paths = $set['paths'] ?? [];
            if (! is_iterable($paths)) {
                $mappedIcons[$name] = $set;

                continue;
            }

            foreach ($paths as $path) {
                if (! is_string($path)) {
                    continue;
                }

<<<<<<< HEAD
                $iconsList = array_merge(
                    $iconsList,
                    $this->collectSvgIconNamesFromPath($path, $set['prefix'] ?? ''),
                );
=======
                foreach (File::allFiles($path) as $file) {
                    // Simply ignore files that aren't SVGs
                    if ($file->getExtension() !== 'svg') {
                        continue;
                    }

                    $pathname = $file->getPathname();
                    $iconName = str($pathname)
                        ->after($path.DIRECTORY_SEPARATOR)
                        ->replace(DIRECTORY_SEPARATOR, '.')
                        ->basename('.svg')
                        ->toString();

                    $prefix = $set['prefix'] ?? '';
                    $prefixString = is_string($prefix) ? $prefix : '';
                    $iconFullName = $prefixString !== '' ? $prefixString.'-'.$iconName : $iconName;
                    $iconsList[] = $iconFullName;
                }
>>>>>>> laraxot/dev
            }
            $set['icons'] = $iconsList;
            $mappedIcons[$name] = $set;
        }

        return $mappedIcons;
    }
<<<<<<< HEAD

    /**
     * @return list<string>
     */
    private function collectSvgIconNamesFromPath(string $path, mixed $prefix): array
    {
        $prefixString = is_string($prefix) ? $prefix : '';
        $iconNames = [];

        foreach (File::allFiles($path) as $file) {
            // Simply ignore files that aren't SVGs
            if ('svg' !== $file->getExtension()) {
                continue;
            }

            $iconName = str($file->getPathname())
                ->after($path.DIRECTORY_SEPARATOR)
                ->replace(DIRECTORY_SEPARATOR, '.')
                ->basename('.svg')
                ->toString();

            $iconNames[] = '' !== $prefixString ? $prefixString.'-'.$iconName : $iconName;
        }

        return $iconNames;
    }
=======
>>>>>>> laraxot/dev
}
