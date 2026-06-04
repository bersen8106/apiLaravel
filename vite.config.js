import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: false,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',  // Важно для Docker
        port: 5173,
        // hmr: false,
        hmr: {
            host: 'localhost',  // Или домен
        },
        ignored: [
            '**/storage/**',
            '**/bootstrap/cache/**',
            '**/vendor/**',
            '**/node_modules/**',
        ],
    },
});
