<template>
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Order Infomation</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title">Order Information</h2>

                <table v-if="!orderInfo.isEmpty" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td colspan="2" class="text-left">Order Details</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 50%;" class="text-left"> <b>Order No:</b>  {{orderInfo.order_number}}
                            <br>
                            <b>Date Added:</b> {{orderInfo.Created}}</td>
                        <td style="width: 50%;" class="text-left"> <b>Payment Status:</b>  {{orderInfo.payment_status}}
                            <br>
                            <b>Delivery Status:</b>  {{orderInfo.delivery_status}} </td>
                    </tr>
                    </tbody>
                </table>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-left">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-right">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                            <td style="width: 0px;"></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product,index) in orderList" :key="product.id">

                            <td class="text-left"><img width="70px" :src="'/uploads/images/products/'+product.images[0]['img_name']"  class="img-thumbnail" /> </td>
                            <td class="text-left">{{product.product_name}} </td>
                            <td class="text-left">{{product.quantity}}</td>
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

                            <td style="white-space: nowrap;" class="text-right">
                                <router-link :to="{path:'/view-product?id='+product.product_id}" class="btn btn-danger" title="View Product" data-toggle="tooltip" data-original-title="Return"><i class="fa fa-eye"></i></router-link>
                            </td>
                        </tr>

                        </tbody>
                        <tfoot>

                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Paid Amount</b>
                            </td>
                            <td class="text-right"> = {{orderInfo.price}} </td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
<!--

                <div class="buttons clearfix">
                    <div class="pull-right"><a class="btn btn-primary" href="#">Print</a>
                    </div>
                </div>

-->


            </div>
            <!--Middle Part End-->
            <!--Right Part Start -->
            <aside class="col-sm-3 hidden-xs" id="column-right">
                <h2 class="subtitle">Account</h2>
                <div class="list-group">
                    <ul class="list-item">
                        <li><a href="login.html">Login</a>
                        </li>
                        <li><a href="register.html">Register</a>
                        </li>
                        <li><a href="#">Forgotten Password</a>
                        </li>
                        <li><a href="#">My Account</a>
                        </li>

                    </ul>
                </div>
            </aside>
            <!--Right Part End -->
        </div>
    </div>
    <!-- //Main Container -->
</template>

<script>
export default {
    name: "order_info",
    data() {
        return {

            orderInfo: [],
            orderList: [],
            msg:'',


        }
    },
    methods: {

        myOrderInfo() {

            axios.get(this.$api_url + 'api/v1/order/products?OId='+this.$route.query.OId, {}
            ).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.orderInfo = response.data.data.OrderInfo[0];
                    this.orderList = response.data.data.ProductList;

                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },

    },
    mounted() {

        this.myOrderInfo()
    }
}
</script>

<style scoped>

</style>
