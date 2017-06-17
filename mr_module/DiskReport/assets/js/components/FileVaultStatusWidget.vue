<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-lock"></span>
            {{ $t('filevault.widget.title') }}
        </span>

        <div class="widget-status">
            <div v-if="unencrypted > 0" class="widget-status-item widget-danger widget-padded">
                <router-link to="/x/disks/fv_status/unencrypted">
                    <span class="disk-count bigger-150">{{ unencrypted }}</span>
                    <br>
                    <span>{{ $t('unencrypted') }}</span>
                </router-link>
            </div>
            <div v-if="encrypted > 0" class="widget-status-item widget-success widget-padded">
                <router-link to="/x/disks/fv_status/encrypted">
                <span class="disk-count bigger-150">{{ encrypted }}</span>
                <br>
                <span>{{ $t('encrypted') }}</span>
                </router-link>
            </div>
            <span v-if="total === 0 && !error">{{ $t('no_clients') }}</span>
        </div>
    </panel>
</template>

<script>
  import panel from 'CoreDashboard/components/WidgetPanel.vue';

  export default {
    data() {
      return {
        encrypted: 0,
        unencrypted: 0,

        error: false,
        errorDetails: {
          status: 200,
          message: ''
        }
      }
    },
    computed: {
      total: function () {
        return this.encrypted + this.unencrypted;
      }
    },
    mounted() {
      this.axios.get(`/xapi/stats/diskreport/filevault_status`).then((response) => {
        this.encrypted = response.data.encrypted;
        this.unencrypted = response.data.unencrypted;
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