<template>
    <div>
    <h1>Client</h1>
    <spinner v-if="loading" size="md" fixed></spinner>
        <alert :show="error" type="danger">Could not load client</alert>
    </div>
</template>

<script>
  import {mapActions, mapState} from 'vuex';
  import { spinner, alert } from 'vue-strap';

  export default {
    computed: {
      ...mapState('client', ['loading', 'error'])
    },
    mounted() {
      this.read(this.$route.params.serial_number);
    },
    methods: {
      ...mapActions('client', ['read'])
    },
    components: { spinner, alert }
  }
</script>