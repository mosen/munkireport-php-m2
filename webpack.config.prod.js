const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
  entry: {
    app: [
      './resources/assets/js/app.js'
    ]
  },

  output: {
    path: path.resolve(__dirname, "..", "public"),
    filename: 'js/app.js'
  },

  resolve: {
    extensions: ['.js', '.jsx', '.vue'],
    alias: {
      'vue$': 'vue/dist/vue.common.js',
      MrModules: path.resolve('./mr_module/'),
      CoreDashboard: path.resolve('./resources/assets/js/app/dashboard/'),
      Core: path.resolve('./resources/assets/js')
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
          scss: ExtractTextPlugin.extract({
            use: 'css-loader!sass-loader',
            fallback: 'vue-style-loader'
          }),
          sass: ExtractTextPlugin.extract({
            use: 'css-loader!sass-loader?indentedSyntax',
            fallback: 'vue-style-loader'
          }),
          less: ExtractTextPlugin.extract({
            use: 'css-loader!less-loader',
            fallback: 'vue-style-loader'
          }),
          stylus: ExtractTextPlugin.extract({
            use: 'css-loader!stylus-loader?paths[]=node_modules',
            fallback: 'vue-style-loader'
          }),
          css: ExtractTextPlugin.extract({
            use: 'css-loader',
            fallback: 'vue-style-loader'
          })
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
    new ExtractTextPlugin("css/[name].css")
  ]
};