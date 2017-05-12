<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $t('storage.smartstatus') }}
        </span>

        <div class="widget-status">
            <div class="widget-status-item widget-danger widget-padded">
                <a :href="url + '#failing'">
                    <span class="bigger-150">{{ failing }}</span>
                    <br>
                    {{ $t('failing') }}
                </a>
            </div>
            <div class="widget-status-item widget-success widget-padded">
                <a :href="url + '#verified'">
                    <span class="bigger-150">{{ verified }}</span>
                    <br>
                    {{ $t('verified') }}
                </a>
            </div>
            <div class="widget-status-item widget-ok widget-padded">
                <a :href="url + '#not supported'">
                    <span class="bigger-150">{{ unsupported }}</span>
                    <br>
                    {{ $t('unsupported') }}
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
        failing: 0,
        verified: 0,
        unsupported: 0,

        url: '',

        error: false,
        errorDetails: {
          status: 200,
          message: ''
        }
      }
    },
    mounted() {
      this.axios.get(`/xapi/stats/diskreport/smart_status`).then((response) => {
        this.failing = response.data.failing;
        this.verified = response.data.verified;
        this.unsupported = response.data.unsupported;
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
