<template>
    <div class="mt-20">
        <vc-donut
            background="#031828"
            foreground="#f68e6d"
            :sections="sections"
            has-legend
            :size=350
            legend-placement="bottom"
            :thickness="35">
        </vc-donut>
    </div>
</template>

<script>
import Donut from 'vue-css-donut-chart/src/components/Donut.vue';
import 'vue-css-donut-chart/dist/vcdonut.css';

export default {
    components: {
        'vc-donut': Donut
    },
    props: [
        'given', 'total'
    ],
    computed: {
        text() {
            return this.given + this.total;
        },
        sections() {
            return [
                {
                    label: 'Raised So Far',
                    value: this.pieVal,
                    color: '#adc7ac'
                }
            ]
        },
        pieVal() {
            return Math.floor((this.given / this.total) * 100);
            //return Math.floor(this.given / this.total);
        },
        typeCheck() {
            return {
                sections: [
                    {label: 'Raised So Far', value: this.pieVal, color: '#adc7ac'},
                ]
            }
        }
    }
}
</script>
