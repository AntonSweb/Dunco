<template>
    <section class="section__trust" v-if="show">
        <div class="container flex trust__flex_outer">
            <div class="trust__wrap">
                <h3 class="section__title title__numbers hidden" v-bind:class="{visible : isVisible[0]}">Почему нам стоит доверять?</h3>
                <div class="flex trust__flex trust__numbers">
                    <div class="trust__number hidden" v-bind:class="{visible : isVisible[1]}">
                        <div class="flex number__flex">
                            <img class="number__img number__img1" src="app/img/one.jpg" alt="Почему нам стоит доверять пункт первый">
                            <span class="number__caption number__caption1">Мы​ ​на​ ​связи​ 24/7</span>
                        </div>
                    </div>
                    <div class="trust__number hidden" v-bind:class="{visible : isVisible[2]}">
                        <div class="flex number__flex">
                            <img class="number__img" src="app/img/two.jpg" alt="Почему нам стоит доверять пункт второй">
                            <span class="number__caption">
                                Вы​ получите​ идеи/стиль<br/>и​ ​правильное решение​ в​ ​подборе​​ комплектующих
                            </span>
                        </div>
                    </div>
                    <div class="trust__number hidden" v-bind:class="{visible : isVisible[3]}">
                        <div class="flex number__flex">
                            <img class="number__img" src="app/img/three.jpg" alt="Почему нам стоит доверять пункт третий">
                            <span class="number__caption">
                                полный​​ пакет​​ документов​ +​ гарантийное​ ​и​ постгарантийное обслуживание
                            </span>
                        </div>
                    </div>
                    <div class="trust__number hidden" v-bind:class="{visible : isVisible[4]}">
                        <div class="flex number__flex">
                            <img class="number__img" src="app/img/four.jpg" alt="Почему нам стоит доверять пункт четвертый">
                            <span class="number__caption">
                                Бесплатный​ замер <br/>​​(при​ заключённом договоре),
                            </span>
                        </div>
                    </div>
                    <div class="trust__number hidden" v-bind:class="{visible : isVisible[5]}">
                        <div class="flex number__flex">
                            <img class="number__img" src="app/img/five.jpg" alt="Почему нам стоит доверять пункт пятый">
                            <span class="number__caption">
                                Качество​​ производства​<br/>​и​ ​монтажа согласно​ ​инновационных технологий
                            </span>
                        </div>
                    </div>
                    <div class="trust__number hidden" v-bind:class="{visible : isVisible[6]}">
                        <div class="flex number__flex">
                            <img class="number__img" src="app/img/six.jpg" alt="Почему нам стоит доверять пункт шестой">
                            <span class="number__caption">
                                Квалифицированная​ консультация специалиста
                            </span>
                        </div>
                    </div>
                </div>
                <h3 class="section__title title__stage hidden" v-bind:class="{visible : isVisible[7]}">Как мы работаем</h3>
                <div class="flex stage__flex trust__stage hidden" v-bind:class="{visible : isVisible[7]}">
                    <img class="stage__img" src="app/img/stage.png" alt="Этапи роботы компании Данко" v-if="showImgDesc">
                    <img class="stage__img_mob" src="app/img/stage-sm.png" alt="Этапи роботы компании Данко" v-if="showImgMob">
                    <div class="g-btn trust__btn" v-on:click="modalOpen">
                        <span class="g-btn__bg trust__btn_bg"></span>
                        <span class="g-btn__text trust__btn-text">Оставить заявку на выезд мастера</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    module.exports = {
        data: function () {
            return {
                show: false,
                isVisible: {
                    0: false,
                    1: false,
                    2: false,
                    3: false,
                    4: false,
                    5: false,
                    6: false,
                    7: false
                },
                counter: 0,
                showImgDesc: true,
                showImgMob: false,
                windowWidth: 0
            };
        },
        mounted () {
            sGlobal.on('slideChange', this.changeSlideFunc);
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                this.getWindowWidth();
            });
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        methods: {
            changeSlideFunc: function () {
                let that = this;
                if (sGlobal.activeIndex === 2) {
                    this.show = true;
                    for (let key in this.isVisible){
                        this.counter = key * 300;
                        setTimeout(function (){
                            that.isVisible[key] = true;
                        }, that.counter);
                    }
                }
            },
            modalOpen: function (){
                $('.mask__order').addClass('active');
            },
            getWindowWidth() {
                this.windowWidth = document.documentElement.clientWidth;
                if (this.windowWidth < 1200 && this.windowWidth > 769){
                    this.showImgDesc = false;
                    this.showImgMob = true;
                } else {
                    this.showImgDesc = true;
                    this.showImgMob = false;
                }
            }
         }
    }
</script>