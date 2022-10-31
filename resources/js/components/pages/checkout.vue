<template>
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Checkout</a></li>

        </ul>

        <div class="row">

            <!--Middle Part Start-->
            <div id="content" class="col-sm-12"><h3 style="color: red;">{{ msg }}</h3>
                <h2 class="title">Checkout</h2>
                <div class="row">
                    <div class="col-sm-4">


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-book"></i> Your Address Book</h4>
                            </div>
                            <div class="panel-body">
                                <fieldset id="address" class="required">
                                    <div class="form-group required">
                                        <label for="input-payment-company" class="control-label">Full Name</label>
                                        <input @blur="updateAddressbook" v-model="full_name" type="text"
                                               class="form-control"
                                               id="input-payment-company" placeholder="Full Name" value=""
                                               name="company">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-address-1" class="control-label">Email</label>
                                        <input @blur="updateAddressbook" v-model="email" type="text"
                                               class="form-control"
                                               id="input-payment-address-1" placeholder="Email" value=""
                                               name="address_1">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-payment-address-2" v-model="phone"
                                               class="control-label">Phone</label>
                                        <input type="text" class="form-control" id="input-payment-address-2"
                                               :placeholder="phone" value="" name="address_2" disabled>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-city" class="control-label">Full delivery
                                            address</label>
                                        <textarea @blur="updateAddressbook" v-model="full_address" rows="6" type="text"
                                                  class="form-control"
                                                  id="input-payment-city" placeholder="City" value=""
                                                  name="city"></textarea>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Distance</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label>
                                                <input @blur="checkoutShow" value="1" v-model="shipping" type="radio" checked="checked"
                                                       name="Free Shipping">
                                                Near Shipping - 20/-</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input @blur="checkoutShow" value="2" v-model="shipping" type="radio"
                                                       name="Flat Shipping Rate">
                                                Far Shipping - 40/-</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-ticket"></i> Use Coupon Code</h4>
                                    </div>
                                    <div class="panel-body" style="margin-bottom: 24px;">
                                        <label for="input-coupon" class="col-sm-3 control-label">Enter coupon</label>
                                        <div class="input-group">
                                            <input @blur="checkoutShow" v-model="coupon" type="text" class="form-control" id="input-coupon"
                                                   placeholder="Enter coupon here" value="" name="coupon">
                                            <span class="input-group-btn">
								  <input @click.prevent="checkoutShow" type="button" class="btn btn-primary" data-loading-text="Loading..."
                                         id="button-coupon" value="Apply Coupon">
								  </span></div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">


                                                <tfoot>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                                                    <td class="text-right">৳ {{ checkout.sub_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>Delivery Charge:</strong>
                                                    </td>
                                                    <td class="text-right">৳ {{ checkout.shipping }}</td>
                                                </tr>
                                                <tr style="color: green;font-weight: 800;">
                                                    <td class="text-right" colspan="4"><strong>Coupon discount:</strong>
                                                    </td>
                                                    <td class="text-right">- ৳ {{ checkout.discount_amount }}</td>
                                                </tr>
                                                <tr style="color: green;font-weight: 800;">
                                                    <td class="text-right" colspan="4"><strong>Bonus balance:</strong>
                                                    </td>
                                                    <td class="text-right">- ৳ {{ checkout.bonus_balance }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                                    <td class="text-right">৳ {{ checkout.payment_amount }}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <br>

                                <div class="buttons">
                                    <div class="pull-right">
                                        <input @click="confirmOrder" type="button" class="btn btn-primary" id="button-confirm"
                                               value="Confirm Order">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
    <!-- //Main Container -->
</template>

<script>

export default {
    name: "checkout",
    data() {
        return {
            full_name: '',
            email: '',
            phone: '',
            full_address: '',
            shipping: 1,
            coupon: '',
            checkout: [],
            msg:'',


        }
    },
    methods: {
        updateAddressbook() {

            axios.post(this.$api_url + 'api/v1/update/addressbook',
                {
                    'full_name': this.full_name,
                    'email': this.email,
                    'full_address': this.full_address
                }).then(
                response => {
                    this.result = true;
                    console.log(response);


                }
            ).catch((error) => {
                this.msg = error.response.data.message;
                console.log(error.response);
            });


        },
        viewAddressbook() {

            axios.get(this.$api_url + 'api/v1/my/addressbook').then(
                response => {
                    console.log(response);
                    this.full_name = response.data.data.info.full_name;
                    this.email = response.data.data.info.email;
                    this.phone = response.data.data.phone;
                    this.full_address = response.data.data.info.full_address;
                }
            ).catch((error) => {
                this.msg = error.response.data.message;
                console.log(error.response);

            });
        },

        checkoutShow() {
           let body={};
            if(this.coupon!=''){
                body['coupon']=this.coupon;
            }
             body['near_shipping']=`${this.shipping}`
            axios.post(this.$api_url + 'api/v1/checkout',
                 body
            ).then(
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

        confirmOrder() {

            axios.post(this.$api_url + 'api/v1/order',{}
            ).then(
                response => {
                    this.result = true;
                    console.log(response);

                    this.msg = '';
                    setTimeout(function() {
                        window.location.href = "https://payment.chashipolli.com/payment?inv="+response.data.data.invoice_id;
                    }, 0);
                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },


    },
    mounted() {
        this.viewAddressbook()
        this.checkoutShow()
    }
}
</script>

<style scoped>

</style>
