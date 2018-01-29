<!doctype html>
<html lang="ua" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dunco</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.6/css/swiper.min.css">
        <link rel="stylesheet" href="dist/css/main.min.css">
        <script>
        /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
        (function(a){"use strict";var b=function(c,d,e){function f(o){return h.body?o():void setTimeout(function(){f(o)})}function g(){j.addEventListener&&j.removeEventListener("load",g),j.media=e||"all"}var k,h=a.document,j=h.createElement("link");if(d)k=d;else{var l=(h.body||h.getElementsByTagName("head")[0]).childNodes;k=l[l.length-1]}var m=h.styleSheets;j.rel="stylesheet",j.href=c,j.media="only x",f(function(){k.parentNode.insertBefore(j,d?k:k.nextSibling)});var n=function(o){for(var p=j.href,q=m.length;q--;)if(m[q].href===p)return o();setTimeout(function(){n(o)})};return j.addEventListener&&j.addEventListener("load",g),j.onloadcssdefined=n,n(g),j};"undefined"==typeof exports?a.loadCSS=b:exports.loadCSS=b})("undefined"==typeof global?this:global);
        </script>
        <script>loadCSS("dist/css/style.min.css", false, "all")</script>
        <noscript>
            <link rel="stylesheet" href="dist/css/style.min.css">
        </noscript>
    </head>
    <body>
    <div class="mask mask__thanks" role="dialog"></div>
    <div class="flex modal modal__flex modal__thanks" role="alert">
        <button class="modal__close modal__thanks-close">X</button>
        <p class="modal__thanks-content">Спасибо за обращение в компанию «Данко»! В ближайшее время с Вами свяжется менеджер для уточнения информации.</p>
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
    <section class="section__menu"></section>
        <div class="swiper-container s-global">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <section class="section__front-slider"></section>
            </div>
            <div class="swiper-slide">
                <section class="section__video"></section>
            </div>
            <div class="swiper-slide swiper-slide__trust">
                <section class="section__trust"></section>
            </div>
            <div class="swiper-slide">
                <section class="section__people"></section>
            </div>
            <div class="swiper-slide">
                <section class="section__our-products"></section>
            </div>
            <div class="swiper-slide">
                <section class="section__gallery"></section>
            </div>
            <div class="swiper-slide">
                <section class="section__order"></section>
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
        var sGlobal=new Swiper('.s-global',{direction:'vertical',slidesPerView:1,mousewheel:!0,pagination:{el:'.sp-global',clickable:!0},parallax:!0,simulateTouch:!1,breakpoints:{768:{simulateTouch:!0}},});$(function(){$("#order-form").submit(function(e){e.preventDefault();var order=$(this);$.ajax({type:"post",url:"/order",data:order.serialize()}).done(function(){order.trigger("reset");setTimeout(function(){closeModal($('.mask__order'));$('.mask__thanks').addClass('active')},1000)})});sGlobal.on('slideChange',function(){if(sGlobal.activeIndex!==0){$('.sp-global').show()}else{$('.sp-global').hide()}});function closeModal(el){el.removeClass("active")}
            $(".modal__order-close, .mask__order").on("click",function(){closeModal($('.mask__order'))});$(".modal__thanks-close, .mask__thanks").on("click",function(){closeModal($('.mask__thanks'))});$(document).keyup(function(e){if(e.keyCode===27&&sGlobal.activeIndex!==1){closeModal()}});$(".form__tel").mask("+380(99) 999-99-99")})
    </script>
    <script src="dist/js/build.min.js"></script>
    </body>
</html>