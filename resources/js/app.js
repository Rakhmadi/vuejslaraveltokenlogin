
require('./bootstrap');
import Vrouter from 'vue-router'
window.Vue = require('vue');
import axios from 'axios'

Vue.use(Vrouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import store from './store'
import apps from './components/app.vue'
import home from './components/ExampleComponent.vue'
import singel from './components/singel.vue'
import datasd from './components/aldat.vue'
import n from './components/s.vue'
const router  = new Vrouter({
    mode:'hash',
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
        {
            path:'/data',
            name:'datas',
            component:datasd
        },{
            path:'/n',
            name:'n',
            component:n
        }

    ]
});
const app = new Vue({
    store,
    el: '#app',
    components:{ apps },
    router,
    
});
