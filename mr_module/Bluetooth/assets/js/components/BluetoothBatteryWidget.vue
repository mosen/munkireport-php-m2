<template>
    <div class="panel panel-default" id="bluetooth-battery-widget">
        <div class="panel-heading" :title="$t('bluetooth.panel_title')">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-flash"></i>
                <span>{{ $t('bluetooth.bluetooth_battery_widget') }}</span><span
                        class="counter badge pull-right">{{ items.length }}</span>
            </h3>
        </div>
        <div class="list-group scroll-box">
            <span v-if="error" class="list-group-item">error fetching bluetooth information: {{ errorDetails.message }}</span>
            <span v-if="items.length === 0 && !error" class="list-group-item">{{ $t('bluetooth.all_ok') }}</span>
            <a v-else v-for="item in items" class="list-group-item" :href="'/clients/detail/' + item.serial_number">
                {{ item.computer_name }}
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                error: false,
                errorDetails: {},
                items: []
            }
        },
        created () {
            this.axios.get(`/xapi/bluetooth?filter=low`).then((response) => {
                this.items = response.data;
            }).catch((response) => {
                this.error = true;
                this.errorDetails = {
                    status: response.status,
                    message: response.message
                };
            });
        },
        computed: {
            
        }
    }
</script>