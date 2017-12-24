<template>
    <section class="section__order">
        <h3 class="section__title order__title-our">Наши партнеры</h3>
        <div class="swiper-container s-partners">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners1" src="app/img/partner1.png" alt="Логотип1 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners2" src="app/img/partner2.png" alt="Логотип2 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners3" src="app/img/partner3.png" alt="Логотип3 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners4" src="app/img/partner4.png" alt="Логотип4 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners5" src="app/img/partner5.png" alt="Логотип5 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners6" src="app/img/partner6.png" alt="Логотип6 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners7" src="app/img/partner7.png" alt="Логотип7 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners8" src="app/img/partner8.png" alt="Логотип8 партнера компании Данко">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-partners__logo">
                        <img class="s-partners__img s-partners9" src="app/img/partner9.png" alt="Логотип9 партнера компании Данко">
                    </div>
                </div>
                <!--<div class="swiper-slide">-->
                    <!--<div class="s-partners__logo s-partners10">-->
                        <!--<img class="s-partners__img s-partners10" src="app/img/partner10.png" alt="Логотип партнера компании Данко">-->
                    <!--</div>-->
                <!--</div>-->
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next sbn-partners"></div>
            <div class="swiper-button-prev sbp-partners"></div>
        </div>
        <div class="order flex order__flex">
            <video class="video" autoplay loop muted preload v-if="show">
                <source src="app/video/dunco_bottom.webm" type="video/webm">
                <source src="app/video/dunco_bottom.mp4" type="video/mp4">
            </video>
            <div class="order__content">
                <div class="order__ask">
                    <h3 class="section__title order__title">У Вас остались вопросы?</h3>
                    <p class="order__subtitle order__subtitle-ask">Задайте их нам!</p>
                    <div class="container"><p class="order__subtitle order__subtitle-ask">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Запятой грустный пояс точках великий. Страну снова строчка запятой о.</p></div>
                    <div class="g-btn order__btn order__btn-ask" v-on:click="modalOpen">
                        <span class="g-btn__bg order__btn_bg"></span>
                        <span class="g-btn__text order__btn-text">Задать вопрос бесплатно</span>
                    </div>
                </div>
                <div class="order__contacts flex">
                    <a href="tel:+380688332020" class="section__title order__contact order__tel">+38 (068) 833 20 20</a>
                    <a href="mailto:mail@landing.ua" class="section__title order__contact order__mail">mail@landing.ua</a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                infinite: true,
                show: false,
            };
        },
        mounted: function () {
            const sPartners = new Swiper('.s-partners', {
                slidesPerView: 3,
                centeredSlides: true,
                slidesPerGroup: 3,
                loop: this.infinite,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2000
                },
                navigation: {
                    nextEl: '.sbn-partners',
                    prevEl: '.sbp-partners',
                },
            });
        },
        methods: {
            showOrderFunc: function (){
                if (sGlobal.activeIndex === 6){
                     this.show = true
                }
            },
            modalOpen: function (){
              $('.mask').addClass('active');
            }
        },
        created () {
           sGlobal.on('slideChange', this.showOrderFunc);
        },
    }
</script>

<style lang="scss" scoped>

</style>