<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Panel;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> dev
use Filament\Panel;
use Illuminate\Support\Facades\Log;
use Modules\Xot\Datas\MetatagData;
use Spatie\QueueableAction\QueueableAction;

class ApplyMetatagToPanelAction
{
    use QueueableAction;

    public function execute(Panel &$panel): Panel
    {
        try {
            $metatag = MetatagData::make();

            return $panel
                // @phpstan-ignore argument.type
<<<<<<< HEAD
                ->colors($metatag->getColors())
=======
                ->colors($metatag->getAllColors())
>>>>>>> dev
                ->brandLogo($metatag->getBrandLogo())
                ->brandName($metatag->getBrandName())
                ->darkModeBrandLogo($metatag->getDarkModeBrandLogo())
                ->brandLogoHeight($metatag->getBrandLogoHeight())
                ->favicon($metatag->getFavicon());
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> dev
            // Log l'errore ma non bloccare l'applicazione
            Log::error('Error applying metatag to panel: '.$e->getMessage());

            return $panel;
        }
    }
}
