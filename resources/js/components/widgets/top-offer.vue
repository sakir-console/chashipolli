<template>
    <!-- Mod Best Seller -->
    <div class="moduletable module best-seller clearfix ">
        <h3 class="modtitle"><span>Top offers</span></h3>
        <div id="sp_extra_slider_20796849091482058205" class="so-extraslider">
            <div class="extraslider-inner bvest-seller-slider">
                <div class="item ">
                    <div v-for="(product,index) in products" :key="product.id"  class="item-wrap style1">
                        <div class="item-wrap-inner media">
                            <div class="media-left">
                                <div class="item-image">
                                    <div class="item-img-info">
                                        <a href="product.html" class="lt-image" target="_self" title="Bikum masen dumas">
                                            <img style="height: 71px;" class="lazyload img-1 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" :data-src="'/uploads/images/products/'+product.images[0]['img_name']" alt="img" title="Apple Cinema 30&quot;"/>
                                            <img style="height: 71px;" class="lazyload img-2 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" :data-src="'/uploads/images/products/'+product.images[1]['img_name']" title="Apple Cinema 30&quot;"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="item-info">
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    </div>
                                    <div class="item-title">
                                        <router-link :to="{path:'view-product?id='+product.id}" target="_self" title="Bikum masen dumas">
                                            {{product.name}}											</router-link>
                                    </div>
                                    <!-- Begin item-content -->
                                    <div class="item-content">
                                        <div class="content_price">
                                            <span class="price product-price">৳ {{product.special_price}}</span>
                                        </div>
                                    </div>
                                    <!-- End item-content -->
                                </div>
                            </div><!-- End item-info -->
                        </div>
                        <!-- End item-wrap-inner -->
                    </div>

                    <!-- End item-wrap -->
                </div>

            </div>
        </div>
    </div>
    <!-- //End Best Seller  -->

</template>

<script>
export default {
    name: "top-offer",
    data() {
        return {

            result: false,
            msg: '',
            products: [],



        }
    },
    methods: {
        viewProducts() {
            axios.get(this.$api_url + 'api/v1/view/product', {
                params: {'top':'off','limit':20 }
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



    },
    beforeMount() {
        this.viewProducts();
    }
}
</script>

<style scoped>

</style>
