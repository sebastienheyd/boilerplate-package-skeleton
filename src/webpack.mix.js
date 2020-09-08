let mix = require('laravel-mix');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const path = require('path');

mix.webpackConfig({plugins: [new CleanWebpackPlugin()], output: {path: path.resolve(process.cwd(), 'public')}})
    .setPublicPath("public")
    .setResourceRoot('/assets/vendor/~package');
