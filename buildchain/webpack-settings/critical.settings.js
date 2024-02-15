// critical.settings.js

// node modules
require('dotenv').config();

// settings
module.exports = {
    critical: {
        base: '../cms/web/dist/criticalcss/',
        suffix: '_critical.min.css',
        criticalHeight: 1200,
        criticalWidth: 1200,
        pages: [
            {
                uri: "",
                template: "index"
            },
            {
                uri: "contact",
                template: "contact"
            },
            {
                uri: "club",
                template: "club"
            },
            {
                uri: "about",
                template: "about/index"
            },
            {
                uri: "account",
                template: "account/index"
            },
            {
                uri: "account/all-giving",
                template: "account/all-giving"
            },
            {
                uri: "blog",
                template: "blog/index"
            },
            {
                uri: "blog/20-000-cans",
                template: "blog/_entry"
            },
            {
                uri: "errors/error",
                template: "errors/error"
            },
            {
                uri: "errors/offline",
                template: "errors/offline"
            },
            {
                uri: "errors/503",
                template: "errors/503"
            },
            {
                uri: "errors/404",
                template: "errors/404"
            },
            {
                uri: "practice",
                template: "practice/index"
            },
            {
                uri: "stories",
                template: "stories/index"
            },
            {
                uri: "stories/adama",
                template: "stories/_entry"
            },
            {
                uri: "podcast",
                template: "podcast/index"
            },
            {
                uri: "podcast/1-1-the-suitcase",
                template: "podcast/_entry"
            }
        ]
    },
};
