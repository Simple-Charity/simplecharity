<template>
    <div>
        <div v-for="cat in cts">
            <div :class="cat.bgc" class="text-linen edge">
                <div class="mx-auto max-w-screen-2xl">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-serif font-bold mb-12">{{ cat.cat }}</h1>
                    <section class="flex flex-wrap justify-center">
                        <div v-for="item in ppl" v-if="item.type == cat.cat" class="block sm:flex items-center lg:block px-8 w-full sm:w-[40rem] lg:w-1/3 xl:w-3/12 mb-10 md:mb-12 text-center sm:text-left lg:text-center" data-aos="fade-up" data-aos-duration="1000">
                            <img class="object-contain rounded-full w-full sm:max-w-[20rem] sm:w-[16rem] md:w-[16rem] xl:w-[16rem] 2xl:w-[19rem] " :src="item.image" alt="">
                            <div class="pl-0 sm:pl-6 lg:pl-0">
                                <p class="font-serif text-lg xl:text-xl md:mb-1 md:text-xl pt-6 sm:pt-0 lg:pt-6">
                                    {{ item.name }}
                                </p>
                                <p class="font-normal text-sm mb-3">
                                    {{ item.title }}
                                </p>
                                <p class="font-normal mb-3 text-sm md:text-lg xl:text-lg max-w-[20rem] mx-auto">
                                    {{ item.shortBio }}
                                </p>
                                <p v-on:click="toggleOpen(item,1)" class="cursor-pointer">
                                    <span class="border-b border-linen border-1">Read More</span>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        
        <div v-for="item in ppl" class="group relative" v-bind:class="{ 'invisible' : !item.isOpen , 'block' : item.isOpen}">
            <div class="fixed inset-0 bg-deepnavy z-[100] transition-opacity ease-in-out duration-300 transform"  v-bind:class="{ 'opacity-[0]' : !item.isOpen , 'opacity-[0.9]' : item.isOpen }"></div>
            <div class="fixed inset-0 z-[110] bg-transparent flex justify-center items-center sm:p-8">
                <div class="max-h-full m-0 fixed inset-0 overflow-y-scroll sm:relative sm:w-[40rem] p-6 sm:p-8 z-20 border-4 border-red bg-linen transition-opacity ease-in-out duration-300 transform noscrollbar" v-bind:class="{ 'opacity-[0]' : !item.isOpen , 'opacity-[1]' : item.isOpen }" >
                    <div class="flex items-center justify-between pb-6">
                        <div class="flex items-center">
                            <img class="object-contain rounded-full w-20 sm:w-24 h-20 sm:h-24 mr-4" :src="item.image" alt="">
                            <div>
                                <p class="text-blue text-md sm:text-lg md:text-xl pr-4 font-semibold pb-0">{{item.name}}</p>
                                <p class="font-normal text-sm">{{ item.title }}</p>
                            </div>
                        </div>
                        <div v-on:click="toggleOpen(item,2)" class="py-2">
                            <h6 class="text-blue text-2xl font-bold cursor-pointer ">&#10005;</h6>
                        </div>
                    </div>
                    <div class="text-blue text-lg sm:text-lg sm:pr-4">
                        <p v-for="jtem in item.longBio" class="pb-4">
                            {{ jtem|striptags }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ['ppl','cats'],
    data: function() {
        return {
            ppl:this.ppl,
            cts:this.cats,
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
};

</script>