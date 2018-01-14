<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/xhtml">
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
    <div class="mask mask__thanks" role="dialog"></div>
    <div class="flex modal modal__flex modal__thanks" role="alert">
        <button class="modal__close modal__thanks-close">X</button>
    </div>
    <div class="mask mask__order" role="dialog"></div>
    <div class="flex modal modal__flex modal__order-wrap" role="alert">
        <button class="modal__close modal__order-close">X</button>
        <div class="modal__order">
            <div class="section__title modal__title">Отправьте заявку</div>
            <div class="modal__subtitle">И мы свяжемся с Вами в течении 30 минут</div>
            <div class="modal__form">
                <form id="order-form" class="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_name" value="dunco.com.ua">
                    <input type="hidden" name="admin_email" value="asaltskyi@gmail.com">
                    <input type="hidden" name="form_subject" value="Заявка с сайта dunco.com.ua">
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
                </form>
            </div>
            <div class="form__hint">Отправляя заявку вы даете соглашение на<br>обработку ваших персональных данных.<br></div>
        </div>
    </div>
    <header class="header" is="vue-header"></header>
    <section class="section__menu">{{--<vue-menu></vue-menu>--}}</section>
        <div class="swiper-container s-global">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <section class="section__front-slider">{{--<vue-swiper></vue-swiper>--}}</section>
            </div>
            <div class="swiper-slide">
                <section class="section__video">{{--<vue-video></vue-video>--}}</section>
            </div>
            <div class="swiper-slide swiper-slide__trust">
                <section class="section__trust">{{--<vue-trust></vue-trust>--}}</section>
            </div>
            <div class="swiper-slide">
                <section class="section__people">{{--<vue-people></vue-people>--}}</section>
            </div>
            <div class="swiper-slide">
                <section class="section__our-products">{{--<vue-products></vue-products>--}}</section>
            </div>
            <div class="swiper-slide">
                <section class="section__gallery">{{--<vue-gallery></vue-gallery>--}}</section>
            </div>
            <div class="swiper-slide">
                <section class="section__order">{{--<vue-order></vue-order>--}}</section>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination sp-g sp-global"></div>
    </div>
    <footer class="footer" is="vue-footer"></footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.6/js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="//www.youtube.com/player_api"></script>

    <script>
        // Initialize Swiper
        var sGlobal = new Swiper('.s-global', {
            direction: 'vertical',
            slidesPerView: 1,
            mousewheel: true,
            pagination: {
                el: '.sp-global',
                clickable: true
            },
            parallax: true,
            
        });

        $(function(){

            //E-mail Ajax Send
            $("#order-form").submit(function(e) {
                e.preventDefault();
                var order = $(this);
                $.ajax({
                    type: "post",
                    url: "/order",
                    data: order.serialize()
                }).done(function() {
                    order.trigger("reset");
                    setTimeout(function() {
                        closeModal($('.mask__order'));
                        $('.mask__thanks').addClass('active');
                    }, 1000);
                });
            });

            //Global pagination
            sGlobal.on('slideChange', function() {
                if (sGlobal.activeIndex !== 0){
                    $('.sp-global').show();
                } else {
                    $('.sp-global').hide();
                }
            });

            //Modal form
            function closeModal(el){
                el.removeClass("active");
            }

            $(".modal__order-close, .mask__order").on("click", function(){
                closeModal($('.mask__order'));
            });
            $(".modal__thanks-close, .mask__thanks").on("click", function(){
                closeModal($('.mask__thanks'));
            });

            $(document).keyup(function(e) {
                if (e.keyCode === 27 && sGlobal.activeIndex !== 1) {
                    closeModal();
                }
            });

            $(".form__tel").mask("+380(99) 999-99-99");

            //Canvas
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