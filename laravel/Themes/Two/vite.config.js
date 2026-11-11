import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            //publicDirectory: '../../../public_html',
            //buildDirectory: 'themes/Two',
            buildDirectory: '.',
            manifest: 'manifest.json',
            refresh: true,
        }),
        tailwindcss(),
    ],
    // Gli asset compilati restano nel tema (`./public`, come Zero e Sixteen): la document root li vede tramite
    // il symlink public_html/themes/Two (ln -s ../../laravel/Themes/Two/public). Niente più `npm run copy`.
    publicDir: false,
    build: {
        outDir: './public',
        emptyOutDir: true,
    },
})

