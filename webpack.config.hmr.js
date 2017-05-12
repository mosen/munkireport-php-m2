const path = require('path');
const webpack = require('webpack');

module.exports = {
  entry: {
    app: [
      'webpack-dev-server/client?http://localhost:4000',
      'webpack/hot/only-dev-server',
      './resources/assets/js/app.js'
    ]
  },

  output: {
    path: path.resolve(__dirname, "..", "public"),
    filename: 'js/app.js',
    publicPath: 'http://localhost:4000/'
  },

  resolve: {
    extensions: ['.js', '.jsx', '.vue'],
    alias: {
      'vue$': 'vue/dist/vue.common.js'
    }
  },

  devtool: 'cheap-module-eval-source-map',
  target: 'web',

  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          js: 'babel-loader',
          scss: 'vue-style-loader!css-loader!sass-loader',
          sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax',
          less: 'vue-style-loader!css-loader!less-loader',
          stylus: 'vue-style-loader!css-loader!stylus-loader?paths[]=node_modules'
        }
      },

      {
        test: /\.jsx?$/,
        exclude: /(node_modules|bower_components)/,
        use: ['babel-loader']
      },
      {
        test: /\.s[ac]ss$/,
        use: [{
          loader: 'style-loader'
        }, {
          loader: 'css-loader'
        }, {
          loader: 'resolve-url-loader'
        }, {
          loader: 'sass-loader',
          options: {
            sourceMap: true
          }
        }]
      },
      {
        test: /\.(png|jpg|svg|gif)$/,
        use: [{
          loader: 'url-loader',
          options: {
            limit: 10000,
            name: '[name]-[hash].[ext]'
          }
        }]
      },
      {
        test: /\.(ttf|eot|svg|woff|woff2)$/,
        use: [{
          loader: 'file-loader',
          options: {
            outputPath: 'fonts/'
          }
        }]
      }
    ]
  },
  plugins: [
    new webpack.HotModuleReplacementPlugin()
  ],

  devServer: {
    // This must be a full hostname for HMR to work
    publicPath: "http://localhost:4000/",
    hot: true,
    port: 4000,
    https: false,
    headers: {
      'Access-Control-Allow-Origin': '*'
    }
  }
};