<template>
    <section id="snow" v-bind:style="{ height: snowHeight + 'px',}"></section>
</template>

<script>
    module.exports = {
        data: function() {
            return {
                snowHeight: 50
            };
        }
    }
</script>

<style scoped>
    #snow {
        background-color: transparent;
        background-image: url("https://dunco.com.ua/dist/img/snow1.png"),  url("https://dunco.com.ua/dist/img/snow2.png");
        -webkit-animation: snow 20s linear infinite;
        -moz-animation: snow 20s linear infinite;
        -ms-animation: snow 20s linear infinite;
        animation: snow 20s linear infinite;
        z-index: 999;
        right: 0;
        top: 0;
        left: 0;
        bottom: 0;
        margin-top: 0;
        pointer-events: none;
        position: absolute;
    }

    /*Keyframes*/
    @keyframes snow {
        0% { background-position: 0px 0px, 0px 0px, 0px 0px }

        100% { background-position: 500px 1000px, 400px 400px, 300px 300px }
    }

    @-moz-keyframes snow {
        0% { background-position: 0px 0px, 0px 0px, 0px 0px }

        100% { background-position: 500px 1000px, 400px 400px, 300px 300px }
    }

    @-webkit-keyframes snow {
        0% { background-position: 0px 0px, 0px 0px, 0px 0px }

        100% {
            background-position: 500px 1000px, 400px 400px, 300px 300px;
        }
    }

    @-ms-keyframes snow {
        0% { background-position: 0px 0px, 0px 0px, 0px 0px }

        100% { background-position: 500px 1000px, 400px 400px, 300px 300px }
    }
</style>