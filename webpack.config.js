const path = require('path');
const miniCSSExtractPlugin = require('mini-css-extract-plugin');
const devMode = process.env.MODE_ENV !=='production';
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
  entry: './assets/js/app.js',
  output: {
    path: path.resolve(__dirname, 'public/js'),
    filename: 'script.js'
  },
  module:{
    rules:[{
test: /\.s?[ac]ss$/,
use : [
  miniCSSExtractPlugin.loader,
  {loader: 'css-loader', options: {url:false, sourceMap : true}},
  {loader: 'sass-loader', options: {sourceMap: true}}
]
    },
    {
      test: /\.js$/,
      exclude: /node_modules/,
      use: "babel-loader"
    }
  ]
  },
  devtool:'source-map',
  plugins:[
    new miniCSSExtractPlugin({
      filename: '../css/style.css'
    }),
    new CopyPlugin([
      { from: 'assets/images', to: '../img' },
    ]),
  ],
  mode : devMode ? 'development' : 'production'

};
