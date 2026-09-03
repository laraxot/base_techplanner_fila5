# 🎨 UI — il vocabolario visivo, non il vestito

[![Dominio](https://img.shields.io/badge/dominio-design%20system-7B1FA2.svg)](#)
[![PHP](https://img.shields.io/badge/PHP-%5E8.3-777BB4.svg)](../../composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-%5E13.0-FF2D20.svg)](../../composer.json)
[![Filament](https://img.shields.io/badge/Filament-%5E5.0-ffab00.svg)](../../composer.json)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max%2C%200%20errori-brightgreen.svg)](../../phpstan.neon)
[![strict_types](https://img.shields.io/badge/declare-strict__types%3D1-informational.svg)](#)

> Badge **misurati il 2026-09-02**: `./vendor/bin/phpstan analyse Modules/UI` →
> `[OK] No errors`. Versioni da `composer.json`. Livello da `phpstan.neon`
> (`level: max`): il progetto **vieta** di passare `--level`.

---

## Perché

Il tema decide **come appare** questo progetto. UI decide **cosa esiste** come mattone.

La distinzione non è accademica: un componente in UI è riusabile in un altro progetto
dell'ecosistema, uno nel tema no. Se un pezzo generico finisce nel tema, il progetto
successivo lo riscrive; se un pezzo specifico finisce in UI, lo importa chi non lo
vuole. **Il confine è la riusabilità, non la comodità del momento.**

Zero Resource, 11 Widget, 107 file PHP: questo modulo non ha dominio: è fatto di pezzi
che altri usano.

## Logica

- Component library Blade/Livewire riusabile.
- Componenti Filament custom su base `XotBase*`.
- Token e pattern documentati, integrazione Tailwind/DaisyUI.

## Filosofia

**Si estrae solo dopo aver misurato la duplicazione** (`grep -rl`), mai in previsione.
Un componente creato per un solo consumatore è un'astrazione senza evidenza, e va
mantenuta comunque.

E una trappola verificata: una `Section` estratta **senza heading di default** perde il
titolo rispetto alla versione inline. Nessun errore, nessun log — solo un titolo che
sparisce.

**L'accessibilità è il contributo più alto che questo modulo può dare.** Un portale di
pubblica amministrazione italiana ha obblighi di accessibilità: se non vive nei
componenti, va rifatta in ogni pagina — cioè non si fa.

## Regola di dipendenza

La freccia è unidirezionale:

```
Xot ← UI ← User, Tenant, Activity, …
```

- UI **non dipende** da moduli di dominio.
- I moduli di dominio **possono** dipendere da UI.
- Un componente che sa cos'è una scheda non è un componente di UI: è di `Ptv`.

Dettagli: [`docs/dependency-rules.md`](./docs/dependency-rules.md)

## Confini

Non appartengono a UI: il tema e le scelte cromatiche di questo progetto (→ `Themes/`),
qualunque regola di dominio, le classi base Filament (→ `Xot`).

## Scopo e confini

UI è il vocabolario condiviso dell'interfaccia: il posto dove un blocco di markup o di
campi smette di essere copiato e diventa una parola che tutti i moduli pronunciano allo
stesso modo. Misurato il 2026-09-02: 9 moduli la importano (40 file), l'export più usato
è `Filament\Tables\Columns\GroupColumn` (29 file), le dipendenze uscenti sono 73 file
verso `Xot` e 1 verso `User` — la freccia dichiarata sopra regge. I tre temi non la
importano affatto (0 file su 3), e dei 243 componenti Blade uno solo è invocato
dall'esterno.

Confini, misure e le cinque mosse concrete: [`docs/scopo.md`](./docs/scopo.md).

## Documentazione

| Documento | Cosa contiene |
|---|---|
| [`docs/purpose.md`](./docs/purpose.md) | scopo, come raggiungerlo meglio, confini |
| [`docs/dependency-rules.md`](./docs/dependency-rules.md) | la regola della freccia |
| [`docs/`](./docs/) | wiki tecnica |

## Stato verificato il 2026-09-02

| Verifica | Comando | Esito |
|---|---|---|
| Analisi statica | `./vendor/bin/phpstan analyse Modules/UI` | `[OK] No errors` |
| Versioni | `composer.json` | PHP `^8.3`, Laravel `^13.0`, Filament `^5.0` |

<<<<<<< .merge_file_6FvQzv
Non ancora misurati in questa revisione: copertura test, PHPMD, PHPInsights.
=======
# 🎨 UI Module - Eleva la Tua Interfaccia al Livello Successivo! 🚀
![GitHub issues](https://img.shields.io/github/issues/laraxot/module_ui_fila5)
![GitHub forks](https://img.shields.io/github/forks/laraxot/module_ui_fila5)
![GitHub stars](https://img.shields.io/github/stars/laraxot/module_ui_fila5)
![License](https://img.shields.io/badge/license-MIT-green)
Welcome to the **Fila3 UI Module**! This comprehensive user interface toolkit is designed to streamline the development of visually stunning and user-friendly applications. With a rich set of components and styles, you can create a polished and consistent look for your projects in no time!
## 📦 What’s Inside?
The Fila3 UI Module provides a wide array of features, including:
- **Pre-built UI Components**: A library of ready-to-use components such as buttons, modals, and forms.
- **Responsive Design**: Ensure your application looks great on any device with a mobile-first approach.
- **Customizable Themes**: Easily switch between light and dark themes or create your own to match your branding.
- **Accessibility Support**: Built with accessibility in mind to cater to all users.
## 🌟 Key Features
- **Component-Based Architecture**: Easily manage and reuse UI components across your application.
- **State Management Integration**: Effortlessly connect UI components to your application's state management.
- **Dynamic Layouts**: Create flexible layouts that adapt to different screen sizes and orientations.
- **Animations & Transitions**: Enhance user experience with smooth animations and transitions.
- **Form Validation**: Simplify user input handling with built-in form validation features.
- **Localization Support**: Easily implement multiple languages and regional settings.
- **🎨 Icon System**: Complete SVG icon system with automatic registration and Filament integration.
## 🚀 Why Choose Fila3 UI?
- **Fast & Efficient**: Built for performance, ensuring quick load times and smooth interactions.
- **Developer-Friendly**: Intuitive APIs and documentation make integration a breeze.
- **Community Driven**: Join a thriving community of developers for support and collaboration.
## 🎨 Icon System
The UI Module includes a comprehensive SVG icon system that integrates seamlessly with Blade Icons and Filament:
### Quick Start
```blade
{{-- Use any icon with the ui- prefix --}}
@svg('ui-login')
@svg('ui-user')
@svg('ui-settings')
```
### In Filament Components
```php
// Form components
Forms\Components\TextInput::make('email')
    ->prefixIcon('ui-login')
// Table columns
Tables\Columns\TextColumn::make('name')
    ->icon('ui-user')
// Actions
Actions\Action::make('delete')
    ->icon('ui-trash')
### Available Icons
- `ui-login` - Login/authentication icon
- `ui-user` - User profile icon
- `ui-settings` - Settings icon
- `ui-trash` - Delete/trash icon
- `ui-edit` - Edit icon
- And many more...
📚 **Full Documentation**: [Icon System Guide](docs/icon-system.md)
## 🔧 Installation
Getting started with the Fila3 UI Module is straightforward! Follow these steps:
1. Clone the repository:
   ```bash
   git clone https://github.com/laraxot/module_ui_fila5.git
Navigate to the project directory:
bash
Copia codice
cd module_ui_fila5
Install dependencies:
npm install
Import the UI components in your application:
javascript
import { Button, Modal } from 'fila3-ui';
Start your application and bring your UI to life!
📜 Usage Examples
Here are a few snippets to demonstrate how to use the Fila3 UI Module in your application:
Creating a Button
<Button onClick={() => alert("Button clicked!")}>
  Click Me!
</Button>
Displaying a Modal
<Modal isOpen={isModalOpen} onClose={() => setModalOpen(false)}>
  <h2>Modal Title</h2>
  <p>Your content goes here.</p>
  <Button onClick={() => setModalOpen(false)}>Close</Button>
</Modal>
🤝 Contributing
We welcome contributions! If you have ideas, bug fixes, or enhancements, check out the contributing guidelines to get started.
📄 License
This project is licensed under the MIT License - see the LICENSE file for details.
👤 Author
Marco Sottana
Discover more of my work at marco76tv!
### Versione HEAD
### Versione Incoming
# 🎨 UI Module - Componenti Interfaccia
[![PHP Version](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-orange.svg)](https://laravel.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Code Quality](https://img.shields.io/badge/code%20quality-A+-brightgreen.svg)](.codeclimate.yml)
[![Test Coverage](https://img.shields.io/badge/coverage-95%25-success.svg)](phpunit.xml.dist)
[![UI Components](https://img.shields.io/badge/components-50+-brightgreen.svg)](docs/module_ui.md)
[![Filament Version](https://img.shields.io/badge/Filament-3.x-purple.svg)](https://filamentphp.com)
[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](https://github.com/laraxot/module_ui)
[![Downloads](https://img.shields.io/badge/downloads-1k+-blue.svg)](https://packagist.org/packages/laraxot/module_ui)
[![Stars](https://img.shields.io/badge/stars-100+-yellow.svg)](https://github.com/laraxot/module_ui)
<div align="center">
  <img src="https://raw.githubusercontent.com/laraxot/module_ui/main/docs/assets/ui-banner.png" alt="UI Module Banner" width="800">
</div>
## 🇮🇹 Italiano
### 📝 Descrizione
Il modulo UI fornisce un set completo di componenti di interfaccia utente riutilizzabili per applicazioni Laravel, basati su Filament e Blade.
### ✨ Caratteristiche Principali
- ✅ Componenti Blade riutilizzabili
- ✅ Layouts predefiniti
- ✅ Temi personalizzabili
- ✅ Supporto multi-lingua
- ✅ Componenti Filament
- ✅ Widgets dashboard
- ✅ Form personalizzati
- ✅ InlineDatePicker con date selettive
- ✅ Stili CSS moderni
### 🚀 Installazione
composer require modules/ui
php artisan module:enable UI
php artisan ui:install
### 📚 Documentazione
Consulta la [documentazione completa](docs/module_ui.md) per:
- [Componenti](docs/components.md)
- [Layouts](docs/layouts.md)
- [Temi](docs/themes.md)
## 🇬🇧 English
### 📝 Description
The UI module provides a complete set of reusable user interface components for Laravel applications, based on Filament and Blade.
### ✨ Key Features
- ✅ Reusable Blade components
- ✅ Predefined layouts
- ✅ Customizable themes
- ✅ Multi-language support
- ✅ Filament components
- ✅ Dashboard widgets
- ✅ Custom forms
- ✅ InlineDatePicker with selective dates
- ✅ Modern CSS styles
### 🚀 Installation
### 📚 Documentation
Check out the [complete documentation](docs/module_ui.md) for:
- [Components](docs/components.md)
- [Themes](docs/themes.md)
## 🇪🇸 Español
### 📝 Descripción
El módulo UI proporciona un conjunto completo de componentes de interfaz de usuario reutilizables para aplicaciones Laravel, basados en Filament y Blade.
### ✨ Características Principales
- ✅ Componentes Blade reutilizables
- ✅ Layouts predefinidos
- ✅ Temas personalizables
- ✅ Soporte multi-idioma
- ✅ Componentes Filament
- ✅ Widgets de dashboard
- ✅ Formularios personalizados
- ✅ InlineDatePicker con fechas selectivas
- ✅ Estilos CSS modernos
### 🚀 Instalación
### 📚 Documentación
Consulta la [documentación completa](docs/module_ui.md) para:
- [Componentes](docs/components.md)
- [Temas](docs/themes.md)
## 🤝 Contribuire / Contributing / Contribuir
Siamo aperti a contribuzioni! Consulta le nostre [linee guida per i contributori](.github/CONTRIBUTING.md).
We are open to contributions! Check out our [contributor guidelines](.github/CONTRIBUTING.md).
¡Estamos abiertos a contribuciones! Consulta nuestras [pautas para contribuidores](.github/CONTRIBUTING.md).
## 📄 Licenza / License / Licencia
Questo progetto è distribuito sotto la licenza MIT. Vedi il file [LICENSE](LICENSE) per maggiori dettagli.
This project is distributed under the MIT license. See the [LICENSE](LICENSE) file for more details.
Este proyecto está distribuido bajo la licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.
---
**Modulo** `ui` · **Laraxot** · **Current Platform** · PHPStan 10 · Filament 5
>>>>>>> .merge_file_1HTu89
