<template>
    <!--footer-->
    <transition name="fade">
        <footer class="footer" v-show="show">
            <div class="flex footer__flex">
                <a href="skype:0688332020?call" target="_blank" class="flex footer__circle footer__circle-skype">
                    <img src="dist/img/skype-icon.png" alt="dunco footer skype icon" class="footer__icon footer__icon-skype">
                </a>
                <a href="https://www.facebook.com/DuncoUA/" target="_blank" class="flex footer__circle">
                    <img src="dist/img/fb-icon.png" alt="dunco footer facebook icon"  class="footer__icon footer__icon-fb tada">
                </a>
                <a href="https://www.youtube.com/channel/UCQ6Oo6qD3STQ2nGMSm9aYIA" target="_blank" class="flex footer__circle">
                    <img src="dist/img/youtube-icon.png" alt="dunco footer youtube icon" class="footer__icon footer__icon-youtube tada">
                </a>
                <a href="https://www.instagram.com/dunco_ua" target="_blank" class="flex footer__circle footer__circle-insta">
                    <img src="dist/img/insta-icon.png" alt="dunco footer instagram icon" class="footer__icon footer__icon-insta tada">
                </a>
            </div>
        </footer>
    </transition>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                show: false
            }
        },
        methods: {
            changeSlideFunc: function (){
                if (sGlobal.activeIndex === 6){
                 return  this.show = true
                } else {
                    this.show = false
                }
            }
        },
        created () {
            sGlobal.on('slideChange', this.changeSlideFunc);
        }
    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active{
        -webkit-transition: opacity .6s;
        -moz-transition: opacity .6s;
        -o-transition: opacity .6s;
        transition: opacity .6s;
    }
    .fade-enter, .fade-leave-to{
        opacity: 0
    }
</style>