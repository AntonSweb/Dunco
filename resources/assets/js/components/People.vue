<template>
    <section class="section__people">
        <div class="container flex people__flex">
            <h3 class="section__title title__people hidden" v-bind:class="{visible : isVisible[0]}">Нам доверяют!</h3>
            <div class="people__photo-wrap hidden" v-bind:class="{visible : isVisible[1]}">
                <img class="people__photo" src="dist/img/people-photo.png" alt="Люди которые нам доверяют">
            </div>
            <div class="swiper-container s-people hidden" v-bind:class="{visible : isVisible[2]}">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel1" src="dist/img/people-carousel1.png" alt="Компании которые нам доверяют 1">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel2" src="dist/img/people-carousel2.png" alt="Компании которые нам доверяют 2">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel3" src="dist/img/people-carousel3.png" alt="Компании которые нам доверяют 3">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel4" src="dist/img/people-carousel4.png" alt="Компании которые нам доверяют 4">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel1" src="dist/img/people-carousel1.png" alt="Компании которые нам доверяют 5">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel2" src="dist/img/people-carousel2.png" alt="Компании которые нам доверяют 6">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel1" src="dist/img/people-carousel1.png" alt="Компании которые нам доверяют 7">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel4" src="dist/img/people-carousel4.png" alt="Компании которые нам доверяют 8">
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next sbn-people sbn-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M27 22L5 44l-2.1-2.1L22.8 22 2.9 2.1 5 0l22 22z" fill="#111a37"></path></svg>
                </div>
                <div class="swiper-button-prev sbp-people sbn-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z" fill="#111a37"></path></svg>
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
                isVisible: {
                    0: false,
                    1: false,
                    2: false
                },
                counter: 0
            }
        },
        mounted: function () {
         const sPeople = new Swiper('.s-people', {
                slidesPerView: 4,
                slidesPerGroup: 4,
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        slidesPerGroup: 1
                    },
                    640: {
                        slidesPerView: 2,
                        slidesPerGroup: 2
                    },
                    768: {
                        slidesPerView: 3,
                        slidesPerGroup: 3
                    }
                },
                loop: this.infinite,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2000
                },
                navigation: {
                    nextEl: '.sbn-people',
                    prevEl: '.sbp-people',
                },
            });
            sGlobal.on('slideChange', this.changeSlideFunc);
        },
        methods: {
            changeSlideFunc: function () {
                let that = this;
                if (sGlobal.activeIndex === 3) {
                    for (let key in this.isVisible){
                        this.counter = key * 200;
                        setTimeout(function (){
                            that.isVisible[key] = true;
                        }, that.counter);
                    }
                }
            }
        }
    }
</script>