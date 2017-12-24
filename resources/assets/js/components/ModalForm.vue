<template>
    <!-- <div class="modal-form"> -->
        <!-- <button class="show" aria-haspopup="true" v-on:click="modalOpen">Show Modal</button> -->

        <!-- <div class="g-btn front-slide__btn show" aria-haspopup="true" v-on:click="modalOpen">
            <span class="g-btn__bg front-slide__btn_bg"></span>
            <span class="g-btn__text front-slide__btn-text">Оставить заявку</span>
        </div> -->
        <div class="mask" role="dialog" v-bind:class="{active: isActive}" v-on:click="modalClose"></div>
        <!-- <div class="modal" role="alert">
            <button class="close" role="button" v-on:click="modalClose">X</button>
        </div> -->
    <!-- </div> -->
</template>

<script>

    module.exports = {
        data: function() {
            return {
               isActive: false
            };
        },
        methods: {
           modalOpen: function (){
              this.isActive = true;
              console.log(this.isActive);
           },
           modalClose: function (){
              this.isActive = false;
           },
           modalCloseKeyup :function (e){
                if (e.keyCode === 27) {
                    this.isActive = false;
                }
           }
        },
        created: function (){
            document.addEventListener('keyup', this.modalCloseKeyup);
        }
    }
</script>

<style lang="scss" scoped>

</style>
