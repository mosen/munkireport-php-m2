<template>
    <div v-for="(versions, appName) in apps" class="col-lg-4 col-md-6">
        <widget-app name="appName" versions="versions" url="/x/inventory" />
    </div>
</template>

<script>
  import AppWidget from './AppWidget.vue';

  export default {
    data() {
      return {
        apps: [],

        error: false,
        errorDetails: {
          status: 200,
          message: ''
        }
      }
    },
    components: {
      'widget-app': AppWidget
    }
  }
</script>