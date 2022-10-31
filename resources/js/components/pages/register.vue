<template>
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Register</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <h2 class="title">Register Account</h2>
                <p>If you already have an account with us, please login at the <a href="#">login page</a>.</p>
                <div class="form-horizontal account-register clearfix">
                    <fieldset id="account">
                        <legend>Your Personal Details</legend>

                        <div class="form-group required" style="display: none;">
                            <label class="col-sm-2 control-label">Customer Group</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="customer_group_id" value="1" checked="checked">
                                        Default
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">Full Name</label>
                            <div class="col-sm-10">
                                <input v-model="name" type="text" name="firstname" value="" placeholder="Full Name"
                                       id="input-firstname" class="form-control">
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-telephone">Mobile</label>
                            <div class="col-sm-10">
                                <input v-model="phn" type="tel" name="telephone" value="" placeholder="Mobile number"
                                       id="input-telephone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">Password</label>
                            <div class="col-sm-10">
                                <input v-model="password" type="text"
                                       placeholder="Password" id="input-password" class="form-control">
                            </div>
                        </div>

                        <div v-if="!otpSent" class="buttons">
                            <div class="pull-right">
                                <font style="font-size:19px;color:red;margin-right:10px">{{msg}}</font>
                                <input @click="SignUpOTP" type="submit" value="Continue" class="btn btn-primary">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset v-if="otpSent" id="address">
                        <legend>OTP verification</legend>

                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-postcode">OTP Code</label>
                            <div class="col-sm-10">
                                <div class="input-box">
                                    <span class="prefix">CP-</span>
                                    <input v-model="otpCode" type="number" value="" placeholder="OTP Code"
                                           id="input-postcode" class="form-control">
                                </div>


                            </div>
                        </div>
                        <div class="pull-right">
                            <font style="font-size:19px;color:red;margin-right:10px">{{msg}}</font>
                            <input @click="Register" type="submit" value="Verify Registration" class="btn btn-success">
                        </div>

                    </fieldset>


                </div>
            </div>
        </div>
    </div>
    <!-- //Main Container -->
</template>

<script>

export default {
    name: "register",
    data() {
        return {
            msg:'',
            name: '',
            phn: '',
            otpSent: false,
            otpCode: '',
            password: '',
            result: false,
            isLogged: false
        }
    },

    methods: {
        Register() {



            axios.post(this.$api_url + 'api/v1/signup',
                {
                    'name': this.name,
                    'phone': this.phn,
                    'otpCode': this.otpCode,
                    'password': this.password

                }).then(
                response => {
                    this.result = true;
                    this.msg=''
                    console.log(response);
                    window.location = "/success";

                }
            ).catch((error) => {
                this.msg = error.response.data.message+'. '+error.response.data.data;
                console.log(error.response);
            });

        },


        SignUpOTP() {
            axios.post(this.$api_url + 'api/v1/otp',
                {'phone': this.phn}).then(
                response => {
                    this.result = true;
                    this.msg=''
                    console.log(response);
                    this.otpSent = true

                }
            ).catch((error) => {
                this.msg = error.response.data.message+'. '+error.response.data.data;
                console.log(error.response);
            });
        },
    },
}
</script>

<style scoped>
.input-box {
    display: flex;
    align-items: center;
    max-width: 300px;
    background: #fff;
    border: 1px solid #a0a0a0;
    border-radius: 4px;
    padding-left: 0.5rem;
    overflow: hidden;
    font-family: sans-serif;
}

.input-box .prefix {
    font-weight: 300;
    font-size: 14px;
    color: #999;
}

.input-box input {
    flex-grow: 1;
    font-size: 14px;
    background: #fff;
    border: none;
    outline: none;
    padding: 0.5rem;
}

.input-box:focus-within {
    border-color: #777;
}
</style>
