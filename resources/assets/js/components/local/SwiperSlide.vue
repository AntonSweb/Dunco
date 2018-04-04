<template>
    <div class="swiper-slide">
        <div class="front-slide front-slide__bg">
            <div class="container flex front-slide__flex">
                <transition name="fade">
                <div class="front-slide__content">
                    <div class="content__top-wrap">
                        <slot name="title"></slot>
                        <p class="front-slide__subtitle">Успейте заказать товари в данко и гарантированно получите скидку</p>
                    </div>
                    <div class="content__bottom-wrap">
                        <countdown :time="time" :interval="1000" tag="p">
                            <div slot-scope="props" class="flex sale-counter">
                                <div class="sale-counter__item sale-counter__days">
                                    <span class="sale-counter__numbers">{{ props.days }}</span>
                                    <span class="sale-counter__text">Дней</span>
                                </div>
                                <div class="sale-counter__item sale-counter__hours">
                                    <span class="sale-counter__numbers">{{ props.hours }}</span>
                                    <span class="sale-counter__text">Часов</span>
                                </div>
                                <div class="sale-counter__item sale-counter__minutes">
                                    <span class="sale-counter__numbers">{{ props.minutes }}</span>
                                    <span class="sale-counter__text">Минут</span>
                                </div>
                                <div class="sale-counter__item sale-counter__seconds">
                                    <span class="sale-counter__numbers">{{ props.seconds }}</span>
                                    <span class="sale-counter__text">Секунд</span>
                                </div>
                            </div>
                        </countdown>
                        <div class="g-btn front-slide__btn" v-on:click="modalOpen">
                            <span class="g-btn__bg front-slide__btn_bg"></span>
                            <span class="g-btn__text front-slide__btn-text">Оставить заявку</span>
                        </div>
                        <div class="scroll-down__wrap">
                            <div class="scroll-down">
                                <span class="scroll-arrow"></span>
                                <span class="scroll-arrow scroll-arrow1"></span>
                                <span class="scroll-arrow scroll-arrow2"></span>
                            </div>
                            <span class="scroll-down__text">Scroll down</span>
                        </div>
                    </div>
                </div>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    import VueCountdown from '@xkeshi/vue-countdown'

    export default {
        data: function() {
            let now = new Date();
            let newYear = new Date(2018, 3, 30, 15);

            return {
                time: newYear - now
            };
        },
        methods: {
            modalOpen: function (){
                $('.mask__order').addClass('active');
            }
        },
        components: {
            countdown: VueCountdown
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