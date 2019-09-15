
require('./bootstrap');
import Vrouter from 'vue-router'
window.Vue = require('vue');
import axios from 'axios'

Vue.use(Vrouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import apps from './components/app.vue'
import home from './components/ExampleComponent.vue'
import singel from './components/singel.vue'
const router  = new Vrouter({
    mode:'history',
    routes:[
        {
            path:'/home',
            name:'home',
            component:home
        },
        {
            path:'/single',
            name:'singel',
            component:singel
        },

    ]
});
const app = new Vue({
    el: '#app',
    components:{ apps },
    router,
});
