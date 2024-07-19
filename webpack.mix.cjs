const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
.vue()
.sass('resources/sass/app.scss', 'public/css');

const path = require('path');

module.exports = {
  // Other webpack configuration options...

  resolve: {
    fallback: {
      "fs": false, // or any other polyfills as needed
      "path": require.resolve("path-browserify"),
      // Add other polyfills as needed
    }
  }
};