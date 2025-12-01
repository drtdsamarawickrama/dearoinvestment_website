import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/home.js',
                'resources/js/blog-create.js',
                'resources/js/customer-inquiry.js',
                'resources/js/customer-inquiry-lease.js',
                'resources/js/customer-inquiry-fd.js',
                'resources/js/customer-inquiry-insurance.js',
                'resources/js/customer-inquiry-pawning.js',
                'resources/js/customer-bank-proof.js',
                'resources/js/customer-guarantor.js',
                'resources/js/dearo-inquiry-lease-action.js',
                'resources/js/dearo-inquiry-pawning.js',
            ],
            refresh: true,
        }),
    ],
});
