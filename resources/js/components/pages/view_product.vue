<template :key="cartUp">


    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">{{product[0].name}}</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-md-12 col-sm-12">

                <div class="product-view row">
                    <div class="left-content-product col-lg-10 col-xs-12">
                        <div class="row">
                            <div class="content-product-left  col-sm-7 col-xs-12 ">
<!--                                <div id="thumb-slider-vertical" class="thumb-vertical-outer">
                                    <span class="btn-more prev-thumb nt"><i class="fa fa-chevron-up"></i></span>
                                    <span class="btn-more next-thumb nt"><i class="fa fa-chevron-down"></i></span>
                                    <ul class="thumb-vertical">
                                        <li v-for="(img,index) in product[0].images" :key="img.id" class="owl2-item">
                                            <a data-index="0" class="img thumbnail" data-image="image/demo/shop/product/j9.jpg" title="Canon EOS 5D">
                                                <img :src="'/uploads/images/products/'+img.img_name" title="Canon EOS 5D" alt="Canon EOS 5D">
                                            </a>
                                        </li>

                                    </ul>


                                </div>-->
                                <div class="large-image  vertical">
                                    <img itemprop="image" class="product-image-zoom" :src="'/uploads/images/products/'+product[0].images[0]['img_name']" :data-zoom-image="'/uploads/images/products/'+product[0].images[0]['img_name']" title="Bint Beef" alt="Bint Beef">
                                </div>

                            </div>

                            <div class="content-product-right col-sm-5 col-xs-12">
                                <div class="title-product">
                                    <h1>{{product[0].name}}</h1>
                                </div>
                                <!-- Review ---->
                                <div class="box-review form-group">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>

                                    <a class="reviews_button" href="">Total sold: {{product[0].sold_count}}</a>

                                </div>

                                <div class="product-label form-group">
                                    <div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span> {{product[0].stock}}</div>
                                    <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                        <span class="price-new" itemprop="price">৳ {{product[0].special_price}}</span>
                                        <span class="price-old">৳ {{product[0].price}}</span>
                                    </div>

                                </div>

                                <div class="product-box-desc">
                                    <div class="inner-box-desc">
                                        <div class="price-tax"><span>Unit:</span> {{product[0].unit}}</div>
                                        <div class="brand"><span>Stock:</span><a href="#">{{product[0].stock}}</a>		</div>
                                        <div class="model"><span>Discout:</span> {{product[0].discount}}</div>
                                        <div class="reward"><span>Total sold:</span> {{product[0].sold_count}}</div>
                                    </div>
                                </div>


                                <div id="product">
                                    <h4>Available Options</h4>




                                    <div class="form-group box-info-product">
                                        <div class="option quantity">
                                            <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                                <label>Qty</label>
                                                <input v-model="qty" class="form-control" type="number" value="1">
                                                <input type="hidden" name="product_id" value="50">

                                            </div>
                                        </div>
                                        <div class="cart">
                                            <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" v-on:click="addCart(product[0].id,product[0].name)" data-original-title="Add to Cart">
                                        </div>


                                    </div>

                                </div>
                                <!-- end box info product -->
                            </div>
                        </div>
                    </div>

                    <section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
                        <div class="module col-sm-12 four-block">
                            <div class="modcontent clearfix">
                                <div class="policy-detail">
                                    <div class="banner-policy">
                                        <div class="policy policy1">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span>	90 day
                                                <br> money back </a>
                                        </div>
                                        <div class="policy policy2">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span>	In-store exchange </a>
                                        </div>
                                        <div class="policy policy3">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span>	lowest price guarantee </a>
                                        </div>
                                        <div class="policy policy4">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span>	shopping guarantee </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Product Tabs -->
                <div class="producttab ">
                    <div class="tabsslider  col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>

                        </ul>
                        <div class="tab-content col-xs-12">
                            <div id="tab-1" class="tab-pane fade active in">

                                <p><strong>Product description</strong></p>
                                <ul class="des-custom">
                                    <li>

                                        {{product[0].description}}
                                    </li>

                                </ul>

                            </div>

                        </div>
                    </div>
                </div>


            </div>


        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->

</template>

<script>



export default {
    name: "view_product",


    data() {
        return {

            result: false,
            msg: '',
            product: [],
            cartUp:0,
            qty:1
        }
    },
    methods: {
        viewProduct() {
            axios.get(this.$api_url + 'api/v1/view/product', {
                params: {
                    'id':this.$route.query.id,
                }
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.product = response.data.data;
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
                'qty':this.qty
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
        this.viewProduct();

    }




}
</script>

<style scoped>

</style>
