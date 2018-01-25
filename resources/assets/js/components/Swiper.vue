<template>
    <!-- Swiper -->
    <div class="swiper-container s-front">
        <!--<canvas id='canv' v-if="showCanv"></canvas>-->
        <div class="swiper-wrapper">
            <swiperslide class="front-slide1">
                <canvas slot="canvas" id='canv'></canvas>
                <h1 slot="title" class="front-slide__title">Шум и холод вам мешают? Окна "Данко" помагают!</h1>
            </swiperslide>
            <swiperslide class="front-slide2">
                <h2 slot="title" class="front-slide__title">Покупайте двери с выгодой!</h2>
            </swiperslide>
            <swiperslide class="front-slide3">
                <h2 slot="title" class="front-slide__title">Правильное решение - это ваш гарантированный комфорт!</h2>
            </swiperslide>
            <swiperslide class="front-slide4">
                <h2 slot="title" class="front-slide__title">Широкий выбор материалов превратит ваши окна в шедевр!</h2>
            </swiperslide>
            <swiperslide class="front-slide5">
                <h2 slot="title" class="front-slide__title">Доверь свои мечты профессионалам!<br v-if="showBr" /> Больше, чем просто ролеты!</h2>
            </swiperslide>
        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination sp-g sp-front"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next sbn-front"></div>
        <div class="swiper-button-prev sbp-front"></div>
    </div>
</template>


<script>
    import Swiperslide from './local/SwiperSlide.vue'
    module.exports = {
        data: function() {
            return {
                c: '',
                ctx: '',
                w: 0,
                h: 0,
                windowWidth: 0,
                infinite: true,
                sFront: {},
                show: false,
                showBr: true
            };
        },
        mounted: function () {
            let that = this;
            this.sFront = new Swiper ('.s-front', {
                // loop: this.infinite,
                // autoplay: {
                    // delay: 6000
                // },
                pagination: {
                    el: '.sp-front',
                    clickable: true
                },
                navigation: {
                    nextEl: '.sbn-front',
                    prevEl: '.sbp-front'
                },
                on: {
                    init: function () {
                        that.initCanvas();
                        that.Snowy();
                    },
                    slideChange: function () {

                    }
                },
                grabCursor: true
            });
            this.$nextTick(function() {
                window.addEventListener('resize', this.getWindowWidth);
                this.getWindowWidth();
            });
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        },
        methods: {
            getWindowWidth() {
                this.windowWidth = document.documentElement.clientWidth;
                this.c.width = this.w = window.innerWidth;
                this.c.height = this.h = window.innerHeight;
                if (this.windowWidth < 768){
                    return this.showBr = false;
                } else {
                    this.showBr = true;
                }
            },
            initCanvas() {
                this.c =  document.getElementById("canv");
                this.ctx = this.c.getContext("2d");
                this.w = this.c.width =  window.innerWidth;
                this.h = this.c.height = window.innerHeight;
            },
            Snowy() {
                let that = this;
                var snow, arr = [], f = [];
                var num = 600, tsc = 1, sp = 1;
                var sc = 1.3, t = 0, mv = 20, min = 1;
                for (var i = 0; i < num; ++i) {
                    snow = new Flake();
                    snow.y = Math.random() * (that.h + 50);
                    snow.x = Math.random() * that.w;
                    snow.t = Math.random() * (Math.PI * 2);
                    snow.sz = (100 / (10 + (Math.random() * 100))) * sc;
                    snow.sp = (Math.pow(snow.sz * .8, 2) * .15) * sp;
                    snow.sp = snow.sp < min ? min : snow.sp;
                    arr.push(snow);
                }
                go();
                function go(){
                    window.requestAnimationFrame(go);
                    that.ctx.clearRect(0, 0, that.w, that.h);
                    for (var i = 0; i < arr.length; ++i) {
                        f = arr[i];
                        f.t += .05;
                        f.t = f.t >= Math.PI * 2 ? 0 : f.t;
                        f.y += f.sp;
                        f.x += Math.sin(f.t * tsc) * (f.sz * .3);
                        if (f.y > that.h + 50) f.y = -10 - Math.random() * mv;
                        if (f.x > that.w + mv) f.x = - mv;
                        if (f.x < - mv) f.x = that.w + mv;
                        f.draw();}
                }
                function Flake() {
                    this.draw = function() {
                        this.g = that.ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.sz);
                        this.g.addColorStop(0, 'hsla(255,255%,255%,1)');
                        this.g.addColorStop(1, 'hsla(255,255%,255%,0)');
                        that.ctx.moveTo(this.x, this.y);
                        that.ctx.fillStyle = this.g;
                        that.ctx.beginPath();
                        that.ctx.arc(this.x, this.y, this.sz, 0, Math.PI * 2, true);
                        that.ctx.fill();}
                }
            }

        },
        components: {
            Swiperslide
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