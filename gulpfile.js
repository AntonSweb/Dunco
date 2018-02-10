var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano      = require('gulp-cssnano'),
    rename       = require('gulp-rename'),
    concat       = require('gulp-concat'),
    uglifyjs     = require('gulp-uglifyjs'),
    imagemin     = require('gulp-imagemin'),
    pngquant     = require('imagemin-pngquant'),
    imageminSvgo = require('imagemin-svgo'),
    spritesmith  = require('gulp.spritesmith'),
    svgSprite    = require("gulp-svg-sprites"),
    source       = require('vinyl-source-stream'),
    browserify   = require('browserify'),
    // watchify     = require('watchify'),
    vueify       = require('vueify'),
    envify = require('envify/custom');


gulp.task('vueify', function () {
    browserify('resources/assets/js/app.js')
        .transform(vueify)
        .transform(
            { global: true },
            envify({ NODE_ENV: 'production' })
        )
        .bundle()
        .pipe(source('build.js'))
        .pipe(gulp.dest("public/app/js/"))
});

//COMPILE SASS
gulp.task('sass', function(){
    return gulp.src('public/app/sass/*.scss')
        .pipe(sass())
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(gulp.dest('public/app/css'))
});
//MIN CSS
gulp.task('css-min', ['sass'], function() {
    return gulp.src('public/app/css/*.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/dist/css'));
});
//MIN SCRIPTS
gulp.task('scripts', function(){
    return gulp.src([
        'public/app/js/build.js'
    ])
        .pipe(concat('build.min.js'))
        .pipe(uglifyjs())
        .pipe(gulp.dest('public/dist/js'));
});
//OPTIMIZATION IMAGES
gulp.task('img', function(){
    return gulp.src('public/app/img/dunco-logo.png')
        .pipe(imagemin({
            interlaced: true,
            progressive: true,
            use: [
                imageminSvgo({
                    plugins: [
                        {removeViewBox: false}
                    ]
                })
            ],
            une: [pngquant()]
        }))
        .pipe(gulp.dest('public/dist/img'))
});
//SPRITES
gulp.task('sprite', function () {
    var spriteData = gulp.src('public/app/img/icon/*.png').pipe(spritesmith({
        imgName: 'sprite-menu.png',
        cssName: 'sprite-menu.scss'
    }));
    return spriteData.pipe(gulp.dest('public/app/sprites/'));
});

gulp.task('sprites-svg', function () {
    return gulp.src('public/app/img/icons-menu-svg/*.svg')
        .pipe(svgSprite({
            cssFile: "sprite-svg.scss"
        }))
        .pipe(gulp.dest("public/app/sprites"));
});
//WATCHER
gulp.task('watch', ['sass'], function() {
    gulp.watch('public/app/sass/**/*.scss', ['sass']);
});

//the file libs.js consists of:
