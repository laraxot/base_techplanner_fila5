import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/alpine.js'],
            //publicDirectory: '../../../public_html',
            //buildDirectory: 'themes/Two',
            outDir: './public',
            buildDirectory: '.',
            emptyOutDir: false,
            manifest: 'manifest.json',
            refresh: true,
        }),
        tailwindcss(),
    ],
})

