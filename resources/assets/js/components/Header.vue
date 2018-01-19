<template>
    <header class="header">
        <div class="container header__container">
            <div class="flex header__flex">
                <a href="/" class="header__logo"><img src="app/img/dunco-logo.png" alt="Логотип компании Данко"></a>
                <nav class="nav">
                    <a href="/" class="nav__link nav__link-home">Главная</a>
                    <a id="1" class="nav__link nav__link-company" v-on:click.prevent="changeSlideTo">О компании</a>
                    <a href="javascript:void(0);" class="nav__link nav__link-sale">Скидки и Акции</a>
                    <a href="javascript:void(0);" id="5" class="nav__link nav__link-gallery" v-on:click.prevent="changeSlideTo">Галерея</a>
                    <a href="javascript:void(0);" id="6" class="nav__link nav__link-contacts" v-on:click.prevent="changeSlideTo">Контакти</a>
                </nav>
                <span class="header__tel">(068) 833-20-20</span>
                <span class="header__search"></span>
                <!-- <span class="header__menu"></span> -->
            </div>
        </div>
    </header>
</template>

<script>
    module.exports = {
        methods: {
            changeSlideTo: function (e){
                if (e){
                    let indexTo = e.target.id;
                    sGlobal.slideTo(indexTo, 1000);
                }
            }
        },
    }
</script>