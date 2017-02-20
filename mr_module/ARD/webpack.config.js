const path = require('path');

module.exports = {
    entry: "./assets/js/ard.js",
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: 'ard-bundle.js',
        publicPath: '/xassets/ARD/'
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
        ]
    }
}