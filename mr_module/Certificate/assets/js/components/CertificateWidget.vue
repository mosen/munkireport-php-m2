<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body" title="">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-certificate"></i>
                <span>{{ $t('widget.certificate.title') }}</span>
            </h3>
        </div>
        <div class="list-group scroll-box">
            <a v-if="ok > 0" id="cert-ok" :href="url" class="list-group-item list-group-item-success">
                <span class="badge">{{ ok }}</span>
                <span>{{ $t('widget.certificate.ok') }}</span>
            </a>
            <a v-if="expire_soon > 0" id="cert-soon" :href="url" class="list-group-item list-group-item-warning">
                <span class="badge">{{ expire_soon }}</span>
                <span>{{ $t('widget.certificate.soon') }}</span>
            </a>
            <a v-if="expired > 0" id="cert-expired" :href="url" class="list-group-item list-group-item-danger">
                <span class="badge">{{ expired }}</span>
                <span>{{ $t('widget.certificate.expired') }}</span>
            </a>
            <span v-if="total === 0" id="cert-nodata" class="list-group-item">{{ $t('no_clients') }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ok: 0,
                expire_soon: 0,
                expired: 0,
                url: '/certificates'
            }
        },
        computed: {
            total: function() {
                return this.ok + this.expire_soon + this.expired;
            }
        },
        mounted () {
            this.axios.get(`/xapi/stats/certificate`).then((response) => {
                this.ok = response.data.ok;
                this.expire_soon = response.data.expire_soon;
                this.expired = response.data.expired;
            }).catch((response) => {
                this.error = true;
                this.errorDetails = {
                    status: response.status,
                    message: response.message
                };
            });
        }
    }
</script>