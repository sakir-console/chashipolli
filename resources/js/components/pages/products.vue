<template>
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    <div class="category-derc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        <a  href="#"><img style="height: 170px;width: 100%;" :src="'/uploads/images/CATS/'+cats[0].icon" alt="Apple Cinema 30&quot;"><br></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Filters -->
                    <div class="product-filter filters-panel">
                        <div class="row">

                        </div>
                    </div>
                    <!-- //end Filters -->
                    <!--changed listings-->
                    <div class="products-list row grid">

                        <div v-for="(product,index) in products" :key="product.id" class="product-layout col-md-3 col-sm-6 col-xs-12">
                            <div class="product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container lazy second_img  lazy-loaded">
                                        <img style="height: 165px;width: 100%;" :data-src="'/uploads/images/products/'+product.images[0]['img_name']" :src="'/uploads/images/products/'+product.images[0]['img_name']" alt="Apple Cinema 30&quot;" class="img-1 img-responsive">
                                        <img style="height: 165px;width: 100%;" :data-src="'/uploads/images/products/'+product.images[1]['img_name']" :src="'/uploads/images/products/'+product.images[1]['img_name']" alt="Apple Cinema 30&quot;" class="img-2 img-responsive">
                                    </div>
                                    <!--Sale Label-->
                                    <span class="label label-sale">Sale</span>

                                </div>


                                <div class="right-block">
                                    <div class="caption">
                                        <h4> <router-link :to="{path:'view-product?id='+product.id}">{{product.name}}</router-link></h4>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span class="price-new">৳ {{product.special_price}} </span><font size="2">/{{product.unit}}</font><span class="price-old">৳ {{product.price}}</span>
                                            <font style="font-size: 13px;color: cadetblue;">
                                            Sold: {{product.sold_count}}</font>
                                        </div>


                                    </div>
                                </div><!-- right block -->
                                <div class="button-group">
                                    <button class="addToCart" type="button" data-toggle="tooltip" title="" v-on:click="addCart(product.id,product.name)" title="Add to Cart"><i class="fa fa-shopping-cart"></i>  <span class="hidden-xs name-cart">Add to Cart</span></button>
                                </div>
                            </div>
                        </div>


                        <div class="clearfix visible-xs-block"></div>

                    </div>




                    <!--// End Changed listings-->
                    <!-- Filters -->
                    <div class="product-filter product-filter-bottom filters-panel" >
                        <div class="row">
                            <div class="col-md-2 hidden-sm hidden-xs">
                            </div>
                            <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
                                <div class="form-group" style="margin: 3px 10px">Showing {{display.per_page}}  of   {{display.total}} Products ({{display.last_page}} Pages)</div>
                            </div>
                            <div class="box-pagination col-md-3 col-sm-4 text-right"><ul class="pagination">

                                <li v-for="index in display.last_page" :key="index"><a @click.prevent="viewProducts(index)">{{index}}</a></li>


                            </ul></div>

                        </div>
                    </div>
                    <!-- //end Filters -->

                </div>
            </div>

            <!--Right Part Start -->
            <aside class="col-md-3 col-sm-4" id="column-right">
                <div class="module menu-category titleLine">
                    <h3 class="modtitle"><span>Sub Categories</span></h3>
                    <div class="modcontent">
                        <div class="box-category">
                            <ul v-for="(subcat,index) in subcats" v-bind:key="index" id="cat_accordion" class="list-group">



                                <li class="">


                                    <a  :href="`products?subcat=`+subcat.id" class="clearfix"><i class="fa fa-pencil-square-o"></i> <strong>
                                        <span>{{subcat.name}}</span>
                                        <b class="fa fa-angle-right"></b>
                                    </strong></a>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="module">
                    <div class="modcontent clearfix">
                        <div class="banners">
                            <div>
                                <a href="#"><img src="assets/image/demo/cms/left-image-static.png" alt="left-image"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </aside>
            <!--right Part End -->
        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->


</template>

<script>
export default {

data() {
    return {

        result: false,
        msg: '',
        cats:[],
        products: [],
        display:[],
        subcats: [],




    }
},
methods: {
    productClick(item) {
        let data = {
            id: 25,
            description: "pass data through params"
        };
        this.$router.push({
            name: "view-product", //use name for router push
            params: {item}
        });
    },


    viewCategories() {
        axios.get(this.$api_url + 'api/v1/view/categories', {
            params: {
                'cat_id':this.$route.query.cat,


            }
        }).then(
            response => {
                this.result = true;
                console.log(response);
                this.cats = response.data.data;
                this.msg = '';

            }
        ).catch((error) => {

            this.msg = error.response.data.message;
            console.log(error.response);
        });
    },
    viewSubCategories() {
        axios.get(this.$api_url + 'api/v1/view/sub-categories', {
            params: {'catId':this.$route.query.cat, }
        }).then(
            response => {
                this.result = true;
                console.log(response);
                this.subcats = response.data.data;
                this.msg = '';
                return this.subcats;
            }
        ).catch((error) => {

            this.msg = error.response.data.message;
            console.log(error.response);
        });
    },

    viewProducts(page) {
        axios.get(this.$api_url + 'api/v1/view/product', {
            params: {
                'cat':this.$route.query.cat,
                'top':this.$route.query.top,
                's':this.$route.query.search,
                'limit':12,
                'page':page

            }
        }).then(
            response => {
                this.result = true;
                console.log(response);
                this.products = response.data.data;
                this.display = response.data.display;

                this.msg = '';

            }
        ).catch((error) => {

            this.msg = error.response.data.message;
            console.log(error.response);
        });
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
    this.viewSubCategories();
    this.viewProducts(1);

}

};
</script>

<style scoped>

</style>
