<template>
    <div class="main-carousel">
        <div v-for="quote in qts" class="carousel-cell w-full sm:w-1/2 lg:w-1/3">
            <div>
                <p class="text-blue font-bold text-sm pb-2">{{ quote.name }}</p>
            </div>
            <div class="pb-6">
                <span class="text-red">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
            </div>
            <div class="overflow-hidden pr-4">
                <p class="text-blue text-md lg:text-lg xl:text-xl pb-4 md:pb-6 leading-6 md:leading-relaxed">{{ quote.quoteText }}</p>
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
        friction: 0.5,
        prevNextButtons: false,
        });
    }
};

</script>