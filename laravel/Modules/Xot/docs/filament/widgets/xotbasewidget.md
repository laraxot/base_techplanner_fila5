# XotBaseWidget

## Panoramica

XotBaseWidget è la classe base per tutti i widget Filament nel progetto. Fornisce funzionalità comuni e standardizza l'implementazione dei widget.

## Caratteristiche

- Estende la classe base di Filament Widget
- Fornisce metodi comuni per tutti i widget
- Gestisce la configurazione standard dei widget
- Implementa pattern di sicurezza e autorizzazioni

## Utilizzo

```php
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class MyCustomWidget extends XotBaseWidget
{
    protected static string $view = 'my-module::widgets.my-custom-widget';

    protected function getData(): array
    {
        return [
            'data' => $this->getWidgetData(),
        ];
    }
}
```

## Riferimenti

<<<<<<< HEAD
<<<<<<< HEAD
- [Documentazione Filament Widgets](../xot/docs/filament/widgets/index.md)
- [Documentazione Filament Widgets](../xot/docs/filament/widgets/index.md)
=======
- [Documentazione Filament Widgets](../Xot/docs/filament/widgets/index.md)
- [Documentazione Filament Widgets](../Xot/docs/filament/widgets/index.md)
>>>>>>> 4b6b99016 (first commit)
=======
- [Documentazione Filament Widgets](../xot/docs/filament/widgets/index.md)
- [Documentazione Filament Widgets](../xot/docs/filament/widgets/index.md)
>>>>>>> dev
- [XotBaseWidget](Modules/Xot/app/Filament/Widgets/XotBaseWidget.php)
