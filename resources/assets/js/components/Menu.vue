<template>
    <transition name="fade">
        <section class="flex fixed section__menu" v-show="show" v-bind:class="posChange">
            <div class="flex menu__flex container">
                <a href="javascript:void(0);" class="menu__item" data-num="4" v-on:click="changeSlideTo">
                    <span class="menu__icon menu__icon1"></span>
                    <span class="menu__caption">Окна</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon menu__icon2"></span>
                    <span class="menu__caption">Двери</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon menu__icon3"></span>
                    <span class="menu__caption">Жалюзи</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon menu__icon4"></span>
                    <span class="menu__caption">Ролеты</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon menu__icon5"></span>
                    <span class="menu__caption">Ворота</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon menu__icon6"></span>
                    <span class="menu__caption">Вызов мастера</span>
                </a>
                <a href="javascript:void(0);" class="menu__item menu__item7">
                    <span class="menu__icon menu__icon7"></span>
                    <span class="menu__caption menu__caption7">Подписать договор</span>
                </a>
            </div>
        </section>
    </transition>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                show: true,
                posChange: 'bottom',
                windowWidth: 0
            };
        },
        mounted (){
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                this.getWindowWidth();
            })
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        methods: {
            changeSlideTo: function (e){
                if (e){
                    sGlobal.slideTo(4, 1000);
                }
            },
            changeSlideFunc: function (){
                if (sGlobal.activeIndex !== 0){
                    this.posChange = 'top'
                } else {
                    this.posChange = 'bottom'
                }
            },
            getWindowWidth() {
                this.windowWidth = document.documentElement.clientWidth;
                if (this.windowWidth < 768){
                   return this.show = false;
                } else {
                    sGlobal.on('slideChange', this.changeSlideFunc);
                    this.show = true;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active {
        -webkit-transition: opacity .8s;
        -moz-transition: opacity .8s;
        -o-transition: opacity .8s;
        transition: opacity .8s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0
    }
</style>