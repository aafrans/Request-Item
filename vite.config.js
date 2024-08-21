import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Update ke CSS jika Anda sudah beralih dari SCSS
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
