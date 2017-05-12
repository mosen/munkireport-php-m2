<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-link"></span>
            {{ $t('widget.bound_to_ds.title') }}
        </span>

        <div class="widget-status">
            <div class="widget-status-item widget-danger widget-padded">
                <a :href="listingurl">
                    <span class="bigger-150">{{ notbound }}</span>
                    <br>{{ $t('widget.bound_to_ds.notbound') }}
                </a>
            </div>
            <div class="widget-status-item widget-success widget-padded">
                <a :href="listingurl">
                    <span class="bigger-150">{{ arebound }}</span>
                    <br>{{ $t('widget.bound_to_ds.bound') }}
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
        listingurl: '/directoryservice',
        notbound: 0,
        arebound: 0,
        error: false,
        errorDetails: {
          status: 200,
          message: ''
        }
      }
    },
    mounted() {
      this.axios.get(`/xapi/stats/directoryservice`).then((response) => {
        this.notbound = response.data.notbound;
        this.arebound = response.data.arebound;
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