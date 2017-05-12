<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-hdd"></span>
            {{ $t('free_disk_space') }}
        </span>

        <div v-if="total === 0 && !error" class="panel-body text-center">
            <span v-if="total === 0 && !error" id="disk-nodata">{{ $t('no_clients') }}</span>
        </div>
        <div v-else class="widget-status">
            <div class="widget-status-item widget-danger widget-padded">
                <a>
                    <span class="disk-count bigger-150">{{ danger || 0 }}</span>
                    <br>
                    <span class="disk-label">&lt; {{ dangerThreshold }}</span>
                </a>
            </div>
            <div class="widget-status-item widget-warning widget-padded">
                <a>
                    <span class="disk-count bigger-150">{{ warning || 0 }}</span>
                    <br>
                    <span class="disk-label">&lt; {{ warningThreshold }}</span>
                </a>
            </div>
            <div class="widget-status-item widget-success widget-padded">
                <a>
                    <span class="disk-count bigger-150">{{ success || 0 }}</span>
                    <br>
                    <span class="disk-label">{{ warningThreshold }} +</span>
                </a>
            </div>
        </div>
    </panel>
</template>

<script>
  import panel from 'CoreDashboard/components/WidgetPanel.vue';

  export default {
    data() {
      return {
        danger: 0,
        warning: 0,
        success: 0,
        warningThreshold: 10,
        dangerThreshold: 5,
        error: false,
        errorDetails: {
          status: 200,
          message: ''
        }
      }
    },
    computed: {
      total: function () {
        return this.danger + this.warning + this.success;
      }
    },
    mounted () {
      this.axios.get(`/xapi/stats/diskreport/free_space`).then((response) => {
        this.danger = response.data.danger;
        this.warning = response.data.warning;
        this.success = response.data.success;

        this.warningThreshold = response.data.warningThreshold;
        this.dangerThreshold = response.data.dangerThreshold;
      }).catch((response) => {
        this.error = true;
        this.errorDetails.status = response.status;
        this.errorDetails.message = response.message;
      })
    },
    components: {
      panel
    }
  }
</script>