<template>
    <div class="hidden md:block">
        <!--Need to build a modal transcript viewer for small screens-->
        <div class="pb-6">
            <h1 class="text-blue text-2xl font-bold">Read the transcript</h1>
        </div>
        <div class="h-[45rem] overflow-hidden relative rounded-lg bg-linen">
            <div class="absolute left-0 right-0 top-0 h-[5rem] bg-linen z-20 flex justify-center items-center">
                <div class="h-[2.5rem] w-full relative">
                    <input v-model="searchTerm" class="absolute inset-0 border-b-2 ml-12 mr-[3.15rem] border-blue text-lg" type="text" placeholder="Search">
                    <div v-on:click="resetSearch()" class="absolute right-[3.15rem] top-0 bottom-0 w-[2rem] flex items-center justify-end hover:cursor-pointer">
                        <h2 class="text-blue text-xl font-bold">&#10005;</h2>
                    </div>
                </div>
            </div>
            <div id="transcriptviewer" class="w-full h-[40rem] overflow-y-scroll bg-linen pl-12 pr-10 pt-4 relative mt-20 rounded-b-lg">
            
                <div class="pb-8" v-for="transcriptBlock in selectedTranscriptBlocks">
                    <div class="flex items-center justify-between pb-2">
                        <div class="flex items-center">
                            <div class="pr-4">
                                <img class="h-10 w-10 rounded-full" :src="transcriptBlock.speakerHeadshot" alt="HS">
                            </div>
                            <div class="text-blue text-xl font-bold">
                                {{ transcriptBlock.speakerName }}
                            </div>
                        </div>
                    
                        <div class="text-blue text-xl opacity-[0.38]">
                            {{ transcriptBlock.timestamp }}
                        </div>
                    </div>
                
                    <div class="text-blue text-lg pl-14">
                        {{ transcriptBlock.text }}
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
                searchTerm: "",
                transcriptBlocks: this.transcript,
            } 
        },

        methods: {
            resetSearch() {
                this.searchTerm = "";
            }
        },
        computed: {
            selectedTranscriptBlocks() {
                return this.transcriptBlocks.filter(transcriptBlock => transcriptBlock.text.toLowerCase().indexOf(this.searchTerm.toLowerCase()) != -1 || transcriptBlock.speakerName.toLowerCase().indexOf(this.searchTerm.toLowerCase()) != -1);
            }
        }
    }

</script>