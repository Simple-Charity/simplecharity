// app.settings.js

// node modules
require('dotenv').config();
const path = require('path');

// settings
module.exports = {
    alias: {
        'vue$': 'vue/dist/vue.esm.js',
        '@': path.resolve('../src'),
    },
    copyright: 'Simple Charity, Inc.',
    entry: {
        'app': [
            '@/js/app.js',
            '@/css/app.pcss',
        ],
        'lazysizes-wrapper': [
            '@/js/utils/lazysizes-wrapper.ts',
        ],
    },
    extensions: ['.ts', '.js', '.vue', '.json'],
    name: 'Simple Charity',
    paths: {
        dist: path.resolve('../cms/web/dist/'),
    },
    urls: {
        criticalCss: 'https://simplecharity.org/',
        publicPath: () => process.env.PUBLIC_PATH || '/dist/',
    },
};
