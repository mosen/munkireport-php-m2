<template>
    <panel>
        <span slot="title">
            <span class="glyphicon glyphicon-stats"></span>
            {{ $t('client.activity') }}
        </span>

        <vn-pie
                :height="chart.height"
                :width="chart.width"
                :model="[active, inactive]"
                :donutRatio="chart.donutRatio"
                :donut="chart.donut"
                :showLabels="chart.showLabels"
        ></vn-pie>
        <div class="text-muted text-center">
            <span>{{ $t('client.total') }}</span>:
            <span class="total-clients">{{ stats.total }}</span>
            <span class="total-change"></span>
            |
            <span>{{ $t('client.hour') }}</span>:
            <span class="hour-clients">{{ stats.seen_last_hour }}</span>
            <span class="lasthour-change"></span>
        </div>
    </panel>
</template>

<script>
    import {mapMutations, mapActions} from 'vuex';
    const API_ROOT = '/api';
    import panel from '../WidgetPanel.vue';

    export default {
        data () {
            // NOTE: these stats are not exclusive, so a client can be seen last day + last hour + last week etc.
            // so we cannot use the sum of all to equal the total value.
            return {
                chart: {
                    height: 258,
                    width: 258,
                    donutRatio: 0.45,
                    donut: true,
                    showLabels: false
                },
                stats: {
                    total: 0,
                    inactive_month: 0,
                    inactive_three_months: 0,
                    inactive_week: 0,
                    seen_last_day: 0,
                    seen_last_hour: 0,
                    seen_last_month: 0,
                    seen_last_week: 0
                }
            }
        },
        methods: {
            ...mapMutations('stats', [
                'subscribe',
                'unsubscribe'
            ]),
          ...mapActions('dashboard', [
              'fetchReportData'
          ])
        },
        computed: {
            active: function () {
                return {
                    label: this.$t('active'),
                    value: this.stats.seen_last_month
                };
            },
            inactive: function () {
                return {
                    label: this.$t('inactive'),
                    value: this.stats.total - this.stats.seen_last_month
                }
            }
        },
        mounted () {
//            this.subscribe({ topic: 'core.report_data' });
          this.fetchReportData();
        },
        beforeDestroy () {
//            this.unsubscribe({ topic: 'core.report_data' });
        },
        components: {
            panel
        }
    }
</script>