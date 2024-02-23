import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
	plugins: [
		laravel({
			input: [
				'resources/js/app.js',
				'resources/js/home.js',
				'resources/css/app.css',
				'resources/css/aside.css',
				'resources/css/users/user_cloud.css',
				'resources/css/users/register.css',
				'resources/css/users/login.css',
				'resources/css/users/dashboard.css',
				'resources/css/pages/about.css',
				'node_modules/bootstrap-icons/font/bootstrap-icons.css'
			],
			refresh: true,
		}),
	]
});
