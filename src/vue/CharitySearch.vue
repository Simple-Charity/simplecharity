<template>
    <div class=" pt-6 pb-12 bg-deepnavy w-full">
        <div class="max-w-screen-2xl mx-auto">
            <div id="" class="flex sm:min-h-lg">
                <div class="hidden md:block">
                    <div :class="{fixedSidebar:isScrolled & !(isScrolled2),fixedSidebar2:isScrolled2}" class="pt-10">

                        <div class="flex items-center justify-between">
                            <div class="hidden">
                                <p id="itemcounter1" class="text-sm text-linen pr-6">24 items</p>
                            </div>
                            <h5 class="text-md font-semibold text-red">FILTER</h5>
                            <div>
                                <button>
                                    <div v-on:click="clearFilters()" class="whitebutton h-8 w-20 px-4 text-sm">
                                        Clear
                                    </div>
                                </button>
                            </div>
                        </div>

                        <hr class="border-blue border-1 my-4">

                        <div>
                            <h5 class="text-md font-semibold text-linen pb-2">CAUSE</h5>

                            <form action="">
                                <input v-model="healthChecked" id="health" class="w-6" type="checkbox" v-on:click="determineVisibility('health')" ><span class="text-lg text-linen">Health</span><br>
                                <input v-model="educationChecked" id="education" class="w-6" type="checkbox" v-on:click="determineVisibility('education')" ><span class="text-lg text-linen">Education</span><br>
                                <input v-model="safetyChecked" id="safety" class="w-6" type="checkbox" v-on:click="determineVisibility('safety')"><span class="text-lg text-linen">Safety</span><br>
                                <input v-model="ministryChecked" id="ministry" class="w-6" type="checkbox" v-on:click="determineVisibility('ministry')"><span class="text-lg text-linen">Ministry</span><br>
                                <input v-model="capitalChecked" id="capital" class="w-6" type="checkbox" v-on:click="determineVisibility('capital')"><span class="text-lg text-linen">Capital</span><br>
                            </form>
                        </div>

                        <hr class="border-blue border-1 my-4">

                        <!-- <div class="hidden">
                            <h5 class="text-md font-semibold text-linen pb-2">REGION</h5>

                            <form action="">
                                <input v-model="africaChecked" id="africa" class="w-6" type="checkbox" v-on:click="determineVisibility('africa')"><span class="text-lg text-linen">Africa</span><br>
                                <input v-model="asiaChecked" id="asia" class="w-6" type="checkbox" v-on:click="determineVisibility('asia')"><span class="text-lg text-linen">Asia</span><br>
                                <input v-model="australiaChecked" id="australia" class="w-6" type="checkbox" v-on:click="determineVisibility('australia')"><span class="text-lg text-linen">Australia</span><br>
                                <input v-model="europeChecked" id="europe" class="w-6" type="checkbox" v-on:click="determineVisibility('europe')"><span class="text-lg text-linen">Europe</span><br>
                                <input v-model="northAmericaChecked" id="northamerica" class="w-6" type="checkbox" v-on:click="determineVisibility('northamerica')"><span class="text-lg text-linen">North America</span><br>
                                <input v-model="southAmericaChecked" id="southamerica" class="w-6" type="checkbox" v-on:click="determineVisibility('southamerica')"><span class="text-lg text-linen">South America</span><br>
                            </form>
                        </div>

                        <hr class="hidden border-blue border-1 my-4"> -->

                        <h5 v-on:click="determineVisibility('topseven')" class="text-md font-semibold text-linen pb-2">SEE OUR <button class="text-md font-semibold text-linen pb-2"><span  v-bind:class="{'text-red' : !topSevenChecked, 'text-red' : topSevenChecked}" class="border-b-2 border-red transition duration-200 ease-in-out transform">TOP 7 PICKS</span></button></h5>

                    </div>
                </div>

                <div class="sm:pr-4 pt-10 w-full md:w-2/3 md:ml-auto">

                    <div class="flex items-center justify-between">
                        <h1 class="text-md font-semibold text-md text-linen pb-5">SEARCH</h1>
                    </div>

                    <input v-model="searchText" v-on:keyup="determineVisibility()" class="text-linen text-3xl w-full h-12 bg-deepnavy border-b-2 font-semibold" type="text">
                    
                    <div class="pt-12 sm:pt-6 flex flex-wrap justify-center sm:justify-start">
                        <button class="pr-3">
                            <div v-on:click="expandAll" class="whitebutton text-xs sm:text-lg">
                                Expand all
                            </div>
                        </button>
                        <button class="pr-3">
                            <div v-on:click="collapseAll" class="whitebutton text-xs sm:text-lg">
                                Collapse all
                            </div>
                        </button>
                    </div>

                    <div class="flex flex-wrap pt-6">
                        <div v-if="healthChecked" class="flex justify-center items-center rounded-full bg-red text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Health
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('health');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="educationChecked" class="flex justify-center items-center rounded-full bg-red text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Education
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('education');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="safetyChecked" class="flex justify-center items-center rounded-full bg-red text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Safety
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('safety');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="ministryChecked" class="flex justify-center items-center rounded-full bg-red text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Ministry
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('ministry');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="capitalChecked" class="flex justify-center items-center rounded-full bg-red text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Capital
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('capital');">
                                &#215;
                            </span>
                        </div>

                        <div v-if="africaChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Africa
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('africa');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="asiaChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Asia
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('asia');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="australiaChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Australia
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('australia');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="europeChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                Europe
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('europe');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="northAmericaChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                North America
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('northamerica');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="southAmericaChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                South America
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('southamerica');">
                                &#215;
                            </span>
                        </div>

                    </div>

                    <div v-for="item in filteredCharities" class="pt-6">
                        <div class="overflow-hidden rounded-md bg-blue relative transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-[32rem] sm:h-96': item.opened , 'h-32 sm:h-28': !(item.opened) }" >
                            <div v-on:click="item.opened = !(item.opened)" class="h-32 sm:h-28 flex items-center hover:cursor-pointer">
                                <div class="h-32 sm:h-28 w-28 min-w-[7rem] p-0 m-0 hidden md:block">
                                    <img class="h-32 sm:h-28 w-28 min-w-[7rem]" :src="item.icon" alt="">
                                </div>
                                <div class="xl:flex items-center">
                                    <h1 class="text-bare text-md lg:text-lg xl:w-52 py-2 pl-5 pr-0 font-semibold text-linen" >{{ item.name }}</h1>
                                    <div class="pl-5 pr-3 xl:pl-2">
                                        <div>
                                            <p class="text-linen text-xs sm:text-sm xl:w-52 xl:w-72 py-2">"{{ item.motto }}"</p>
                                        </div>
                                        <div class="hidden xl:block">
                                            <p class="text-md font-semibold text-linen pb-2">FOCUS: {{ item.focus }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-auto mr-6">
                                    <div  class="ml-2 caretmarker w-3 sm:w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': item.opened }">
                                        <button><img class="w-full h-full" :src="barecaret" alt=""></button>
                                    </div>
                                </div>
                            </div>
                            <div class="h-[25rem] sm:h-68 bg-darkblue p-5 px-6 sm:px-20 flex items-center">
                                <div>
                                    <div class="xl:hidden">
                                        <p class="text-md font-semibold text-linen pb-2">FOCUS: {{ item.focus }}</p>
                                    </div>
                                    <h5 class="text-md font-semibold text-linen pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                                    <h5 class="text-linen text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">{{ item.impact }}</h5>

                                    <a :href="item.url">
                                        <button class="mr-4 mb-4 sm:mb-0 w-[10rem] sm:w-auto">
                                            <div class="redbutton">
                                                Learn more
                                            </div>
                                        </button>
                                    </a>
                                    <a :href="item.kindful">
                                        <button class="w-[10rem] sm:w-auto">
                                            <div class="redbutton">
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
    props: ["partners","caret","barecaret","sample"],
    data: function() {
        return {
            charities: this.partners,
            searchText: "",
            scrollPosition: null,
            t: null,
            t2: null,
            t3: null,
            t4: null,
            isScrolled: false,
            isScrolled2: false,

            healthChecked: false,
            educationChecked: false,
            safetyChecked: false,
            ministryChecked: false,
            capitalChecked: false,

            africaChecked: false,
            asiaChecked: false,
            australiaChecked: false,
            europeChecked: false,
            northAmericaChecked: false,
            southAmericaChecked: false,

            topSevenChecked: false,

            smallSearchShown: false,
        }
    },

    methods: {
        expandAll() {
            for (let i=0; i < this.charities.length; i++) {
                this.charities[i].opened = true;
            }
        },

        collapseAll() {
            for (let i=0; i < this.charities.length; i++) {
                this.charities[i].opened = false;
            }
        },

        clearFilters() {

            document.getElementById("health").checked = false;
            document.getElementById("education").checked = false;
            document.getElementById("safety").checked = false;
            document.getElementById("capital").checked = false;
            document.getElementById("ministry").checked = false;

            document.getElementById("africa").checked = false;
            document.getElementById("asia").checked = false;
            document.getElementById("australia").checked = false;
            document.getElementById("europe").checked = false;
            document.getElementById("northamerica").checked = false;
            document.getElementById("southamerica").checked = false;

            this.healthChecked = false;
            this.educationChecked = false;
            this.safetyChecked = false;
            this.ministryChecked = false;
            this.capitalChecked = false;

            this.africaChecked = false;
            this.asiaChecked = false;
            this.australiaChecked = false;
            this.europeChecked = false;
            this.northAmericaChecked = false;
            this.southAmericaChecked = false;

            this.topSevenChecked = false;

            this.searchText="";



            this.determineVisibility("generic");

            document.getElementById("itemcounter1").innerHTML = "24 items";
        },

        determineVisibility(k) {
            var a=this.searchText;

            if (k == "safety") {
                this.safetyChecked = !(this.safetyChecked);
            } else if (k == "ministry") {
                this.ministryChecked = !(this.ministryChecked);
            } else if (k == "capital") {
                this.capitalChecked = !(this.capitalChecked);
            } else if (k == "education") {
                this.educationChecked = !(this.educationChecked);
            } else if (k == "health") {
                this.healthChecked = !(this.healthChecked);
            } else if (k == "africa") {
                this.africaChecked = !(this.africaChecked);
            } else if (k == "asia") {
                this.asiaChecked = !(this.asiaChecked);
            } else if (k == "australia") {
                this.australiaChecked = !(this.australiaChecked);
            } else if (k == "europe") {
                this.europeChecked = !(this.europeChecked);
            } else if (k == "northamerica") {
                this.northAmericaChecked = !(this.northAmericaChecked);
            } else if (k == "southamerica") {
                this.southAmericaChecked = !(this.southAmericaChecked);
            } else if (k == "topseven") {
                this.topSevenChecked = !(this.topSevenChecked);
            };

            for (let i=0; i < this.charities.length; i++) {

                this.charities[i].visible = true;

                if (this.charities[i].name.toLowerCase().indexOf(a.toLowerCase())<0) {
                    this.charities[i].visible = false;
                } 
                
                if (this.healthChecked || this.educationChecked || this.ministryChecked || this.capitalChecked || this.safetyChecked) {
                    if (!((this.healthChecked && this.charities[i].healthIsCause) || (this.educationChecked && this.charities[i].educationIsCause) || (this.ministryChecked && this.charities[i].ministryIsCause) || (this.capitalChecked && this.charities[i].capitalIsCause) || (this.safetyChecked && this.charities[i].safetyIsCause))) {
                        this.charities[i].visible = false;
                    }
                }

                if (this.africaChecked || this.asiaChecked || this.australiaChecked || this.europeChecked || this.northAmericaChecked || this.southAmericaChecked) {
                    if (!((this.africaChecked && this.charities[i].africaIsRegion) || (this.asiaChecked && this.charities[i].asiaIsRegion) || (this.australiaChecked && this.charities[i].australiaIsRegion) || (this.europeChecked && this.charities[i].europeIsRegion) || (this.northAmericaChecked && this.charities[i].northAmericaIsRegion) || (this.southAmericaChecked && this.charities[i].southAmericaIsRegion))) {
                        this.charities[i].visible = false;
                    }
                }

                if (this.topSevenChecked) {
                    if (!(this.topSevenChecked && this.charities[i].topSeven)) {
                        this.charities[i].visible = false;
                    }
                }
                
            }
        }
    },

    mounted() {
        window.addEventListener('scroll', this.updateScroll);
    },

    computed: {
        filteredCharities: function () {
            var a=this.searchText;

            return this.charities.filter(function(charity) {
                return charity.visible;
            });
        }
    },
};

</script>