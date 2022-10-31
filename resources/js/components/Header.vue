<template>
    <div :key="this.$cartUp">
        <!-- Header Container  -->
        <header id="headerx" class=" variantleft type_3">
            <!-- Header Top -->
            <div class="header-top compact-hidden">
                <div class="container">
                    <div class="row">
                        <div class="header-top-left  col-lg-4  hidden-sm col-md-5 hidden-xs">
                            <ul class="list-inlines">
                                <li class="hidden-xs">
                                    <div class="welcome-msg">
                                        <ul class="list-msg">
                                            <li><label class="label-msg">Best Quality</label> <a href="#">Get the best quality product - Chashipolli.com</a></li>
                                            <li><label class="label-msg">Organic</label> <a href="#">Get the best Organic product  - Chashipolli.com</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div class="header-top-right collapsed-block col-lg-8 col-sm-12 col-md-7 col-xs-12 ">
                            <h5 class="tabBlockTitle visible-xs"><marquee>Chashipolli.com - ভেজালের রাজ্যে নির্ভেজাল সবটুকুই</marquee></h5>
                            <div class="xtabBlock" id="xTabBlock-1">
                                <ul class="top-link list-inline">
                                    <li class="account" id="my_account">
                                        <a href="#" title="My Account" class="btn btn-xs dropdown-toggle"
                                           data-toggle="dropdown"> <span>My Account</span> <span
                                            class="fa fa-angle-down"></span></a>
                                        <ul class="dropdown-menu ">
                                            <li v-if="!logged">
                                                <router-link :to="{name:'register'}"><i class="fa fa-user"></i> Register
                                                </router-link>
                                            </li>
                                            <li v-if="!logged">

                                                <router-link :to="{name:'login'}"><i class="fa fa-pencil-square-o"></i>
                                                    Login
                                                </router-link>
                                            </li>

                                            <li v-if="logged">

                                                <router-link :to="{name:'dashboard'}"><i
                                                    class="fa fa-pencil-square-o"></i> Dashboard
                                                </router-link>
                                            </li>
                                            <li v-if="logged">

                                                <a @click="logout"><i class="fa fa-pencil-square-o"></i> Logout</a></li>
                                        </ul>
                                    </li>
                                    <li class="checkout hidden">
                                        <router-link :to="{name:'cart'}" class="top-link-checkout" title="Checkout">
                                            <span>Checkout</span></router-link>
                                    </li>
                                    <li class="login hidden"><a href="cart.html" title="Shopping Cart"><span>Shopping Cart</span></a>
                                    </li>

                                    <li class="form-group languages-block ">
                                        <form action="#" method="post" enctype="multipart/form-data" id="bt-language">
                                            <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                                <img src="assets/image/demo/flags/gb.png" alt="English" title="English">
                                                <span class="">English</span>
                                                <span class="fa fa-angle-down"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href=""><img class="image_flag"
                                                                    src="assets/image/demo/flags/gb.png" alt="English"
                                                                    title="English"/> English </a></li>

                                            </ul>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Header Top -->
            <!-- Header center -->
            <div class="header-center">
                <div class="container">
                    <div class="row">
                        <!-- Search -->
                        <div class="col-sm-4 header_search">
                            <div id="sosearchpro" class="search-pro">
                                <form method="GET" @submit.stop.prevent="ssubmit">
                                    <div id="search0" class="search input-group">


                                        <input v-model="search" class="autosearch-input form-control" type="text"
                                               value="" size="50" autocomplete="off" placeholder="Search your product.."
                                               name="search">
                                        <span class="input-group-btn">
										<button type="submit" class="button-search btn btn-primary"
                                                name="submit_search"><i class="fa fa-search"></i></button>
										</span>
                                    </div>
                                    <input type="hidden" name="route" value="product/search"/>
                                </form>
                            </div>
                        </div>
                        <!-- //end Search -->
                        <!-- Logo -->
                        <div class="navbar-logo col-sm-4 col-xs-12 text-center">
                            <a href="/"><img class="lazyload" data-sizes="auto" src="assets/image/logos/cp.png"
                                                      style="height: 32.5px;width: 120px;" title="চাষি পল্লী"
                                                      alt="চাষি পল্লী"/></a>
                        </div>
                        <!-- //End Logo -->
                        <!-- Phone -->
                        <div class="header-center-right col-sm-4">
                            <div class="hidden-xs">
                                <div class="phone-contact hidden-xs">
                                    <div class="inner-info">
                                        <h2>Hotline:</h2>
                                        <p> 01313-138713</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //End Phone -->
                    </div>
                </div>
            </div>
            <!-- //Header center -->
            <!-- Header Bottom -->
            <div class="header-bottom compact-hidden">
                <div class="container">
                    <div class="header-bottom-inner">
                        <div class="row">
                            <div class="header-bottom-menu col-md-10 col-sm-9 col-xs-4">
                                <div class="responsive so-megamenu  megamenu-style-dev">
                                    <nav class="navbar-default">
                                        <div class=" container-megamenu  horizontal">
                                            <div class="navbar-header">
                                                <button type="button" id="show-megamenu" data-toggle="collapse"
                                                        class="navbar-toggle">
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                            </div>

                                            <div class="megamenu-wrapper ">
                                                <span id="remove-megamenu" class="fa fa-times"></span>
                                                <div class="megamenu-pattern">
                                                    <div class="container">
                                                        <ul class="megamenu " data-transition="slide"
                                                            data-animationtime="250">
                                                            <li class="home hover">
                                                                <a :href="`/`">Home </a>

                                                            </li>


                                                            <!--
                                                                                                                        <li class="with-sub-menu hover">
                                                                                                                            <p class="close-menu"></p>
                                                                                                                            <a href="#" class="clearfix">
                                                                                                                                <strong>


                                                                                                                                    Products</strong>
                                                                                                                                <b class="caret"></b>
                                                                                                                            </a>
                                                                                                                            <div class="sub-menu" style="width: 40%; ">
                                                                                                                                <div class="content" >
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-md-6">
                                                                                                                                            <ul class="row-list">
                                                                                                                                                <li><a class="subcategory_item" href="faq.html">New products</a></li>

                                                                                                                                            </ul>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-md-6">
                                                                                                                                            <ul class="row-list">
                                                                                                                                                <li><a class="subcategory_item" href="about-us.html">Popular products</a></li>

                                                                                                                                            </ul>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </li>
                                                            -->

                                                            <li class="hidden-md color-buy">
                                                                <p class="close-menu"></p>
                                                                <router-link :to="{path:'products?top=off'}"
                                                                             class="clearfix">
                                                                    <strong>Top offers</strong>
                                                                </router-link>
                                                            </li>


                                                            <li class="hidden-md color-buy">
                                                                <p class="close-menu"></p>
                                                                <router-link :to="{path:'products?top=sold'}"
                                                                             class="clearfix">
                                                                    <strong>Top solds</strong>
                                                                </router-link>
                                                            </li>


                                                            <li class="">
                                                                <p class="close-menu"></p>
                                                                <router-link :to="{path:'coupons'}" class="clearfix">
                                                                    <strong>Coupons</strong>
                                                                    <span class="label"></span>
                                                                </router-link>
                                                            </li>


                                                            <li v-if="logged" class="">
                                                                <p class="close-menu"></p>
                                                                <router-link :to="{path:'dashboard'}" class="clearfix">
                                                                    <strong>Dashboard</strong>
                                                                    <span class="label"></span>
                                                                </router-link>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>

                            <!-- Cart Pro-->
                            <div class="block-cart col-md-2 col-sm-3 col-xs-8">
                                <div class="block-cart">
                                    <!--cart-->
                                    <div class="shopping_cart pull-right">
                                        <div id="cart" class=" btn-group btn-shopping-cart">
                                            <a href="/cart" class="btn-group top_cart dropdown-toggle"
                                               data-toggle="dropdown">
                                                <div class="shopcart">
                                                    <span class="handle pull-left"></span>
                                                    <span class="text-shopping-cart hidden-xs">	My cart	</span>
                                                    <span
                                                        class="total-shopping-cart cart-total-full">	 {{ products.length }}</span>
                                                </div>
                                            </a>
