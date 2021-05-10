var path = require('path')
const webpack = require('webpack')

var config = {
    entry: './admin.js',
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js'
    },
    mode: 'development',
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: 'babel-loader',

            }
        ]
    }

}


module.exports = config