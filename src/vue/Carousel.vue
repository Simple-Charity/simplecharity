<template>
    <div>
        <div class="main-carousel">
            <div class="carousel-cell" v-for="i in im">
                <img class="w-full z-30" :src="i" alt="">
            </div>
        </div>
    </div>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ["images"],
    data: function() {
        return {
            im: this.images,
        }
    },

    methods: {
        
    },

    mounted () {
        var elem = document.querySelector('.main-carousel');
        var flkty = new Flickity( elem, {
        // options
        cellAlign: 'left',
        contain: true,
        autoPlay: true,
        wrapAround: true,
        imagesLoaded: true,
        });
    }
};

</script>