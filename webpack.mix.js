const glob = require("glob");
const mix = require("laravel-mix");
const StyleLintPlugin = require("stylelint-webpack-plugin");

require("laravel-mix-eslint");

let cssFiles = glob.sync("resources/sass/**/*.scss");

mix
  .setPublicPath("public/dist")
  .setResourceRoot("/dist")
  .options({
    clearConsole: true,
    cssNano: true,
    postCss: [require(`tailwindcss`), require(`rucksack-css`)],
    // processCssUrls: false,
    purifyCss: {
      paths: cssFiles, // .concat(["node_modules/.../style.css"])
    },
  })
  .webpackConfig({
    plugins: [
      new StyleLintPlugin({
        files: "./resources/sass/**/*.scss",
      }),
    ],
  })
  .eslint({
    fix: true,
  })
  .browserSync({
    proxy: "example.test",
    // snippetOptions: {
    //   rule: {
    //     match: /<\/head>/i,
    //     fn: function (snippet, match) {
    //       return snippet + match;
    //     },
    //   },
    // },
  })
  .js("resources/js/app.js", "js")
  .js("resources/js/head.js", "js")
  .sass("resources/sass/app.scss", "css")
  // .copyDirectory("resources/fonts", "public/dist/fonts")
  .copyDirectory("resources/images", "public/dist/images")
  .sourceMaps()
  .extract()
  .version();
