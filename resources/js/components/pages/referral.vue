<template>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">My Referral Code</a></li>

        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <h1>App referral code</h1>
                <ul class="ol-cards">
                    <li style="--accent-color: #EE5830">
                        <div class="icon"><i class="fa fa-share"></i></div>
                        <div class="title"><input type="text"  :value="referral.code"></input></div>
                        <div class="descr">Refer chashipolli by this code. Get Bonus balance.</div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "referral",

    data() {
        return {

            referral: [],
            msg: '',


        }
    },
    methods: {

        myReferral() {

            axios.get(this.$api_url + 'api/v1/my/referral').then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.referral = response.data.data;

                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },

    },
    mounted() {

        this.myReferral()
    }
}
</script>

<style scoped>
@import url("https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css");

.ol-cards,
.ol-cards * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.ol-cards {
    --flapWidth: 2rem;
    --flapHeigth: 1rem;
    --iconSize: 3rem;
    --numberSize: 3rem;
    --colGapSize: 2rem;
    width: min(100%, 40rem);
    margin-inline: auto;
    display: grid;
    gap: 2rem;
    padding-inline-start: var(--flapWidth);
    font-family: sans-serif;
    color: #222;
    counter-reset: ol-cards-count;
    list-style: none;
}
.ol-cards > li {
    display: grid;
    grid-template-areas:
    "icon title nr"
    "icon descr nr";
    gap: 0 var(--colGapSize);
    align-items: center;
    padding: var(--colGapSize) var(--flapWidth) var(--colGapSize) 0;
    border-radius: 1rem 5rem 5rem 1rem;
    background-image: linear-gradient(to bottom right, #e9eaec, #ffffff);
    counter-increment: ol-cards-count;
    filter: drop-shadow(10px 10px 10px rgba(0, 0, 0, 0.25));
    box-shadow: inset 2px 2px 2px white, inset -1px -1px 1px rgba(0, 0, 0, 0.25);
}

.ol-cards > li > .icon {
    grid-area: icon;
    background: var(--accent-color);
    color: white;
    font-size: var(--iconSize);
    width: calc(2 * var(--flapWidth) + var(--iconSize));
    padding-block: 1rem;
    border-radius: 0 5rem 5rem 0;
    margin-inline-start: calc(-1 * var(--flapWidth));
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);
    position: relative;
    display: grid;
    place-items: center;
}
.ol-cards > li > .icon::before {
    content: "";
    position: absolute;
    width: var(--flapWidth);

    height: calc(100% + calc(var(--flapHeigth) * 2));
    left: 0;
    top: calc(var(--flapHeigth) * -1);
    clip-path: polygon(
        0 var(--flapHeigth),
        100% 0,
        100% 100%,
        0 calc(100% - var(--flapHeigth))
    );
    background-color: var(--accent-color);
    background-image: linear-gradient(
        90deg,
        rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.2)
    );
    z-index: -1;
}

.ol-cards > li > .title {
    grid-area: title;
    font-weight: 600;
    font-size: 1.25rem;
}
.ol-cards > li > .descr {
    grid-area: descr;
}
.ol-cards > li::after {
    grid-area: nr;
    content: counter(ol-cards-count, decimal-leading-zero);
    color: #f9f9fa;
    font-size: var(--numberSize);
    font-weight: 700;
}
@media (max-width: 40rem) {
    .ol-cards {
        --flapWidth: 1rem;
        --flapHeigth: 0.5rem;
        --iconSize: 2rem;
        --numberSize: 2rem;
        --colGapSize: 1rem;
    }
}
/* for demo */
body {
    background-color: #c6c9ce;
    padding: 2rem;
}
h1 {
    text-transform: uppercase;
    font-family: sans-serif;
    text-align: center;
    color: #222;
}

</style>
