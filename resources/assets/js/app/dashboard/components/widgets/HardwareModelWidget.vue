<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-list"></i>
                {{ $t('machine.hardware_widget_title') }}
            </h3>
        </div>
        <div class="list-group scroll-box">
            <template v-if="data.length > 0">
                <a v-for="item in items" href="/show/listing/hardware/machine_desc" class="list-group-item">
                    {{ item.machine_desc }}
                    <span class="badge pull-right">{{ count }}</span>
                </a>
            </template>
            <span v-else class="list-group-item">{{ $t('no_clients') }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                items: [],

                error: false,
                errorDetails: {
                    status: 200,
                    message: ''
                }
            }
        },

        beforeCreate () {
            this.axios.get(`/xapi/stats/machine/hardware_models`).then((response) => {
                if (response.data) {
                    this.items = response.data;
                }
            }).catch((response) => {
                this.error = true;
                this.errorDetails = {
                    status: response.status,
                    message: response.message
                };
            })
        }
    }
</script>