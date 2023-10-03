import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// const path = require('path');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',  
                'resources/css/aside.css',
                'resources/css/register.css',
                'resources/css/login.css',
                'node_modules/bootstrap-icons/font/bootstrap-icons.css'
            ],
            refresh: true,
        }),
    ]

});
