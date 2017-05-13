<template>
    <panel>
        <span slot="title">
            <i class="glyphicon glyphicon-time"></i>
            {{ $t('crashplan.widget.title') }}
        </span>

        <div class="list-group scroll-box">
            <a :href="listing_url" class="list-group-item list-group-item-success">
                <span class="badge">{{ today }}</span>
                <span>{{ $t('widget.timemachine.today') }}</span>
            </a>
            <a :href="listing_url" class="list-group-item list-group-item-warning">
                <span class="badge">{{ lastweek }}</span>
                <span>{{ $t('widget.timemachine.lastweek') }}</span>
            </a>
            <a :href="listing_url" class="list-group-item list-group-item-danger">
                <span class="badge">{{ weekplus }}</span>
                <span>{{ $t('widget.timemachine.week_plus') }}</span>
            </a>
            <span v-if="total === 0 && !error" class="list-group-item">{{ $t('no_clients') }}</span>
            <span v-if="error" class="list-group-item">An error occurred fetching data</span>
        </div>
    </panel>
</template>

<script>
    import panel from 'CoreDashboard/components/WidgetPanel.vue';

    export default {
        data() {
            return {
                today: 0,
                lastweek: 0,
                weekplus: 0,
                listing_url: '/crashplan',
                error: false,
                errorDetails: {
                    status: 200,
                    message: ''
                }
            }
        },
        computed: {
            total: function() {
                return this.success + this.warning + this.danger;
            }
        },
        mounted() {
            this.axios.get(`/xapi/stats/crashplan`).then((response) => {
                this.today = response.data.today;
                this.lastweek = response.data.lastweek;
                this.weekplus = response.data.weekplus;
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