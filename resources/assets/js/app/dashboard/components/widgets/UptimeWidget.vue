<template>
    <panel>
        <i slot="title" class="glyphicon glyphicon-off"></i>
        <span slot="title">{{ $t('widget.uptime.title') }}</span>

        <div class="widget-padded">
            <a :href="url" class="btn btn-danger">
                <span class="bigger-150">{{ oneweekplus }}</span>
                <br>
                7 <span>{{ $t('date.day_plural') }}</span> +
            </a>
            <a :href="url" class="btn btn-warning">
                <span class="bigger-150">{{ oneweek }}</span>
                <br>
                &lt; 7 <span>{{ $t('date.day_plural') }}</span>
            </a>
            <a :href="url" class="btn btn-success">
                <span class="bigger-150">{{ oneday }}</span>
                <br>
                &lt; 1 <span>{{ $t('date.day') }}</span>
            </a>
        </div>

    </panel>
</template>

<script>
  const API_ROOT = '/api';
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