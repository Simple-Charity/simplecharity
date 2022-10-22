<template>
    <div>
        <div class="w-full ">
            <div class="main-carousel md:px-20 max-w-[60rem]">
                <div class="carousel-cell px-2" v-for="transcriptSuperBlock in transcript">
                    <div class="pb-8 " v-for="transcriptBlock in transcriptSuperBlock">
                        <div class="flex items-center justify-between pb-4">
                            <div class="flex items-center">
                                <div class="pr-4">
                                    <img class="h-12 w-12 rounded-full" :src="transcriptBlock.speakerHeadshot" alt="HS">
                                </div>
                                <div class="text-blue text-xl">
                                    {{ transcriptBlock.speakerName }}
                                </div>
                            </div>
                        
                            <div class="text-blue text-xl opacity-[0.38]">
                                {{ transcriptBlock.timestamp }}
                            </div>
                        </div>
                    
                        <div class="text-blue text-lg">
                            {{ transcriptBlock.text }}
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
        props: ["transcript"],
        data: function() {
            return {

            } 
        },

        methods: {

        },

        mounted () {
            var elem = document.querySelector('.main-carousel');
            var flkty = new Flickity( elem, {
            cellAlign: 'left',
            pageDots: false,
            wrapAround: false,
            friction: 0.3,
            prevNextButtons: true,
            adaptiveHeight: true,
        });
    }
    }

</script>