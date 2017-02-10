<template>
<div class="col-lg-4 col-md-6">
    <div class="panel panel-default" id="bluetooth-battery-widget">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bolt"></i>
                <span data-i18n="bluetooth.bluetooth_battery_widget"></span>
                <span class="counter badge pull-right">{{ low_battery.length }}</span>
            </h3>
        </div>
        <div class="list-group scroll-box">
            <template v-if="low_battery.length > 0">
                <a class="list-group-item" v-for="btlow in low_battery" :href="'/clients/detail/' + serial_number"></a>
            </template>
            <span v-else>
                i18n bluetooth.all_ok
            </span>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data () {
            return {
                low_battery: []
            }
        }
    }
</script>