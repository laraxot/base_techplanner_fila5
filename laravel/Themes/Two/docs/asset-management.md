# Asset Management Workflow for Theme Two

## Overview

This document outlines the asset compilation and deployment workflow for `Theme Two`, focusing on resolving common issues like "Vite manifest not found". It details the configuration for Vite, CSS imports, and the commands required to build and deploy frontend assets.

## 1. Theme Identification

The `pub_theme` configuration in `laravel/config/local/techplanner/xra.php` specifies `Theme Two` as the active public theme. This means all frontend assets and views for the public-facing application are served from the `laravel/Themes/Two/` directory.

## 2. Composer Dependencies

All Filament packages (`filament/filament`, `filament/tables`, `filament/schemas`, `filament/forms`, `filament/infolists`, `filament/actions`, `filament/notifications`, `filament/widgets`, `filament/support`) are managed via Composer and are confirmed to be at version `v5.2.0` (or compatible `^5.0` to `^5.2` ranges). These are resolved through the main `laravel/composer.json` and `laravel/composer.lock` files.

**No explicit `composer require` commands for individual Filament packages are typically needed within the theme itself, as they are part of the main application's dependencies.**

## 3. NPM Dependencies

The theme's `package.json` (`laravel/Themes/Two/package.json`) lists the necessary frontend development dependencies, including `tailwindcss` and `@tailwindcss/vite` (both `^4.0.0`). These packages are installed by running `npm install` within the `laravel/Themes/Two/` directory.

## 4. CSS Imports (`resources/css/app.css`)

The main CSS entry point for the theme is `laravel/Themes/Two/resources/css/app.css`. This file imports Tailwind CSS and daisyUI. **Gli import Filament CSS sono stati rimossi** (2026-11-08): il tema pubblico non renderizza componenti Filament — il pannello admin carica i propri stili. La rimozione ha ridotto il CSS da ~994KB a ~395KB.

**Example Content:**

```css
@import 'tailwindcss';
@plugin "daisyui";
@plugin "@tailwindcss/typography";

@variant dark (&:where(.dark, .dark *));
```

## 5. Vite Configuration (`vite.config.js`)

The `laravel/Themes/Two/vite.config.js` file configures Vite for asset compilation.

**Key Configuration:**

*   `input`: Defines the entry points for Vite (e.g., `resources/css/app.css`, `resources/js/app.js`).
*   `outDir`: `../../../public/themes/Two` (public tree del repo). Il tema viene servito via symlink `public_html/themes/Two -> laravel/Themes/Two/public`; `sync-public` copia l'outDir attraverso il symlink nel theme public. Vedi `docs/wiki/concepts/public-asset-deployment.md`.
*   `emptyOutDir: false`: Prevents Vite from clearing the `outDir` during each build, allowing for external asset copying.
*   `tailwindcss()`: Enables Tailwind CSS processing.

**Example Configuration:**

```javascript
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
	build: {
		outDir: './public', // Assets are built here temporarily
		emptyOutDir: false,
		manifest: 'manifest.json',
		rollupOptions: {
			output: {
				entryFileNames: `assets/[name].js`,
				chunkFileNames: `assets/[name].js`,
				assetFileNames: `assets/[name].[ext]`
			}
		}
	},
	plugins: [
		laravel({
			input: [
				'resources/css/app.css',
				'resources/js/app.js',
			],
			refresh: true,
		}),
		tailwindcss(),
	],
});
```

## 6. Blade Layout (`resources/views/layouts/app.blade.php`)

The `laravel/Themes/Two/resources/views/layouts/app.blade.php` file includes the compiled assets using Blade's `@vite` directive, alongside Filament's `@filamentStyles` and `@filamentScripts` for proper integration.

**Key Snippets:**

```blade
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ? "$title — " : '' }}{{ config('app.name') }}</title>
        <style>
            [x-cloak] { display: none !important; }
        </style>
        @filamentStyles
        @vite(['resources/css/app.css'])
    </head>
    <body>
        {{-- ... main content ... --}}
        @livewire('notifications')
        @filamentScripts
        @vite(['resources/js/app.js'])
    </body>
```

## 7. Asset Compilation and Deployment

To compile and deploy assets for `Theme Two`, navigate to `laravel/Themes/Two/` and execute the following commands:

1.  **`npm run build`**: Compiles the frontend assets using Vite. The output will be placed in `laravel/Themes/Two/public/`.

    ```bash
    cd laravel/Themes/Two/
    npm run build
    ```

2.  **`npm run copy`**: Copies the built assets from `laravel/Themes/Two/public/` to the final public web root `../../../public_html/themes/Two/dist/`. This step is crucial for the application to find the `manifest.json` and other assets.

    ```bash
    cd laravel/Themes/Two/
    npm run copy
    ```
    *Note: The `npm run copy` script is defined in `laravel/Themes/Two/package.json` and performs the `mkdir -p ../../../public_html/themes/Two/dist && cp -rv ../../../public_html/themes/Two/build/* ../../../public_html/themes/Two/dist/` operation. This copies the files from the temporary build directory to the final serving directory.*

## 8. Troubleshooting "Vite manifest not found"

If you encounter a "Vite manifest not found" error, ensure that:

*   You have run both `npm run build` AND `npm run copy` from `laravel/Themes/Two/`.
*   The `outDir` in `vite.config.js` is set to `'./public'` and `emptyOutDir` is `false`.
*   The `npm run copy` script correctly moves the assets to `../../../public_html/themes/Two/dist/`.
*   The `APP_URL` in `laravel/.env` is correctly configured to match your local development domain (e.g., `http://techplanner.local`).

## 9. Content Management (`home.json`)

Page content (e.g., for the home page accessed via `/it`) is dynamically rendered. The `laravel/Themes/Two/resources/views/pages/index.blade.php` uses `<x-page>` components to fetch and display content blocks defined in JSON files like `laravel/config/local/techplanner/database/content/pages/home.json`.

*   **`content_blocks` / `sidebar_blocks`**: These sections in the JSON define an array of components to render in the main content area or sidebar, respectively.
*   **`view` property**: Each block specifies a Blade component (e.g., `pub_theme::components.blocks.hero.main`) to be rendered.
*   **Filament Forms Builder**: The management of these content blocks (creating, editing, reordering) is typically handled via an administrative interface built with Filament, leveraging Filament Forms Builder's flexible schema definition capabilities.
