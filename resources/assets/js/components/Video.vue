<template>
        <section class="section__video">
            <video class="video" autoplay loop muted preload v-if="showVideoMob">
                 <source src="dist/video/dunco.webm" type="video/webm">
                 <source src="dist/video/dunco.mp4" type="video/mp4">
            </video>
            <transition name="fade">
                <div class="video__inner" v-show="showContent">
                    <img src="dist/img/dunco-logo_big.png" alt="Логотип компании Данко" class="video__logo">
                    <h3 class="section__title section__title-video">КОМПЕТЕНЦИИ - ИННОВАЦИИ - БЕЗОПАСТНОСТЬ</h3>
                    <div class="play-video__wrap">
                        <a id="play-video" class="video-play-button" v-on:click.prevent="playFunc">
                            <span></span>
                        </a>
                    </div>
                    <div class="about-company__wrap">
                        <p class="about-company">
                            Добро пожаловать на сайт компании окон и дверей - «Данко»!
                            Компания «Данко» — это продукция высокого качества, безупречное отношение к Клиенту, многолетний опыт на рынке и ответственный подход  к каждому заказу.
                            Компания «Данко» специализируется по таким направлениям как: окна и балконные конструкции, распашные и раздвижные входные и межофисные двери  из ПВХ и алюминия, индивидуальное архитектурное проектирование конструкций для остекления фасадов жилых и промышленных зданий, торговых центров, витрин и др.
                            Мы всегда внимательно прислушиваемся к пожеланиям наших Клиентов и внедряем проверенные инновационные технологии.  Многочисленные отзывы и рекомендации наших Клиентов — лучшее признание качества нашей продукции и услуг. Уникальный ассортимент готовых комплексных решений и широкие возможности для создания любого нестандартного индивидуального решения позволяют «Данко»  прочно удерживать позиции лидера на рынке Украины.  Вам будет предложено несколько вариантов коммерческих предложений, которые будут соответствовать Вашим пожеланиям, всем стандартам и технологиям.  У нас есть рекомендательные письма от известных загородных клубов, учебных заведений и людей которые нам доверились! Обращайте и Вы,  всегда рады Вам помочь!
                        </p>
                    </div>
                </div>
            </transition>
             <div id="video-overlay" class="video-overlay" v-bind:class="{open: isActive}" v-on:click="closeFunc">
                 <div class="video-overlay-inner" v-on:mouseover="mouseOver" v-on:mouseleave="mouseLeave">
                    <a class="video-overlay-close" v-on:click.prevent="closeFunc" v-show="showClose">×</a>
                    <iframe id="Youtube" src="https://www.youtube.com/embed/mAhPgohwsQI?enablejsapi=1&autoplay=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen v-if="showVideo"></iframe>
                </div>
            </div>
        </section>
</template>
<script>
    module.exports = {
        data: function() {
            return {
                showContent: false,
                showVideo: false,
                showClose: false,
                showVideoMob: true,
                isActive: false,
                counter: 0,
                windowWidthSm: window.matchMedia('(max-width: 768px)').matches,
                windowWidth: 0
            };
        },
        mounted (){
            sGlobal.on('slideChange', this.showBgVideo);
            document.addEventListener('keyup', this.closeFuncKeyup);
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                this.getWindowWidth();
            })
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        methods: {
            showBgVideo: function (){
                 if (sGlobal.activeIndex === 1){
                     this.showContent = true
                 }
            },
            playFunc: function (){
                 this.showVideo = true;
                 this.isActive = true;
                 if (this.windowWidthSm){
                     this.showClose = true;
                 }
                 if (this.counter === 1 && this.windowWidthSm){
                     this.playOn();
                } 
            },
            closeFunc: function (){
                this.isActive = false;
                this.playOff()                
            },
            closeFuncKeyup: function (e){
                if (e.keyCode === 27 && this.showVideo) {
                    this.isActive = false;
                    this.playOff()
                }
            },
            mouseOver: function(){
                this.showClose = true;   
            },
            mouseLeave: function(){
                this.showClose = false;   
            },
            playOff: function (){
                $('#Youtube')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
                this.counter = 1;
            },
            playOn: function (){
                $('#Youtube')[0].contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*')
            },
            getWindowWidth() {
                this.windowWidth = document.documentElement.clientWidth;
                if (this.windowWidth < 768){
                    return this.showVideoMob = false;
                } else {
                    this.showVideoMob = true;
                }
            },
        },
    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active{
        -webkit-transition: opacity 3s;
        -moz-transition: opacity 3s;
        -o-transition: opacity 3s;
        transition: opacity 3s;
    }
    .fade-enter, .fade-leave-to{
        opacity: 0;
    }
</style>