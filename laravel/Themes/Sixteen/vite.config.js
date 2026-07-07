import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'
<<<<<<< HEAD
import tailwindcss from '@tailwindcss/vite'
import nodeResolve from '@rollup/plugin-node-resolve';
import path from 'path';
import fs from 'fs';

export default defineConfig({
    base: '/themes/Sixteen/',
    resolve: {
        alias: {
            '@modules': path.resolve(__dirname, '../../Modules'),
            lit: path.resolve(__dirname, 'node_modules/lit'),
            leaflet: path.resolve(__dirname, 'node_modules/leaflet'),
            'leaflet.markercluster': path.resolve(__dirname, 'node_modules/leaflet.markercluster'),
            'leaflet.heat': path.resolve(__dirname, 'node_modules/leaflet.heat'),
            '@theme-lit': path.resolve(__dirname, 'node_modules/lit/index.js'),
            '@theme-leaflet': path.resolve(__dirname, 'node_modules/leaflet/dist/leaflet-src.js'),
            '@theme-leaflet-css': path.resolve(__dirname, 'node_modules/leaflet/dist/leaflet.css'),
        },
    },
    optimizeDeps: {
        include: ['leaflet', 'lit'],
    },
    plugins: [
        laravel({
            publicDirectory: '../../../public_html',
            input: [
                'resources/css/app.css',
                'resources/css/app-test.css',
                'resources/js/app.js',
                '../../Modules/Geo/resources/js/components/map-lit.js',
                'node_modules/leaflet.markercluster/dist/leaflet.markercluster.js',
=======
import path from 'path';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
>>>>>>> 6ed19256f (.)
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
        tailwindcss(),
<<<<<<< HEAD
        {
            name: 'sync-manifest',
            closeBundle() {
                const src = path.resolve(__dirname, '../../../public_html/themes/Sixteen/manifest.json');
                const dst = path.resolve(__dirname, 'public/manifest.json');
                try {
                    if (fs.existsSync(src)) {
                        fs.mkdirSync(path.dirname(dst), { recursive: true });
                        fs.copyFileSync(src, dst);
                    }
                } catch { /* silent */ }
            },
        },
    ],
    build: {
        outDir: '../../../public_html/themes/Sixteen',
        emptyOutDir: true,
        manifest: 'manifest.json',
        chunkFileNames: 'js/[name]-[hash].js',
        entryFileNames: 'js/[name]-[hash].js',
        assetFileNames: (assetInfo) => {
            const ext = assetInfo.name.split('.').pop();
            if (ext === 'css') return 'css/[name]-[hash].[ext]';
            if (['png','jpg','jpeg','gif','svg','webp','ico'].includes(ext)) return 'images/[name]-[hash].[ext]';
            if (['woff','woff2','eot','ttf','otf'].includes(ext)) return 'fonts/[name]-[hash].[ext]';
            return 'assets/[name]-[hash].[ext]';
        },
        minify: 'esbuild',
        sourcemap: false,
        target: 'es2020',
        cssCodeSplit: true,
        assetsInlineLimit: 4096,
        rollupOptions: {
            plugins: [
                nodeResolve({
                    browser: true,
                    preferBuiltins: false,
                    extensions: ['.mjs', '.js', '.json', '.node', '.css'],
                }),
            ],
        },
    },
    server: {
        hmr: { host: 'localhost' }
=======
    ],
    build: {
        outDir: './public',
        emptyOutDir: false,
        manifest: 'manifest.json',
        rollupOptions: {
            output: {
                manualChunks: {
                    // Core vendor libraries
                    'vendor-core': ['alpinejs', 'livewire'],
                    // UI libraries
                    'vendor-ui': ['bootstrap-italia'],
                    // Chart libraries
                    'vendor-charts': ['chart.js'],
                    // Map libraries
                    'vendor-maps': ['leaflet'],
                    // Utility libraries
                    'vendor-utils': ['lodash', 'moment']
                },
                // Optimize chunk names
                chunkFileNames: (chunkInfo) => {
                    const facadeModuleId = chunkInfo.facadeModuleId ? chunkInfo.facadeModuleId.split('/').pop().replace('.js', '') : 'chunk';
                    return `js/[name]-[hash].js`;
                },
                entryFileNames: 'js/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    const info = assetInfo.name.split('.');
                    const ext = info[info.length - 1];
                    if (/\.(css)$/.test(assetInfo.name)) {
                        return `css/[name]-[hash].${ext}`;
                    }
                    if (/\.(png|jpe?g|gif|svg|webp|ico)$/.test(assetInfo.name)) {
                        return `images/[name]-[hash].${ext}`;
                    }
                    if (/\.(woff2?|eot|ttf|otf)$/.test(assetInfo.name)) {
                        return `fonts/[name]-[hash].${ext}`;
                    }
                    return `assets/[name]-[hash].${ext}`;
                }
            }
        },
        // Minification settings
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
                pure_funcs: ['console.log', 'console.info', 'console.debug', 'console.warn']
            },
            mangle: {
                safari10: true
            }
        },
        // Source maps for production debugging
        sourcemap: false,
        // Target modern browsers
        target: 'es2015',
        // CSS code splitting
        cssCodeSplit: true,
        // Asset inlining threshold
        assetsInlineLimit: 4096
    },
    // Development server settings
    server: {
        hmr: {
            host: 'localhost'
        }
    },
    // Optimize dependencies
    optimizeDeps: {
        include: [
            'alpinejs',
            'livewire',
            'bootstrap-italia',
            'chart.js',
            'leaflet',
            'lodash',
            'moment'
        ]
>>>>>>> 6ed19256f (.)
    },
});
