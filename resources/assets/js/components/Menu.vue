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
                    <span class="menu__caption menu__caption7">Отправить сообщение</span>
                </a>
                <a href="tel:+380688332020" class="menu__item">
                    <span class="menu__icon icon tel-icon-dunco-black"></span>
                    <img src="dist/img/tel-icon-dunco-black-image.svg" alt="telephone icon" class="tel-icon-dunco-black-img">
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
                windowWidth: 0,
                mod: 'active'
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
                $('.mask__message').addClass('active');
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


    .menu__item{
        position: relative;

        &:last-of-type{
            margin-top: -4px;
        }
    }
    .tel-icon-dunco-black {
        width: 60px;
        height: 60px;
        background: #111a37;
        border-radius: 50%;
        animation: pulse-border 1500ms ease-out infinite;
        position: absolute;
        z-index: 0;
        left: 50%;
        top: 31%;
        transform: translateX(-50%) translateY(-50%);

        /*&:hover{*/
            /*animation: none;*/
        /*}*/
    }

    .tel-icon-dunco-black-img {
        border-radius: 50%;
        cursor: pointer;
        z-index: 1;
    }

    @keyframes pulse-border {
        0% {
            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
            opacity: 1;
        }
        100% {
            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
            opacity: 0;
        }
    }
</style>