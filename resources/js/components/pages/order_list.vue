<template>
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Order History</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title">Order History</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">Orders</td>
                            <td class="text-left">Order number</td>
                            <td class="text-center">Order Invoice</td>
                            <td class="text-center">Order date</td>
                            <td class="text-center">Price</td>
                            <td class="text-center">Payment Status</td>
                            <td class="text-right">Delivery status</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(order,index) in myOrders" :key="order.id">
                            <td class="text-center">
                               <img width="85" class="img-thumbnail" title="Aspire" :src="`assets/image/orders.jpg`">

                            </td>
                            <td class="text-left"> {{order.order_number}}
                            </td>
                            <td class="text-center">{{order.invoice_id}}</td>
                            <td class="text-center">{{order.Created}}</td>
                            <td class="text-center">{{order.price}}</td>
                            <td class="text-center">{{order.payment_status}}</td>
                            <td class="text-right">{{order.delivery_status}}</td>
                            <td class="text-center"><router-link :to="{path:'orders/products?OId='+order.order_id}" class="btn btn-info" title="" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></router-link>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

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
                        <li><a href="#">Address Books</a>
                        </li>
                        <li><a href="wishlist.html">Wish List</a>
                        </li>
                        <li><a href="#">Order History</a>
                        </li>
                        <li>
                            <a href="#">Downloads</a>
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
    name: "order_list",
    data() {
        return {

            myOrders: [],
            msg:'',


        }
    },
    methods: {

        myOrdersShow() {

            axios.post(this.$api_url + 'api/v1/myorders', {}
            ).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.myOrders = response.data.data;

                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },

    },
    mounted() {

        this.myOrdersShow()
    }
}
</script>

<style scoped>

</style>
