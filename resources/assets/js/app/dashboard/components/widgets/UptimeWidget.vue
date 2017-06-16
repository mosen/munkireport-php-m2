<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-off"></span>
            {{ $t('widget.uptime.title') }}
        </span>

        <div>
            <div class="widget-status">
                <div class="widget-status-item widget-danger widget-padded">
                    <router-link to="/clients/uptime/longest">
                        <span class="bigger-150">{{ oneweekplus }}</span>
                        <br>
                        7 <span>{{ $t('date.day_plural') }}</span> +
                    </router-link>
                </div>
                <div class="widget-status-item widget-warning widget-padded">
                    <router-link to="/clients/uptime/longer">
                        <span class="bigger-150">{{ oneweek }}</span>
                        <br>
                        &lt; 7 <span>{{ $t('date.day_plural') }}</span>
                    </router-link>
                </div>
                <div class="widget-status-item widget-success widget-padded">
                    <router-link to="/clients/uptime/short">
                        <span class="bigger-150">{{ oneday }}</span>
                        <br>
                        &lt; 1 <span>{{ $t('date.day') }}</span>
                    </router-link>
                </div>
            </div>
        </div>

    </panel>
</template>

<script>
  import panel from '../WidgetPanel.vue';
  import {mapActions, mapState} from 'vuex';

  export default {
    computed: {
      ...mapState('dashboard', {
        'oneday': state => state.uptime.oneday,
        'oneweek': state => state.uptime.oneweek,
        'oneweekplus': state => state.uptime.oneweekplus
      })
    },
    methods: {
      ...mapActions('dashboard', ['fetch_uptime'])
    },
    mounted () {
      this.fetch_uptime();
    },
    components: {
      panel
    }
  }
</script>