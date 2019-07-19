const path = require('path');
const argv = require('yargs').argv;
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require("webpack");
const CopyWebpackPlugin = require('copy-webpack-plugin');
const fs = require('fs');


const isDevelopment = argv.mode === 'development';
const isProduction = !isDevelopment;
const distPath = path.join(__dirname, 'dist');

//function generateHtmlPlugins (templateDir) {
//  const templateFiles = fs.readdirSync(path.resolve(__dirname, templateDir))
//  return templateFiles.map(item => {
//    const parts = item.split('.')
//    const name = parts[0]
//    const extension = parts[1]
//    return new HtmlWebpackPlugin({
//      filename: `${name}.html`,
//      inject:true,    
//      template: path.resolve(__dirname, `${templateDir}/${name}.${extension}`)
//    })
//  })
//}
//
//const htmlPlugins = generateHtmlPlugins('./src/pages');

const config = {
    entry: {
        main: './src/js/main.js'
    },
    output: {
        filename: './js/main-bundle.js',
        path: distPath
    },
    module: {
        rules: [{
            test: /\.html$/,
            use: 'html-loader'
    }, {
            test: /\.js$/,
            exclude: /node_modules/,
            use: [{
                loader: 'babel-loader'
      }]
    }, {
            test: /\.scss$/,
            exclude: /node_modules/,
            use: [
        isDevelopment ? 'style-loader' : MiniCssExtractPlugin.loader,
        'css-loader',
                {
                    loader: 'postcss-loader',
                    options: {
                        plugins: [
                          isProduction ? require('cssnano') : () => {},
                          require('autoprefixer')({
                                browsers: ['last 4 versions']
                            })
                        ],
                    }
        },
        'sass-loader'
      ]
    }, {
            test: /\.(gif|png|jpe?g|svg)$/i,
            use: [{
                    loader: 'url-loader',
                    options: {
                        name: './images/[name].[ext]',
                        limit: 1 * 1024
                    },

      }, {
                    loader: 'image-webpack-loader',
                    options: {
                        mozjpeg: {
                            progressive: true,
                            quality: 70
                        },
                        pngquant: {
                          quality: '70',
                          speed: 4
                        }
                    }
      },
      ],
    }, {
            test: /\.(eot|svg|ttf|woff|woff2)$/,
            exclude: /images/,
            use: {
                loader: 'file-loader',
                options: {
                    name: './fonts/[name][hash].[ext]'
                }
            },
    }]
    },
    plugins: [
    new MiniCssExtractPlugin({
            filename: './[name].css',
            chunkFilename: '[id].css'
    }),
    new HtmlWebpackPlugin({
      template: './src/index.html',
      inject:true,    
      filename: 'index.html'
    }),
    new HtmlWebpackPlugin({
      template: './src/local-move.html',
      inject: true,
      filename: 'local-move.html'
    }),
    new HtmlWebpackPlugin({
      template: './src/interstate-move.html',
      inject: true,
      filename: 'interstate-move.html'
    }),
    new HtmlWebpackPlugin({
      template: './src/commercial-move.html',
      inject: true,
      filename: 'commercial-move.html'
    }),
    new HtmlWebpackPlugin({
      template: './src/packing.html',
      inject: true,
      filename: 'packing.html'
    }),
    new HtmlWebpackPlugin({
      template: './src/storage.html',
      inject: true,
      filename: 'storage.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/cleaning.html',
      inject: true,
      filename: 'cleaning.html'
    }),
    
    new HtmlWebpackPlugin({
      template: './src/blog.html',
      inject: true,
      filename: 'blog.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/blog-inner.html',
      inject: true,
      filename: 'blog-inner.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/blog-single.html',
      inject: true,
      filename: 'blog-single.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/privacy-police.html',
      inject: true,
      filename: 'privacy-police.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/about-us.html',
      inject: true,
      filename: 'about-us.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/site-map.html',
      inject: true,
      filename: 'site-map.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/cubometr.html',
      inject: true,
      filename: 'cubometr.html'
    }),
        
    new HtmlWebpackPlugin({
      template: './src/free-quote.html',
      inject: true,
      filename: 'free-quote.html'
    }),
        
        
    
    new webpack.ProvidePlugin({
        $: 'jquery',
        '$': 'jquery',
        jquery: 'jquery',
        jQuery: 'jquery',
        'window.jquery': 'jquery',
        'window.jQuery': 'jquery',
        'window.$': 'jquery'
    }),
  ],
    optimization: isProduction ? {
        minimizer: [
      new UglifyJsPlugin({
                sourceMap: true,
                uglifyOptions: {
                    compress: {
                        inline: false,
                        drop_console: true
                    },
                },
            }),
    ],
    } : {},
    devServer: {
        contentBase: distPath,
        port: 8000,
        compress: true,
        open: true
    }
};

module.exports = config;
