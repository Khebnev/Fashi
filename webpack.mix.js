const mix = require('laravel-mix');



mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/select2/css/select2.css',
    'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
    'resources/assets/admin/css/adminlte.min.css'
], 'public/assets/admin/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/plugins/select2/js/select2.full.js',
    'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/demo.js'
], 'public/assets/admin/js/admin.js');

mix.copyDirectory(
    'resources/assets/admin/plugins/fontawesome-free/webfonts',
    'public/assets/admin/webfonts'
);
mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
mix.copy(
    'resources/assets/admin/css/adminlte.min.css.map',
    'public/assets/admin/css/adminlte.min.css.map'
);

mix.styles([
    'resources/assets/front/css/bootstrap.min.css',
    'resources/assets/front/css/elegant-icons.css',
    'resources/assets/front/css/font-awesome.min.css',
    'resources/assets/front/css/jquery-ui.min.css',
    'resources/assets/front/css/nice-select.css',
    'resources/assets/front/css/owl.carousel.min.css',
    'resources/assets/front/css/slicknav.min.css',
    'resources/assets/front/css/style.css',
    'resources/assets/front/css/themify-icons.css'
], 'public/assets/front/css/front.css');

mix.scripts([
    'resources/assets/front/js/jquery-3.3.1.min.js',
    'resources/assets/front/js/bootstrap.min.js',
    'resources/assets/front/js/jquery-ui.min.js',
    'resources/assets/front/js/jquery.countdown.min.js',
    'resources/assets/front/js/jquery.nice-select.min.js',
    'resources/assets/front/js/jquery.zoom.min.js',
    'resources/assets/front/js/jquery.dd.min.js',
    'resources/assets/front/js/jquery.slicknav.js',
    'resources/assets/front/js/owl.carousel.min.js',
    'resources/assets/front/js/imagesloaded.pkgd.min.js',
    'resources/assets/front/js/main.js'
], 'public/assets/front/js/front.js');

mix.copyDirectory('resources/assets/front/fonts', 'public/assets/front/fonts');
mix.copyDirectory('resources/assets/front/img', 'public/assets/front/img');
