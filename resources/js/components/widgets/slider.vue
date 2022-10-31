<template>
    <!-- Mod Slider Home -->
    <div id="sohomepage-slider-home3">
        <div class="slider-container ">

            <div id="so-slideshow" class="">
                <div class="module slideshow no-margin">
                    <div class="item">
                        <a href="#"><img :src="'/uploads/images/Sliders/'+slider1" alt="slider1" class="img-responsive"></a>
                        <div class="sohomeslider-description">
                            <img class="image image-sl11 pos-right img-active" height="45px" width="80px" src="assets/image/logos/cp.png" alt="slideshow">
                            <div class="text pos-right text-sl11">
                                <h3 class="tilte modtitle-sl11  title-active">Chashipolli</h3>
                                <p class="des des-sl11 des-active"> ভেজালের রাজ্যে নির্ভেজাল সবটুকুই</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <a href="#"><img :src="'/uploads/images/Sliders/'+slider2" alt="slider1" class="img-responsive"></a>
                        <div class="sohomeslider-description">
                            <img class="image image-sl12 pos-left img-active" height="45" width="80" src="assets/image/logos/cp.png" alt="slideshow">
                            <div class="text pos-right text-sl12">

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <a href="#"><img :src="'/uploads/images/Sliders/'+slider3" alt="slider1" class="img-responsive"></a>
                        <div class="sohomeslider-description">
                            <img class="image image-sl13 pos-right img-active" height="45" width="80" src="assets/image/logos/cp.png" alt="slideshow">
                            <div class="text pos-left text-sl13">
                                <h3 class="tilte modtitle-sl13 title-active">Chashipolli</h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="loadeding"></div>

            </div>
        </div>
    </div>
    <!-- //End Mod -->
</template>

<script>
export default {
    name: "slider",
    data() {
        return {

            result: false,
            msg: '',
            slider1: 'ALFMQXSeqjWDAZO1.jpg',
            slider2: null,
            slider3: null,


        }
    },
    methods: {
        viewSliders() {
            axios.get(this.$api_url + 'api/v1/view/sliders', {
                params: { }
            }).then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.slider1 = response.data.data[0]['img_name'];
                    this.slider2 = response.data.data[1]['img_name'];
                    this.slider3 = response.data.data[2]['img_name'];
                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },



    },
    beforeMount() {
        this.viewSliders();
    }
}
</script>

<style scoped>

</style>
