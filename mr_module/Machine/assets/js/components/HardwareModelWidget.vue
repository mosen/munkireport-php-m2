<template>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-default" id="hardware-model-widget">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-laptop"></i> {{ $t('machine.hardware_widget_title') }}</h3>
            </div>
            <div class="list-group scroll-box">
                <template v-if="data.length > 0">
                    <a v-for="item in data" href="'/show/listing/hardware/#'+d.machine_desc" class="list-group-item">
                        {{ machine_desc }} <span class="badge pull-right">{{ count }}</span>
                    </a>
                </template>
                <span v-else class="list-group-item">{{ $t('no_clients') }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {

            }
        },

        beforeCreate () {
            this.axios.get('/ext/machine').then((response) => {
                console.log(response.json());
            })
        }
    }
</script>