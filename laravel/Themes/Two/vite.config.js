import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/filament.css', 'resources/js/app.js'],
            //publicDirectory: '../../../public_html',
            //buildDirectory: 'themes/Two',
            buildDirectory: '.',
            manifest: 'manifest.json',
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        // Il web root canonico e' laravel/public; public_html viene sincronizzato
        // da `npm run sync-public` e non deve diventare un symlink al tema.
        outDir: './public/',
        emptyOutDir: false,
    },
})

