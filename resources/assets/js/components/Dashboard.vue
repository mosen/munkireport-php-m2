<template>
    <div>
        <newclientswidget></newclientswidget>
        <clientactivity></clientactivity>
    </div>
</template>

<script>
    import NewClientsWidget from './widgets/NewClientsWidget.vue';
    import ClientActivityWidget from './widgets/ClientWidget.vue';

    export default {
        components: {
          'newclientswidget': NewClientsWidget,
          'clientactivity': ClientActivityWidget
        }
    }
</script>