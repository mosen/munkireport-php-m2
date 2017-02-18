<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-hdd"></i>
                <span>{{ $t('free_disk_space') }}</span>
            </h3>
        </div>
        <div class="panel-body text-center">
            <a v-if="danger > 0" class="btn btn-danger">
                <span class="disk-count bigger-150">{{ danger }}</span>
                <br>
                <span class="disk-label">&lt; {{ dangerThreshold }}</span>
            </a>
            <a v-if="warning > 0" class="btn btn-warning">
                <span class="disk-count bigger-150">{{ warning }}</span>
                <br>
                <span class="disk-label">&lt; {{ warningThreshold }}</span>
            </a>
            <a v-if="success > 0" class="btn btn-success">
                <span class="disk-count bigger-150">{{ success }}</span>
                <br>
                <span class="disk-label">{{ warningThreshold }} +</span>
            </a>
            <span v-if="total === 0 && !error" id="disk-nodata">{{ $t('no_clients') }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                danger: 0,
                warning: 0,
                success: 0,
                warningThreshold: 10,
                dangerThreshold: 5,
                error: false,
                errorDetails: {
                    status: 200,
                    message: ''
                }
            }
        },
        computed: {
            total: function () {
                return this.danger + this.warning + this.success;
            }
        },
        mounted () {
            this.axios.get(`/xapi/stats/diskreport/free_space`).then((response) => {
                this.danger = response.data.danger;
                this.warning = response.data.warning;
                this.success = response.data.success;

                this.warningThreshold = response.data.warningThreshold;
                this.dangerThreshold = response.data.dangerThreshold;
            }).catch((response) => {
                this.error = true;
                this.errorDetails.status = response.status;
                this.errorDetails.message = response.message;
            })
        }
    }
</script>