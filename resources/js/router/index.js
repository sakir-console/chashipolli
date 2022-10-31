import Vue from 'vue'
import VueRouter from 'vue-router'
import Notfound from '../components/NotFound'
import Home from '../components/pages/home'
import Login from '../components/pages/login'
import Register from '../components/pages/register'
import Product from '../components/pages/products'
import ViewProduct from '../components/pages/view_product'
import Cart from '../components/pages/cart'
import Checkout from '../components/pages/checkout'
import Order from '../components/pages/order_list'
import orderProduct from '../components/pages/order_info'
import AddressBook from '../components/pages/addressbook'
import coupon from "../components/pages/coupon";
import bonus from "../components/pages/bonus";
import dashboard from "../components/pages/dashboard";
import referral from "../components/pages/referral";
import success from "../components/pages/success";


Vue.use(VueRouter);

const routes=new VueRouter({
    mode:'history',
    routes:[

        {
        path: '*',
        component:Notfound,
        },

        {
        path: '/',
        component:Home,
        name: 'home'
        },
        {
        path: '/login',
        component:Login,
        name: 'login',
            meta: {
                loggedIn: true
            }
        },
        {
            path: '/register',
            component:Register,
            name: 'register',
            meta: {
                loggedIn: true
            }
        },
        {
        path: '/products',
        component:Product,
        name: 'products'
        },

        {
        path: '/view-product',
        component:ViewProduct,
        name: 'view-product'
        },

        {
        path: '/cart',
        component:Cart,
        name: 'cart',
            meta: {
                requireAuth: true
            }
        },
        {
        path: '/checkout',
        component:Checkout,
        name: 'checkout',
            meta: {
                requireAuth: true
            }
        },
        {
        path: '/orders',
        component:Order,
        name: 'orders',
            meta: {
                requireAuth: true
            }
        },
        {
        path: '/orders/products',
        component:orderProduct,
        name: 'orderProducts'
        },
        {
        path: '/addressbook',
        component:AddressBook,
        name: 'addrbook'
        },
        {
        path: '/coupons',
        component:coupon,
        name: 'coupons'
        },
        {
        path: '/bonus',
        component:bonus,
        name: 'bonus',
            meta: {
                requireAuth: true
            }
        },
        {
        path: '/dashboard',
        component:dashboard,
        name: 'dashboard',
            meta: {
                requireAuth: true
            }
        },
        {
        path: '/referral',
        component:referral,
        name: 'referral',
            meta: {
                requireAuth: true
            }
        },
        {
        path: '/success',
        component:success,
        name: 'success',
            meta: {
                requireAuth: true
            }
        }

    ],

    scrollBehavior() {
        window.scrollTo(0,0);
    }
});



routes.beforeEach((to, from, next) => {

    const logged=localStorage.getItem('logged')
    if (to.matched.some(record => record.meta.requireAuth)) {

        if (logged==null) {
            next({name:'login'})
        } else {
            next()
        }
    }

    if (to.matched.some(record => record.meta.loggedIn)) {
        if (logged==null) {
            next()
        } else {
            next({name:'dashboard'})
        }
    }else {
        next()
    }



});




export default routes;
