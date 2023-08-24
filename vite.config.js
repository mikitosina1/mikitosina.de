import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// const path = require('path');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  
                'resources/css/aside.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    // root: path.resolve(__dirname, 'src'),
    // resolve: {
    //   alias: {
    //     '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
    //   }
    // },
    // server: {
    //   port: 8080,
    //   hot: true
    // }

});
