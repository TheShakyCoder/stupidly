import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

const port = 5173
const origin = `${process.env.DDEV_PRIMARY_URL}:${port}`

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                // Vue keeps template comments as comment nodes in dev but strips
                // them from production builds. The SSR bundle is always a
                // production build, so without this the dev client hydrates
                // extra comment nodes that the server-rendered HTML never had.
                compilerOptions: {
                    comments: false,
                },
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        cors: {
            origin: [
                `${process.env.DDEV_PRIMARY_URL}`
            ]
        },
        // respond to all network requests:
        host: "0.0.0.0",
        port: port,
        strictPort: true,
        // Defines the origin of the generated asset URLs during development
        origin: origin,
    },
});
