<template>
    <transition name="fade">
        <section class="flex section__menu" v-show="show" v-bind:class="fixed">
            <div class="flex menu__flex container">
                <a href="" class="menu__item">
                    <span class="menu__icon menu__icon1"></span>
                    <span class="menu__caption">Окна</span>
                </a>
                <a href="" class="menu__item">
                    <span class="menu__icon menu__icon2"></span>
                    <span class="menu__caption">Двери</span>
                </a>
                <a href="" class="menu__item">
                    <span class="menu__icon menu__icon3"></span>
                    <span class="menu__caption">Жалюзи</span>
                </a>
                <a href="" class="menu__item">
                    <span class="menu__icon menu__icon4"></span>
                    <span class="menu__caption">Ролеты</span>
                </a>
                <a href="" class="menu__item">
                    <span class="menu__icon menu__icon5"></span>
                    <span class="menu__caption">Ворота</span>
                </a>
                <a href="" class="menu__item">
                    <span class="menu__icon menu__icon6"></span>
                    <span class="menu__caption">Вызов мастера</span>
                </a>
                <a href="" class="menu__item menu__item7">
                    <span class="menu__icon menu__icon7"></span>
                    <span class="menu__caption menu__caption7">Подписать договор на дому</span>
                </a>
            </div>
        </section>
    </transition>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                show: false,
                fixed: 'fixed'
            };
        },
        methods: {
            changeSlideFunc: function (){
                if (sGlobal.activeIndex !== 0){
                    return this.show = true
                } else {
                    this.show = false
                }
            },
        },
        created () {
            sGlobal.on('slideChange', this.changeSlideFunc);
        },
        // destroyed () {
            // window.removeEventListener('mousewheel', this.scrollFunc);
        // }
    }
</script>