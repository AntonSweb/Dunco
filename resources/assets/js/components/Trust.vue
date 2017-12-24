<template>
    <section class="section__trust" v-if="show">
        <div class="container flex trust__flex_outer">
            <div class="trust__wrap">
                <h3 class="section__title title__numbers">Почему нам стоит доверять?</h3>
                <div class="flex trust__flex trust__numbers">
                    <div class="trust__number">
                        <div class="flex number__flex">
                            <img src="app/img/one.jpg" alt="Почему нам стоит доверять пункт первый">
                            <span class="number__caption number__caption1">Мы​ ​на​ ​связи​ 24/7</span>
                        </div>
                    </div>
                    <div class="trust__number">
                        <div class="flex number__flex">
                            <img src="app/img/two.jpg" alt="Почему нам стоит доверять пункт второй">
                            <span class="number__caption">
                                Вы​ ​ получите​  идеи/стиль<br/>и​ ​правильное решение​ в​ ​подборе​​ комплектующих
                            </span>
                        </div>
                    </div>
                    <div class="trust__number">
                        <div class="flex number__flex">
                            <img src="app/img/three.jpg" alt="Почему нам стоит доверять пункт третий">
                            <span class="number__caption">
                                полный​​ пакет​​ документов​ +​ гарантийное​ ​и​ постгарантийное обслуживание
                            </span>
                        </div>
                    </div>
                    <div class="trust__number">
                        <div class="flex number__flex">
                            <img src="app/img/four.jpg" alt="Почему нам стоит доверять пункт четвертый">
                            <span class="number__caption">
                                Бесплатный​ замер <br/>​​(при​ заключённом договоре),
                            </span>
                        </div>
                    </div>
                    <div class="trust__number">
                        <div class="flex number__flex">
                            <img src="app/img/five.jpg" alt="Почему нам стоит доверять пункт пятый">
                            <span class="number__caption">
                                Качество​​ производства​<br/>​и​ ​монтажа согласно​ ​инновационных технологий
                            </span>
                        </div>
                    </div>
                    <div class="trust__number">
                        <div class="flex number__flex">
                            <img src="app/img/six.jpg" alt="Почему нам стоит доверять пункт шестой">
                            <span class="number__caption">
                                Квалифицированная​ консультация специалиста
                            </span>
                        </div>
                    </div>
                </div>
                <h3 class="section__title title__stage">Как мы работаем</h3>
                <div class="flex stage__flex trust__stage">
                    <img class="stage__img" src="app/img/stage.jpg" alt="Этапи роботы компании Данко">
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
                show: false
            };
        },
        methods: {
            changeSlideFunc: function () {
                if (sGlobal.activeIndex === 2) {
                    this.show = true;
                }
            },
            modalOpen: function (){
              $('.mask').addClass('active');
            }
        },
        created() {
            sGlobal.on('slideChange', this.changeSlideFunc);
        },
    }
</script>

<style scoped>

</style>