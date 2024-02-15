<template>
    <div>
        <h1 v-bind:class="{ 'text-linen':whiteText, 'text-blue':!whiteText }" class="text-5xl sm:text-6xl lg:text-7xl font-serif pb-20">FAQs</h1>
        <hr v-bind:class="{ 'text-linen':whiteText, 'text-blue':!whiteText }" class="border-1 my-5">
        <div>
            <ul v-for="item in f">
                <div class="cursor-pointer" v-on:click="toggleOpen(item,1)">
                    <div class="flex items-center justify-between h-20">
                        <div v-bind:class="{ 'text-linen':whiteText, 'text-blue':!whiteText }" class="text-lg sm:text-xl pr-4 font-semibold">{{item.question}}</div>

                        <div v-bind:class="{ 'text-linen':whiteText, 'text-blue':!whiteText }" class="text-3xl pb-1 scale-y-[1.5]">
                            >
                        </div>
                    </div>
                </div>
                <hr v-bind:class="{ 'text-linen':whiteText, 'text-blue':!whiteText }" class=" border-1 my-5">
            </ul>
        </div>
        <div v-for="item in f">
            <div class="group" v-bind:class="{ 'invisible' : !item.isOpen , 'block' : item.isOpen}">
                <div class="fixed top-0 bottom-0 left-0 right-0 noscrollbars bg-deepnavy z-[100] transition-opacity ease-in-out duration-300 transform "  v-bind:class="{ 'opacity-[0]' : !item.isOpen , 'opacity-[0.9]' : item.isOpen }">
                
                </div>

                <div class="fixed top-0 bottom-0 left-0 right-0 noscrollbars z-[110] bg-transparent flex justify-center items-center">
                    <div class="m-0 sm:m-8 sm:w-[40rem] p-6 sm:p-8 overflow-scroll fixed top-0 bottom-0 left-0 right-0 sm:relative z-[120] border-4 border-red bg-linen transition-opacity ease-in-out duration-300 transform" v-bind:class="{ 'opacity-[0]' : !item.isOpen , 'opacity-[1]' : item.isOpen }">
                        
                        <div class="flex items-center justify-between pb-6">
                            <p class="text-blue text-lg sm:text-lg md:text-xl pr-4 font-semibold">{{item.question}}</p>

                            <div v-on:click="toggleOpen(item,2)"  class="p-2">
                                <h6 class="text-blue text-2xl font-bold cursor-pointer ">&#10005;</h6>
                            </div>

                        </div>    
                        <div class="text-blue text-lg sm:text-lg pr-4">{{item.answer}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueAxios from '../js/modules/vue-axios';

    export default {
        props: ['faqs','tc'],
        data: function() {
            return {
                f:this.faqs,
                whiteText:this.tc,
            }
        },

        methods: {
            toggleOpen(s,ind) {
                if (ind == 1) {
                    s.isOpen = true;
                    document.documentElement.style.overflow = 'hidden'
                } else {
                    s.isOpen = false;
                    document.documentElement.style.overflow = 'auto'
                }
                
            }
        },

        mounted() {
            
        },
    };
</script>