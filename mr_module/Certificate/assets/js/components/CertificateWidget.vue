<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-certificate"></span>
            {{ $t('widget.certificate.title') }}
        </span>

        <div v-if="total === 0" id="cert-nodata" class="widget-padded text-center">{{ $t('no_clients') }}</div>
        <div class="widget-content scroll-box">
            <a id="cert-ok" :href="url" class="list-group-item list-group-item-success">
                <span class="badge">{{ ok || 0 }}</span>
                <span>{{ $t('widget.certificate.ok') }}</span>
            </a>
            <a id="cert-soon" :href="url" class="list-group-item list-group-item-warning">
                <span class="badge">{{ expire_soon || 0 }}</span>
                <span>{{ $t('widget.certificate.soon') }}</span>
            </a>
            <a id="cert-expired" :href="url" class="list-group-item list-group-item-danger">
                <span class="badge">{{ expired || 0 }}</span>
                <span>{{ $t('widget.certificate.expired') }}</span>
            </a>
        </div>
    </panel>
</template>

<script>
  import {mapMutations, mapActions, mapState} from 'vuex';
  import panel from 'CoreDashboard/components/WidgetPanel.vue';

  export default {
    data() {
      return {
        url: '/listing/certificate'
      };
    },
    computed: {
      ...mapState('certificate', {
        ok: state => state.ok,
        expire_soon: state => state.expire_soon,
        expired: state => state.expired,
      }),
      total: function () {
        return this.ok + this.expire_soon + this.expired;
      }
    },
    methods: {},
    components: {
      panel
    }
  }
</script>