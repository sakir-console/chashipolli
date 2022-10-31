<template>
    <!-- Mod Deals -->
    <div class="module so-deals">
        <h3 class="modtitle"><span>Top solds</span></h3>
        <div class="modcontent">
            <div  id="so_deals_14513931681482050581" class="so-deal modcontent products-list grid clearfixbutton-type1 style2">
                <div class="extraslider-inner product-layout deal-slider">
                    <div v-for="(product,index) in products" :key="product.id" style="width: 200px;float:left;margin-right:15px;margin-top:10px" class="product-thumb transition product-item-container">
                        <div class="left-block">
                            <div class="product-image-container">
                                <div class="image">
                                    <span class="label label-sale">Sale</span>

                                    <router-link :to="{path:'view-product?id='+product.id}" class="lt-image" target="_self">
                                        <img style="height: 170px;" class="lazyload img-1 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" :data-src="'/uploads/images/products/'+product.images[0]['img_name']" alt="img" title="Juren tima chuk"/>
                                        <img style="height: 170px;" class="lazyload img-2 img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" :data-src="'/uploads/images/products/'+product.images[1]['img_name']" alt="img" title="Juren tima chuk"/>
                                    </router-link>

                                </div>
                            </div>
                        </div>
                        <div class="right-block">
                            <div class="caption">
                                <div class="rating">
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                </div>
                                <h4> <router-link :to="{path:'view-product?id='+product.id}">{{product.name}}</router-link></h4>
                                <p class="price">
                                    <span class="price-new">৳ {{product.special_price}} </span><font size="2">/{{product.unit}}</font><span class="price-old">৳ {{product.price}}</span>
                                </p>
                            </div>
                        </div>
                        <!-- End right block -->
                        <div class="button-group">
                            <button class="addToCart" type="button" data-toggle="tooltip" title="" v-on:click="addCart(product.id,product.name)" title="Add to Cart"><i class="fa fa-shopping-cart"></i>  <span class="hidden-xs name-cart">Add to Cart</span></button>
                        </div>
                    </div>

                </div>
            </div>

        </div><!--/.modcontent-->
    </div>
    <!-- End Mod -->
</template>

<script>
export default {
    name: "top-sold",
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
                params: {'top':'sold','limit':8 }
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
                    this.$cartUp += 1;
                    this.$router.go(this.$router.currentRoute)
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
        this.viewProducts();
    }
}
</script>

<style scoped>

</style>
