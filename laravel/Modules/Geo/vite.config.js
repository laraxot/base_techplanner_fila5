import { defineConfig } from 'vite';
<<<<<<< .merge_file_pmmZtu
import laravel, { refreshPaths } from 'laravel-vite-plugin';
=======
import laravel from 'laravel-vite-plugin';
<<<<<<< .merge_file_AAxqUn
<<<<<<< .merge_file_rNTNTY
=======
>>>>>>> .merge_file_fi75tF
>>>>>>> .merge_file_5VrB3E
=======
>>>>>>> .merge_file_fi75tF
>>>>>>> .merge_file_7K3lTa
import path from 'path';
import { fileURLToPath } from 'url';
import { dirname, resolve } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

<<<<<<< .merge_file_AAxqUn
<<<<<<< .merge_file_rNTNTY
=======
=======
>>>>>>> .merge_file_7K3lTa
<<<<<<< .merge_file_pmmZtu
const nodeModules = resolve(__dirname, '../../node_modules');

export default defineConfig({
    build: {
        // Gli asset compilati restano nel modulo (`./public`): la document root li vede con il symlink
        // public_html/assets/geo -> ../../laravel/Modules/Geo/public, quindi l'URL resta /assets/geo/...
        // e AdminPanelProvider::BUILD_DIRECTORY ('assets/geo') non cambia. Niente più `npm run copy`.
        // `outDir` deve coincidere con `publicDirectory` + `buildDirectory` del plugin qui sotto.
        outDir: './public',
=======
<<<<<<< .merge_file_AAxqUn
>>>>>>> .merge_file_5VrB3E
=======
>>>>>>> .merge_file_7K3lTa
// Dipendenze del modulo stesso (package.json di Geo): la build non richiede `npm install` nella root di laravel.
const nodeModules = resolve(__dirname, 'node_modules');

export default defineConfig({
    build: {
        // La build va nella cartella `public/` del modulo, servita da `public_html/assets/geo` tramite
        // symlink (`php artisan xot:module-link`): niente copie in public_html. Laravel legge
        // `public_html/assets/geo/manifest.json` attraverso il link. Senza il link la home in italiano
        // (/it, che usa gli asset Geo) rispondeva 500 con ViteManifestNotFoundException.
        // Gli asset compilati sono versionati: il server di produzione non compila.
        outDir: resolve(__dirname, 'public'),
<<<<<<< .merge_file_AAxqUn
<<<<<<< .merge_file_rNTNTY
=======
>>>>>>> .merge_file_fi75tF
>>>>>>> .merge_file_5VrB3E
=======
>>>>>>> .merge_file_fi75tF
>>>>>>> .merge_file_7K3lTa
        emptyOutDir: false,
        manifest: "manifest.json",
        rollupOptions: {
            output: {
                entryFileNames: `assets/[name].js`,
                chunkFileNames: `assets/[name].js`,
                assetFileNames: `assets/[name].[ext]`
            },
        }
    },
    resolve: {
        alias: {
            'lit': path.resolve(nodeModules, 'lit'),
            'leaflet': path.resolve(nodeModules, 'leaflet'),
            'leaflet/dist/leaflet.css': path.resolve(nodeModules, 'leaflet/dist/leaflet.css'),
            'leaflet.markercluster': path.resolve(nodeModules, 'leaflet.markercluster'),
            'leaflet.markercluster/dist/MarkerCluster.css': path.resolve(nodeModules, 'leaflet.markercluster/dist/MarkerCluster.css'),
            'leaflet.markercluster/dist/MarkerCluster.Default.css': path.resolve(nodeModules, 'leaflet.markercluster/dist/MarkerCluster.Default.css'),
            'leaflet.heat': path.resolve(nodeModules, 'leaflet.heat'),
        }
    },
    plugins: [
        laravel({
<<<<<<< .merge_file_AAxqUn
<<<<<<< .merge_file_rNTNTY
            publicDirectory: '../../../public_html',
            buildDirectory: 'assets/geo',
=======
=======
>>>>>>> .merge_file_7K3lTa
<<<<<<< .merge_file_pmmZtu
            publicDirectory: 'public',
            buildDirectory: '.',
=======
            publicDirectory: '../../../public_html',
            buildDirectory: 'assets/geo',
>>>>>>> .merge_file_fi75tF
<<<<<<< .merge_file_AAxqUn
>>>>>>> .merge_file_5VrB3E
=======
>>>>>>> .merge_file_7K3lTa
            input: [
                resolve(__dirname, 'resources/css/app.css'),
                resolve(__dirname, 'resources/js/components/coordinate-picker-lit.js'),
            ],
            ...refreshPaths,
            refresh: true,
        }),
    ],
});