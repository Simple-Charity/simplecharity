<template>
    <div>
        <div class="" v-for="block in drops">
            <div v-on:click="toggleOpen(block,block.open)" class="flex items-center py-4 hover:cursor-pointer">
                <span><img v-bind:class="{ 'rotate-90': block.open }" class=" h-[2rem] transition ease-in-out duration-500 transform mr-4" :src="bc" alt=""></span>
                <h1 class="text-2xl sm:text-4xl font-bold">{{ block.title }}</h1>
            </div>
            <div class="ml-[2.3rem]" v-if="block.type=='text'">
                <div v-bind:class="{ 'max-h-0':!block.open, 'max-h-screen':block.open }" class="overflow-hidden sm:w-2/3 transition-all ease-in-out duration-500 transform">
                    <p v-for="t in block.text" class="text-lg xl:text-xl xxl:text-3xl mt-4 mb-8">{{ t }}</p>
                </div>
            </div>
            <div class="" v-if="block.type=='map'">
                <div v-bind:class="{ 'max-h-0':!block.open, 'max-h-screen':block.open }" class="overflow-hidden transition-all ease-in-out duration-500 transform">
                    <div class="mt-2 mb-6 px-2 relative">
                        <img class="mx-auto w-full lg:w-[80%] transition-all ease-in-out duration-500 transform" :src="map" alt="">
                        <div v-for="c in block.continents">
                            <div class="group overflow-hidden">
                                <div :class="[c.style2, { 'z-50': c.isOpen, 'z-10': !(c.isOpen) }]" class="absolute transition ease-in-out duration-500 transform">
                                    <div  class="px-2 md:border-b-[0.2rem] border-deepnavy text-lg bg-red text-blue font-semibold my-1 absolute top-0 left-0 transition ease-in-out duration-500 transform">
                                        <div v-bind:class="{ 'hover:cursor-pointer': !(c.no_listing) }" v-on:click="openCountryDropdown(block,c)" class=" flex items-center relative">
                                            <span class="absolute w-3 h-3 sm:w-4 sm:h-4 bg-red rounded-full absolute top-[-0.5rem]" :class="c.style3" >
                                                <span v-bind:class="{ 'animate-ping': !(c.no_listing) }" class=" absolute w-3 h-3 sm:w-4 sm:h-4 bg-red rounded-full"></span>
                                            </span>
                                            <img v-if="!(c.no_listing)" v-bind:class="{ 'rotate-90': c.isOpen }" class=" h-4 transition ease-in-out duration-500 transform mr-2 hidden md:block" :src="bc" alt=""> <span class="whitespace-nowrap pr-6 text-sm hidden md:block">{{ c.name }}</span>
                                        </div>
                                        <div v-bind:class="{ 'max-h-0': !c.isOpen, 'max-h-80': c.isOpen }" 
                                             class="hidden md:block font-normal text-sm transition-all ease-in-out duration-500 transform overflow-hidden ml-[1.25rem]" 
                                             v-for="country in c.countries">
                                            {{ country }}
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:hidden grid grid-cols-1 sm:grid-cols-2 mb-6 mt-8">
                        <div v-for="c in block.continents">
                            <h2 class="font-bold text-lg sm:text-xl mb-2 text-center">{{ c.name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" v-if="block.type=='system'">
                <div v-bind:class="{ 'max-h-0':!block.open, 'max-h-screen':block.open }" class="overflow-hidden transition-all ease-in-out duration-500 transform">
                    <div class="py-10">
                        <div class="md:hidden">
                            <div class="flex justify-center md:text-center" v-for="icon in ic">
                                <div class="flex items-center">
                                    <h4 v-bind:class="{ 'visible':icon.icon_enabled, 'invisible':!icon.icon_enabled }" class="md:hidden text-lg font-bold md:mt-2 w-[5.5rem] px-1 text-right">{{ icon.icon_name }}</h4>
                                </div>
                                <div v-if="icon.icon_enabled" class="py-2 pr-6">
                                    <img class="w-[5rem] h-[5rem] mx-4" :src="icon.icon_asset" alt="">
                                </div>
                                <div v-if="!icon.icon_enabled" class="py-2 pr-6 opacity-[0.3]">
                                    <img class="w-[5rem] h-[5rem] mx-4" :src="icon.icon_asset" alt="">
                                </div>
                            </div>
                        </div>

                        
                        <div class="flex justify-center hidden md:flex">
                            <div class="text-center" v-for="icon in ic">
                                <img v-if="!icon.icon_enabled" class="w-[6rem] h-[6rem] mx-2 opacity-[0.3]" :src="icon.icon_asset" alt="">
                                <img v-if="icon.icon_enabled" class="w-[6rem] h-[6rem] mx-2" :src="icon.icon_asset" alt="">
                                <div v-if="icon.icon_enabled" class="flex justify-center">
                                    <h4 class="text-lg font-bold mt-2">{{ icon.icon_name }}</h4>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-[2.3rem]" v-if="block.type=='siteLink'">
            <div v-bind:class="{ 'max-h-0':!block.open, 'max-h-screen':block.open }" class="overflow-hidden transition-all ease-in-out duration-500 transform">
                    <div class="">
                        <p class="text-lg xl:text-xl xxl:text-3xl mt-4 mb-8 underline"><a :href="pl">{{ pls }}</a></p>
                    </div>
                </div>
            </div>
            <hr class="border-[0.08rem] border-blue">
        </div>
    </div>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ['dropdowns','map','icons','bc','pl','pls'],
    data: function() {
        return {
            drops:this.dropdowns,
            ic:this.icons,
        }
    },

    methods: {
        toggleOpen(s,isOpen) {
            for (var i = 0; i < this.drops.length; i++) {
                this.drops[i].open = false;
            };
            if (!isOpen) {
                s.open = !s.open;
            } else {
                console.log(s.type);

                if (s.type == "map") {
                    for (var i = 0; i < s.continents.length; i++) {
                        s.continents[i].isOpen = false;
                    };
                };
            };
        },
        openCountryDropdown(mapBlock, sender) {
            if ((!sender.isOpen) && (!sender.no_listing)) {
                for (var i = 0; i < mapBlock.continents.length; i++) {
                    mapBlock.continents[i].isOpen = false;
                }
            }

            sender.isOpen = !sender.isOpen;
            
        }
            
    },

    mounted() {

    },
};

</script>