<template>
    <header class="header">
        <div class="container header__container">
            <div class="flex header__flex">
                <a href="/" class="header__logo"><img src="dist/img/dunco-logo.png" alt="Логотип компании Данко"></a>
                <nav class="nav">
                    <a href="/" class="nav__link nav__link-home">Главная</a>
                    <a href="javascript:void(0);" id="1" class="nav__link nav__link-company" v-on:click="changeSlideTo">О компании</a>
                    <a href="javascript:void(0);" id="0" class="nav__link nav__link-sale" v-on:click="changeSlideTo">Скидки и Акции</a>
                    <a href="javascript:void(0);" id="5" class="nav__link nav__link-gallery" v-on:click="changeSlideTo">Галерея</a>
                    <a href="javascript:void(0);" id="6" class="nav__link nav__link-contacts" v-on:click="changeSlideTo">Контакти</a>
                </nav>
                <span class="header__tel">(068) 833-20-20</span>
                <div class="header__right-side">
                    <span class="header__search"></span>
                    <span class="header__menu" v-on:click="showMenu = !showMenu"></span>
                </div>
            </div>
        </div>
        <transition name="fade">
            <div class="menu-mob flex menu-mob-g__flex" v-show="showMenu">
                <div class="menu-mob__top">
                    <img src="dist/img/dunco-logo_big.png" alt="Логотип компании Дунко" class="menu-mob__logo">
                    <span class="menu-mob__caption">Компетенции, Инновации, Безопасность</span>
                </div>
                <div class="flex menu-mob__flex">
                    <a href="javascript:void(0);" class="menu__item menu-mob__item" data-num="4" v-on:click="changeSlideToProducts">
                        <span class="menu__icon icon window-icon-dunco-white"></span>
                        <span class="menu__caption menu-mob__caption">Окна</span>
                    </a>
                    <a href="javascript:void(0);" class="menu__item menu-mob__item" v-on:click="changeSlideToProducts">
                        <span class="menu__icon icon door-icon-dunco-white"></span>
                        <span class="menu__caption menu-mob__caption">Двери</span>
                    </a>
                    <a href="javascript:void(0);" class="menu__item menu-mob__item" v-on:click="changeSlideToProducts">
                        <span class="menu__icon icon roleta-window-icon-dunco-white"></span>
                        <span class="menu__caption menu-mob__caption">Жалюзи</span>
                    </a>
                    <a href="javascript:void(0);" class="menu__item menu-mob__item" v-on:click="changeSlideToProducts">
                        <span class="menu__icon icon roleta-icon-dunco-white"></span>
                        <span class="menu__caption menu-mob__caption">Ролеты</span>
                    </a>
                    <a href="javascript:void(0);" class="menu__item menu-mob__item" v-on:click="changeSlideToProducts">
                        <span class="menu__icon icon vorota-icon-dunco-white"></span>
                        <span class="menu__caption menu-mob__caption">Ворота</span>
                    </a>
                    <a href="javascript:void(0);" class="menu__item menu-mob__item" v-on:click="changeSlideToContacts">
                        <span class="menu__icon icon tel-icon-dunco-white"></span>
                        <span class="menu__caption menu-mob__caption">Вызов мастера</span>
                    </a>
                    <!--<a href="javascript:void(0);" class="menu__item menu__item7">-->
                        <!--<span class="menu__icon icon mail-icon-dunco-white"></span>-->
                        <!--<span class="menu__caption menu-mob__caption">Подписать договор</span>-->
                    <!--</a>-->
                </div>
                <ul class="menu-mob__list">
                    <li class="menu-mob__list-item"><a href="javascript:void(0)" class="menu-mob__link" v-on:click="changeSlideToContacts">Контакты</a></li>
                </ul>
            </div>
        </transition>
        <div class="menu-mob__mask" v-show="showMenu" v-on:click="closeMenu"></div>
    </header>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                showMenu: false,
                isActive: false
            };
        },
        methods: {
            changeSlideTo: function (e){
                if (e){
                    let indexTo = e.target.id;
                    sGlobal.slideTo(indexTo, 1000);
                }
            },
            changeSlideToContacts: function (){
                sGlobal.slideTo(6, 1000);
                this.showMenu = false
            },
            changeSlideToProducts: function (){
                sGlobal.slideTo(4, 1000);
                this.showMenu = false
            },
            closeMenu: function(){
                this.showMenu = false
            }
        },
    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active{
        -webkit-transition: opacity .3s;
        -moz-transition: opacity .3s;
        -o-transition: opacity .3s;
        transition: opacity .3s;
    }
    .fade-enter, .fade-leave-to{
        opacity: 0
    }
</style>