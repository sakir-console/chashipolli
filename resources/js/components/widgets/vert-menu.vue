<template>
    <!-- Mod Vertical Menu -->
    <div class="responsive so-megamenu megamenu-style-dev">
        <div class="so-vertical-menu no-gutter compact-hidden">
            <nav class="navbar-default">

                <div class="container-megamenu vertical open">
                    <div id="menuHeading">
                        <div class="megamenuToogle-wrapper">
                            <div class="megamenuToogle-pattern">
                                <div class="container">
                                    <div>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    Categories
                                    <i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-header">

                        <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
                            <span class="icon-bar" style="width: 12px"></span>
                            <span class="icon-bar" style="width: 16px"></span>
                            <span class="icon-bar"></span> <font style="color:white">Categories</font>
                        </button>
                    </div>
                    <div class="vertical-wrapper" >
                        <span id="remove-verticalmenu" class="fa fa-times"></span>
                        <div class="megamenu-pattern">
                            <div class="container">
                                <ul class="megamenu">



                                    <li class="item-vertical css-menu with-sub-menu hover" v-for="(cat,index) in cats" v-bind:key="index">
                                        <p class="close-menu"></p>
                                            <router-link :to="`products?cat=`+cat.id" class="clearfix"><i class="fa fa-pencil-square-o"></i> <strong>
                                                <span>{{cat.name}}</span>
                                                <b class="fa fa-angle-right"></b>
                                            </strong></router-link>


                                    </li>

                                    <li class="loadmore">
                                        <i class="fa fa-plus-square-o"></i>
                                        <span class="more-view">More Categories</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- //End Mod -->
</template>

<script>
export default {
    name: "vert-menu",
    data() {
        return {

            result: false,
            msg: '',
            cats: [],
            subcats: [],


        }
    },
    methods: {
        viewCategories() {
            axios.get(this.$api_url + 'api/v1/view/categories', {
                params: { }
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.cats = response.data.data;
                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },

        viewSubCategories(catId) {
            axios.get(this.$api_url + 'api/v1/view/sub-categories', {
                params: {'cat':catId }
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.subcats = response.data.data;
                    this.msg = '';
return this.subcats;
                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },


    },
    mounted() {
        this.viewCategories();
    }
}
</script>

<style scoped>

</style>
