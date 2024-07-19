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
