const Compression = require('compression-webpack-plugin');
const Mix = require('laravel-mix');

const options = {
    clearConsole: false,
    processCssUrls: false,
};

const config = {
    plugins: [
        new Compression({
            include: /\/dist\//,
            test: /\.(js|css)$/,
            filename: '[path][query]',
        }),
    ],
};

Mix
    .js('assets/source/js/admin.js', 'js')
    .js('assets/source/js/editor.js', 'js')
    .js('assets/source/js/theme.js', 'js')
    .sass('assets/source/sass/admin.scss', 'css')
    .sass('assets/source/sass/editor.scss', 'css')
    .sass('assets/source/sass/theme.scss', 'css')
    .setPublicPath('assets/dist')
    .webpackConfig(config)
    .options(options)
    .sourceMaps()
    .version();
