const mix = require("laravel-mix");
const StyleLintPlugin = require("stylelint-webpack-plugin");

require("laravel-mix-eslint");

const proxy = "croustille.test";

mix
  .setPublicPath("public/dist")
  .setResourceRoot("/dist")
  .options({
    processCssUrls: false,
    purifyCss: false,
    postCss: [
      require("postcss-import"),
      require("postcss-extend-rule"),
      require("tailwindcss"),
      require(`rucksack-css`),
      require("postcss-preset-env")({ stage: 1 }),
    ],
  })
  .webpackConfig({
    plugins: [
      new StyleLintPlugin({
        files: "./resources/css/**/*.css",
      }),
    ],
  })
  .eslint({
    fix: true,
  })
  .browserSync({
    proxy,
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
  .postCss("resources/css/app.css", "css")
  .copyDirectory("resources/fonts", "public/dist/fonts")
  .copyDirectory("resources/images", "public/dist/images")
  .sourceMaps()
  .extract()
  .version();
