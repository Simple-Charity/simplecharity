<template>
    <div>

        <div class="bg-deepnavy edge pt-[15rem]">
            <div class="max-w-screen-lg mx-auto">
                <div class="text-5xl font-serif font-bold text-linen pb-20">
                    Solidarity Resolution
                </div>
                <div class="flex flex-wrap pb-20">
                    <div class="w-1/2 pr-4">
                        <h2 class="text-4xl font-serif text-linen border-b-2 border-linen">Introduction</h2>
                        <div class="pt-[2rem] text-red pr-[5rem] font-[100] tracking-tight">
                            <p class="pb-2 text-2xl typogrify">"Little children, let us not love in word or talk but in deed and in truth."</p>
                            <p class="text-lg text-linen">1 JOHN 3:18</p>
                        </div>
                    </div>
                    <div class="w-1/2 pt-[2.25rem]">
                        <p class="text-linen text-2xl font-bold pb-6">This resolution was written to help you put words into action and live in solidarity with the poor. We are inspired and directed by the Word of God. The Bible is the basis of the standards in this resolution.</p>
                        <p class="text-linen text-xl pb-4">We offer this as a tool for accountability and community, not as a legalistic requirement. Christ has freed us for joyful obedience. And from that freedom (not obligation or shame), we can extend his love.</p>
                        
                        <div v-on:click="openModal('intro',1)" class="text-red text-xl hover:cursor-pointer pb-40">
                            Read more →
                        </div>

                        <div>
                            <div class="group" v-bind:class="{ 'invisible' : !(currentModal == 'intro') , 'block' : currentModal == 'intro'}">
                                <div class="fixed inset-0 bg-deepnavy z-[150] transition-opacity ease-in-out duration-300 transform"  v-bind:class="{ 'opacity-[0]' : !(currentModal == 'intro') , 'opacity-[0.9]' : (currentModal == 'intro') }">
                                
                                </div>
                    
                                <div class="fixed inset-0 z-[150] bg-transparent flex justify-center items-center sm:p-8 flex items-center">
                    
                                    <div class="z-[150] m-0 fixed inset-0 sm:relative sm:w-[40rem] p-6 sm:p-10 z-[150] border-4 border-red bg-linen transition-opacity ease-in-out duration-300 transform noscroll flex items-center" v-bind:class="{ 'opacity-[0]' : !(currentModal == 'intro') , 'opacity-[1]' : (currentModal == 'intro') }" >
                                        <div>
                                            <div class="z-[160] flex justify-between items-center pb-6">
                                                <div class="pr-6">
                                                    <h1 class="text-left text-2xl sm:text-3xl font-semibold">Title</h1>
                                                </div>
                    
                                                <div v-on:click="openModal('none',2)" class="">
                                                    <h6 class="text-blue text-2xl font-bold cursor-pointer ">&#10005;</h6>
                                                </div>

                                                
                                            </div>

                                            <div>
                                                <p class="text-blue text-xl pb-4">His love was not distant, but up close and personal. Through the incarnation, Jesus took on flesh and moved into the neighborhood. Christians are called to put faith into action through this incarnational, real-world, on-the-ground love.</p>
                                                <p class="text-blue text-xl pb-4">If you would like to join this community of love, please read through the resolution with care and sign your name at the end. Simple Charity will then walk with you to remind, support and exhort you as you practice liturgies of solidarity with the poor.</p>

                                                <p class="text-linen text-xl pb-4">James K. A. Smith writes in You Are What You Love that liturgies are “habit-forming, love-shaping rituals that get hold of our hearts and aim our loves” (p. 38). Liturgies are things that we do that “do something to us” (p. 46). Solidarity is a term common in Catholic social teaching. It’s a word of unity that says, “I see you. I won’t turn aside from your suffering or oppression. I am with you.” In solidarity, we “rejoice with those who rejoice; mourn with those who mourn” (Romans 12:15). This solidarity resolution calls Christians to practice liturgies of solidarity with people experiencing poverty and injustice.</p>
                                                <p class="text-linen text-xl pb-4">Liturgies of solidarity have daily, weekly, monthly and yearly rhythms. They are acts of worship to God and with people. Liturgies of solidarity are how we see the image of God, marred by suffering, in the lives of the vulnerable and respond with love.</p>
                                                <p class="text-linen text-xl pb-4">Six spiritual disciplines, derived from the teachings of Jesus, invite us into solidarity with the vulnerable: giving (Matthew 6:1-4), prayer (Matthew 6:5-15), fasting (Matthew 6:16-18), gratitude (Matthew 6:19-24), faith (Matthew 6:25-34), and service (Matthew 25:31-46). As acts of worship, each practice must be shaped by the essential Christian virtues of humility, community and love.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>





        
        <div class="relative  mx-auto sm:w-[25rem] sm:h-[25rem] md:w-[30rem] md:h-[30rem] lg:w-[43rem] lg:h-[43rem] xl:w-[50rem] xl:h-[50rem] xxl:w-[55rem] xxl:h-[55rem]">
            
            <div class="w-[20%] absolute translate-x-[-50%] translate-y-[-50%] top-[45%] left-[50%] hover:cursor-pointer">
                <h2 class="text-linen headercaps text-center pt-4">
                    Summary
                </h2>
            </div>


            <div v-for="page in srpages">
                <div v-on:click="openModal(page.name,1)" class="w-[20%] absolute translate-x-[-50%] translate-y-[-50%] hover:cursor-pointer" :class="page.align">
                    <div>
                        <img class="max-h-[8rem] text-linen border-linen stroke-linen" :src="page.icon" alt="">
                    </div>
                    <h2 class="text-linen headercaps text-center pt-4">
                        {{ page.name }}
                    </h2>
                </div>

                <div>
                    <div class="group" v-bind:class="{ 'invisible' : !(currentModal == page.name) , 'block' : currentModal == page.name}">
                        <div class="fixed inset-0 bg-deepnavy z-[150] transition-opacity ease-in-out duration-300 transform"  v-bind:class="{ 'opacity-[0]' : !(currentModal == page.name) , 'opacity-[0.9]' : (currentModal == page.name) }">
                        
                        </div>
            
                        <div class="fixed inset-0 z-[150] bg-transparent flex justify-center items-center sm:p-8 flex items-center">
            
                            <div class="z-[150] m-0 fixed inset-0 sm:relative sm:w-[40rem] p-6 sm:p-10 z-[150] border-4 border-red bg-linen transition-opacity ease-in-out duration-300 transform noscroll flex items-center" v-bind:class="{ 'opacity-[0]' : !(currentModal == page.name) , 'opacity-[1]' : (currentModal == page.name) }" >
                                <div>
                                    <div class="z-[160] flex justify-between items-center pb-6">
                                        <div class="pr-6">
                                            <h1 class="text-left text-2xl sm:text-3xl font-semibold">{{ page.name }}</h1>
                                            
                                        </div>
            
                                        <div v-on:click="openModal('none',2)" class="">
                                            <h6 class="text-blue text-2xl font-bold cursor-pointer ">&#10005;</h6>
                                        </div>
            
                                    </div>
                                    <div>
                                        <div class="text-lg" v-for="paragraph in page.body">
                                            {{ paragraph }}
                                        </div>

                                        <div>
                                            <h2 class="text-xl font-bold pt-6 pb-2">Commitment</h2>

                                            <div class="text-lg">
                                                {{ page.commitment }}
                                            </div>

                                            <h2 class="text-xl font-bold pt-6 pb-2">Aspiration</h2>

                                            <div class="text-lg">
                                                {{ page.aspiration }}
                                            </div>

                                            <h2 class="text-xl font-bold pt-6 pb-2">Solidarity</h2>

                                            <div class="text-lg">
                                                {{ page.solidarity }}
                                            </div>
                                        </div>
            
                                        <div class="flex flex-wrap justify-center pt-10">
                                            <div v-if="buttonone">
                                                <a :href="linkone">
                                                    <button class="mx-2">
                                                        <div class="bluebutton hover:bg-linen hover:text-blue">
                                                            <div class=""></div>
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
            </div>
        </div>
    </div>
</template>

<script>

import VueAxios from '../js/modules/vue-axios';

export default {
    props: ['srpages'],
    data: function() {
        return {
            currentModal: 'none',
        }
    },
    methods: {
        openModal(key,type) {
            if (type == 1) {

                for (var i = 0; i < this.srpages.length; i++) {
                    if ( key == this.srpages[i].name ) {
                        this.currentModal = this.srpages[i].name;
                        break;
                    }
                }

                if (key == 'intro') {
                    this.currentModal = 'intro';
                }

            } else {
                this.currentModal = 'none';
            }
            
        }
    },
};

</script>