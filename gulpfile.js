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
    spritesmith  = require('gulp.spritesmith');

//COMPILE SASS
gulp.task('sass', function(){
    return gulp.src('public/app/sass/style.scss')
        .pipe(sass())
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(gulp.dest('public/app/css'))
});
//MIN CSS
gulp.task('css-min', ['sass'], function() {
    return gulp.src('public/app/css/libs.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/dist/css'));
});
//MIN SCRIPTS
gulp.task('scripts', function(){
    return gulp.src([
        'public/js/info.js'
    ])
        .pipe(concat('info.min.js'))
        .pipe(uglifyjs())
        .pipe(gulp.dest('public/js/minified'));
});
//OPTIMIZATION IMAGES
gulp.task('img', function(){
    return gulp.src('public/img/**/*')
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
        .pipe(gulp.dest('public/img'))
});
//SPRITES
gulp.task('sprite', function () {
    var spriteData = gulp.src('public/app/img/icon/*.png').pipe(spritesmith({
        imgName: 'sprite.png',
        cssName: 'sprite.scss'
    }));
    return spriteData.pipe(gulp.dest('public/app/sprites/'));
});
//WATCHER
gulp.task('watch', ['sass'], function() {
    gulp.watch('public/app/sass/**/*.scss', ['sass']);
});

//the file libs.js consists of:
