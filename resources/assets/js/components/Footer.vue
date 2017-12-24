<template>
    <!--footer-->
    <footer class="footer" v-show="show">
        <div class="flex footer__flex">
            <a href="" class="flex footer__circle footer__circle-skype">
                <img src="app/img/skype-icon.png" alt="dunco footer skype icon" class="footer__icon footer__icon-skype">
            </a>
            <a href="" class="flex footer__circle">
                <img src="app/img/fb-icon.png" alt="dunco footer facebook icon"  class="footer__icon footer__icon-fb tada">
            </a>
            <a href="" class="flex footer__circle">
                <img src="app/img/youtube-icon.png" alt="dunco footer youtube icon" class="footer__icon footer__icon-youtube tada">
            </a>
            <a href="" class="flex footer__circle footer__circle-insta">
                <img src="app/img/insta-icon.png" alt="dunco footer instagram icon" class="footer__icon footer__icon-insta tada">
            </a>
        </div>
    </footer>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                show: false,
            };
        },
        methods: {
            changeSlideFunc: function (){
                if (sGlobal.activeIndex === 6){
                 return  this.show = true
                } else {
                    this.show = false
                }
            },
        },
        created () {
            sGlobal.on('slideChange', this.changeSlideFunc);
        },
    }
</script>