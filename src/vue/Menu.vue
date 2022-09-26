<template>
  	<div class="fixed inset-0 z-[300] overflow-hidden modal-bg flex noscrollbar">
    	<div @click.self="$emit('close')" class="fixed inset-0 z-50 absolute overflow-hidden flex">
      		<div class="w-full md:w-3/4 lg:w-7/12 xl:w-1/2 max-w-screen-md bg-white h-full z-75 absolute right-0 bg-lightgreen animated slideInRight menuAnimate">
				<span class="absolute right-0 pr-8 pt-6 text-2xl transition-all cursor-pointer" @click="$emit('close')">
					&#10005;
				</span>
        		<div data-scroll-lock-scrollable class="overflow-y-auto h-full py-12 px-14">
					<div class="sm:flex sm:flex-wrap content-start" v-for="cat in c">
						<div class="text-2xl sm:text-3xl font-serif w-1/2">
							<h1 class="sm:border-b-2 border-blue font-bold">{{ cat }}</h1> 
						</div>
						<div class="font-sans text-sm sm:text-md lg:text-lg text-blue sm:w-1/2 ml-8 sm:ml-0 pl-2 sm:pl-4 border-l-2 border-blue sm:border-l-0 mb-2">
							<ul class="pt-2 sm:pt-0">
								<li><div class="sm:mt-0 sm:pt-[2rem] lg:pt-[1.8rem]"></div></li>

								<a v-for="item in nItems" :href="item.reference"><li v-if="item.cat == cat" class="pb-2 ">{{ item.name }}</li></a>
							</ul>
						</div>
					</div>

					<div class="">
						<div class="hidden sm:block w-full pt-2 lg:pt-6 ml-[50%]">
							<div class="ml-4 mb-2">
								<a class="" href="https://shop.simplecharity.org">
									<button class="">
										<div class="bluebutton bg-transparent text-blue hover:bg-blue hover:text-lightergreen w-52">Shop</div>
									</button>
								</a>
							</div>
							<a class="ml-4 " href="https://simplecharity.kindful.com">
								<button class="">
									<div class="bluebutton w-52 text-lightergreen">Donate</div>
								</button>
							</a>
						</div>
					</div>

					<div class="sm:hidden">
						<div class="mt-4 mb-2">
							<a class="" href="https://shop.simplecharity.org">
								<button class="">
									<div class="bluebutton bg-transparent text-blue hover:bg-blue hover:text-lightergreen w-52">Shop</div>
								</button>
							</a>
						</div>
						<a class="" href="https://simplecharity.kindful.com">
							<button class="w-52">
								<div class="bluebutton w-52 text-lightergreen">Donate</div>
							</button>
						</a>
					</div>
				</div>
			</div>
    	</div>
  	</div>
</template>

<script>

    import {disablePageScroll, enablePageScroll} from 'scroll-lock';

    export default {
        props: ["navs","ca"],
		data: function() {
            return {
                showMenuContent: false,
				nItems: this.navs,
				c: this.ca,
            }
        },
        methods: {},
        destroyed() {
            enablePageScroll();
        },
        mounted() {
            disablePageScroll();
        }
    }
</script>
