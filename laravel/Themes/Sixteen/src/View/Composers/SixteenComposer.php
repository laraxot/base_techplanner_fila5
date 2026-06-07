<?php

declare(strict_types=1);

namespace Themes\Sixteen\View\Composers;

use Illuminate\View\View;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
use Themes\Sixteen\Events\BuildingSixteenMenu;
use Themes\Sixteen\Services\MenuBuilder;

/**
 * View Composer per il tema Sixteen
 *
<<<<<<< HEAD
=======
use Themes\Sixteen\Services\MenuBuilder;
use Themes\Sixteen\Events\BuildingSixteenMenu;

/**
 * View Composer per il tema Sixteen
 * 
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
 * Questo composer inietta le configurazioni del tema e i menu
 * costruiti dinamicamente nelle viste del layout
 */
class SixteenComposer
{
    public function __construct(
        protected MenuBuilder $menuBuilder
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> 4b6b99016 (first commit)
=======
    ) {}
>>>>>>> dev

    /**
     * Componi la vista con i dati del tema
     */
    public function compose(View $view): void
    {
        // Configurazioni base del tema
        $config = config('sixteen', []);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev

        // Costruzione dinamica dei menu tramite eventi
        $this->buildMenus();

<<<<<<< HEAD
=======
        
        // Costruzione dinamica dei menu tramite eventi
        $this->buildMenus();
        
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        // Inietta i dati nella vista
        $view->with([
            'sixteenConfig' => $config,
            'slimHeaderMenu' => $this->menuBuilder->getSlimHeader(),
            'headerMenu' => $this->menuBuilder->getHeader(),
            'footerMenu' => $this->menuBuilder->getFooter(),
            'footerBarMenu' => $this->menuBuilder->getFooterBar(),
            'themeInfo' => [
                'name' => 'Sixteen',
                'version' => config('sixteen.version', '1.0.0'),
                'agid_compliant' => true,
                'bootstrap_italia' => true,
                'tailwind_css' => true,
            ],
        ]);
    }

    /**
     * Costruisce i menu usando il sistema di eventi
     */
    protected function buildMenus(): void
    {
        // Inizializza i menu con quelli della configurazione
        $this->initializeMenusFromConfig();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev

        // Lancia eventi per permettere modifiche dinamiche
        $locations = ['slim_header', 'header', 'footer', 'footer_bar'];

<<<<<<< HEAD
=======
        
        // Lancia eventi per permettere modifiche dinamiche
        $locations = ['slim_header', 'header', 'footer', 'footer_bar'];
        
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        foreach ($locations as $location) {
            event(new BuildingSixteenMenu($this->menuBuilder, $location));
        }
    }

    /**
     * Inizializza i menu con i dati dalla configurazione
     */
    protected function initializeMenusFromConfig(): void
    {
        $menuConfig = config('sixteen.menu', []);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev

        if (isset($menuConfig['slim_header'])) {
            $this->menuBuilder->addSlimHeader($menuConfig['slim_header']);
        }

        if (isset($menuConfig['header'])) {
            $this->menuBuilder->addHeader($menuConfig['header']);
        }

        if (isset($menuConfig['footer'])) {
            $this->menuBuilder->addFooter($menuConfig['footer']);
        }

<<<<<<< HEAD
=======
        
        if (isset($menuConfig['slim_header'])) {
            $this->menuBuilder->addSlimHeader($menuConfig['slim_header']);
        }
        
        if (isset($menuConfig['header'])) {
            $this->menuBuilder->addHeader($menuConfig['header']);
        }
        
        if (isset($menuConfig['footer'])) {
            $this->menuBuilder->addFooter($menuConfig['footer']);
        }
        
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        if (isset($menuConfig['footer_bar'])) {
            $this->menuBuilder->addFooterBar($menuConfig['footer_bar']);
        }
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> 4b6b99016 (first commit)
=======
}
>>>>>>> dev
