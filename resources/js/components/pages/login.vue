<template>
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Login</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="page-login">

                    <div class="account-border">
                        <div class="row">
                            <div class="col-sm-6 new-customer">
                                <div class="well">
                                    <h2><i class="fa fa-file-o" aria-hidden="true"></i> New Customer</h2>
                                    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                </div>
                                <div class="bottom-form">
                                    <a href="#" class="btn btn-default pull-right">Continue</a>
                                </div>
                            </div>

                            <form @submit.prevent="Login">
                                <div class="col-sm-6 customer-login">
                                    <div class="well">
                                        <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
                                        <p><strong>I am a returning customer</strong></p>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">Phone</label>
                                            <input v-model="phn" type="text" name="phone" value="" id="input-email" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label " for="input-password">Password</label>
                                            <input v-model="password" type="password" name="password" value="" id="input-password" class="form-control" />
                                        </div>


                                        <font style="font-size:19px;color:red;margin-right:10px">{{msg}}</font>
                                    </div>
                                    <div class="bottom-form">
                                        <a href="#" class="forgot">Forgotten Password</a>
                                        <input type="submit" value="Login" class="btn btn-default pull-right" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- //Main Container -->
</template>

<script>
export default {
    name: "login",
    data() {
        return {

            phn: '',
            password: '',
            result: false,
            msg: '',
            logged: false
        }
    },

    methods: {
        Login() {

                axios.post(this.$api_url + 'api/v1/signin',
                    {'phone': this.phn, 'password': this.password}).then(
                    response => {
                        this.result = true;
                        this.msg = response.data.message
                        console.log(response);
                        localStorage.setItem('logged', 'yes');
                        window.location = "/dashboard";

                    }
                ).catch((error) => {
                    this.msg = error.response.data.message + '. ' + error.response.data.data;
                    console.log(error.response);
                });





        },



    },
    mounted(){

    }
}
</script>

<style scoped>

</style>
