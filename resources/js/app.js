import Vue from 'vue';
import routes from './router/index'
require('./bootstrap');


//Vue.prototype.$api_url = "https://127.0.0.1:8000/"
Vue.prototype.$api_url = "https://chashipolli.com/"
Vue.prototype.$cartUp = 0

Vue.component('header-menu', require('./components/Header').default);
Vue.component('footer-section', require('./components/Footer').default);
Vue.component('home-slider', require('./components/widgets/slider').default);
Vue.component('top-sold', require('./components/widgets/top-sold').default);
Vue.component('vert-menu', require('./components/widgets/vert-menu').default);
Vue.component('top-offer', require('./components/widgets/top-offer').default);

const app = new Vue({
    el: '#app',
    router:routes
});

const MyPlugin = {
    install(Vue, options) {

        Vue.prototype.globalHelper =
            function addProductCart(title, thumb, text, type) {
                $.jGrowl.defaults.closer = false;
                //Stop jGrowl
                //$.jGrowl.defaults.sticky = true;
                var tpl = thumb + '<h3>'+text+'</h3>';
                $.jGrowl(tpl, {
                    life: 4000,
                    header: title,
                    speed: 'slow',
                    theme: type
                });
            }

    },
}




Vue.use(MyPlugin)
