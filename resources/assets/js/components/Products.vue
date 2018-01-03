<template>
    <section class="section__our-products">
        <div class="our-products__inner">
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
    </section>
</template>

<script>
    module.exports = {
        data: function () {
            return {
                isActive : false
            }
        },
        mounted () {
            sGlobal.on('slideChange', this.showProductsAnim);
        },
        methods: {
           showProductsAnim: function () {
               if (sGlobal.activeIndex === 4){
                   this.isActive = 'active';
                   this.animation();
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