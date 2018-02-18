<!-- Swiper -->
<template>
    <section id="gallery" class="section__gallery">
        <div class="swiper-container s-gallery s-gallery-top">
            <h3 class="section__title gallery__title" v-if="showMobile">Наша галерея</h3>
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="n in 28">
                    <div class="gallery__photo" :data-num="'photo' + n" v-if="show"></div>
                    <div v-if="n === 1" class="loader loader--style3" title="2">
                        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                            <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
                            <animateTransform attributeType="xml"
                              attributeName="transform"
                              type="rotate"
                              from="0 25 25"
                              to="360 25 25"
                              dur="0.6s"
                              repeatCount="indefinite"/>
                            </path>
                          </svg>
                    </div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white sbn-gallery"></div>
            <div class="swiper-button-prev swiper-button-white sbp-gallery"></div>
        </div>
        <div class="swiper-container s-gallery s-gallery-thumbs">
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="n in 28">
                    <div class="gallery__photo" :data-num="'photo' + n" v-if="show"></div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    module.exports = {
        data: function () {
            return{
                show: false,
                showMobile: true
            }
        },
        mounted: function () {
            const that = this;
            let galleryTop = new Swiper('.s-gallery-top', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });
            let galleryThumbs = new Swiper('.s-gallery-thumbs', {
                spaceBetween: 10,
                centeredSlides: true,
                slidesPerView: 'auto',
                touchRatio: 0.2,
                slideToClickedSlide: true
            });

            galleryTop.controller.control = galleryThumbs;
            galleryThumbs.controller.control = galleryTop;
            sGlobal.on('slideChange', function () {
                if(sGlobal.activeIndex === 5){
                    that.galleryInit();
                }
            });
        },
        methods: {
            galleryInit: function (e) {
                this.show = true;
                console.log(e);
            }
        }
    }
</script>
<style scoped>
    .gallery__photo {
        position: relative;
        z-index: 2;
    }
    .loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
        margin: 0 0 2em;
        text-align: center;
        padding: 1em;
        margin: 0 auto 1em;
        display: inline-block;
        vertical-align: top;
    }
    /*
      Set the color of the icon
    */
    svg path,
    svg rect {
        fill: #FF6700;
    }
</style>