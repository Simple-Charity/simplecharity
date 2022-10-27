<template>
    <div class="">
        
        <div>
            <div class="pb-6">
                <h1  class="text-blue text-2xl font-bold">Listen to the episode</h1>
            </div>
            <audio class="w-full mb-12" id="audioPlayer" controls @timeupdate="onTimeUpdate">
                <source :src="audio" type="audio/mp3">
            </audio>
        </div>


        <div class="pb-6 hidden md:block">
            <h1  class="text-blue text-2xl font-bold">Read the transcript</h1>
        </div>
        <div class="md:hidden">
            <div v-on:click="launchTranscriptModal()" class="bluebutton hover:cursor-pointer max-w-[20rem] mx-auto">
                Read the transcript
            </div>
        </div>
        <div class="transcriptcontainer h-[45rem] overflow-hidden relative rounded-lg bg-linen hidden md:block">
            <div class="absolute left-0 right-0 top-0 h-[5rem] bg-linen z-20 flex justify-center items-center">
                <div class="h-[2.5rem] w-full relative">
                    <input v-model="searchTerm" class="absolute inset-0 border-b-2 ml-12 mr-[3.15rem] border-blue text-lg" type="text" placeholder="Search">
                    <div v-on:click="resetSearch()" class="absolute right-[3.15rem] top-0 bottom-0 w-[2rem] flex items-center justify-end hover:cursor-pointer">
                        <h2 class="text-blue text-xl font-bold">&#10005;</h2>
                    </div>
                </div>
            </div>
            <div id="transcriptviewer" class="w-full h-[40rem] overflow-y-scroll bg-linen pl-6 md:pl-12 pr-4 md:pr-10 pt-4 relative mt-20 md:rounded-b-lg">
            
                <div :id="'tblock-' + transcriptBlock.timestamp" class="pb-8" v-for="transcriptBlock in selectedTranscriptBlocks">
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
                
                    <div class="text-blue text-lg md:pl-14">
                        {{ transcriptBlock.text }}
                    </div>
                </div>
            </div>
        </div>



        <div :class="{ 'z-[-50] opacity-[0]': !transcriptModalOpen, 'z-[1000] opacity-[1]': transcriptModalOpen }" class="transcriptcontainer md:hidden overflow-hidden fixed inset-0 z-[-50] opacity-[0]  md:relative md:rounded-lg bg-linen">
            <div v-on:click="deactivateTranscriptModal()" class="absolute top-4 right-4 w-8 h-8 z-[60] hover:cursor-pointer">
                <h2 class="text-blue text-3xl font-bold">&#10005;</h2>
            </div>
            <div id="transcriptviewer" class="w-full h-full overflow-y-scroll bg-linen pl-6 pr-4 py-10 relative md:rounded-b-lg">
            
                <div class="pb-8" v-for="transcriptBlock in selectedTranscriptBlocks">
                    <div class="flex items-center justify-between pb-4">
                        <div class="flex items-center">
                            <div class="pr-4">
                                <img class="h-10 w-10 rounded-full" :src="transcriptBlock.speakerHeadshot" alt="HS">
                            </div>
                            <div class="text-blue text-lg font-bold">
                                {{ transcriptBlock.speakerName }}
                            </div>
                        </div>
                    
                        <div class="text-blue text-lg opacity-[0.38]">
                            {{ transcriptBlock.timestamp }}
                        </div>
                    </div>
                
                    <div class="text-blue text-md md:pl-14 leading-6">
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
        props: ["audio", "transcript"],
        data: function() {
            return {
                searchTerm: "",
                transcriptBlocks: this.transcript,
                transcriptModalOpen: false,
                currentTime: 0,
            } 
        },

        methods: {
            resetSearch() {
                this.searchTerm = "";
            },
            launchTranscriptModal() {
                this.transcriptModalOpen = true;
            },
            deactivateTranscriptModal() {
                this.transcriptModalOpen = false;
            },
            onTimeUpdate () {
                this.currentTime = document.getElementById('audioPlayer').currentTime;

                for (var i = 0; i < this.transcriptBlocks.length-1; i++) {
                    if (this.currentTime > this.transcriptBlocks[i].seconds && this.currentTime < this.transcriptBlocks[i+1].seconds) {
                        document.getElementById('transcriptviewer').scrollTo({top: document.getElementById('tblock-' + this.transcriptBlocks[i].timestamp).offsetTop, behavior: 'smooth'});
                        break;
                    }
                }
            }
        },
        computed: {
            selectedTranscriptBlocks() {
                return this.transcriptBlocks.filter(transcriptBlock => transcriptBlock.text.toLowerCase().indexOf(this.searchTerm.toLowerCase()) != -1 || transcriptBlock.speakerName.toLowerCase().indexOf(this.searchTerm.toLowerCase()) != -1);
            },
        }
    }

</script>