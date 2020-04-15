const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const ManifestPlugin = require("webpack-manifest-plugin");
const WebpackNotifier = require("webpack-notifier");
const ForkTsCheckerWebpackPlugin = require("fork-ts-checker-webpack-plugin");
const { BundleAnalyzerPlugin } = require("webpack-bundle-analyzer");

const hot = process.argv.includes("--hot");
const production = process.argv.includes("production");
const watching = process.argv.includes("--watch") || hot;
const analyze = process.argv.includes("--analyze");

const entry = {
    "js/staff/app": "./resources/js/staff/app.tsx",
    "css/staff/app": "./resources/css/staff/app.css",
};

if (analyze) {
    delete entry["css/staff/app"];
}

module.exports = {
    entry,

    output: {
        path: `${__dirname}/public`,
        publicPath: hot ? "http://localhost:9000/" : "/",
        filename: hot ? "[name].js" : "[name].[contenthash].js",
        chunkFilename: hot ? "js/[name].js" : "js/[name].[contenthash].js",
    },

    module: {
        rules: [
            {
                test: /\.(js|tsx?)$/,
                use: "babel-loader",
                exclude: /node_modules/,
            },
            {
                test: /\.css$/,
                use: ["style-loader", { loader: "css-loader", options: { url: false } }, "postcss-loader"],
            },
        ],
    },

    resolve: {
        extensions: [".js", ".ts", ".tsx", ".css"],

        modules: [`${__dirname}/resources/js`, "node_modules"],
    },

    plugins: [
        new ManifestPlugin({
            fileName: "mix-manifest.json",
            basePath: "/",
            writeToFileEmit: true,
        }),

        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [`${__dirname}/public/js/*`, `${__dirname}/public/css/*`],
        }),

        ...(!production
            ? [
                  new WebpackNotifier({
                      alwaysNotify: true,
                      excludeWarnings: true,
                  }),
              ]
            : []),

        ...(watching
            ? [
                  new ForkTsCheckerWebpackPlugin({
                      logger: {
                          error: (output) => console.error(output),
                          warn: (output) => console.warn(output),
                          info: (output) => {
                              if (!output.startsWith("Version:")) {
                                  console.info(output);
                              }
                          },
                      },
                  }),
              ]
            : []),

        ...(analyze ? [new BundleAnalyzerPlugin()] : []),
    ],

    stats: "minimal",

    performance: {
        hints: false,
    },

    devServer: {
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Headers": "*",
        },
        contentBase: __dirname,
        historyApiFallback: true,
        port: 9000,
        disableHostCheck: true,
        noInfo: true,
        compress: true,
        quiet: true,
    },
};
