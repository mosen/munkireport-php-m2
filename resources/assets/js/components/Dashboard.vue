<template>
    <div>
        <newclientswidget></newclientswidget>
        <clientactivity></clientactivity>
        <eventmessages></eventmessages>
        <uptime></uptime>
        <bluetooth></bluetooth>
        <backup2go></backup2go>
        <certificate></certificate>
        <crashplan></crashplan>
        <dirbound></dirbound>
        <diskreport></diskreport>
        <filevault></filevault>
        <smartstatus></smartstatus>
        <findmymac></findmymac>
    </div>
</template>

<script>
    // Hard coding these dependencies is temporary
    import NewClientsWidget from './widgets/NewClientsWidget.vue';
    import ClientActivityWidget from './widgets/ClientWidget.vue';
    import EventMessagesWidget from './widgets/EventMessagesWidget.vue';
    import UptimeWidget from './widgets/UptimeWidget.vue';

    const MODULE_DIR = '../../../../mr_module';

    import BluetoothBatteryWidget from '../../../../mr_module/Bluetooth/assets/js/components/BluetoothBatteryWidget.vue';
    import Backup2GoWidget from '../../../../mr_module/Backup2Go/assets/js/components/Backup2GoWidget.vue';
    import CertificateWidget from '../../../../mr_module/Certificate/assets/js/components/CertificateWidget.vue';
    import CrashPlanWidget from '../../../../mr_module/CrashPlan/assets/js/components/CrashPlanWidget.vue';
    import BoundWidget from '../../../../mr_module/DirectoryService/assets/js/components/BoundWidget.vue';
    import DiskReportWidget from '../../../../mr_module/DiskReport/assets/js/components/DiskReportWidget.vue';
    import FileVaultStatusWidget from '../../../../mr_module/DiskReport/assets/js/components/FileVaultStatusWidget.vue';
    import SMARTStatusWidget from '../../../../mr_module/DiskReport/assets/js/components/SMARTStatusWidget.vue';
    import FindMyMacWidget from '../../../../mr_module/FindMyMac/assets/js/components/FindMyMacWidget.vue';

    export default {
        components: {
          'newclientswidget': NewClientsWidget,
          'clientactivity': ClientActivityWidget,
            'eventmessages': EventMessagesWidget,
            'uptime': UptimeWidget,
            'bluetooth': BluetoothBatteryWidget,
            'backup2go': Backup2GoWidget,
            'certificate': CertificateWidget,
            'crashplan': CrashPlanWidget,
            'dirbound': BoundWidget,
            'diskreport': DiskReportWidget,
            'filevault': FileVaultStatusWidget,
            'smartstatus': SMARTStatusWidget,
            'findmymac': FindMyMacWidget
        }
    }
</script>