<!--
                                            <ul class="tab-content content dropdown-menu pull-right shoppingcart-box"
                                                role="menu">
                                                <li>
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr v-for="(product,index) in products" :key="product.id">
                                                            <td class="text-center" style="width:70px">
                                                                <a href="product.html"> <img class="lazyload preview"
                                                                                             data-sizes="auto"
                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                             :data-src="'/uploads/images/products/'+product.images[0]['img_name']"
                                                                                             style="width:70px"
                                                                                             alt="Filet Mign"
                                                                                             title="Filet Mign"> </a>
                                                            </td>
                                                            <td class="text-left"><a class="cart_product_name"
                                                                                     href="product.html">{{ product.product_name }}</a>
                                                            </td>
                                                            <td class="text-center"> x{{ product.quantity }}</td>
                                                            <td class="text-center"> ৳ {{ product.single_price }}</td>
                                                            <td class="text-right">
                                                                <a href="product.html" class="fa fa-edit"></a>
                                                            </td>
                                                            <td class="text-right">
                                                                <button @click="removeCart(product.product_id)"
                                                                        class="fa fa-times fa-delete"></button>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </li>
                                                <li>
                                                    <div>
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                            <tr>
                                                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                                                <td class="text-right">৳ {{ checkout.sub_total }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right"><strong>Shipping:</strong></td>
                                                                <td class="text-right">৳ {{ checkout.shipping }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right"><strong>Bonus:</strong></td>
                                                                <td class="text-right">৳ {{ checkout.bonus_balance }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right"><strong>Total:</strong></td>
                                                                <td class="text-right">৳ {{ checkout.total }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <p class="text-center">
                                                            <a href="/cart" class="btn view-cart">
                                                                <i class="fa fa-shopping-cart"></i>View Cart
                                                            </a>&nbsp;&nbsp;&nbsp;
                                                            <a href="/checkout" class="btn btn-mega checkout-cart">
                                                                <i class="fa fa-share"></i>Checkout
                                                            </a>
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                            -->

                                        </div>
                                    </div>
                                    <!--//cart-->
                                </div>
                            </div>
                            <!-- //End Cart Pro -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- //Header Container  -->
    </div>
</template>

<script>
export default {
    name: "header-menu",
    data() {
        return {

            result: false,
            msg: '',
            products: [],
            checkout: [],

            search: '',
            logged: false


        }
    },
    methods: {
        ssubmit() {
            //if you want to send any data into server before redirection then you can do it here
            this.$router.push("/products?search=" + this.search);
        },


        viewCart() {
            axios.get(this.$api_url + 'api/v1/my/carts', {
                params: {}
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.products = response.data.data;

                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },
        checkoutShow() {
            axios.post(this.$api_url + 'api/v1/checkout', {
                params: {}
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.checkout = response.data.data;

                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },

        removeCart(pid) {
            axios.post(this.$api_url + 'api/v1/delete/cart', {
                'product_id': pid
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.checkout = response.data.data;
                    this.msg = '';
                    this.$cartUp += 1;
                    this.$router.go(this.$router.currentRoute)
                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },

        logout() {
            localStorage.removeItem('logged')
            window.location.reload()
        }


    },
    mounted() {
        this.viewCart();
        this.checkoutShow();
        if (localStorage.getItem('logged') != null) {
            this.logged = true;
        } else {
            this.logged = false
        }
    }

}
</script>

<style scoped>

</style>
