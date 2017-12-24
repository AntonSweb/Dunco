<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        {{--Style--}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.6/css/swiper.min.css">
        <link rel="stylesheet" href="app/css/style.css">
    </head>
    <body>
    <div class="mask" role="dialog"></div>
    <div class="flex modal modal__flex" role="alert">
        <button class="modal__close" role="button">X</button>
        <div class="modal__order">
            <div class="section__title modal__title">Отправьте заявку</div>
            <div class="modal__subtitle">И мы свяжемся с Вами в течении 30 минут</div>
            <div class="modal__form">
                <form class="form">
                    <div class="form__field">
                        <input class="form__input form__in" type="text" name="name" placeholder="Как Вас зовут?" required>
                    </div>
                    <div class="form__field">
                        <input class="form__input form__in" type="email" name="email" placeholder="Ваш e-mail" required>
                    </div>
                    <div class="form__field">
                        <input class="form__input form__in form__tel" type="tel" name="tel" placeholder="Ваш контактный телефон" required>
                    </div>
                    <div class="form__field">
                        <input class="form__in form__submit" type="submit" value="Свяжитесь со мной" name="send">
                    </div>
                    <div class="form__field">
                        <input type="hidden" name="from">
                        <input type="hidden" name="type">
                        <input type="hidden" name="url" value="/">
                    </div>
                </form>
            </div>
            <div class="form__hint">
                Отправляя заявку вы даете соглашение на<br>
                обработку ваших персональных данных.<br>
            </div>
        </div>
    </div>
    <header class="header">
         <div class="container header__container">
            <vueheader></vueheader>
         </div>
    </header>
    <section class="section__menu">
        <vuemenu></vuemenu>
    </section>
    {{--<main>--}}
        <div class="swiper-container s-global">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <section class="section__front-slider">
                    <vueswiper></vueswiper>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="section__video">
                  <vuevideo></vuevideo>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="section__trust">
                    <vuetrust></vuetrust>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="section__people">
                    <vuepeople></vuepeople>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="section__our-products">
                    <vueproducts></vueproducts>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="section__gallery">
                    <vuegallery></vuegallery>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="section__order">
                    <vueorder></vueorder>
                </section>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination sp-g sp-global"></div>
    </div>
    {{--</main>--}}
    <footer class="footer">
        <vuefooter></vuefooter>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.6/js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
            var sGlobal = new Swiper('.s-global', {
                direction: 'vertical',
                slidesPerView: 1,
                mousewheel: true,
                pagination: {
                    el: '.sp-global',
                    clickable: true,
                },
                parallax: true
            });

            $(function(){

                sGlobal.on('slideChange', function(){
                    if (sGlobal.activeIndex !== 0){
                        $('.sp-global').show();
                    } else {
                        $('.sp-global').hide();
                    }
                });

                function closeModal(){
                    $(".mask").removeClass("active");
                }
                
                $(".modal__close, .mask").on("click", function(){
                    closeModal();
                });
                
                $(document).keyup(function(e) {
                    if (e.keyCode == 27 && sGlobal.activeIndex !== 1) {
                        closeModal();
                    }
                });
        
                $(".form__tel").mask("+380(99) 999-99-99");


                //CANVAS
                    var c = document.getElementById('canv'), 
                        ctx = c.getContext("2d");
                    var w = c.width = window.innerWidth, 
                        h = c.height = window.innerHeight;
    
                    Snowy();
                    function Snowy() {
                    var snow, arr = [];
                    var num = 600, tsc = 1, sp = 1;
                    var sc = 1.3, t = 0, mv = 20, min = 1;
                        for (var i = 0; i < num; ++i) {
                            snow = new Flake();
                            snow.y = Math.random() * (h + 50);
                            snow.x = Math.random() * w;
                            snow.t = Math.random() * (Math.PI * 2);
                            snow.sz = (100 / (10 + (Math.random() * 100))) * sc;
                            snow.sp = (Math.pow(snow.sz * .8, 2) * .15) * sp;
                            snow.sp = snow.sp < min ? min : snow.sp;
                            arr.push(snow);
                        }
                    go();
                    function go(){
                        window.requestAnimationFrame(go);
                        ctx.clearRect(0, 0, w, h);
                            for (var i = 0; i < arr.length; ++i) {
                            f = arr[i];
                            f.t += .05;
                            f.t = f.t >= Math.PI * 2 ? 0 : f.t;
                            f.y += f.sp;
                            f.x += Math.sin(f.t * tsc) * (f.sz * .3);
                            if (f.y > h + 50) f.y = -10 - Math.random() * mv;
                            if (f.x > w + mv) f.x = - mv;
                            if (f.x < - mv) f.x = w + mv;
                            f.draw();}
                    }
                    function Flake() {
                        this.draw = function() {
                            this.g = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.sz);
                            this.g.addColorStop(0, 'hsla(255,255%,255%,1)');
                            this.g.addColorStop(1, 'hsla(255,255%,255%,0)');
                            ctx.moveTo(this.x, this.y);
                            ctx.fillStyle = this.g;
                            ctx.beginPath();
                            ctx.arc(this.x, this.y, this.sz, 0, Math.PI * 2, true);
                            ctx.fill();}
                        }
                    }
                    /*_Midnight Snow A PEN BY Tiffany Rayside_*/
                    window.addEventListener('resize', function(){
                        c.width = w = window.innerWidth;
                        c.height = h = window.innerHeight;
                    }, false);
                
            });
    </script>
    <script src="app/js/build.js"></script>
    </body>
</html>