import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';


export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/sass/custom.scss', // Agrega esta línea
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
      '~flag-icon-css': path.resolve(__dirname, 'node_modules/flag-icon-css'),
    },
  },
});
