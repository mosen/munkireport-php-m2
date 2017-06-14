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
            <span class="total-clients">{{ total }}</span>
            <span class="total-change"></span>
            |
            <span>{{ $t('client.hour') }}</span>:
            <span class="hour-clients">{{ seen_last_hour }}</span>
            <span class="lasthour-change"></span>
        </div>
    </panel>
</template>

<script>
  import {mapMutations, mapActions, mapGetters, mapState} from 'vuex';
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
        }
      }
    },
    methods: {
      ...mapActions('dashboard', [
        'fetchReportData'
      ])
    },
    computed: {
      ...mapState('dashboard', {
        inactive_week: state => state.report_data.inactive_week,
        inactive_month: state => state.report_data.inactive_month,
        inactive_three_months: state => state.report_data.inactive_three_months,
        seen_last_hour: state => state.report_data.seen_last_hour,
        seen_last_day: state => state.report_data.seen_last_day,
        seen_last_week: state => state.report_data.seen_last_week,
        seen_last_month: state => state.report_data.seen_last_month,
        total: state => state.report_data.total
      }),
      active: function () {
        return {
          label: this.$t('active'),
          value: this.seen_last_month
        };
      },
      inactive: function () {
        return {
          label: this.$t('inactive'),
          value: this.total - this.seen_last_month
        }
      }
    },
    mounted () {
      this.fetchReportData();
    },
    components: {
      panel
    }
  }
</script>