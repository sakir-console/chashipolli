<template>
    <main id="content" class="page-main">
        <!-- Block Spotlight1  -->
        <div class="so-spotlight1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <vert-menu></vert-menu>
                        <top-offer></top-offer>
                        <!-- Brand -->
                        <div class="module so-manu-slider">
                            <h3 class="modtitle">
                                <span><span class="first">Our</span> brand</span>
                                <a class="view-all-brand" href="#" title="View All">View All</a>
                            </h3>
                            <div class="wrap_manu_slider">
                                <div class="manu-slider-inner">
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/image/demo/brands/2.jpg" data-sizes="auto" alt="image"
                                                 class="lazyload img-responsive">

                                        </a>
                                    </div>
                                    <!--<div class="item">
                                        <a href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/brands/3.jpg" alt="image" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/brands/4.jpg" alt="image" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/brands/5.jpg" alt="image" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/brands/6.jpg" alt="image" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/brands/7.jpg" alt="image" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/brands/8.jpg" alt="image" class="img-responsive"></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/demo/brands/9.jpg" alt="image" class="img-responsive"></a>
                                        </div>-->
                                </div>
                            </div>
                        </div>
                        <!-- //End Brand -->
                    </div>


                    <div class="col-md-9 col-sm-8 col-xs-12">

                        <home-slider></home-slider>

                        <top-sold></top-sold>
                        <div v-for="(cat,index) in cats" v-bind:key="index">
                            <!-- Mod Category Slider1 -->
                            <div id="so_category_slider_home2" class="container-slider module  item-1">
                                <div class="page-top">

                                    <router-link :to="{path:'products?top=off&cat='+cat.id}">
                                    <h3 class="modtitle">
                                        <span>	{{ cat.name }} </span>
                                    </h3></router-link>
                                    <div class="item-sub-cat">
                                        <ul>
                                            <li v-for="(subcat,ind) in subcats[index]" v-bind:key="ind">
                                                <router-link :to="{path:'products?cat='+cat.id}">{{ subcat.name }}</router-link>
                                            </li>

                                        </ul>
                                    </div>
                                </div> <!-- /.page-top -->
                                <!-- /.item-cat-image -->
                                <div class="item-cat-image">
                                    <a href="#" title="Banner"><img style="height: 170px;width: 100%;" class="lazyload" data-sizes="auto"
                                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                    :data-src="'/uploads/images/CATS/'+cat.icon"
                                                                    alt="Banner"></a>
                                </div>
                                <!-- /.item-cat-image -->
                                <div class="modcontent">
                                    <div
                                        class="categoryslider-content products-list s grid show preset01-4 preset02-3 preset03-2 preset04-2 preset05-1">
                                        <div class="slider so-category-slider not-js product-layout">

                                            <div v-for="(product,inx) in products[index]" v-bind:key="inx" style="width: 200px;float:left;margin-right:15px;margin-top:10px"
                                                 class="item product-layout">
                                                <div class="item-inner product-thumb transition product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container second_img">
                                                            <div class="image">
                                                                <span class="label label-sale">Sale</span>
                                                                <span class="label label-new">New</span>

                                                                <router-link :to="{path:'view-product?id='+product.id}" class="lt-image"  target="_self">
                                                                    <img style="height: 170px;" class="lazyload img-1 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" :data-src="'/uploads/images/products/'+product.images[0]['img_name']" alt="img" title="Juren tima chuk"/>
                                                                    <img style="height: 170px;" class="lazyload img-2 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" :data-src="'/uploads/images/products/'+product.images[1]['img_name']" alt="img" title="Juren tima chuk"/>
                                                                </router-link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <div class="rating">
                                                                <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4> <router-link :to="{path:'view-product?id='+product.id}">{{product.name}}</router-link></h4>
                                                            <p class="price">
                                                                <span class="price-new">৳ {{product.special_price}} </span><font size="2">/{{product.unit}}</font><span class="price-old">৳ {{product.price}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="button-group">

                                                        <button class="addToCart" type="button" data-toggle="tooltip"
                                                                title="Add to Cart" v-on:click="addCart(product.id,product.name)"><i
                                                            class="fa fa-shopping-cart"></i> <span
                                                            class="hidden-xs"></span></button>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Block Spotlight3  -->
        <div class="so-spotlight3">
            <div class="container">
                <ul class="mudule list-services row">
                    <li class="item-service col-lg-4 col-md-4 col-sm-4 col-xs-12"><a title="Free Shipping" href="#"><img
                        class="lazyload" data-sizes="auto"
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="assets/image/demo/cms/free-shipping.png" alt="Free Shipping"></a></li>
                    <li class="item-service col-lg-4 col-md-4 col-sm-4 col-xs-12"><a title="Guaranteed" href="#"><img
                        class="lazyload" data-sizes="auto"
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="assets/image/demo/cms/guaranteed.png" alt="Guaranteed"></a></li>
                    <li class="item-service col-lg-4 col-md-4 col-sm-4 col-xs-12"><a title="Deal" href="#"><img
                        class="lazyload" data-sizes="auto"
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="assets/image/demo/cms/deal.png" alt="Deal"></a></li>
                </ul>
            </div>
        </div>

    </main>
    <!-- //Main Container -->

</template>

<script>
export default {

    name: "home",
    data() {
        return {

            result: false,
            msg: '',
            cats: [],
            subcats: [],
            products: []


        }
    },
    methods: {
        viewCategories() {
            axios.get(this.$api_url + 'api/v1/view/categories', {
                params: {}
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.cats = response.data.data;
                    this.msg = '';

                    for (let i = 0; i < this.cats.length; i++) {
                        //  this.catsId.push(this.cats[i].id)
                        //  alert(this.cats[i].id)
                        this.viewSubCategories(this.cats[i].id)
                        this.viewProducts(this.cats[i].id)
                    }
                    // alert(this.catsId)
                }).catch((error) => {
                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },


        viewSubCategories(catId) {
            axios.get(this.$api_url + 'api/v1/view/sub-categories', {
                params: {'catId': catId}
            }).then(
                response => {
                    this.result = true;
                    console.log(response.data.data[0].name);
                    //alert(response.data.data[0].name);

                    this.subcats.push(response.data.data);
                    //  alert('added '+response.data.data.toString())
                }
            );
        },
        viewProducts(catId) {
            axios.get(this.$api_url + 'api/v1/view/product', {
                params: {
            'cat': catId,
                'limit':8
                }
            }).then(
                response => {
                    this.result = true;
                    console.log(response.data.data[0].name);
                    //alert(response.data.data[0].name);

                    this.products.push(response.data.data);
                    //  alert('added '+response.data.data.toString())
                }
            );
        },
        addCart(pid,pname) {
            axios.post(this.$api_url + 'api/v1/add/cart', {
                'product_id':pid,
                'qty':1
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.checkout = response.data.data;
                    this.msg = '';
                    this.cartUp += 1;

                    this.globalHelper(pname+' added to cart','','','')
                    // this.$router.go(this.$router.currentRoute)
                }
            ).catch((error) => {

                this.globalHelper('You Must login first','','','')
                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },
    },
    beforeMount() {
        this.viewCategories();
        // this.viewSubCategories(1);
    }
}
</script>

<style scoped>

</style>
