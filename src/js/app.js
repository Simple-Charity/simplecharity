import VueAxios from './modules/vue-axios';

// App main
const main = async() => {
    // Async load the vue module
    const {default: Vue} = await import('vue');
    const VuePrlx = await import('vue-prlx');
    const VueTypedJs = await import('vue-typed-js');

    Vue.directive('prlx', VuePrlx.VuePrlxDirective);
    Vue.use(VueTypedJs);

    const vm = new Vue({
        el: "#page-container",
        components: {
            'content-toggle': () => import('../vue/ContentToggle.vue'),
            'site-menu': () => import('../vue/Menu.vue'),
            'ajax-modal': () => import('../vue/AjaxModal.vue'),
            'my-donut': () => import('../vue/MyDonut.vue'),
            'charity-search': () => import('../vue/CharitySearch.vue'),
            'top-seven': () => import('../vue/TopSeven.vue'),
            'process': () => import('../vue/Process.vue'),
            'faq': () => import('../vue/faq.vue'),
            'people': () => import('../vue/People.vue'),
            'modal': () => import('../vue/Modal.vue'),
            'delayed-type': () => import('../vue/DelayedType'),
            'carousel': () => import('../vue/Carousel.vue'),
            'carousel-quote': () => import('../vue/CarouselQuote.vue'),
            'carousel-review': () => import('../vue/CarouselReview.vue'),
            'partner-drop': () => import('../vue/PartnerDrop.vue'),
            'podcast-player': () => import('../vue/PodcastPlayer.vue'),
            'solidarity-resolution-splash': () => import('../vue/SolidarityResolutionSplash.vue'),
            'solidarity-interactive': () => import('../vue/SolidarityInteractive.vue'),
            'stats-grid': () => import('../vue/StatsGrid.vue'),
        },
        data: {
            ajaxModal: {
                isActive: false,
                clickTarget: null,
            },
            currentUser: null,
            appIsLoading: false,
            showUserDonateMsg: false,
            userDonateMsgIsHidden: false,
            menuIsVisible: false,
            currentChunk: 1,
        },
        methods: {
            toggleAjaxModal(e) {
                e ? this.ajaxModal.clickTarget = e.target.href : this.ajaxModal.clickTarget = null;
                this.ajaxModal.isActive = !this.ajaxModal.isActive;
            },
            toggleUserDonateMsg() {
              this.showUserDonateMsg = !this.showUserDonateMsg;
            },
            toggleUserDonateMsgIsHidden(bool) {
                this.userDonateMsgIsHidden = !!bool;
            },
            toggleMenu() {
                this.menuIsVisible = !this.menuIsVisible;
            },
            toggleAppLoadingState() {
                this.appIsLoading = !this.appIsLoading;
            },
            beliefsNextChunk() {
                this.currentChunk++;
                scroll.animateScroll(0);
            },
            beliefsPreviousChunk() {
                this.currentChunk--;
                scroll.animateScroll(0);
            }
        },
        computed: {
            beliefTotalChunks() {
                return document.getElementsByClassName('beliefChunk').length;
            },
            userWelcomeMsg() {
                return this.currentUser ? `Hi, ${this.currentUser.friendlyName}! ` : '';
            },
            userHasAddressAndPaymentCard() {
                if (this.currentUser) {
                    return !!(this.currentUser.paymentSource && this.currentUser.billingAddressId);
                } else {
                    return false;
                }
            }
        },
        mounted() {
            if (window.location.hash) {
                this.currentChunk = window.location.hash.split('-')[1];
            }

            // Get Current User
            VueAxios.get('/actions/site-module/site/get-current-user').then((response) => {
                this.currentUser = response.data.user;
            });

        },
    });

    // Animate On Scroll (AOS)
    const AOS = await import(/* webpackChunkName: "aos" */ 'aos');
    AOS.init();
    // Smooth Scroll
    const {default: SmoothScroll} = await import(/* webpackChunkName: "smooth-scroll" */ 'smooth-scroll');
    let scroll = new SmoothScroll('a[data-scroll]', {
        speed: 300
    });
    // Lazy Sizes
    const LazySizes = await import(/* webpackChunkName: "lazysizes" */ 'lazysizes');
    LazySizes.init(); // lazySizes works off a global.

    return vm;
};

// Execute async function
main().then((vm) => {
});

// Accept HMR as per: https://webpack.js.org/api/hot-module-replacement#accept
if (module.hot) {
    module.hot.accept();
}
