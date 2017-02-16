<template>
    <div>
        <newclientswidget></newclientswidget>
    </div>
</template>

<script>
    import NewClientsWidget from './widgets/NewClientsWidget.vue';

    export default {
        components: {
          'newclientswidget': NewClientsWidget
        }
    }
</script>