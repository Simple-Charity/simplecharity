<template>
    <div>
        <button v-if="linktype === 'btn'" @click="toggleModal" class="bg-blue text-linen px-3 text-sm font-semibold py-2 rounded hover:bg-red hover:text-blue transition-all"
                type="button">
            {{ text }}
        </button>
        <p v-else
           class="inline-block my-1 cursor-pointer text-sm font-semibold text-brand-blue-lighter hover:text-brand-blue transition font-sans font-normal border-b border-dotted border-brand-blue-lighter"
           @click="toggleModal">
            {{ text }}
        </p>
        <div v-if="modalIsVisible" @click.self="toggleModal" class="fixed inset-0 overflow-auto flex modal-bg">
            <div
                class="fixed w-full md:max-w-2xl md:relative top-0 md:bottom-0 inset-x-0 align-top m-auto justify-center w-full h-screen lg:h-auto flex flex-col">
                <div data-scroll-lock-scrollable
                     class="bg-linen p-12 animated fadeIn fast border-8 h-screen md:h-auto scrolling-touch overflow-y-scroll">
                    <slot></slot>
                </div>
            </div>
            <span class="absolute top-0 right-0 p-6 lg:p-16" @click="toggleModal">
              <i class="icon-close text-4xl text-brand-blue-lightest hover:text-white transition cursor-pointer"></i>
          </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['text', 'linktype'],
        data: function() {
            return {
                modalIsVisible: false
            }
        },
        methods: {
            toggleModal() {
                this.modalIsVisible = !this.modalIsVisible;
            }
        },
        mounted: function() {
            document.addEventListener("keydown", (e) => {
                if (e.keyCode == 27) {
                    this.modalIsVisible = false;
                }
            });
        }
    }
</script>
