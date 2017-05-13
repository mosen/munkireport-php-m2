<template>
    <panel>
        <span slot="title">
            <span class="glyphicon glyphicon-expand"></span>
            {{ $t('displays.widget_title') }}
        </span>

        <div class="widget-status">
                <div class="widget-status-item widget-ok widget-padded">
                    <h1>{{ total }}</h1>
                <br>
                {{ $t('displays.displays') }}
                </div>
        </div>
    </panel>
</template>

<script>
    import panel from 'CoreDashboard/components/WidgetPanel.vue';
    
    export default {
        data() {
            return {
                total: 0,
                error: false,
                errorDetails: {
                    status: 200,
                    message: ''
                }
            }
        },
        mounted() {
            this.axios.get(`/xapi/stats/display/external`).then((response) => {
                this.total = response.data.total;
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