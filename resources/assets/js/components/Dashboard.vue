<template>
    <div>
        <newclientswidget></newclientswidget>
        <clientactivity></clientactivity>
        <eventmessages></eventmessages>
        <uptime></uptime>
        <bluetooth></bluetooth>
    </div>
</template>

<script>
    // Hard coding these dependencies is temporary
    import NewClientsWidget from './widgets/NewClientsWidget.vue';
    import ClientActivityWidget from './widgets/ClientWidget.vue';
    import EventMessagesWidget from './widgets/EventMessagesWidget.vue';
    import UptimeWidget from './widgets/UptimeWidget.vue';

    import BluetoothBatteryWidget from '../../../../mr_module/Bluetooth/assets/js/components/BluetoothBatteryWidget.vue';

    export default {
        components: {
          'newclientswidget': NewClientsWidget,
          'clientactivity': ClientActivityWidget,
            'eventmessages': EventMessagesWidget,
            'uptime': UptimeWidget,
            'bluetooth': BluetoothBatteryWidget
        }
    }
</script>