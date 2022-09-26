<template class="relative">
    <span>
        <div id="modal-container">
            <button class="my-6 pt-4 relative z-[150]" v-on:click="toggleOpen(1)">
                <div class="bluebutton hover:bg-linen hover:text-blue">
                    <div class="">{{ buttontext }}</div>
                </div>
            </button>
    
            <div class="group" v-bind:class="{ 'invisible' : !isOpen , 'block' : isOpen}">
                <div class="fixed inset-0 bg-deepnavy z-[150] transition-opacity ease-in-out duration-300 transform"  v-bind:class="{ 'opacity-[0]' : !isOpen , 'opacity-[0.9]' : isOpen }">
                
                </div>
    
                <div class="fixed inset-0 z-[150] bg-transparent flex justify-center items-center sm:p-8 flex items-center">
    
                    <div class="z-[150] max-h-full m-0 fixed inset-0 overflow-y-scroll sm:relative sm:w-[40rem] p-6 sm:p-10 z-[150] border-4 border-red bg-linen transition-opacity ease-in-out duration-300 transform noscrollbar flex items-center" v-bind:class="{ 'opacity-[0]' : !isOpen , 'opacity-[1]' : isOpen }" >
                        <div>
                            <div class="z-[160] flex justify-between items-center pb-6">
                                <div class="pr-6">
                                    <h1 class="text-left text-2xl sm:text-3xl font-semibold">{{ modaltitle }}</h1>
                                    
                                </div>
    
                                <div v-on:click="toggleOpen(item,2)" class="">
                                    <h6 class="text-blue text-2xl font-bold cursor-pointer ">&#10005;</h6>
                                </div>
    
                            </div>
                            <div>
                                <p class="text-lg text-left">{{ modalbody }}</p>
    
                                <div class="flex flex-wrap justify-center pt-10">
                                    <div v-if="buttonone">
                                        <a :href="linkone">
                                            <button class="mx-2">
                                                <div class="bluebutton hover:bg-linen hover:text-blue">
                                                    <div class="">{{ buttonone }}</div>
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
    </span>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ['buttontext','modaltitle','modalbody','buttonone','linkone'],
    data: function() {
        return {
            isOpen: false,
        }
    },

    methods: {
        toggleOpen(ind) {
            if (ind == 1) {
                this.isOpen = true;
                document.documentElement.style.overflow = 'hidden'
            } else {
                this.isOpen = false;
                document.documentElement.style.overflow = 'auto'
            }
        }
    },
};

</script>