<template>
    <b-panel>
        <i slot="title" class="glyphicon glyphicon-flash"></i>
        <span slot="title">{{ $t('bluetooth.bluetooth_battery_widget') }}</span>
        <span slot="title" class="counter badge pull-right">{{ count }}</span>

        <span v-if="error" class="list-group-item">error fetching bluetooth information: {{ errorDetails.message }}</span>
        <span v-if="items.length === 0 && !error" class="list-group-item">{{ $t('bluetooth.all_ok') }}</span>
        <a v-else v-for="item in data" class="list-group-item" href="/clients">
            {{ item.machine.computer_name }}
        </a>
    </b-panel>
</template>

<script>
    import Panel from 'core-components/bootstrap/Panel';
    
    export default {
        data() {
            return {
                error: false,
                errorDetails: {},
                count: 0,
                data: []
            }
        },
        created () {
            this.axios.get(`/xapi/bluetooth?filter=low`).then((response) => {
                this.count = response.data.count;
                this.data = response.data.data;
            }).catch((response) => {
                this.error = true;
                this.errorDetails = {
                    status: response.status,
                    message: response.message
                };
            });
        },
        computed: {
            
        },
        components: {
            'b-panel': Panel
        }
    };
</script>