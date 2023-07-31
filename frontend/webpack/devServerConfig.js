const getOptions = () => {
    return {
        port: 9300,
        hot: true,
        open: {
            target: ["./index.html"],
            app: {
                name: "brave",
                arguments: ["--incognito"]
            }
        },
        client: {
            progress: true,
            overlay: {
                errors: true,
                warnings: true
            }
        }
    };
};

module.exports = getOptions;
