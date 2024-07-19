import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
const path = require('path');

module.exports = {
  // Other webpack configuration options...

  resolve: {
    fallback: {
      "path": require.resolve("path-browserify"),
      // Add other polyfills as needed
    }
  }
};