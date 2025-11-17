const { src, dest, watch, series } = require('gulp');
const terser = require('gulp-terser');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

// --- Configuration ---
const paths = {
    js: {
        src: 'assets/js/custom.js',
        dest: 'assets/js'
    },
    css: {
        src: 'assets/css/main.css',
        dest: 'assets/css'
    }
};

// --- JS Task ---
function minifyJs() {
    return src(paths.js.src)
        // Minify the JavaScript file
        .pipe(terser())
        // Rename the output file to custom.min.js
        .pipe(rename({ suffix: '.min' }))
        // Output the file to the assets/js directory
        .pipe(dest(paths.js.dest));
}

// --- CSS Task ---
function minifyCss() {
    return src(paths.css.src)
        // Minify the CSS file
        .pipe(cleanCSS({compatibility: 'ie11'}))
        // Rename the output file to main.min.css
        .pipe(rename({ suffix: '.min' }))
        // Output the file to the assets/css directory
        .pipe(dest(paths.css.dest));
}

// --- Watch Task ---
function watchFiles() {
    // Watch the custom.js file and run minifyJs on changes
    watch(paths.js.src, series(minifyJs));
    // Watch the main.css file and run minifyCss on changes
    watch(paths.css.src, series(minifyCss));
}

// --- Exported Gulp Tasks ---

// The 'build' task runs minification once.
exports.build = series(minifyCss, minifyJs);

// The 'watch' task starts the watchers.
exports.watch = watchFiles;

// Default task runs the build once, then starts watching.
exports.default = series(exports.build, exports.watch);