<template>
  <div v-if="modalIsVisible" @click.self="$emit('close')" class="fixed inset-0 overflow-auto flex modal-bg">
    <div class="fixed w-full md:max-w-2xl md:relative top-0 md:bottom-0 inset-x-0 align-top m-auto justify-center w-full h-screen lg:h-auto flex flex-col">
      <div v-if="!content" class="sk-double-bounce">
        <div class="sk-child sk-double-bounce1"></div>
        <div class="sk-child sk-double-bounce2"></div>
      </div>
      <div data-scroll-lock-scrollable v-if="content" v-html="content"
           class="bg-linen p-12 animated fadeIn fast border-8 h-screen md:h-auto scrolling-touch overflow-y-scroll"></div>
    </div>
    <span class="absolute top-0 right-0 p-6 lg:p-16" @click="$emit('close')">
              <i class="icon-close text-4xl text-brand-blue-lightest hover:text-white transition cursor-pointer"></i>
          </span>
  </div>
</template>

<script>

    import VueAxios from '../js/modules/vue-axios';
    import { disablePageScroll, enablePageScroll } from 'scroll-lock';

    export default {
        props: ['target'],
        data: function() {
            return {
                modalIsVisible: true,
                content: null
            }
        },
        methods: {
            getModalContent() {
                let options = {
                    method: 'GET',
                    url: this.target,
                };
                VueAxios(options)
                    .then(response => {
                        this.content = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        destroyed() {
            enablePageScroll();
        },
        mounted: function() {
            disablePageScroll();
            this.getModalContent();

            document.addEventListener("keydown", (e) => {
                let key = e.key || e.keyCode;
                if (key === 'Escape' || key === 'Esc' || key === 27) {
                    this.$emit('close');
                }
            });
        }
    }
</script>