<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use BladeUI\Icons\Factory as IconFactory;
<<<<<<< HEAD
=======
use Exception;
>>>>>>> 6ed19256f (.)
use Illuminate\Support\Facades\App;

/**
 * Verifica l'esistenza di un SVG registrato utilizzando BladeUI Icons.
 *
 * @method bool execute(string $svgName)
 */
class SvgExistsAction
{
    /**
     * Verifica se l'SVG esiste nei set di icone registrati.
     *
<<<<<<< HEAD
     * @param string $svgName Il nome dell'SVG da verificare (es: 'heroicon-o-user')
=======
     * @param  string  $svgName  Il nome dell'SVG da verificare (es: 'heroicon-o-user')
>>>>>>> 6ed19256f (.)
     *
     * @return bool true se l'SVG esiste, false altrimenti
     */
    public function execute(string $svgName): bool
    {
        if (empty($svgName)) {
            return false;
        }

<<<<<<< HEAD
        // BladeUI Kit icon check: only for standard sets (heroicon-*, etc.)
        // Geo SVGs use "geo-" prefix (e.g., "geo-magnifying-glass") — served via <img> or Lit JS, not BladeUI Kit
        if (str_starts_with($svgName, 'geo-')) {
            // Geo SVGs are in Modules/Geo/resources/svg/ — check file existence directly
            $relativePath = str_replace('geo-', '', $svgName);
            $svgPath = base_path('Modules/Geo/resources/svg/'.$relativePath.'.svg');

            return file_exists($svgPath);
        }

=======
>>>>>>> 6ed19256f (.)
        /** @var IconFactory $iconsFactory */
        $iconsFactory = App::make(IconFactory::class);
        try {
            $iconsFactory->svg($svgName);
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (Exception $e) {
>>>>>>> 6ed19256f (.)
            return false;
        }

        return true;
    }
}
