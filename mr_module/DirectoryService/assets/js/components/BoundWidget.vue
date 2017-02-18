<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body" :title="$t('widget.bound_to_ds.info')">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-link"></i>
                <span>{{ $t('widget.bound_to_ds.title') }}</span>
            </h3>
        </div>
        <div class="panel-body text-center">
            <a :href="listingurl" class="btn btn-danger">
                <span class="bigger-150">{{ notbound }}</span>
                <br>{{ $t('widget.bound_to_ds.notbound') }}
            </a>
            <a :href="listingurl" class="btn btn-success">
                <span class="bigger-150">{{ arebound }}</span>
                <br>{{ $t('widget.bound_to_ds.bound') }}
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                listingurl: '/directoryservice',
                notbound: 0,
                arebound: 0,
                error: false,
                errorDetails: {
                    status: 200,
                    message: ''
                }
            }
        },
        mounted() {
            this.axios.get(`/xapi/stats/directoryservice`).then((response) => {
                this.notbound = response.data.notbound;
                this.arebound = response.data.arebound;
            }).catch((response) => {
                this.error = true;
                this.errorDetails.status = response.status;
                this.errorDetails.message = response.message;
            })
        }
    }
</script>