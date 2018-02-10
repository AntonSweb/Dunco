<!-- Swiper -->
<template>
    <section id="gallery" class="section__gallery">
        <div class="swiper-container s-gallery s-gallery-top">
            <h3 class="section__title gallery__title" v-if="showMobile">Наша галерея</h3>
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="n in 28" :data-num="'photo' + n"></div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white sbn-gallery"></div>
            <div class="swiper-button-prev swiper-button-white sbp-gallery"></div>
        </div>
        <div class="swiper-container s-gallery s-gallery-thumbs">
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="n in 28" :data-num="'photo' + n"></div>
            </div>
        </div>
    </section>
</template>

<script>
    module.exports = {
        data: function () {
            return{
                showMobile: true
            }
        },
        mounted: function () {
            let galleryTop = new Swiper('.s-gallery-top', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
            let galleryThumbs = new Swiper('.s-gallery-thumbs', {
                spaceBetween: 10,
                centeredSlides: true,
                slidesPerView: 'auto',
                touchRatio: 0.2,
                slideToClickedSlide: true,
            });

            galleryTop.controller.control = galleryThumbs;
            galleryThumbs.controller.control = galleryTop;

            // sGlobal.on('slideChange', this.changeSlideFunc);
        }
    }
</script>