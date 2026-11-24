import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

// Stub: il tema non ha ancora resources/css/app.css ne' resources/js/app.js.
// Aggiungere qui gli input quando verranno creati.
export default defineConfig({
    plugins: [
        laravel({
            input: [],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
