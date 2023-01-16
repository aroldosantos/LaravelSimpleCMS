import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
const host = 'http://simplecms.test'; 

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
                'resources/views/**',
            ],
            server: { 
                host, 
                hmr: { host }, 
            }, 
        }),
    ],
});
