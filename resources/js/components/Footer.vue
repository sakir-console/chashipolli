<template>
    <!-- Footer Container -->
    <footer class="footer-container typefooter-1">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="module social_block col-md-3 col-sm-12 col-xs-12" >
                            <ul class="social-block ">
                                <li class="facebook"><a class="_blank" href="https://facebook.com/chashipolliEXPRESS" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a class="_blank" href="https://twitter.com/chashipolli" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="instagram"><a class="_blank" href="https://instagram.com/chashipolli" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="module news-letter col-md-9 col-sm-12 col-xs-12">
                            <div class="newsletter">
                                <div class="title-block">
                                    <div class="page-heading">SIGN UP FOR OUR NEWSLETTER</div>
                                    <div class="pre-text">
                                        Duis at ante non massa consectetur iaculis id non tellus
                                    </div>
                                </div>
                                <div class="block_content">
                                    <form method="post" name="signup" id="signup" class="btn-group form-inline signup">
                                        <div class="form-group required send-mail">
                                            <div class="input-box">
                                                <input type="email" placeholder="Your email address..." value="" class="form-control" id="txtemail" name="txtemail" size="55">
                                            </div>
                                            <div class="subcribe">
                                                <button class="btn btn-default btn-lg" type="submit" onclick="return subscribe_newsletter();" name="submit">
                                                    Subscribe						</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Center -->
        <div class="footer-center">
            <div class="container content">
                <div class="row">
                    <!-- Box Info -->
                    <div class="col-md-3 col-sm-6 col-xs-12 collapsed-block footer-links box-footer">
                        <div class="module ">
                            <div class="content-block-footer">
                                <div class="footer-logo">
                                    <a href="$"><img class="lazyload" data-sizes="auto"  src="assets/image/logos/cp.png" title="Your Store" alt="Your Store" /></a>
                                </div>
                                <p>CHASHI POLLI is an e-commerce platform coupled with a chain of brick-and-mortar stores for safe and pure foods in Bangladesh.
                                    CHASHI POLLI EXPRESS is a Sister Concern of CHASHI POLLI LIMITED.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Box Accout -->
                    <div class="col-md-3 col-sm-6 box-account box-footer">
                        <div class="module clearfix">
                            <h3 class="modtitle">Top features</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    <li><a href="#">Top Solds</a></li>
                                    <li><a href="#">Top offers</a></li>
                                    <li><a href="#">Coupon discounts</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3  col-sm-6 collapsed-block box-footer">
                        <div class="module ">
                            <h3 class="modtitle">About Us</h3>
                            <div class="modcontent">
                                <ul class="contact-address">
                                    <li><span class="fa fa-home"></span> Barguna, Barishal, Bangladesh</li>
                                    <li><span class="fa fa-envelope"></span> Email: <a href="#"> express@chashipolli.com</a></li>
                                    <li><span class="fa fa-phone">&nbsp;</span> Phone : 01313-138713</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3  col-sm-6 collapsed-block box-footer">
                        <div class="module ">
                            <h3 class="modtitle">Payment Partner</h3>
                            <div class="modcontent">

                                <ul class="payment-method">
                                    <li><a title="Payment Method" href="#"><img class="lazyload" data-sizes="auto" src="assets/image/bk.png" alt="Payment"></a></li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER BOTTOM -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        CHASHI POLLI © 2019 - 2022. CHASHI POLLI Limited. All Rights Reserved.
                    </div>
                    <div class="back-to-top"><i class="fa fa-angle-up"></i><span> Top </span></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //end Footer Container -->
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>

</style>
