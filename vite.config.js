import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// const path = require('path');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  
                'resources/css/aside.css',
                'resources/js/app.js',
                'node_modules/bootstrap-icons/font/bootstrap-icons.css'
            ],
            refresh: true,
        }),
    ]

});
