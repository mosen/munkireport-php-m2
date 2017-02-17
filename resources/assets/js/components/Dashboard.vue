<template>
    <div>
        <newclientswidget></newclientswidget>
        <clientactivity></clientactivity>
        <eventmessages></eventmessages>
    </div>
</template>

<script>
    import NewClientsWidget from './widgets/NewClientsWidget.vue';
    import ClientActivityWidget from './widgets/ClientWidget.vue';
    import EventMessagesWidget from './widgets/EventMessagesWidget.vue';

    export default {
        components: {
          'newclientswidget': NewClientsWidget,
          'clientactivity': ClientActivityWidget,
            'eventmessages': EventMessagesWidget
        }
    }
</script>