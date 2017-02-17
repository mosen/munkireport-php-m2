<template>
    <div class="panel panel-default" id="client-widget">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-group"></i>
                <span>{{ $t('client.activity') }}</span>
            </h3>
        </div>
        <div class="panel-body">
            <svg id="test1" class="center-block"></svg>
            <div class="text-muted text-center">
                <span>{{ $t('client.total') }}</span>: <span class="total-clients"></span> <span
                    class="total-change"></span>
                |
                <span>{{ $t('client.hour') }}</span>: <span class="hour-clients"></span> <span
                    class="lasthour-change"></span>
            </div>

        </div>

    </div>
</template>

<script>
  import { API_ROOT } from '../../constants';
  import nv from 'nvd3';
  import d3 from 'd3';
  
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

    created () {
      this.axios.get(`${API_ROOT}/stats/report_data`).then((response) => {
        this.stats = response;
      })
    }
  }
</script>