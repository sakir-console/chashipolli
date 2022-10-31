<template :key="cartUp">
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Shopping Cart</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">Shopping Cart</h2>
                <div class="table-responsive form-group">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-center">Action</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product,index) in products" :key="product.id">
                            <td class="text-center"><a href="product.html"><img width="70px" :src="'/uploads/images/products/'+product.images[0]['img_name']"  class="img-thumbnail" /></a></td>
                            <td class="text-left"><a href="product.html">{{product.product_name}}</a><br />

                            <td class="text-left">{{product.quantity}}</td>
                            <td class="text-center" width="200px"><div class="input-group btn-block quantity">

                                <span class="input-group-btn">
                        <button @click="removeCart(product.product_id)" type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                        </span></div></td>

                            <td class="text-right">
                                <p v-if="product.special_price">
                                    ৳ {{product.special_price}}<br>
                                   <span style="text-decoration: line-through;"> ৳ {{product.single_price}}</span>
                                </p>
                                <p v-else>৳ {{product.single_price}}</p>

                            </td>
                            <td class="text-right">
                                <p v-if="product.special_price">
                                    ৳ {{product.special_price* product.quantity}}
                                </p>
                                <p v-else>৳ {{product.single_price* product.quantity}}</p>

                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
<!--
                <h3 class="subtitle no-margin">What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Use Coupon Code</h4>
                            </div>
                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">Enter your coupon here</label>
                                    <div class="input-group">
                                        <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control" />
                                        <span class="input-group-btn">
                      <input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..."  class="btn btn-primary" />
                      </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Use Gift Voucher</h4>
                            </div>
                            <div id="collapse-voucher" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-voucher">Enter gift voucher code here</label>
                                    <div class="input-group">
                                        <input type="text" name="voucher" value="" placeholder="Enter gift voucher code here" id="input-voucher" class="form-control" />
                                        <span class="input-group-btn">
                      <input type="submit" value="Apply Voucher" id="button-voucher" data-loading-text="Loading..."  class="btn btn-primary" />
                      </span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
-->

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                <td class="text-right">৳ {{checkout.sub_total}}</td>
                            </tr>

                            <tr>
                                <td class="text-right"><strong>Bonus:</strong></td>
                                <td class="text-right">৳ {{checkout.bonus_balance}}</td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="buttons">
                    <div class="pull-left"><a href="/" class="btn btn-default">Continue Shopping</a></div>
                    <div class="pull-right"><router-link :to="{name:'checkout'}" class="btn btn-primary">Checkout</router-link></div>
                </div>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
    <!-- //Main Container -->
</template>

<script>
export default {
name: "cart",
    data() {
        return {

            result: false,
            msg: '',
            products: [],
            checkout:[],
            cartUp:0



        }
    },
    methods: {
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
               'product_id':pid
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.checkout = response.data.data;
                    this.msg = '';
                    this.cartUp += 1;
                    this.$router.go(this.$router.currentRoute)
                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },



    },
    beforeMount() {
        this.viewCart();
        this.checkoutShow();
    }

}
</script>

<style scoped>

</style>
