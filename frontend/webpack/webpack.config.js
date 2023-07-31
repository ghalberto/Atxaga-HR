//Path handling
const path = require("path");

//Plugins
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

//DevServer Config
const getOptions = require("./devServerConfig");
const pages = require("./params");

const webpackConfig = {
    entry: pages.reduce((config, page) => {
        config[page] = `./src/js/${page}.js`;
        return config;
    }, {}),
    output: {
        path: path.resolve(__dirname, "./../dist"),
        filename: "./assets/js/[name].js"
    },
    module: {
        rules: [
            {
                test: /\.hbs/,
                loader: "handlebars-loader"
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"]
            }
        ]
    },
    plugins: []
        .concat(
            pages.map(
                (page) =>
                    new HtmlWebpackPlugin({
                        inject: true,
                        template: `./src/${page}.hbs`,
                        filename: `${page}.html`,
                        chunks: [page]
                    })
            )
        )
        .concat(
            new MiniCssExtractPlugin({
                filename: "./assets/css/[name].css"
            })
        ),
    optimization: {
        splitChunks: { chunks: "all" },
        minimizer: [new CssMinimizerPlugin()]
    },
    devServer: getOptions()
};

module.exports = (_env, argv) => {
    webpackConfig.mode = argv.mode;

    return webpackConfig;
};
