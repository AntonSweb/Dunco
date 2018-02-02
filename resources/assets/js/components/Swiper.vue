<template>
    <!-- Swiper -->
    <div class="swiper-container s-front">
        <div class="swiper-wrapper">
            <swiperslide class="front-slide1">
                <!--<canvas slot="canvas" id='canv'></canvas>-->
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
                <h2 slot="title" class="front-slide__title">Доверь свои мечты профессионалам!<br v-if="showBr" /> Больше, чем просто ролеты!</h2>
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
                windowWidth: 0,
                infinite: true,
                sFront: {},
                show: false,
                showBr: true
            };
        },
        mounted: function () {
            this.sFront = new Swiper ('.s-front', {
                loop: this.infinite,
                autoplay: {
                    delay: 6000
                },
                pagination: {
                    el: '.sp-front',
                    clickable: true
                },
                navigation: {
                    nextEl: '.sbn-front',
                    prevEl: '.sbp-front'
                },
                // on: {
                //     init: function () {

                //     },
                //     slideChange: function () {
                //
                //     }
                // },
                grabCursor: true
            });
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                this.getWindowWidth();
            });
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        methods: {
            getWindowWidth() {
                if (this.windowWidth < 768){
                    return this.showBr = false;
                } else {
                    this.showBr = true;
                }
            },

        },
        components: {
            Swiperslide
        }
    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active{
        transition: opacity .9s
    }
    .fade-enter, .fade-leave-to{
        opacity: 0
    }
</style>