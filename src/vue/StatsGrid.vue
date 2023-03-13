<template>
    <div class="">
        <div class="pack-grid w-full ">
            
            <div v-for="stat in stats" class="grid-it w-full sm:w-[49%] lg:w-auto group overflow-hidden">
                <div class="p-8 transition ease-in-out duration-300 transform" :class="stat.background">
                    <div class="text-2xl pb-6 lg:max-w-[20rem] transition ease-in-out duration-300 transform" :class="stat.text">
                        {{ stat.name }}
                    </div>
                    <div :class="{ 'text-6xl lg:text-8xl': stat.is_active, 'text-5xl sm:group-hover:text-6xl lg:group-hover:text-8xl ': !(stat.is_active) }" class="font-serif pb-6 transition-size ease-in-out duration-300 transform">
                        <div class="transition ease-in-out duration-300 transform" :class="stat.text">
                            {{ stat.amount }}
                        </div>
                    </div>

                    <div class="">

                        <div v-on:click="toggleActive(stat)"  class="flex items-center hover:cursor-pointer py-2 ">
                            <div class="text-3xl pr-4 pb-1 transition ease-in-out duration-300 transform" :class="stat.text">
                                By year
                            </div>
                            <div :class="{ 'rotate-90': stat.is_active }" class="scale-y-[1.5] pb-1 origin-center text-2xl transition ease-in-out duration-300"> 
                                <div class="transition ease-in-out duration-300 transform" :class="stat.text">
                                    >
                                </div>
                            </div>
                        </div>

                        <div :class="{ 'hidden': !(stat.is_active) }">
                            <div class="text-center py-10">
                                <div v-for="year in stat.years">
                                    <div class="flex items-center">
                                        <div class="font-sans text-lg pb-2 transition ease-in-out duration-300 transform" :class="stat.text">
                                            {{ year.year }}<span class="tracking-overlap px-3">-----------</span> 
                                        </div>
                                        <div  class="font-serif text-2xl lg:text-4xl pb-2 transition ease-in-out duration-300 transform" :class="stat.text">
                                            {{ year.amount }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <div v-if="!(stat.button_reference == '')" class="flex justify-center">
                                <button>
                                    <a :href="stat.button_reference">
                                        <div class="border-2 rounded-full px-6 py-3 transition ease-in-out duration-300 transform hover:bg-red hover:border-red sm:group-hover:text-linen sm:group-hover:border-linen">
                                            {{ stat.button_text }}
                                        </div>
                                    </a>
                                </button>
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
        props: ["statistics","caret"],
        data: function() {
            return {
                stats: this.statistics,
            }
        },

        methods: {
            toggleActive(s) {
                s.is_active = !(s.is_active);
            },
        },

        mounted() {
            var elem = ('.pack-grid');
            var pckry = new Packery( elem, {
                // options
                itemSelector: '.grid-it',
                gutter: 10,
                transitionDuration: '0.5s',
            });

            var cells = document.getElementsByClassName('grid-it');

            for (var i = 0; i < cells.length; i++) {
                cells[i].addEventListener('click', runLayout);
                cells[i].addEventListener('mouseover', runLayout);
                cells[i].addEventListener('mouseout', runLayout);
            }

            function runLayout() {
                setTimeout(function() {
                    pckry.layout();
                }, 300);
            }
        },
    };
</script>