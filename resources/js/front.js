window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import App from "./views/App.vue"

const app = new Vue({
    el: '#home_view',
    render: h => h(App)
});
