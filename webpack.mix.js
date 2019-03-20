const Compression = require('compression-webpack-plugin');
const Mix = require('laravel-mix');

const options = {
    clearConsole: false,
    processCssUrls: false
};

const config = {
    plugins: [
        new Compression({
            include: /\/dist\//,
            test: /\.(js|css)$/,
            asset: '[path][query]',
        }),
    ],
};

Mix.options(options).webpackConfig(config)
   .js('assets/source/js/admin.js', 'assets/dist/js')
   .js('assets/source/js/editor.js', 'assets/dist/js')
   .js('assets/source/js/theme.js', 'assets/dist/js')
   .sass('assets/source/sass/admin.scss', 'assets/dist/css')
   .sass('assets/source/sass/editor.scss', 'assets/dist/css')
   .sass('assets/source/sass/theme.scss', 'assets/dist/css')
   .sourceMaps();
