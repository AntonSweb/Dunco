<template>
    <section class="section__our-products">
        <div class="our-products__inner" v-if="show">
            <div class="container no-padding" v-bind:class="{active: isActive}">
                <div class="flex our-products__flex">
                    <div data-target='1' class="slide slide--1">
                        <div class="slide-inner">
                            <div class="slide__text slide__text--1"><span>Окна</span></div>
                            <div class="slide__text slide__text--1 slide__subtext slide__subtext--1"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p></div>
                            <div class="slide__bg"></div>
                            <div class="slide__img">
                                <div class="slide__img-wrapper"> </div>
                            </div>
                            <div class="slide__bg-dark"></div>
                        </div>
                    </div>
                    <div data-target='2' class="slide slide--2">
                        <div class="slide-inner">
                            <div class="slide__text"><span>Двери</span></div>
                            <div class="slide__text slide__text--2 slide__subtext slide__subtext--2"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p></div>
                            <div class="slide__bg"></div>
                            <div class="slide__img">
                                <div class="slide__img-wrapper"> </div>
                            </div>
                            <div class="slide__bg-dark"></div>
                        </div>
                    </div>
                    <div data-target='3' class="slide slide--3">
                        <div class="slide-inner">
                            <div class="slide__text"><span>Жалюзи</span></div>
                            <div class="slide__text slide__text--3 slide__subtext slide__subtext--3"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p></div>
                            <div class="slide__bg"></div>
                            <div class="slide__img">
                                <div class="slide__img-wrapper"> </div>
                            </div>
                            <div class="slide__bg-dark"></div>
                        </div>
                    </div>
                    <div data-target='4' class="slide slide--4">
                        <div class="slide-inner">
                            <div class="slide__text"><span>Ролеты</span></div>
                            <div class="slide__text slide__text--4 slide__subtext slide__subtext--4"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p></div>
                            <div class="slide__bg"></div>
                            <div class="slide__img">
                                <div class="slide__img-wrapper"> </div>
                            </div>
                            <div class="slide__bg-dark"></div>
                        </div>
                    </div>
                    <div data-target='5' class="slide slide--5">
                        <div class="slide-inner">
                            <div class="slide__text"><span>Ворота</span></div>
                            <div class="slide__text slide__text--5 slide__subtext slide__subtext--5"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p></div>
                            <div class="slide__bg"></div>
                            <div class="slide__img">
                                <div class="slide__img-wrapper"> </div>
                            </div>
                            <div class="slide__bg-dark"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-products_mobile" v-if="showMobile">
            <div class="slide_mob slide--1_mob">
                <div class="slide-inner slide-inner_mob">
                    <div class="slide__text_mob slide__title_mob" v-show="showTitleMob[0]">
                        <span id="0" class="slide__content_mob" v-on:click="changeText">Окна</span>
                    </div>
                    <div class="slide__text_mob slide__subtext_mob" v-show="showTextMob[0]">
                        <p class="slide__content_mob">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p>
                    </div>
                </div>
            </div>
            <div class="slide_mob slide--2_mob">
                <div class="slide-inner slide-inner_mob">
                    <div class="slide__text_mob slide__title_mob" v-show="showTitleMob[1]">
                        <span id="1" class="slide__content_mob" v-on:click="changeText">Двери</span>
                    </div>
                    <div class="slide__text_mob slide__subtext_mob" v-show="showTextMob[1]">
                        <p class="slide__content_mob">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p>
                    </div>
                </div>
            </div>
            <div class="slide_mob slide--3_mob">
                <div class="slide-inner slide-inner_mob">
                    <div class="slide__text_mob slide__title_mob" v-show="showTitleMob[2]">
                        <span id="2" class="slide__content_mob" v-on:click="changeText">Жалюзи</span>
                    </div>
                    <div class="slide__text_mob slide__subtext_mob" v-show="showTextMob[2]">
                        <p class="slide__content_mob">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p>
                    </div>
                </div>
            </div>
            <div class="slide_mob slide--4_mob">
                <div class="slide-inner slide-inner_mob">
                    <div class="slide__text_mob slide__title_mob" v-show="showTitleMob[3]">
                        <span id="3" class="slide__content_mob" v-on:click="changeText">Ролеты</span>
                    </div>
                    <div class="slide__text_mob slide__subtext_mob" v-show="showTextMob[3]">
                        <p class="slide__content_mob">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p>
                    </div>
                </div>
            </div>
            <div class="slide_mob slide--5_mob">
                <div class="slide-inner slide-inner_mob">
                    <div class="slide__text_mob slide__title_mob" v-show="showTitleMob[4]">
                        <span id="4" class="slide__content_mob" v-on:click="changeText">Ворота</span>
                    </div>
                    <div class="slide__text_mob slide__subtext_mob" v-show="showTextMob[4]">
                        <p class="slide__content_mob">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque distinctio facilis fugit in nisi quisquam recusandae sequi soluta ullam?</p>
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
                isActive : false,
                show: true,
                showMobile: false,
                windowWidth: 0,
                showTitleMob: {
                    0: true,
                    1: true,
                    2: true,
                    3: true,
                    4: true
                },
                showTextMob: {
                    0: false,
                    1: false,
                    2: false,
                    3: false,
                    4: false
                }
            }
        },
        mounted () {
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                this.getWindowWidth();
            })
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        methods: {
            getWindowWidth() {
                this.windowWidth = document.documentElement.clientWidth;
                if (this.windowWidth < 768){
                    this.show = false;
                    this.showMobile = true;
                } else {
                    sGlobal.on('slideChange', this.showProductsAnim);
                    this.show = true;
                    this.showMobile = false;
                }
            },
            showProductsAnim: function () {
                if (sGlobal.activeIndex === 4){
                    this.isActive = 'active';
                    this.animation();
                }
            },
            changeText: function (e){

                if (e){
                    for (let key in this.showTitleMob){
                        this.showTitleMob[key] = true;
                    }
                    for (let key in this.showTextMob){
                        this.showTextMob[key] = false;
                    }
                    let id = e.target.id;
                    this.showTitleMob[id] = false;
                    this.showTextMob[id] = true;
                }
            },
            animation: function () {
                //Animation
                const $slide = $('.slide');
                const $text = $('.slide__text');
                const $subtext = $('.slide__subtext');
                const numSlides = 5;
                const initialAnimDur = 5705;
                const animDelay = 0;
                let initialAnim = true;
                let clickAnim = false;

                $(document).on('mousemove', '.slide', function() {
                    if(initialAnim || clickAnim) return;
                    let _this = $(this);
                    let target = +_this.attr('data-target');

                    _this.css({
                        'transform': 'translate3d(-' + (((100 / numSlides) * (numSlides - (target - 1))) + 5) + '%, 0, 0)',
                        'transition': '750ms',
                    });

                    _this.find('.slide__text').css({
                        'transform': 'translate3d(0, -40%, 0) rotate(0.01deg)',
                        '-moz-transform': 'translate3d(0, -40%, 0) rotate(0.01deg)',
                        // 'opacity': '1',
                        'transition': '750ms',
                    });

                    _this.find('.slide__subtext').css({
                        'opacity': '1',
                    });

                    for(let i = target, length = $slide.length; i < length; i++) {
                        $('.slide--' + (i + 1)).css({
                            'transform': 'translate3d(-' + (((100 / numSlides) * (numSlides - ((i + 1) - 1))) - 5) + '%, 0, 0)',
                            'transition': '750ms',
                        })
                    }

                    for(let i = target; i > 1; i--) {
                        $('.slide--' + (i - 1)).css({
                            'transform': 'translate3d(-' + (((100 / numSlides) * (numSlides - ((i - 1) - 1))) + 5) + '%, 0, 0)',
                            'transition': '750ms',
                        })
                    }

                    _this.find('.slide__img-wrapper').css({
                        'transform': 'translate3d(-200px, 0, 0) scale(.85, .85)',
                        'transition': '750ms',
                    });

                    $slide.not(_this).find('.slide__img-wrapper').css({
                        'transform': 'translate3d(-200px, 0, 0) scale(.90, .90)',
                        'transition': '1000ms',
                    });

                    $slide.not(_this).find('.slide__bg-dark').css({
                        'opacity': '.75'
                    })
                });

                $(document).on('mouseleave', '.slide', function() {
                    if(initialAnim || clickAnim) return;
                    let _this = $(this);
                    let target = +_this.attr('data-target');

                    for(let i = 1, length = $slide.length; i <= length; i++) {
                        $('.slide--' + i).css({
                            'transform': 'translate3d(-' + (100 / numSlides) * (numSlides - (i - 1)) + '%, 0, 0)',
                            'transition': '1000ms',
                        })
                    }

                    $slide.find('.slide__img-wrapper').css({
                        'transform': 'translate3d(-200px, 0, 0) scale(1, 1)',
                        'transition': '750ms',
                    });

                    $slide.find('.slide__bg-dark').css({
                        'opacity': '0'
                    });

                    $text.css({
                        'transform': 'translate3d(0, -50%, 0) rotate(0.01deg)',
                        // 'opacity': '0',
                        'transition': '200ms',
                    });

                    $subtext.css({
                        'opacity': '0',
                    });
                });

                setTimeout(function() {
                    initialAnim = false;
                }, initialAnimDur + animDelay);
            }
        }
    }
</script>