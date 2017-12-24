<template>
    <section class="section__people">
        <div class="container flex people__flex">
            <h3 class="section__title title__people">Наши партнеры которые нам доверяют</h3>
            <img class="people__photo" src="app/img/people-photo.png" alt="Люди которые нам доверяют">
            <div class="swiper-container s-people">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel1" src="app/img/people-carousel1.png" alt="Компании которые нам доверяют">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel2" src="app/img/people-carousel2.png" alt="Компании которые нам доверяют">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel3" src="app/img/people-carousel3.png" alt="Компании которые нам доверяют">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel4" src="app/img/people-carousel4.png" alt="Компании которые нам доверяют">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel1" src="app/img/people-carousel1.png" alt="Компании которые нам доверяют">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel2" src="app/img/people-carousel2.png" alt="Компании которые нам доверяют">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel1" src="app/img/people-carousel1.png" alt="Компании которые нам доверяют">
                    </div>
                    <div class="swiper-slide">
                        <img class="people__carousel people__carousel4" src="app/img/people-carousel4.png" alt="Компании которые нам доверяют">
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next sbn-people"></div>
                <div class="swiper-button-prev sbp-people"></div>
            </div>
        </div>
    </section>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                infinite: true,
            }
        },
        mounted: function () {
         const sPeople = new Swiper('.s-people', {
                slidesPerView: 4,
                // centeredSlides: true,
                slidesPerGroup: 4,
                loop: this.infinite,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 2000
                },
                navigation: {
                    nextEl: '.sbn-people',
                    prevEl: '.sbp-people',
                },
            })
        }
    }
</script>

<style lang="scss" scoped>

</style>