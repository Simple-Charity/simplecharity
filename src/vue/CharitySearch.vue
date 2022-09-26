<template>
    <div class=" pt-6 pb-12 bg-deepnavy w-full">
        <div class="max-w-screen-2xl mx-auto">
            <div id="" class="flex sm:min-h-lg">
                <div class="hidden">
                    <div id="sb">
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

                            <div>
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

                            <hr class="border-blue border-1 my-4">

                            <div class="hidden">
                                <h5 class="text-md font-semibold text-linen pb-2">YEAR</h5>

                                <form action="">
                                    <input v-model="nineteenChecked" id="nineteen" class="w-6" type="checkbox" v-on:click="determineVisibility('nineteen')"><span class="text-lg text-linen">2020-2021</span><br>
                                    <input v-model="twentyChecked" id="twenty" class="w-6" type="checkbox" v-on:click="determineVisibility('twenty')"><span class="text-lg text-linen">2019-2020</span><br>
                                    <input v-model="twentyOneChecked" id="twentyone" class="w-6" type="checkbox" v-on:click="determineVisibility('twentyone')"><span class="text-lg text-linen">2018-2019</span><br>
                                </form>
                            </div>

                            <hr class="border-blue hidden border-1 my-4">

                            <h5 v-on:click="determineVisibility('topseven')" class="text-md font-semibold text-linen pb-2">SEE OUR <button class="text-md font-semibold text-linen pb-2"><span  v-bind:class="{'text-red' : !topSevenChecked, 'text-red' : topSevenChecked}" class="border-b-2 border-red transition duration-200 ease-in-out transform">TOP 7 PICKS</span></button></h5>

                            <span id="ref"></span>

                        </div>
                    </div>
                    <div id="sbb"></div>
                </div>

                <div class="sm:pr-4 pt-10 w-full md:w-2/3 md:ml-auto">

                    <div class="flex items-center justify-between">
                        <h1 class="text-md font-semibold text-md text-linen pb-5">SEARCH</h1>

                        <!-- <button class="md:hidden pb-5" v-on:click="smallSearchShown = !smallSearchShown;" >
                            <div class="whitebutton">
                                Filter
                            </div>
                        </button> -->
                    </div>

                    <input v-model="searchText" v-on:keyup="determineVisibility()" class="text-linen text-3xl w-full h-12 bg-deepnavy border-b-2 font-semibold" type="text">

                    <div class="md:hidden fixed top-0 bottom-0 left-0 right-0 bg-blue opacity-[.95]" v-if="smallSearchShown"></div>  

                    <div class="md:hidden fixed scale-[1.01] z-[100] p-10 inset-0 sm:inset-10 sm:rounded-md bg-deepnavy sm:border-linen border-2 transition-opacity duration-500 ease-in-out transform overflow-y-scroll" v-if="smallSearchShown">
                        <span class="absolute right-4 top-4 text-2xl text-linen transition-all cursor-pointer" v-on:click="smallSearchShown=false;">
                            &#10005;
                        </span>
                        <div id="sb">
                            <div :class="{fixedSidebar:isScrolled & !(isScrolled2),fixedSidebar2:isScrolled2}" class="">
                                <h5 class="text-md font-semibold">FILTER</h5>

                                

                                <div class="flex items-center justify-between">
                                    <div class="">
                                        <p class="text-sm text-linen pr-6">24 items</p>
                                    </div>
                                    <div>
                                        <button>
                                            <div v-on:click="clearFilters()" class="whitebutton h-8 w-20">
                                                Clear
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <hr class="border-blue border-1 my-4">

                                <div>
                                    <h5 class="text-md font-semibold text-linen">CAUSE</h5>

                                    <form action="">
                                        <input v-model="healthChecked" id="health" class="w-6" type="checkbox" v-on:click="determineVisibility('health')" ><span class="text-sm text-linen">Health</span><br>
                                        <input v-model="educationChecked" id="education" class="w-6" type="checkbox" v-on:click="determineVisibility('education')" ><span class="text-sm text-linen">Education</span><br>
                                        <input v-model="safetyChecked" id="safety" class="w-6" type="checkbox" v-on:click="determineVisibility('safety')"><span class="text-sm text-linen">Safety</span><br>
                                        <input v-model="ministryChecked" id="ministry" class="w-6" type="checkbox" v-on:click="determineVisibility('ministry')"><span class="text-sm text-linen">Ministry</span><br>
                                        <input v-model="capitalChecked" id="capital" class="w-6" type="checkbox" v-on:click="determineVisibility('capital')"><span class="text-sm text-linen">Capital</span><br>
                                    </form>
                                </div>

                                <hr class="border-blue border-1 my-4">

                                <div>
                                    <h5 class="text-md font-semibold text-linen">REGION</h5>

                                    <form action="">
                                        <input v-model="africaChecked" id="africa" class="w-6" type="checkbox" v-on:click="determineVisibility('africa')"><span class="text-sm text-linen">Africa</span><br>
                                        <input v-model="asiaChecked" id="asia" class="w-6" type="checkbox" v-on:click="determineVisibility('asia')"><span class="text-sm text-linen">Asia</span><br>
                                        <input v-model="australiaChecked" id="australia" class="w-6" type="checkbox" v-on:click="determineVisibility('australia')"><span class="text-sm text-linen">Australia</span><br>
                                        <input v-model="europeChecked" id="europe" class="w-6" type="checkbox" v-on:click="determineVisibility('europe')"><span class="text-sm text-linen">Europe</span><br>
                                        <input v-model="northAmericaChecked" id="northamerica" class="w-6" type="checkbox" v-on:click="determineVisibility('northamerica')"><span class="text-sm text-linen">North America</span><br>
                                        <input v-model="southAmericaChecked" id="southamerica" class="w-6" type="checkbox" v-on:click="determineVisibility('southamerica')"><span class="text-sm text-linen">South America</span><br>
                                    </form>
                                </div>

                                <hr class="border-blue border-1 my-4">

                                <div>
                                    <h5 class="text-md font-semibold text-linen">YEAR</h5>

                                    <form action="">
                                        <input v-model="nineteenChecked" id="nineteen" class="w-6" type="checkbox" v-on:click="determineVisibility('nineteen')"><span class="text-sm text-linen">2020-2021</span><br>
                                        <input v-model="twentyChecked" id="twenty" class="w-6" type="checkbox" v-on:click="determineVisibility('twenty')"><span class="text-sm text-linen">2019-2020</span><br>
                                        <input v-model="twentyOneChecked" id="twentyone" class="w-6" type="checkbox" v-on:click="determineVisibility('twentyone')"><span class="text-sm text-linen">2018-2019</span><br>
                                    </form>
                                </div>

                                <hr class="border-blue border-1 my-4">

                                <h5 v-on:click="determineVisibility('topseven')" class="text-md font-semibold text-linen pb-2">SEE OUR <button class="text-md font-semibold text-linen pb-2"><span  v-bind:class="{'text-red' : !topSevenChecked, 'text-red' : topSevenChecked}" class="border-b-2 border-red transition duration-200 ease-in-out transform">TOP 7 PICKS</span></button></h5>

                                <span id="ref"></span>

                            </div>
                        </div>
                        <div id="sbb"></div>
                    </div>



                    <div class="pt-6 flex">
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

                        <div v-if="nineteenChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                2020-2021
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('nineteen');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="twentyChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                2019-2020
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('twenty');">
                                &#215;
                            </span>
                        </div>
                        <div v-if="twentyOneChecked" class="flex justify-center items-center rounded-full bg-blue text-linen py-1 px-4 mr-2 mb-2">
                            <span class="text-sm">
                                2018-2019
                            </span>
                            <span class="text-sm pl-2 cursor-pointer" v-on:click="determineVisibility('twentyone');">
                                &#215;
                            </span>
                        </div>


                    </div>

                    <div v-for="item in filteredCharities" class="pt-6">
                        <div class="overflow-hidden rounded-md bg-blue relative transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-[27rem] sm:h-96': item.opened , 'h-32 sm:h-28': !(item.opened) }" >
                            <div class="h-32 sm:h-28 flex items-center">
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
                                    <div v-on:click="item.opened = !(item.opened)" class="ml-2 caretmarker w-3 sm:w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': item.opened }">
                                        <button><img class="w-full h-full" :src="barecaret" alt=""></button>
                                    </div>
                                </div>
                            </div>
                            <div class="h-[20rem] sm:h-68 bg-darkblue p-5 px-6 sm:px-20 flex items-center">
                                <div>
                                    <div class="xl:hidden">
                                        <p class="text-md font-semibold text-linen pb-2">FOCUS: {{ item.focus }}</p>
                                    </div>
                                    <h5 class="text-md font-semibold text-linen pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                                    <h5 class="text-linen text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">{{ item.impact }}</h5>

                                    <a :href="item.url">
                                        <button class="">
                                            <div class="redbutton">
                                                Learn more
                                            </div>
                                        </button>
                                    </a>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="bottomReference"></div>
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

            nineteenChecked: false,
            twentyChecked: false,
            twentyOneChecked: false,

            topSevenChecked: false,

            smallSearchShown: false,
        }
    },

    methods: {
        updateScroll() {
            this.t = document.querySelector('#sb').getBoundingClientRect().top;
            this.t2 = document.querySelector('#sb').getBoundingClientRect().bottom;
            this.t3 = document.querySelector('#bottomReference').getBoundingClientRect().top;
            this.t4 = document.querySelector('#ref').getBoundingClientRect().top;

            
            this.isScrolled  = (window.scrollY > this.t + window.pageYOffset);
            this.isScrolled2 = (this.t3 < 712);
        },

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

            document.getElementById("nineteen").checked = false;
            document.getElementById("twenty").checked = false;
            document.getElementById("twentyone").checked = false;

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

            this.nineteenChecked = false;
            this.twentyChecked = false;
            this.twentyOneChecked = false;

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
            } else if (k == "nineteen") {
                this.nineteenChecked = !(this.nineteenChecked);
            } else if (k == "twenty") {
                this.twentyChecked = !(this.twentyChecked);
            } else if (k == "twentyone") {
                this.twentyOneChecked = !(this.twentyOneChecked);
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

                if (this.nineteenChecked || this.twentyChecked  || this.twentyOneChecked) {
                    if (!((this.nineteenChecked && this.charities[i].nineteenIsYear) || (this.twentyChecked && this.charities[i].twentyIsYear) || (this.twentyOneChecked && this.charities[i].twentyOneIsYear))) {
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