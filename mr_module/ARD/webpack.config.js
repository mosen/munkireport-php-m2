const path = require('path');

module.exports = {
  entry: "./assets/js/ard.js",
  output: {
    path: path.resolve(__dirname, 'public'),
    filename: 'bundle.js',
    publicPath: '/x/ard/'
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      }
    ]
  },
  resolve: {
    modules: [
      path.resolve(__dirname, "..", "..", "node_modules")
    ],
    alias: {
      'vue': 'vue/dist/vue.js'
    }
  }
};
