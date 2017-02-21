<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <widget-client-activity />
            </div>
            <div class="col-lg-8 col-md-6">
                <widget-events />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <widget-new-clients />
            </div>
            <div class="col-lg-4 col-md-6">
                <widget-installs-pending-apple/>
            </div>
            <div class="col-lg-4 col-md-6">
                <widget-installs-pending-munki/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                Munki
            </div>
            <div class="col-lg-4 col-md-6">
                <widget-diskreport />
            </div>
            <div class="col-lg-4 col-md-6">
                <widget-uptime />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <widget-bluetooth-battery />
            </div>
            <div class="col-lg-4 col-md-6">
                <widget-backup2go />
            </div>
            <div class="col-lg-4 col-md-6">
                <widget-certificate />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <widget-crashplan />
            </div>
            <div class="col-lg-4 col-md-6">
                <widget-timemachine />
            </div>
            <div class="col-lg-4 col-md-6">
               
            </div>
        </div>
    </div>
</template>

<script>
//
//    const MODULE_DIR = '../../../../mr_module';
//


//    import TimemachineWidget from '../../../../mr_module/TimeMachine/assets/js/components/TimeMachineWidget.vue';


    import NewClientsWidget from './widgets/NewClientsWidget.vue';
    import ClientActivityWidget from './widgets/ClientWidget.vue';
    import EventMessagesWidget from './widgets/EventMessagesWidget.vue';
    import UptimeWidget from './widgets/UptimeWidget.vue';

    export default {
        // Only built-in widgets need to be in this scope, because they are always available.
        components: {
          'widget-new-clients': NewClientsWidget,
          'widget-client-activity': ClientActivityWidget,
          'widget-events': EventMessagesWidget,
          'widget-uptime': UptimeWidget
        }
    }
</script>