const path = require('path')
const fs = require('fs-extra')
const mix = require('laravel-mix')
const webpack = require('webpack')

require('laravel-mix-versionhash')
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

mix
.js('resources/js/app.js', 'public/dist/js')
.sass('resources/sass/app.scss', 'public/dist/css')

.disableNotifications()

if (mix.inProduction()){
    mix
    // .extract() // Disabled until resolved: https://github.com/JeffreyWay/laravel-mix/issues/1889
    // .version() // Use `laravel-mix-versionhash` for the generating correct Laravel Mix manifest file.
    .versionHash()
} else {
    mix.sourceMaps()
}

mix.webpackConfig({
    plugins: [
        new webpack.ProvidePlugin({
            // $: 'jquery',
            // jQuery: 'jquery',
            moment: 'moment',
            // DataTable: 'DataTable',
            axios: 'axios',
            // '_': 'lodash',
            echarts: 'echarts'
        })
    ],
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
            '~': path.join(__dirname, './resources/js'),
            '@sass': path.join(__dirname, './resources/sass')
        }
    },
    output: {
        chunkFilename: 'dist/js/[chunkhash].js',
        path: mix.config.hmr ? '/' : path.resolve(__dirname, './public/build')
    }
})

mix.then(() =>{
    if (!mix.config.hmr){
        process.nextTick(() => publishAseets())
    }
})

function publishAseets(){
    const publicDir = path.resolve(__dirname, './public')

    if (mix.inProduction()){
        fs.removeSync(path.join(publicDir, 'dist'))
    }

    fs.copySync(path.join(publicDir, 'build', 'dist'), path.join(publicDir, 'dist'))
    fs.removeSync(path.join(publicDir, 'build'))
}
