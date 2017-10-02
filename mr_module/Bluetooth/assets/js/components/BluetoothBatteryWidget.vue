<template>
    <panel>
        <span slot="title">
            <span class="glyphicon glyphicon-flash"></span>
            {{ $t('bluetooth.bluetooth_battery_widget') }}
        </span>
        <span slot="title" class="counter badge pull-right">{{ count }}</span>

        <span v-if="error" class="list-group-item">error fetching bluetooth information: {{ errorDetails.message }}</span>
        <span v-if="data.length === 0 && !error" class="list-group-item">{{ $t('bluetooth.all_ok') }}</span>
        <div v-else v-for="item in data" class="widget-list-item" href="/clients">
            <router-link :to="'/clients/' + item.machine.serial_number">{{ item.machine.computer_name }}</router-link>
        </div>
    </panel>
</template>

<script>
    import { mapMutations } from 'vuex';
    import panel from 'CoreDashboard/components/WidgetPanel.vue';
    
    export default {
        data() {
            return {
                error: false,
                errorDetails: {},
                count: 0,
                data: []
            }
        },
        mounted () {

        },
        beforeDestroy () {

        },
        computed: {
            
        },
        methods: {

        },
        components: {
            panel
        }
    };
</script>