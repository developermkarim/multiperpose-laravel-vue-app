import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // this vue is  from node_modules @vite

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // this is css file of application is configured
                'resources/js/app.js',  // this is js file of app is configured
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                }
            }
        })
    ],
});