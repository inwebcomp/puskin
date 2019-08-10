let mix = require('laravel-mix')

mix.disableSuccessNotifications()

mix.sass('resources/scss/app.scss', 'public/css')
    .sass('resources/admin/scss/app.scss', 'admin-dist/css')
    .version()
    .options({
        processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
    })

mix.js('resources/js/app.js', 'public/js').version()


mix.browserSync('localhost:8000');