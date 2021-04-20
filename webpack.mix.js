const mix = require('laravel-mix')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix
  .setPublicPath('public/dist')
  .setResourceRoot('/dist')
  .browserSync({
    proxy: 'boilerplate.test',
    snippetOptions: {
      rule: {
        match: /<\/head>/i,
        fn: function (snippet, match) {
          return snippet + match
        },
      },
    },
  })

mix.postCss('resources/css/app.css', 'css', [
  require('postcss-import'),
  require('tailwindcss'),
  require('rucksack-css'),
  require('postcss-preset-env')({
    stage: 1,
    features: {
      'focus-within-pseudo-class': false, // fix issue with tailwind 2
    },
  }),
  require('postcss-extend-rule'),
  require('autoprefixer'),
])

mix
  .js('resources/js/app.js', 'js')
  .js('resources/js/head.js', 'js')
  .vue()
  .copyDirectory('resources/fonts', 'public/dist/fonts')
  .copyDirectory('resources/images', 'public/dist/images')
  .options({ processCssUrls: false })
  .sourceMaps()
  .extract()
  .version()
