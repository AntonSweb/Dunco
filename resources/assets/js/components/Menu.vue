<template>
    <transition name="fade">
        <section class="flex fixed section__menu" v-show="show" v-bind:class="posChange">
            <div class="flex menu__flex container">
                <a href="javascript:void(0);" class="menu__item" data-num="4" v-on:click="changeSlideTo">
                    <span class="menu__icon icon window-icon-dunco-black"></span>
                    <span class="menu__caption">Окна</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon icon door-icon-dunco-black"></span>
                    <span class="menu__caption">Двери</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon icon roleta-window-icon-dunco-black"></span>
                    <span class="menu__caption">Жалюзи</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon icon roleta-icon-dunco-black"></span>
                    <span class="menu__caption">Ролеты</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click.prevent="changeSlideTo">
                    <span class="menu__icon icon vorota-icon-dunco-black"></span>
                    <span class="menu__caption">Ворота</span>
                </a>
                <a href="javascript:void(0);" class="menu__item" v-on:click="modalOpen">
                    <span class="menu__icon icon mail-icon-dunco-black"></span>
                    <span class="menu__caption menu__caption7">Подписать договор</span>
                </a>
                <a href="tel:+380688332020" class="menu__item">
                    <span class="menu__icon icon tel-icon-dunco-black"></span>
                    <span class="menu__caption">Вызов мастера</span>
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
            changeSlideTo: function (){
                sGlobal.slideTo(4, 1000);
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
                    this.changeSlideFunc();
                    sGlobal.on('slideChange', this.changeSlideFunc);
                    this.show = true;
                }
            },
            modalOpen: function (){
                $('.mask__order').addClass('active');
            }
        }
    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active{
        -webkit-transition: opacity .8s;
        -moz-transition: opacity .8s;
        -o-transition: opacity .8s;
        transition: opacity .8s;
    }
    .fade-enter, .fade-leave-to{
        opacity: 0
    }
</style>