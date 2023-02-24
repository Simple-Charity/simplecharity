<template>

    <div class="main-carousel">
        <div v-for="quote in qts" class="carousel-cell">
            <div class="flex h-full items-center relative overflow-hidden transition-all duration-200 ease-in-out transform">
                <div class="">

                    <div class="hidden sm:block relative z-20 w-[10rem] h-[10rem] lg:w-[16rem] lg:h-[16rem]">
                        <img class="" :src="quote.quoteIcon" alt="">
                    </div>
                    </div>
                    <div class="sm:pl-12">
                    <img class="w-10 h-10 sm:w-16 sm:h-16 mb-6" :src="qicon" alt="">
                    <div class="w-full">
                        <p class="text-blue text-md lg:text-lg xl:text-xl pb-4 md:pb-6 leading-6 md:leading-relaxed">{{ quote.quoteText }}</p>


                        <div class="sm:hidden flex items-center">
                            <div class="relative z-20 pr-4">
                                <img class="w-20" :src="quote.quoteIcon" alt="">
                            </div>
                            <div>
                                <p class="text-red text-sm tracking-wider">{{ quote.name }}</p>
                                <p class="text-blue text-sm">{{ quote.description }}</p>
                            </div>
                        </div>
                        
                        <div class="hidden sm:block">
                            <p class="text-red tracking-wider font-semibold text-sm pb-2">{{ quote.name }}</p>
                            <p class="text-blue text-sm">{{ quote.description }}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ["quotes","qicon"],
    data: function() {
        return {
            qts: this.quotes,
        }
    },

    methods: {
        
    },

    mounted () {
        var elem = document.querySelector('.main-carousel');
        var flkty = new Flickity( elem, {
        cellAlign: 'left',
        autoPlay: 6000, //switch cells every 6s
        wrapAround: true,
        friction: 0.3,
        prevNextButtons: false,
        });
    }
};

</script>