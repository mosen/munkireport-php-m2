<template>
    <div class="panel panel-default" id="client-widget">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-stats"></i>
                <span>{{ $t('client.activity') }}</span>
            </h3>
        </div>
        <div class="panel-body">
            <vn-pie
                    height="258"
                    width="258"
                    :model="[active, inactive]"
                    donutRatio="0.45"
                    donut="true"
                    showLabels="false"
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

        </div>

    </div>
</template>

<script>
  import {API_ROOT} from '../../constants';

  export default {
    data () {
      // NOTE: these stats are not exclusive, so a client can be seen last day + last hour + last week etc.
      // so we cannot use the sum of all to equal the total value.
      return {
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
    computed: {
      active: function() {
        return {
          label: this.$t('active'),
          value: this.stats.seen_last_month
        };
      },
      inactive: function() {
        return {
          label: this.$t('inactive'),
          value: this.stats.total - this.stats.seen_last_month
        }
      }
    },
    created () {
      this.axios.get(`${API_ROOT}/stats/report_data`).then((response) => {
        this.stats = Object.assign({}, this.stats, response.data);
       }).catch((response) => {
        this.error = true;
        this.errorDetails.status = response.status;
        this.errorDetails.message = response.message;
       });
      
    }
  }
</script>