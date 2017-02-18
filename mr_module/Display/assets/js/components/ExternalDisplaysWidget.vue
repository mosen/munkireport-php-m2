<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body" :title="$t('displays.widget_info')">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-expand"></i>
                <span>{{ $t('displays.widget_title') }}</span>
            </h3>
        </div>
        <div class="panel-body text-center">
            <a href="/displays#external" class="btn btn-success">
                <span class="bigger-150">{{ total }}</span>
                <br>
                {{ $t('displays.displays') }}
            </a>
        </div>
    </div>
</template>

<script>
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
        }
    }
</script>