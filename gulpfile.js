const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

gulp.task("copyfiles", function() {

    gulp.src("vendor/bower_components/jquery/dist/jquery.min.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_components/moment/min/moment.min.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_components/fullcalendar/dist/fullcalendar.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_components/fullcalendar/dist/fullcalendar.css")
        .pipe(gulp.dest("resources/assets/css/"));

    gulp.src("vendor/bower_components/bootstrap/dist/js/bootstrap.js")
        .pipe(gulp.dest("resources/assets/js/"));
    
    gulp.src("vendor/bower_components/bootstrap/dist/css/bootstrap.min.css")
        .pipe(gulp.dest("resources/assets/css/")); 
});

elixir((mix) => {
    mix.copy('node_modules/font-awesome/fonts', 'public/fonts/font-awesome',false);
    mix.sass('app.scss', 'resources/assets/css');
    mix.styles([
        'bootstrap.min.css',
        'app.css',
        'fullcalendar.css'
    ]);

    mix.scripts([
        'jquery.min.js',
        'moment.min.js',
        'fullcalendar.js'
    ]);
});
