<template>
    <div class="container-fluid">
    <h1>Client {{ data.serial_number }}</h1>
    <spinner v-if="loading" size="md" fixed></spinner>

        <span>{{ data.serial_number }}</span>
    </div>
</template>

<script>
  import {mapActions, mapState} from 'vuex';
  import { spinner, alert } from 'vue-strap';

  export default {
    computed: {
      ...mapState('client', ['loading', 'error', 'data'])
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