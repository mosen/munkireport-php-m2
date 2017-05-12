<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-time"></span>
            {{ $t('backup2go.widget.title') }}
        </span>

        <div v-if="total === 0" id="b2g-nodata" class="panel-body text-center">{{ $t('no_clients') }}</div>
        <div v-else class="widget-status">
            <a v-if="ok > 0" id="b2g-b2g_ok" :href="url" class="list-group-item list-group-item-success">
                <span class="badge">{{ ok }}</span>
                <span>{{ $t('widget.timemachine.b2g_ok') }}</span>
            </a>
            <a v-if="warning > 0" id="b2g-b2g_warning" :href="url" class="list-group-item list-group-item-warning">
                <span class="badge">{{ warning }}</span>
                <span>{{ $t('widget.timemachine.b2g_warning') }}</span>
            </a>
            <a v-if="danger > 0" id="b2g-b2g_danger" :href="url" class="list-group-item list-group-item-danger">
                <span class="badge">{{ danger }}</span>
                <span>{{ $t('widget.timemachine.b2g_danger') }}</span>
            </a>
        </div>
    </panel>
</template>

<script>
    import panel from 'CoreDashboard/components/WidgetPanel.vue';

    export default {

        data() {
            return {
                url: "/backup2go",
                ok: 0,
                warning: 0,
                danger: 0,
                error: false,
                errorDetails: {}
            }
        },
        computed: {
            total: function () {
                return this.ok + this.warning + this.danger;
            }
        },
        mounted() {
            this.axios.get(`/xapi/backup2go/stats`).then((response) => {
                if (response.data) {
                    this.ok = response.data.ok;
                    this.warning = response.data.warning;
                    this.danger = response.data.danger;
                }
            }).catch((response) => {
                this.error = true;
                this.errorDetails = {
                    status: response.status,
                    message: response.message
                };
            })
        },
        components: {
            panel
        }

    }
</script>