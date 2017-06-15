<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-off"></span>
            {{ $t('widget.uptime.title') }}
        </span>

        <div>
            <div class="widget-status">
                <div class="widget-status-item widget-danger widget-padded">
                    <a :href="url">
                        <span class="bigger-150">{{ oneweekplus }}</span>
                        <br>
                        7 <span>{{ $t('date.day_plural') }}</span> +
                    </a>
                </div>
                <div class="widget-status-item widget-warning widget-padded">
                    <a :href="url">
                        <span class="bigger-150">{{ oneweek }}</span>
                        <br>
                        &lt; 7 <span>{{ $t('date.day_plural') }}</span>
                    </a>
                </div>
                <div class="widget-status-item widget-success widget-padded">
                    <a :href="url">
                        <span class="bigger-150">{{ oneday }}</span>
                        <br>
                        &lt; 1 <span>{{ $t('date.day') }}</span>
                    </a>
                </div>
            </div>
        </div>

    </panel>
</template>

<script>
  const API_ROOT = '/api/v1';
  import panel from '../WidgetPanel.vue';

  export default {
    data() {
      return {
        oneweekplus: 0,
        oneweek: 0,
        oneday: 0,
        url: '/clients'
      }
    },
    mounted () {
      this.axios.get(`${API_ROOT}/stats/uptime`).then((response) => {
        if (response.data) {
          this.oneweekplus = response.data.oneweekplus;
          this.oneweek = response.data.oneweek;
          this.oneday = response.data.oneday;
        }
      })
    },
    components: {
      panel
    }
  }
</script>