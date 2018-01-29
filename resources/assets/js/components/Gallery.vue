<!-- Swiper -->
<template>
    <section id="gallery" class="section__gallery" v-bind:class="{paddingGallery: isActive}">
        <div class="swiper-container s-gallery s-gallery-top">
            <div class="swiper-wrapper">
                <div class="swiper-slide s-gallery__photo0"></div>
                <div class="swiper-slide s-gallery__photo1"></div>
                <div class="swiper-slide s-gallery__photo2"></div>
                <div class="swiper-slide s-gallery__photo3"></div>
                <div class="swiper-slide s-gallery__photo4"></div>
                <div class="swiper-slide s-gallery__photo5"></div>
                <div class="swiper-slide s-gallery__photo6"></div>
                <div class="swiper-slide s-gallery__photo7"></div>
                <div class="swiper-slide s-gallery__photo8"></div>
                <div class="swiper-slide s-gallery__photo9"></div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white sbn-gallery"></div>
            <div class="swiper-button-prev swiper-button-white sbp-gallery"></div>
        </div>
        <div class="swiper-container s-gallery s-gallery-thumbs">
            <div class="swiper-wrapper">
                <div class="swiper-slide s-gallery__photo0"></div>
                <div class="swiper-slide s-gallery__photo1"></div>
                <div class="swiper-slide s-gallery__photo2"></div>
                <div class="swiper-slide s-gallery__photo3"></div>
                <div class="swiper-slide s-gallery__photo4"></div>
                <div class="swiper-slide s-gallery__photo5"></div>
                <div class="swiper-slide s-gallery__photo6"></div>
                <div class="swiper-slide s-gallery__photo7"></div>
                <div class="swiper-slide s-gallery__photo8"></div>
                <div class="swiper-slide s-gallery__photo9"></div>
            </div>
        </div>
    </section>
</template>

<script>
    module.exports = {
        data: function () {
            return{
                isActive: false
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

            sGlobal.on('slideChange', this.changeSlideFunc);
        },
        methods : {
            changeSlideFunc: function () {
                if (sGlobal.activeIndex === 5) {
                    this.isActive = true;
                } else if (this.isActive === true) {
                    this.isActive = false;
                }
            }
        }
    }
</script>