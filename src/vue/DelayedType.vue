<template>
    <div class="">
        <div id="text1" class="sm:w-3/4 mx-auto">
            <div class="text-center pb-10 lg:pb-16">
                <div v-if="this.isVisible">
                    <vue-typed-js  class="inline pt-8 sm:pt-0" :strings="['^500already been given']">
                        <h1 class="text-blue text-center pb-5 text-2xl md:text-3xl lg:text-4xl font-bold">
                            You have <span class="text-red"><span class="typing"></span></span> everything you need in order to love in deed and in truth.
                        </h1>
                    </vue-typed-js>
                </div>
                <div v-if="!(this.isVisible)" class="inline pt-8 sm:pt-0">
                    <h1 class="text-blue text-center pb-5 text-2xl md:text-3xl lg:text-4xl font-bold">
                        You have <span class="text-red">|</span> everything you need in order to love in deed and in truth.
                    </h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: [],
    data: function() {
        return {
            isVisible: false,
        }
    },

    methods: {
        updateScroll() {

            if (!(this.isVisible)) {
                let h0 = window.innerHeight;

                var b1 = document.getElementById("text1").getBoundingClientRect();
                var h1 = b1.top;

                this.isVisible = h0 > h1;
                console.log(this.isVisible);
            }
            
        },

    },

    mounted() {
        window.addEventListener('scroll', this.updateScroll);

        this.updateScroll();
    },
};

</script>