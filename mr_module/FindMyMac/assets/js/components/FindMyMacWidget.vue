<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body" title="FindMyMac status">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-map-marker"></i>
                <span>{{ $t('findmymac.widget.title') }}</span>
            </h3>
        </div>
        <div class="panel-body text-center">
            <a href="/show/listing/findmymac/#enabled" class="btn btn-danger">
                <span class="bigger-150">{{ Enabled }}</span>
                <br>
                {{ $t('findmymac.widget.enabled') }}
            </a>
            <a href="/show/listing/findmymac/#disabled" class="btn btn-success">
                <span class="bigger-150">{{ Disabled }}</span>
                <br>
                {{ $t('findmymac.widget.disabled') }}
            </a>
        </div>
    </div>
</template>

<script>
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
        }
    }
</script>