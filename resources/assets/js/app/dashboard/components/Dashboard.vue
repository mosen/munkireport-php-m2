<template>
    <p>Dashbogafrd</p>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {

      computed: {
        ...mapGetters([
          'widgets'
        ])
      }
    }
</script>