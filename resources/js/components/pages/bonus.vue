<template>
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">My bonus</a></li>

        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <br>

                <div class="at-reward-card">
                    <div class="at-reward-card__header">
                        <svg class="at-reward-card__thumbnail" width="140" height="140" viewBox="0 0 512 512"
                             xmlns="http://www.w3.org/2000/svg">

                            <g fill="none" fill-rule="evenodd">
                                <path d="M256 475L9 188 116 43l140-15 140 15 107 145z" fill="#FFAE00"/>
                                <path d="M256 475L9 188h494z" fill="#CCC"/>
                                <path d="M256 475L109 188h294z" fill="#EEE"/>
                                <path d="M256 28L109 188h294z" fill="#FFF"/>
                                <path d="M116 43l-55 73-52 72h101zM396 43l55 73 52 72H402z" fill="#E7E7E7"/>
                                <path d="M116 43l-7 145L256 28zM396 43l7 145L256 28z" fill="#F3F3F3"/>
                            </g>
                        </svg>
                    </div>
                    <div class="at-reward-card__content">
                        <h2>Bonus Balance!</h2>
                        <p>Your Bonus Balance is: {{ bonus[0].amount }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "bonus",
    data() {
        return {

            bonus: [],
            msg: '',


        }
    },
    methods: {

        myBonus() {

            axios.get(this.$api_url + 'api/v1/my/balance').then(
                response => {
                    this.result = true;
                    console.log(response);
                    this.bonus = response.data.data;

                    this.msg = '';

                }
            ).catch((error) => {

                this.msg = error.response.data.message;
                console.log(error.response);
            });
        },

    },
    mounted() {

        this.myBonus()
    }
}
</script>

<style scoped>
.at-reward-card {
    margin-top: 22%;
    z-index: 100;
    position: inherit;
    top: 50%;
    left: 50%;
    display: flex;
    flex-direction: column;
    background: #FFFFFF;
    width: 500px;
    height: 360px;
    border-radius: 4px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    font-family: "Open Sans", sans-serif;
    overflow: hidden;
    transform: translate(-50%, -50%);
}

.at-reward-card__header {
    position: relative;
    background: #EB60A3;
    height: 140px;
    margin: 0 0 60px;
}

.at-reward-card__thumbnail {
    position: absolute;
    top: 60px;
    left: 50%;
    display: block;
    margin: 0 auto;
    transform: translateX(-50%);
}

.at-reward-card__content {
    flex-grow: 1;
    text-align: center;
}

.at-reward-card__content h2 {
    margin: 0 0 10px;
    padding: 0;
    color: #EB60A3;
    font-size: 20px;
}

.at-reward-card__content p {
    margin: 0;
    padding: 0;
    color: #444444;
    font-size: 16px;
}

.at-reward-card__footer {
    display: flex;
    align-items: center;
    flex-direction: row;
    height: 60px;
}

.at-reward-card__button {
    outline: none;
    display: block;
    background: #FAFAFA;
    width: 100%;
    border: 0;
    margin: 0 1px;
    font-size: 18px;
    line-height: 60px;
    cursor: pointer;
}

.at-reward-card__button:hover {
    background: #F3F3F3;
}

.at-reward-card__button:first-child {
    margin-left: 0;
    color: #CCCCCC;
}

.at-reward-card__button:last-child {
    margin-right: 0;
    color: #EB60A3;
    font-weight: 600;
}
</style>
