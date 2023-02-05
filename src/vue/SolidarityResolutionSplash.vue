<template>
    <div class="absolute inset-0">
        <div id="whole-container" class="w-full h-screen bg-linen relative z-[2000] transition-all duration-1000 ease-in-out transform">
            <div v-if="s.isVisible" :id="'sprout-container-' + s.index" class="absolute inset-0 w-full h-full flex items-center justify-center bg-transparent transition duration-1000 ease-in-out transform" v-for="s in spr">
                <img :class="{ 'hidden': slided }" class="w-[30rem] h-[30rem]" :src="s.sproutRef" alt="">
            </div>
            <div id="text-container" class="text-5xl font-serif font-bold text-blue absolute inset-0 flex items-center justify-center transition-all ease-in-out duration-1000 transform opacity-[0]">
                Solidarity <span class="w-[10rem]"></span> Resolution
            </div>
        </div>
    </div>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ['sprouts'],
    data: function() {
        return {
            spr: this.sprouts,
            slided: false,
        }
    },

    methods: {
        startupAnimation(s,sl,bv) {
            setTimeout(function() {
                s[0].isVisible = false;
                s[1].isVisible = true;
            }, 500);
            setTimeout(function() {
                s[1].isVisible = false;
                s[2].isVisible = true;
            }, 1000);
            setTimeout(function() {
                s[2].isVisible = false;
                s[3].isVisible = true;
            }, 1500);
            setTimeout(function() {
                s[3].isVisible = false;
                s[4].isVisible = true;
            }, 2000);
            setTimeout(function() {
                s[4].isVisible = false;
                s[5].isVisible = true;
            }, 2500);
            setTimeout(function() {
                s[5].isVisible = false;
                s[6].isVisible = true;
            }, 3000);

            // setTimeout(function() {
            //     document.getElementById('sprout-container-7').classList.add('translate-x-[-30rem]');
            // }, 2500);

            setTimeout(function() {
                document.getElementById('text-container').classList.remove('opacity-[0]');
            }, 4500);

            setTimeout(function() {
                document.getElementById('whole-container').classList.remove('opacity-[1]');
                document.getElementById('whole-container').classList.add('opacity-[0]');
                document.getElementById('whole-container').classList.remove('z-[2000]');
                document.getElementById('whole-container').classList.add('z-[-50]');
            }, 8000);
        }
    },

    mounted() {
        this.startupAnimation(this.spr, this.slided, this.bannerVisible);
    },
};

</script>