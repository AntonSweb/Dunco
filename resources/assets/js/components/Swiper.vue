<template>
    <!-- Swiper -->
    <div class="swiper-container s-front">
        <div class="swiper-wrapper">
            <swiperslide class="front-slide1">
                <canvas slot="canvas" id='canv'></canvas>
                <h1 slot="title" class="front-slide__title">Шум и холод вам мешают? Окна "Данко" помагают!</h1>
            </swiperslide>
            <swiperslide class="front-slide2">
                <h2 slot="title" class="front-slide__title">Покупайте двери с выгодой!</h2>
            </swiperslide>
            <swiperslide class="front-slide3">
                <h2 slot="title" class="front-slide__title">Правильное решение - это ваш гарантированный комфорт!</h2>
            </swiperslide>
            <swiperslide class="front-slide4">
                <h2 slot="title" class="front-slide__title">Широкий выбор материалов превратит ваши окна в шедевр!</h2>
            </swiperslide>
            <swiperslide class="front-slide5">
                <h2 slot="title" class="front-slide__title">Доверь свои мечты профессионалам!<br/>Больше, чем просто ролеты!</h2>
            </swiperslide>
        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination sp-g sp-front"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next sbn-front"></div>
        <div class="swiper-button-prev sbp-front"></div>
    </div>
</template>


<script>
    import Swiperslide from './local/SwiperSlide.vue'
    module.exports = {
        data: function() {
            return {
                infinite: true,
                sFront: {},
                show: false
            };
        },
        mounted: function () {
            // let that = this;
            this.sFront = new Swiper ('.s-front', {
                loop: this.infinite,
                // autoplay: {
                    // delay: 6000
                // },
                pagination: {
                    el: '.sp-front',
                    clickable: true
                },
                navigation: {
                    nextEl: '.sbn-front',
                    prevEl: '.sbp-front'
                },
            });

            this.sFront.on('slideChange', function () {
                // that.slideChange();
            });

        },
        methods: {
            slideChange: function () {
                // this.$emit('slideChangeInner', this.sFront.activeIndex);
                // console.log(this.sFront.activeIndex);
            }
        },
        components: {
            Swiperslide
        }
    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .9s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0
    }
</style>