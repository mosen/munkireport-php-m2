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
    import { mapMutations } from 'vuex';
    import panel from 'CoreDashboard/components/WidgetPanel.vue';
    
    export default {
        data() {
            return {
                ok: 0,
                expire_soon: 0,
                expired: 0
            }
        },
        computed: {
            total: function() {
                return this.ok + this.expire_soon + this.expired;
            }
        },
        methods: {
            ...mapMutations('stats', ['subscribe', 'unsubscribe'])
        },
        components: {
            panel
        }
    }
</script>