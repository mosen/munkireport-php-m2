<template>
    <div class="panel panel-default" id="client-widget">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-stats"></i>
                <span>{{ $t('client.activity') }}</span>
            </h3>
        </div>
        <div class="panel-body">
            <vn-pie donut="true" showLabels="false"></vn-pie>
            <div class="text-muted text-center">
                <span>{{ $t('client.total') }}</span>:
                <span class="total-clients">{{ total }}</span>
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
      return {
        stats: {
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
      total: function () {
        return this.stats.inactive_month +
          this.stats.inactive_three_months +
          this.stats.inactive_week +
          this.stats.seen_last_day +
          this.stats.seen_last_hour +
          this.stats.seen_last_month +
          this.stats.seen_last_week;
      }
    },
    created () {
      this.axios.get(`${API_ROOT}/stats/report_data`).then((response) => {
        this.stats = response.data;
       }).catch((response) => {
        this.error = true;
        this.errorDetails.status = response.status;
        this.errorDetails.message = response.message;
       });
      
    }
  }
</script>