<template>
    <div class="swiper-slide">
        <div class="front-slide front-slide__bg">
            <div class="container flex front-slide__flex">
                <div class="front-slide__content">
                    <slot></slot>
                    <p class="front-slide__subtitle">Успейте заказать товари в данко и гарантированно получите скидку</p>
                    <div class="flex sale-counter">
                        <div class="sale-counter__item sale-counter__days">
                            <span class="sale-counter__numbers">01</span>
                            <span class="sale-counter__text">Дней</span>
                        </div>
                        <div class="sale-counter__item sale-counter__hours">
                            <span class="sale-counter__numbers">23</span>
                            <span class="sale-counter__text">Часов</span>
                        </div>
                        <div class="sale-counter__item sale-counter__minutes">
                            <span class="sale-counter__numbers">59</span>
                            <span class="sale-counter__text">Минут</span>
                        </div>
                        <div class="sale-counter__item sale-counter__seconds">
                            <span class="sale-counter__numbers">38</span>
                            <span class="sale-counter__text">Секунд</span>
                        </div>
                    </div> 

                    <!-- <div class="g-btn front-slide__btn">
                        <span class="g-btn__bg front-slide__btn_bg"></span>
                        <span class="g-btn__text front-slide__btn-text">Оставить заявку</span>
                    </div> -->
                  
                    <div class="scroll-down">
                        <!--<i class="fa fa-angle-down"></i>-->
                        <span class="scroll-line"></span>
                        <span class="scroll-arrow"></span>
                        <span class="scroll-arrow scroll-arrow1"></span>
                        <span class="scroll-arrow scroll-arrow2"></span>
                    </div>
                    <span class="scroll-down__text">Scroll down</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    module.exports = {
        data: function() {
            return {
            
            };
        },
    }
</script>