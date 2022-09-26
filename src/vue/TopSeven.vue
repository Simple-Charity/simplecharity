<template>
    <div>
        <div class="grid grid-cols-6 max-w-screen-2xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="heart" alt="">
                <span class="text-red text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline"  >Health</span>
            </div>
            <div class="overflow-hidden rounded-md col-span-5 lg:col-span-4 sm:px-2 mx-2 my-3 bg-red transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-96': opened1 , 'h-28': !(opened1) }">
                <div class="h-28 flex items-center">
                    <div class="flex items-center">
                        <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                            <img :src="ci1" alt="">
                        </div>
                        <h1 class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 text-blue font-semibold">Blessings International</h1>
                        <div class="pl-2 hidden lg:block">
                            <div>
                                <p class="text-blue w-60 pb-2"><em>"Medicines for Missions"</em></p>
                            </div>
                            <div>
                                <p class="text-md font-semibold text-blue">FOCUS: Medical Supplies</p>
                            </div>
                        </div>
                        <div class="ml-auto w-10 h-28"></div>
                        <div class="absolute right-1">
                            <div v-on:click="opened1 = !(opened1)" class="mr-5 w-3 sm:w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': opened1 }">
                                <img class="w-full h-full" :src="caret" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 sm:px-10 relative h-[15rem] flex items-center">
                    <div class="">
                        <div class="lg:hidden">
                            <p class="text-md font-semibold text-blue">FOCUS: Medical Supplies</p>
                        </div>
                        <h5 class="text-md font-semibold text-blue pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                        <h5 class="text-blue text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">$50 can provide medicine for up to 87 patients</h5>

                        <a href="/partners/blessings-international">
                            <button class="">
                                <div class="bluebutton">
                                    Learn more
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            

            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="bulb" alt="">
                <span class="text-yellow text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline"  >Education</span>
            </div>
            <div class="overflow-hidden rounded-md col-span-5 lg:col-span-4 sm:px-2 mx-2 my-3 bg-yellow transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-96': opened2 , 'h-28': !(opened2) }">
                <div class="h-28 flex items-center">
                <div class="flex items-center">
                    <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                        <img :src="ci2" alt="">
                    </div>
                    <h1  class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 text-blue font-semibold">Edify</h1>
                    <div class="pl-2 hidden lg:block">
                        <div>
                            <p class="text-blue w-60 pb-2"><em>“A Christ-Centered Solution to the Global Education Crisis”</em></p>
                        </div>
                        <div>
                            <p class="text-md font-semibold  text-blue">FOCUS: Strengthening education systems</p>
                        </div>
                    </div>
                    <div class="absolute right-1">
                        <div v-on:click="opened2 = !(opened2)" class="mr-5 w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': opened2 }">
                            <img class="w-full h-full" :src="caret" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 sm:px-10 relative h-[15rem] flex items-center">
                    <div class="">
                        <div class="lg:hidden">
                            <p class="text-md font-semibold  text-blue">FOCUS: Strengthening education systems</p>
                        </div>
                        <h5 class="text-md font-semibold  text-blue pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                        <h5 class="text-blue text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">$4.35 is enough to impact a student who might otherwise be unable to attend school.</h5>

                        <a href="/partners/edify">
                            <button class="">
                                <div class="bluebutton">
                                    Learn more
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>



            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="home" alt="">
                <span class="text-pink text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline">Safety</span>
            </div>
            <div class="overflow-hidden rounded-md col-span-5 lg:col-span-4 sm:px-2 mx-2 my-3 bg-pink transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-96': opened3 , 'h-28': !(opened3) }">
                <div class="h-28 flex items-center">
                <div class="flex items-center">
                    <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                        <img :src="ci3" alt="">
                    </div>
                    <h1  class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 text-blue font-semibold">Love Justice International</h1>
                    <div class="pl-2 hidden lg:block">
                        <div>
                            <p class="text-blue w-60 pb-2"><em>“Love People. Fight for Justice.”</em></p>
                        </div>
                        <div>
                            <p class="text-md font-semibold  text-blue">FOCUS: Human trafficking</p>
                        </div>
                    </div>
                    <div class="ml-auto w-10 h-20"></div>

                    <div class="absolute right-1">
                        <div v-on:click="opened3 = !(opened3)" class="mr-5 w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': opened3 }">
                            <button><img class="w-full h-full" :src="caret" alt=""></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 sm:px-10 relative h-[15rem] flex items-center">
                    <div class="">
                        <div class="lg:hidden">
                            <p class="text-md font-semibold  text-blue">FOCUS: Human trafficking</p>
                        </div>
                        <h5 class="text-md font-semibold  text-blue pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                        <h5 class="text-blue text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">$100 can prevent a life from being trafficked</h5>

                        <a href="/partners/love-justice-international">
                            <button class="">
                                <div class="bluebutton">
                                    Learn more
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>



            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="dollar" alt="">
                
                <span class="text-green text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline"  >Capital</span>
            </div>
            <div class="overflow-hidden rounded-md col-span-5 lg:col-span-4 sm:px-2 mx-2 my-3 bg-green transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-96': opened4 , 'h-28': !(opened4) }">
                <div class="h-28 flex items-center">
                <div class="flex items-center">
                    <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                        <img :src="ci4" alt="">
                    </div>
                    <h1  class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 text-blue font-semibold">HOPE International</h1>
                    <div class="pl-2 hidden lg:block">
                        <div>
                            <p class="text-blue w-60 pb-2"><em>“Invest in Dreams”</em></p>
                        </div>
                        <div>
                            <p class="text-md font-semibold  text-blue">FOCUS: Financial services</p>
                        </div>
                    </div>
                    <div class="absolute right-1">
                        <div v-on:click="opened4 = !(opened4)" class="mr-5 w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': opened4 }">
                            <button><img class="w-full h-full" :src="caret" alt=""></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 sm:px-10 relative h-[15rem] flex items-center">
                    <div class="">
                        <div class="lg:hidden">
                            <p class="text-md font-semibold  text-blue">FOCUS: Financial services</p>
                        </div>
                        <h5 class="text-md font-semibold  text-blue pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                        <h5 class="text-blue text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">$245 provides their average loan, which is enough to start a small business.</h5>

                        <a href="/partners/hope-international">
                            <button class="">
                                <div class="bluebutton">
                                    Learn more
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>


            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="cross" alt="">
                <span class="text-teal text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline"  >Ministry</span>
            </div>
            <div class="overflow-hidden rounded-md col-span-5 lg:col-span-4 sm:px-2 mx-2 my-3 bg-teal transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-96': opened5 , 'h-28': !(opened5) }">
                <div class="h-28 flex items-center">
                <div class="flex items-center">
                    <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                        <img :src="ci5" alt="">
                    </div>
                    <h1  class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 text-linen font-semibold">Children in Christ</h1>
                    <div class="pl-2 hidden lg:block">
                        <div>
                            <p class="text-linen w-60 pb-2"><em>“Every Child Reached, Matured, and Leading Others in Christ”</em></p>
                        </div>
                        <div>
                            <p class="text-md font-semibold  text-linen">FOCUS: Unreached children</p>
                        </div>
                    </div>
                    <div class="absolute right-1">
                        <div v-on:click="opened5 = !(opened5)" class="mr-5 w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': opened5 }">
                            <button><img class="w-full h-full" :src="barecaret" alt=""></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 sm:px-10 relative h-[15rem] flex items-center">
                    <div class="">
                        <div class="lg:hidden">
                            <p class="text-md font-semibold  text-linen">FOCUS: Unreached children</p>
                        </div>
                        <h5 class="text-md font-semibold  text-linen pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                        <h5 class="text-linen text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">$7 provides a child with discipleship for a month</h5>

                        <a href="/partners/children-in-christ">
                            <button class="">
                                <div class="bluebutton hover:text-linen hover:border-linen">
                                    Learn more
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>



            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="all" alt="">
                <span class="text-blue text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline whitespace-nowrap"  >All Causes</span>
            </div>
            <div class="overflow-hidden rounded-md col-span-5 lg:col-span-4 sm:px-2 mx-2 my-3 bg-blue transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-96': opened6 , 'h-28': !(opened6) }">
                <div class="h-28 flex items-center">
                <div class="flex items-center">
                    <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                        <img :src="ci6" alt="">
                    </div>
                    <h1  class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 text-linen font-semibold">Tearfund</h1>
                    <div class="pl-2 hidden lg:block">
                        <div>
                            <p class="text-linen w-60 pb-2"><em>“Poverty is Not God’s Plan”</em></p>
                        </div>
                        <div>
                            <p class="text-md font-semibold  text-linen">FOCUS: Holistic development</p>
                        </div>
                    </div>

                    <div class="absolute right-1">
                        <div v-on:click="opened6 = !(opened6)" class="mr-5 w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': opened6 }">
                            <button><img class="w-full h-full" :src="barecaret" alt=""></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 sm:px-10 relative h-[15rem] flex items-center">
                    <div class="">
                        <div class="lg:hidden">
                            <p class="text-md font-semibold  text-linen">FOCUS: Holistic development</p>
                        </div>
                        <h5 class="text-md font-semibold  text-linen pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                        <h5 class="text-linen text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">$18 a month can provide handwashing stations for a latrine block, preventing the spread of disease.</h5>

                        <a href="/partners/tearfund">
                            <button class="">
                                <div class="redbutton ">
                                    Learn more
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start lg:col-span-2">
                <img class="h-12 w-12 sm:h-16 sm:w-16 mr-4" :src="usa" alt="">
                <span class="text-deepnavy text-xl lg:text-3xl font-semibold mr-4 mt-1 lg:mt-0 hidden sm:inline">Domestic</span>
            </div>
            <div class="overflow-hidden rounded-md col-span-5 lg:col-span-4 sm:px-2 mx-2 my-3 bg-deepnavy transition-height duration-500 ease-in-out transform" v-bind:class="{ 'h-96': opened7 , 'h-28': !(opened7) }">
                <div class="h-28 flex items-center">
                <div class="flex items-center">
                    <div class="rounded-md overflow-hidden h-24 w-24 hidden sm:block">
                        <img :src="ci7" alt="">
                    </div>
                    <h1  class="text-sm xs:text-md sm:text-lg lg:text-xl pl-4 lg:w-40 text-linen font-semibold">The Bowery Mission</h1>
                    <div class="pl-2 hidden lg:block">
                        <div>
                            <p class="text-linen w-60 pb-2"><em>“Rebuilding Hope since the 1870s”</em></p>
                        </div>
                        <div>
                            <p class="text-md font-semibold  text-linen">FOCUS: Homelessness</p>
                        </div>
                    </div>
                    <div class="absolute right-1">
                        <div v-on:click="opened7 = !(opened7)" class="mr-5 w-4 transition duration-500 ease-in-out transform" v-bind:class="{ 'rotate-90': opened7 }">
                            <button><img class="w-full h-full" :src="barecaret" alt=""></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 sm:px-10 relative h-[15rem] flex items-center">
                    <div class="">
                        <div class="lg:hidden">
                            <p class="text-md font-semibold  text-linen">FOCUS: Homelessness</p>
                        </div>
                        <h5 class="text-md font-semibold  text-linen pt-6 sm:pt-6 pb-2">DOLLAR IMPACT</h5>
                        <h5 class="text-linen text-xs sm:text-sm lg:text-lg pb-6 max-w-screen-lg">$50/month provides vocational readiness training for adults enabling them to thrive and succeed.</h5>

                        <a href="/partners/the-bowery-mission">
                            <button class="">
                                <div class="redbutton ">
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
    
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ["bulb","home","dollar","heart","cross","all","usa","caret","barecaret","sample","ci1","ci2","ci3","ci4","ci5","ci6","ci7"],
    data: function() {
        return {
            opened1: false,
            opened2: false,
            opened3: false,
            opened4: false,
            opened5: false,
            opened6: false,
            opened7: false,
        }
    },
};

</script>