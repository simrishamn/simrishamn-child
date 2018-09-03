const Compression = require('compression-webpack-plugin');
const Mix = require('laravel-mix')

const config = {
    plugins: [
        new Compression({
            include: /\/dist\//,
            test: /\.(js|css)$/,
            asset: '[path][query]',
        }),
    ],
};

Mix.webpackConfig(config)
    .js('assets/source/js/admin.js', 'assets/dist/js/admin.js')
    .js('assets/source/js/editor.js', 'assets/dist/js/editor.js')
    .js('assets/source/js/helpers.js', 'assets/dist/js/helpers.js')
    .js('assets/source/js/theme.js', 'assets/dist/js/theme.js')
    .sass('assets/source/sass/admin.scss', 'assets/dist/css/admin.css')
    .sass('assets/source/sass/editor.scss', 'assets/dist/css/editor.css')
    .sass('assets/source/sass/theme.scss', 'assets/dist/css/theme.css')
    .sourceMaps();
