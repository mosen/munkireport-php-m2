<template>
    <div class="panel panel-default" id="smart-status-widget">
        <div class="panel-heading" data-container="body">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-exclamation-sign"></i>
                <span>{{ $t('storage.smartstatus') }}</span>
            </h3>
        </div>
        <div class="panel-body text-center">
            <a v-if="failing > 0" :href="url + '#failing'" class="btn btn-danger">
                <span class="bigger-150">{{ failing }}</span>
                <br>
                {{ $t('failing') }}
            </a>
            <a v-if="verified > 0" :href="url + '#verified'" class="btn btn-success">
                <span class="bigger-150">{{ verified }}</span>
                <br>
                {{ $t('verified') }}
            </a>
            <a v-if="unsupported > 0" :href="url + '#not supported'" class="btn btn-info">
                <span class="bigger-150">{{ unsupported }}</span>
                <br>
                {{ $t('unsupported') }}
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                failing: 0,
                verified: 0,
                unsupported: 0,

                error: false,
                errorDetails: {
                    status: 200,
                    message: ''
                }
            }
        },
        mounted() {
            this.axios.get(`/xapi/stats/diskreport/smart_status`).then((response) => {
                this.failing = response.data.failing;
                this.verified = response.data.verified;
                this.unsupported = response.data.unsupported;
            }).catch((response) => {
                this.error = true;
                this.errorDetails.status = response.status;
                this.errorDetails.message = response.message;
            })
        }
    }
</script>
