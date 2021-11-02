const mix = require('laravel-mix');

mix.setPublicPath('./webroot')
    //.js('resources/js/app.js', 'webroot/js')
    .sass('resources/sass/app.scss', 'webroot/css')
    .webpackConfig({
        module: {
          rules: [
            {
              test: /\.tsx?$/,
              loader: "ts-loader",
              exclude: /node_modules/
            }
          ]
        },
        resolve: {
          extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"],
          alias: {
            app: __dirname + '/resources/js',
          },
        }
      })
    .ts('resources/js/app.ts', 'webroot/js')
    .sourceMaps()
    .version();
