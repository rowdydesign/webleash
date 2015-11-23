// ## Globals
/*global $:true*/
var $              = require('gulp-load-plugins')();
var argv           = require('minimist')(process.argv.slice(2));
var elixir         = require('laravel-elixir');
var gulp           = require('gulp');
var lazypipe       = require('lazypipe');
var merge          = require('merge-stream');
var rev            = require('gulp-rev');
var runSequence    = require('run-sequence');

var Task = elixir.Task;

// See https://github.com/austinpray/asset-builder
var manifest = require('asset-builder')('./resources/assets/manifest.json');

// `path` - Paths to base asset directories. With trailing slashes.
// - `path.source` - Path to the source files. Default: `assets/`
// - `path.dist` - Path to the build directory. Default: `dist/`
var path = manifest.paths;

// `config` - Store arbitrary configuration values here.
var config = manifest.config || {};

// `globs` - These ultimately end up in their respective `gulp.src`.
// - `globs.js` - Array of asset-builder JS dependency objects. Example:
//   ```
//   {type: 'js', name: 'main.js', globs: []}
//   ```
// - `globs.css` - Array of asset-builder CSS dependency objects. Example:
//   ```
//   {type: 'css', name: 'main.css', globs: []}
//   ```
// - `globs.fonts` - Array of font path globs.
// - `globs.images` - Array of image path globs.
// - `globs.bower` - Array of all the main Bower files.
var globs = manifest.globs;

// `project` - paths to first-party assets.
// - `project.js` - Array of first-party JS assets.
// - `project.css` - Array of first-party CSS assets.
var project = manifest.getProjectGlobs();

// CLI options
var enabled = {
  // Enable static asset revisioning when `--production`
  rev: argv.production,
  // Disable source maps when `--production`
  maps: !argv.production,
  // Fail styles task on error when `--production`
  failStyleTask: argv.production
};

// Path to the compiled assets manifest in the dist directory
var revManifest = path.dist + 'assets.json';

elixir.config.publicPath = 'public/build';
elixir.config.css.outputFolder = 'styles';
elixir.config.js.outputFolder = 'scripts';
elixir.config.versioning.buildFolder = '';

// ## Reusable Pipelines
// See https://github.com/OverZealous/lazypipe

// ## Gulp tasks
// Run `gulp -T` for a task summary

// ### Clean
// `gulp clean` - Deletes the build folder entirely.
gulp.task('clean', require('del').bind(null, [path.dist]));

gulp.task('compile', function() {
    // Run laravel's elixir
    elixir(function(mix) {

        // copy static assets
        for (var type in project) {
            if (type.toLowerCase() !== 'js' && type.toLowerCase() !== 'css') {
                mix.copy(manifest.paths.source + '/' + type, manifest.paths.dist + '/' + type);
            }
        }

        mix.sass('app.scss', 'public/build/styles/app.css');

        var cssDependencies = [];
        manifest.forEachDependency('css', function(dep) {
            cssDependencies += dep.globs;
        });
        cssDependencies = cssDependencies.replace("resources/assets/sass", "");
        cssDependencies = cssDependencies.split(',');
        mix.styles(cssDependencies, 'public/build/styles/plugins.css', '/');

        var jsDependencies = [];
        manifest.forEachDependency('js', function(dep) {
            jsDependencies += dep.globs;
        });
        jsDependencies = jsDependencies.split(',');
        mix.scripts(jsDependencies, 'public/build/scripts/plugins.js', '/');
        mix.scripts('scripts/console.js', 'public/build/scripts/console.js', './resources/assets/');
        mix.scripts('scripts/frontend.js', 'public/build/scripts/frontend.js', './resources/assets/');

        mix.version(['styles/app.css', 'styles/plugins.css', 'scripts/console.js', 'scripts/frontend.js', 'scripts/plugins.js']);

    });

});

// ### Watch
// `gulp watch` - Use BrowserSync to proxy your dev server and synchronize code
// changes across devices. Specify the hostname of your dev server at
// `manifest.config.devUrl`. When a modification is made to an asset, run the
// build step for that asset and inject the changes into the page.
// See: http://www.browsersync.io
gulp.task('watch', function() {
  gulp.watch([
    path.source + 'styles/**/*',
    path.source + 'scripts/**/*',
    path.source + 'fonts/**/*',
    path.source + 'images/**/*',
    'bower.json',
    'assets/manifest.json'
  ], ['build']);
});

// ### Build
// `gulp build` - Run all the build tasks but don't clean up beforehand.
// Generally you should be running `gulp` instead of `gulp build`.
gulp.task('build', function(callback) {
  runSequence('compile', callback);
});

// ### Gulp
// `gulp` - Run a complete build. To compile for production run `gulp --production`.
gulp.task('default', ['clean'], function() {
  gulp.start('build');
});
