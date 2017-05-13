<template>
    <panel>
        <span slot="title">
            <span class="glyphicon glyphicon-map-marker"></span>
            {{ $t('findmymac.widget.title') }}
        </span>

        <div class="widget-status">
            <div class="widget-status-item widget-success">
            <a href="/show/listing/findmymac/#enabled">
                <span class="bigger-150">{{ Enabled }}</span class="bigger-150">
                <br>
                {{ $t('findmymac.widget.enabled') }}
            </a>
            </div>
            <div class="widget-status-item widget-ok">
            <a href="/show/listing/findmymac/#disabled">
                <span class="bigger-150">{{ Disabled }}</span>
                <br>
                {{ $t('findmymac.widget.disabled') }}
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
                Enabled: 0,
                Disabled: 0,

                error: false,
                errorDetails: {
                    status: 200,
                    message: ''
                }
            }
        },
        mounted() {
            this.axios.get(`/xapi/stats/findmymac`).then((response) => {
                this.Enabled = response.data.Enabled;
                this.Disabled = response.data.Disabled;
            }).catch((response) => {
                this.error = true;
                this.errorDetails.status = response.status;
                this.errorDetails.message = response.message;
            });
        },
        components: {
            panel
        }
    }
</script>