<template>
    <div>
        <div class="max-w-screen-2xl mx-auto">
            <div class="grid grid-cols-6 " v-for="partner in tsd">
                <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                    <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="partner.categoryIcon" alt="">
                    <span :class="partner.textcolor" class="text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline">{{ partner.categoryName }}</span>
                </div>
                <div :class="partner.bgcolor" class="rounded-md col-span-5 lg:col-span-4 sm:px-2 my-3 ">
                    <div class="overflow-hidden transition-height duration-500 ease-in-out transform" :class="{ 'h-[32rem]': partner.open == 'yes' , 'h-28': !(partner.open == 'yes') }">
                        <div v-on:click="togglePartnerOpen(partner)" class="h-28 flex items-center hover:cursor-pointer">
                            <div class="flex items-center">
                                <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                                    <img :src="partner.icon" alt="">
                                </div>
                                <h1 :class="partner.accentcolor" class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 font-semibold">{{ partner.name }}</h1>
                                <div class="pl-2 hidden lg:block">
                                    <div>
                                        <p :class="partner.accentcolor" class="w-60 pb-2"><em>{{ partner.motto }}</em></p>
                                    </div>
                                    <div>
                                        <p :class="partner.accentcolor" class="text-md font-semibold">FOCUS: {{ partner.focus }}</p>
                                    </div>
                                </div>
                                <div class="ml-auto w-10 h-28"></div>
                                <div class="absolute right-1">
                                    <div class="mr-5 w-3 sm:w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': partner.open == 'yes' }">
                                        <img class="w-full h-full" :src="caret" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 lg:px-10 relative h-[23rem] flex items-center">
                            <div class="">
                                <div class="lg:hidden">
                                    <p :class="partner.accentcolor" class="text-md font-semibold">FOCUS: {{ partner.focus }}</p>
                                </div>
                                <h5 :class="partner.accentcolor" class="text-md font-semibold pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                                <h5 :class="partner.accentcolor" class="text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">{{ partner.dollarImpact }}</h5>
                                <div v-if="partner.accentcolor == 'text-linen'">
                                    <a :href="partner.url">
                                        <button class="mr-4 mb-4 sm:mb-2 w-[10rem] sm:w-auto">
                                            <div class="whitebutton">
                                                Learn more
                                            </div>
                                        </button>
                                    </a>
                                    <a :href="partner.kindful">
                                        <button class="w-[10rem] sm:w-auto">
                                            <div class="whitebutton">
                                                Donate
                                            </div>
                                        </button>
                                    </a>
                                </div>
                                <div v-if="partner.accentcolor == 'text-blue'">
                                    <a :href="partner.url">
                                        <button class="mr-4 mb-4 sm:mb-2 w-[10rem] sm:w-auto">
                                            <div class="bluebutton">
                                                Learn more
                                            </div>
                                        </button>
                                    </a>
                                    <a :href="partner.kindful">
                                        <button class="w-[10rem] sm:w-auto">
                                            <div class="bluebutton">
                                                Donate
                                            </div>
                                        </button>
                                    </a>
                                </div>
                            </div>
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
    props: ["topsevendata",'caret'],
    data: function() {
        return {
            tsd: this.topsevendata,
        }
    },
    methods: {
        togglePartnerOpen(p) {
            if (p.open == 'yes') {
                p.open = 'no';
            } else {
                p.open = 'yes';
            }
            
        }
    },
};

</script>